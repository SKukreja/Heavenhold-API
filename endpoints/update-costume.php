<?php
add_action('rest_api_init', function () {
    register_rest_route('heavenhold/v1', '/update-costume', array(
        'methods'             => 'POST',
        'callback'            => 'items_update_costume',
        'permission_callback' => '__return_true',
    ));
});

function items_update_costume($request) {
    global $wpdb;

    // Get parameters from the request
    $item_id = $request->get_param('item_id');
    $item_type = $request->get_param('item_type');
    $hero_id = $request->get_param('hero_id');
    $image = $request->get_file_params('image');
    $confirmed = $request->get_param('confirmed');

    if (!isset($item_id) || (!isset($item_type) && !isset($hero_id))) {
        return new WP_Error('invalid_data', 'Item ID and item type or hero ID are required', array('status' => 400));
    }

    // Retrieve or create the post
    $published_post = get_post($item_id);
    if (!$published_post || $published_post->post_type != 'items') {
        $post_data = array(
            'post_author' => get_current_user_id(),
            'post_date'   => current_time('mysql'),
            'post_title'  => $name,
            'post_status' => 'publish',
            'post_type'   => 'items',
        );
        $wpdb->insert($wpdb->posts, $post_data);
        $item_id = $wpdb->insert_id;
        $published_post = get_post($item_id);
    }

    $target_post_id = $confirmed ? $item_id : create_revision($published_post);

    // Handle the image upload
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

    // Insert the attachment into the WordPress media library
    $attachment_id = wp_insert_attachment(array(
        'guid'           => $uploaded_file['url'],
        'post_mime_type' => $uploaded_file['type'],
        'post_title'     => basename($uploaded_file['file']),
        'post_content'   => '',
        'post_status'    => 'inherit'
    ), $uploaded_file['file'], $target_post_id); // Attach to the correct post

    if (is_wp_error($attachment_id)) {
        return new WP_Error('attachment_error', $attachment_id->get_error_message(), array('status' => 500));
    }

    // Generate metadata for the uploaded image and update the attachment
    $attachment_metadata = wp_generate_attachment_metadata($attachment_id, $uploaded_file['file']);
    wp_update_attachment_metadata($attachment_id, $attachment_metadata);

    // Update other fields
    update_field('image', $attachment_id, $target_post_id);
    if (isset($item_type)) update_field('costume_weapon_type', $item_type, $target_post_id);
    if (isset($hero_id)) update_field('hero', $hero_id, $target_post_id);
    // replace item_category taxonomies set to the one with the slug 'costume' if $item_type is null and $hero_id is set, otherwise set it the one with the slug 'equipment-costume'
    $item_category = isset($item_type) ? 'equipment-costume' : 'costumes';
    wp_set_post_terms($target_post_id, $item_category, 'item_category');

    return array('success' => true, 'version' => '1.0.0');
}