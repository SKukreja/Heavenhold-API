<?php 
add_action('rest_api_init', function () {
    register_rest_route('heavenhold/v1', '/update-illustration', array(
        'methods'             => 'POST',
        'callback'            => 'heroes_update_illustration',
        'permission_callback' => '__return_true', // Adjust this according to your permission requirements
    ));
});

function heroes_update_illustration($request) {
    global $wpdb;

    // Get parameters from the request
    $hero_id = $request->get_param('hero_id');
    $region = $request->get_param('region');
    $image = $request->get_file_params('image');
    $x = $request->get_param('x');
    $y = $request->get_param('y');
    $width = $request->get_param('width');
    $height = $request->get_param('height');

    // Validate inputs
    if (empty($hero_id) || empty($image) || empty($width) || empty($height) || empty($x) || empty($y) || empty($region)) {
        return new WP_Error('invalid_data', 'Hero ID, image, width, and height are required', array('status' => 400));
    }

    // Get the published hero post
    $published_post = get_post($hero_id);
    if (!$published_post || $published_post->post_type != 'heroes') {
        return new WP_Error('invalid_post', 'Invalid hero ID', array('status' => 404));
    }

    // Prepare a new pending revision
    $post_data = array(
        'post_author'       => get_current_user_id(),
        'post_date'         => current_time('mysql'),
        'post_date_gmt'     => current_time('mysql', 1),
        'post_content'      => $published_post->post_content,
        'post_title'        => $published_post->post_title,
        'post_status'       => 'pending',
        'comment_status'    => $published_post->comment_status,
        'ping_status'       => $published_post->ping_status,
        'post_name'         => $published_post->post_name,
        'post_parent'       => $published_post->post_parent,
        'post_type'         => $published_post->post_type,
        'post_mime_type'    => 'pending-revision',
    );
    $wpdb->insert($wpdb->posts, $post_data);
    $revision_id = $wpdb->insert_id;

    if (!$revision_id) {
        return new WP_Error('db_error', 'Failed to create revision', array('status' => 500));
    }

    // Add to wp_postmeta: _rvy_base_post_id
    add_post_meta($revision_id, '_rvy_base_post_id', $hero_id);

    // Update published post meta: _rvy_has_revisions
    update_post_meta($hero_id, '_rvy_has_revisions', 1);

    // Copy postmeta from the original hero post to the new revision
    $meta_data = $wpdb->get_results($wpdb->prepare(
        "SELECT meta_key, meta_value FROM $wpdb->postmeta WHERE post_id = %d",
        $hero_id
    ));
    foreach ($meta_data as $meta) {
        $wpdb->insert($wpdb->postmeta, array(
            'post_id'    => $revision_id,
            'meta_key'   => $meta->meta_key,
            'meta_value' => $meta->meta_value,
        ));
    }

    // Handle image upload (this will be used for 'illustration')
    require_once(ABSPATH . 'wp-admin/includes/image.php');
    require_once(ABSPATH . 'wp-admin/includes/file.php');
    require_once(ABSPATH . 'wp-admin/includes/media.php');

    $uploaded_file = wp_handle_upload(
        $_FILES['image'],
        array('test_form' => false)
    );

    if (isset($uploaded_file['error'])) {
        return new WP_Error('upload_error', $uploaded_file['error'], array('status' => 500));
    }

    // Insert the attachment into the media library (this is the original image for 'illustration')
    $original_attachment_id = wp_insert_attachment(array(
        'guid'           => $uploaded_file['url'],
        'post_mime_type' => $uploaded_file['type'],
        'post_title'     => basename($uploaded_file['file']),
        'post_content'   => '',
        'post_status'    => 'inherit'
    ), $uploaded_file['file'], $revision_id);

    if (is_wp_error($original_attachment_id)) {
        return new WP_Error('attachment_error', $original_attachment_id->get_error_message(), array('status' => 500));
    }

    // Generate metadata for the uploaded image and update attachment (original)
    $attachment_metadata = wp_generate_attachment_metadata($original_attachment_id, $uploaded_file['file']);
    wp_update_attachment_metadata($original_attachment_id, $attachment_metadata);

    // Add the original image to 'illustrations' repeater field
    $existing_illustrations = get_field('illustrations', $revision_id);

    if (!$existing_illustrations) {
        $existing_illustrations = array();
    }

    $new_row = array(
        'image' => $original_attachment_id,
        'name'  => $region,
    );

    $existing_illustrations[] = $new_row;

    // Update the repeater field with the new row appended
    update_field('illustrations', $existing_illustrations, $revision_id);

    // If the region is 'Global', create a cropped version as a new attachment
    if ($region === 'Global') {
        $image_editor = wp_get_image_editor($uploaded_file['file']);
        if (!is_wp_error($image_editor)) {
            // Crop the image
            $image_editor->crop($x, $y, $width, $height);
            $cropped_file = $image_editor->generate_filename('cropped');
            $image_editor->save($cropped_file);

            // Insert the cropped image as a new attachment
            $cropped_attachment_id = wp_insert_attachment(array(
                'guid'           => wp_get_attachment_url($cropped_file),
                'post_mime_type' => wp_check_filetype($cropped_file)['type'],
                'post_title'     => basename($cropped_file),
                'post_content'   => '',
                'post_status'    => 'inherit'
            ), $cropped_file, $revision_id);

            if (is_wp_error($cropped_attachment_id)) {
                return new WP_Error('cropped_attachment_error', $cropped_attachment_id->get_error_message(), array('status' => 500));
            }

            // Generate metadata for the cropped image and update attachment
            $cropped_metadata = wp_generate_attachment_metadata($cropped_attachment_id, $cropped_file);
            wp_update_attachment_metadata($cropped_attachment_id, $cropped_metadata);

            // Now, link the cropped image with the original attachment ID
            update_post_meta($cropped_attachment_id, 'acf_image_aspect_ratio_crop_original_image_id', $original_attachment_id);
            update_post_meta($cropped_attachment_id, 'acf_image_aspect_ratio_crop_coordinates', array(
                'x' => $x,
                'y' => $y,
                'width' => $width,
                'height' => $height,
            ));

            // Update the 'illustration' field with the cropped image's attachment ID
            update_field('illustration', $cropped_attachment_id, $revision_id);
        } else {
            return new WP_Error('crop_error', 'Image cropping failed', array('status' => 500));
        }
    }

    return array('success' => true, 'revision_id' => $revision_id);
}
