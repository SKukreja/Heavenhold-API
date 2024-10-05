<?php

class Heroes {

  function __construct() {
    add_action( 'init', array($this, 'custom_post_type'));
  }

  // Register Custom Post Type
  function custom_post_type() {

    $labels = array(
      'name'                  => _x( 'Heroes', 'Post Type General Name', 'heavenhold' ),
      'singular_name'         => _x( 'Hero', 'Post Type Singular Name', 'heavenhold' ),
      'menu_name'             => __( 'Heroes', 'heavenhold' ),
      'name_admin_bar'        => __( 'Heroes', 'heavenhold' ),
      'all_items'             => __( 'See All', 'heavenhold' )
    );

    $args = array(
      'label'                 => __( 'Heroes', 'heavenhold' ),
      'description'           => __( 'Heroes', 'heavenhold' ),
      'labels'                => $labels,
      'supports'              => array('title', 'excerpt', 'revisions'),
      'taxonomies'            => array('hero_categories'),
      'hierarchical'          => false,
      'public'                => true,
      'show_ui'               => true,
      'show_in_menu'          => true,
      'menu_position'         => 4,
      'show_in_rest'          => true,
      'show_in_admin_bar'     => true,
      'show_in_nav_menus'     => true,
      'show_in_graphql' => true, 
      'graphql_single_name' => 'hero', 
      'graphql_plural_name' => 'heroes',
      'rewrite'               => array('slug' => 'heroes', 'with_front' => true),
      'can_export'            => true,
      'has_archive'           => true,
      'exclude_from_search'   => false,
      'publicly_queryable'    => true,
      'capability_type'     => 'heroes',
      'map_meta_cap'        => true,
    );

    register_post_type( 'Heroes', $args );
  }

}


new Heroes();
