<?php

add_action( 'init', 'create_article_taxonomies', 0 );

function create_article_taxonomies() {

	$labels = array(
		'name'              => _x( 'Typologies', 'taxonomy general name' ),
		'singular_name'     => _x( 'Typology', 'taxonomy singular name' ),
		'search_articles'      => __( 'Search Typologies' ),
		'all_articles'         => __( 'All Typologies' ),
		'parent_article'       => __( 'Parent Typology' ),
		'parent_article_colon' => __( 'Parent Typology:' ),
		'edit_article'         => __( 'Edit Typology' ),
		'update_article'       => __( 'Update Typology' ),
		'add_new_article'      => __( 'Add New Typology' ),
		'new_article_name'     => __( 'New Typology Name' ),
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
		'capabilities' => array(
			'manage_terms'=> 'manage_categories',
			'edit_terms'=> 'manage_categories',
			'delete_terms'=> 'manage_categories',
			'assign_terms' => 'read'
		  ),
	);

	register_taxonomy( 'article_categories', array( 'articles' ), $args );
}
?>
