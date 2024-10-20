<?php

add_action('rest_api_init', function () {
    register_rest_route('heavenhold/v1', '/update-bio', array(
        'methods'             => 'POST',
        'callback'            => 'heroes_update_bio',
        'permission_callback' => '__return_true', // Adjust this according to your permission requirements
    ));
});

function heroes_update_bio($request) {
    global $wpdb;

    // Get parameters from the request
    $hero_id = $request->get_param('hero_id');
    $height = $request->get_param('height');
    $weight = $request->get_param('weight');
    $age = $request->get_param('age');
    $species = $request->get_param('species');
    $role = $request->get_param('role');
    $element = $request->get_param('element');
    $rarity = $request->get_param('rarity');
    $confirmed = $request->get_param('confirmed');

    // Validate inputs
    if (empty($hero_id) || empty($age) || empty($species) || empty($role) || empty($element) || empty($height) || empty($weight) || empty($rarity)) {
        return new WP_Error('invalid_data', 'Hero ID and bio data are required', array('status' => 400));
    }

    // Get the published post
    $published_post = get_post($hero_id);
    if (!$published_post || $published_post->post_type != 'heroes') {
        return new WP_Error('invalid_post', 'Invalid hero ID', array('status' => 404));
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

        $target_post_id = $revision_id;
    } else {
        // Update the published post directly
        $target_post_id = $hero_id;
    }

    // Update the bio fields
    update_field('bio_fields_height', $height, $target_post_id);
    update_field('bio_fields_weight', $weight, $target_post_id);
    update_field('bio_fields_age', $age, $target_post_id);    
    update_field('bio_fields_species', $species, $target_post_id);
    update_field('bio_fields_role', $role, $target_post_id);
    update_field('bio_fields_rarity', $rarity, $target_post_id);
    update_field('bio_fields_element', $element, $target_post_id);

    return array('success' => true, 'post_id' => $target_post_id, 'version' => '1.0.0');
}
