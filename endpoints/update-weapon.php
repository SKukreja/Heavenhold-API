<?php
add_action('rest_api_init', function () {
    register_rest_route('heavenhold/v1', '/update-weapon', array(
        'methods'             => 'POST',
        'callback'            => 'items_update_weapon',
        'permission_callback' => '__return_true',
    ));
});

function items_update_weapon($request) {
    global $wpdb;

    // Get parameters from the request
    $item_id = $request->get_param('item_id');
    $name = $request->get_param('name');
    $rarity = $request->get_param('rarity');
    $weapon_type = $request->get_param('weapon_type');
    $exclusive = $request->get_param('exclusive');
    $hero = $request->get_param('hero');
    $exclusive_effects = $request->get_param('exclusive_effects');
    $min_dps = $request->get_param('min_dps');
    $max_dps = $request->get_param('max_dps');
    $weapon_skill_name = $request->get_param('weapon_skill_name');
    $weapon_skill_atk = $request->get_param('weapon_skill_atk');
    $weapon_skill_regen_time = $request->get_param('weapon_skill_regen_time');
    $weapon_skill_description = $request->get_param('weapon_skill_description');
    $weapon_skill_chain = $request->get_param('weapon_skill_chain');
    $main_option = $request->get_param('main_option');
    $sub_option = $request->get_param('sub_option');
    $limit_break_5_option = $request->get_param('limit_break_5_option');
    $limit_break_5_value = $request->get_param('limit_break_5_value');
    $engraving_options = $request->get_param('engraving_options');
    $max_lines = $request->get_param('max_lines');
    $confirmed = $request->get_param('confirmed');

    if (!isset($item_id) || !isset($name)) {
        return new WP_Error('invalid_data', 'Weapon ID and name are required', array('status' => 400));
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

    // Process Main Options
    process_repeater_field($main_option, 'main_options', $target_post_id);

    // Process Sub Options
    process_repeater_field($sub_option, 'sub_stats', $target_post_id);

    // Handle Engraving Options
    if (isset($engraving_options)) {
        if (!isset($engraving_options[0]) || !is_array($engraving_options[0])) {
            $engraving_options = [$engraving_options];
        }
        update_field('engraving', $engraving_options, $target_post_id);
    }

    // Update other fields
    update_field('max_level', 100, $target_post_id);
    update_field('rarity', $rarity, $target_post_id);
    update_field('weapon_type', $weapon_type, $target_post_id);
    update_field('exclusive', $exclusive, $target_post_id);
    update_field('exclusive_effects', $exclusive_effects, $target_post_id);
    update_field('min_dps', $min_dps, $target_post_id);
    update_field('dps', $max_dps, $target_post_id);
    update_field('weapon_skill_name', $weapon_skill_name, $target_post_id);
    update_field('weapon_skill_atk', $weapon_skill_atk, $target_post_id);
    update_field('weapon_skill_regen_time', $weapon_skill_regen_time, $target_post_id);
    update_field('weapon_skill_description', $weapon_skill_description, $target_post_id);
    update_field('weapon_skill_chain', $weapon_skill_chain, $target_post_id);
    update_field('lb5_option', $limit_break_5_option, $target_post_id);
    update_field('lb5_value', $limit_break_5_value, $target_post_id);
    update_field('max_lines', $max_lines, $target_post_id);

    return array('success' => true, 'version' => '1.0.0');
}

// Helper function to process repeater fields
function process_repeater_field($data, $field_name, $post_id) {
    // Initialize the repeater field if it doesn't exist
    if (empty(get_field($field_name, $post_id))) {
        update_field($field_name, [], $post_id);
    }

    // Delete existing rows to avoid duplication
    delete_field($field_name, $post_id);

    if (!is_array($data) || empty($data)) {
        error_log("No valid data provided for $field_name");
        return;
    }

    foreach ($data as $index => $row) {
        error_log("Processing row $index for $field_name: " . print_r($row, true));

        // Ensure 'stat' is a string and not an array
        $stat_value = is_array($row['stat']) ? $row['stat'][0] : $row['stat'];

        // Prepare the row data
        $prepared_row = [
            'stat' => (string)$stat_value,
            'is_range' => !empty($row['is_range']) ? '1' : '0',
            'value' => (string)($row['value'] ?? '0'),
            'minimum_value' => (string)($row['minimum_value'] ?? '0'),
            'maximum_value' => (string)($row['maximum_value'] ?? '0'),
        ];

        error_log("Prepared row $index: " . print_r($prepared_row, true));

        // Add row to the repeater field
        if (!add_row($field_name, $prepared_row, $post_id)) {
            error_log("Failed to add row $index to $field_name");
        }
    }
}