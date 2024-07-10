<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package heavenhold
 */

get_header();
$padding = "";

while ( have_posts() ) : the_post();
    ?>
    <section class="blog_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <?php
                    the_content();
                    ?>
                    <?php
                    // If comments are open or we have at least one comment, load up the comment template.
                    if ( comments_open() || get_comments_number() ) :
                        comments_template();
                    endif;
                    ?>
                </div>
                <div class="col-lg-4">
                    <?php dynamic_sidebar( 'forum_archive_sidebar' ); ?>
                    <?php dynamic_sidebar( 'sidebar_widgets' ); ?>
                </div>
            </div>
        </div>
    </section>
    <?php
endwhile; // End of the loop.

get_footer();
