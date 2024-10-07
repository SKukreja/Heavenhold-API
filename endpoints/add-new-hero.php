<?php

add_action('rest_api_init', function () {
    register_rest_route('heavenhold/v1', '/add-new-hero', array(
        'methods'             => 'POST',
        'callback'            => 'add_new_hero',
        'permission_callback' => '__return_true', // Adjust this according to your permission requirements
    ));
});

function add_new_hero($request) {
    global $wpdb;

    // Get parameters from the request
    $hero_title = $request->get_param('hero_title');

    // Validate inputs
    if (empty($hero_title)) {
        return new WP_Error('invalid_data', 'Hero title required', array('status' => 400));
    }

    // Create a new 'heroes' post with hero_title as its title
    $post_data = array(
        'post_author'       => get_current_user_id(),
        'post_date'         => current_time('mysql'),
        'post_date_gmt'     => current_time('mysql', 1),
        'post_content'      => '',
        'post_title'        => $hero_title,
        'post_status'       => 'publish',
        'comment_status'    => 'closed',
        'ping_status'       => 'closed',
        'post_name'         => sanitize_title($hero_title),
        'post_type'         => 'heroes',
    );
    $wpdb->insert($wpdb->posts, $post_data);
    $hero_id = $wpdb->insert_id;

    if (!$hero_id) {
        return new WP_Error('db_error', 'Failed to create hero', array('status' => 500));
    }

    return array('success' => true, 'version' => '1.0.0');
}