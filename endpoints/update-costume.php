<?php
add_action('rest_api_init', function () {
    register_rest_route('heavenhold/v1', '/update-costume', array(
        'methods'             => 'POST',
        'callback'            => 'items_update_costume',
        'permission_callback' => '__return_true',
    ));
});

function items_update_costume($request) {
    // Get parameters from the request
    $item_id   = $request->get_param('item_id');
    $item_type = $request->get_param('item_type');
    $name      = $request->get_param('item_name');
    $hero_id   = $request->get_param('hero_id');
    $image     = $request->get_file_params('image');
    $confirmed = $request->get_param('confirmed');

    // Check if item_type and hero_id are empty
    if (empty($item_type) && empty($hero_id)) {
        return new WP_Error('invalid_data', 'Item type or hero ID are required', array('status' => 400));
    }

    // Retrieve or create the post
    $published_post = get_post($item_id);
    if (!$published_post || $published_post->post_type != 'items') {
        $post_data = array(
            'post_author' => get_current_user_id(),
            'post_date'   => current_time('mysql'),
            'post_title'  => $name,
            'post_name'   => sanitize_title($name),
            'post_status' => 'publish',
            'post_type'   => 'items',
        );
        $item_id = wp_insert_post($post_data);
        if (is_wp_error($item_id)) {
            error_log('wp_insert_post error: ' . $item_id->get_error_message());
            return new WP_Error('insert_error', 'Could not create new post', array('status' => 500));
        }
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
        error_log('wp_handle_upload error: ' . $uploaded_file['error']);
        return new WP_Error('upload_error', $uploaded_file['error'], array('status' => 500));
    }

    // Insert the attachment into the WordPress media library
    $attachment_id = wp_insert_attachment(array(
        'guid'           => $uploaded_file['url'],
        'post_mime_type' => $uploaded_file['type'],
        'post_title'     => basename($uploaded_file['file']),
        'post_content'   => '',
        'post_status'    => 'inherit'
    ), $uploaded_file['file'], $target_post_id);

    if (is_wp_error($attachment_id)) {
        error_log('wp_insert_attachment error: ' . $attachment_id->get_error_message());
        return new WP_Error('attachment_error', $attachment_id->get_error_message(), array('status' => 500));
    }

    // Generate metadata for the uploaded image and update the attachment
    $attachment_metadata = wp_generate_attachment_metadata($attachment_id, $uploaded_file['file']);
    wp_update_attachment_metadata($attachment_id, $attachment_metadata);

    // Update other fields
    update_field('image', $attachment_id, $target_post_id);
    if (!empty($item_type)) update_field('costume_weapon_type', $item_type, $target_post_id);
    if (!empty($hero_id)) update_field('hero', $hero_id, $target_post_id);

    // Replace item_categories taxonomy terms
    $item_category_slug = !empty($item_type) ? 'equipment-costume' : 'costumes';
    $taxonomy = 'item_categories'; // Correct taxonomy name

    // Get or create the term
    $term = get_term_by('slug', $item_category_slug, $taxonomy);
    if (!$term || is_wp_error($term)) {
        $new_term = wp_insert_term($item_category_slug, $taxonomy, array('slug' => $item_category_slug));
        if (is_wp_error($new_term)) {
            error_log('wp_insert_term error: ' . $new_term->get_error_message());
            return new WP_Error('term_error', 'Could not create item category term', array('status' => 500));
        }
        $term_id = $new_term['term_id'];
    } else {
        $term_id = $term->term_id;
    }

    // Set the term to the post
    $result = wp_set_post_terms($target_post_id, array($term_id), $taxonomy, false);
    if (is_wp_error($result)) {
        error_log('wp_set_post_terms error: ' . $result->get_error_message());
        return new WP_Error('term_set_error', 'Could not set item category term', array('status' => 500));
    }

    return array('success' => true, 'version' => '1.0.0');
}
