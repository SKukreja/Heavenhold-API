<?php
/**
 * Template Name: Ratings
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
$hero_id = (int) $_GET['hero'];
$type = get_post_type($hero_id);
$hero = get_the_title($hero_id);
if (!$hero || $type != 'heroes' || $hero_id == 0) {
    wp_redirect(home_url()); 
    exit;
}
?>
<script src="//cdn.datatables.net/1.11.0/js/jquery.dataTables.min.js"></script>
<section class="blog_area">
    <div class="container">
        <div class="row">            
            <div class="col-lg-8">
                <a href="<?php echo get_the_permalink($hero_id); ?>"><< Back to <?php echo $hero; ?></a>
                <hr>
                <div class="section-box">
                    <h4>Ratings<span class="fa fa-plus"></h4> 
                    <div class="section-content">
                    <?php                         
                        if ( $hero ) {
                            $ratings = $wpdb->get_results("SELECT * FROM bitnami_wordpress.discord_ratings WHERE hero = '".$hero."';");
                            if( $ratings ) {
                                echo '<table id="tier-list" class="filter-table tier-list-table">';
                                echo '<thead><tr><th>User</th><th class="rating-column">Arena</th><th class="rating-column">Colosseum</th><th class="rating-column">Raid</th><th class="rating-column">Co-op</th><th class="rating-column">Story</th><th class="rating-column">KamaZONE</th><th class="rating-column">Orbital Lift</th><th class="rating-column">Towers</th></tr></thead>';
                                echo '<tbody>';
                                foreach($ratings as $rating) { 
                                    $rater = $rating->discord_id;
                                    $fullname = $rating->hero;
                                    $rarity = get_field('bio_fields_rarity', $hero);
                                    $equipment = get_field('bio_fields_compatible_equipment', $hero);
                                    $role = get_field('bio_fields_role', $hero);
                                    $element = get_field('bio_fields_element', $hero);
                                    ?>
                                    <tr class="hero-rating-row e-<?php echo $element ?> r-<?php echo $role ?> <?php echo str_replace(' ', '', $rarity); ?> <?php foreach($equipment as $type){echo $type.' ';} ?>" id="hero-<?php echo $fullname ?>">
                                        <td class="hero-column">
                                            <span class="hero-info">
                                                <?php echo $rater; ?>
                                            </span>
                                            <div class="mobile-ratings">
                                                <span class="mobile-rating-row"><span class="rating-type">Arena</span><span class="mobile-rating"><?php echo $rating->arena + 0; ?></span></span>
                                                <span class="mobile-rating-row"><span class="rating-type">Colosseum</span><span class="mobile-rating"><?php echo $rating->colo + 0; ?></span></span>
                                                <span class="mobile-rating-row"><span class="rating-type">Raid</span><span class="mobile-rating"><?php echo $rating->raid + 0; ?></span></span>
                                                <span class="mobile-rating-row"><span class="rating-type">Co-op</span><span class="mobile-rating"><?php echo $rating->coop + 0; ?></span></span>
                                                <span class="mobile-rating-row"><span class="rating-type">Story</span><span class="mobile-rating"><?php echo $rating->story + 0; ?></span></span>
                                                <span class="mobile-rating-row"><span class="rating-type">KamaZONE</span><span class="mobile-rating"><?php echo $rating->kamazone + 0; ?></span></span>
                                                <span class="mobile-rating-row"><span class="rating-type">Orbital Lift</span><span class="mobile-rating"><?php echo $rating->orbital + 0; ?></span></span>
                                                <span class="mobile-rating-row"><span class="rating-type">Tower</span><span class="mobile-rating"><?php echo $rating->tower + 0; ?></span></span>
                                            </div>
                                        </td>   
                                        <td class="rating-column"><?php echo $rating->arena + 0; ?></td>
                                        <td class="rating-column"><?php echo $rating->colo + 0; ?></td>
                                        <td class="rating-column"><?php echo $rating->raid + 0; ?></td>
                                        <td class="rating-column"><?php echo $rating->coop + 0; ?></td>
                                        <td class="rating-column"><?php echo $rating->story + 0; ?></td>
                                        <td class="rating-column"><?php echo $rating->kamazone + 0; ?></td>
                                        <td class="rating-column"><?php echo $rating->orbital + 0; ?></td>
                                        <td class="rating-column"><?php echo $rating->tower + 0; ?></td> 
                                    </tr>
                                <?php    
                                } 
                                echo '</tbody>';
                                echo '</table>';
                            }
                            else {
                                echo 'This hero has not been rated yet.';
                            }                        
                        } else {
                            echo 'Invalid hero provided.';
                        }
                    ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <?php getDiscordSidebar(); ?>
                <?php dynamic_sidebar( 'forum_archive_sidebar' ); ?>
                <?php dynamic_sidebar( 'sidebar_widgets' ); ?>
            </div>
        </div>
    </div>
    <script>
        jQuery(function($) {
            var headers = ["H4"];

            $(".start-closed").each(function(){
                var subItem = $(this).next();
                $(this).find('.fa.fa-plus').toggleClass('closed');
                var depth = $(subItem).parents().length;

                subItem.slideToggle("fast",function() {
                    
                });
            });

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

            var table = $('#tier-list').DataTable( {
            "paging":   false,
            "info":     false,
            "searching":   false,
            "order": [[ 0, "desc" ]],
            "columnDefs": [
                { "type": "num-fmt", "targets": 1 },
                { "type": "num-fmt", "targets": 2 },
                { "type": "num-fmt", "targets": 3 },
                { "type": "num-fmt", "targets": 4 },
                { "type": "num-fmt", "targets": 5 },
                { "type": "num-fmt", "targets": 6 },
                { "type": "num-fmt", "targets": 7 },
                { "type": "num-fmt", "targets": 8 }
            ]
            });

            $(".rating-column").each(function(i){
            $(this).css("color",heatmap_color_for(parseInt(parseFloat($(this).text()) * 10)));

            $('.banner-middle h1').text('<?php echo $hero; ?>');
        });
        });
        function heatmap_color_for(value) {
            var r = 255-(100-value);
            var g = 55+(2*(100-value));
            var b = 0;

            return 'rgb('+r+', '+g+', '+b+')';
        }
    </script>
</section>
<?php
get_footer();
