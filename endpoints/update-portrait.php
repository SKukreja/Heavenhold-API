<?php

add_action('rest_api_init', function () {
    register_rest_route('heavenhold/v1', '/update-portrait', array(
        'methods'             => 'POST',
        'callback'            => 'heroes_update_portrait',
        'permission_callback' => '__return_true', // Adjust this according to your permission requirements
    ));
});

function heroes_update_portrait($request) {
    global $wpdb;

    // Get parameters from the request
    $hero_id = $request->get_param('hero_id');
    $region = $request->get_param('region');
    $image = $request->get_file_params('image');

    // Validate inputs
    if (empty($hero_id) || empty($image)) {
        return new WP_Error('invalid_data', 'Hero ID and image are required', array('status' => 400));
    }

    // Get the published post
    $published_post = get_post($hero_id);

    if (!$published_post || $published_post->post_type != 'heroes') {
        return new WP_Error('invalid_post', 'Invalid hero ID', array('status' => 404));
    }

    // Prepare data for the new pending revision
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
        'comment_count'     => $hero_id,
    );

    // Insert the new revision into wp_posts
    $wpdb->insert($wpdb->posts, $post_data);
    $revision_id = $wpdb->insert_id;

    if (!$revision_id) {
        return new WP_Error('db_error', 'Failed to create revision', array('status' => 500));
    }

    // Add to wp_postmeta: _rvy_base_post_id
    add_post_meta($revision_id, '_rvy_base_post_id', $hero_id);

    // Update published post meta: _rvy_has_revisions
    update_post_meta($hero_id, '_rvy_has_revisions', 1);

    // Copy all postmeta from published post to revision
    $meta_data = $wpdb->get_results($wpdb->prepare(
        "SELECT meta_key, meta_value FROM $wpdb->postmeta WHERE post_id = %d",
        $hero_id
    ));

    if ($meta_data) {
        foreach ($meta_data as $meta) {
            $wpdb->insert($wpdb->postmeta, array(
                'post_id'    => $revision_id,
                'meta_key'   => $meta->meta_key,
                'meta_value' => $meta->meta_value,
            ));
        }
    }

    require_once(ABSPATH . 'wp-admin/includes/image.php');
    require_once(ABSPATH . 'wp-admin/includes/file.php');
    require_once(ABSPATH . 'wp-admin/includes/media.php');

    // Handle the upload
    $uploaded_file = wp_handle_upload(
        $_FILES['image'], 
        array('test_form' => false)
    );

    if (isset($uploaded_file['error'])) {
        return new WP_Error('upload_error', $uploaded_file['error'], array('status' => 500));
    }

    // Insert the attachment into the WordPress media library
    $attachment_id = wp_insert_attachment(array(
        'guid'           => $uploaded_file['url'],
        'post_mime_type' => $uploaded_file['type'],
        'post_title'     => basename($uploaded_file['file']),
        'post_content'   => '',
        'post_status'    => 'inherit'
    ), $uploaded_file['file'], $revision_id);

    if (is_wp_error($attachment_id)) {
        return new WP_Error('attachment_error', $attachment_id->get_error_message(), array('status' => 500));
    }

    // Generate metadata for the uploaded image and update the attachment
    $attachment_metadata = wp_generate_attachment_metadata($attachment_id, $uploaded_file['file']);
    wp_update_attachment_metadata($attachment_id, $attachment_metadata);

    // Retrieve the current rows in the repeater field
    $existing_portraits = get_field('portrait', $revision_id);

    // If no rows exist, initialize an empty array
    if (!$existing_portraits) {
        $existing_portraits = array();
    }

    // Append the new row to the existing rows
    $new_row = array(
        'art' => $attachment_id,
        'title' => $region,
    );
    $existing_portraits[] = $new_row;

    // Update the repeater field with the new row appended
    update_field('portrait', $existing_portraits, $revision_id);

    return array('success' => true, 'revision_id' => $revision_id, 'version' => '1.0.0');
}
