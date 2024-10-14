<?php
add_action('rest_api_init', function () {
    register_rest_route('heavenhold/v1', '/update-weapon', array(
        'methods'             => 'POST',
        'callback'            => 'items_update_weapon',
        'permission_callback' => '__return_true', // Adjust this according to your permission requirements
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

    // Validate inputs
    if (!isset($item_id) || !isset($name)) {
        return new WP_Error('invalid_data', 'Weapon ID and name are required', array('status' => 400));
    }

    // Get the published hero post
    $published_post = get_post($item_id);
    if (!$published_post || $published_post->post_type != 'items') {
        // Create the post
        $post_data = array(
            'post_author'       => get_current_user_id(),
            'post_date'         => current_time('mysql'),
            'post_date_gmt'     => current_time('mysql', 1),
            'post_content'      => '',
            'post_title'        => $name,
            'post_status'       => 'publish',
            'comment_status'    => 'closed',
            'ping_status'       => 'closed',
            'post_name'         => sanitize_title($name),
            'post_type'         => 'items',
        );
        $wpdb->insert($wpdb->posts, $post_data);
        $added_id = $wpdb->insert_id;
        $published_post = get_post($added_id);
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

    // Get hero from heroes post type where title is equal to $hero
    $hero_post = get_page_by_title($hero, OBJECT, 'heroes');
    $hero_id = $hero_post->ID;
    delete_field('hero', $published_post);
    $hero_relationship = get_field('hero', $published_post, false);
    $hero_relationship[] = $hero_id;

    // Update the repeater field with the new row appended
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
    update_field('main_options', $main_option, $target_post_id);
    update_field('sub_options', $sub_option, $target_post_id);
    update_field('lb5_option', $limit_break_5_option, $target_post_id);
    update_field('lb5_value', $limit_break_5_value, $target_post_id);
    update_field('engraving', $engraving_options, $target_post_id);
    update_field('max_lines', $max_lines, $target_post_id);
    update_field('hero', $hero_relationship, $target_post_id);
    
    return array('success' => true, 'version' => '1.0.0');
}
