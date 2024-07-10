<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package heavenhold
 */

/**
 * Theme Options
 */
$opt = get_option('heavenhold_opt' );

/**
 * Page Options
 */
$footer_visibility = function_exists('get_field') ? get_field('footer_visibility') : '1';
if ( !isset($footer_visibility) ) {
    $footer_visibility = '1';
}

if ( $footer_visibility == '1' ) {
    if (is_singular('docs')) {
        $footer_style = !empty($opt['doc_footer']) ? $opt['doc_footer'] : 'simple';
    } else {
        $footer_style = !empty($opt['footer_style']) ? $opt['footer_style'] : 'normal';
    }
    $copyright_text = !empty($opt['copyright_txt']) ? $opt['copyright_txt'] : esc_html__('©2020 CreativeGigs. All rights reserved', 'heavenhold');
    $footer_visibility = function_exists('get_field') ? get_field('footer_visibility') : '1';
    $footer_visibility = isset($footer_visibility) ? $footer_visibility : '1';

    get_template_part('template-parts/footers/footer', $footer_style);

    /**
     * Tooltips
     */
    $is_tooltips = function_exists('get_field') ? get_field('is_tooltips') : '';
    if ($is_tooltips == '1') {
        get_template_part('template-parts/tooltips');
    }
}
?>

<script>
    jQuery(function($) {
        var cForm = jQuery('#commentform');
        
        cForm.find('input[type=submit]').on('click', function(e){
            jQuery.ajax({
                url: cForm.attr('action') + '?' + cForm.serialize() + '&is_valid_comment=',
                method: 'post'
            }).done(function( data ) {
            })
            .fail(function() {
                alert( "error" );
            });
        });
    });
</script>

</div> <!-- Body Wrapper -->

<?php wp_footer(); ?>
</body>
</html>