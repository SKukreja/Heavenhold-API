<?php

class Items {

  function __construct() {
    add_action( 'init', array($this, 'custom_post_type'));
  }

  // Register Custom Post Type
  function custom_post_type() {

    $labels = array(
      'name'                  => _x( 'Equipment', 'Post Type General Name', 'heavenhold' ),
      'singular_name'         => _x( 'Item', 'Post Type Singular Name', 'heavenhold' ),
      'menu_name'             => __( 'Equipment', 'heavenhold' ),
      'name_admin_bar'        => __( 'Equipment', 'heavenhold' ),
      'all_items'             => __( 'See All', 'heavenhold' )
    );

    $args = array(
      'label'                 => __( 'Equipment', 'heavenhold' ),
      'description'           => __( 'Equipment', 'heavenhold' ),
      'labels'                => $labels,
      'supports'              => array('title', 'excerpt', 'thumbnail', 'revisions'),
      'taxonomies'            => array('item_categories'),
      'hierarchical'          => false,
      'public'                => true,
      'show_ui'               => true,
      'show_in_menu'          => true,
      'menu_position'         => 5,
      'show_in_rest'          => true,
      'show_in_admin_bar'     => true,
      'show_in_nav_menus'     => true,
      'show_in_graphql' => true, # Set to false if you want to exclude this type from the GraphQL Schema
      'graphql_single_name' => 'item', 
      'graphql_plural_name' => 'items',
      'can_export'            => true,
      'has_archive'           => true,
      'exclude_from_search'   => false,
      'publicly_queryable'    => true,
      'capability_type'     => 'item',
      'map_meta_cap'        => true,
    );

    register_post_type( 'items', $args );
  }

}


new Items();
