<?php

class Articles {

  function __construct() {
    add_action( 'init', array($this, 'custom_post_type'));
  }

  // Register Custom Post Type
  function custom_post_type() {

    $labels = array(
      'name'                  => _x( 'Articles', 'Post Type General Name', 'text_domain' ),
      'singular_name'         => _x( 'Article', 'Post Type Singular Name', 'text_domain' ),
      'menu_name'             => __( 'Articles', 'text_domain' ),
      'name_admin_bar'        => __( 'Articles', 'text_domain' ),
      'all_Articles'             => __( 'See All', 'text_domain' )
    );

    $args = array(
      'label'                 => __( 'Articles', 'text_domain' ),
      'description'           => __( 'Articles', 'text_domain' ),
      'labels'                => $labels,
      'supports'              => array('title', 'excerpt', 'revisions'),
      'taxonomies'            => array('article_categories'),
      'hierarchical'          => false,
      'public'                => true,
      'show_ui'               => true,
      'show_in_menu'          => true,
      'menu_position'         => 5,
      'show_in_rest'          => true,
      'show_in_admin_bar'     => true,
      'show_in_nav_menus'     => true,
      'can_export'            => true,
      'has_archive'           => true,
      'exclude_from_search'   => false,
      'publicly_queryable'    => true,
      'capability_type'     => 'item',
      'map_meta_cap'        => true,
    );

    register_post_type( 'articles', $args );
  }

}


new Articles();
