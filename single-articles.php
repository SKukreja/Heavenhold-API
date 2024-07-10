<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
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