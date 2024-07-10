<?php
/**
 * heavenhold functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package heavenhold
 */
add_theme_support( 'menus' );
include_once(dirname(__FILE__) . '/includes/heroes/_init.php');
include_once(dirname(__FILE__) . '/includes/items/_init.php');
include_once(dirname(__FILE__) . '/includes/teams/_init.php');
include_once(dirname(__FILE__) . '/includes/articles/_init.php');
include_once(dirname(__FILE__) . '/includes/collections/_init.php');
include_once(dirname(__FILE__) . '/includes/enemies/_init.php');
include_once(dirname(__FILE__) . '/includes/matchups/_init.php');
include_once(dirname(__FILE__) . '/includes/reports/_init.php'); 
include_once(dirname(__FILE__) . '/includes/banners/_init.php'); 
add_post_type_support( 'heroes', array('title', 'thumbnail', 'comments') );
add_post_type_support( 'items', array('title', 'thumbnail', 'comments') );
add_post_type_support( 'articles', array('title', 'thumbnail', 'editor', 'comments') );
add_post_type_support( 'guide', array('title', 'thumbnail', 'editor', 'comments') );
add_post_type_support( 'enemies', array('title', 'thumbnail', 'comments') );
add_post_type_support( 'banners', array('title', 'thumbnail', 'comments') );


if ( ! function_exists( 'heavenhold_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function heavenhold_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on gull, use a find and replace
	 * to change 'gull' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'heavenhold', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Enable excerpt support for page
    add_post_type_support( 'page', 'excerpt' );

    // Enable WooCommerce Support
    add_theme_support( 'woocommerce' );

    /*
     * Let WordPress manage the document title.
     * By adding theme support, we declare that this theme does not use a
     * hard-coded <title> tag in the document head, and expect WordPress to
     * provide it for us.
     */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
    add_post_type_support( 'forum', 'thumbnail' );
    add_theme_support( 'post-formats', array( 'audio', 'video', 'quote', 'link' ) );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'main_menu'   => esc_html__( 'Main menu', 'heavenhold' ),
	));

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	));

    add_theme_support( 'align-wide' );
    add_theme_support( 'editor-styles' );
    add_editor_style( 'style-editor.css' );
    add_theme_support( 'responsive-embeds' );
}
endif;
add_action( 'after_setup_theme', 'heavenhold_setup' );


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function heavenhold_content_width() {
    $GLOBALS['content_width'] = apply_filters( 'heavenhold_content_width', 1170 );
}
add_action( 'after_setup_theme', 'heavenhold_content_width', 0 );



function getElement($element) {
	if ($element=='Basic') {
		echo '<img class="element-icon" src="'.get_template_directory_uri().'/assets/img/icons/basic.png" /> <span class="element-text">Basic</span>';
	}
	else if ($element=='Light') {
		echo '<img class="element-icon" src="'.get_template_directory_uri().'/assets/img/icons/light.png" /> <span class="element-text">Light</span>';
	}
	else if ($element=='Dark') {
		echo '<img class="element-icon" src="'.get_template_directory_uri().'/assets/img/icons/dark.png" /> <span class="element-text">Dark</span>';
	}
	else if ($element=='Fire') {
		echo '<img class="element-icon" src="'.get_template_directory_uri().'/assets/img/icons/fire.png" /> <span class="element-text">Fire</span>';
	}
	else if ($element=='Water') {
		echo '<img class="element-icon" src="'.get_template_directory_uri().'/assets/img/icons/water.png" /> <span class="element-text">Water</span>';
	}
	else if ($element=='Earth') {
		echo '<img class="element-icon" src="'.get_template_directory_uri().'/assets/img/icons/earth.png" /> <span class="element-text">Earth</span>';
	}
}

add_action( 'after_setup_theme', 'getElement');

function getElementIcon($element) {
	if ($element=='Basic') {
		echo '<img class="element-icon" src="'.get_template_directory_uri().'/assets/img/icons/basic.png" />';
	}
	else if ($element=='Light') {
		echo '<img class="element-icon" src="'.get_template_directory_uri().'/assets/img/icons/light.png" />';
	}
	else if ($element=='Dark') {
		echo '<img class="element-icon" src="'.get_template_directory_uri().'/assets/img/icons/dark.png" />';
	}
	else if ($element=='Fire') {
		echo '<img class="element-icon" src="'.get_template_directory_uri().'/assets/img/icons/fire.png" />';
	}
	else if ($element=='Water') {
		echo '<img class="element-icon" src="'.get_template_directory_uri().'/assets/img/icons/water.png" />';
	}
	else if ($element=='Earth') {
		echo '<img class="element-icon" src="'.get_template_directory_uri().'/assets/img/icons/earth.png" />';
	}
}

function getElementImage($atts = array()) {
	extract(shortcode_atts(array(
		'element' => 'Basic'
	), $atts));

	if ($element=='Basic') {
		return '<img class="element-icon" src="'.get_template_directory_uri().'/assets/img/icons/basic.png" />';
	}
	else if ($element=='Light') {
		return '<img class="element-icon" src="'.get_template_directory_uri().'/assets/img/icons/light.png" />';
	}
	else if ($element=='Dark') {
		return '<img class="element-icon" src="'.get_template_directory_uri().'/assets/img/icons/dark.png" />';
	}
	else if ($element=='Fire') {
		return '<img class="element-icon" src="'.get_template_directory_uri().'/assets/img/icons/fire.png" />';
	}
	else if ($element=='Water') {
		return '<img class="element-icon" src="'.get_template_directory_uri().'/assets/img/icons/water.png" />';
	}
	else if ($element=='Earth') {
		return '<img class="element-icon" src="'.get_template_directory_uri().'/assets/img/icons/earth.png" />';
	}
}

add_shortcode('get_element', 'getElementImage');


add_action( 'after_setup_theme', 'getElementIcon');

function getRole($role) {
	if ($role=='Support'){
		echo '<img class="class-icon" src="'.get_template_directory_uri().'/assets/img/icons/support.png" /> <span class="role-text">Support</span>';
	}
	else if ($role=='Warrior') {
		echo '<img class="class-icon" src="'.get_template_directory_uri().'/assets/img/icons/warrior.png" /> <span class="role-text">Warrior</span>';
	}
	else if ($role=='Ranged') {
		echo '<img class="class-icon" src="'.get_template_directory_uri().'/assets/img/icons/ranged.png" /> <span class="role-text">Ranged</span>';
	}
	else if ($role=='Tanker') {
		echo '<img class="class-icon" src="'.get_template_directory_uri().'/assets/img/icons/tank.png" /> <span class="role-text">Tanker</span>';
	}
}

add_action( 'after_setup_theme', 'getRole');

function getRoleIcon($role) {
	if ($role=='Support'){
		echo '<img class="class-icon" src="'.get_template_directory_uri().'/assets/img/icons/support.png" />';
	}
	else if ($role=='Warrior') {
		echo '<img class="class-icon" src="'.get_template_directory_uri().'/assets/img/icons/warrior.png" />';
	}
	else if ($role=='Ranged') {
		echo '<img class="class-icon" src="'.get_template_directory_uri().'/assets/img/icons/ranged.png" />';
	}
	else if ($role=='Tanker') {
		echo '<img class="class-icon" src="'.get_template_directory_uri().'/assets/img/icons/tank.png" />';
	}
}

add_action( 'after_setup_theme', 'getRoleIcon');

function getEquipment($type) {
	if ($type=='One-Handed Sword'){
		echo '<img class="equipment-icon" src="'.get_template_directory_uri().'/assets/img/icons/1hsword.png" /> <span class="equipment-text">One-Handed Sword</span>';
	}
	else if ($type=='Two-Handed Sword') {
		echo '<img class="equipment-icon" src="'.get_template_directory_uri().'/assets/img/icons/2hsword.png" /> <span class="equipment-text">Two-Handed Sword</span>';
	}
	else if ($type=='Basket') {
		echo '<img class="equipment-icon" src="'.get_template_directory_uri().'/assets/img/icons/basket.png" /> <span class="equipment-text">Basket</span>';
	}
	else if ($type=='Accessory') {
		echo '<img class="equipment-icon" src="'.get_template_directory_uri().'/assets/img/icons/accessory.png" /> <span class="equipment-text">Accessory</span>';
	}
	else if ($type=='Bow') {
		echo '<img class="equipment-icon" src="'.get_template_directory_uri().'/assets/img/icons/bow.png" /> <span class="equipment-text">Bow</span>';
	}
	else if ($type=='Card') {
		echo '<img class="equipment-icon" src="'.get_template_directory_uri().'/assets/img/icons/card.png" /> <span class="equipment-text">Card</span>';
	}
	else if ($type=='Claw') {
		echo '<img class="equipment-icon" src="'.get_template_directory_uri().'/assets/img/icons/claw.png" /> <span class="equipment-text">Claw</span>';
	}
	else if ($type=='Costume') {
		echo '<img class="equipment-icon" src="'.get_template_directory_uri().'/assets/img/icons/costume.png" /> <span class="equipment-text">Costume</span>';
	}
	else if ($type=='Gauntlet') {
		echo '<img class="equipment-icon" src="'.get_template_directory_uri().'/assets/img/icons/gauntlet.png" /> <span class="equipment-text">Gauntlet</span>';
	}
	else if ($type=='Rifle') {
		echo '<img class="equipment-icon" src="'.get_template_directory_uri().'/assets/img/icons/rifle.png" /> <span class="equipment-text">Rifle</span>';
	}
	else if ($type=='Shield') {
		echo '<img class="equipment-icon" src="'.get_template_directory_uri().'/assets/img/icons/shield.png" /> <span class="equipment-text">Shield</span>';
	}
	else if ($type=='Staff') {
		echo '<img class="equipment-icon" src="'.get_template_directory_uri().'/assets/img/icons/staff.png" /> <span class="equipment-text">Staff</span>';
	}
}

