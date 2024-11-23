<?php

class Blog {

  function __construct() {
    add_action( 'init', array($this, 'custom_post_type'));
  }

  // Register Custom Post Type
  function custom_post_type() {

    $labels = array(
      'name'                  => _x( 'Blog', 'Post Type General Name', 'heavenhold' ),
      'singular_name'         => _x( 'Blog', 'Post Type Singular Name', 'heavenhold' ),
      'menu_name'             => __( 'Blog', 'heavenhold' ),
      'name_admin_bar'        => __( 'Blog', 'heavenhold' ),
      'all_items'             => __( 'See All', 'heavenhold' ),
      'add_new'               => __( 'Add Blog Post', 'heavenhold' ),
      'add_new_item'          => __( 'Add New Blog Post', 'heavenhold' )
    );

    $args = array(
      'label'                 => __( 'Blog', 'heavenhold' ),
      'description'           => __( 'Blog', 'heavenhold' ),
      'labels'                => $labels,
      'supports'              => array('title', 'excerpt', 'revisions'),
      'taxonomies'            => array('blog_categories'),
      'hierarchical'          => false,
      'public'                => true,
      'show_ui'               => true,
      'show_in_menu'          => true,
      'menu_position'         => 4,
      'show_in_rest'          => true,
      'show_in_admin_bar'     => true,
      'show_in_nav_menus'     => true,
      'show_in_graphql' => true, 
      'graphql_single_name' => 'blog', 
      'graphql_plural_name' => 'blog',
      'rewrite'               => array('slug' => 'blog', 'with_front' => true),
      'can_export'            => true,
      'has_archive'           => true,
      'exclude_from_search'   => false,
      'publicly_queryable'    => true,
      'capability_type'     => 'blog',
      'map_meta_cap'        => true,
    );

    register_post_type( 'Blog', $args );
  }

}


new Blog();

add_action( 'init', 'create_blog_taxonomies', 0 );

function create_blog_taxonomies() {

	register_taxonomy('blog_categories', 'guide', array(
    'public'                => true,
    'hierarchical'          => true,
    'show_admin_column'     => true,
    'show_in_nav_menus'     => false,
    'show_in_rest' 			=> true,
    'labels'                => array(
        'name'  => _x( 'Blog Categories', 'heavenhold-core'),
    )
  ));
}

?>
