<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package heavenhold
 */

// Theme settings options
$opt = get_option('heavenhold_opt' );

/**
* Header Nav-bar Layout
 */
$header_type = function_exists('get_field') ? get_field('header_type' ) : '';
if ( !isset($header_type) && is_singular('docs') || is_home() ) {
    //$header_type = 'white';
    $header_type = 'black';
}
else {
    $header_type = 'black';
}
if( class_exists('bbPress') ) {
    if ( is_post_type_archive( array('forum', 'topic') ) || is_singular('forum') || is_singular('topic') ) {
        $header_type = 'white';
    }
}

$page_header_layout = function_exists('get_field' ) ? get_field('header_layout' ) : '';
$is_sticky_header_doc = function_exists('get_field') ? get_Field('is_sticky_header') : '';
$is_sticky_body_wrapper = $is_sticky_header_doc == '1' ? 'sticky_menu' : '';

$sticky_header_id = $is_sticky_header_doc == '1' ? 'stickyTwo' : 'sticky' ;

$doc_page_layout = function_exists('get_field') ? get_field('page_layout') : '';
$nav_container = 'container';
if ( is_singular('docs') ) {
    $nav_container = $doc_page_layout == 'full-width' ? 'container-fluid pl-60 pr-60' : 'container custom_container';
}
if ( is_front_page() ) {
    //$menu_type = 'menu_one';
    $menu_type = 'menu_two';
} 
else {
    $menu_type = 'menu_two';
}

$menu_display_none = is_singular('docs') ? 'display_none ' : '';

$nav_color = $header_type == 'black' ? ' dk_menu' : '';
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset' ); ?>">
        <!-- For IE -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- For Resposive Device -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php wp_head(); ?>
        <script data-ad-client="ca-pub-5413624345530843" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    </head>

    <body <?php body_class(); ?> data-scroll-animation="true">
        <?php
        if ( function_exists('wp_body_open') ) {
            wp_body_open();
        }
        ?>

        <?php
        /**
         * Preloader
         */
        $is_preloader = isset($opt['is_preloader']) ? $opt['is_preloader'] : '';
        if ( $is_preloader == '1' ) {
            get_template_part('template-parts/header-elements/preloader');
        }
        ?>

        <div class="body_wrapper <?php echo esc_attr($is_sticky_body_wrapper) ?>">
            <nav class="navbar navbar-expand-lg <?php echo esc_attr($menu_display_none.$menu_type.$nav_color) ?>" id="<?php echo esc_attr($sticky_header_id) ?>">
                <div class="<?php echo esc_attr($nav_container) ?>">
                    <?php Heavenhold_helper()->logo(); ?>
                    <button class="navbar-toggler collapsed" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="<?php esc_attr_e('Toggle navigation', 'heavenhold'); ?>">
                        <span class="menu_toggle">
                            <span class="hamburger">
                                <span></span>
                                <span></span>
                                <span></span>
                            </span>
                            <span class="hamburger-cross">
                                <span></span>
                                <span></span>
                            </span>
                        </span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <?php
                        if ( has_nav_menu('main_menu') ) {
                            wp_nav_menu( array (
                                'menu' => 'main_menu',
                                'theme_location' => 'main_menu',
                                'container' => null,
                                'menu_class' => "navbar-nav menu ml-auto",
                                'walker' => new Heavenhold_Nav_Walker(),
                                'depth' => 4
                            ));
                        }
                        ?>
                        <form class="s-f" action="<?php echo esc_url(home_url('/')) ?>" role="search" method="get">
                            <label for="search" class="s-w">
                            <button class="s-b"><i class="fa fa-search"></i></button><!-- Fix the break-row-bug
                            --><input type="text" id="search" onkeyup="fetchResultsNav()" class="s-i" />
                            </label>
                            <div id="heavenhold-search-result"></div>
                        </form>
                        <?php //if ( !is_front_page() ) : ?>                        
                        <script>
                            jQuery(function($){
                                $(".s-w .s-b").on("click", function(e){
                                    e.preventDefault();
                                    if ($(window).width() >= 991) {
                                        $("html").addClass("search-exp");
                                    }
                                    if('' != this.value) {
                                        $('#heavenhold-search-result').addClass('ajax-search');
                                    }
                                    $(".s-i").focus();
                                });
                                $(".s-i").blur(function(){
                                    // Do not hide input if contains text
                                    if($(".s-i").val() === ""){
                                        if ($(window).width() >= 991) {
                                            $("html").removeClass("search-exp");
                                        }
                                        $('#heavenhold-search-result').removeClass('ajax-search');
                                    }
                                });
                                if ($(window).width() < 991) {
                                    $("html").addClass("search-exp");
                                }
                                function reportWindowSize() {
                                    if ($(window).width() < 991) {
                                        $("html").addClass("search-exp");
                                    }
                                    else {
                                        $("html").removeClass("search-exp");
                                    }
                                }

                                window.onresize = reportWindowSize;
                            });
                        </script>
                        <?php //endif; ?>
                    </div>
                    <!-- get_template_part('template-parts/header-elements/action-button' ); -->
                </div>
            </nav>

            <?php
            /**
             * Page Title-bar
             */
            get_template_part('template-parts/header-elements/titlebar');

            /**
             * Single post Titlebar
             */
            /*if ( is_single() && !is_singular('docs') && !is_singular('forum') && !is_singular('topic') && !is_singular('heroes') && !is_singular('items') && !is_singular('page') ) {
                $is_search_banner = '';
                get_template_part('template-parts/header-elements/banner-single');
            }*/

            /**
             * Search banner area
             */
            $is_search_banner = function_exists('get_field') ? get_field('is_search_banner') : '';
            if ( !is_front_page() ) {
                $is_search_banner = '';
            }

            if ( $is_search_banner == '1' ) {
                get_template_part('template-parts/header-elements/search_banner');
            }