add_action( 'after_setup_theme', 'getEquipment');

function getChain($chain) {
	if ($chain=='All'){
		echo '<img class="chain-icon" src="'.get_template_directory_uri().'/assets/img/icons/all.png" /><br><span class="chain-text">All</span>';
	}
	else if ($chain=='Injured') {
		echo '<img class="chain-icon" src="'.get_template_directory_uri().'/assets/img/icons/injured.png" /><br><span class="chain-text">Injured</span>';
	}
	else if ($chain=='Downed') {
		echo '<img class="chain-icon" src="'.get_template_directory_uri().'/assets/img/icons/downed.png" /><br><span class="chain-text">Downed</span>';
	}
	else if ($chain=='Airborne') {
		echo '<img class="chain-icon" src="'.get_template_directory_uri().'/assets/img/icons/airborne.png" /><br><span class="chain-text">Airborne</span>';
	}
	else if ($chain=='None') {
		echo '<span class="chain-text">N/A</span>';
	}
}

add_action( 'after_setup_theme', 'getChain');

function getChainIcon($chain) {
	if ($chain=='All'){
		echo '<img class="chain-icon" src="'.get_template_directory_uri().'/assets/img/icons/all.png" />';
	}
	else if ($chain=='Injured') {
		echo '<img class="chain-icon" src="'.get_template_directory_uri().'/assets/img/icons/injured.png" />';
	}
	else if ($chain=='Downed') {
		echo '<img class="chain-icon" src="'.get_template_directory_uri().'/assets/img/icons/downed.png" />';
	}
	else if ($chain=='Airborne') {
		echo '<img class="chain-icon" src="'.get_template_directory_uri().'/assets/img/icons/airborne.png" />';
	}
	else if ($chain=='None') {
		echo '<span class="chain-text">N/A</span>';
	}
}

add_action( 'after_setup_theme', 'getChainIcon');

add_filter('get_the_archive_title', function ($title) {
    return preg_replace('/^\w+: /', '', $title);
});

if( ! function_exists( 'post_meta_request_params' ) ) :
	function post_meta_request_params( $args, $request )
	{
		$args += array(
			'meta_key'   => $request['meta_key'],
			'meta_value' => $request['meta_value'],
			'meta_query' => $request['meta_query'],
		);

	    return $args;
	}
	add_filter( 'rest_heroes_query', 'post_meta_request_params', 99, 2 );
	add_filter( 'rest_items_query', 'post_meta_request_params', 99, 2 );
endif;

function getEvents() {
	$args = array(
		'post_type'     => 'guide',
		'numberposts'   => -1,
		'tax_query' => array(
			array(
				'taxonomy' => 'guide_cat',
				'field'	=> 'slug',
				'terms' => 'events'
			)
		),
		'meta_query'    => array( 
			'operator' => 'AND',
			array(
				'key'       => 'date_end',
				'value' => date("Y-m-d"),
				'compare' => '>=',
				'type'		=> 'DATE',
			),
			array(
				'key'       => 'date_start',
				'value' => date("Y-m-d"),
				'compare' => '<=',
				'type'		=> 'DATE',
			)
		),
		'meta_key' => 'date_start',
		'orderby' => 'meta_value_num',
	);
	$query = new WP_Query( $args );

	// Loop
	if( $query->have_posts() ) :
		echo '<h4>Current Events</h4>';
		echo '<div class="event-cards">';
		while( $query->have_posts() ) : $query->the_post();
			echo '<a href="'.get_the_permalink().'"><div class="event-card" style="background-image:url('.get_the_post_thumbnail_url().')">';
			echo '<div class="event-card-title"><h4>'.get_the_title().'</h4></div>';
			echo '</div></a>';
		endwhile; 
		echo '</div>';
	endif;

	$args = array(
		'post_type'     => 'post',
		'numberposts'   => -1,
		'tax_query' => array(
			array(
				'taxonomy' => 'category',
				'field'	=> 'slug',
				'terms' => 'banners'
			)
		),
		'meta_query'    => array( 
			'operator' => 'AND',
			array(
				'key'       => 'date_end',
				'value' => date("Y-m-d"),
				'compare' => '>=',
				'type'		=> 'DATE',
			),
			array(
				'key'       => 'date_start',
				'value' => date("Y-m-d"),
				'compare' => '<=',
				'type'		=> 'DATE',
			)
		),
		'meta_key' => 'date_start',
		'orderby' => 'meta_value_num',
	);
	$query = new WP_Query( $args );

	// Loop
	if( $query->have_posts() ) :
		echo '<h4>Current Banners</h4>';
		echo '<div class="banner-cards">';
		while( $query->have_posts() ) : $query->the_post();
			echo '<a href="'.get_the_permalink().'"><div class="banner-card" style="background-image:url('.get_the_post_thumbnail_url().')">';
			echo '<div class="banner-card-title"><h5>'.get_the_title().'</h5></div>';
			echo '</div></a>';
		endwhile; 
	endif;
	echo '</div>';
	wp_reset_query();
}

add_shortcode('getevents', 'getEvents');

