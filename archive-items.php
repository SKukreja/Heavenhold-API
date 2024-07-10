<?php
/**
 *
 * Contains the closing of the #content div and all content after.
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
                                <li class="filter-1HSword equipment-category-filter-button" onclick="selectEquipment(this, '1HSword')"><img class="chain-icon" src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/equipment/1h-sword.png" /><span class="filter-row">One-Handed Sword</span></li>
                                <li class="filter-2HSword equipment-category-filter-button" onclick="selectEquipment(this, '2HSword')"><img class="chain-icon" src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/equipment/2h-sword.png" /><span class="filter-row">Two-Handed Sword</span></li>
                                <li class="filter-Rifle equipment-category-filter-button" onclick="selectEquipment(this, 'Rifle')"><img class="chain-icon" src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/equipment/rifle.png" /><span class="filter-row">Rifle</span></li>
                                <li class="filter-Bow equipment-category-filter-button" onclick="selectEquipment(this, 'Bow')"><img class="chain-icon" src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/equipment/bow.png" /><span class="filter-row">Bow</span></li>
                                <li class="filter-Basket equipment-category-filter-button" onclick="selectEquipment(this, 'Basket')"><img class="chain-icon" src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/equipment/basket.png" /><span class="filter-row">Basket</span></li>
                                <li class="filter-Staff equipment-category-filter-button" onclick="selectEquipment(this, 'Staff')"><img class="chain-icon" src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/equipment/staff.png" /><span class="filter-row">Staff</span></li>
                                <li class="filter-Gauntlet equipment-category-filter-button" onclick="selectEquipment(this, 'Gauntlet')"><img class="chain-icon" src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/equipment/gauntlet.png" /><span class="filter-row">Gauntlet</span></li>
                                <li class="filter-Claw equipment-category-filter-button" onclick="selectEquipment(this, 'Claw')"><img class="chain-icon" src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/equipment/claw.png" /><span class="filter-row">Claw</span></li>
                                <li class="filter-Shield equipment-category-filter-button" onclick="selectEquipment(this, 'Shield')"><img class="chain-icon" src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/equipment/shield.png" /><span class="filter-row">Shield</span></li>
                                <li class="filter-Accessory equipment-category-filter-button" onclick="selectEquipment(this, 'Accessory')"><img class="chain-icon" src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/equipment/accessory.png" /><span class="filter-row">Accessory</span></li>
                                <li class="filter-Card equipment-category-filter-button" onclick="selectEquipment(this, 'Card')"><img class="chain-icon" src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/equipment/card.png" /><span class="filter-row">Card</span></li>
                                <li class="filter-Merch equipment-category-filter-button" onclick="selectEquipment(this, 'Merch')"><img class="chain-icon" src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/equipment/merch.png" /><span class="filter-row">Merch</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <?php
                /*
                <table class="filter-table">
                    <tr><th colspan="4">Equipment Type</th></tr>
                    <tr class='equipmentList'>
                        <td id="weapon-category" class="equipment-category-filter-button" onclick="selectEquipment(this, '1HSword')">Weapons</td>
                        <td id="shield-category" class="equipment-category-filter-button" onclick="selectEquipment(this, 'Shield')">Shields</td>
                        <td id="accessory-category" class="equipment-category-filter-button" onclick="selectEquipment(this, 'Accessory')">Accessories</td>
                        <td id="card-category" class="equipment-category-filter-button" onclick="selectEquipment(this, 'Card')">Cards</td>
                    </tr>
                </table>
                <table class="filter-table equipmentFilter">
                    <tr><th colspan="4">Weapon Type</th></tr>
                    <tr>
                        <td id="filter-1HSword" class="equipment-filter-button" onclick="selectEquipment(this, '1HSword')"><?php getEquipment("One-Handed Sword") ?></td>
                        <td id="filter-2HSword" class="equipment-filter-button" onclick="selectEquipment(this, '2HSword')"><?php getEquipment("Two-Handed Sword") ?></td>
                        <td id="filter-Gauntlet" class="equipment-filter-button" onclick="selectEquipment(this, 'Gauntlet')"><?php getEquipment("Gauntlet") ?></td>
                        <td id="filter-Claw" class="equipment-filter-button" onclick="selectEquipment(this, 'Claw')"><?php getEquipment("Claw") ?></td>
                    </tr>   
                    <tr>    
                        <td id="filter-Bow" class="equipment-filter-button" onclick="selectEquipment(this, 'Bow')"><?php getEquipment("Bow") ?></td>
                        <td id="filter-Rifle" class="equipment-filter-button" onclick="selectEquipment(this, 'Rifle')"><?php getEquipment("Rifle") ?></td>
                        <td id="filter-Staff" class="equipment-filter-button" onclick="selectEquipment(this, 'Staff')"><?php getEquipment("Staff") ?></td>
                        <td id="filter-Basket" class="equipment-filter-button" onclick="selectEquipment(this, 'Basket')"><?php getEquipment("Basket") ?></td>
                    </tr>
                </table>
                */
                ?>
                <table class="filter-table filter-chain">
                    <tr><th colspan="3">Filter Weapon Chain</th></tr>
                    <tr>
                        <td onclick="filter(this, 'Injured', 'c')"><?php getChainIcon("Injured") ?></td>
                        <td onclick="filter(this, 'Downed', 'c')"><?php getChainIcon("Downed") ?></td>
                        <td onclick="filter(this, 'Airborne', 'c')"><?php getChainIcon("Airborne") ?></td>
                    </tr>
                </table>
                <table class="filter-table filter-element">
                    <tr><th colspan="6">Filter Weapon Element</th></tr>
                    <tr>
                        <td onclick="filter(this, 'Basic', 'e')"><?php getElement("Basic") ?></td>
                        <td onclick="filter(this, 'Light', 'e')"><?php getElement("Light") ?></td>
                        <td onclick="filter(this, 'Dark', 'e')"><?php getElement("Dark") ?></td>
                        <td onclick="filter(this, 'Fire', 'e')"><?php getElement("Fire") ?></td>
                        <td onclick="filter(this, 'Water', 'e')"><?php getElement("Water") ?></td>
                        <td onclick="filter(this, 'Earth', 'e')"><?php getElement("Earth") ?></td>
                    </tr>
                </table>
                <table class="filter-table filter-stats">
                    <tr><th colspan="7">Filter Stats</th></tr>
                    <tr>
                        <td onclick="filter(this, '0', 's')">Atk (%)</td>
                        <td onclick="filter(this, '1', 's')">Crit Hit Chance</td>
                        <td onclick="filter(this, '2', 's')">Damage Reduction</td>
                        </tr>
                    <tr>
                        <td onclick="filter(this, '3', 's')">Def (Flat)</td>
                        <td onclick="filter(this, '4', 's')">Def (%)</td>
                        <td onclick="filter(this, '5', 's')">Heal (Flat)</td>
                        </tr>
                    <tr>
                        <td onclick="filter(this, '6', 's')">Heal (%)</td>

                        <td onclick="filter(this, '7', 's')">HP (%)</td>
                        <td onclick="filter(this, '8', 's')">Atk increase on enemy kill</td>
                        </tr>
                    <tr>
                        <td onclick="filter(this, '9', 's')">HP recovery on enemy kill</td>
                        <td onclick="filter(this, '10', 's')">Seconds of weapon skill Regen time on enemy kill</td>
                        <td onclick="filter(this, '11', 's')">Shield increase on battle start</td>
                        </tr>
                    <tr>
                        <td onclick="filter(this, '12', 's')">Shield increase on enemy kill</td>
                        <td onclick="filter(this, '13', 's')">Skill Damage</td>
                        <td onclick="filter(this, '14', 's')">Weapon Skill Regen Speed</td>
                        </tr>
                    <tr>
                        <td onclick="filter(this, '15', 's')">Fire type Atk</td>
                        <td onclick="filter(this, '16', 's')">Earth type Atk</td>
                        <td onclick="filter(this, '17', 's')">Water type Atk</td>
                        </tr>
                    <tr>
                        <td onclick="filter(this, '18', 's')">Dark type Atk</td>
                        <td onclick="filter(this, '19', 's')">Light type Atk</td>
                        <td onclick="filter(this, '20', 's')">Basic type Atk</td>
                    </tr>
                </table>
                <div id="1HSword" class="equipment-category">
                    <h4>One-Handed Sword</h4>
                        <?php 
                        $args = array(
                            'post_type'     => 'items',
                            'numberposts'   => -1,
                            'meta_query'    => array( 
                                array(
                                    'key'       => 'weapon_type',
                                    'value'     => 'One-Handed Sword'
                                )
                            ),
                            'meta_key' => 'dps',
                            'orderby' => 'meta_value_num',
                        );
                        $query = new WP_Query( $args );
                        echo '<div class="item-cards">';
                        // Loop
                        if( $query->have_posts() ) :
                            while( $query->have_posts() ) : $query->the_post();
                                get_template_part('template-parts/items/weapon-single');
                                $counter = $counter + 1;
                            endwhile; 
                        endif;
                        echo '</div>';
                        ?>
                </div>
                <div id="2HSword" class="equipment-category">
                    <h4>Two-Handed Sword</h4>
                        <?php 
                        $args = array(
                            'post_type'     => 'items',
                            'numberposts'   => -1,
                            'meta_query'    => array( 
                                array(
                                    'key'       => 'weapon_type',
                                    'value'     => 'Two-Handed Sword'
                                )
                            ),
                            'meta_key' => 'dps',
                            'orderby' => 'meta_value_num',
                        );
                        $query = new WP_Query( $args );
                        echo '<div class="item-cards">';
                        // Loop
                        if( $query->have_posts() ) :
                            while( $query->have_posts() ) : $query->the_post();
                                get_template_part('template-parts/items/weapon-single');
                                $counter = $counter + 1;
                            endwhile; 
                        endif;
                        echo '</div>';
                        ?>
                </div>
                <div id="Gauntlet" class="equipment-category">
                    <h4>Gauntlet</h4>
                        <?php 
                        $args = array(
                            'post_type'     => 'items',
                            'numberposts'   => -1,
                            'meta_query'    => array( 
                                array(
                                    'key'       => 'weapon_type',
                                    'value'     => 'Gauntlet'
                                )
                            ),
                            'meta_key' => 'dps',
                            'orderby' => 'meta_value_num',
                        );
                        $query = new WP_Query( $args );
                        echo '<div class="item-cards">';
                        // Loop
                        if( $query->have_posts() ) :
                            while( $query->have_posts() ) : $query->the_post();
                                get_template_part('template-parts/items/weapon-single');
                                $counter = $counter + 1;
                            endwhile; 
                        endif;
                        echo '</div>';
                        ?>
                </div>
                <div id="Claw" class="equipment-category">
                    <h4>Claw</h4>
                        <?php 
                        $args = array(
                            'post_type'     => 'items',
                            'numberposts'   => -1,
                            'meta_query'    => array( 
                                array(
                                    'key'       => 'weapon_type',
                                    'value'     => 'Claw'
                                )
                            ),
                            'meta_key' => 'dps',
                            'orderby' => 'meta_value_num',
                        );
                        $query = new WP_Query( $args );
                        echo '<div class="item-cards">';
                        // Loop
                        if( $query->have_posts() ) :
                            while( $query->have_posts() ) : $query->the_post();
                                get_template_part('template-parts/items/weapon-single');
                                $counter = $counter + 1;
                            endwhile; 
                        endif;
                        echo '</div>';
                        ?>
                </div>
                <div id="Bow" class="equipment-category">
                    <h4>Bow</h4>
                        <?php 
                        $args = array(
                            'post_type'     => 'items',
                            'numberposts'   => -1,
                            'meta_query'    => array( 
                                array(
                                    'key'       => 'weapon_type',
                                    'value'     => 'Bow'
                                )
                            ),
                            'meta_key' => 'dps',
                            'orderby' => 'meta_value_num',
                        );
                        $query = new WP_Query( $args );
                        echo '<div class="item-cards">';
                        // Loop
                        if( $query->have_posts() ) :
                            while( $query->have_posts() ) : $query->the_post();
                                get_template_part('template-parts/items/weapon-single');
                                $counter = $counter + 1;
                            endwhile; 
                        endif;
                        echo '</div>';
                        ?>
                </div>
                <div id="Rifle" class="equipment-category">
                    <h4>Rifle</h4>
                        <?php 
                        $args = array(
                            'post_type'     => 'items',
                            'numberposts'   => -1,
                            'meta_query'    => array( 
                                array(
                                    'key'       => 'weapon_type',
                                    'value'     => 'Rifle'
                                )
                            ),
                            'meta_key' => 'dps',
                            'orderby' => 'meta_value_num',
                        );
                        $query = new WP_Query( $args );
                        echo '<div class="item-cards">';
                        // Loop
                        if( $query->have_posts() ) :
                            while( $query->have_posts() ) : $query->the_post();
                                get_template_part('template-parts/items/weapon-single');
                                $counter = $counter + 1;
                            endwhile; 
                        endif;
                        echo '</div>';
                        ?>
                </div>
                <div id="Staff" class="equipment-category">
                    <h4>Staff</h4>
                        <?php 
                        $args = array(
                            'post_type'     => 'items',
                            'numberposts'   => -1,
                            'meta_query'    => array( 
                                array(
                                    'key'       => 'weapon_type',
                                    'value'     => 'Staff'
                                )
                            ),
                            'meta_key' => 'dps',
                            'orderby' => 'meta_value_num',
                        );
                        $query = new WP_Query( $args );
                        echo '<div class="item-cards">';
                        // Loop
                        if( $query->have_posts() ) :
                            while( $query->have_posts() ) : $query->the_post();
                                get_template_part('template-parts/items/weapon-single');
                                $counter = $counter + 1;
                            endwhile; 
                        endif;
                        echo '</div>';
                        ?>
                </div>
                <div id="Basket" class="equipment-category">
                    <h4>Basket</h4>
                        <?php 
                        $args = array(
                            'post_type'     => 'items',
                            'numberposts'   => -1,
                            'meta_query'    => array( 
                                array(
                                    'key'       => 'weapon_type',
                                    'value'     => 'Basket'
                                )
                            ),
                            'meta_key' => 'dps',
                            'orderby' => 'meta_value_num',
                        );
                        $query = new WP_Query( $args );
                        echo '<div class="item-cards">';
                        // Loop
                        if( $query->have_posts() ) :
                            while( $query->have_posts() ) : $query->the_post();
                                get_template_part('template-parts/items/weapon-single');
                                $counter = $counter + 1;
                            endwhile; 
                        endif;
                        echo '</div>';
                        ?>
                </div>
                <div id="Shield" class="equipment-category">
                    <h4>Shield</h4>
                        <?php 
                        $args = array(
                            'post_type'     => 'items',
                            'numberposts'   => -1,
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'item_categories',
                                    'field'    => 'slug',
                                    'terms'    => 'shields'
                                )
                            ),
                            'meta_key' => 'toughness',
                            'orderby' => 'meta_value_num',
                        );
                        $query = new WP_Query( $args );
                        echo '<div class="item-cards">';
                        // Loop
                        if( $query->have_posts() ) :
                            while( $query->have_posts() ) : $query->the_post();
                                get_template_part('template-parts/items/shield-single');
                                $counter = $counter + 1;
                            endwhile; 
                        endif;
                        echo '</div>';
                        ?>
                </div>
                <div id="Accessory" class="equipment-category">
                    <h4>Accessory</h4>
                        <?php 
                        $args = array(
                            'post_type'     => 'items',
                            'numberposts'   => -1,
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'item_categories',
                                    'field'    => 'slug',
                                    'terms'    => 'accessories'
                                )
                            ),
                            'meta_key' => 'toughness',
                            'orderby' => 'meta_value_num',
                        );
                        $query = new WP_Query( $args );
                        echo '<div class="item-cards">';
                        // Loop
                        if( $query->have_posts() ) :
                            while( $query->have_posts() ) : $query->the_post();
                                get_template_part('template-parts/items/accessory-single');
                                $counter = $counter + 1;
                            endwhile; 
                        endif;
                        echo '</div>';
                        ?>
                </div>
                <div id="Card" class="equipment-category">
                    <h4>Card</h4>
                        <?php 
                        $args = array(
                            'post_type'     => 'items',
                            'numberposts'   => -1,
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'item_categories',
                                    'field'    => 'slug',
                                    'terms'    => 'cards'
                                )
                            )
                        );
                        $query = new WP_Query( $args );
                        echo '<div class="item-cards">';
                        // Loop
                        if( $query->have_posts() ) :
                            while( $query->have_posts() ) : $query->the_post();
                                get_template_part('template-parts/items/card-single');
                                $counter = $counter + 1;
                            endwhile; 
                        endif;
                        echo '</div>';
                        ?>
                </div>
                <div id="Merch" class="equipment-category">
                    <h4>Merch</h4>
                        <?php 
                        $args = array(
                            'post_type'     => 'items',
                            'numberposts'   => -1,
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'item_categories',
                                    'field'    => 'slug',
                                    'terms'    => 'merch'
                                )
                            ),
                            'meta_key' => 'rarity',
                            'orderby' => 'meta_value',
                        );
                        $query = new WP_Query( $args );
                        echo '<div class="item-cards">';
                        // Loop
                        if( $query->have_posts() ) :
                            while( $query->have_posts() ) : $query->the_post();
                                get_template_part('template-parts/items/merch-single');
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
                        <h4>Equipment Type<span class="fa fa-plus"></h4>
                        <div class="section-content">
                            <ul class="wpp-list">
                                <li id="filter-1HSword" class="equipment-category-filter-button" onclick="selectEquipment(this, '1HSword')"><img class="chain-icon" src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/equipment/1h-sword.png" /><span class="filter-row">One-Handed Sword</span></li>
                                <li id="filter-2HSword" class="equipment-category-filter-button" onclick="selectEquipment(this, '2HSword')"><img class="chain-icon" src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/equipment/2h-sword.png" /><span class="filter-row">Two-Handed Sword</span></li>
                                <li id="filter-Rifle" class="equipment-category-filter-button" onclick="selectEquipment(this, 'Rifle')"><img class="chain-icon" src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/equipment/rifle.png" /><span class="filter-row">Rifle</span></li>
                                <li id="filter-Bow" class="equipment-category-filter-button" onclick="selectEquipment(this, 'Bow')"><img class="chain-icon" src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/equipment/bow.png" /><span class="filter-row">Bow</span></li>
                                <li id="filter-Basket" class="equipment-category-filter-button" onclick="selectEquipment(this, 'Basket')"><img class="chain-icon" src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/equipment/basket.png" /><span class="filter-row">Basket</span></li>
                                <li id="filter-Staff" class="equipment-category-filter-button" onclick="selectEquipment(this, 'Staff')"><img class="chain-icon" src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/equipment/staff.png" /><span class="filter-row">Staff</span></li>
                                <li id="filter-Gauntlet" class="equipment-category-filter-button" onclick="selectEquipment(this, 'Gauntlet')"><img class="chain-icon" src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/equipment/gauntlet.png" /><span class="filter-row">Gauntlet</span></li>
                                <li id="filter-Claw" class="equipment-category-filter-button" onclick="selectEquipment(this, 'Claw')"><img class="chain-icon" src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/equipment/claw.png" /><span class="filter-row">Claw</span></li>
                                <li id="filter-Shield" class="equipment-category-filter-button" onclick="selectEquipment(this, 'Shield')"><img class="chain-icon" src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/equipment/shield.png" /><span class="filter-row">Shield</span></li>
                                <li id="filter-Accessory" class="equipment-category-filter-button" onclick="selectEquipment(this, 'Accessory')"><img class="chain-icon" src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/equipment/accessory.png" /><span class="filter-row">Accessory</span></li>
                                <li id="filter-Card" class="equipment-category-filter-button" onclick="selectEquipment(this, 'Card')"><img class="chain-icon" src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/equipment/card.png" /><span class="filter-row">Card</span></li>
                                <li id="filter-Merch" class="equipment-category-filter-button" onclick="selectEquipment(this, 'Merch')"><img class="chain-icon" src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/equipment/merch.png" /><span class="filter-row">Merch</span></li>
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
                        selectEquipment('', '1HSword');
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
                        
                        $(".more-info").click(function(e) {
                            
                            e.stopPropagation();
                        });

                        $("div.item-card").click(function(e){
                            e.preventDefault();

                            var isShowing = false;

                            if ($(this).hasClass("d-card-show")) {
                            isShowing = true
                            }

                            if ($("div.item-cards").hasClass("showing")) {
                            // a card is already in view
                            $("div.item-card.d-card-show")
                                .removeClass("d-card-show");

                            if (isShowing) {
                                // this card was showing - reset the grid
                                $("div.item-cards")
                                .removeClass("showing");
                            } else {
                                // this card isn't showing - get in with it
                                $(this)
                                .css({zIndex: zindex})
                                .addClass("d-card-show");

                            }

                            zindex++;

                            } else {
                            // no item-cards in view
                            $("div.item-cards")
                                .addClass("showing");
                            $(this)
                                .css({zIndex:zindex})
                                .addClass("d-card-show");

                            zindex++;
                            }
                            
                        });
                    });
                });

                function selectEquipment(element, type) {
                    jQuery('.equipment-category-filter-button').removeClass("clicked");
                    jQuery('.item-card').removeClass('hidden');
                    if(type=='Accessory')
                    {
                        selectedChain = [];
                        selectedElements = [];
                        selectedStats = [];
                        jQuery('.filter-chain td').removeClass('clicked');
                        jQuery('.filter-element td').removeClass('clicked');
                        jQuery('.equipmentFilter').hide();
                        jQuery('.filter-element').hide();
                        jQuery('.filter-chain').hide();
                    }
                    else if (type=='Card') 
                    {
                        selectedChain = [];
                        selectedElements = [];
                        selectedStats = [];
                        jQuery('.filter-chain td').removeClass('clicked');
                        jQuery('.filter-element td').removeClass('clicked');
                        jQuery('.equipmentFilter').hide();
                        jQuery('.filter-element').hide();
                        jQuery('.filter-chain').hide();
                    }
                    else if (type=='Shield') 
                    {
                        selectedChain = [];
                        selectedElements = [];
                        selectedStats = [];
                        jQuery('.filter-chain td').removeClass('clicked');
                        jQuery('.filter-element td').removeClass('clicked');
                        jQuery('.equipmentFilter').hide();
                        jQuery('.filter-element').hide();
                        jQuery('.filter-chain').hide();
                    }
                    else if (type=='Merch') 
                    {
                        selectedChain = [];
                        selectedElements = [];
                        selectedStats = [];
                        jQuery('.filter-chain td').removeClass('clicked');
                        jQuery('.filter-element td').removeClass('clicked');
                        jQuery('.equipmentFilter').hide();
                        jQuery('.filter-element').hide();
                        jQuery('.filter-chain').hide();
                    }
                    else {
                        selectedChain = [];
                        selectedElements = [];
                        selectedStats = [];
                        jQuery('.filter-chain td').removeClass('clicked');
                        jQuery('.filter-element td').removeClass('clicked');
                        jQuery('.equipmentFilter').show();
                        jQuery('.filter-element').show();
                        jQuery('.filter-chain').show();
                    }
                    jQuery('.equipment-category').hide();
                    jQuery('#'+type).show();
                    jQuery('.equipment-filter-button').removeClass("clicked");
                    if(type=='1HSword') {
                        jQuery('.filter-1HSword').addClass("clicked");
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
                            selectedElements.splice(selectedElements.indexOf('item'+keyword), 1);
                        }
                        else {
                            selectedStats.splice(selectedStats.indexOf('stat-'+keyword), 1);
                        }
                        
                        if((selectedElements.length + selectedStats.length + selectedChain.length) > 0) 
                        {
                            var itemList = jQuery('.item-card');
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

                            jQuery('.item-card').addClass('hidden');
                            itemList.removeClass("hidden"); 
                        }
                        else {
                            jQuery('.item-card').removeClass("hidden");
                        }
                    }
                    else {
                        element.classList.add("clicked");
                        if (type=='c') {
                            selectedChain.push('itemchain'+keyword);
                        }
                        else if (type=='e') {
                            selectedElements.push('item'+keyword);
                        }
                        else {
                            selectedStats.push('stat-'+keyword);
                        }

                        var itemList = jQuery('.item-card');
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

                        jQuery('.item-card').addClass('hidden');
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