<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package heavenhold
 */

get_header();
$opt = get_option('heavenhold_opt' );
$blog_column = is_active_sidebar( 'sidebar_widgets' ) ? '8' : '12';
$blog_layout = !empty($opt['blog_layout']) ? $opt['blog_layout'] : 'list';
?>
<section class="doc_blog_classic_area sec_pad">
    <div class="container">
        <div class="row">
            <div class="col-lg-<?php echo esc_attr($blog_column) ?>">
                <?php
                while ( have_posts() ) : the_post();
                    get_template_part( 'template-parts/contents/content', get_post_format() );
                endwhile;
                Heavenhold_helper()->pagination();
                ?>
            </div>
            <?php get_sidebar(); ?>
        </div>
    </div>
</section>

<?php
get_footer();