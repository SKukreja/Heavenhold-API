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
$blog_column = is_active_sidebar( 'sidebar_widgets' ) ? '8' : '12';
$elementor_library = isset($_GET['elementor_library']) ? $_GET['elementor_library'] : '';
$is_single_post_date = isset ($opt['is_single_post_date']) ? $opt['is_single_post_date'] : '1';
$sidebox = false;
?>

<section class="blog_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-<?php echo esc_attr($blog_column) ?>">
                <div class="blog_single_info">
                    <div class="blog_single_item">
                        <?php
                        while ( have_posts() ) : the_post();
                            $user_desc = get_the_author_meta( 'description' );
                            $picture = get_the_post_thumbnail_url();
                            if(has_term('Stage', 'guide_cat')) {
                                $sidebox = true;
                                $stage_type = get_field('stage_type');
                                $purple_coin_icon = get_field('purple_coin_icon');
                                if($stage_type == 'Normal') {
                                    $parent = get_field('world');
                                }
                                else if($stage_type == 'Nightmare') {
                                    $parent = get_field('world_nightmare');
                                }
                                else if ($stage_type == 'Hell') {
                                    $parent = get_field('world_hell');
                                }
                                else if($stage_type == 'Event Story') {
                                    $parent = get_field('event');
                                }
                                else if($stage_type == 'Event Challenge') {
                                    $parent = get_field('event_challenge');
                                }
                                $world = get_field('world');
                                $world_nightmare = get_field('world_nightmare');
                                $event = get_field('event');
                                $event_challenge = get_field('event_challenge');
                                $collectibles = get_field('collectibles');
                                $stage_purple_coins = get_field("purple_coins");
                                $stage_star_pieces = get_field("star_pieces");
                                $coffee_cost = get_field('coffee_cost');
                                $enemies = get_field('enemies');
                                $rewards = get_field("rewards");
                                $bosses = get_field('boss');
                            }
                            if(has_term('World', 'guide_cat')) {
                                $sidebox = true;
                                $purple_coin_icon = get_field('purple_coin_icon');
                                $world_number = get_field('world_number');
                                $purple_coins = get_field("purple_coins_normal");
                                $star_pieces = get_field("star_pieces_normal");
                                $purple_coins_nightmare = get_field("purple_coins_nightmare");
                                $star_pieces_nightmare = get_field("star_pieces_nightmare");  
                                $completion_reward = get_field("100%_reward");
                                $world_map = get_field('world_map');
                                $stages = get_field('stages');
                                $stages_nightmare = get_field('stages_nightmare');
                            }
                            if(has_term('Event', 'guide_cat')) {
                                $sidebox = true;
                                $event_type = get_field('event_type');
                                $purple_coin_icon = get_field('purple_coin_icon');
                                if($event_type == 'Side Story') {
                                    $purple_coins = get_field("purple_coins");
                                    $star_pieces = get_field("star_pieces");
                                }
                                else if ($event_type == get_field('Short Story')) {
                                    $purple_coins = get_field("purple_coins");
                                    $star_pieces = get_field("star_pieces");
                                }  
                                $completion_reward = get_field("completion_reward");
                                if($completion_reward == 'Item') {
                                    $completion_item = get_field('100%_reward');
                                }
                                else if ($completion_reward == 'Hero Crystals') {
                                    $reward_amount = get_field('reward_amount');
                                }
                                $stages = get_field('stages');
                                $challenge_stages = get_field('stages_challenge');
                            }
                            if(has_term('General', 'guide_cat')) {
                                $sidebox = false;
                            }
                            the_content();
                            wp_link_pages( array(
                                'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'heavenhold' ) . '</span>',
                                'after'       => '</div>',
                                'link_before' => '<span>',
                                'link_after'  => '</span>',
                                'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'heavenhold' ) . ' </span>%',
                                'separator'   => '<span class="screen-reader-text">, </span>',
                            ));
                        endwhile;
                        ?>
                    </div>
                    <!-- Worlds/Events -->
                    <?php if($stages) : ?>
                        <h4 class="banner-heading">Stages</h4>
                        <div class="stage-list">
                            <?php 
                                foreach($stages as $stage) {
                                    $stage_world = get_field('world', $stage);
                                    $world_num = get_field('world_number', $stage_world);
                                    $stage_number = get_field('stage_number', $stage);
                                    $stg_type = get_field('stage_type', $stage);
                                    if($stg_type == "Normal" || $stg_type == "Nightmare" || $stg_type == "Hell") {
                                        echo '<a href="'.get_the_permalink($stage).'"><div class="stage"><div class="stage-image" style="background:url('.get_the_post_thumbnail_url($stage).');"></div><div class="stage-name">'.$world_num.'-'.$stage_number.' '.get_the_title($stage).'</div></div></a>';    
                                    }
                                    else {
                                        echo '<a href="'.get_the_permalink($stage).'"><div class="stage"><div class="stage-image" style="background:url('.get_the_post_thumbnail_url($stage).');">'.get_the_title($stage).'</div></a>';
                                    }
                                }
                            ?>
                        </div>
                    <?php endif; ?>

                    <?php if($collectibles) : ?>
                        <h4 class="collectibles-header">Collectibles</h4>
                        <?php echo $collectibles ?>
                    <?php endif; ?>

                    <?php if ( has_tag() ) : ?>
                        <div class="single_post_tags post-tags">
                            <?php the_tags(esc_html__( 'Tags : ', 'heavenhold' ), ' ' ); ?>
                        </div>
                    <?php endif; ?>

                    <?php
                    // Post share
                    if ( class_exists('Heavenhold_core') ) {
                        heavenholdcore_social_share();
                    }

                    // Related posts
                    get_template_part( 'template-parts/single-post/related-posts' );

                    // If comments are open or we have at least one comment, load up the comment template.
                    if ( comments_open() || get_comments_number() ) :
                        comments_template();
                    endif;
                    ?>
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
                });
            </script>
            <div class="col-lg-4">
            <?php if($sidebox) : ?>
                <div class="hero-box">
                <?php 
                if($world_map) {
                    echo '<img class="hero-portrait" src="'.$world_map.'">';
                }
                else if($picture) {
                    echo '<img class="hero-portrait" src="'.$picture.'">';
                } 
                ?>
                <table class="hero-box-table">
                    <?php if($purple_coins): ?><tr><td class="hero-box-left">Purple Coins</td><td class="hero-box-right"><?php echo $purple_coins; ?> (Normal)<?php if($purple_coins_nightmare): ?><br><?php echo $purple_coins_nightmare ?> (Nightmare)<?php endif; ?></td></tr><?php endif; ?>
                    <?php if($star_pieces): ?><tr><td class="hero-box-left">Star Pieces</td><td class="hero-box-right"><?php echo $star_pieces; ?> (Normal)<?php if($star_pieces_nightmare): ?><br><?php echo $star_pieces_nightmare ?> (Nightmare)<?php endif; ?></td></tr><?php endif; ?>
                    <?php if($completion_reward): ?><tr><td class="hero-box-left">100% Reward</td><td class="hero-box-right"><?php echo $completion_reward; ?></td></tr><?php endif; ?>
                    <?php 
                    if($rewards) {
                        echo '<tr><td class="hero-box-left">Rewards</td><td class="hero-box-right">';
                        foreach($rewards as $reward) {
                            echo '<a href="'.get_the_permalink($reward).'">'.get_the_title($reward).'</a><br>';
                        }
                        echo '</td></tr>';
                    }
                    ?>
                    <?php 
                    if($enemies) {
                        echo '<tr><td class="hero-box-left">Enemies</td><td class="hero-box-right">';
                        foreach($enemies as $enemy) {
                            echo '<a href="'.get_the_permalink($enemy).'">'.get_the_title($enemy).'</a><br>';
                        }
                        echo '</td></tr>';
                    }
                    ?>
                    <?php
                    if($bosses) {
                        if(count($bosses)==1) {
                            echo '<tr><td class="hero-box-left">Boss</td><td class="hero-box-right">';
                        }
                        else {
                            echo '<tr><td class="hero-box-left">Bosses</td><td class="hero-box-right">';
                        }
                        foreach($bosses as $boss) {
                            echo '<a href="'.get_the_permalink($boss).'">'.get_the_title($boss).'</a><br>';
                        }
                        echo '</td></tr>';
                    }
                    ?>
                </table>  
                </div>
            <?php endif; ?>
            <?php dynamic_sidebar( 'sidebar_widgets' ); ?>
        </div>
    </div>
</section>

<?php
get_footer();