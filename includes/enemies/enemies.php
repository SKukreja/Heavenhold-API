<?php

class Enemies {

  function __construct() {
    add_action( 'init', array($this, 'custom_post_type'));
  }

  // Register Custom Post Type
  function custom_post_type() {

    $labels = array(
      'name'                  => _x( 'Enemies', 'Post Type General Name', 'text_domain' ),
      'singular_name'         => _x( 'Enemy', 'Post Type Singular Name', 'text_domain' ),
      'menu_name'             => __( 'Enemies', 'text_domain' ),
      'name_admin_bar'        => __( 'Enemies', 'text_domain' ),
      'all_items'             => __( 'See All', 'text_domain' )
    );

    $args = array(
      'label'                 => __( 'Enemies', 'text_domain' ),
      'description'           => __( 'Enemies', 'text_domain' ),
      'labels'                => $labels,
      'supports'              => array('title', 'excerpt', 'revisions'),
      'taxonomies'            => array('enemy_categories'),
      'hierarchical'          => false,
      'public'                => true,
      'show_ui'               => true,
      'show_in_menu'          => true,
      'menu_position'         => 4,
      'show_in_rest'          => true,
      'show_in_admin_bar'     => true,
      'show_in_nav_menus'     => true,
      'rewrite'               => array('slug' => 'enemies', 'with_front' => true),
      'can_export'            => true,
      'has_archive'           => true,
      'exclude_from_search'   => false,
      'publicly_queryable'    => true,
      'capability_type'     => 'enemie',
      'map_meta_cap'        => true,
    );

    register_post_type( 'enemies', $args );
  }

}


new Enemies();
 