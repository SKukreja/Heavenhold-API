<?php

class Heroes {

  function __construct() {
    add_action( 'init', array($this, 'custom_post_type'));
  }

  // Register Custom Post Type
  function custom_post_type() {

    $labels = array(
      'name'                  => _x( 'Heroes', 'Post Type General Name', 'text_domain' ),
      'singular_name'         => _x( 'Hero', 'Post Type Singular Name', 'text_domain' ),
      'menu_name'             => __( 'Heroes', 'text_domain' ),
      'name_admin_bar'        => __( 'Heroes', 'text_domain' ),
      'all_items'             => __( 'See All', 'text_domain' )
    );

    $args = array(
      'label'                 => __( 'Heroes', 'text_domain' ),
      'description'           => __( 'Heroes', 'text_domain' ),
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
      'rewrite'               => array('slug' => 'heroes', 'with_front' => true),
      'can_export'            => true,
      'has_archive'           => true,
      'exclude_from_search'   => false,
      'publicly_queryable'    => true,
      'capability_type'     => 'heroe',
      'map_meta_cap'        => true,
    );

    register_post_type( 'Heroes', $args );
  }

}


new Heroes();
