<?php
/**
 * Template Name: Account
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
if (!is_user_logged_in()) {
    wp_redirect( '/login' ); 
    exit;
}
$user = wp_get_current_user();
$user_id = $user->ID;
?>
<script src="//cdn.datatables.net/1.11.0/js/jquery.dataTables.min.js"></script>
<section class="blog_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="hero-box">
                    <div class="profile-menu">
                        <img class="profile-avatar" src="<?php echo get_avatar_url($user_id); ?>">
                        <a href="/account/?section=comments" id="comments-link" class="disabled-link">View Comments</a>
                        <a href="/account/?section=ratings" id="ratings-link" class="disabled-link">Manage Ratings</a>
                        <a href="/account/?section=teams" id="teams-link" class="disabled-link">Manage Teams (Coming Soon)</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-8" id="account-section">
                <div class="section-box" id="comments">
                    <h4>Comments<span class="fa fa-plus"></h4>
                    <div class="section-content">
                    <?php 
                        // WP_Comment_Query arguments
                        $args = array (
                            'user_id'        => $user_id,
                            'number'         => '10',
                        );

                        // The Comment Query
                        $comments = new WP_Comment_Query;
                        $comments = $comments->query( $args );

                        // The Comment Loop
                        if ( $comments ) {
                            foreach ( $comments as $c ) {
                                ?>
                                <div class="user-comment">
                                    <span class="comment-info">
                                        <span class="comment-post"><a href="<?php echo get_comment_link( $c->comment_ID ); ?>"><?php echo get_the_title($c->comment_post_ID); ?></a></span>
                                        <span class="comment-time"><?php echo time_elapsed_string($c->comment_date); ?></span>                                        
                                    </span>
                                    <span class="comment-text"><?php echo $c->comment_content; ?></span>
                                </div>
                                <?php
                            }
                        } else {
                            echo 'You have not commented on any pages yet.';
                        }
                    ?>
                    </div>
                </div>
                <div class="section-box" id="ratings">
                    <h4>Ratings<span class="fa fa-plus"></h4>
                    <div class="section-content">
                    <?php 
                        
                        $discord_id = get_user_meta($user_id, '_discord_id', true);

                        if ( $discord_id ) {
                            $ratings = $wpdb->get_results("SELECT * FROM bitnami_wordpress.discord_ratings WHERE discord_id = '".$discord_id."';");
                            if( $ratings ) {
                                echo '<table id="tier-list" class="filter-table tier-list-table">';
                                echo '<thead><tr><th>Hero</th><th class="rating-column">Arena</th><th class="rating-column">Colosseum</th><th class="rating-column">Raid</th><th class="rating-column">Co-op</th><th class="rating-column">Story</th><th class="rating-column">KamaZONE</th><th class="rating-column">Orbital Lift</th><th class="rating-column">Towers</th></tr></thead>';
                                echo '<tbody>';
                                foreach($ratings as $rating) { 
                                    $hero = (int) $rating->hero_id;
                                    $fullname = $rating->hero;
                                    $rarity = get_field('bio_fields_rarity', $hero);
                                    $equipment = get_field('bio_fields_compatible_equipment', $hero);
                                    $role = get_field('bio_fields_role', $hero);
                                    $element = get_field('bio_fields_element', $hero);
                                    ?>
                                    <tr class="hero-rating-row e-<?php echo $element ?> r-<?php echo $role ?> <?php echo str_replace(' ', '', $rarity); ?> <?php foreach($equipment as $type){echo $type.' ';} ?>" id="hero-<?php echo $fullname ?>">
                                        <td class="hero-column">
                                            <span class="hero-info">
                                                <a class="hero-link" href="<?php the_permalink($hero) ?>"><div class="hero-image" style="background-image:url('<?php echo get_the_post_thumbnail_url($hero, 'thumbnail') ?>');"><?php getRoleIcon($role) ?><?php getElementIcon($element) ?></div><span class="hero-name"><?php echo get_the_title($hero) ?></span></a>
                                                <span class="hero-rarity">
                                                <?php 
                                                if ($rarity == "2 Star") {
                                                    echo '<i class="fas fa-star star2"></i><i class="fas fa-star star2"></i>';
                                                } 
                                                else if ($rarity == "1 Star") {
                                                    echo '<i class="fas fa-star star1"></i>';
                                                }
                                                else {
                                                    echo '<i class="fas fa-star star3"></i><i class="fas fa-star star3"></i><i class="fas fa-star star3"></i>';
                                                }
                                                ?>
                                                </span>
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
                                echo 'You have not rated any heroes yet.';
                            }                        
                        } else {
                            echo 'You must have Discord linked to your account to manage your ratings.';
                        }
                    ?>
                    </div>
                </div>
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

            const urlParams = new URLSearchParams(window.location.search);
            const passedTab = urlParams.get('section');

            if(passedTab == "comments") {
                $("#comments").show();
                $('#ratings-link').removeClass('disabled-link');
            }
            else if(passedTab == "ratings") {
                $("#ratings").show();
                $('#comments-link').removeClass('disabled-link');
            }       
            else {
                $("#comments").show();
                $('#ratings-link').removeClass('disabled-link');
            }    

            var table = $('#tier-list').DataTable( {
            "paging":   false,
            "info":     false,
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
