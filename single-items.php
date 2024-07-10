
<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package heavenhold
 */

$equipment_element = get_field('element');
$equipment_max_atk = get_field('max_atk');
$equipment_min_atk = get_field('min_atk');
$equipment_max_dps = get_field('dps');
$equipment_min_dps = get_field('min_dps');

$equipment_exclusive = get_field('exclusive');

$equipment_magazine = get_field('magazine');
$equipment_atk = get_field('atk');
$equipment_crit = get_field('crit_chance');
$equipment_dr = get_field('damage_reduction');
$equipment_min_def_flat = get_field('min_def_flat');
$equipment_def_flat = get_field('def_flat');
$equipment_def = get_field('def');
$equipment_heal_flat = get_field('heal_flat');
$equipment_heal = get_field('heal_percent');
$equipment_hp = get_field('hp');
$equipment_atk_on_kill = get_field('atk_on_kill');
$equipment_hp_on_kill = get_field('hp_on_kill');
$equipment_skill_regen_on_kill = get_field('skill_regen_on_kill');
$equipment_shield_on_start = get_field('shield_on_start');
$equipment_shield_on_kill = get_field('shield_on_kill');
$equipment_skill_damage = get_field('skill_damage');
$equipment_skill_regen_speed = get_field('skill_regen_speed');
$equipment_earth_type_atk = get_field('earth_type_atk');
$equipment_fire_type_atk = get_field('fire_type_atk');
$equipment_water_type_atk = get_field('water_type_atk');
$equipment_dark_type_atk = get_field('dark_type_atk');
$equipment_light_type_atk = get_field('light_type_atk');
$equipment_basic_type_atk = get_field('basic_type_atk');
$equipment_crit_hit_multiplier = get_field('crit_hit_multiplier');
$equipment_on_hit_damage = get_field('on_hit_damage');
$equipment_on_hit_damage_seconds = get_field('on_hit_damage_seconds');
$equipment_extra_damage_type = get_field('extra_damage_type');
$equipment_on_hit_heal_allies = get_field('on_hit_heal_allies');
$equipment_on_hit_heal_seconds = get_field('on_hit_heal_seconds');
$equipment_increase_damage_amount = get_field('increase_damage_amount');
$equipment_increase_damage_threshold = get_field('increase_damage_threshold');
$equipment_increase_damage_condition = get_field('increase_damage_condition');
$equipment_decrease_damage_taken_by_skill = get_field('decrease_damage_taken_by_skill');
$equipment_increase_damage_to_tanks = get_field('increase_damage_to_tanks');
$equipment_options = get_field('options');

$equipment_sub_atk = get_field('sub_atk');
$equipment_sub_crit = get_field('sub_crit_chance');
$equipment_sub_dr = get_field('sub_damage_reduction');
$equipment_sub_def_flat = get_field('sub_def_flat');
$equipment_sub_def = get_field('sub_def');
$equipment_sub_heal_flat = get_field('sub_heal_flat');
$equipment_sub_heal = get_field('sub_heal_percent');
$equipment_sub_hp = get_field('sub_hp');
$equipment_sub_atk_on_kill = get_field('sub_atk_on_kill');
$equipment_sub_hp_on_kill = get_field('sub_hp_on_kill');
$equipment_sub_skill_regen_on_kill = get_field('sub_skill_regen_on_kill');
$equipment_sub_shield_on_start = get_field('sub_shield_on_start');
$equipment_sub_shield_on_kill = get_field('sub_shield_on_kill');
$equipment_sub_skill_damage = get_field('sub_skill_damage');
$equipment_sub_skill_regen_speed = get_field('sub_skill_regen_speed');
$equipment_sub_earth_type_atk = get_field('sub_earth_type_atk');
$equipment_sub_fire_type_atk = get_field('sub_fire_type_atk');
$equipment_sub_water_type_atk = get_field('sub_water_type_atk');
$equipment_sub_dark_type_atk = get_field('sub_dark_type_atk');
$equipment_sub_light_type_atk = get_field('sub_light_type_atk');
$equipment_sub_basic_type_atk = get_field('sub_basic_type_atk');
$equipment_sub_options = get_field('sub_options');

$equipment_rarity = get_field('rarity');

$equipment_lb5 = get_field('lb5_option');
$equipment_lb5_value = get_field('lb5_value');
$equipment_skill_name = get_field('weapon_skill_name');
$equipment_skill_name = preg_replace('/Lv\.\d*/i', '<span class="skill-level">$0</span>', $equipment_skill_name);
$equipment_skill_atk = get_field('weapon_skill_atk');
$equipment_skill_regen_time = get_field('weapon_skill_regen_time');
$equipment_skill_description = get_field('weapon_skill_description');
$equipment_skill_description = str_replace("injured", '<span class="green">injured</span>', $equipment_skill_description);
$equipment_skill_description = str_replace("airborne", '<span class="cyan">airborne</span>', $equipment_skill_description);
$equipment_skill_description = str_replace("downed", '<span class="yellowgreen">downed</span>', $equipment_skill_description);
$equipment_skill_chain = get_field('weapon_skill_chain');

