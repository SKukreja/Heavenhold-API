<?php
/**
 * Template Name: KamaZONE
 *
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

<link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/assets/css/owl.carousel.min.css">
<section class="blog_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
            <?php
                while ( have_posts() ) : the_post();
                    the_content();
                endwhile;
            ?>     
            <h4>Artifacts</h4>
            <?php
            $args = array(
                'post_type'     => 'items',
                'numberposts'   => -1,
                'tax_query'    => array( 
                    array(
                        'taxonomy'       => 'item_categories',
                        'field'     => 'slug',
                        'terms'     => 'artifacts'
                    )
                ),
                'meta_query'    => array( 
                    array(
                        'key'       => 'artifact_rarity',
                        'value'     => 'High-grade Artifact'
                    )
                ),
            );
            $query = new WP_Query( $args );
            if( $query->have_posts() ) :
            ?>
            <table class="hero-abilities-table artifacts-table">
            <tr><th class="ability-header" colspan="2">High-grade Artifacts</th></tr>
            <?php 
                while( $query->have_posts() ) : $query->the_post();
                    $passives = get_field('artifact_passives');
                    $passives = str_replace("[Party]", '<span class="bold">[Party]</span>', $passives);
                    $passives = preg_replace('/\+.*%/i', '<span class="green">$0</span>', $passives);
                    $passives = preg_replace('/\-.*%/i', '<span class="red">$0</span>', $passives);
                    $artifact_description = get_field('artifact_description');
                    echo '<tr><td class="artifact-row artifact-row-left"><span class="artifact-name-mobile">'.get_the_title().'</span><img class="artifact-image" src="'.get_the_post_thumbnail_url().'"><span class="artifact-name">'.get_the_title().'</span></td><td class="artifact-row"><span class="artifact-effects">'.$passives.'</span><hr><span class="artifact-description">'.$artifact_description.'</span></td></tr>';                        
                endwhile; 
            ?>
            <?php 
            endif;
            ?>
            <?php
            $args = array(
                'post_type'     => 'items',
                'numberposts'   => -1,
                'tax_query'    => array( 
                    array(
                        'taxonomy'       => 'item_categories',
                        'field'     => 'slug',
                        'terms'     => 'artifacts'
                    )
                ),
                'meta_query'    => array( 
                    array(
                        'key'       => 'artifact_rarity',
                        'value'     => 'Mid-grade Artifact'
                    )
                ),
            );
            $query = new WP_Query( $args );
            if( $query->have_posts() ) :
            ?>
            <tr><th class="ability-header" colspan="2">Mid-grade Artifacts</th></tr>
            <?php 
                while( $query->have_posts() ) : $query->the_post();
                    $passives = get_field('artifact_passives');
                    $passives = str_replace("[Party]", '<span class="bold">[Party]</span>', $passives);
                    $passives = preg_replace('/\+.*%/i', '<span class="green">$0</span>', $passives);
                    $passives = preg_replace('/\-.*%/i', '<span class="red">$0</span>', $passives);
                    $artifact_description = get_field('artifact_description');
                    echo '<tr><td class="artifact-row artifact-row-left"><span class="artifact-name-mobile">'.get_the_title().'</span><img class="artifact-image" src="'.get_the_post_thumbnail_url().'"><span class="artifact-name">'.get_the_title().'</span></td><td class="artifact-row"><span class="artifact-effects">'.$passives.'</span><hr><span class="artifact-description">'.$artifact_description.'</span></td></tr>';                        
                endwhile; 
            ?>
            <?php 
            endif;
            ?>
            <?php
            $args = array(
                'post_type'     => 'items',
                'numberposts'   => -1,
                'tax_query'    => array( 
                    array(
                        'taxonomy'       => 'item_categories',
                        'field'     => 'slug',
                        'terms'     => 'artifacts'
                    )
                ),
                'meta_query'    => array( 
                    array(
                        'key'       => 'artifact_rarity',
                        'value'     => 'Low-grade Artifact'
                    )
                ),
            );
            $query = new WP_Query( $args );
            if( $query->have_posts() ) :
            ?>
            <tr><th class="ability-header" colspan="2">Low-grade Artifacts</th></tr>
            <?php 
                while( $query->have_posts() ) : $query->the_post();
                    $passives = get_field('artifact_passives');
                    $passives = str_replace("[Party]", '<span class="bold">[Party]</span>', $passives);
                    $passives = preg_replace('/\+.*%/i', '<span class="green">$0</span>', $passives);
                    $passives = preg_replace('/\-.*%/i', '<span class="red">$0</span>', $passives);
                    $artifact_description = get_field('artifact_description');
                    echo '<tr><td class="artifact-row artifact-row-left"><span class="artifact-name-mobile">'.get_the_title().'</span><img class="artifact-image" src="'.get_the_post_thumbnail_url().'"><span class="artifact-name">'.get_the_title().'</span></td><td class="artifact-row"><span class="artifact-effects">'.$passives.'</span><hr><span class="artifact-description">'.$artifact_description.'</span></td></tr>';                        
                endwhile; 
            ?>
            <?php 
            endif;
            ?>
            <?php
            $args = array(
                'post_type'     => 'items',
                'numberposts'   => -1,
                'tax_query'    => array( 
                    array(
                        'taxonomy'       => 'item_categories',
                        'field'     => 'slug',
                        'terms'     => 'artifacts'
                    )
                ),
                'meta_query'    => array( 
                    array(
                        'key'       => 'artifact_rarity',
                        'value'     => 'Cursed Artifact'
                    )
                ),
            );
            $query = new WP_Query( $args );
            if( $query->have_posts() ) :
            ?>
            <tr><th class="ability-header" colspan="2">Cursed Artifacts</th></tr>
            <?php 
                while( $query->have_posts() ) : $query->the_post();
                    $passives = get_field('artifact_passives');
                    $passives = str_replace("[Party]", '<span class="bold">[Party]</span>', $passives);
                    $passives = preg_replace('/\+.*%/i', '<span class="green">$0</span>', $passives);
                    $passives = preg_replace('/\-.*%/i', '<span class="red">$0</span>', $passives);
                    $artifact_description = get_field('artifact_description');
                    echo '<tr><td class="artifact-row artifact-row-left"><span class="artifact-name-mobile">'.get_the_title().'</span><img class="artifact-image" src="'.get_the_post_thumbnail_url().'"><span class="artifact-name">'.get_the_title().'</span></td><td class="artifact-row"><span class="artifact-effects">'.$passives.'</span><hr><span class="artifact-description">'.$artifact_description.'</span></td></tr>';                        
                endwhile; 
            ?>
            <?php 
            endif;
            ?>
            </table>
            <?php
                // Post share
                if ( class_exists('Heavenhold_core') ) {
                    heavenholdcore_social_share();
                }

                // If comments are open or we have at least one comment, load up the comment template.
                if ( comments_open() || get_comments_number() ) :
                    comments_template();
                endif;
            ?>
            </div>
            <div class="col-lg-4">
            <?php dynamic_sidebar( 'forum_archive_sidebar' ); ?> 
            <?php getDiscordSidebar(); ?>
            <div class="sidebar-small">
            <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
            <!-- Sidebar Mid -->
            <ins class="adsbygoogle"
                style="display:block"
                data-ad-client="ca-pub-5413624345530843"
                data-ad-slot="7224880210"
                data-ad-format="horizontal"
                data-full-width-responsive="true"></ins>
            <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
            </script>
            </div>
            <?php dynamic_sidebar( 'sidebar_widgets' ); ?>
            </div>
        </div>
    </div>
</section>
<script src="<?php echo get_template_directory_uri() ?>/assets/js/owl.carousel.min.js"></script>
<script src="<?php echo get_template_directory_uri() ?>/assets/js/jquery.mousewheel.min.js"></script>
<?php
get_footer();