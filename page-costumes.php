<?php
/**
 * Template Name: Costumes
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

<script src="/wp-content/themes/heavenhold/assets/js/IntlTableSort.js"></script>
<script src="/wp-content/themes/heavenhold/assets/js/IntlTableSort.Number.js"></script>
<script src="/wp-content/themes/heavenhold/assets/js/IntlTableSort.String.js"></script>
<section class="blog_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 data-page">
                <div class="vertical-filters hb-mobile">
                    <div class="section-box">
                        <h4>Equipment Type<span class="fa fa-plus"></h4>
                        <div class="section-content widget">
                            <ul class="wpp-list">
                                <li class="equipment-category-filter-button filter-costume" onclick="selectEquipment(this, 'Costume')"><img class="chain-icon" src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/equipment/costume.png" /><span class="filter-row">Costumes</span></li>
                                <li class="equipment-category-filter-button filter-super" onclick="selectEquipment(this, 'Super')"><img class="chain-icon" src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/equipment/super-costume.png" /><span class="filter-row">Super Costumes</span></li>
                                <li class="equipment-category-filter-button filter-equipment" onclick="selectEquipment(this, 'Equipment')"><img class="chain-icon" src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/equipment/equipment-costume.png" /><span class="filter-row">Equipment Costumes</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="section-box costume-filter-section">
                    <h4>Filter Source<span class="fa fa-plus"></h4>
                    <ul class="wpp-list filter-element filter-costumes">
                        <li onclick="filter(this, 'CostumeShop', 'e')"><?php echo '<img class="currency-icon" src="'.get_template_directory_uri().'/assets/img/icons/gems.png">'; ?><span class="filter-row">Gems</span></td>
                        <li onclick="filter(this, 'BattleMedalShop', 'e')"><?php echo '<img class="currency-icon" src="'.get_template_directory_uri().'/assets/img/icons/medals.png">'; ?><span class="filter-row">Battle Medals</span></td>
                        <li onclick="filter(this, 'BottleCapShop', 'e')"><?php echo '<img class="currency-icon" src="'.get_template_directory_uri().'/assets/img/icons/equipment/bottlecaps.png">'; ?><span class="filter-row">Bottlecaps</span></td>
                        <li onclick="filter(this, 'Achievement', 'e')"><?php echo '<span class="currency-icon"><i class="fa fa-trophy" style="color: yellow !important; font-size: 18px;"></i></span>'; ?><span class="filter-row">Achievement Reward</span></td>
                        <li onclick="filter(this, 'WorldCompletion', 'e')"><?php echo '<img class="currency-icon" src="'.get_template_directory_uri().'/assets/img/icons/equipment/achievement.png">'; ?><span class="filter-row">World Completion</span></td>
                        <li onclick="filter(this, 'Stage', 'e')"><?php echo '<span class="currency-icon"><i class="fa fa-bookmark" style="color: green !important; font-size: 18px;"></i></span>'; ?><span class="filter-row">Stage Completion</span></td>
                    </ul>
                </div>
                <div id="Costume" class="equipment-category">
                    <h4>Costumes</h4>
                        <?php 
                        $args = array(
                            'post_type'     => 'items',
                            'numberposts'   => -1,
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'item_categories',
                                    'field'    => 'slug',
                                    'terms'    => 'costumes'
                                )
                            ),
                            'meta_query' => array(
                                'relation' => 'OR',
                                array(
                                    'key' => 'super',
                                    'compare' => '!=',
                                    'value' => 1
                                ),

                                array(
                                    'key' => 'super',
                                    'value' => '1',
                                    'compare' => 'NOT EXISTS'
                                ) 
                            ),
                            'order' => 'ASC',
                            'orderby' => 'title',
                        );
                        $query = new WP_Query( $args );
                        echo '<div class="costume-cards">';
                        // Loop
                        if( $query->have_posts() ) :
                            while( $query->have_posts() ) : $query->the_post();
                                $gems_cost = get_field('cost', $post);
                                $battle_medal_cost = get_field('battle_medal_shop_cost', $post);
                                $how_to_obtain = get_field('how_to_obtain', $post);
                                $stage_location = get_field('stage_location', $post);
                                $bottle_cap_cost = get_field('bottle_cap_cost', $post);
                                $mystic_thread_cost = get_field('mystic_thread_cost', $post);
                                $achievement = false;
                                $world_completed = false;
                                $classes = "";
                                $obtainList = [];

                                if($how_to_obtain)
                                {
                                    foreach($how_to_obtain as $source) {
                                        if ($source == 'World Completion') {
                                            $world_completed = true;
                                        }
                                        else if ($source == 'Achievement') {
                                            $achievement = true;
                                        }
                                        array_push($obtainList, str_replace(' ', '', $source));
                                    }    
                                }

                                if($stage_location)
                                {
                                    array_push($obtainList, "Stage");
                                }
                                else if($achievement)
                                {
                                    array_push($obtainList, "Achievement");
                                }

                                $classes = implode(" ", $obtainList);

                                echo '<a class="costume-card '.$classes.'" href="'.get_the_permalink().'"><div style="background-image:url('.get_the_post_thumbnail_url().');background-size:cover;width:100%;padding-bottom:100%;">';
                                echo '<div class="costume-name">'.get_the_title().'</div>';
                                
                                if($gems_cost || $battle_medal_cost || $world_completed || $stage_location || $bottle_cap_cost || $mystic_thread_cost || $achievement) {
                                    echo '<span class="costume-price">';
                                    if($battle_medal_cost) 
                                    {
                                        echo '<img class="currency-icon medal-icon" src="'.get_template_directory_uri().'/assets/img/icons/medals.png">'.$battle_medal_cost.'</span>';
                                    }
                                    else if($gems_cost) {
                                        echo '<img class="currency-icon gem-icon" src="'.get_template_directory_uri().'/assets/img/icons/gems.png">'.$gems_cost.'</span>';
                                    }
                                    else if($stage_location) {
                                        echo '<i class="fa fa-bookmark" style="color: green !important; font-size: 18px;"></i>';
                                    }
                                    else if($mystic_thread_cost)
                                    {
                                        echo '<img class="currency-icon" style="width: 30px !important;" src="'.get_template_directory_uri().'/assets/img/icons/equipment/merch-forge.png"></span>';
                                    }
                                    else if($achievement)
                                    {
                                        echo '<i class="fa fa-trophy" style="color: yellow !important; font-size: 18px;"></i>';
                                    }
                                    else if($bottle_cap_cost)
                                    {
                                        echo '<img class="currency-icon bottlecap-icon" src="'.get_template_directory_uri().'/assets/img/icons/equipment/bottlecaps.png">'.$bottle_cap_cost.'</span>';
                                    }
                                    else if($world_completed)
                                    {
                                        echo '<img class="currency-icon" style="width: 30px !important;" src="'.get_template_directory_uri().'/assets/img/icons/equipment/achievement.png"></span>';
                                    }
                                }
                                echo '</div></a>';
                                $counter = $counter + 1;
                            endwhile; 
                        endif;
                        echo '</div>';
                        ?>
                </div>
                <div id="Super" class="equipment-category">
                    <h4>Super Costumes</h4>
                        <?php 
                        $args = array(
                            'post_type'     => 'items',
                            'numberposts'   => -1,
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'item_categories',
                                    'field'    => 'slug',
                                    'terms'    => 'costumes'
                                )
                            ),
                            'meta_query' => array(
                                array(
                                'key' => 'super',
                                'value' => true,
                                'type' => 'BOOLEAN',
                                ),
                            ),
                            'order' => 'ASC',
                            'orderby' => 'title',
                        );
                        $query = new WP_Query( $args );
                        echo '<div class="costume-cards">';
                        // Loop
                        if( $query->have_posts() ) :
                            while( $query->have_posts() ) : $query->the_post();
                                $gems_cost = get_field('cost', $post);
                                $battle_medal_cost = get_field('battle_medal_shop_cost', $post);
                                $how_to_obtain = get_field('how_to_obtain', $post);
                                $stage_location = get_field('stage_location', $post);
                                $bottle_cap_cost = get_field('bottle_cap_cost', $post);
                                $mystic_thread_cost = get_field('mystic_thread_cost', $post);
                                $achievement = false;
                                $world_completed = false;
                                $classes = "";
                                $obtainList = [];

                                if($how_to_obtain)
                                {
                                    foreach($how_to_obtain as $source) {
                                        if ($source == 'World Completion') {
                                            $world_completed = true;
                                        }
                                        else if ($source == 'Achievement') {
                                            $achievement = true;
                                        }
                                        array_push($obtainList, str_replace(' ', '', $source));
                                    }    
                                }

                                if($stage_location)
                                {
                                    array_push($obtainList, "Stage");
                                }
                                else if($achievement)
                                {
                                    array_push($obtainList, "Achievement");
                                }

                                $classes = implode(" ", $obtainList);

                                echo '<a class="costume-card '.$classes.'" href="'.get_the_permalink().'"><div style="background-image:url('.get_the_post_thumbnail_url().');background-size:cover;width:100%;padding-bottom:100%;">';
                                echo '<div class="costume-name">'.get_the_title().'</div>';
                                
                                if($gems_cost || $battle_medal_cost || $world_completed || $stage_location || $bottle_cap_cost || $mystic_thread_cost || $achievement) {
                                    echo '<span class="costume-price">';
                                    if($battle_medal_cost) 
                                    {
                                        echo '<img class="currency-icon medal-icon" src="'.get_template_directory_uri().'/assets/img/icons/medals.png">'.$battle_medal_cost.'</span>';
                                    }
                                    else if($gems_cost) {
                                        echo '<img class="currency-icon gem-icon" src="'.get_template_directory_uri().'/assets/img/icons/gems.png">'.$gems_cost.'</span>';
                                    }
                                    else if($stage_location) {
                                        echo '<i class="fa fa-bookmark" style="color: green !important; font-size: 18px;"></i>';
                                    }
                                    else if($mystic_thread_cost)
                                    {
                                        echo '<img class="currency-icon" style="width: 30px !important;" src="'.get_template_directory_uri().'/assets/img/icons/equipment/merch-forge.png"></span>';
                                    }
                                    else if($achievement)
                                    {
                                        echo '<i class="fa fa-trophy" style="color: yellow !important; font-size: 18px;"></i>';
                                    }
                                    else if($bottle_cap_cost)
                                    {
                                        echo '<img class="currency-icon bottlecap-icon" src="'.get_template_directory_uri().'/assets/img/icons/equipment/bottlecaps.png">'.$bottle_cap_cost.'</span>';
                                    }
                                    else if($world_completed)
                                    {
                                        echo '<img class="currency-icon" style="width: 30px !important;" src="'.get_template_directory_uri().'/assets/img/icons/equipment/achievement.png"></span>';
                                    }
                                }
                                echo '</div></a>';
                                $counter = $counter + 1;
                            endwhile; 
                        endif;
                        echo '</div>';
                        ?>
                </div>
                <div id="Equipment" class="equipment-category">
                    <h4>Equipment Costumes</h4>
                        <?php 
                        $args = array(
                            'post_type'     => 'items',
                            'numberposts'   => -1,
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'item_categories',
                                    'field'    => 'slug',
                                    'terms'    => 'equipment-costume'
                                )
                            ),
                            'order' => 'ASC',
                            'orderby' => 'title',
                        );
                        $query = new WP_Query( $args );
                        echo '<div class="costume-cards">';
                        // Loop
                        if( $query->have_posts() ) :
                            while( $query->have_posts() ) : $query->the_post();
                                $gems_cost = get_field('cost', $post);
                                $battle_medal_cost = get_field('battle_medal_shop_cost', $post);
                                $how_to_obtain = get_field('how_to_obtain', $post);
                                $stage_location = get_field('stage_location', $post);
                                $bottle_cap_cost = get_field('bottle_cap_cost', $post);
                                $mystic_thread_cost = get_field('mystic_thread_cost', $post);
                                $achievement = false;
                                $world_completed = false;
                                $classes = "";
                                $obtainList = [];

                                if($how_to_obtain)
                                {
                                    foreach($how_to_obtain as $source) {
                                        if ($source == 'World Completion') {
                                            $world_completed = true;
                                        }
                                        else if ($source == 'Achievement') {
                                            $achievement = true;
                                        }
                                        array_push($obtainList, str_replace(' ', '', $source));
                                    }    
                                }

                                if($stage_location)
                                {
                                    array_push($obtainList, "Stage");
                                }
                                else if($achievement)
                                {
                                    array_push($obtainList, "Achievement");
                                }

                                $classes = implode(" ", $obtainList);

                                echo '<a class="costume-card '.$classes.'" href="'.get_the_permalink().'"><div style="background-image:url('.get_the_post_thumbnail_url().');background-size:cover;width:100%;padding-bottom:100%;">';
                                echo '<div class="costume-name">'.get_the_title().'</div>';
                                
                                if($gems_cost || $battle_medal_cost || $world_completed || $stage_location || $bottle_cap_cost || $mystic_thread_cost || $achievement) {
                                    echo '<span class="costume-price">';
                                    if($battle_medal_cost) 
                                    {
                                        echo '<img class="currency-icon medal-icon" src="'.get_template_directory_uri().'/assets/img/icons/medals.png">'.$battle_medal_cost.'</span>';
                                    }
                                    else if($gems_cost) {
                                        echo '<img class="currency-icon gem-icon" src="'.get_template_directory_uri().'/assets/img/icons/gems.png">'.$gems_cost.'</span>';
                                    }
                                    else if($stage_location) {
                                        echo '<i class="fa fa-bookmark" style="color: green !important; font-size: 18px;"></i>';
                                    }
                                    else if($mystic_thread_cost)
                                    {
                                        echo '<img class="currency-icon" style="width: 30px !important;" src="'.get_template_directory_uri().'/assets/img/icons/equipment/merch-forge.png"></span>';
                                    }
                                    else if($achievement)
                                    {
                                        echo '<i class="fa fa-trophy" style="color: yellow !important; font-size: 18px;"></i>';
                                    }
                                    else if($bottle_cap_cost)
                                    {
                                        echo '<img class="currency-icon bottlecap-icon" src="'.get_template_directory_uri().'/assets/img/icons/equipment/bottlecaps.png">'.$bottle_cap_cost.'</span>';
                                    }
                                    else if($world_completed)
                                    {
                                        echo '<img class="currency-icon" style="width: 30px !important;" src="'.get_template_directory_uri().'/assets/img/icons/equipment/achievement.png"></span>';
                                    }
                                }
                                echo '</div></a>';
                                $counter = $counter + 1;
                            endwhile; 
                        endif;
                        echo '</div>';
                        ?>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="vertical-filters hb-desktop widget">
                    <div class="section-box">
                        <h4>Costume Type<span class="fa fa-plus"></h4>
                        <div class="section-content">
                            <ul class="wpp-list">
                                <li class="equipment-category-filter-button filter-costume" onclick="selectEquipment(this, 'Costume')"><img class="chain-icon" src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/equipment/costume.png" /><span class="filter-row">Costumes</span></li>
                                <li class="equipment-category-filter-button filter-super" onclick="selectEquipment(this, 'Super')"><img class="chain-icon" src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/equipment/super-costume.png" /><span class="filter-row">Super Costumes</span></li>
                                <li class="equipment-category-filter-button filter-equipment" onclick="selectEquipment(this, 'Equipment')"><img class="chain-icon" src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/equipment/equipment-costume.png" /><span class="filter-row">Equipment Costumes</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <?php dynamic_sidebar( 'forum_archive_sidebar' ); ?>
                <?php dynamic_sidebar( 'sidebar_widgets' ); ?>
            </div>
            <script>
                var heroTable, selectedElements=[], selectedStats=[], selectedEquipment=[], selectedChain=[], orderNumber=1, orderString;

                jQuery(function($){
                    $(document).ready(function(){
                        selectEquipment('', 'Costume');
                        var zindex = 10;

                        var headers = ["H4","H5","H6"];

                        $("h4").click(function(e) {
                            var target = e.target, name = target.nodeName.toUpperCase();
                        
                            if($.inArray(name,headers) > -1) {
                                var subItem = $(target).next();
                                
                                var depth = $(subItem).parents().length;

                                subItem.slideToggle("fast",function() {
                                    $(target).find('.fa.fa-plus').toggleClass('closed');
                                });
                            }
                        });
                    });
                });

                function selectEquipment(element, type) {
                    jQuery('.equipment-category-filter-button').removeClass("clicked");
                    jQuery('.item-card').removeClass('hidden');
                    if(type=='Costume')
                    {
                        selectedChain = [];
                        selectedElements = [];
                        selectedStats = [];
                        jQuery('.filter-chain td').removeClass('clicked');
                        jQuery('.filter-element td').removeClass('clicked');
                        jQuery('.equipmentFilter').hide();
                        jQuery('.costume-filter-section').show();
                        jQuery('.filter-chain').hide();
                    }
                    else if (type=='Super') 
                    {
                        selectedChain = [];
                        selectedElements = [];
                        selectedStats = [];
                        jQuery('.filter-chain td').removeClass('clicked');
                        jQuery('.filter-element td').removeClass('clicked');
                        jQuery('.equipmentFilter').hide();
                        jQuery('.costume-filter-section').hide();
                        jQuery('.filter-chain').hide();
                    }
                    else if (type=='Equipment') 
                    {
                        selectedChain = [];
                        selectedElements = [];
                        selectedStats = [];
                        jQuery('.filter-chain td').removeClass('clicked');
                        jQuery('.filter-element td').removeClass('clicked');
                        jQuery('.equipmentFilter').hide();
                        jQuery('.costume-filter-section').show();
                        jQuery('.filter-chain').hide();
                    }
                    jQuery('.equipment-category').hide();
                    jQuery('#'+type).show();
                    jQuery('.equipment-filter-button').removeClass("clicked");
                    if(type=='Costume') {
                        jQuery('.filter-costume').addClass("clicked");
                    }
                    if(element != '') {
                        element.classList.add("clicked");   
                    }
                }   

                function filter(element, keyword, type) {
                    if(element.classList.contains("clicked")) {
                        element.classList.remove("clicked");
                        if(type=='c') {
                            selectedChain.splice(selectedChain.indexOf('itemchain'+keyword), 1);
                        }
                        else if (type=='e') {
                            selectedElements.splice(selectedElements.indexOf(keyword), 1);
                        }
                        else {
                            selectedStats.splice(selectedStats.indexOf('stat-'+keyword), 1);
                        }
                        
                        if((selectedElements.length + selectedStats.length + selectedChain.length) > 0) 
                        {
                            var itemList = jQuery('.costume-card');
                            var elementList = '';
                            var statList = '';
                            var chainList = '';
                            if(selectedElements.length > 0) {
                                elementList = '.' + selectedElements.join(', .');
                                itemList = itemList.filter(elementList);
                            }
                            if(selectedStats.length > 0) {
                                statList = '.' + selectedStats.join(', .');
                                itemList = itemList.filter(statList);
                            }
                            if(selectedChain.length > 0) {
                                chainList = '.' + selectedChain.join(', .');
                                itemList = itemList.filter(chainList);
                            }

                            jQuery('.costume-card').addClass('hidden');
                            itemList.removeClass("hidden"); 
                        }
                        else {
                            jQuery('.costume-card').removeClass("hidden");
                        }
                    }
                    else {
                        element.classList.add("clicked");
                        if (type=='c') {
                            selectedChain.push('itemchain'+keyword);
                        }
                        else if (type=='e') {
                            selectedElements.push(keyword);
                        }
                        else {
                            selectedStats.push('stat-'+keyword);
                        }

                        var itemList = jQuery('.costume-card');
                        var elementList = '';
                        var chainList = '';
                        var statList = '';
                        if(selectedElements.length > 0) {
                            elementList = '.' + selectedElements.join(', .');
                            itemList = itemList.filter(elementList);
                        }
                        if(selectedChain.length > 0) {
                            chainList = '.' + selectedChain.join(', .');
                            itemList = itemList.filter(chainList);
                        }
                        if(selectedStats.length > 0) {
                            statList = '.' + selectedStats.join(', .');
                            itemList = itemList.filter(statList);
                        }

                        console.log(statList);

                        jQuery('.costume-card').addClass('hidden');
                        itemList.removeClass("hidden"); 
                    }
                } 

                
            </script>
        </div>
    </div>
</section>

<?php
get_footer();
?>