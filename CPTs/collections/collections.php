<?php

class Collections {

  function __construct() {
    add_action( 'init', array($this, 'custom_post_type'));
  }

  // Register Custom Post Type
  function custom_post_type() {

    $labels = array(
      'name'                  => _x( 'Collections', 'Post Type General Name', 'heavenhold' ),
      'singular_name'         => _x( 'Collection', 'Post Type Singular Name', 'heavenhold' ),
      'menu_name'             => __( 'Collections', 'heavenhold' ),
      'name_admin_bar'        => __( 'Collections', 'heavenhold' ),
      'all_items'             => __( 'See All', 'heavenhold' )
    );

    $args = array(
      'label'                 => __( 'Collections', 'heavenhold' ),
      'description'           => __( 'Collections', 'heavenhold' ),
      'labels'                => $labels,
      'supports'              => array('title', 'excerpt', 'revisions'),
      'taxonomies'            => array('collection_categories'),
      'hierarchical'          => false,
      'public'                => true,
      'show_ui'               => true,
      'show_in_menu'          => true,
      'menu_position'         => 6,
      'show_in_rest'          => true,
      'show_in_admin_bar'     => true,
      'show_in_nav_menus'     => true,
      'show_in_graphql' => true, # Set to false if you want to exclude this type from the GraphQL Schema
      'graphql_single_name' => 'collection', 
      'graphql_plural_name' => 'collections',
      'can_export'            => true,
      'has_archive'           => true,
      'exclude_from_search'   => false,
      'publicly_queryable'    => true,
      'capability_type'     => 'collection',
      'map_meta_cap'        => true
    );

    register_post_type( 'collections', $args );
  }

}
 

new Collections();
