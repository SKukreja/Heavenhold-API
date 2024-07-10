<?php

class Items {

  function __construct() {
    add_action( 'init', array($this, 'custom_post_type'));
  }

  // Register Custom Post Type
  function custom_post_type() {

    $labels = array(
      'name'                  => _x( 'Equipment', 'Post Type General Name', 'text_domain' ),
      'singular_name'         => _x( 'Item', 'Post Type Singular Name', 'text_domain' ),
      'menu_name'             => __( 'Equipment', 'text_domain' ),
      'name_admin_bar'        => __( 'Equipment', 'text_domain' ),
      'all_items'             => __( 'See All', 'text_domain' )
    );

    $args = array(
      'label'                 => __( 'Equipment', 'text_domain' ),
      'description'           => __( 'Equipment', 'text_domain' ),
      'labels'                => $labels,
      'supports'              => array('title', 'excerpt', 'revisions'),
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
