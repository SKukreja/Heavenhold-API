<?php
/**
 * The template for displaying 404 pages (not found)
 *
 */
get_header();
$opt = get_option('heavenhold_opt' );
$title  =!empty($opt['error_heading']) ?  $opt['error_heading'] : esc_html__( 'Error. We can’t find the page you’re looking for.', 'heavenhold' );
$subtitle = !empty($opt['error_subtitle']) ? $opt['error_subtitle'] : esc_html__("We can't seem to find the page you're looking for", "heavenhold");
$btn_title  =!empty($opt['error_home_btn_label']) ?  $opt['error_home_btn_label'] : esc_html__( 'Go Back to home Page', 'heavenhold' );
$bg_shape = !empty( $opt['bg_shape']) ? $opt['bg_shape'] : HEAVENHOLD_DIR_IMG.'/404_bg.png';
$error2_image = !empty( $opt['error2_image']['url']) ? $opt['error2_image']['url'] : HEAVENHOLD_DIR_IMG.'/new/error.png';
?>

<section class="error_area">
    <div class="container">
        <div class="error_content_two text-center">
            <h1 class="error404header">404</h1>
            <?php if ( !empty($title) ) : ?>
                <h2><?php echo wp_kses_post($title) ?></h2>
            <?php endif; ?>
            <form action="<?php echo esc_url(home_url('/')) ?>" class="error_search">
                <input type="text" name="s" class="form-control" placeholder="<?php esc_attr_e('Search', 'heavenhold' ) ?>">
            </form>
            <a href="<?php echo esc_url(home_url('/')) ?>" class="action_btn box_shadow_none">
                <?php echo esc_html($btn_title) ?><i class="arrow_right"></i>
            </a>
        </div>
    </div>
</section>

<?php
get_footer('empty');