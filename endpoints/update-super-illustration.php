<?php
add_action('rest_api_init', function () {
    register_rest_route('heavenhold/v1', '/update-super-illustration', array(
        'methods'             => 'POST',
        'callback'            => 'items_update_super_illustration',
        'permission_callback' => '__return_true', // Adjust this according to your permission requirements
    ));
});

function items_update_super_illustration($request) {
    global $wpdb;

    // Get parameters from the request
    $item_id = $request->get_param('item_id');
    $image = $request->get_file_params('image');
    $confirmed = $request->get_param('confirmed');

    // Validate inputs
    if (!isset($item_id) || !isset($image)) {
        return new WP_Error('invalid_data', 'Item ID and image are required', array('status' => 400));
    }

    // Get the published hero post
    $published_post = get_post($item_id);
    if (!$published_post || $published_post->post_type != 'items') {
        return new WP_Error('invalid_post', 'Invalid item ID', array('status' => 404));
    }

    // Decide whether to update the post directly or create a revision
    if (!$confirmed) {
        // Create a new pending revision
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

        // Insert the new revision into wp_posts
        $wpdb->insert($wpdb->posts, $post_data);
        $revision_id = $wpdb->insert_id;

        if (!$revision_id) {
            return new WP_Error('db_error', 'Failed to create revision', array('status' => 500));
        }

        // Add to wp_postmeta: _rvy_base_post_id
        add_post_meta($revision_id, '_rvy_base_post_id', $item_id);

        // Update published post meta: _rvy_has_revisions
        update_post_meta($item_id, '_rvy_has_revisions', 1);

        // Copy postmeta from the original hero post to the new revision
        $meta_data = $wpdb->get_results($wpdb->prepare(
            "SELECT meta_key, meta_value FROM $wpdb->postmeta WHERE post_id = %d",
            $item_id
        ));
        foreach ($meta_data as $meta) {
            $wpdb->insert($wpdb->postmeta, array(
                'post_id'    => $revision_id,
                'meta_key'   => $meta->meta_key,
                'meta_value' => $meta->meta_value,
            ));
        }

        $target_post_id = $revision_id;
    } else {
        // Update the published post directly
        $target_post_id = $item_id;
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
    $attachment_id = wp_insert_attachment(array(
        'guid'           => $uploaded_file['url'],
        'post_mime_type' => $uploaded_file['type'],
        'post_title'     => basename($uploaded_file['file']),
        'post_content'   => '',
        'post_status'    => 'inherit'
    ), $uploaded_file['file'], $target_post_id);

    if (is_wp_error($attachment_id)) {
        return new WP_Error('attachment_error', $attachment_id->get_error_message(), array('status' => 500));
    }

    // Generate metadata for the uploaded image and update the attachment
    $attachment_metadata = wp_generate_attachment_metadata($attachment_id, $uploaded_file['file']);
    wp_update_attachment_metadata($attachment_id, $attachment_metadata);

    

    // Update the repeater field with the new row appended
    update_field('illustration', $attachment_id, $target_post_id);
    update_field('super', true, $target_post_id);


    return array('success' => true, 'version' => '1.0.0');
}
