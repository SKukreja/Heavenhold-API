<?php

add_action( 'init', 'create_metareport_taxonomies', 0 );

function create_metareport_taxonomies() {

	$labels = array(
		'name'              => _x( 'Regions', 'taxonomy general name' ),
		'singular_name'     => _x( 'Region', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Regions' ),
		'all_items'         => __( 'All Regions' ),
		'parent_item'       => __( 'Parent Region' ),
		'parent_item_colon' => __( 'Parent Region:' ),
		'edit_item'         => __( 'Edit Region' ),
		'update_item'       => __( 'Update Region' ),
		'add_new_item'      => __( 'Add New Region' ),
		'new_item_name'     => __( 'New Region Name' ),
		'menu_name'         => __( 'Regions' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'show_in_rest'      => true,
		'query_var'         => true,
		'update_count_callback' => '_update_post_term_count',
		'rewrite'           => array( 'slug' => 'region' ),
		'capabilities' => array(
			'manage_terms'=> 'manage_metareports',
			'edit_terms'=> 'manage_metareports',
			'delete_terms'=> 'manage_metareports',
			'assign_terms' => 'read'
		  ),
	);

	register_taxonomy( 'metareport_categories', array( 'metareports' ), $args );
}
?>
