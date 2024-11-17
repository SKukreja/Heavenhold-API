<?php

class Guides {

  function __construct() {
    add_action( 'init', array($this, 'custom_post_type'));
  }

  // Register Custom Post Type
  function custom_post_type() {

    $labels = array(
      'name'                  => _x( 'Guides', 'Post Type General Name', 'heavenhold' ),
      'singular_name'         => _x( 'Guide', 'Post Type Singular Name', 'heavenhold' ),
      'menu_name'             => __( 'Guides', 'heavenhold' ),
      'name_admin_bar'        => __( 'Guides', 'heavenhold' ),
      'all_items'             => __( 'See All', 'heavenhold' )
    );

    $args = array(
      'label'                 => __( 'Guides', 'heavenhold' ),
      'description'           => __( 'Guides', 'heavenhold' ),
      'labels'                => $labels,
      'supports'              => array('title', 'excerpt', 'revisions'),
      'taxonomies'            => array('guide_categories'),
      'hierarchical'          => false,
      'public'                => true,
      'show_ui'               => true,
      'show_in_menu'          => true,
      'menu_position'         => 4,
      'show_in_rest'          => true,
      'show_in_admin_bar'     => true,
      'show_in_nav_menus'     => true,
      'show_in_graphql' => true, 
      'graphql_single_name' => 'guide', 
      'graphql_plural_name' => 'guides',
      'rewrite'               => array('slug' => 'guides', 'with_front' => true),
      'can_export'            => true,
      'has_archive'           => true,
      'exclude_from_search'   => false,
      'publicly_queryable'    => true,
      'capability_type'     => 'guide',
      'map_meta_cap'        => true,
    );

    register_post_type( 'Guides', $args );
  }

}


new Guides();

add_action( 'init', 'create_guide_taxonomies', 0 );

function create_guide_taxonomies() {

	register_taxonomy('guide_categories', 'guide', array(
    'public'                => true,
    'hierarchical'          => true,
    'show_admin_column'     => true,
    'show_in_nav_menus'     => false,
    'show_in_rest' 			=> true,
    'labels'                => array(
        'name'  => _x( 'Guide Categories', 'heavenhold-core'),
    )
  ));
}

?>
