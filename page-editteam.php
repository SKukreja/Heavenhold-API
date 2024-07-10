<?php
/**
 * Template Name: Create/Edit Team
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
            <div class="col-lg-8">
                <div id="team-builder">
                    <div class="team-heroes">
                        <div class="team-window">
                            <div class="team-hero"><div id="hero1" class="selected-hero">
                                <img id="hero-select-1" class="empty-hero" src="<?php echo get_template_directory_uri().'/assets/img/icons/hero-icon.png' ?>">
                            </div><h5 id="hero-name-1" class="hero-name"></h5><table id="hero-equipment-1" class="selected-equipment">
                                <tr><td>
                                <div id="weapon-1" class="selected-equipment-box selected-weapon">
                                    <img id="weapon-select-1" class="empty-equipment empty-weapon" src="<?php echo get_template_directory_uri().'/assets/img/icons/weapon.png' ?>">
                                </div>
                                </td><td>
                                <div id="shield-1" class="selected-equipment-box selected-shield">
                                    <img id="shield-select-1" class="empty-equipment empty-shield" src="<?php echo get_template_directory_uri().'/assets/img/icons/weapon.png' ?>">
                                </div>
                                </td></tr><tr><td>
                                <div id="accessory-1" class="selected-equipment-box selected-accessory">
                                    <img id="accessory-select-1" class="empty-equipment empty-accessory" src="<?php echo get_template_directory_uri().'/assets/img/icons/accessory-icon.png' ?>">
                                </div>
                                </td><td></td></tr><tr><td>
                                <div id="card-one-1" class="selected-equipment-box selected-card-1">
                                    <img id="card-one-select-1" class="empty-equipment empty-card-1" src="<?php echo get_template_directory_uri().'/assets/img/icons/card-icon.png' ?>">
                                </div>
                                </td><td>
                                <div id="card-two-1" class="selected-equipment-box selected-card-2">
                                    <img id="card-two-select-1" class="empty-equipment empty-card-2" src="<?php echo get_template_directory_uri().'/assets/img/icons/card-icon.png' ?>">
                                </div>
                                </td></tr>
                                <tr><td colspan="2"><div id="element-icon-1" class="hero-info-icon"></div><div id="role-icon-1" class="hero-info-icon"></div></td></tr>
                            </table></div><div class="team-hero"><div id="hero2" class="selected-hero">
                                <img id="hero-select-2" class="empty-hero" src="<?php echo get_template_directory_uri().'/assets/img/icons/hero-icon.png' ?>">
                            </div><h5 id="hero-name-2" class="hero-name"></h5><table id="hero-equipment-2" class="selected-equipment">
                                <tr><td>
                                <div id="weapon-2" class="selected-equipment-box selected-weapon">
                                    <img id="weapon-select-2" class="empty-equipment empty-weapon" src="<?php echo get_template_directory_uri().'/assets/img/icons/weapon.png' ?>">
                                </div>
                                </td><td>
                                <div id="shield-2" class="selected-equipment-box selected-shield">
                                    <img id="shield-select-2" class="empty-equipment empty-shield" src="<?php echo get_template_directory_uri().'/assets/img/icons/weapon.png' ?>">
                                </div>
                                </td></tr><tr><td>
                                <div id="accessory-2" class="selected-equipment-box selected-accessory">
                                    <img id="accessory-select-2" class="empty-equipment empty-accessory" src="<?php echo get_template_directory_uri().'/assets/img/icons/accessory-icon.png' ?>">
                                </div>
                                </td><td></td></tr><tr><td>
                                <div id="card-one-2" class="selected-equipment-box selected-card-2">
                                    <img id="card-one-select-2" class="empty-equipment empty-card-2" src="<?php echo get_template_directory_uri().'/assets/img/icons/card-icon.png' ?>">
                                </div>
                                </td><td>
                                <div id="card-two-2" class="selected-equipment-box selected-card-2">
                                    <img id="card-two-select-2" class="empty-equipment empty-card-2" src="<?php echo get_template_directory_uri().'/assets/img/icons/card-icon.png' ?>">
                                </div>
                                </td></tr>
                                <tr><td colspan="2"><div id="element-icon-2" class="hero-info-icon"></div><div id="role-icon-2" class="hero-info-icon"></div></td></tr>
                            </table></div><div class="team-hero"><div id="hero3" class="selected-hero">
                                <img id="hero-select-3" class="empty-hero" src="<?php echo get_template_directory_uri().'/assets/img/icons/hero-icon.png' ?>">
                            </div><h5 id="hero-name-3" class="hero-name"></h5><table id="hero-equipment-3" class="selected-equipment">
                                <tr><td>
                                <div id="weapon-3" class="selected-equipment-box selected-weapon">
                                    <img id="weapon-select-3" class="empty-equipment empty-weapon" src="<?php echo get_template_directory_uri().'/assets/img/icons/weapon.png' ?>">
                                </div>
                                </td><td>
                                <div id="shield-3" class="selected-equipment-box selected-shield">
                                    <img id="shield-select-3" class="empty-equipment empty-shield" src="<?php echo get_template_directory_uri().'/assets/img/icons/weapon.png' ?>">
                                </div>
                                </td></tr><tr><td>
                                <div id="accessory-3" class="selected-equipment-box selected-accessory">
                                    <img id="accessory-select-3" class="empty-equipment empty-accessory" src="<?php echo get_template_directory_uri().'/assets/img/icons/accessory-icon.png' ?>">
                                </div>
                                </td><td></td></tr><tr><td>
                                <div id="card-one-3" class="selected-equipment-box selected-card-3">
                                    <img id="card-one-select-3" class="empty-equipment empty-card-3" src="<?php echo get_template_directory_uri().'/assets/img/icons/card-icon.png' ?>">
                                </div>
                                </td><td>
                                <div id="card-two-3" class="selected-equipment-box selected-card-3">
                                    <img id="card-two-select-3" class="empty-equipment empty-card-3" src="<?php echo get_template_directory_uri().'/assets/img/icons/card-icon.png' ?>">
                                </div>
                                </td></tr>
                                <tr><td colspan="2"><div id="element-icon-3" class="hero-info-icon"></div><div id="role-icon-3" class="hero-info-icon"></div></td></tr>
                            </table></div><div class="team-hero"><div id="hero4" class="selected-hero">
                                <img id="hero-select-4" class="empty-hero" src="<?php echo get_template_directory_uri().'/assets/img/icons/hero-icon.png' ?>">
                            </div><h5 id="hero-name-4" class="hero-name"></h5><table id="hero-equipment-4" class="selected-equipment">
                                <tr><td>
                                <div id="weapon-4" class="selected-equipment-box selected-weapon">
                                    <img id="weapon-select-4" class="empty-equipment empty-weapon" src="<?php echo get_template_directory_uri().'/assets/img/icons/weapon.png' ?>">
                                </div>
                                </td><td>
                                <div id="shield-4" class="selected-equipment-box selected-shield">
                                    <img id="shield-select-4" class="empty-equipment empty-shield" src="<?php echo get_template_directory_uri().'/assets/img/icons/weapon.png' ?>">
                                </div>
                                </td></tr><tr><td>
                                <div id="accessory-4" class="selected-equipment-box selected-accessory">
                                    <img id="accessory-select-4" class="empty-equipment empty-accessory" src="<?php echo get_template_directory_uri().'/assets/img/icons/accessory-icon.png' ?>">
                                </div>
                                </td><td></td></tr><tr><td>
                                <div id="card-one-4" class="selected-equipment-box selected-card-4">
                                    <img id="card-one-select-4" class="empty-equipment empty-card-4" src="<?php echo get_template_directory_uri().'/assets/img/icons/card-icon.png' ?>">
                                </div>
                                </td><td>
                                <div id="card-two-4" class="selected-equipment-box selected-card-4">
                                    <img id="card-two-select-4" class="empty-equipment empty-card-4" src="<?php echo get_template_directory_uri().'/assets/img/icons/card-icon.png' ?>">
                                </div>
                                </td></tr>
                                <tr><td colspan="2"><div id="element-icon-4" class="hero-info-icon"></div><div id="role-icon-4" class="hero-info-icon"></div></td></tr>
                            </table></div>
                        </div>
                    </div>
                </div>
                <div id="hero-specs">
                    <table class="hero-spec-table">
                        <tr><th id="hero-spec-1" class="ability-header"></th><th id="hero-spec-2" class="ability-header"></th><th id="hero-spec-3" class="ability-header"></th><th id="hero-spec-4" class="ability-header"></th></tr>
                        <tr><td id="hero-spec-weapon-1"></td><td id="hero-spec-weapon-2"></td><td id="hero-spec-weapon-3"></td><td id="hero-spec-weapon-4"></td></tr>
                        <tr><td id="hero-spec-shield-1"></td><td id="hero-spec-shield-2"></td><td id="hero-spec-shield-3"></td><td id="hero-spec-shield-4"></td></tr>
                        <tr><td id="hero-spec-accessory-1"></td><td id="hero-spec-accessory-2"></td><td id="hero-spec-accessory-3"></td><td id="hero-spec-accessory-4"></td></tr>
                    </table>
                </div>
                <div id="party-buffs">
                    <h4>Party Buffs</h4>
                    <div id="party-buff-area"></div>
                </div>
            </div>
            <div class="col-lg-4">
                <?php dynamic_sidebar( 'forum_archive_sidebar' ); ?>
                <?php dynamic_sidebar( 'sidebar_widgets' ); ?>
            </div>
        </div>
    </div>
</section>
<div id="hero-selection">
<div class="selection-toolbar">
    <table class="selection-filter-table">
        <tr><th colspan="6">Filter Element</th></tr>
        <tr>
            <td onclick="filter(this, 'Basic', 'e')"><?php getElement("Basic") ?></td>
            <td onclick="filter(this, 'Light', 'e')"><?php getElement("Light") ?></td>
            <td onclick="filter(this, 'Dark', 'e')"><?php getElement("Dark") ?></td>
            <td onclick="filter(this, 'Fire', 'e')"><?php getElement("Fire") ?></td>
            <td onclick="filter(this, 'Water', 'e')"><?php getElement("Water") ?></td>
            <td onclick="filter(this, 'Earth', 'e')"><?php getElement("Earth") ?></td>
        </tr>
    </table>
    <table class="selection-filter-table">
        <tr><th colspan="4">Filter Role</th></tr>
        <tr>
            <td onclick="filter(this, 'Tanker', 'r')"><?php getRole("Tanker") ?></td>
            <td onclick="filter(this, 'Warrior', 'r')"><?php getRole("Warrior") ?></td>
            <td onclick="filter(this, 'Ranged', 'r')"><?php getRole("Ranged") ?></td>
            <td onclick="filter(this, 'Support', 'r')"><?php getRole("Support") ?></td>
        </tr>
    </table>
    <table class="selection-filter-table">
        <tr><th colspan="3">Filter Rarity</th></tr>
        <tr class='rarityList'>
            <td onclick="filter(this, '3Star', 's')"><i class="fas fa-star star3"></i><i class="fas fa-star star3"></i><i class="fas fa-star star3"></i></td>
            <td onclick="filter(this, '2Star', 's')"><i class="fas fa-star star2"></i><i class="fas fa-star star2"></i></i></td>
            <td onclick="filter(this, '1Star', 's')"><i class="fas fa-star star1"></i></i></td>
        </tr>
    </table>
    <a class="close-button"><i class="fas fa-close"></i></a></div>
<?php 
$args = array(
    'post_type'     => 'heroes',
    'numberposts'   => -1,
    'meta_query'    => array( 
        'relation'  => 'AND',
        array(
            'key'       => 'evaluation_fields_rating',
            'value'     => array(0,100),
            'type'		=> 'NUMERIC',
            'compare'   => 'BETWEEN'
        ),
        array(
            'key'     => 'bio_fields_rarity', 
            'value'   => array('2 Star', '3 Star'),
            'compare' => 'IN'
        )
    ),
    'meta_key' => 'evaluation_fields_rating',
    'orderby' => 'meta_value_num',
);
$query = new WP_Query( $args );
// Loop
if( $query->have_posts() ) :
    while( $query->have_posts() ) : $query->the_post();  
    $fullname = get_field('bio_fields_name');
    $rarity = get_field('bio_fields_rarity');
    $role = get_field('bio_fields_role');
    $element = get_field('bio_fields_element');
    $passives = explode("\n", get_field('ability_fields_passives'));
    $chain1 = get_field('ability_fields_chain_state_trigger');
    $chain2 = get_field('ability_fields_chain_state_result');
    foreach($passives as $passive) {
        $firstPass = str_replace("[Party]", '<span class="bold">[Party]</span>', $passive);
        $passiveList[] = preg_replace('/\+.*%/i', '<span class="green">$0</span>', $firstPass);
    }
?>
<div id="<?php echo get_the_ID() ?>" class="hero-roster <?php echo $role.' '.$element.' '.str_replace(" ", '', $rarity).' c1-'.$chain1.' c2-'.$chain2 ?>" style="background-image:url('<?php echo the_post_thumbnail_url('hero_portrait') ?>')">
    <h5><?php echo get_the_title() ?></h5>
    <div class="hero-card-text">
        <?php getElementIcon($element) ?> <?php getRoleIcon($role) ?>
        <h6><?php foreach($passiveList as $passive) {if(strpos($passive, '[Party]') !== false) {echo $passive;}} ?></h6>
        <div class="chain-ability"><?php getChainIcon($chain1) ?><i class="fas fa-arrow-right"></i><?php getChainIcon($chain2) ?></div>
    </div>
</div>
<?php
    $passiveList = [];
    endwhile;
endif;
wp_reset_postdata();
?>
</div>
<div id="equipment-selection">
<div class="selection-toolbar">
    <table class="selection-filter-table">
        <tr><th colspan="6">Filter Element</th></tr>
        <tr>
            <td onclick="filterEquipment(this, 'Basic', 'e')"><?php getElement("Basic") ?></td>
            <td onclick="filterEquipment(this, 'Light', 'e')"><?php getElement("Light") ?></td>
            <td onclick="filterEquipment(this, 'Dark', 'e')"><?php getElement("Dark") ?></td>
            <td onclick="filterEquipment(this, 'Fire', 'e')"><?php getElement("Fire") ?></td>
            <td onclick="filterEquipment(this, 'Water', 'e')"><?php getElement("Water") ?></td>
            <td onclick="filterEquipment(this, 'Earth', 'e')"><?php getElement("Earth") ?></td>
        </tr>
    </table>
    <a class="close-equipment"><i class="fas fa-close"></i></a></div>
    <div class="item-cards">
<?php 
$args = array(
    'post_type'     => 'items',
    'numberposts'   => -1,
    'meta_query'    => array(
        'relation'  => 'OR',
        'query_dps' => array(
            'key'   => 'dps',
            'type'  => 'numeric'
        ),
        'query_toughness'   => array(
            'key' => 'toughness',
            'type'  => 'numeric'
        )
    ),
    'orderby'   => array(
        'query_dps'   => 'DESC',
        'query_toughness'  => 'DESC'
    )
);
$query = new WP_Query( $args );
// Loop
echo '<div class="equipment-category">';
if( $query->have_posts() ) :
    while( $query->have_posts() ) : $query->the_post();  
    if(has_term('Weapon', 'item_categories')) {
        get_template_part('template-parts/builder/weapon-single');   
    }
    else if(has_term('Shield', 'item_categories')) {
        get_template_part('template-parts/builder/shield-single');  
    }
    else if(has_term('Accessory', 'item_categories')) {
        get_template_part('template-parts/builder/accessory-single');  
    }
    else if(has_term('Card', 'item_categories')) {
        get_template_part('template-parts/builder/card-single');  
    }
    endwhile;
endif;
wp_reset_postdata();
$args = array(
    'post_type'     => 'items',
    'numberposts'   => -1,
    'meta_query'    => array(
        'relation'  => 'AND',
        'query_dps' => array(
            'key'   => 'dps',
            'compare' => 'NOT EXISTS'
        ),
        'query_toughness'   => array(
            'key' => 'toughness',
            'compare' => 'NOT EXISTS'
        )
    )
);
$query = new WP_Query( $args );
// Loop
if( $query->have_posts() ) :
    while( $query->have_posts() ) : $query->the_post();  
    if(has_term('Weapon', 'item_categories')) {
        get_template_part('template-parts/builder/weapon-single');   
    }
    else if(has_term('Shield', 'item_categories')) {
        get_template_part('template-parts/builder/shield-single');  
    }
    else if(has_term('Accessory', 'item_categories')) {
        get_template_part('template-parts/builder/accessory-single');  
    }
    else if(has_term('Card', 'item_categories')) {
        get_template_part('template-parts/builder/card-single');  
    }
    endwhile;
endif;
echo '</div>';
wp_reset_postdata();
?>
</div>
</div>
<script>
    var selectedElements=[], selectedRoles=[], selectedStars=[], selectedHeroSlot, selectedEquipmentSlot, heroList, itemList, selectedHero=[], selectedWeapon=[], selectedShield=[], selectedAccessory=[], selectedCardOne=[], selectedCardTwo=[], selectedWeapon=[], selectedShield=[],selectedCard1=[],selectedCard2=[],selectedAccessory=[];
    window.onload = function() {
        jQuery(function($){
            var zindex = 10;

            $("div.item-card").click(function(e){
                e.preventDefault();

                var isShowing = false;

                if ($(this).hasClass("d-card-show")) {
                isShowing = true
                }

                if ($("div.item-cards").hasClass("showing")) {
                $("div.item-card.d-card-show")
                    .removeClass("d-card-show");

                if (isShowing) {
                    $("div.item-cards")
                    .removeClass("showing");
                } else {
                    $(this)
                    .css({zIndex: zindex})
                    .addClass("d-card-show");

                }

                zindex++;

                } else {
                $("div.item-cards")
                    .addClass("showing");
                $(this)
                    .css({zIndex:zindex})
                    .addClass("d-card-show");

                zindex++;
                }
                
            });

            $('#team-builder').css('background-image', "url('<?php echo get_template_directory_uri().'/assets/img/icons/builder-bg.jpg' ?>')" );   

            $.ajax({
                url: 'https://guardiantales.wiki/wp-json/wp/v2/heroes?per_page=100',
                contentType: "application/json",
                dataType: 'json',
                success: function(result){
                    heroList = result;
                }
            });

            $.getJSON("https://guardiantales.wiki/wp-content/themes/heavenhold/item-data/items.json", function(data){

                itemList = data;

            }).fail(function(){

                console.log("Could not retrieve item data.");

            });

            $('#hero-selection').on("click", ".hero-roster", function(event) {
                event.stopPropagation();
                event.stopImmediatePropagation();
                $.each(heroList, (index, hero) => {
                    if (parseInt(hero.id) == this.id) {
                        $("#hero-select-"+selectedHeroSlot).hide();
                        $("#hero"+selectedHeroSlot).css('background-image',"url('"+hero.acf.bio_fields.picture+"')");
                        $("#hero-name-"+selectedHeroSlot).text(hero.title.rendered);
                        $("#element-icon-"+selectedHeroSlot).css('background-image',"url('https://guardiantales.wiki/wp-content/themes/heavenhold/assets/img/icons/"+hero.acf.bio_fields.element.toLowerCase()+".png')");
                        $("#role-icon-"+selectedHeroSlot).css('background-image',"url('https://guardiantales.wiki/wp-content/themes/heavenhold/assets/img/icons/"+hero.acf.bio_fields.role.toLowerCase()+".png')");
                        selectedHero[selectedHeroSlot-1] = hero;
                        $("#hero-equipment-"+selectedHeroSlot).fadeIn();
                        if(!((hero.acf.bio_fields.compatible_equipment).includes('Shield'))) {
                            $("#shield-"+selectedHeroSlot).hide();
                        }
                        $("#hero-selection").fadeOut();
                        return false;
                    }
                });
                $(".hero-roster").removeClass('selected-hero-disabled');
                var passiveList = [];
                $.each(selectedHero, (index, hero) => {
                    if (hero) {
                        $("#"+hero.id).addClass('selected-hero-disabled');
                        var heroPassives = (hero.acf.ability_fields.passives).split(/\r?\n?\<br \/\>/);
                        $.each(heroPassives, (i, passive) => {
                            if(passive.includes("[Party]")) {
                                console.log(passive);
                                partyBuff = passive.replace("[Party]", '<span class="bold">[Party]</span>');
                                buffGreenValue = partyBuff.replace(/(\+.*%)/, '<span class="green">$1</span>');
                                passiveList.push(buffGreenValue);
                            }
                        });
                    }
                });
                var statLabel = [];
                var statValue = [];
                $.each(passiveList, (i, passive) => {
                    var value = parseFloat(passive.match(/([+-]?[0-9]*[.]?[0-9]+?)/));
                    var label = passive.replace(/([+-]?[0-9]*[.]?[0-9]+?)/,'NUMBER');
                    var foundIndex = statLabel.indexOf(label);
                    if(foundIndex >= 0 ) {
                        statValue[foundIndex] = statValue[foundIndex] + value; 
                    }
                    else {
                        statLabel.push(label);
                        statValue.push(value);
                    }
                });
                var finalBuffs = [];
                $.each(statLabel, (i, stat) => {
                    finalBuffs.push(stat.replace('NUMBER', '+' + statValue[i] + '.0'));
                });
                $("#party-buff-area").html(finalBuffs.join("<br>"));
                $("#hero-spec-"+selectedHeroSlot).html(selectedHero[selectedHeroSlot-1].acf.bio_fields.name);
            });

            $('#equipment-selection').on("click", ".more-info", function(event) {
                event.stopPropagation();
                event.stopImmediatePropagation();
                $(".item-card").removeClass('selected-hero-disabled');
                $.each(itemList, (index, item) => {
                    if (parseInt(item.id) == this.id) {
                        $("#"+selectedEquipmentSlot+"-select-"+selectedHeroSlot).hide();
                        $("#"+ selectedEquipmentSlot +"-"+selectedHeroSlot).css('background-image',"url('"+item._embedded['wp:featuredmedia']['0'].source_url+"')");
                        if(selectedEquipmentSlot == 'weapon') {
                            selectedWeapon[selectedHeroSlot - 1] = item; 
                        }
                        else if(selectedEquipmentSlot == 'shield') {
                            selectedShield[selectedHeroSlot - 1] = item; 
                        }
                        else if(selectedEquipmentSlot == 'accessory') {
                            selectedAccessory[selectedHeroSlot - 1] = item; 
                        }
                        else if(selectedEquipmentSlot == 'card-one') {
                            $("#"+item.id).addClass('selected-hero-disabled');
                            selectedCardOne[selectedHeroSlot - 1] = item; 
                        }
                        else if(selectedEquipmentSlot == 'card-two') {
                            $("#"+item.id).addClass('selected-hero-disabled');
                            selectedCardTwo[selectedHeroSlot - 1] = item; 
                        }
                        
                        
                        var negatedOptions = preg_grep('/.*negated.*/', item.acf.options);
                        var negatedSubOptions = preg_grep('/.*negated.*/', item.acf.sub_options);
                        var tooltipText = '<br>';
                        if (parseFloat(item.acf.atk)>0) {
                            tooltipText = tooltipText + '<span class="weapon-stat weapon-atk"><span class="stat-label label-offensive">Atk</span> +'+item.acf.atk+'%</span>';
                        }  
                        if (parseFloat(item.acf.magazine)>0) {
                            tooltipText = tooltipText + '<span class="weapon-stat weapon-magazine"><span class="stat-label label-offensive">Magazine Size</span> '+item.acf.magazine+'</span>';
                        } 
                        if (parseFloat(item.acf.heal_flat)>0) {
                            tooltipText = tooltipText + '<span class="weapon-stat weapon-heal-flat"><span class="stat-label label-offensive">Heal </span> '+item.acf.heal_flat+'</span>';
                        } 
                        if (parseFloat(item.acf.crit_chance)>0) {
                            tooltipText = tooltipText + '<span class="weapon-stat weapon-crit"><span class="stat-label label-offensive">Crit Hit Chance</span> '+item.acf.crit_chance+'%</span>';
                        } 
                        if (parseFloat(item.acf.def_flat)>0) {
                            tooltipText = tooltipText + '<span class="weapon-stat weapon-def-flat"><span class="stat-label label-offensive">Def</span> '+item.acf.def_flat+'</span>';
                        } 
                        if (parseFloat(item.acf.damage_reduction)>0) {
                            tooltipText = tooltipText + '<span class="weapon-stat weapon-dr"><span class="stat-label">Damage Reduction</span> <span class="green">'+item.acf.damage_reduction+'</span></span>';
                        }
                        if (parseFloat(item.acf.atk_on_kill)>0) {
                            tooltipText = tooltipText + '<span class="weapon-stat weapon-atk-on-kill"><span class="green">+'+item.acf.atk_on_kill+'%</span> Atk increase on enemy kill</span>';
                        } 
                        if (parseFloat(item.acf.hp_on_kill)>0) {
                            tooltipText = tooltipText + '<span class="weapon-stat weapon-hp-on-kill"><span class="green">+'+item.acf.hp_on_kill+'%</span> HP recovery on enemy kill</span>';
                        } 
                        if (parseFloat(item.acf.shield_on_kill)>0) {
                            tooltipText = tooltipText + '<span class="weapon-stat weapon-shield-on-kill"><span class="green">+'+item.acf.shield_on_kill+'%</span> shield increase on enemy kill</span>';
                        } 
                        if (parseFloat(item.acf.shield_on_start)>0) {
                            tooltipText = tooltipText + '<span class="weapon-stat weapon-shield-on-start"><span class="green">+'+item.acf.shield_on_start+'%</span> shield increase on battle start</span>';
                        }
                        if (parseFloat(item.acf.def)>0) {
                            tooltipText = tooltipText + '<span class="weapon-stat weapon-def"><span class="stat-label label-defensive">Def</span> +'+item.acf.def+'%</span>';
                        } 
                        if (parseFloat(item.acf.hp)>0) {
                            tooltipText = tooltipText + '<span class="weapon-stat weapon-hp"><span class="stat-label label-defensive">HP</span> +'+item.acf.hp+'%</span>';
                        }
                        if (parseFloat(item.acf.heal)>0) {
                            tooltipText = tooltipText + '<span class="weapon-stat weapon-heal"><span class="stat-label label-defensive">Heal</span> +'+item.acf.heal+'%</span>';
                        } 
                        if (parseFloat(item.acf.skill_damage)>0) {
                            tooltipText = tooltipText + '<span class="weapon-stat weapon-skill-damage"><span class="stat-label label-defensive">Skill Damage</span> +'+item.acf.skill_damage+'%</span>';
                        }  
                        if (parseFloat(item.acf.skill_regen_speed)>0) {
                            tooltipText = tooltipText + '<span class="weapon-stat weapon-regen-speed"><span class="stat-label label-defensive">Weapon Skill Regen Speed</span> +'+item.acf.skill_regen_speed+'%</span>';
                        } 
                        if (parseFloat(item.acf.skill_regen_on_kill)<0) {
                            tooltipText = tooltipText + '<span class="weapon-stat weapon-regen-on-kill"><span class="green">'+item.acf.skill_regen_on_kill+'</span> seconds of weapon skill Regen time on enemy kill</span>';
                        } 
                        if (parseFloat(item.acf.earth_type_atk)>0) {
                            tooltipText = tooltipText + '<span class="weapon-stat weapon-def"><span class="stat-label label-defensive">Earth type Atk</span> +'+item.acf.earth_type_atk+'%</span>';
                        } 
                        if (parseFloat(item.acf.fire_type_atk)>0) {
                            tooltipText = tooltipText + '<span class="weapon-stat weapon-def"><span class="stat-label label-defensive">Fire type Atk</span> +'+item.acf.fire_type_atk+'%</span>';
                        }
                        if (parseFloat(item.acf.water_type_atk)>0) {
                            tooltipText = tooltipText + '<span class="weapon-stat weapon-def"><span class="stat-label label-defensive">Water type Atk</span> +'+item.acf.water_type_atk+'%</span>';
                        }  
                        if (parseFloat(item.acf.basic_type_atk)>0) {
                            tooltipText = tooltipText + '<span class="weapon-stat weapon-def"><span class="stat-label label-defensive">Basic type Atk</span> +'+item.acf.basic_type_atk+'%</span>';
                        } 
                        if (parseFloat(item.acf.light_type_atk)>0) {
                            tooltipText = tooltipText + '<span class="weapon-stat weapon-def"><span class="stat-label label-defensive">Light type Atk</span> +'+item.acf.light_type_atk+'%</span>';
                        } 
                        if (parseFloat(item.acf.dark_type_atk)>0) {
                            tooltipText = tooltipText + '<span class="weapon-stat weapon-def"><span class="stat-label label-defensive">Dark type Atk</span> +'+item.acf.dark_type_atk+'%</span>';
                        } 
                        $.each(negatedOptions, (i,negated) => 
                        {
                            tooltipText = tooltipText + '<span class="weapon-stat weapon-def">'+negated+'</span>';
                        });
                        if(item.acf.exclusive)
                        {
                            hero = item.acf.hero[0];
                            tooltipText = tooltipText + '<br><span class="exclusive"><span class="exclusive-header">[';
                            tooltipText = tooltipText + hero.post_title;
                            tooltipText = tooltipText + ' only]</span><br>';
                            tooltipText = tooltipText + item.acf.exclusive_effects;
                            tooltipText = tooltipText + '</span><br>';
                        }
                        if(item.acf.lb5_option)
                        {
                            tooltipText = tooltipText +  '<br><span class="weapon-stat limit-break limit-break-header">[Required Limit Break 5]</span><span class="weapon-stat limit-break">';
                            if(item.acf.lb5_option=='Atk (%)'){
                                tooltipText = tooltipText +  '<span class="stat-label label-defensive">Atk</span> <span class="green">+'+item.acf.lb5_value+'%</span>';
                            }
                            else if(item.acf.lb5_option=='HP (%)') {
                                tooltipText = tooltipText +  '<span class="stat-label label-defensive">HP</span> <span class="green">+'+item.acf.lb5_value+'%</span>';
                            }
                            else if(item.acf.lb5_option=='Crit Hit Chance') {
                                tooltipText = tooltipText +  '<span class="stat-label label-defensive">Crit Hit Chance</span> <span class="green">+'+item.acf.lb5_value+'%</span>';
                            }
                            else if(item.acf.lb5_option=='Damage Reduction') {
                                tooltipText = tooltipText +  '<span class="stat-label label-defensive">Damage Reduction</span> <span class="green">+'+item.acf.lb5_value+'</span>';
                            }
                            else if(item.acf.lb5_option=='Def') {
                                tooltipText = tooltipText +  '<span class="stat-label label-defensive">Def</span> <span class="green">+'+item.acf.lb5_value+'%</span>';
                            }
                            else if(item.acf.lb5_option=='Heal (Flat)') {
                                tooltipText = tooltipText +  '<span class="stat-label label-defensive">Heal</span> <span class="green">+'+item.acf.lb5_value+'</span>';
                            }
                            else if(item.acf.lb5_option=='Heal (%)') {
                                tooltipText = tooltipText +  '<span class="stat-label label-defensive">Heal</span> <span class="green">+'+item.acf.lb5_value+'%</span>';
                            }
                            else if(item.acf.lb5_option=='Atk increase on enemy kill') {
                                tooltipText = tooltipText +  '<span class="weapon-stat weapon-atk-on-kill"><span class="green">+'+item.acf.lb5_value+'%</span> Atk increase on enemy kill</span>';
                            }
                            else if(item.acf.lb5_option=='HP recovery on enemy kill') {
                                tooltipText = tooltipText +  '<span class="weapon-stat weapon-hp-on-kill"><span class="green">+'+item.acf.lb5_value+'%</span> HP recovery on enemy kill</span>';
                            }
                            else if(item.acf.lb5_option=='Seconds of weapon skill Regen time on enemy kill') {
                                tooltipText = tooltipText +  '<span class="weapon-stat weapon-regen-on-kill"><span class="green">'+item.acf.lb5_value+'</span> seconds of weapon skill Regen time on enemy kill</span>';
                            }
                            else if(item.acf.lb5_option=='Shield increase on battle start') {
                                tooltipText = tooltipText +  '<span class="weapon-stat weapon-shield-on-start"><span class="green">+'+item.acf.lb5_value+'%</span> shield increase on battle start</span>';
                            }
                            else if(item.acf.lb5_option=='Shield increase on enemy kill') {
                                tooltipText = tooltipText +  '<span class="weapon-stat weapon-shield-on-kill"><span class="green">+'+item.acf.lb5_value+'%</span> shield increase on enemy kill</span>';
                            }
                            else if(item.acf.lb5_option=='Skill Damage') {
                                tooltipText = tooltipText +  '<span class="weapon-stat weapon-skill-damage"><span class="stat-label label-defensive">Skill Damage</span> +'+item.acf.lb5_value+'%</span>';
                            }
                            else if(item.acf.lb5_option=='Weapon Skill Regen Speed') {
                                tooltipText = tooltipText +  '<span class="weapon-stat weapon-regen-speed"><span class="stat-label label-defensive">Weapon Skill Regen Speed</span> +'+item.acf.lb5_value+'%</span>';
                            }
                            tooltipText = tooltipText +  '<br>';
                        } 
                        if((item.acf.sub_options).length > 0) {
                            tooltipText = tooltipText + '<br><span class="weapon-stat limit-break limit-break-header sub-options-text">[Sub-Options]</span>';
                            if (parseFloat(item.acf.sub_atk)>0) {
                                tooltipText = tooltipText + '<span class="weapon-stat weapon-atk"><span class="stat-label label-offensive">Atk</span> +'+item.acf.sub_atk+'%</span>';
                            }  
                            if (parseFloat(item.acf.sub_heal_flat)>0) {
                                tooltipText = tooltipText + '<span class="weapon-stat weapon-heal-flat"><span class="stat-label label-offensive">Heal </span> '+item.acf.sub_heal_flat+'</span>';
                            } 
                            if (parseFloat(item.acf.sub_crit_chance)>0) {
                                tooltipText = tooltipText + '<span class="weapon-stat weapon-crit"><span class="stat-label label-offensive">Crit Hit Chance</span> '+item.acf.sub_crit_chance+'%</span>';
                            } 
                            if (parseFloat(item.acf.sub_def_flat)>0) {
                                tooltipText = tooltipText + '<span class="weapon-stat weapon-def-flat"><span class="stat-label label-offensive">Def</span> '+item.acf.sub_def_flat+'</span>';
                            } 
                            if (parseFloat(item.acf.sub_damage_reduction)>0) {
                                tooltipText = tooltipText + '<span class="weapon-stat weapon-dr"><span class="stat-label">Damage Reduction</span> <span class="green">'+item.acf.sub_damage_reduction+'</span></span>';
                            }
                            if (parseFloat(item.acf.sub_atk_on_kill)>0) {
                                tooltipText = tooltipText + '<span class="weapon-stat weapon-atk-on-kill"><span class="green">+'+item.acf.sub_atk_on_kill+'%</span> Atk increase on enemy kill</span>';
                            } 
                            if (parseFloat(item.acf.sub_hp_on_kill)>0) {
                                tooltipText = tooltipText + '<span class="weapon-stat weapon-hp-on-kill"><span class="green">+'+item.acf.sub_hp_on_kill+'%</span> HP recovery on enemy kill</span>';
                            } 
                            if (parseFloat(item.acf.sub_shield_on_kill)>0) {
                                tooltipText = tooltipText + '<span class="weapon-stat weapon-shield-on-kill"><span class="green">+'+item.acf.sub_shield_on_kill+'%</span> shield increase on enemy kill</span>';
                            } 
                            if (parseFloat(item.acf.sub_shield_on_start)>0) {
                                tooltipText = tooltipText + '<span class="weapon-stat weapon-shield-on-start"><span class="green">+'+item.acf.sub_shield_on_start+'%</span> shield increase on battle start</span>';
                            }
                            if (parseFloat(item.acf.sub_def)>0) {
                                tooltipText = tooltipText + '<span class="weapon-stat weapon-def"><span class="stat-label label-defensive">Def</span> +'+item.acf.sub_def+'%</span>';
                            } 
                            if (parseFloat(item.acf.sub_hp)>0) {
                                tooltipText = tooltipText + '<span class="weapon-stat weapon-hp"><span class="stat-label label-defensive">HP</span> +'+item.acf.sub_hp+'%</span>';
                            }
                            if (parseFloat(item.acf.sub_heal)>0) {
                                tooltipText = tooltipText + '<span class="weapon-stat weapon-heal"><span class="stat-label label-defensive">Heal</span> +'+item.acf.sub_heal+'%</span>';
                            } 
                            if (parseFloat(item.acf.sub_skill_damage)>0) {
                                tooltipText = tooltipText + '<span class="weapon-stat weapon-skill-damage"><span class="stat-label label-defensive">Skill Damage</span> +'+item.acf.sub_skill_damage+'%</span>';
                            }  
                            if (parseFloat(item.acf.sub_skill_regen_speed)>0) {
                                tooltipText = tooltipText + '<span class="weapon-stat weapon-regen-speed"><span class="stat-label label-defensive">Weapon Skill Regen Speed</span> +'+item.acf.sub_skill_regen_speed+'%</span>';
                            } 
                            if (parseFloat(item.acf.sub_skill_regen_on_kill)<0) {
                                tooltipText = tooltipText + '<span class="weapon-stat weapon-regen-on-kill"><span class="green">'+item.acf.sub_skill_regen_on_kill+'</span> seconds of weapon skill Regen time on enemy kill</span>';
                            } 
                            if (parseFloat(item.acf.sub_earth_type_atk)>0) {
                                tooltipText = tooltipText + '<span class="weapon-stat weapon-def"><span class="stat-label label-defensive">Earth type Atk</span> +'+item.acf.sub_earth_type_atk+'%</span>';
                            } 
                            if (parseFloat(item.acf.sub_fire_type_atk)>0) {
                                tooltipText = tooltipText + '<span class="weapon-stat weapon-def"><span class="stat-label label-defensive">Fire type Atk</span> +'+item.acf.sub_fire_type_atk+'%</span>';
                            }
                            if (parseFloat(item.acf.sub_water_type_atk)>0) {
                                tooltipText = tooltipText + '<span class="weapon-stat weapon-def"><span class="stat-label label-defensive">Water type Atk</span> +'+item.acf.sub_water_type_atk+'%</span>';
                            }  
                            if (parseFloat(item.acf.sub_basic_type_atk)>0) {
                                tooltipText = tooltipText + '<span class="weapon-stat weapon-def"><span class="stat-label label-defensive">Basic type Atk</span> +'+item.acf.sub_basic_type_atk+'%</span>';
                            } 
                            if (parseFloat(item.acf.sub_light_type_atk)>0) {
                                tooltipText = tooltipText + '<span class="weapon-stat weapon-def"><span class="stat-label label-defensive">Light type Atk</span> +'+item.acf.sub_light_type_atk+'%</span>';
                            } 
                            if (parseFloat(item.acf.sub_dark_type_atk)>0) {
                                tooltipText = tooltipText + '<span class="weapon-stat weapon-def"><span class="stat-label label-defensive">Dark type Atk</span> +'+item.acf.sub_dark_type_atk+'%</span>';
                            } 
                            $.each(negatedSubOptions, (i,negated) => 
                            {
                                tooltipText = tooltipText + '<span class="weapon-stat weapon-def">'+negated+'</span>';
                            });
                        }
                        
                        $("#"+ selectedEquipmentSlot +"-"+selectedHeroSlot).prop('title', '<img class="item-tooltip-image" src="'+ item._embedded['wp:featuredmedia']['0'].source_url + '" /><br><span class="bold">' + item.title.rendered + '</span><br>'+tooltipText);
                        $("#"+ selectedEquipmentSlot +"-"+selectedHeroSlot).tooltip({
                            tooltipClass 	: "item-tooltip",
                            persistent 	: true,
                            html 	: true,
                            trigger 	: "hover"
                        });
                        $("#equipment-selection").fadeOut();
                        return false;
                    }
                });
                $.each(selectedCardOne, (index, card) => {
                    $("#"+card.id).addClass('selected-hero-disabled');
                });
                $.each(selectedCardTwo, (index, card) => {
                    $("#"+card.id).addClass('selected-hero-disabled');
                });
            });
        });
    }


    jQuery(function($){
            $('.close-button').click(function() {
                $('#hero-selection').fadeOut(); 
            });  
            $('.close-equipment').click(function() {
                $('#equipment-selection').fadeOut(); 
            }); 
            $('#hero1').click(function(){
                $('#hero-selection').fadeIn(1000);
                selectedHeroSlot = 1;
            });
            $('#hero2').click(function(){
                $('#hero-selection').fadeIn(1000);
                selectedHeroSlot = 2;
            });
            $('#hero3').click(function(){
                $('#hero-selection').fadeIn(1000);
                selectedHeroSlot = 3;
            });
            $('#hero4').click(function(){
                $('#hero-selection').fadeIn(1000);
                selectedHeroSlot = 4;
            });
            $('#weapon-1').click(function(){
                var equipmentType = selectedHero[0].acf.bio_fields.compatible_equipment;
                selectedEquipmentSlot = 'weapon';
                selectedHeroSlot = 1;
                filterWeapon(equipmentType);
                $('#equipment-selection').fadeIn(1000);
            });
            $('#weapon-2').click(function(){
                var equipmentType = selectedHero[1].acf.bio_fields.compatible_equipment;
                selectedEquipmentSlot = 'weapon';
                selectedHeroSlot = 2;
                filterWeapon(equipmentType);
                $('#equipment-selection').fadeIn(1000);
            });
            $('#weapon-3').click(function(){
                var equipmentType = selectedHero[2].acf.bio_fields.compatible_equipment;
                selectedEquipmentSlot = 'weapon';
                selectedHeroSlot = 3;
                filterWeapon(equipmentType);
                $('#equipment-selection').fadeIn(1000);
            });
            $('#weapon-4').click(function(){
                var equipmentType = selectedHero[3].acf.bio_fields.compatible_equipment;
                selectedEquipmentSlot = 'weapon';
                selectedHeroSlot = 4;
                filterWeapon(equipmentType);
                $('#equipment-selection').fadeIn(1000);
            });
            $('#shield-1').click(function(){
                var equipmentType = selectedHero[0].acf.bio_fields.compatible_equipment;
                selectedEquipmentSlot = 'shield';
                selectedHeroSlot = 1;
                $('.item-card').hide();
                if(equipmentType.includes('Shield')) {
                    $('.armor-shield').show();
                }
                $('#equipment-selection').fadeIn(1000);
            });
            $('#shield-2').click(function(){
                var equipmentType = selectedHero[1].acf.bio_fields.compatible_equipment;
                selectedEquipmentSlot = 'shield';
                selectedHeroSlot = 2;
                $('.item-card').hide();
                if(equipmentType.includes('Shield')) {
                    $('.armor-shield').show();
                }
                $('#equipment-selection').fadeIn(1000);
            });
            $('#shield-3').click(function(){
                var equipmentType = selectedHero[2].acf.bio_fields.compatible_equipment;
                selectedEquipmentSlot = 'shield';
                selectedHeroSlot = 3;
                $('.item-card').hide();
                if(equipmentType.includes('Shield')) {
                    $('.armor-shield').show();
                }
                $('#equipment-selection').fadeIn(1000);
            });
            $('#shield-4').click(function(){
                var equipmentType = selectedHero[3].acf.bio_fields.compatible_equipment;
                selectedEquipmentSlot = 'shield';
                selectedHeroSlot = 4;
                $('.item-card').hide();
                if(equipmentType.includes('Shield')) {
                    $('.armor-shield').show();
                }
                $('#equipment-selection').fadeIn(1000);
            });
            $('#accessory-1').click(function(){
                var equipmentType = selectedHero[0].acf.bio_fields.compatible_equipment;
                selectedEquipmentSlot = 'accessory';
                selectedHeroSlot = 1;
                $('.item-card').hide();
                if(equipmentType.includes('Accessory')) {
                    $('.armor-accessory').show();
                }
                $('#equipment-selection').fadeIn(1000);
            });
            $('#accessory-2').click(function(){
                var equipmentType = selectedHero[1].acf.bio_fields.compatible_equipment;
                selectedEquipmentSlot = 'accessory';
                selectedHeroSlot = 2;
                $('.item-card').hide();
                if(equipmentType.includes('Accessory')) {
                    $('.armor-accessory').show();
                }
                $('#equipment-selection').fadeIn(1000);
            });
            $('#accessory-3').click(function(){
                var equipmentType = selectedHero[2].acf.bio_fields.compatible_equipment;
                selectedEquipmentSlot = 'accessory';
                selectedHeroSlot = 3;
                $('.item-card').hide();
                if(equipmentType.includes('Accessory')) {
                    $('.armor-accessory').show();
                }
                $('#equipment-selection').fadeIn(1000);
            });
            $('#accessory-4').click(function(){
                var equipmentType = selectedHero[3].acf.bio_fields.compatible_equipment;
                selectedEquipmentSlot = 'accessory';
                selectedHeroSlot = 4;
                $('.item-card').hide();
                if(equipmentType.includes('Accessory')) {
                    $('.armor-accessory').show();
                }
                $('#equipment-selection').fadeIn(1000);
            });
            $('#card-one-1').click(function(){
                selectedEquipmentSlot = 'card-one';
                selectedHeroSlot = 1;
                $('.item-card').hide();
                $('.armor-card').show();
                $('#equipment-selection').fadeIn(1000);
            });
            $('#card-one-2').click(function(){
                selectedEquipmentSlot = 'card-one';
                selectedHeroSlot = 2;
                $('.item-card').hide();
                $('.armor-card').show();
                $('#equipment-selection').fadeIn(1000);
            });
            $('#card-one-3').click(function(){
                selectedEquipmentSlot = 'card-one';
                selectedHeroSlot = 3;
                $('.item-card').hide();
                $('.armor-card').show();
                $('#equipment-selection').fadeIn(1000);
            });
            $('#card-one-4').click(function(){
                selectedEquipmentSlot = 'card-one';
                selectedHeroSlot = 4;
                $('.item-card').hide();
                $('.armor-card').show();
                $('#equipment-selection').fadeIn(1000);
            });
            $('#card-two-1').click(function(){
                selectedEquipmentSlot = 'card-two';
                selectedHeroSlot = 1;
                $('.item-card').hide();
                $('.armor-card').show();
                $('#equipment-selection').fadeIn(1000);
            });
            $('#card-two-2').click(function(){
                selectedEquipmentSlot = 'card-two';
                selectedHeroSlot = 2;
                $('.item-card').hide();
                $('.armor-card').show();
                $('#equipment-selection').fadeIn(1000);
            });
            $('#card-two-3').click(function(){
                selectedEquipmentSlot = 'card-two';
                selectedHeroSlot = 3;
                $('.item-card').hide();
                $('.armor-card').show();
                $('#equipment-selection').fadeIn(1000);
            });
            $('#card-two-4').click(function(){
                selectedEquipmentSlot = 'card-two';
                selectedHeroSlot = 4;
                $('.item-card').hide();
                $('.armor-card').show();
                $('#equipment-selection').fadeIn(1000);
            });
        });

    function filterWeapon(compatibleEquipment) {
        jQuery('.item-card').hide();
        if(compatibleEquipment.includes('Two-Handed Sword')) {
            jQuery('.weapon-Two-Handed').show();
        }
        if(compatibleEquipment.includes('One-Handed Sword')) {
            jQuery('.weapon-One-Handed').show();
        }
        if(compatibleEquipment.includes('Rifle')) {
            jQuery('.weapon-Rifle').show();
        }
        if(compatibleEquipment.includes('Bow')) {
            jQuery('.weapon-Bow').show();
        }
        if(compatibleEquipment.includes('Basket')) {
            jQuery('.weapon-Basket').show();
        }
        if(compatibleEquipment.includes('Staff')) {
            jQuery('.weapon-Staff').show();
        }
        if(compatibleEquipment.includes('Gauntlet')) {
            jQuery('.weapon-Gauntlet').show();
        }
        if(compatibleEquipment.includes('Claw')) {
            jQuery('.weapon-Claw').show();
        }
    }

    function preg_grep (pattern, input, flags) {

    var p = '',
        retObj = {};
    var invert = (flags === 1 || flags === 'PREG_GREP_INVERT'); // Todo: put flags as number and do bitwise checks (at least if other flags allowable); see pathinfo()

    if (typeof pattern === 'string') {
        pattern = eval(pattern);
    }

    if (invert) {
        for (p in input) {
            if (input[p].search(pattern) === -1) {
                retObj[p] = input[p];
            }
        }
    } else {
        for (p in input) {
            if (input[p].search(pattern) !== -1) {
                retObj[p] = input[p];
            }
        }
    }

    return retObj;
}

    function filter(element, keyword, type) {
        if(element.classList.contains("clicked")) {
            element.classList.remove("clicked");
            if(type=='s') {
                selectedStars.splice(selectedStars.indexOf(keyword), 1);
            }
            else if (type=='e') {
                selectedElements.splice(selectedElements.indexOf(keyword), 1);
            }
            else {
                selectedRoles.splice(selectedRoles.indexOf(keyword), 1);
            }
            
            if((selectedElements.length + selectedRoles.length + selectedStars.length) > 0) 
            {
                var heroesList = jQuery('.hero-roster');
                var elementList = '';
                var roleList = '';
                var starList = '';
                if(selectedElements.length > 0) {
                    elementList = '.' + selectedElements.join(', .');
                    heroesList = heroList.filter(elementList);
                }
                if(selectedRoles.length > 0) {
                    roleList = '.' + selectedRoles.join(', .');
                    heroesList = heroList.filter(roleList);
                }
                if(selectedStars.length > 0) {
                    starList = '.' + selectedStars.join(', .');
                    heroesList = heroList.filter(starList);
                }

                jQuery('.hero-roster').addClass('hidden');
                heroesList.removeClass("hidden"); 
            }
            else {
                jQuery('.hero-roster').removeClass("hidden");
            }
        }
        else {
            element.classList.add("clicked");
            if (type=='s') {
                selectedStars.push(keyword);
            }
            else if (type=='e') {
                selectedElements.push(keyword);
            }
            else {
                selectedRoles.push(keyword);
            }

            var heroesList = jQuery('.hero-roster');
            var elementList = '';
            var starList = '';
            var roleList = '';
            if(selectedElements.length > 0) {
                elementList = '.' + selectedElements.join(', .');
                heroesList = heroList.filter(elementList);
            }
            if(selectedStars.length > 0) {
                starList = '.' + selectedStars.join(', .');
                heroesList = heroList.filter(starList);
            }
            if(selectedRoles.length > 0) {
                roleList = '.' + selectedRoles.join(', .');
                heroesList = heroList.filter(roleList);
            }

            jQuery('.hero-roster').addClass('hidden');
            heroesList.removeClass("hidden"); 
        }
    } 

    function filterEquipment(element, keyword, type) {
        if(element.classList.contains("clicked")) {
            element.classList.remove("clicked");
            if(type=='s') {
                selectedStars.splice(selectedStars.indexOf(keyword), 1);
            }
            else if (type=='e') {
                selectedElements.splice(selectedElements.indexOf(keyword), 1);
            }
            else {
                selectedRoles.splice(selectedRoles.indexOf(keyword), 1);
            }
            
            if((selectedElements.length + selectedRoles.length + selectedStars.length) > 0) 
            {
                var itemsList = jQuery('.item-card');
                var elementList = '';
                var roleList = '';
                var starList = '';
                if(selectedElements.length > 0) {
                    elementList = '.' + selectedElements.join(', .');
                    itemsList = heroList.filter(elementList);
                }
                if(selectedRoles.length > 0) {
                    roleList = '.' + selectedRoles.join(', .');
                    itemsList = heroList.filter(roleList);
                }
                if(selectedStars.length > 0) {
                    starList = '.' + selectedStars.join(', .');
                    itemsList = heroList.filter(starList);
                }

                jQuery('.item-card').addClass('hidden');
                itemsList.removeClass("hidden"); 
            }
            else {
                jQuery('.item-card').removeClass("hidden");
            }
        }
        else {
            element.classList.add("clicked");
            if (type=='s') {
                selectedStars.push(keyword);
            }
            else if (type=='e') {
                selectedElements.push(keyword);
            }
            else {
                selectedRoles.push(keyword);
            }

            var itemsList = jQuery('.item-card');
            var elementList = '';
            var starList = '';
            var roleList = '';
            if(selectedElements.length > 0) {
                elementList = '.' + selectedElements.join(', .');
                itemsList = heroList.filter(elementList);
            }
            if(selectedStars.length > 0) {
                starList = '.' + selectedStars.join(', .');
                itemsList = heroList.filter(starList);
            }
            if(selectedRoles.length > 0) {
                roleList = '.' + selectedRoles.join(', .');
                itemsList = heroList.filter(roleList);
            }

            jQuery('.item-card').addClass('hidden');
            itemsList.removeClass("hidden"); 
        }
    } 
</script>

<?php
get_footer();
?>