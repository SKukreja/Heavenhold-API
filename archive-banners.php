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


$pagecount = 0;
?>

<section class="blog_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <?php if(!get_query_var('paged')) : ?>
                <h4 class="banner-heading">Current Banners</h4>
                <div class="row inner-row">
                    <div class="col-lg-6 banner-list">
                        <?php 
                            $args = array(
                                'post_type'     => 'banners',
                                'numberposts'   => -1,
                                'tax_query' => array(
                                    array(
                                        'taxonomy' => 'banner_categories',
                                        'field'    => 'slug',
                                        'terms'    => 'heroes'
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
                                'orderby' => 'meta_value',
                            );
                            $query = new WP_Query( $args );

                            if( $query->have_posts() ) :
                                while( $query->have_posts() ) : $query->the_post();
                                    $start_date = get_field('date_start');
                                    $end_date = get_field('date_end');
                                    ?>
                                    <a href="<?php echo get_the_permalink() ?>">
                                    <div class="banner-information hero-banner" style="background-image: url(<?php echo get_the_post_thumbnail_url() ?>);">
                                        <div class="collection-info-bar">
                                            <span class="collection-name"><?php the_title(); ?></span>
                                            <span class="banner-subtext">
                                                <span class="banner-period"><?php echo $start_date ?> ~ <?php echo $end_date ?></span>
                                            </span>
                                        </div>
                                        <span class="banner-type hero-banner-text">Hero Banner</span>
                                    </div>
                                    </a>
                                    <?php
                                endwhile;
                            endif;
                        ?>
                        <a href="<?php echo get_the_permalink(12756) ?>">
                        <div class="banner-information hero-banner" style="background-image: url(<?php echo get_the_post_thumbnail_url(12756) ?>);">
                            <div class="collection-info-bar">
                                <span class="collection-name"><?php echo get_the_title(12756); ?></span>
                            </div>
                            <span class="banner-type hero-banner-text">Hero Banner</span>
                        </div>
                        </a>
                    </div>
                    <div class="col-lg-6 banner-list">
                        <?php 
                            $args = array(
                                'post_type'     => 'banners',
                                'numberposts'   => -1,
                                'tax_query' => array(
                                    array(
                                        'taxonomy' => 'banner_categories',
                                        'field'    => 'slug',
                                        'terms'    => 'items'
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
                                'orderby' => 'meta_value',
                            );
                            $query = new WP_Query( $args );

                            if( $query->have_posts() ) :
                                while( $query->have_posts() ) : $query->the_post();
                                $start_date = get_field('date_start');
                                $end_date = get_field('date_end');
                                ?>
                                <a href="<?php echo get_the_permalink() ?>">
                                    <div class="banner-information equipment-banner" style="background-image: url(<?php echo get_the_post_thumbnail_url() ?>);">
                                        <div class="collection-info-bar">
                                            <span class="collection-name"><?php the_title(); ?></span>
                                            <span class="banner-subtext">
                                                <span class="banner-period"><?php echo $start_date ?> ~ <?php echo $end_date ?></span>
                                            </span>
                                        </div>
                                        <span class="banner-type equipment-banner-text">Equipment Banner</span>
                                    </div>
                                </a>
                                <?php
                                endwhile;
                            endif;
                        ?>
                        <a href="<?php echo get_the_permalink(12761) ?>">
                        <div class="banner-information equipment-banner" style="background-image: url(<?php echo get_the_post_thumbnail_url(12761) ?>);">
                            <div class="collection-info-bar">
                                <span class="collection-name"><?php echo get_the_title(12761); ?></span>
                            </div>
                            <span class="banner-type equipment-banner-text">Equipment Banner</span>
                        </div>
                        </a>
                    </div>
                </div>
                <?php endif; ?>
                <h4 class="banner-heading previous-banner-list">Previous Banners</h4>
                <div class="row inner-row">
                    <div class="col-lg-6 banner-list">
                        <?php 
                            $args = array(
                                'post_type'     => 'banners',
                                'numberposts'   => -1,
                                'tax_query' => array(
                                    array(
                                        'taxonomy' => 'banner_categories',
                                        'field'    => 'slug',
                                        'terms'    => 'heroes'
                                    )
                                ),
                                'meta_query'    => array( 
                                    array(
                                        'key'       => 'date_end',
                                        'value' => date("Y-m-d"),
                                        'compare' => '<',
                                        'type'		=> 'DATE',
                                    )
                                ),
                                'posts_per_page'    => 5,
                                'paged' => (get_query_var('paged')) ? get_query_var('paged') : 1,
                                'meta_key' => 'date_start',
                                'orderby' => 'meta_value',
                            );
                            $query = new WP_Query( $args );

                            if( $query->have_posts() ) :
                                while( $query->have_posts() ) : $query->the_post();
                                    $start_date = get_field('date_start');
                                    $end_date = get_field('date_end');
                                    ?>
                                    <a href="<?php echo get_the_permalink() ?>">
                                    <div class="banner-information hero-banner" style="background-image: url(<?php echo get_the_post_thumbnail_url() ?>);">
                                        <div class="collection-info-bar">
                                            <span class="collection-name"><?php the_title(); ?></span>
                                            <span class="banner-subtext">
                                                <span class="banner-period"><?php echo $start_date ?> ~ <?php echo $end_date ?></span>
                                            </span>
                                        </div>
                                        <span class="banner-type hero-banner-text">Hero Banner</span>
                                    </div>
                                    </a>
                                    <?php
                                endwhile;
                            endif;
                        ?>
                    </div>
                    <div class="col-lg-6 banner-list">
                        <?php 
                            $args = array(
                                'post_type'     => 'banners',
                                'numberposts'   => -1,
                                'tax_query' => array(
                                    array(
                                        'taxonomy' => 'banner_categories',
                                        'field'    => 'slug',
                                        'terms'    => 'items'
                                    )
                                ),
                                'meta_query'    => array( 
                                    array(
                                        'key'       => 'date_end',
                                        'value' => date("Y-m-d"),
                                        'compare' => '<',
                                        'type'		=> 'DATE',
                                    )
                                ),
                                'posts_per_page'    => 5,
                                'paged' => (get_query_var('paged')) ? get_query_var('paged') : 1,
                                'meta_key' => 'date_start',
                                'orderby' => 'meta_value',
                            );
                            $query = new WP_Query( $args );

                            if( $query->have_posts() ) :
                                while( $query->have_posts() ) : $query->the_post();
                                $start_date = get_field('date_start');
                                $end_date = get_field('date_end');
                                ?>
                                <a href="<?php echo get_the_permalink() ?>">
                                    <div class="banner-information equipment-banner" style="background-image: url(<?php echo get_the_post_thumbnail_url() ?>);">
                                        <div class="collection-info-bar">
                                            <span class="collection-name"><?php the_title(); ?></span>
                                            <span class="banner-subtext">
                                                <span class="banner-period"><?php echo $start_date ?> ~ <?php echo $end_date ?></span>
                                            </span>
                                        </div>
                                        <span class="banner-type equipment-banner-text">Equipment Banner</span>
                                    </div>
                                </a>
                                <?php
                                endwhile;
                                $pagecount = $query->max_num_pages;
                            endif;
                        ?>
                    </div>
                </div>
                <div class="page-controls">
                <?php 
                    echo paginate_links(array(
                        'total' => $pagecount
                    ));
                ?>
                </div>
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