function cache_item_data () {
	
	delete_transient( 'normal_item_data' );

	$args = array(
		'post_type'   => 'items',
		'numberposts'   => -1,
		'tax_query' => array(
			array(
				'taxonomy' => 'item_categories',
				'field'    => 'slug',
				'terms'    => array('weapons','shields','accessories')
			)
		),
		'meta_query'    => array( 
			'relation'	=> 'AND', 
			array(
				'key'       => 'rarity',
				'value'     => 'Normal',
				'compare' => '='
			),
			array(
				'key'       => 'how_to_obtain',
				'value'     => 'Gacha',
				'compare' => 'LIKE'
			)
		),
	);

	$all_posts1 = array();
	$all_acf_fields1 = array();	
	$all_featured_images1 = array();
	$the_query = new WP_Query( $args );
	
	if ( $the_query->have_posts() ):

		while ( $the_query->have_posts() ): $the_query->the_post();
			$fields = get_post();
			$acf_fields = get_fields();
			$featured_image = get_the_post_thumbnail_url();
			array_push($all_posts1, $fields);
			array_push($all_acf_fields1, $acf_fields);
			array_push($all_featured_images1, $featured_image);
		endwhile;

		wp_reset_postdata();
		$i = 0;
					
		foreach ($all_posts1 as $p):
			$p->acf_fields = $all_acf_fields1[$i];
			$p->featured_image = $all_featured_images1[$i];
			$i++;
		endforeach;
	
	endif;

	set_transient( 'normal_item_data', $all_posts1, 3153600000);

	delete_transient( 'rare_item_data' );

	$args = array(
		'post_type'   => 'items',
		'numberposts'   => -1,
		'tax_query' => array(
			array(
				'taxonomy' => 'item_categories',
				'field'    => 'slug',
				'terms'    => array('weapons','shields','accessories')
			)
		),
		'meta_query'    => array(
			'relation'	=> 'AND', 
			array(
				'key'       => 'rarity',
				'value'     => 'Rare',
				'compare' => '='
			),
			array(
				'key'       => 'how_to_obtain',
				'value'     => 'Gacha',
				'compare' => 'LIKE'
			)
		),
	);

    $all_posts2 = array();
	$all_acf_fields2 = array();	
	$all_featured_images2 = array();
	$the_query = new WP_Query( $args );
	
	if ( $the_query->have_posts() ):

		while ( $the_query->have_posts() ): $the_query->the_post();
			$fields = get_post();
			$acf_fields = get_fields();
			$featured_image = get_the_post_thumbnail_url();
			array_push($all_posts2, $fields);
			array_push($all_acf_fields2, $acf_fields);
			array_push($all_featured_images2, $featured_image);
		endwhile;

		wp_reset_postdata();
		$i = 0;
					
		foreach ($all_posts2 as $p):
			$p->acf_fields = $all_acf_fields2[$i];
			$p->featured_image = $all_featured_images2[$i];
			$i++;
		endforeach;
	
	endif;

	set_transient( 'rare_item_data', $all_posts2, 3153600000);

	delete_transient( 'unique_item_data' );

	$args = array(
		'post_type'   => 'items',
		'numberposts'   => -1,
		'tax_query' => array(
			array(
				'taxonomy' => 'item_categories',
				'field'    => 'slug',
				'terms'    => array('weapons','shields','accessories')
			)
		),
		'meta_query'    => array( 
			'relation'	=> 'AND',
			array(
				'key'       => 'rarity',
				'value'     => 'Unique',
				'compare' => '='
			),
			array(
				'key'       => 'how_to_obtain',
				'value'     => 'Gacha',
				'compare' => 'LIKE'
			)
		),
	);

    $all_posts3 = array();
	$all_acf_fields3 = array();	
	$all_featured_images3 = array();
	$the_query = new WP_Query( $args );
	
	if ( $the_query->have_posts() ):

		while ( $the_query->have_posts() ): $the_query->the_post();
			$fields = get_post();
			$acf_fields = get_fields();
			$featured_image = get_the_post_thumbnail_url();
			array_push($all_posts3, $fields);
			array_push($all_acf_fields3, $acf_fields);
			array_push($all_featured_images3, $featured_image);
		endwhile;

		wp_reset_postdata();
		$i = 0;
					
		foreach ($all_posts3 as $p):
			$p->acf_fields = $all_acf_fields3[$i];
			$p->featured_image = $all_featured_images3[$i];
			$i++;
		endforeach;
	
	endif;

	set_transient( 'unique_item_data', $all_posts3, 3153600000);

	delete_transient( 'legend_item_data' );

	$args = array(
		'post_type'   => 'items',
		'numberposts'   => -1,
		'tax_query' => array(
			array(
				'taxonomy' => 'item_categories',
				'field'    => 'slug',
				'terms'    => array('weapons','shields','accessories')
			)
		),
		'meta_query'    => array( 
			'relation'	=> 'AND',
			array(
				'key'       => 'rarity',
				'value'     => 'Legend',
				'compare' => '='
			),
			array(
				'key'       => 'exclusive',
				'value'     => '1',
				'compare' => '!='
			),
			array(
				'key'       => 'how_to_obtain',
				'value'     => 'Gacha',
				'compare' => 'LIKE'
			)
		),
	);

    $all_posts4 = array();
	$all_acf_fields4 = array();	
	$all_featured_images4 = array();
	$the_query = new WP_Query( $args );
	
	if ( $the_query->have_posts() ):

		while ( $the_query->have_posts() ): $the_query->the_post();
			$fields = get_post();
			$acf_fields = get_fields();
			$featured_image = get_the_post_thumbnail_url();
			array_push($all_posts4, $fields);
			array_push($all_acf_fields4, $acf_fields);
			array_push($all_featured_images4, $featured_image);
		endwhile;

		wp_reset_postdata();
		$i = 0;
					
		foreach ($all_posts4 as $p):
			$p->acf_fields = $all_acf_fields4[$i];
			$p->featured_image = $all_featured_images4[$i];
			$i++;
		endforeach;
	
	endif;

	set_transient( 'legend_item_data', $all_posts4, 3153600000);

	delete_transient( 'epic_item_data' );

	$args = array(
		'post_type'   => 'items',
		'numberposts'   => -1,
		'tax_query' => array(
			array(
				'taxonomy' => 'item_categories',
				'field'    => 'slug',
				'terms'    => array('weapons','shields','accessories')
			)
		),
		'meta_query'    => array( 
			'relation'	=> 'AND',
			array(
				'key'       => 'rarity',
				'value'     => 'Epic',
				'compare' => '='
			),
			array(
				'key'       => 'exclusive',
				'value'     => '1',
				'compare' => '!='
			),
			array(
				'key'       => 'how_to_obtain',
				'value'     => 'Gacha',
				'compare' => 'LIKE'
			)
		),
	);

    $all_posts5 = array();
	$all_acf_fields5 = array();	
	$all_featured_images5 = array();
	$the_query = new WP_Query( $args );
	
	if ( $the_query->have_posts() ):

		while ( $the_query->have_posts() ): $the_query->the_post();
			$fields = get_post();
			$acf_fields = get_fields();
			$featured_image = get_the_post_thumbnail_url();
			array_push($all_posts5, $fields);
			array_push($all_acf_fields5, $acf_fields);
			array_push($all_featured_images5, $featured_image);
		endwhile;

		wp_reset_postdata();
		$i = 0;
					
		foreach ($all_posts5 as $p):
			$p->acf_fields = $all_acf_fields5[$i];
			$p->featured_image = $all_featured_images5[$i];
			$i++;
		endforeach;
	
	endif;

	set_transient( 'epic_item_data', $all_posts5, 3153600000);

	delete_transient( 'exclusive_item_data' );

	$args = array(
		'post_type'   => 'items',
		'numberposts'   => -1,
		'tax_query' => array(
			array(
				'taxonomy' => 'item_categories',
				'field'    => 'slug',
				'terms'    => 'weapons'
			)
		),
		'meta_query'    => array( 
			'relation'	=> 'AND',
			array(
				'key'       => 'exclusive',
				'value'     => '1',
				'compare' => '='
			),
			array(
				'key'       => 'unreleased',
				'value'     => '0',
				'compare' => '='
			),
			array(
				'key'       => 'how_to_obtain',
				'value'     => 'Gacha',
				'compare' => 'LIKE'
			)
		),
	);

    $all_posts6 = array();
	$all_acf_fields6 = array();	
	$all_featured_images6 = array();
	$the_query = new WP_Query( $args );
	
	if ( $the_query->have_posts() ):

		while ( $the_query->have_posts() ): $the_query->the_post();
			$fields = get_post();
			$acf_fields = get_fields();
			$featured_image = get_the_post_thumbnail_url();
			array_push($all_posts6, $fields);
			array_push($all_acf_fields6, $acf_fields);
			array_push($all_featured_images6, $featured_image);
		endwhile;

		wp_reset_postdata();
		$i = 0;
					
		foreach ($all_posts6 as $p):
			$p->acf_fields = $all_acf_fields6[$i];
			$p->featured_image = $all_featured_images6[$i];
			$i++;
		endforeach;
	
	endif;

	set_transient( 'exclusive_item_data', $all_posts6, 3153600000);

	delete_transient( 'all_item_data' );

	$args = array(
		'post_type'   => 'items',
		'numberposts'   => -1,
		'tax_query' => array(
			array(
				'taxonomy' => 'item_categories',
				'field'    => 'slug',
				'terms'    => array('weapons','shields','accessories', 'cards')
			)
		)
	);

    $all_posts7 = array();
	$all_acf_fields7 = array();	
	$all_featured_images7 = array();
	$the_query = new WP_Query( $args );
	
	if ( $the_query->have_posts() ):

		while ( $the_query->have_posts() ): $the_query->the_post();
			$fields = get_post();
			$acf_fields = get_fields();
			$featured_image = get_the_post_thumbnail_url();
			array_push($all_posts7, $fields);
			array_push($all_acf_fields7, $acf_fields);
			array_push($all_featured_images7, $featured_image);
		endwhile;

		wp_reset_postdata();
		$i = 0;
					
		foreach ($all_posts7 as $p):
			$p->acf_fields = $all_acf_fields7[$i];
			$p->featured_image = $all_featured_images7[$i];
			$i++;
		endforeach;
	
	endif;

	set_transient( 'all_item_data', $all_posts7, 3153600000);

}

add_action( 'save_post_items', 'cache_item_data' ,10,1);

