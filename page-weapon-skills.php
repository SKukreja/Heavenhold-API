<?php
/**
 * Template Name: Weapon Skills
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
<section class="blog_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <?php 
                $args = array(
                    'post_type'     => 'items',
                    'numberposts'   => -1,
                    'tax_query'    => array( 
                        array(
                            'taxonomy'       => 'item_categories',
                            'field'     => 'slug',
                            'terms'     => 'weapons'
                        )
                    ),
                    'meta_key' => 'weapon_skill_name',
                    'orderby' => 'meta_value',
                );
                $query = new WP_Query( $args );

                $posts = $query->posts;
                $sorted = array();

                // loop through posts
                foreach( $posts as $p )
                {
                    // load custom category:
                    $cat = get_field('weapon_skill_name');
                    
                    
                    // add to $sorted
                    if( !isset($sorted[ $cat ]) )
                    {
                        $sorted[ $cat ] = array();
                    }
                    
                    $sorted[ $cat ][] = $p;
                }

                
                // now loop through sorted
                foreach( $sorted as $cat_name => $cat_posts )
                {   
                    echo '<table class="hero-abilities-table"><thead><tr><th class="ability-header">Weapon Skill</th><th class="ability-header">Atk</th><th class="ability-header">Regen Time</th><th class="ability-header">Weapons</th></tr></thead><tbody>';
                    
                    $reversed = array_reverse($cat_posts);

                    foreach( $reversed as $p )
                    {
                        $current = get_field('weapon_skill_name', $p->ID);
                        if ($last != $current && $last) {
                            echo '</td></tr><tr><td colspan="3">'.$previous_description. '</td>';
                            echo '<tr><td rowspan="2">';
                            getChainIcon(get_field('weapon_skill_chain', $p->ID));
                            echo '<span class="wskill-name">'. $current . '</span></td>';
                            echo '<td><span class="green">' . get_field('weapon_skill_atk', $p->ID) . '%</span> DPS</td>';
                            echo '<td>' . get_field('weapon_skill_regen_time', $p->ID) . 's</td>';
                            echo '<td><a href="'.get_the_permalink($p->ID).'"><span class="weapon-skill-weapon-info"><img class="weapon-icon" src="'.get_the_post_thumbnail_url($p->ID, 'thumbnail').'">' . get_the_title( $p->ID ).'</span></a>';

                        }
                        else if(!$last) {
                            echo '<tr><td rowspan="2">';
                            getChainIcon(get_field('weapon_skill_chain', $p->ID));
                            echo '<span class="wskill-name">'. $current . '</span></td>';
                            echo '<td><span class="green">' . get_field('weapon_skill_atk', $p->ID) . '%</span> DPS</td>';
                            echo '<td>' . get_field('weapon_skill_regen_time', $p->ID) . 's</td>';
                            echo '<td><a href="'.get_the_permalink($p->ID).'"><span class="weapon-skill-weapon-info"><img class="weapon-icon" src="'.get_the_post_thumbnail_url($p->ID, 'thumbnail').'">' . get_the_title( $p->ID ) . '</span></a>';
                        }
                        else {
                            echo '<br><a href="'.get_the_permalink($p->ID).'"><span class="weapon-skill-weapon-info"><img class="weapon-icon" src="'.get_the_post_thumbnail_url($p->ID, 'thumbnail').'">'.get_the_title( $p->ID ) . '</span></a>';
                        }
                        $previous_description = get_field('weapon_skill_description', $p->ID);
                        $last = $current;

                    }
                    echo '</td></tr><tr><td colspan="3">'.$previous_description. '</td>';
                    echo '</tbody></table>';
                }

            ?>
            </div>
        </div>
    </div>
</section>

<script>
    window.onload = function() {
        jQuery(function($){
            
        });
    }
</script>

<?php
get_footer();
?>