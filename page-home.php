<?php
/**
 * Template Name: Home
 *
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package heavenhold
 */
$is_banner = '';
get_header();
$opt = get_option('heavenhold_opt' );
$is_related = !empty($opt['is_related_posts']) ? $opt['is_related_posts'] : '';

$elementor_library = isset($_GET['elementor_library']) ? $_GET['elementor_library'] : '';

$args = array(
    'post_type'     => 'heroes',
    'meta_query'    => array( 
        array(
            'key'     => 'bio_fields_rarity', 
            'value'   => array('2 Star', '3 Star'),
            'compare' => 'IN'
        )
    ),
    'orderby' => 'rand', 
    'posts_per_page' => '1'
);
$query = new WP_Query( $args );
while ( $query->have_posts() ) : $query->the_post();
    $guestHeroLink = get_the_permalink();
    $guestHeroImage = get_field('illustration');
endwhile;
?>

<div class="scene">
    <h2 class="splash-slogan">Let's play together!</h2>
    <div class="home-buttons">
        <div class="side-button" id="discord-button"><div class="discord-button"></div></div>
        <div class="side-button" id="comment-button"><div class="toggle-comments"></div></div>
    </div>
    <div class="home-comments">
    <ul>
		<?php $args_comments = array('number' => 5, 'status' => 'approve');
		$recent_comments = get_comments($args_comments);
		foreach ($recent_comments as $r) {
			echo '<a href="'. get_comment_link($r->comment_ID) .'" title="'. __('Date/time:', 'shapespace') . $r->comment_date .'"><li class="r-comment">';
            echo '<span class="comment-left">'.get_avatar( $r, 64 ).'</span><span class="comment-right"><span class="comment-author">'.$r->comment_author .'</span>';
            echo '<span class="comment-post"> on '.get_the_title($r->comment_post_ID).'</span><span class="comment-date">'.timeago($r->comment_date).'</span>';
			echo '<span class="comment-content">'.comment_truncate_string(get_comment_excerpt($r->comment_ID), 12) .'</span></li></a>';
		} ?>
	</ul>
    </div>
    <div class="scene-hero"><a href="<?php echo $guestHeroLink ?>"><img src="<?php echo $guestHeroImage ?>"></a></div>
    <div class="home-search"><form action="<?php echo esc_url(home_url('/')) ?>" role="search" method="get"><button type="submit"><i class="icon_search"></i></button><input class="home-query" id="searchInput" type="textbox" onkeyup="fetchResults()" class="s-input"><div id="home-search-result"></div>
    </form></div>
</div> 
<?php
get_footer();
function comment_truncate_string($phrase, $max_words) {
	
	$phrase_array = explode(' ', $phrase);
	
	if (count($phrase_array) > $max_words && $max_words > 0) 
		$phrase = implode(' ', array_slice($phrase_array, 0, $max_words)) . __('...', 'shapespace');
	
	return $phrase;
	
}
?>
<script>
jQuery(function($){
    $('.scene-hero').addClass("fade-in");
    $('#comment-button').click(function() {
        $('.home-comments').toggleClass("fade-in");
    });
    $('#discord-button').click(function() {
        window.location.href = "https://discord.gg/heavenhold";
    });
});
</script>