function cache_hero_data () {
	
	delete_transient( 'normal_hero_data' );

	$args = array(
		'post_type'   => 'heroes',
		'numberposts'   => -1,
		'meta_query'    => array( 
			'relation'	=> 'AND',
			array(
				'key'       => 'bio_fields_rarity',
				'value'     => '1 Star',
				'compare' => '='
			),
			array(
				'key'       => 'bio_fields_na_release_date',
				'value'		=> '',
				'compare' => '!='
			)
		),
	);

    $all_posts1 = array();
	$all_acf_fields1 = array();	
	$all_featured_images1 = array();
	$the_query = new WP_Query( $args );
	
	if ( $the_query->have_posts() ):

		while ( $the_query->have_posts() ): $the_query->the_post();
			$fields = get_post();
			$acf_fields = get_fields();
			$featured_image = get_the_post_thumbnail_url();
			array_push($all_posts1, $fields);
			array_push($all_acf_fields1, $acf_fields);
			array_push($all_featured_images1, $featured_image);
		endwhile;

		wp_reset_postdata();
		$i = 0;
					
		foreach ($all_posts1 as $p):
			$p->acf_fields = $all_acf_fields1[$i];
			$p->featured_image = $all_featured_images1[$i];
			$i++;
		endforeach;
	
	endif;

	set_transient( 'normal_hero_data', $all_posts1, 3153600000);

	delete_transient( 'rare_hero_data' );

	$args = array(
		'post_type'   => 'heroes',
		'numberposts'   => -1,
		'meta_query'    => array( 
			'relation'	=> 'AND',
			array(
				'key'       => 'bio_fields_rarity',
				'value'     => '2 Star',
				'compare' => '='
			),
			array(
				'key'       => 'bio_fields_na_release_date',
				'value'		=> '',
				'compare' => '!='
			)
		),
	);

    $all_posts2 = array();
	$all_acf_fields2 = array();	
	$all_featured_images2 = array();
	$the_query = new WP_Query( $args );
	
	if ( $the_query->have_posts() ):

		while ( $the_query->have_posts() ): $the_query->the_post();
			$fields = get_post();
			$acf_fields = get_fields();
			$featured_image = get_the_post_thumbnail_url();
			array_push($all_posts2, $fields);
			array_push($all_acf_fields2, $acf_fields);
			array_push($all_featured_images2, $featured_image);
		endwhile;

		wp_reset_postdata();
		$i = 0;
					
		foreach ($all_posts2 as $p):
			$p->acf_fields = $all_acf_fields2[$i];
			$p->featured_image = $all_featured_images2[$i];
			$i++;
		endforeach;
	
	endif;

	set_transient( 'rare_hero_data', $all_posts2, 3153600000);

	delete_transient( 'unique_hero_data' );

	$args = array(
		'post_type'   => 'heroes',
		'numberposts'   => -1,
		'meta_query'    => array( 
			'relation'  => 'AND',
			array(
				'key'       => 'bio_fields_rarity',
				'value'     => '3 Star',
				'compare' => '='
			),
			array(
				'key'       => 'bio_fields_na_release_date',
				'value'		=> '',
				'compare' => '!='
			)
		),
	);

    $all_posts3 = array();
	$all_acf_fields3 = array();	
	$all_featured_images3 = array();
	$the_query = new WP_Query( $args );
	
	if ( $the_query->have_posts() ):

		while ( $the_query->have_posts() ): $the_query->the_post();
			$fields = get_post();
			$acf_fields = get_fields();
			$featured_image = get_the_post_thumbnail_url();
			array_push($all_posts3, $fields);
			array_push($all_acf_fields3, $acf_fields);
			array_push($all_featured_images3, $featured_image);
		endwhile;

		wp_reset_postdata();
		$i = 0;
					
		foreach ($all_posts3 as $p):
			$p->acf_fields = $all_acf_fields3[$i];
			$p->featured_image = $all_featured_images3[$i];
			$i++;
		endforeach;
	
	endif;

	set_transient( 'unique_hero_data', $all_posts3, 3153600000);

	delete_transient( 'all_hero_data' );

	$args = array(
		'post_type'   => 'heroes',
		'numberposts'   => -1,
		'meta_query'    => array( 
			'relation'  => 'AND',
			array(
				'key'     => 'bio_fields_rarity', 
				'value'   => array('2 Star', '3 Star'),
				'compare' => 'IN'
			),
			array(
				'key'       => 'bio_fields_na_release_date',
				'value'		=> '',
				'compare' => '!='
			)
		),
		'meta_key' => 'evaluation_fields_rating',
    	'orderby' => 'meta_value_num',
	);

    $all_posts4 = array();
	$all_acf_fields4 = array();	
	$all_featured_images4 = array();
	$the_query = new WP_Query( $args );
	
	if ( $the_query->have_posts() ):

		while ( $the_query->have_posts() ): $the_query->the_post();
			$fields = get_post();
			$acf_fields = get_fields();
			$featured_image = get_the_post_thumbnail_url();
			array_push($all_posts4, $fields);
			array_push($all_acf_fields4, $acf_fields);
			array_push($all_featured_images4, $featured_image);
		endwhile;

		wp_reset_postdata();
		$i = 0;
					
		foreach ($all_posts4 as $p):
			$p->acf_fields = $all_acf_fields4[$i];
			$p->featured_image = $all_featured_images4[$i];
			$i++;
		endforeach;
	
	endif;

	set_transient( 'all_hero_data', $all_posts4, 3153600000);
}

add_action( 'save_post_heroes', 'cache_hero_data' ,10,1);

function _custom_nav_menu_item( $title, $url, $order, $parent = 0 ){
	$item = new stdClass();
	$item->ID = 1000000 + $order + $parent;
	$item->db_id = $item->ID;
	$item->title = $title;
	$item->url = $url;
	$item->menu_order = $order;
	$item->menu_item_parent = $parent;
	$item->type = '';
	$item->object = '';
	$item->object_id = '';
	$item->classes = array();
	$item->target = '';
	$item->attr_title = '';
	$item->description = '';
	$item->xfn = '';
	$item->status = '';
	return $item;
}

function custom_nav_menu_items( $items, $menu ){
  // only add item to a specific menu
  if ( $menu->slug == 'main-menu' ){
    
    // only add profile link if user is logged in
    if ( get_current_user_id() ){
		$user = wp_get_current_user();
		$user_id = $user->ID; 
		$top = _custom_nav_menu_item( '<img class="nav-avatar" src="'.get_avatar_url($user_id).'">'.$user->display_name, '/account', 100 ); 
      	$items[] = $top;
		$items[] = _custom_nav_menu_item( 'Comments', '/account/?section=comments', 101, $top->ID );
		$items[] = _custom_nav_menu_item( 'Ratings', '/account/?section=ratings', 102, $top->ID );
		$items[] = _custom_nav_menu_item( 'Log Out', wp_logout_url('/'), 103, $top->ID );
    }
	else {
		$loginButton = _custom_nav_menu_item( '<span class="nav-btn">Log In</span>', '/login', 200 );
		$loginButton->classes = array('nav_btn');
		$items[] = $loginButton;
	}
  }
    
  return $items;
}
add_filter( 'wp_get_nav_menu_items', 'custom_nav_menu_items', 20, 2 );

function average_hero_ratings() {

	$args = array(
		'post_type'   => 'heroes',
		'numberposts'   => -1
	);

	$the_query = new WP_Query( $args );

	if ( $the_query->have_posts() ):

		while ( $the_query->have_posts() ): $the_query->the_post();

			$ratings = array();

			$post_id = get_the_id();

			//Evaluation Fields
			array_push($ratings, get_field('evaluation_fields_colo_rating'));
			array_push($ratings, get_field('evaluation_fields_arena_rating'));
			array_push($ratings, get_field('evaluation_fields_coop_rating'));
			array_push($ratings, get_field('evaluation_fields_story_rating'));
			array_push($ratings, get_field('evaluation_fields_raid_rating'));
			array_push($ratings, get_field('evaluation_fields_kamazone_rating'));
			array_push($ratings, get_field('evaluation_fields_orbital_rating'));
			array_push($ratings, get_field('evaluation_fields_tower_rating')); 

			$count = 0;

			foreach($ratings as $rating) {
				if($rating > 0) {
					$count++;
				}
			}
 
			$mean = array_sum($ratings) / $count; 
 
			$average = round($mean, 1) + 0;
			error_log(get_the_title().' '.$average);

			update_post_meta($post_id, 'evaluation_fields_rating', $average); 
 
		endwhile;
	
	endif;

}

add_action( 'save_post_heroes', 'average_hero_ratings' ,10,1);  

/*function get_heavenhold_data() {

	$heavenhold_data = array();

	if ( false === $heavenhold_data = get_transient( 'heavenhold_data' ) ) :

		global $wpdb;
		$heavenhold_data = $wpdb->get_results( ( "SELECT * from $wpdb->posts WHERE post_type IN ('heroes', 'items') AND post_status = 'publish'" ) );

		set_transient( 'heavenhold_data', $heavenhold_data, WEEK_IN_SECONDS );

	endif;

	return $heavenhold_data;

}*/

/*function wpal_replace_the_content( $content ) {
	if(!is_front_page()) {
		// Prepare post titles
		$post_titles = wpal_get_post_titles();
		$titles = wp_list_pluck( $post_titles, 'post_title', 'ID' );
		$preg_quote_titles = array();

		// Escape post titles
		foreach ( $titles as $key => $title ) :
			$preg_quote_titles[ $key ] = preg_quote( $title, '/' );
		endforeach;

		// Search for any post titles
		$content = preg_replace_callback( '/(' . implode( '|', $preg_quote_titles ) . ')/i', function( $matches ) use ( $preg_quote_titles ) {

			global $post;
			
			// Get post ID 
			$post_id = array_search( strtolower( $matches[0] ), array_map( 'strtolower', $preg_quote_titles ) );
			
			// Don't link to the current page
			if ( isset( $preg_quote_titles[ $post_id ] ) && $post->ID !== $post_id ) :
				
				// Use the post title from the DB to its casing is the same
				return '<a href="' . get_permalink( $post_id ) . '" class="post-link">' . $preg_quote_titles[ $post_id ] . '</a>';
				
			endif;

			return $matches[0];

		}, $content );
	}
	
	return $content;

}
add_filter( 'elementor/frontend/the_content', 'wpal_replace_the_content' );

function wpal_remove_transient() {

	// Delete old post title transient
	delete_transient( 'wpal_post_titles' );

	// Re-index post titles
	wpal_get_post_titles();

}
add_action( 'save_post', 'wpal_remove_transient' );*/





