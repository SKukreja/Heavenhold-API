<?php

class Banners {

  function __construct() {
    add_action( 'init', array($this, 'custom_post_type'));
  }

  // Register Custom Post Type
  function custom_post_type() {

    $labels = array(
      'name'                  => _x( 'Banners', 'Post Type General Name', 'heavenhold' ),
      'singular_name'         => _x( 'Banner', 'Post Type Singular Name', 'heavenhold' ),
      'menu_name'             => __( 'Banners', 'heavenhold' ),
      'name_admin_bar'        => __( 'Banners', 'heavenhold' ),
      'all_items'             => __( 'See All', 'heavenhold' )
    );

    $args = array(
      'label'                 => __( 'Banners', 'heavenhold' ),
      'description'           => __( 'Banners', 'heavenhold' ),
      'labels'                => $labels,
      'supports'              => array('title', 'excerpt', 'revisions'),
      'taxonomies'            => array('banner_categories'),
      'hierarchical'          => false,
      'public'                => true,
      'show_ui'               => true,
      'show_in_menu'          => true,
      'menu_position'         => 5,
      'show_in_rest'          => true, 
      'show_in_admin_bar'     => true,
      'show_in_nav_menus'     => true,
      #'show_in_graphql' => true, # Set to false if you want to exclude this type from the GraphQL Schema
      #'graphql_single_name' => 'banner', 
      #'graphql_plural_name' => 'banners',
      'rewrite'               => array('slug' => 'banners', 'with_front' => true, 'pages' => true,'feeds' => true),
      'can_export'            => true,
      'has_archive'           => true,
      'exclude_from_search'   => false,
      'publicly_queryable'    => true,
      'capability_type'     => 'banner',
      'map_meta_cap'        => true,
    );

    register_post_type( 'Banners', $args );
  }

}


new Banners();

add_action( 'init', 'create_banner_taxonomies', 0 );

function create_banner_taxonomies() {

	register_taxonomy('banner_categories', 'banner', array(
    'public'                => true,
    'hierarchical'          => true,
    'show_admin_column'     => true,
    'show_in_nav_menus'     => false,
    'show_in_rest' 			=> true,
    'labels'                => array(
        'name'  => _x( 'Banner Categories', 'heavenhold-core'),
    )
  ));
}

?>
