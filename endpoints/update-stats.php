<?php

add_action('rest_api_init', function () {
    register_rest_route('heavenhold/v1', '/update-stats', array(
        'methods'             => 'POST',
        'callback'            => 'heroes_update_stats',
        'permission_callback' => '__return_true', // Adjust this according to your permission requirements
    ));
});

function heroes_update_stats($request) {
	global $wpdb;

    // Get parameters from the request
    $hero_id = $request->get_param('hero_id');
    $atk = $request->get_param('atk');
    $hp = $request->get_param('hp');
    $def = $request->get_param('def');
    $crit = $request->get_param('crit');
    $heal = $request->get_param('heal');
    $damage_reduction = $request->get_param('damage_reduction');
    $basic_resistance = $request->get_param('basic_resistance');
    $light_resistance = $request->get_param('light_resistance');
    $dark_resistance = $request->get_param('dark_resistance');
    $fire_resistance = $request->get_param('fire_resistance');
    $earth_resistance = $request->get_param('earth_resistance');
    $water_resistance = $request->get_param('water_resistance');
    $compatible_equipment = $request->get_param('compatible_equipment');
    $passives = $request->get_param('passives');

    // Log parameters for testing
    error_log(print_r($request->get_params(), true));

    if (
        !isset($hero_id) || !isset($atk) || !isset($hp) || !isset($def) ||
        !isset($crit) || !isset($heal) || !isset($damage_reduction) ||
        !isset($basic_resistance) || !isset($light_resistance) || !isset($dark_resistance) ||
        !isset($fire_resistance) || !isset($earth_resistance) || !isset($water_resistance) ||
        empty($compatible_equipment) || empty($passives)
    ) {
        return new WP_Error('invalid_data', 'Hero ID and stat data are required', array('status' => 400));
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
        'comment_count'     => $hero_id, // As per documentation
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

    update_field('bio_fields_max_level', 100, $revision_id);
    update_field('card_slot', 2 , $revision_id);
    update_field('stat_fields_atk', $atk, $revision_id);
    update_field('stat_fields_hp', $hp, $revision_id);
    update_field('stat_fields_def', $def, $revision_id);    
    update_field('stat_fields_crit', $crit, $revision_id);
    update_field('stat_fields_heal', $heal, $revision_id);    
    update_field('stat_fields_damage_reduction', $damage_reduction, $revision_id);    
    update_field('stat_fields_basic_resistance', $basic_resistance, $revision_id);
    update_field('stat_fields_light_resistance', $light_resistance, $revision_id);
    update_field('stat_fields_dark_resistance', $dark_resistance, $revision_id);
    update_field('stat_fields_fire_resistance', $fire_resistance, $revision_id);
    update_field('stat_fields_earth_resistance', $earth_resistance, $revision_id);
    update_field('stat_fields_water_resistance', $water_resistance, $revision_id);
    update_field('bio_fields_compatible_equipment', $compatible_equipment, $revision_id);
    update_field('ability_fields_passive_buffs', $passives, $revision_id);

    return array('success' => true, 'revision_id' => $revision_id, 'story' => $story, 'version' => '1.0.0');
}