function timeago($date) {
	$timestamp = strtotime($date);	
	
	$strTime = array("second", "minute", "hour", "day", "month", "year");
	$length = array("60","60","24","30","12","10");

	$currentTime = time();
	if($currentTime >= $timestamp) {
		 $diff     = time()- $timestamp;
		 for($i = 0; $diff >= $length[$i] && $i < count($length)-1; $i++) {
		 $diff = $diff / $length[$i];
		 }

		 $diff = round($diff);
		 return $diff . " " . $strTime[$i] . "(s) ago ";
	}
 }

 function getDiscordSidebar() {
	echo '<div class="section-box"><div class="section-content"><a href="https://discord.gg/heavenhold"><img class="discord-sidebar-btn" style="width: 100%;" src="'.get_template_directory_uri().'/assets/img/discord-banner.png"></a></div></div>';
	echo '<script>jQuery(function($){$(document).ready(function(){var headers = ["H4","H5","H6"];$("h4").click(function(e) {var target = e.target,name = target.nodeName.toUpperCase();if($.inArray(name,headers) > -1) {var subItem = $(target).next(); var depth = $(subItem).parents().length;subItem.slideToggle("fast",function() {$(target).find(".fa.fa-plus").toggleClass("closed");});}});});});</script>';
 }

 add_action( 'pre_get_posts', 'my_change_sort_order'); 

 function my_change_sort_order($query){
	if(is_post_type_archive( 'collections' )):
		//If you wanted it for the archive of a custom post type use: is_post_type_archive( $post_type )
		//Set the order ASC or DESC
		$query->set( 'order', 'ASC' );
		//Set the orderby
		$query->set( 'orderby', 'title' );
	endif;    
};

add_shortcode( 'boss', 'getBoss' );

function getBoss( $atts ) {
	extract( shortcode_atts( array( 
        'tags' => '',
        'name' => '',
        'title' => ''
    ), $atts ));

	$args = array(
		'post_type'     => 'enemies',
		'title'	=> $name,
	);
	$id = get_the_ID();
	$query = get_posts( $args )[0];
	$boss.="<div class='discord-sidebar'><h4>Boss - ".$query->post_title."</h4>";
	$boss.="<div class='boss-container'>";
	$boss.="<div class='boss-image'>".get_the_post_thumbnail($query->ID)."";
	while( have_rows('encounters', $query->ID) ) {
		the_row(); 
		$location = get_sub_field('location');
		if($id==$location->ID) {
			$attacks = get_sub_field('moveset');
			$strategy = get_sub_field('strategy');
			$boss.='<table style="border: none !important; padding: 0 !important;margin-top: 15px;" class="hero-box-table"><tr><td class="hero-box-left">Level</td><td class="hero-box-right">'.get_sub_field('level').'</td></tr>';
			$boss.='<tr><td class="hero-box-left">Health</td><td class="hero-box-right">'.get_sub_field('health').'</td></tr>';
			$boss.='<tr><td class="hero-box-left">Difficulty</td><td class="hero-box-right">'.get_sub_field('difficulty').'</td></tr></table></div>';
			$boss.="<div class='boss-info'>";
			$boss.="<h6>Moves</h6>";
			$boss.=$attacks;
			$boss.="<h6>Strategy</h6>";
			$boss.=$strategy;
		}
	}
	$boss.="</div>";
	$boss.="</div>";
	$boss.="</div>";
	return $boss;
}

add_shortcode( 'item', 'getItemIcon' );

