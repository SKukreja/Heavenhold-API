<?php
/**
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package heavenhold
 */


get_header();
$opt = get_option('heavenhold_opt' );
$is_related = !empty($opt['is_related_posts']) ? $opt['is_related_posts'] : '';

$elementor_library = isset($_GET['elementor_library']) ? $_GET['elementor_library'] : '';
$is_single_post_date = isset ($opt['is_single_post_date']) ? $opt['is_single_post_date'] : '1';

?>

<section class="blog_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                    <div class="section-box">
                        <h4>General<span class="fa fa-plus"></h4>
                        <div class="section-content">
                        <?php 
                        $args = array(
                            'post_type'     => 'guide',
                            'numberposts'   => -1,
                            'tax_query'    => array( 
                                array(
                                    'taxonomy' => 'guide_cat',
                                    'terms' => 'general',
                                    'field' => 'slug'
                                )
                            ),
                            'meta_key' => 'guide_number',
                            'orderby' => 'meta_value_num',
                            'order' => 'ASC'
                        );
                        $query = new WP_Query( $args );

                        // Loop
                        if( $query->have_posts() ) :
                            while( $query->have_posts() ) : $query->the_post();
                                $banner_image = get_field('guide_banner');
                                echo '<div class="guide-banner-image';
                                if(!get_field('available')) {
                                    echo ' unavailable"';
                                }
                                else {
                                    echo '" onclick="window.location=\''.get_the_permalink().'\'"';
                                } 
                                echo ' style="background:url('.$banner_image.')">';
                                echo '<div class="banner-text"><span class="guide-title">'.get_the_title().'</span></div>';
                                echo '</div>';
                            endwhile; 
                        endif;
                        ?>
                        </div>
                    </div>
                    <div class="section-box">
                        <h4>Story<span class="fa fa-plus"></h4>
                        <div class="section-content">
                        <?php 
                        $args = array(
                            'post_type'     => 'guide',
                            'numberposts'   => -1,
                            'tax_query'    => array( 
                                array(
                                    'taxonomy' => 'guide_cat',
                                    'terms' => 'world',
                                    'field' => 'slug'
                                )
                            ),
                            'meta_key' => 'world_number',
                            'orderby' => 'meta_value_num',
                            'order' => 'ASC'
                        );
                        $query = new WP_Query( $args );

                        // Loop
                        if( $query->have_posts() ) :
                            while( $query->have_posts() ) : $query->the_post();
                                $banner_image = get_field('world_banner');
                                $world_number = get_field('world_number');
                                echo '<div class="guide-banner-image';
                                if(!get_field('available')) {
                                    echo ' unavailable"';
                                }
                                else {
                                    echo '" onclick="window.location=\''.get_the_permalink().'\'"';
                                } 
                                echo ' style="background:url('.$banner_image.')">';
                                echo '<div class="banner-text"><span class="world-number">World '.$world_number.'</span>';
                                echo '<span class="guide-title">'.get_the_title().'</span></div>';
                                echo '</div>';
                            endwhile; 
                        endif;
                        ?>
                        </div>
                    </div>
                    <div class="section-box">
                        <h4>Side Stories<span class="fa fa-plus"></h4>
                        <div class="section-content">
                        <?php 
                        $args = array(
                            'post_type'     => 'guide',
                            'numberposts'   => -1,
                            'meta_query'    => array( 
                                array(
                                    'key'       => 'event_type',
                                    'value'     => 'Side Story'
                                )
                            ),
                        );
                        $query = new WP_Query( $args );

                        // Loop
                        if( $query->have_posts() ) :
                            while( $query->have_posts() ) : $query->the_post();
                                $banner_image = get_field('event_banner');
                                echo '<div class="guide-banner-image';
                                if(!get_field('available')) {
                                    echo ' unavailable"';
                                }
                                else {
                                    echo '" onclick="window.location=\''.get_the_permalink().'\'"';
                                } 
                                echo ' style="background:url('.$banner_image.')">';
                                echo '<div class="banner-text"><span class="guide-title">'.get_the_title().'</span></div>';
                                echo '</div>';
                            endwhile; 
                        endif;
                        ?>
                        </div>
                    </div>
                    <div class="section-box">
                        <h4>Short Stories<span class="fa fa-plus"></h4>
                        <div class="section-content">
                        <?php 
                        $args = array(
                            'post_type'     => 'guide',
                            'numberposts'   => -1,
                            'meta_query'    => array( 
                                array(
                                    'key'       => 'event_type',
                                    'value'     => 'Short Story'
                                )
                            ),
                        );
                        $query = new WP_Query( $args );

                        // Loop
                        if( $query->have_posts() ) :
                            while( $query->have_posts() ) : $query->the_post();
                                $banner_image = get_field('event_banner');
                                echo '<div class="guide-banner-image';
                                if(!get_field('available')) {
                                    echo ' unavailable"';
                                }
                                else {
                                    echo '" onclick="window.location=\''.get_the_permalink().'\'"';
                                } 
                                echo ' style="background:url('.$banner_image.')">';
                                echo '<div class="banner-text"><span class="guide-title">'.get_the_title().'</span></div>';
                                echo '</div>';
                            endwhile; 
                        endif;
                        ?>
                        </div>
                    </div>
                    <script>
                    jQuery(function($) {
                        var headers = ["H4","H5","H6"];

                        $("h4").click(function(e) {
                            var target = e.target,
                                name = target.nodeName.toUpperCase();
                            
                            if($.inArray(name,headers) > -1) {
                                var subItem = $(target).next();
                                
                                var depth = $(subItem).parents().length;

                                subItem.slideToggle("fast",function() {
                                    $(target).find('.fa.fa-plus').toggleClass('closed');
                                });
                            }
                        });
                    });
                    </script>
            </div>
            <div class="col-lg-4">
                <?php dynamic_sidebar( 'forum_archive_sidebar' ); ?>
                <?php dynamic_sidebar( 'sidebar_widgets' ); ?>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();
?>