$unreleased = get_field('unreleased');
if($equipment_options) {
    $negated_options = preg_grep('/.*negated.*/', $equipment_options);
    $negated_sub_options = preg_grep('/.*negated.*/', $equipment_sub_options);
}

$equipment_max_lines = get_field('max_lines');
$equipment_max_level = get_field('max_level');
$equipment_type = get_the_terms($post->ID, 'item_categories');

$item_banners = get_field('equipment_banners');

$collections = get_field('collections');

$how_to_obtain = get_field('how_to_obtain');

get_header();
$opt = get_option('heavenhold_opt' );
$is_related = !empty($opt['is_related_posts']) ? $opt['is_related_posts'] : '';
$blog_column = is_active_sidebar( 'sidebar_widgets' ) ? '8' : '12';
$elementor_library = isset($_GET['elementor_library']) ? $_GET['elementor_library'] : '';
$is_single_post_date = isset ($opt['is_single_post_date']) ? $opt['is_single_post_date'] : '1';
?>

<section class="blog_area">
    <div class="container"> 
        <div class="row">
            <div class="col-lg-<?php echo esc_attr($blog_column) ?>">
                <div class="blog_single_info">
                    <div class="blog_single_item">
                        <?php
                        while ( have_posts() ) : the_post();
                        ?>
                        <?php
                            if($unreleased) {
                                echo '<div class="alert alert-warning" role="alert">This item has not yet been released in the Global version of the game.</div>';
                            }
                        ?> 
                            <div class="item-single <?php if(!$equipment_skill_name&&$equipment_type[0]->name!='Costume'&&$equipment_type[0]->name!='Equipment Costume'){echo 'half-width';}?> <?php if( $equipment_type[0]->name=='Costume' || $equipment_type[0]->name=='Equipment Costume'){echo 'costume-single';}?>">
                                <div class="item-stats">
                                <div class="item-single-picture <?php if($equipment_type[0]->name=='Costume'||$equipment_type[0]->name=='Equipment Costume'){echo 'half-width-image';}?>"><?php echo get_the_post_thumbnail($weapon->ID); ?>
                                        <?php if($equipment_type[0]->name=='Costume'||$equipment_type[0]->name=='Equipment Costume') : ?>
                                            <span class="costume-single-name"><?php echo get_the_title($weapon->ID); ?></span>
                                            <span class="costume-category-label"><?php if($equipment_type[0]->name=='Equipment Costume'){echo 'Equipment ';}elseif(get_field('super')){echo 'Super ';} ?>Costume</span>
                                        <?php endif; ?>
                                </div>
                                    <div class="item-main-text">
                                        <?php if($equipment_type[0]->name!='Costume'&&$equipment_type[0]->name!='Equipment Costume') : ?>
                                            <span class="weapon-stat weapon-chain-title bold">
                                                <?php echo get_the_title($weapon->ID); ?>
                                                <?php 
                                                if($equipment_max_level && $equipment_type[0]->name!='Card' && $equipment_type[0]->name!='Artifact') {
                                                    echo '<span class="skill-level">Lv.'.$equipment_max_level.'</span>';
                                                }
                                                ?>
                                            </span>
                                        <?php endif; ?>
                                        <?php if($equipment_type[0]->name=='Weapon') : ?>
                                            <span class="weapon-stat equipment-rarity"><?php echo $equipment_rarity.' '.get_field('weapon_type') ?></span>
                                            <span class="weapon-stat weapon-dps">
                                                <?php 
                                                if(($equipment_min_dps > 0) and ($equipment_min_dps < $equipment_max_dps)) {
                                                    echo $equipment_min_dps.'-'.$equipment_max_dps; 
                                                }
                                                else {
                                                    echo $equipment_max_dps; 
                                                }
                                                ?> <span class="dps-label">DPS</span></span><br>
                                        <?php elseif($equipment_type[0]->name=='Card'): ?>
                                        <?php elseif($equipment_type[0]->name=='Costume'): ?>
                                            <?php $costume_hero = get_field('hero')[0]; ?>
                                            <div class="applicable-heroes">Applicable Heroes</div>
                                            <a href="<?php echo get_the_permalink($costume_hero->ID); ?>"><div class="applicable-hero">
                                                <img class="applicable-hero-image" src="<?php echo get_the_post_thumbnail_url($costume_hero->ID, 'thumbnail'); ?>)">
                                                <div class="applicable-hero-info">
                                                    <span class="applicable-hero-name"><?php echo $costume_hero->post_title ?></span>
                                                </div>
                                            </div></a>
                                        <?php elseif($equipment_type[0]->name=='Equipment Costume'): ?>
                                            <?php $costume_weapon_type = get_field('costume_weapon_type'); ?>
                                            <div class="applicable-heroes">Applicable Equipment</div>
                                            <div class="applicable-hero">
                                                <?php getEquipment($costume_weapon_type); ?>
                                            </div>
                                        <?php else: ?>
                                            <span class="weapon-stat equipment-rarity"><?php echo $equipment_rarity.' '.$equipment_type[0]->name ?></span>
                                        <?php endif; ?>
                                    </div>
                                    <?php if($equipment_type[0]->name=='Weapon') : ?>
                                        <span class="weapon-stat weapon-atk"><span class="stat-label weapon-<?php echo get_field('element'); ?>"><?php echo get_field('element'); ?> Atk</span> 
                                            <?php 
                                                if(($equipment_min_atk > 0) and ($equipment_min_atk < $equipment_max_atk)) {
                                                    echo $equipment_min_atk.'-'.$equipment_max_atk; 
                                                }
                                                else {
                                                    echo $equipment_max_atk; 
                                                }
                                            ?></span>
                                    <?php endif; ?>
                                    <?php
                                    if ($equipment_atk>0) {
                                        echo '<span class="weapon-stat weapon-atk"><span class="stat-label label-offensive">Atk</span> +'.$equipment_atk.'%</span>';
                                    }  
                                    if ($equipment_magazine>0) {
                                        echo '<span class="weapon-stat weapon-magazine"><span class="stat-label label-offensive">Magazine Size</span> '.$equipment_magazine.'</span>';
                                    } 
                                    if ($equipment_heal_flat>0) {
                                        echo '<span class="weapon-stat weapon-heal-flat"><span class="stat-label label-offensive">Heal </span> '.$equipment_heal_flat.'</span>';
                                    } 
                                    if ($equipment_crit>0) {
                                        echo '<span class="weapon-stat weapon-crit"><span class="stat-label label-offensive">Crit Hit Chance</span> '.$equipment_crit.'%</span>';
                                    } 
                                    if ($equipment_def_flat>0) {
                                        echo '<span class="weapon-stat weapon-def-flat"><span class="stat-label label-offensive">Def</span> ';
                                        if(($equipment_min_def_flat > 0) and ($equipment_min_def_flat < $equipment_def_flat)) {
                                            echo $equipment_min_def_flat.'-'.$equipment_def_flat; 
                                        }
                                        else {
                                            echo $equipment_def_flat; 
                                        }
                                        echo '</span>';
                                    } 
                                    if ($equipment_dr>0) {
                                        echo '<span class="weapon-stat weapon-dr"><span class="stat-label">Damage Reduction</span> <span class="green">'.$equipment_dr.'</span></span>';
                                    }
                                    if ($equipment_atk_on_kill>0) {
                                        echo '<span class="weapon-stat weapon-atk-on-kill"><span class="green">+'.$equipment_atk_on_kill.'%</span> Atk increase on enemy kill</span>';
                                    } 
                                    if ($equipment_hp_on_kill>0) {
                                        echo '<span class="weapon-stat weapon-hp-on-kill"><span class="green">+'.$equipment_hp_on_kill.'%</span> HP recovery on enemy kill</span>';
                                    } 
                                    if ($equipment_shield_on_kill>0) {
                                        echo '<span class="weapon-stat weapon-shield-on-kill"><span class="green">+'.$equipment_shield_on_kill.'%</span> shield increase on enemy kill</span>';
                                    } 
                                    if ($equipment_shield_on_start>0) {
                                        echo '<span class="weapon-stat weapon-shield-on-start"><span class="green">+'.$equipment_shield_on_start.'%</span> shield increase on battle start</span>';
                                    }
                                    if ($equipment_def>0) {
                                        echo '<span class="weapon-stat weapon-def"><span class="stat-label label-defensive">Def</span> +'.$equipment_def.'%</span>';
                                    } 
                                    if ($equipment_hp>0) {
                                        echo '<span class="weapon-stat weapon-hp"><span class="stat-label label-defensive">HP</span> +'.$equipment_hp.'%</span>';
                                    }
                                    if ($equipment_heal>0) {
                                        echo '<span class="weapon-stat weapon-heal"><span class="stat-label label-defensive">Heal</span> +'.$equipment_heal.'%</span>';
                                    } 
                                    if ($equipment_skill_damage>0) {
                                        echo '<span class="weapon-stat weapon-skill-damage"><span class="stat-label label-defensive">Skill Damage</span> +'.$equipment_skill_damage.'%</span>';
                                    }  
                                    if ($equipment_skill_regen_speed>0) {
                                        echo '<span class="weapon-stat weapon-regen-speed"><span class="stat-label label-defensive">Weapon Skill Regen Speed</span> +'.$equipment_skill_regen_speed.'%</span>';
                                    } 
                                    if ($equipment_skill_regen_on_kill<0) {
                                        echo '<span class="weapon-stat weapon-regen-on-kill"><span class="green">'.$equipment_skill_regen_on_kill.'</span> seconds of weapon skill Regen time on enemy kill</span>';
                                    } 
                                    if ($equipment_earth_type_atk>0) {
                                        echo '<span class="weapon-stat weapon-def"><span class="stat-label label-defensive">Earth type Atk</span> +'.$equipment_earth_type_atk.'%</span>';
                                    } 
                                    if ($equipment_fire_type_atk>0) {
                                        echo '<span class="weapon-stat weapon-def"><span class="stat-label label-defensive">Fire type Atk</span> +'.$equipment_fire_type_atk.'%</span>';
                                    }
                                    if ($equipment_water_type_atk>0) {
                                        echo '<span class="weapon-stat weapon-def"><span class="stat-label label-defensive">Water type Atk</span> +'.$equipment_water_type_atk.'%</span>';
                                    }  
                                    if ($equipment_basic_type_atk>0) {
                                        echo '<span class="weapon-stat weapon-def"><span class="stat-label label-defensive">Basic type Atk</span> +'.$equipment_basic_type_atk.'%</span>';
                                    } 
                                    if ($equipment_light_type_atk>0) {
                                        echo '<span class="weapon-stat weapon-def"><span class="stat-label label-defensive">Light type Atk</span> +'.$equipment_light_type_atk.'%</span>';
                                    } 
                                    if ($equipment_dark_type_atk>0) {
                                        echo '<span class="weapon-stat weapon-def"><span class="stat-label label-defensive">Dark type Atk</span> +'.$equipment_dark_type_atk.'%</span>';
                                    } 
                                    if ($equipment_crit_hit_multiplier>0)
                                    {
                                        echo '<span class="weapon-stat weapon-def"><span class="stat-label label-offensive">Crit Hit Multiplier</span> +'.$equipment_crit_hit_multiplier.'%</span>';
                                    }
                                    if ($equipment_on_hit_damage>0)
                                    {
                                        if ($equipment_extra_damage_type)
                                        {
                                            echo '<span class="weapon-stat weapon-def">On hit, extra melee damage of <span class="green">'.$equipment_on_hit_damage.'%</span> of DPS once every '.$equipment_on_hit_damage_seconds.' second(s).</span>';
                                        }
                                        else
                                        {
                                            echo '<span class="weapon-stat weapon-def">On hit, extra ranged damage of <span class="green">'.$equipment_on_hit_damage.'%</span> of DPS once every '.$equipment_on_hit_damage_seconds.' second(s).</span>';
                                        }
                                    }
                                    if ($equipment_on_hit_heal_allies>0)
                                    {
                                        echo '<span class="weapon-stat weapon-def">On hit, heals all allies by <span class="green">'.$equipment_on_hit_heal_allies.'%</span> of Heal. Activates once every '.$equipment_on_hit_heal_seconds.' second(s).</span>';
                                    }
                                    if ($equipment_increase_damage_amount>0)
                                    {
                                        if ($equipment_increase_damage_condition)
                                        {
                                            echo '<span class="weapon-stat weapon-def">Increase damage by '.$equipment_increase_damage_amount.' to enemies with HP more than or equal to '.$equipment_increase_damage_threshold.'%.</span>';
                                        }
                                        else 
                                        {
                                            echo '<span class="weapon-stat weapon-def">Increase damage by '.$equipment_increase_damage_amount.' to enemies with HP less than or equal to '.$equipment_increase_damage_threshold.'%.</span>';
                                        }
                                    }
                                    if ($equipment_decrease_damage_taken_by_skill>0)
                                    {
                                        echo '<span class="weapon-stat weapon-def">Decrease damage taken by '.$equipment_decrease_damage_taken_by_skill.'% of increased Skill Damage.</span>';
                                    }
                                    if ($equipment_increase_damage_to_tanks>0)
                                    {
                                        echo '<span class="weapon-stat weapon-def">Increase damage to tanker Hero by <span class="green">'.$equipment_on_hit_heal_allies.'%</span>.</span>';
                                    }
                                    if ($negated_options) {
                                        foreach($negated_options as $negated) 
                                        {
                                            echo '<span class="weapon-stat weapon-def">'.$negated.'</span>';
                                        }
                                    }
                                    ?>
                                    <?php
                                    if($equipment_lb5)
                                    {
                                        echo '<br><span class="weapon-stat limit-break limit-break-header">[Required Limit Break 5]</span><span class="weapon-stat limit-break">';
                                        if($equipment_lb5=='Atk (%)'){
                                            echo '<span class="stat-label label-defensive">Atk</span> <span class="green">+'.$equipment_lb5_value.'%</span>';
                                        }
                                        else if($equipment_lb5=='HP (%)') {
                                            echo '<span class="stat-label label-defensive">HP</span> <span class="green">+'.$equipment_lb5_value.'%</span>';
                                        }
                                        else if($equipment_lb5=='Crit Hit Chance') {
                                            echo '<span class="stat-label label-defensive">Crit Hit Chance</span> <span class="green">+'.$equipment_lb5_value.'%</span>';
                                        }
                                        else if($equipment_lb5=='Damage Reduction') {
                                            echo '<span class="stat-label label-defensive">Damage Reduction</span> <span class="green">+'.$equipment_lb5_value.'</span>';
                                        }
                                        else if($equipment_lb5=='Def') {
                                            echo '<span class="stat-label label-defensive">Def</span> <span class="green">+'.$equipment_lb5_value.'%</span>';
                                        }
                                        else if($equipment_lb5=='Heal (Flat)') {
                                            echo '<span class="stat-label label-defensive">Heal</span> <span class="green">+'.$equipment_lb5_value.'</span>';
                                        }
                                        else if($equipment_lb5=='Heal (%)') {
                                            echo '<span class="stat-label label-defensive">Heal</span> <span class="green">+'.$equipment_lb5_value.'%</span>';
                                        }
                                        else if($equipment_lb5=='Atk increase on enemy kill') {
                                            echo '<span class="weapon-stat weapon-atk-on-kill"><span class="green">+'.$equipment_lb5_value.'%</span> Atk increase on enemy kill</span>';
                                        }
                                        else if($equipment_lb5=='HP recovery on enemy kill') {
                                            echo '<span class="weapon-stat weapon-hp-on-kill"><span class="green">+'.$equipment_lb5_value.'%</span> HP recovery on enemy kill</span>';
                                        }
                                        else if($equipment_lb5=='Seconds of weapon skill Regen time on enemy kill') {
                                            echo '<span class="weapon-stat weapon-regen-on-kill"><span class="green">'.$equipment_lb5_value.'</span> seconds of weapon skill Regen time on enemy kill</span>';
                                        }
                                        else if($equipment_lb5=='Shield increase on battle start') {
                                            echo '<span class="weapon-stat weapon-shield-on-start"><span class="green">+'.$equipment_lb5_value.'%</span> shield increase on battle start</span>';
                                        }
                                        else if($equipment_lb5=='Shield increase on enemy kill') {
                                            echo '<span class="weapon-stat weapon-shield-on-kill"><span class="green">+'.$equipment_lb5_value.'%</span> shield increase on enemy kill</span>';
                                        }
                                        else if($equipment_lb5=='Skill Damage') {
                                            echo '<span class="weapon-stat weapon-skill-damage"><span class="stat-label label-defensive">Skill Damage</span> +'.$equipment_lb5_value.'%</span>';
                                        }
                                        else if($equipment_lb5=='Weapon Skill Regen Speed') {
                                            echo '<span class="weapon-stat weapon-regen-speed"><span class="stat-label label-defensive">Weapon Skill Regen Speed</span> +'.$equipment_lb5_value.'%</span>';
                                        }
                                        echo '<br>';
                                    } 
                                    if ($equipment_exclusive): ?>
                                        <?php 
                                            $hero = get_field('hero')[0];
                                            $equipment_exclusive_effects = get_field('exclusive_effects');
                                            echo '<br><span class="exclusive"><span class="exclusive-header">[';
                                            echo $hero->post_title;
                                            echo ' only]</span><br>';
                                            echo $equipment_exclusive_effects;
                                        ?>
                                        </span>
                                        <br>
                                    <?php
                                    endif;
                                    if($equipment_sub_options) {
                                        if(sizeof($equipment_sub_options) > 0) {
                                            echo '<br><span class="weapon-stat limit-break limit-break-header sub-options-text">[Sub-Options] <span class="sub-options-max">(Max '.$equipment_max_lines.')</span></span>';
                                            if ($equipment_sub_atk>0) {
                                                echo '<span class="weapon-stat weapon-atk"><span class="stat-label label-offensive">Atk</span> +'.$equipment_sub_atk.'%</span>';
                                            }  
                                            if ($equipment_sub_heal_flat>0) {
                                                echo '<span class="weapon-stat weapon-heal-flat"><span class="stat-label label-offensive">Heal </span> '.$equipment_sub_heal_flat.'</span>';
                                            } 
                                            if ($equipment_sub_crit>0) {
                                                echo '<span class="weapon-stat weapon-crit"><span class="stat-label label-offensive">Crit Hit Chance</span> '.$equipment_sub_crit.'%</span>';
                                            } 
                                            if ($equipment_sub_def_flat>0) {
                                                echo '<span class="weapon-stat weapon-def-flat"><span class="stat-label label-offensive">Def</span> '.$equipment_sub_def_flat.'</span>';
                                            } 
                                            if ($equipment_sub_dr>0) {
                                                echo '<span class="weapon-stat weapon-dr"><span class="stat-label">Damage Reduction</span> <span class="green">'.$equipment_sub_dr.'</span></span>';
                                            }
                                            if ($equipment_sub_atk_on_kill>0) {
                                                echo '<span class="weapon-stat weapon-atk-on-kill"><span class="green">+'.$equipment_sub_atk_on_kill.'%</span> Atk increase on enemy kill</span>';
                                            } 
                                            if ($equipment_sub_hp_on_kill>0) {
                                                echo '<span class="weapon-stat weapon-hp-on-kill"><span class="green">+'.$equipment_sub_hp_on_kill.'%</span> HP recovery on enemy kill</span>';
                                            } 
                                            if ($equipment_sub_shield_on_kill>0) {
                                                echo '<span class="weapon-stat weapon-shield-on-kill"><span class="green">+'.$equipment_sub_shield_on_kill.'%</span> shield increase on enemy kill</span>';
                                            } 
                                            if ($equipment_sub_shield_on_start>0) {
                                                echo '<span class="weapon-stat weapon-shield-on-start"><span class="green">+'.$equipment_sub_shield_on_start.'%</span> shield increase on battle start</span>';
                                            }
                                            if ($equipment_sub_def>0) {
                                                echo '<span class="weapon-stat weapon-def"><span class="stat-label label-defensive">Def</span> +'.$equipment_sub_def.'%</span>';
                                            } 
                                            if ($equipment_sub_hp>0) {
                                                echo '<span class="weapon-stat weapon-hp"><span class="stat-label label-defensive">HP</span> +'.$equipment_sub_hp.'%</span>';
                                            }
                                            if ($equipment_sub_heal>0) {
                                                echo '<span class="weapon-stat weapon-heal"><span class="stat-label label-defensive">Heal</span> +'.$equipment_sub_heal.'%</span>';
                                            } 
                                            if ($equipment_sub_skill_damage>0) {
                                                echo '<span class="weapon-stat weapon-skill-damage"><span class="stat-label label-defensive">Skill Damage</span> +'.$equipment_sub_skill_damage.'%</span>';
                                            }  
                                            if ($equipment_sub_skill_regen_speed>0) {
                                                echo '<span class="weapon-stat weapon-regen-speed"><span class="stat-label label-defensive">Weapon Skill Regen Speed</span> +'.$equipment_sub_skill_regen_speed.'%</span>';
                                            } 
                                            if ($equipment_sub_skill_regen_on_kill<0) {
                                                echo '<span class="weapon-stat weapon-regen-on-kill"><span class="green">'.$equipment_sub_skill_regen_on_kill.'</span> seconds of weapon skill Regen time on enemy kill</span>';
                                            } 
                                            if ($equipment_sub_earth_type_atk>0) {
                                                echo '<span class="weapon-stat weapon-def"><span class="stat-label label-defensive">Earth type Atk</span> +'.$equipment_sub_earth_type_atk.'%</span>';
                                            } 
                                            if ($equipment_sub_fire_type_atk>0) {
                                                echo '<span class="weapon-stat weapon-def"><span class="stat-label label-defensive">Fire type Atk</span> +'.$equipment_sub_fire_type_atk.'%</span>';
                                            }
                                            if ($equipment_sub_water_type_atk>0) {
                                                echo '<span class="weapon-stat weapon-def"><span class="stat-label label-defensive">Water type Atk</span> +'.$equipment_sub_water_type_atk.'%</span>';
                                            }  
                                            if ($equipment_sub_basic_type_atk>0) {
                                                echo '<span class="weapon-stat weapon-def"><span class="stat-label label-defensive">Basic type Atk</span> +'.$equipment_sub_basic_type_atk.'%</span>';
                                            } 
                                            if ($equipment_sub_light_type_atk>0) {
                                                echo '<span class="weapon-stat weapon-def"><span class="stat-label label-defensive">Light type Atk</span> +'.$equipment_sub_light_type_atk.'%</span>';
                                            } 
                                            if ($equipment_sub_dark_type_atk>0) {
                                                echo '<span class="weapon-stat weapon-def"><span class="stat-label label-defensive">Dark type Atk</span> +'.$equipment_sub_dark_type_atk.'%</span>';
                                            } 
                                            if($negated_sub_options) {
                                                foreach($negated_sub_options as $negated) 
                                                {
                                                    echo '<span class="weapon-stat weapon-def">'.$negated.'</span>';
                                                }
                                            }
                                        }
                                    }
                                    ?>
                                </div>
                                <?php if($equipment_skill_name): ?>
                                <div class="weapon-skill">
                                    <div class="weapon-skill-chain-info">
                                        <?php getChainIcon($equipment_skill_chain) ?><br>
                                        <span class="weapon-chain-title"><?php echo $equipment_skill_name ?></span><br><br>
                                        <span class="weapon-chain-atk">Atk: <span class="green"><?php echo $equipment_skill_atk ?>%</span> DPS</span><br>
                                        <span class="weapon-chain-regen">Regen time: <?php echo $equipment_skill_regen_time ?> seconds</span><br><br>
                                        <span class="weapon-chain-description"><?php echo $equipment_skill_description ?></span>
                                    </div>
                                </div>
                                <?php endif; ?>
                            </div>
                            <?php if($how_to_obtain){
                                echo '<div class="section-box"><h4>How to Obtain<span class="fa fa-plus"></h4><div class="section-content">';
                                foreach($how_to_obtain as $source) {
                                    if ($source == 'Mileage Shop') {
                                        $mileage_shop_cost = get_field('mileage_shop_cost');
                                        echo "<div class='item-location'><span class='item-location-name'>Mileage Shop</span><img class='item-location-image' src=".get_template_directory_uri()."/assets/img/icons/mileage.png'><span class='item-location-detail currency'>".number_format($mileage_shop_cost,0,'.',',').'</span></div>';
                                    }
                                    else if ($source == 'Epic Exclusive Equipment Box') {
                                        echo "<div class='item-location'><span class='item-location-name'>Epic Exclusive Equipment Boxes</span><img class='item-location-image' src=".get_template_directory_uri()."/assets/img/icons/epic-box.png'><span class='item-location-detail'></span></div>";
                                    }
                                    else if ($source == 'Legend Exclusive Equipment Box') {
                                        echo "<div class='item-location'><span class='item-location-name'>Legend Exclusive Equipment Boxes</span><img class='item-location-image' src=".get_template_directory_uri()."/assets/img/icons/legend-box.png'><span class='item-location-detail'></span></div>";
                                    }
                                    else if ($source == 'Battle Medal Shop') {
                                        $battle_medal_shop_cost = get_field('battle_medal_shop_cost');
                                        echo "<div class='item-location'><span class='item-location-name'>Battle Medal Shop</span><img class='item-location-image' src=".get_template_directory_uri()."/assets/img/icons/medals.png'><span class='item-location-detail currency'>".number_format($battle_medal_shop_cost,0,'.',',').'</span></div>';
                                    }
                                    else if ($source == 'Equipment Shop') {
                                        $equipment_shop_cost = get_field('equipment_shop_cost');
                                        echo "<div class='item-location'><span class='item-location-name'>Equipment Shop</span><img class='item-location-image' src=".get_template_directory_uri()."/assets/img/icons/gold.png'><span class='item-location-detail currency'>".number_format($equipment_shop_cost,0,'.',',').'</span></div>';
                                    }
                                    else if ($source == 'Costume Shop') {
                                        $cost = get_field('cost');
                                        echo "<div class='item-location'><span class='item-location-name'>Costume Shop</span><img class='item-location-image' src=".get_template_directory_uri()."/assets/img/icons/gems.png'><span class='item-location-detail currency'>".number_format($cost,0,'.',',').'</span></div>';
                                    }
                                    else if ($source == 'Mirror Shard Shop') { 
                                        $mirror_shard_cost = get_field('mirror_shard_cost');
                                        echo "<div class='item-location'><span class='item-location-name'>Mirror Shard Shop</span><img class='item-location-image' src=".get_template_directory_uri()."/assets/img/icons/mirror-shards.png'><span class='item-location-detail currency'>".number_format($mirror_shard_cost,0,'.',',').'</span></div>';
                                    }
                                    else if ($source == 'Stage Reward') {
                                        $stage = get_field("stage_location")[0];
                                        $world = get_field("world", $stage->ID)[0];
                                        $world_number = get_field("world_number", $world->ID);
                                        $stage_number = get_field("stage_number", $stage->ID);
                                        echo "<a href='".get_the_permalink($stage->ID)."'><div class='item-location'><span class='item-location-name'>Stage Reward</span><img class='item-location-image' src=".get_template_directory_uri()."/assets/img/icons/stage.png'><span class='item-location-detail'>".$world_number."-".$stage_number." ".$stage->post_title."</span></div></a>";
                                    }
                                    else if ($source == 'Quest Reward') {
                                        $quest = get_field("quest_completed")[0];
                                        echo "<a href='".get_the_permalink($quest->ID)."'><div class='item-location'><span class='item-location-name'>Quest Reward</span><i class='fa fa-bookmark item-location-icon'></i><span class='item-location-detail'>".$quest->post_title."</span></div></a>";
                                    }
                                    else if ($source == 'World Completion') {
                                        $world_completed = get_field("world_completed")[0];
                                        $world_number = get_field("world_number", $world_completed->ID);
                                        echo "<a href='".get_the_permalink($world_completed->ID)."'><div class='item-location'><span class='item-location-name'>100% Completion</span><img class='item-location-image' src=".get_template_directory_uri()."/assets/img/icons/equipment/achievement.png'><span class='item-location-detail'>".$world_completed->post_title."</span></div></a>";
                                    }
                                    else if($source == 'Gacha') {
                                        echo "<div class='item-location'><span class='item-location-name'>Equipment Summon</span><img class='item-location-image' src=".get_template_directory_uri()."/assets/img/icons/summon.png'><span class='item-location-detail'></span></div>";
                                    }
                                    else if($source == 'Random Stage Reward') {
                                        echo "<div class='item-location'><span class='item-location-name'>Random Stage Reward</span><img class='item-location-image' src=".get_template_directory_uri()."/assets/img/icons/random-reward.png'><span class='item-location-detail'></span></div>";
                                    }
                                    else if($source == 'Random Evolution') {
                                        echo "<div class='item-location'><span class='item-location-name'>Random Evolution</span><img class='item-location-image' src=".get_template_directory_uri()."/assets/img/icons/random-evolution.png'><span class='item-location-detail'></span></div>";
                                    }
                                    else if ($source == 'Merch Forge') {
                                        echo "<div class='item-location'><span class='item-location-name'>Merch Forge</span><img class='item-location-image' src=".get_template_directory_uri()."/assets/img/icons/equipment/merch-forge.png'><span class='item-location-detail'></span></div>";
                                    }
                                    else if ($source == 'Super Costume Shop') {
                                        $mystic_thread_cost = get_field('mystic_thread_cost');
                                        echo "<div class='item-location'><span class='item-location-name'>Super Costume Shop</span><img class='item-location-image' src=".get_template_directory_uri()."/assets/img/icons/equipment/mystic-thread.png'><span class='item-location-detail currency'>".number_format($mystic_thread_cost,0,'.',',').'</span></div>';
                                    }
                                    else if ($source == 'Achievement') {
                                        $achievement = get_field('achievement');
                                        echo "<div class='item-location'><span class='item-location-name'>Achievement</span><i class='fa fa-trophy item-location-icon'></i><span class='item-location-detail achievement'>".$achievement.'</span></div>';
                                    }
                                    else if ($source == 'Bottle Cap Shop') {
                                        $bottle_cap_cost = get_field('bottle_cap_cost');
                                        echo "<div class='item-location'><span class='item-location-name'>Bottle Cap Shop</span><img class='item-location-image' src=".get_template_directory_uri()."/assets/img/icons/equipment/bottlecaps.png'><span class='item-location-detail currency'>".number_format($bottle_cap_cost,0,'.',',').'</span></div>';
                                    }
                                }
                                echo "</div></div>";
                            }
                            ?>
                            <?php if($collections) {
                                echo '<div class="section-box"><h4>Collections<span class="fa fa-plus"></h4><div class="section-content">';
                                foreach($collections as $collection) {
                                $items = get_field('items', $collection);
                                $reward_stat = get_field('reward_stat', $collection);
                                $reward_value = get_field('reward_value', $collection);
                                $item_level = get_field('item_level', $collection);
                                $collection_type = get_the_terms($collection, 'collection_categories');
                                ?>
                                <div class="item-collection Collection-<?php echo $collection_type[0]->name; ?> Reward-<?php echo $reward_stat ?>">
                                    <div class="collection-info-bar">
                                        <span class="collection-name"><a class="collection-name-link" href="/collections"><?php echo get_the_title($collection); ?></a></span>
                                        <div class="collection-reward"><?php echo $reward_stat; ?> <span class="collection-reward-value">+<?php echo $reward_value; ?>%</span></div>
                                    </div>
                                    <div class="collection-items">
                                        <?php
                                        foreach($items as $item) {
                                            echo '<a href="'.get_the_permalink($item).'"><img src="'.get_the_post_thumbnail_url($item, 'thumbnail').'"><span class="collection-item-name">'.get_the_title($item).'</span></a>';
                                        }
                                        ?>
                                    </div>
                                </div>
                                <?php 
                                }
                                ?>
                                </div>
                            </div>
                            <?php
                            }
                            ?>
                            <?php if($item_banners) : ?>
                            <div class="section-box">
                            <h4>Banner History<span class="fa fa-plus"></h4>
                            <div class="section-content">
                            <?php $ordered_banners = array_column($item_banners, ID);
                            rsort($ordered_banners); ?>
                            <table class="hero-abilities-table">
                                <?php 
                                foreach ($ordered_banners as $banner) {
                                    $start_date = get_field('date_start', $banner);
                                    $end_date = get_field('date_end', $banner);
                                    $today = date('m/d/Y');
                                    $current = '';
                                    if (($today >= $start_date) && ($today <= $end_date)){
                                        $current = 'current-banner';
                                    }
                                    echo '<tr class="'.$current.'"><th class="ability-header" style="background-image:url('.get_the_post_thumbnail_url($banner,'thumbnail').'); background-size: cover;background-repeat: no-repeat;width: 70px; height: 70px;"></th><td class="banner-name"><a class="bold" href="'.get_permalink($banner).'">'.get_the_title($banner).'</a></td>';
                                    if($current=='current-banner'){
                                        echo '<td class="banner-date"><span style="font-weight: 900;font-size: 14px;">Current Banner</span><span style="display:block;font-size: 10px;line-height: 10px;padding-top: 3px;">'.$start_date.' ~ '.$end_date.'</span></td></tr>';
                                    }
                                    else {
                                        echo '<td class="banner-date">'.$start_date.' ~ '.$end_date.'</td></tr>';
                                    }
                                }
                                ?>
                            </table>
                            </div>
                            </div>
                        <?php endif; ?>
                        <?php 
                        endwhile;
                        ?>
                    </div>
                    
                    <script>

                    </script>

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
            <div class="col-lg-4">
            <?php getDiscordSidebar(); ?>
                <?php dynamic_sidebar( 'forum_archive_sidebar' ); ?>
                <?php dynamic_sidebar( 'sidebar_widgets' ); ?>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();