function getItemIcon( $atts ) {
	extract( shortcode_atts( array( 
        'tags' => '',
        'name' => '',
        'title' => ''
    ), $atts ));

	$args = array(
		'post_type'     => 'items',
		'title'	=> $name,
	);

	$item = new WP_Query( $args );
	
	if( $item->have_posts() ) {
		while( $item->have_posts() ) {
			$item->the_post(); 
			$equipment_element = get_field('element');
			$equipment_max_atk = get_field('max_atk');

			$equipment_exclusive = get_field('exclusive');

			$equipment_magazine = get_field('magazine');
			$equipment_atk = get_field('atk');
			$equipment_crit = get_field('crit_chance');
			$equipment_dr = get_field('damage_reduction');
			$equipment_def_flat = get_field('def_flat');
			$equipment_def = get_field('def');
			$equipment_heal_flat = get_field('heal_flat');
			$equipment_heal = get_field('heal_percent');
			$equipment_hp = get_field('hp');
			$equipment_atk_on_kill = get_field('atk_on_kill');
			$equipment_hp_on_kill = get_field('hp_on_kill');
			$equipment_skill_regen_on_kill = get_field('skill_regen_on_kill');
			$equipment_shield_on_start = get_field('shield_on_start');
			$equipment_shield_on_kill = get_field('shield_on_kill');
			$equipment_skill_damage = get_field('skill_damage');
			$equipment_skill_regen_speed = get_field('skill_regen_speed');
			$equipment_earth_type_atk = get_field('earth_type_atk');
			$equipment_fire_type_atk = get_field('fire_type_atk');
			$equipment_water_type_atk = get_field('water_type_atk');
			$equipment_dark_type_atk = get_field('dark_type_atk');
			$equipment_light_type_atk = get_field('light_type_atk');
			$equipment_basic_type_atk = get_field('basic_type_atk');
			$equipment_options = get_field('options');

			$equipment_sub_atk = get_field('sub_atk');
			$equipment_sub_crit = get_field('sub_crit_chance');
			$equipment_sub_dr = get_field('sub_damage_reduction');
			$equipment_sub_def_flat = get_field('sub_def_flat');
			$equipment_sub_def = get_field('sub_def');
			$equipment_sub_heal_flat = get_field('sub_heal_flat');
			$equipment_sub_heal = get_field('sub_heal_percent');
			$equipment_sub_hp = get_field('sub_hp');
			$equipment_sub_atk_on_kill = get_field('sub_atk_on_kill');
			$equipment_sub_hp_on_kill = get_field('sub_hp_on_kill');
			$equipment_sub_skill_regen_on_kill = get_field('sub_skill_regen_on_kill');
			$equipment_sub_shield_on_start = get_field('sub_shield_on_start');
			$equipment_sub_shield_on_kill = get_field('sub_shield_on_kill');
			$equipment_sub_skill_damage = get_field('sub_skill_damage');
			$equipment_sub_skill_regen_speed = get_field('sub_skill_regen_speed');
			$equipment_sub_earth_type_atk = get_field('sub_earth_type_atk');
			$equipment_sub_fire_type_atk = get_field('sub_fire_type_atk');
			$equipment_sub_water_type_atk = get_field('sub_water_type_atk');
			$equipment_sub_dark_type_atk = get_field('sub_dark_type_atk');
			$equipment_sub_light_type_atk = get_field('sub_light_type_atk');
			$equipment_sub_basic_type_atk = get_field('sub_basic_type_atk');
			$equipment_sub_options = get_field('sub_options');

			$equipment_rarity = get_field('rarity');

			$equipment_lb5 = get_field('lb5_option');
			$equipment_lb5_value = get_field('lb5_value');
			$equipment_skill_name = get_field('weapon_skill_name');
			$equipment_skill_name = preg_replace('/Lv\.\d*/i', '<span class="skill-level">$0</span>', $equipment_skill_name);
			$equipment_skill_atk = get_field('weapon_skill_atk');
			$equipment_skill_regen_time = get_field('weapon_skill_regen_time');
			$equipment_skill_description = get_field('weapon_skill_description');
			$equipment_skill_description = str_replace("injured", '<span class="green">injured</span>', $equipment_skill_description);
			$equipment_skill_description = str_replace("airborne", '<span class="cyan">airborne</span>', $equipment_skill_description);
			$equipment_skill_description = str_replace("downed", '<span class="yellowgreen">downed</span>', $equipment_skill_description);
			$equipment_skill_chain = get_field('weapon_skill_chain');


			$negated_options = preg_grep('/.*negated.*/', $equipment_options);
			$negated_sub_options = preg_grep('/.*negated.*/', $equipment_sub_options);

			$equipment_max_lines = get_field('max_lines');

			$equipment_type = get_the_terms($item->ID, 'item_categories');

			if($equipment_type[0]->name=='Weapon') {
				$tooltip_text .= '<span class="weapon-stat equipment-rarity">'.$equipment_rarity.' '.get_field('weapon_type').'</span>';
				$tooltip_text .= '<span class="weapon-stat weapon-dps">'.get_field('dps').' <span class="dps-label">DPS</span></span><br>';
			}
			elseif($equipment_type[0]->name=='Card') {
			}
			elseif($equipment_type[0]->name=='Costume') {
				$costume_hero = get_field('hero')[0];
				$tooltip_text .= '<div class="applicable-heroes">Applicable Heroes</div>';
				$tooltip_text .= '<a href="'.get_the_permalink($costume_hero->ID).'"><div class="applicable-hero">';
				$tooltip_text .= '<img class="applicable-hero-image" src="'.get_the_post_thumbnail_url($costume_hero->ID, 'thumbnail').'">';
				$tooltip_text .= '<div class="applicable-hero-info"><span class="applicable-hero-name">'.$costume_hero->post_title.'</span></div></div></a>';
			}
			else {
				$tooltip_text .= '<span class="weapon-stat equipment-rarity">'.$equipment_rarity.' '.$equipment_type[0]->name.'</span><br>';
			}
			$tooltip_text .= '</div>';
			if($equipment_type[0]->name=='Weapon') {
				$tooltip_text .= '<span class="weapon-stat weapon-atk"><span class="stat-label weapon-'.get_field('element').'">'.get_field('element').' Atk</span> '.get_field('max_atk').'</span>';
			}
			
			if ($equipment_atk>0) {
				$tooltip_text .= '<span class="weapon-stat weapon-atk"><span class="stat-label label-offensive">Atk</span> +'.$equipment_atk.'%</span>';
			}  
			if ($equipment_magazine>0) {
				$tooltip_text .= '<span class="weapon-stat weapon-magazine"><span class="stat-label label-offensive">Magazine Size</span> '.$equipment_magazine.'</span>';
			} 
			if ($equipment_heal_flat>0) {
				$tooltip_text .= '<span class="weapon-stat weapon-heal-flat"><span class="stat-label label-offensive">Heal </span> '.$equipment_heal_flat.'</span>';
			} 
			if ($equipment_crit>0) {
				$tooltip_text .= '<span class="weapon-stat weapon-crit"><span class="stat-label label-offensive">Crit Hit Chance</span> '.$equipment_crit.'%</span>';
			} 
			if ($equipment_def_flat>0) {
				$tooltip_text .= '<span class="weapon-stat weapon-def-flat"><span class="stat-label label-offensive">Def</span> '.$equipment_def_flat.'</span>';
			} 
			if ($equipment_dr>0) {
				$tooltip_text .= '<span class="weapon-stat weapon-dr"><span class="stat-label">Damage Reduction</span> <span class="green">'.$equipment_dr.'</span></span>';
			}
			if ($equipment_atk_on_kill>0) {
				$tooltip_text .= '<span class="weapon-stat weapon-atk-on-kill"><span class="green">+'.$equipment_atk_on_kill.'%</span> Atk increase on enemy kill</span>';
			} 
			if ($equipment_hp_on_kill>0) {
				$tooltip_text .= '<span class="weapon-stat weapon-hp-on-kill"><span class="green">+'.$equipment_hp_on_kill.'%</span> HP recovery on enemy kill</span>';
			} 
			if ($equipment_shield_on_kill>0) {
				$tooltip_text .= '<span class="weapon-stat weapon-shield-on-kill"><span class="green">+'.$equipment_shield_on_kill.'%</span> shield increase on enemy kill</span>';
			} 
			if ($equipment_shield_on_start>0) {
				$tooltip_text .= '<span class="weapon-stat weapon-shield-on-start"><span class="green">+'.$equipment_shield_on_start.'%</span> shield increase on battle start</span>';
			}
			if ($equipment_def>0) {
				$tooltip_text .= '<span class="weapon-stat weapon-def"><span class="stat-label label-defensive">Def</span> +'.$equipment_def.'%</span>';
			} 
			if ($equipment_hp>0) {
				$tooltip_text .= '<span class="weapon-stat weapon-hp"><span class="stat-label label-defensive">HP</span> +'.$equipment_hp.'%</span>';
			}
			if ($equipment_heal>0) {
				$tooltip_text .= '<span class="weapon-stat weapon-heal"><span class="stat-label label-defensive">Heal</span> +'.$equipment_heal.'%</span>';
			} 
			if ($equipment_skill_damage>0) {
				$tooltip_text .= '<span class="weapon-stat weapon-skill-damage"><span class="stat-label label-defensive">Skill Damage</span> +'.$equipment_skill_damage.'%</span>';
			}  
			if ($equipment_skill_regen_speed>0) {
				$tooltip_text .= '<span class="weapon-stat weapon-regen-speed"><span class="stat-label label-defensive">Weapon Skill Regen Speed</span> +'.$equipment_skill_regen_speed.'%</span>';
			} 
			if ($equipment_skill_regen_on_kill<0) {
				$tooltip_text .= '<span class="weapon-stat weapon-regen-on-kill"><span class="green">'.$equipment_skill_regen_on_kill.'</span> seconds of weapon skill Regen time on enemy kill</span>';
			} 
			if ($equipment_earth_type_atk>0) {
				$tooltip_text .= '<span class="weapon-stat weapon-def"><span class="stat-label label-defensive">Earth type Atk</span> +'.$equipment_earth_type_atk.'%</span>';
			} 
			if ($equipment_fire_type_atk>0) {
				$tooltip_text .= '<span class="weapon-stat weapon-def"><span class="stat-label label-defensive">Fire type Atk</span> +'.$equipment_fire_type_atk.'%</span>';
			}
			if ($equipment_water_type_atk>0) {
				$tooltip_text .= '<span class="weapon-stat weapon-def"><span class="stat-label label-defensive">Water type Atk</span> +'.$equipment_water_type_atk.'%</span>';
			}  
			if ($equipment_basic_type_atk>0) {
				$tooltip_text .= '<span class="weapon-stat weapon-def"><span class="stat-label label-defensive">Basic type Atk</span> +'.$equipment_basic_type_atk.'%</span>';
			} 
			if ($equipment_light_type_atk>0) {
				$tooltip_text .= '<span class="weapon-stat weapon-def"><span class="stat-label label-defensive">Light type Atk</span> +'.$equipment_light_type_atk.'%</span>';
			} 
			if ($equipment_dark_type_atk>0) {
				$tooltip_text .= '<span class="weapon-stat weapon-def"><span class="stat-label label-defensive">Dark type Atk</span> +'.$equipment_dark_type_atk.'%</span>';
			} 
			foreach($negated_options as $negated) 
			{
				$tooltip_text .= '<span class="weapon-stat weapon-def">'.$negated.'</span>';
			}
			if($equipment_lb5)
			{
				$tooltip_text .= '<br><span class="weapon-stat limit-break limit-break-header">[Required Limit Break 5]</span><span class="weapon-stat limit-break">';
				if($equipment_lb5=='Atk (%)'){
					$tooltip_text .= '<span class="stat-label label-defensive">Atk</span> <span class="green">+'.$equipment_lb5_value.'%</span>';
				}
				else if($equipment_lb5=='HP (%)') {
					$tooltip_text .= '<span class="stat-label label-defensive">HP</span> <span class="green">+'.$equipment_lb5_value.'%</span>';
				}
				else if($equipment_lb5=='Crit Hit Chance') {
					$tooltip_text .= '<span class="stat-label label-defensive">Crit Hit Chance</span> <span class="green">+'.$equipment_lb5_value.'%</span>';
				}
				else if($equipment_lb5=='Damage Reduction') {
					$tooltip_text .= '<span class="stat-label label-defensive">Damage Reduction</span> <span class="green">+'.$equipment_lb5_value.'</span>';
				}
				else if($equipment_lb5=='Def') {
					$tooltip_text .= '<span class="stat-label label-defensive">Def</span> <span class="green">+'.$equipment_lb5_value.'%</span>';
				}
				else if($equipment_lb5=='Heal (Flat)') {
					$tooltip_text .= '<span class="stat-label label-defensive">Heal</span> <span class="green">+'.$equipment_lb5_value.'</span>';
				}
				else if($equipment_lb5=='Heal (%)') {
					$tooltip_text .= '<span class="stat-label label-defensive">Heal</span> <span class="green">+'.$equipment_lb5_value.'%</span>';
				}
				else if($equipment_lb5=='Atk increase on enemy kill') {
					$tooltip_text .= '<span class="weapon-stat weapon-atk-on-kill"><span class="green">+'.$equipment_lb5_value.'%</span> Atk increase on enemy kill</span>';
				}
				else if($equipment_lb5=='HP recovery on enemy kill') {
					$tooltip_text .= '<span class="weapon-stat weapon-hp-on-kill"><span class="green">+'.$equipment_lb5_value.'%</span> HP recovery on enemy kill</span>';
				}
				else if($equipment_lb5=='Seconds of weapon skill Regen time on enemy kill') {
					$tooltip_text .= '<span class="weapon-stat weapon-regen-on-kill"><span class="green">'.$equipment_lb5_value.'</span> seconds of weapon skill Regen time on enemy kill</span>';
				}
				else if($equipment_lb5=='Shield increase on battle start') {
					$tooltip_text .= '<span class="weapon-stat weapon-shield-on-start"><span class="green">+'.$equipment_lb5_value.'%</span> shield increase on battle start</span>';
				}
				else if($equipment_lb5=='Shield increase on enemy kill') {
					$tooltip_text .= '<span class="weapon-stat weapon-shield-on-kill"><span class="green">+'.$equipment_lb5_value.'%</span> shield increase on enemy kill</span>';
				}
				else if($equipment_lb5=='Skill Damage') {
					$tooltip_text .= '<span class="weapon-stat weapon-skill-damage"><span class="stat-label label-defensive">Skill Damage</span> +'.$equipment_lb5_value.'%</span>';
				}
				else if($equipment_lb5=='Weapon Skill Regen Speed') {
					$tooltip_text .= '<span class="weapon-stat weapon-regen-speed"><span class="stat-label label-defensive">Weapon Skill Regen Speed</span> +'.$equipment_lb5_value.'%</span>';
				}
				$tooltip_text .= '<br>';
			} 
			if ($equipment_exclusive) {
				$hero = get_field('hero')[0];
				$equipment_exclusive_effects = get_field('exclusive_effects');
				$tooltip_text .= '<br><span class="exclusive"><span class="exclusive-header">[';
				$tooltip_text .= $hero->post_title;
				$tooltip_text .= ' only]</span><br>';
				$tooltip_text .= $equipment_exclusive_effects;
				$tooltip_text .= '</span><br>';
			}
			if(sizeof($equipment_sub_options) > 0) {
				$tooltip_text .= '<br><span class="weapon-stat limit-break limit-break-header sub-options-text">[Sub-Options] <span class="sub-options-max">(Max '.$equipment_max_lines.')</span></span>';
				if ($equipment_sub_atk>0) {
					$tooltip_text .= '<span class="weapon-stat weapon-atk"><span class="stat-label label-offensive">Atk</span> +'.$equipment_sub_atk.'%</span>';
				}  
				if ($equipment_sub_heal_flat>0) {
					$tooltip_text .= '<span class="weapon-stat weapon-heal-flat"><span class="stat-label label-offensive">Heal </span> '.$equipment_sub_heal_flat.'</span>';
				} 
				if ($equipment_sub_crit>0) {
					$tooltip_text .= '<span class="weapon-stat weapon-crit"><span class="stat-label label-offensive">Crit Hit Chance</span> '.$equipment_sub_crit.'%</span>';
				} 
				if ($equipment_sub_def_flat>0) {
					$tooltip_text .= '<span class="weapon-stat weapon-def-flat"><span class="stat-label label-offensive">Def</span> '.$equipment_sub_def_flat.'</span>';
				} 
				if ($equipment_sub_dr>0) {
					$tooltip_text .= '<span class="weapon-stat weapon-dr"><span class="stat-label">Damage Reduction</span> <span class="green">'.$equipment_sub_dr.'</span></span>';
				}
				if ($equipment_sub_atk_on_kill>0) {
					$tooltip_text .= '<span class="weapon-stat weapon-atk-on-kill"><span class="green">+'.$equipment_sub_atk_on_kill.'%</span> Atk increase on enemy kill</span>';
				} 
				if ($equipment_sub_hp_on_kill>0) {
					$tooltip_text .= '<span class="weapon-stat weapon-hp-on-kill"><span class="green">+'.$equipment_sub_hp_on_kill.'%</span> HP recovery on enemy kill</span>';
				} 
				if ($equipment_sub_shield_on_kill>0) {
					$tooltip_text .= '<span class="weapon-stat weapon-shield-on-kill"><span class="green">+'.$equipment_sub_shield_on_kill.'%</span> shield increase on enemy kill</span>';
				} 
				if ($equipment_sub_shield_on_start>0) {
					$tooltip_text .= '<span class="weapon-stat weapon-shield-on-start"><span class="green">+'.$equipment_sub_shield_on_start.'%</span> shield increase on battle start</span>';
				}
				if ($equipment_sub_def>0) {
					$tooltip_text .= '<span class="weapon-stat weapon-def"><span class="stat-label label-defensive">Def</span> +'.$equipment_sub_def.'%</span>';
				} 
				if ($equipment_sub_hp>0) {
					$tooltip_text .= '<span class="weapon-stat weapon-hp"><span class="stat-label label-defensive">HP</span> +'.$equipment_sub_hp.'%</span>';
				}
				if ($equipment_sub_heal>0) {
					$tooltip_text .= '<span class="weapon-stat weapon-heal"><span class="stat-label label-defensive">Heal</span> +'.$equipment_sub_heal.'%</span>';
				} 
				if ($equipment_sub_skill_damage>0) {
					$tooltip_text .= '<span class="weapon-stat weapon-skill-damage"><span class="stat-label label-defensive">Skill Damage</span> +'.$equipment_sub_skill_damage.'%</span>';
				}  
				if ($equipment_sub_skill_regen_speed>0) {
					$tooltip_text .= '<span class="weapon-stat weapon-regen-speed"><span class="stat-label label-defensive">Weapon Skill Regen Speed</span> +'.$equipment_sub_skill_regen_speed.'%</span>';
				} 
				if ($equipment_sub_skill_regen_on_kill<0) {
					$tooltip_text .= '<span class="weapon-stat weapon-regen-on-kill"><span class="green">'.$equipment_sub_skill_regen_on_kill.'</span> seconds of weapon skill Regen time on enemy kill</span>';
				} 
				if ($equipment_sub_earth_type_atk>0) {
					$tooltip_text .= '<span class="weapon-stat weapon-def"><span class="stat-label label-defensive">Earth type Atk</span> +'.$equipment_sub_earth_type_atk.'%</span>';
				} 
				if ($equipment_sub_fire_type_atk>0) {
					$tooltip_text .= '<span class="weapon-stat weapon-def"><span class="stat-label label-defensive">Fire type Atk</span> +'.$equipment_sub_fire_type_atk.'%</span>';
				}
				if ($equipment_sub_water_type_atk>0) {
					$tooltip_text .= '<span class="weapon-stat weapon-def"><span class="stat-label label-defensive">Water type Atk</span> +'.$equipment_sub_water_type_atk.'%</span>';
				}  
				if ($equipment_sub_basic_type_atk>0) {
					$tooltip_text .= '<span class="weapon-stat weapon-def"><span class="stat-label label-defensive">Basic type Atk</span> +'.$equipment_sub_basic_type_atk.'%</span>';
				} 
				if ($equipment_sub_light_type_atk>0) {
					$tooltip_text .= '<span class="weapon-stat weapon-def"><span class="stat-label label-defensive">Light type Atk</span> +'.$equipment_sub_light_type_atk.'%</span>';
				} 
				if ($equipment_sub_dark_type_atk>0) {
					$tooltip_text .= '<span class="weapon-stat weapon-def"><span class="stat-label label-defensive">Dark type Atk</span> +'.$equipment_sub_dark_type_atk.'%</span>';
				} 
				foreach($negated_sub_options as $negated) 
				{
					$tooltip_text .= '<span class="weapon-stat weapon-def">'.$negated.'</span>';
				}
			}
			$item_tooltip.="<div class='item-tooltip item-with-description' id='item-".get_the_ID()."' style='background:url(".get_the_post_thumbnail_url().");'></div>";
			$tooltip_script .= '<script type="text/javascript">jQuery(function ($) { $("#item-'.get_the_ID().'").prop(\'title\', \'<img class="item-tooltip-image" src="'.get_the_post_thumbnail_url().'" /><br><span class="bold">'.get_the_title().'</span><br>'.$tooltip_text.'\');$("#item-'.get_the_ID().'").tooltip({tooltipClass 	: "item-tooltip",persistent 	: true,html 	: true,trigger 	: "hover"}); });</script>';		
		}
	}
	return $item_tooltip.$tooltip_script;
}

