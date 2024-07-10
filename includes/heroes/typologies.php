<?php

add_action( 'init', 'create_hero_taxonomies', 0 );

function create_hero_taxonomies() {

	$labels = array(
		'name'              => _x( 'Typologies', 'taxonomy general name' ),
		'singular_name'     => _x( 'Typology', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Typologies' ),
		'all_items'         => __( 'All Typologies' ),
		'parent_item'       => __( 'Parent Typology' ),
		'parent_item_colon' => __( 'Parent Typology:' ),
		'edit_item'         => __( 'Edit Typology' ),
		'update_item'       => __( 'Update Typology' ),
		'add_new_item'      => __( 'Add New Typology' ),
		'new_item_name'     => __( 'New Typology Name' ),
		'menu_name'         => __( 'Typologies' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'show_in_rest'      => true,
		'query_var'         => true,
		'update_count_callback' => '_update_post_term_count',
		'rewrite'           => array( 'slug' => 'typology' ),
	);

	register_taxonomy( 'hero_categories', array( 'heroes' ), $args );
}
?>
