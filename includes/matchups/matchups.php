<?php

class Matchups {

  function __construct() {
    add_action( 'init', array($this, 'custom_post_type'));
  }

  // Register Custom Post Type
  function custom_post_type() {

    $labels = array(
      'name'                  => _x( 'Matchups', 'Post Type General Name', 'text_domain' ),
      'singular_name'         => _x( 'Matchup', 'Post Type Singular Name', 'text_domain' ),
      'menu_name'             => __( 'Matchups', 'text_domain' ),
      'name_admin_bar'        => __( 'Matchups', 'text_domain' ),
      'all_items'             => __( 'See All', 'text_domain' )
    );

    $args = array(
      'label'                 => __( 'Matchups', 'text_domain' ),
      'description'           => __( 'Matchups', 'text_domain' ),
      'labels'                => $labels,
      'supports'              => array('title', 'excerpt', 'revisions'),
      'hierarchical'          => false,
      'taxonomies'            => array('matchup_categories'),
      'public'                => true,
      'show_ui'               => true,
      'show_in_menu'          => true,
      'menu_position'         => 7,
      'show_in_rest'          => true,
      'show_in_admin_bar'     => true,
      'show_in_nav_menus'     => true,
      'can_export'            => true,
      'has_archive'           => true,
      'exclude_from_search'   => false,
      'publicly_queryable'    => true,
      'capability_type'       => 'page',
    );

    register_post_type( 'matchups', $args );
  }

}
 

new Matchups();