add_shortcode( 'hero', 'getHeroIcon' );

function getHeroIcon( $atts ) {
	extract( shortcode_atts( array( 
        'tags' => '',
        'name' => '',
        'title' => ''
    ), $atts ));

	$args = array(
		'post_type'     => 'heroes',
		'title'	=> $name,
	);

	$item = new WP_Query( $args );
	
	if( $item->have_posts() ) {
		while( $item->have_posts() ) {
			$item->the_post(); 
			$item_tooltip.="<div class='item-tooltip hero-tooltip item-with-description ".get_field('bio_fields_element')."-tooltip' id='item-".get_the_ID()."' style='background:url(".get_the_post_thumbnail_url('','thumbnail').");'></div>";
			$tooltip_script .= '<script type="text/javascript">jQuery(function ($) { $("#item-'.get_the_ID().'").prop(\'title\', \'<img class="item-tooltip-image" src="'.get_the_post_thumbnail_url('','thumbnail').'" /><br><span class="bold">'.get_the_title().'</span><br>'.$tooltip_text.'\');$("#item-'.get_the_ID().'").tooltip({tooltipClass 	: "item-tooltip",persistent 	: true,html 	: true,trigger 	: "hover"}); });</script>';
		}
	}
	return $item_tooltip.$tooltip_script;
}

add_action('acf/init', 'register_acf_block_types');

function register_acf_block_types() {
	acf_register_block_type(
		array(
			'name'	=> 'section-box',
			'title'	=> __('Collapsible Section'),
			'description'	=> __('A collapsible section'),
			'render_template'	=> 'template-parts/blocks/section.php',
			'icon'	=> 'feedback',
			'category'			=> 'formatting',
			'mode'				=> 'preview',
			'supports'			=> array(
				'align' => true,
				'mode' => false,
				'jsx' => true
			),
			'keywords'	=> array('collapsible', 'section'),
		)
	);
	acf_register_block_type(
		array(
			'name'	=> 'hero',
			'title'	=> __('Hero'),
			'description'	=> __('Display a single hero'),
			'render_template'	=> 'template-parts/blocks/hero.php',
			'icon'	=> 'businessman',
			'enqueue_script'    => get_template_directory_uri() . '/template-parts/blocks/hero.js',
			'keywords'	=> array('hero'),
		)
	);
	acf_register_block_type(
		array(
			'name'	=> 'team',
			'title'	=> __('Team'),
			'description'	=> __('Display a single team'),
			'render_template'	=> 'template-parts/blocks/team.php',
			'icon'	=> 'groups',
			'mode'				=> 'edit',
			'enqueue_script'    => get_template_directory_uri() . '/template-parts/blocks/team.js',
			'keywords'	=> array('team'),
		)
	);
	acf_register_block_type(
		array(
			'name'	=> 'item',
			'title'	=> __('Item'),
			'description'	=> __('Display Item Suggestions'),
			'render_template'	=> 'template-parts/blocks/item.php',
			'icon'	=> 'shield-alt',
			'enqueue_script'    => get_template_directory_uri() . '/template-parts/blocks/item.js',
			'keywords'	=> array('item'),
		)
	);
}

