<?php

add_action('rest_api_init', function () {
    register_rest_route('heavenhold/v1', '/add-new-item', array(
        'methods'             => 'POST',
        'callback'            => 'add_new_item',
        'permission_callback' => '__return_true', // Adjust this according to your permission requirements
    ));
});

function add_new_item($request) {
    global $wpdb;

    // Get parameters from the request
    $item_name = $request->get_param('item_name');

    // Validate inputs
    if (empty($item_name)) {
        return new WP_Error('invalid_data', 'Item name required', array('status' => 400));
    }
    
    $post_data = array(
        'post_author'       => get_current_user_id(),
        'post_date'         => current_time('mysql'),
        'post_date_gmt'     => current_time('mysql', 1),
        'post_content'      => '',
        'post_title'        => $item_name,
        'post_status'       => 'publish',
        'comment_status'    => 'closed',
        'ping_status'       => 'closed',
        'post_type'         => 'items',        
        'post_name'         => strtolower($item_name),
    );
    $wpdb->insert($wpdb->posts, $post_data);
    $item_id = $wpdb->insert_id;

    if (!$item_id) {
        return new WP_Error('db_error', 'Failed to create item', array('status' => 500));
    }
    

    return array('success' => true, 'version' => '1.0.0');
}