add_action('acf/save_post', 'discord_update_notification', 5);
function discord_update_notification( $post_ID ) {

	// Get post name and featured image
	$post_title = html_entity_decode(get_the_title( $post_ID ));
	$featured = get_the_post_thumbnail_url( $post_ID );

	// Default image if there's no featured
	if(!$featured) {
		$featured= "https://heavenhold.com/wp-content/uploads/2020/08/loader-1.png";
	}

	// Permalink
	$post_link = get_the_permalink( $post_ID );

	// Post type and its singular name
	$post_type = get_post_type( $post_ID );
	$post_type_object =  get_post_type_object($post_type);
	$post_type_string = $post_type_object->labels->singular_name;

	// Get author
	$current_user = wp_get_current_user();
	$author = esc_html( $current_user->display_name );
	if($author == "Heavenhold") {
		$author = "Sumit";
	}

	$action = "";
	$action_footer = "";
	$string = "";
	$hexcolor = "3366ff";

	// Get previous post values.
	$prev_values = array_values(get_fields( $post_ID, false ));

	// Get submitted post values.
	$submitted = $_POST['acf'];
	$keys = array_keys($submitted);
	$values = array_values($submitted);

	// Check differences between arrays
	$differences = array_map('json_decode', array_diff(array_map('json_encode', $values), array_map('json_encode', $prev_values)));
	
	// If it's a new post
	if(empty($prev_values)) {
		$action = "Added";
		$action_footer = "created";
		$hexcolor = "97ba46";

		// Just loop through each field and output the ones that aren't null/empty
		foreach($submitted as $field => $value) {		
			// If the field's value is an array, it's a field group so we iterate through its fields
			if(!is_array($value)) {
				if(!empty($value)) {
					$updated_field = get_field_object($field);
					$string .= $updated_field['label']."\n"; 
				}
			}
			// If it's not a field group, just take the field as is
			else {
				$isempty = true;
				foreach($value as $subfield => $subvalue) {
					if(!empty($subvalue)) {
						$isempty = false;
					}
				}
				if($isempty == false) {
					$updated_field = get_field_object($field);
					$string .= $updated_field['label']."\n";
				}
			}
		}
	}
	// If it's an update to a post
	else {
		$action = "Updated";		
		$action_footer = "modified";
		$hexcolor = "fdc558";

		// Loop through the differences
		foreach($differences as $key => $difference)
		{
			// Check if the field that's flagged as different has an array as its value
			if(is_array($values[$key])) 
			{
				// Loop through the field's array value
				foreach($values[$key] as $field => $value) {
					// Get the equivalent field from the $prev_values object
					$prev_value = $prev_values[$key][$field];

					// If the field's value is not an array, escape the string
					if(!is_array($prev_value)) {
						$prev_value = addslashes($prev_value);
					}

					// Compare the $prev_value's field to the new value, and if it is indeed different, append it to the output
					if($value != $prev_value)
					{
						$updated_field = get_field_object($field);
						$string .= $updated_field['label']."|"; 
					}
				}
			}
			// If it's not a field group, just compare the field as is
			else {
				$prev_value = $prev_values[$key];
				$value = $values[$key];

				// If the field's value is not an array, escape the string
				if(!is_array($prev_value)) {
					$prev_value = addslashes($prev_value);
				}
				
				// Compare the $prev_value's field to the new value, and if it is indeed different, append it to the output
				if($value != $prev_value)
				{
					$updated_field = get_field_object($keys[$key]);
					$string .= $updated_field['label']."|"; 
				}
			}
		}
	}

	// Build the embed

	$embed_fields = [];

	// Check the length of the changed field list to determine if it needs to be broken into separate embed field values (max 1024 characters each)
	$length = strlen($string);
	$blocks = ceil($length/1024);
	
	// If there are at least 1024 characters
	if ($blocks > 1) 
	{
		// Separate the field list string into an array
		$chunks = explode("|",$string); 

		// Divide the array into n chunks, where n is the number of embed fields we need
		$pieces = array_chunk($chunks, ceil(count($chunks) / $blocks));
		$first = true;
		$field_name = "";
		
		// Loop through each chunk
		foreach ($pieces as $piece) {
			// If it's the first chunk, we set the embed field name as Updated/Added
			if($first) 
			{
				$field_name = $action;
				$first = false;
			}
			// Otherwise we make it an invisible space
			else {
				$unicodeChar = '\u200b';
				$field_name = json_decode('"'.$unicodeChar.'"');
			}

			// Combine the chunk back into a string
			$chunk = implode("\n", $piece);

			// Add to our array of embed fields to pass to our embed definition
			array_push($embed_fields, array("name" => $field_name, "value" => $chunk, "inline" => true));
		}
	}
	// If less than 1024 characters, just output the string as one embed field
	else 
	{
		$finalstring = str_replace("|","\n",$string);
		array_push($embed_fields, array("name" => $action, "value" => $finalstring, "inline" => true));
	}

	// Your Webhook URL
	$webhookurl = "https://discord.com/api/webhooks/860435927591157760/McZt4nEkwXkkuAoi7HTHzeoFeqA_UOMTNTfxdJBza3luvlhd_NHK_4LUB_DirVo8PsFe";

	// Webhook and Embed settings
	$json_data = json_encode([
		// Message
		"content" => "",
		
		// Username
		"username" => "Nari",

		// Text-to-speech
		"tts" => false,

		// Embeds Array 
		"embeds" => [
			[
				// Embed Title
				"title" => $post_title,

				// Embed Type
				"type" => "rich",

				// Embed Description
				"description" => "",

				// URL of the Title link
				"url" => $post_link,

				// Embed left border color in HEX
				"color" => hexdec( $hexcolor ),

				// Footer
				"footer" => [
					"text" => "Page ".$action_footer." by ".$author
				//	"icon_url" => "https://#/image.png"
				],

				// If you want a big image, otherwise use Thumbnail
				// "image" => [
				// 	 "url" => "https://#/image.png"
				// ],

				// Thumbnail (Goes to the right of the Title)
				"thumbnail" => [
					"url" => $featured
				],

				// Author section (Goes above the Title)
				"author" => [
					"name" => $post_type_string
				],

				// Our field array that has the output strings for our changed fields
				"fields" => $embed_fields
			]
		]

	], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE );

	// Send the message through the Webhook
	$ch = curl_init( $webhookurl );
	curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
	curl_setopt( $ch, CURLOPT_POST, 1);
	curl_setopt( $ch, CURLOPT_POSTFIELDS, $json_data);
	curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt( $ch, CURLOPT_HEADER, 0);
	curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);

	$response = curl_exec( $ch );
	curl_close( $ch );

}

function isMobile() {
    return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
}

function modify_banners_query( $query ) {
	if( $query->is_main_query() && !is_admin() && is_post_type_archive( 'banners' ) ) {

		$query->set( 'posts_per_page', '10' );

		$meta_query = array( 
			array(
				'key'       => 'date_end',
				'value' => date("Y-m-d"),
				'compare' => '<',
				'type'		=> 'DATE',
			)
		);

		$query->set( 'meta_query', $meta_query );

	}

}
add_action( 'pre_get_posts', 'modify_banners_query' );

function acp_editing_view_settings_change_numeric_custom_field( $data, AC\Column $column ) {
	if( $column instanceof AC\Column\Meta ) {
		if('column-meta' == $column->get_type()) {
			if ( 'numeric' == $column->get_field_type()) {
				$data['type'] = 'number';
				$data['range_step'] = 0.1;
			}
		}
	}

	return $data;
} 

add_filter( 'acp/editing/view_settings', 'acp_editing_view_settings_change_numeric_custom_field', 10, 2 );

function custom_login_title($origtitle) { 

    return 'Log In - '.get_bloginfo('name');

}
add_filter('login_title', 'custom_login_title', 99);

function heroes_override_per_page( $params ) {
 	if ( isset( $params ) AND isset( $params[ 'posts_per_page' ] ) ) {
 		$params[ 'posts_per_page' ] = PHP_INT_MAX;
 	}

 	return $params;
}

add_action( 'rest_heroes_query', 'heroes_override_per_page' );

function items_override_per_page( $params ) {
	if ( isset( $params ) AND isset( $params[ 'posts_per_page' ] ) ) {
		$params[ 'posts_per_page' ] = PHP_INT_MAX;
	}

	return $params;
}

add_action( 'rest_items_query', 'items_override_per_page' );

function time_elapsed_string($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}
