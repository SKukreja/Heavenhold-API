<?php
/**
 * The template for displaying all single posts
 *
 *
 * @package heavenhold
 */

get_header();
$opt = get_option('heavenhold_opt' );
$is_related = !empty($opt['is_related_posts']) ? $opt['is_related_posts'] : '';

$elementor_library = isset($_GET['elementor_library']) ? $_GET['elementor_library'] : '';
$is_single_post_date = isset ($opt['is_single_post_date']) ? $opt['is_single_post_date'] : '1';

$hero_name = get_the_title();

$variations = get_field('variations');

//Bio Fields
$fullname = get_field('bio_fields_name');
$height = get_field('bio_fields_height');
$role = get_field('bio_fields_role');
$age = get_field('bio_fields_age');
$weight = get_field('bio_fields_weight');
$species = get_field('bio_fields_species');
$element = get_field('bio_fields_element');
$story = get_field('bio_fields_story');

$compatible_equipment = get_field('bio_fields_compatible_equipment');
$exclusive = get_field('bio_fields_exclusive_weapon');
$hero_max_level = get_field('bio_fields_max_level');
if(get_field('bio_fields_na_release_date')) {
    $global_release_date = date('F j, Y',strtotime(get_field('bio_fields_na_release_date')));
}
if(get_field('bio_fields_kr_release_date')) {
    $kr_release_date = date('F j, Y',strtotime(get_field('bio_fields_kr_release_date')));
}
if(get_field('bio_fields_jp_release_date')) {
    $jp_release_date = date('F j, Y',strtotime(get_field('bio_fields_jp_release_date')));
}

//Bio Fields Variation 2
$fullname2 = get_field('bio_fields_2_name');
$height2 = get_field('bio_fields_2_height');
$age2 = get_field('bio_fields_2_age');
$weight2 = get_field('bio_fields_2_weight');
$story2 = get_field('bio_fields_2_story');

//Evolution Fields
$evo1 = get_field('evolution_fields_evolution_1');
$evo2 = get_field('evolution_fields_evolution_2');
$evo3 = get_field('evolution_fields_evolution_3');
$evo4 = get_field('evolution_fields_evolution_4');
$evo5 = get_field('evolution_fields_evolution_5');

//Evolution Fields Variation 2
$evo21 = get_field('evolution_fields_2_evolution_1');
$evo22 = get_field('evolution_fields_2_evolution_2');
$evo23 = get_field('evolution_fields_2_evolution_3');
$evo24 = get_field('evolution_fields_2_evolution_4');
$evo25 = get_field('evolution_fields_2_evolution_5');
 
//Stat Fields
$atk = get_field('stat_fields_atk');
$hp = get_field('stat_fields_hp');
$def = get_field('stat_fields_def');
$crit = get_field('stat_fields_crit');
$dr = get_field('stat_fields_damage_reduction');
$heal = get_field('stat_fields_heal');
$basic_resistance = get_field('stat_fields_basic_resistance'); 
$light_resistance = get_field('stat_fields_light_resistance'); 
$dark_resistance = get_field('stat_fields_dark_resistance');
$fire_resistance = get_field('stat_fields_fire_resistance');
$water_resistance = get_field('stat_fields_water_resistance');
$earth_resistance = get_field('stat_fields_earth_resistance');

//Awakening Fields
$la1 = get_field('one_star_awakening_fields_low_grade_atk_1');
$ma1 = get_field('one_star_awakening_fields_mid_grade_atk_1');
$ha1 = get_field('one_star_awakening_fields_high_grade_atk_1');
$ld1 = get_field('one_star_awakening_fields_low_grade_def_1');
$md1 = get_field('one_star_awakening_fields_mid_grade_def_1');
$hd1 = get_field('one_star_awakening_fields_high_grade_def_1'); 
$lh1 = get_field('one_star_awakening_fields_low_grade_hp_1');
$mh1 = get_field('one_star_awakening_fields_mid_grade_hp_1');
$hh1 = get_field('one_star_awakening_fields_high_grade_hp_1');
$ldr1 = get_field('one_star_awakening_fields_low_grade_dream_1');
$mdr1 = get_field('one_star_awakening_fields_mid_grade_dream_1');
$hdr1 = get_field('one_star_awakening_fields_high_grade_dream_1');
$law1 = get_field('one_star_awakening_fields_legendary_awakening_1');
$la2 = get_field('two_star_awakening_fields_low_grade_atk_2');
$ma2 = get_field('two_star_awakening_fields_mid_grade_atk_2');
$ha2 = get_field('two_star_awakening_fields_high_grade_atk_2');
$ld2 = get_field('two_star_awakening_fields_low_grade_def_2');
$md2 = get_field('two_star_awakening_fields_mid_grade_def_2');
$hd2 = get_field('two_star_awakening_fields_high_grade_def_2');
$lh2 = get_field('two_star_awakening_fields_low_grade_hp_2');
$mh2 = get_field('two_star_awakening_fields_mid_grade_hp_2');
$hh2 = get_field('two_star_awakening_fields_high_grade_hp_2');
$ldr2 = get_field('two_star_awakening_fields_low_grade_dream_2');
$mdr2 = get_field('two_star_awakening_fields_mid_grade_dream_2');
$hdr2 = get_field('two_star_awakening_fields_high_grade_dream_2');
$law2 = get_field('two_star_awakening_fields_legendary_awakening_2');
$la3 = get_field('three_star_awakening_fields_low_grade_atk_3');
$ma3 = get_field('three_star_awakening_fields_mid_grade_atk_3');
$ha3 = get_field('three_star_awakening_fields_high_grade_atk_3');
$ld3 = get_field('three_star_awakening_fields_low_grade_def_3');
$md3 = get_field('three_star_awakening_fields_mid_grade_def_3');
$hd3 = get_field('three_star_awakening_fields_high_grade_def_3');
$lh3 = get_field('three_star_awakening_fields_low_grade_hp_3');
$mh3 = get_field('three_star_awakening_fields_mid_grade_hp_3');
$hh3 = get_field('three_star_awakening_fields_high_grade_hp_3');
$ldr3 = get_field('three_star_awakening_fields_low_grade_dream_3');
$mdr3 = get_field('three_star_awakening_fields_mid_grade_dream_3');
$hdr3 = get_field('three_star_awakening_fields_high_grade_dream_3');
$law3 = get_field('three_star_awakening_fields_legendary_awakening_3');
$la4 = get_field('four_star_awakening_fields_low_grade_atk_4');
$ma4 = get_field('four_star_awakening_fields_mid_grade_atk_4');
$ha4 = get_field('four_star_awakening_fields_high_grade_atk_4');
$ld4 = get_field('four_star_awakening_fields_low_grade_def_4');
$md4 = get_field('four_star_awakening_fields_mid_grade_def_4');
$hd4 = get_field('four_star_awakening_fields_high_grade_def_4');
$lh4 = get_field('four_star_awakening_fields_low_grade_hp_4');
$mh4 = get_field('four_star_awakening_fields_mid_grade_hp_4');
$hh4 = get_field('four_star_awakening_fields_high_grade_hp_4');
$ldr4 = get_field('four_star_awakening_fields_low_grade_dream_4');
$mdr4 = get_field('four_star_awakening_fields_mid_grade_dream_4');
$hdr4 = get_field('four_star_awakening_fields_high_grade_dream_4');
$law4 = get_field('four_star_awakening_fields_legendary_awakening_4');
$la5 = get_field('five_star_awakening_fields_low_grade_atk_5');
$ma5 = get_field('five_star_awakening_fields_mid_grade_atk_5');
$ha5 = get_field('five_star_awakening_fields_high_grade_atk_5');
$ld5 = get_field('five_star_awakening_fields_low_grade_def_5');
$md5 = get_field('five_star_awakening_fields_mid_grade_def_5');
$hd5 = get_field('five_star_awakening_fields_high_grade_def_5');
$lh5 = get_field('five_star_awakening_fields_low_grade_hp_5');
$mh5 = get_field('five_star_awakening_fields_mid_grade_hp_5');
$hh5 = get_field('five_star_awakening_fields_high_grade_hp_5');
$ldr5 = get_field('five_star_awakening_fields_low_grade_dream_5');
$mdr5 = get_field('five_star_awakening_fields_mid_grade_dream_5');
$hdr5 = get_field('five_star_awakening_fields_high_grade_dream_5');
$law5 = get_field('five_star_awakening_fields_legendary_awakening_5');
$lamlb = get_field('mlb_awakening_fields_low_grade_atk_mlb');
$mamlb = get_field('mlb_awakening_fields_mid_grade_atk_mlb');
$hamlb = get_field('mlb_awakening_fields_high_grade_atk_mlb');
$ldmlb = get_field('mlb_awakening_fields_low_grade_def_mlb');
$mdmlb = get_field('mlb_awakening_fields_mid_grade_def_mlb');
$hdmlb = get_field('mlb_awakening_fields_high_grade_def_mlb');
$lhmlb = get_field('mlb_awakening_fields_low_grade_hp_mlb');
$mhmlb = get_field('mlb_awakening_fields_mid_grade_hp_mlb');
$hhmlb = get_field('mlb_awakening_fields_high_grade_hp_mlb');
$ldrmlb = get_field('mlb_awakening_fields_low_grade_dream_mlb');
$mdrmlb = get_field('mlb_awakening_fields_mid_grade_dream_mlb');
$hdrmlb = get_field('mlb_awakening_fields_high_grade_dream_mlb');
$lawmlb = get_field('mlb_awakening_fields_legendary_awakening_mlb');
$gold1 = get_field('one_star_awakening_fields_gold');
$gold2 = get_field('two_star_awakening_fields_gold');
$gold3 = get_field('three_star_awakening_fields_gold');
$gold4 = get_field('four_star_awakening_fields_gold');
$gold5 = get_field('five_star_awakening_fields_gold');
$goldmlb = get_field('mlb_awakening_fields_gold');


//Evaluation Fields
$rating = get_field('evaluation_fields_rating');
$colo_rating = get_field('evaluation_fields_colo_rating');
$arena_rating = get_field('evaluation_fields_arena_rating');
$coop_rating = get_field('evaluation_fields_coop_rating');
$story_rating = get_field('evaluation_fields_story_rating');
$raid_rating = get_field('evaluation_fields_raid_rating');
$kamazone_rating = get_field('evaluation_fields_kamazone_rating');
$orbital_rating = get_field('evaluation_fields_orbital_rating');
$tower_rating = get_field('evaluation_fields_tower_rating');
$proList = get_field('evaluation_fields_pros');
$pros = preg_split('/<br[^>]*>/i', $proList);
$conList = get_field('evaluation_fields_cons');
$cons = preg_split('/<br[^>]*>/i', $conList);

//Ability Fields
$natk_name = get_field('ability_fields_normal_atk_name');
$natk_desc = get_field('ability_fields_normal_atk_description');
$cskill_name = get_field('ability_fields_chain_skill_name');
$cskill_desc = get_field('ability_fields_chain_skill_description');
$cskill_trigger = get_field('ability_fields_chain_state_trigger');
$cskill_result = get_field('ability_fields_chain_state_result');
$sability_name = get_field('ability_fields_special_ability_name');
$sability_desc = get_field('ability_fields_special_ability_description');
$passives = get_field('ability_fields_passives');
$passives = str_replace("[Party]", '<span class="bold">[Party]</span>', $passives);
$passives = preg_replace('/\+.*%/i', '<span class="green">$0</span>', $passives);

$hero_banners = get_field('hero_banner');

//Analysis Fields
$good_matchups = get_field('arena_good_matchups');
$bad_matchups = get_field('arena_bad_matchups');

function get_rating_letter($rating_number) {
   
    if($rating_number >= 9.0) {
        return 'S';
    }
    else if ($rating_number >= 8.0) {
        return 'A';
    }
    else if ($rating_number >= 7.0) {
        return 'B';
    }
    else if ($rating_number >= 6.0) {
        return 'C';
    }
    else if ($rating_number >= 1.0) {
        return 'D';    
    }
    return '';
}

/*
//Build Hero Usage Data
$krCurrentArenaMeta = array();
$krOldArenaMeta = array();
$naCurrentArenaMeta = array();
$naOldArenaMeta = array();
$krCurrentColoMeta = array();
$krOldColoMeta = array();
$naCurrentColoMeta = array();
$naOldColoMeta = array();

$args = array(
    'post_type'     => 'reports',
    'numberposts'   => 8,
    'orderby' => 'date',
    'order'   => 'DESC'
);
$query = new WP_Query( $args );

// Loop
if( $query->have_posts() ) :
    $counter = 0;
    while( $query->have_posts() ) : $query->the_post();
        if($counter < 2) {
            $terms = get_the_terms(get_the_ID(), 'report_categories' );
            foreach ( $terms as $term ) {
                if($term->name == 'Arena') {
                    while(have_rows('hero_usage')) {
                        the_row(); 
                        $krCurrentArenaMeta[get_sub_field('hero')] = (int) get_sub_field('usage');
                    }
                }
                else if($term->name == 'Colosseum') {
                    while(have_rows('hero_usage')) {
                        the_row(); 
                        $krCurrentColoMeta[get_sub_field('hero')] = (int) get_sub_field('usage');
                    }
                }
            }
        }
        else if($counter < 4) {
            $terms = get_the_terms(get_the_ID(), 'report_categories' );
            foreach ( $terms as $term ) {
                if($term->name == 'Arena') {
                    while(have_rows('hero_usage')) {
                        the_row(); 
                        $krOldArenaMeta[get_sub_field('hero')] = (int) get_sub_field('usage');
                    }
                }
                else if($term->name == 'Colosseum') {
                    while(have_rows('hero_usage')) {
                        the_row(); 
                        $krOldColoMeta[get_sub_field('hero')] = (int) get_sub_field('usage');
                    }
                }
            }
        }
        else if($counter < 6) {
            $terms = get_the_terms(get_the_ID(), 'report_categories' );
            foreach ( $terms as $term ) {
                if($term->name == 'Arena') {
                    while(have_rows('hero_usage')) {
                        the_row(); 
                        $naCurrentArenaMeta[get_sub_field('hero')] = (int) get_sub_field('usage');
                    }
                }
                else if($term->name == 'Colosseum') {
                    while(have_rows('hero_usage')) {
                        the_row(); 
                        $naCurrentColoMeta[get_sub_field('hero')] = (int) get_sub_field('usage');
                    }
                }
            }
        }
        else if($counter < 8) {
            $terms = get_the_terms(get_the_ID(), 'report_categories' );
            foreach ( $terms as $term ) {
                if($term->name == 'Arena') {
                    while(have_rows('hero_usage')) {
                        the_row(); 
                        $naOldArenaMeta[get_sub_field('hero')] = (int) get_sub_field('usage');
                    }
                }
                else if($term->name == 'Colosseum') {
                    while(have_rows('hero_usage')) {
                        the_row(); 
                        $naOldColoMeta[get_sub_field('hero')] = (int) get_sub_field('usage');
                    }
                }
            }
        }
        $counter = $counter + 1;
    endwhile;
endif;
wp_reset_postdata();
*/
?>
<link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/assets/css/owl.carousel.min.css">
<section class="blog_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                        <?php
                        while ( have_posts() ) : the_post();
                            the_content();
                        ?>
                        <?php
                            if($kr_release_date && !$global_release_date) {
                                echo '<div class="alert alert-warning" role="alert">This hero has not yet been released in the Global version of the game.</div>';
                            }
                        ?>
                        <div class="hero-box hb-mobile">
                        <?php if($variations > 1) : ?> 
                            <div class="variation-buttons">
                                <span class="variation-button" data-variation="variation-1"><?php echo $fullname; ?></span>
                                <span class="variation-button" data-variation="variation-2"><?php echo $fullname2; ?></span>
                            </div> 
                        <?php endif; ?>
                        
                        <img class="hero-portrait" src>  
                        <span class="variation-section variation-1">
                            <div class="portrait-buttons">
                                <?php while( have_rows('portrait') ) : the_row(); ?>
                                    <?php
                                        $portrait = get_sub_field('art');
                                        $portrait_title = get_sub_field('title');
                                    ?>
                                    <span class="portrait-button" data-image="<?php echo $portrait; ?>"><?php echo $portrait_title; ?></span>
                                <?php endwhile; ?>    
                            </div>
                        </span> 
                        <?php if($variations > 1) : ?>
                            <span class="variation-section variation-2">
                                <div class="portrait-buttons">
                                    <?php while( have_rows('portrait_2') ) : the_row(); ?>
                                        <?php
                                            $portrait = get_sub_field('art');
                                            $portrait_title = get_sub_field('title');
                                        ?> 
                                        <span class="portrait-button" data-image="<?php echo $portrait; ?>"><?php echo $portrait_title; ?></span>
                                    <?php endwhile; ?>
                                </div>
                            </span>
                        <?php endif; ?>
                        <table class="hero-box-table">
                            <tr>
                                <td class="hero-box-left">Name</td>
                                <td class="hero-box-right">
                                    <span class="variation-section variation-1"><?php echo $fullname ?></span>
                                    <?php if($variations > 1) : ?>
                                        <span class="variation-section variation-2"><?php echo $fullname2 ?></span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="hero-box-left">Released</td><td class="hero-box-right">
                                <?php 
                                if($kr_release_date==$global_release_date) {
                                    echo $kr_release_date.' (GL/KR)';
                                }
                                else 
                                {
                                    if($kr_release_date) {
                                        echo $kr_release_date.' (Korea)';
                                    }
                                    if($global_release_date) {
                                        if($kr_release_date) {
                                            echo '<br>';
                                        }
                                        echo $global_release_date.' (Global)';
                                    }                                    
                                }
                                if($jp_release_date) {
                                    if($kr_release_date || $global_release_date) {
                                        echo '<br>';
                                    }
                                    echo $jp_release_date.' (Japan)';
                                }
                                ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="hero-box-left">Age</td>
                                <td class="hero-box-right">
                                    <span class="variation-section variation-1"><?php echo $age ?></span>
                                    <?php if($variations > 1) : ?>
                                        <span class="variation-section variation-2"><?php echo $age2 ?></span>
                                    <?php endif; ?> 
                                </td>
                            </tr>
                            <tr>
                                <td class="hero-box-left">Height</td>
                                <td class="hero-box-right">
                                    <span class="variation-section variation-1"><?php echo $height ?></span>
                                    <?php if($variations > 1) : ?>
                                        <span class="variation-section variation-2"><?php echo $height2 ?></span>
                                    <?php endif; ?> 
                                </td>
                            </tr>
                            <?php if(get_field('bio_fields_weight')) : ?> 
                                <tr>
                                    <td class="hero-box-left">Weight</td>
                                    <td class="hero-box-right">
                                        <span class="variation-section variation-1"><?php echo $weight ?></span>
                                        <?php if($variations > 1) : ?>
                                            <span class="variation-section variation-2"><?php echo $weight2 ?></span>
                                        <?php endif; ?> 
                                    </td>
                                </tr>
                            <?php endif; ?>
                            <tr><td class="hero-box-left">Species</td><td class="hero-box-right"><?php echo $species ?></td></tr>
                            <tr><td class="hero-box-left">Element</td><td class="hero-box-right"><?php echo getElement($element) ?></td></tr>
                            <tr><td class="hero-box-left">Role</td><td class="hero-box-right"><?php echo getRole($role) ?></td></tr>
                            <tr><td class="hero-box-left">Equipment</td><td class="hero-box-right">
                                <?php 
                                foreach ($compatible_equipment as $type) {
                                    getEquipment($type);
                                    echo '<br>';
                                } 
                                ?></td></tr>
                        </table>
                        </div>
                        <div class="hero-section-buttons">
                            <div class="hero-section-button" id="show-book">Book</div>
                            <div class="hero-section-button" id="show-analysis">Analysis</div>
                            <div class="hero-section-button" id="show-build">Build</div>
                        </div>
                        <script>
                            jQuery(function($) {
                                const urlParams = new URLSearchParams(window.location.search);
                                const passedTab = urlParams.get('section');

                                if(passedTab == "book") {
                                    $(".analysis-section").hide();
                                    $(".build-section").hide();
                                    $(".book-section").show();
                                    $('#show-book').addClass('selected');
                                }
                                else if (passedTab == "analysis") {
                                    $(".build-section").hide();
                                    $(".book-section").hide();
                                    $(".analysis-section").show();
                                    $('#show-analysis').addClass('selected');
                                }
                                else if (passedTab == "build") {
                                    $(".analysis-section").hide();
                                    $(".book-section").hide();
                                    $(".build-section").show();
                                    $('#show-build').addClass('selected');
                                }
                                else {
                                    $(".analysis-section").hide();
                                    $(".build-section").hide();
                                    $(".book-section").show();
                                    $('#show-book').addClass('selected');
                                }

                                $("#show-book").click(function(){
                                    $('.hero-section-button').removeClass('selected');
                                    $(this).addClass('selected');
                                    $(".build-section").hide();
                                    $(".analysis-section").hide();
                                    $(".book-section").show();
                                    var searchParams = new URLSearchParams(window.location.search)
                                    searchParams.set("section", "book");
                                    var newRelativePathQuery = window.location.pathname + '?' + searchParams.toString();
                                    history.pushState(null, '', newRelativePathQuery);
                                });
                                
                                $("#show-analysis").click(function(){
                                    $('.hero-section-button').removeClass('selected');
                                    $(this).addClass('selected');
                                    $(".build-section").hide();
                                    $(".analysis-section").show();
                                    $(".book-section").hide();
                                    var searchParams = new URLSearchParams(window.location.search)
                                    searchParams.set("section", "analysis");
                                    var newRelativePathQuery = window.location.pathname + '?' + searchParams.toString();
                                    history.pushState(null, '', newRelativePathQuery);
                                });
                                
                                $("#show-build").click(function(){
                                    $('.hero-section-button').removeClass('selected');
                                    $(this).addClass('selected');
                                    $(".build-section").show();
                                    $(".analysis-section").hide();
                                    $(".book-section").hide();
                                    var searchParams = new URLSearchParams(window.location.search)
                                    searchParams.set("section", "build");
                                    var newRelativePathQuery = window.location.pathname + '?' + searchParams.toString();
                                    history.pushState(null, '', newRelativePathQuery);
                                });

                                $(".portrait-button").click(function(){
                                    $(".hero-portrait").attr("src", $(this).attr("data-image"));
                                    $(".portrait-button").removeClass("active");
                                    $(this).addClass("active");
                                });

                                $(".variation-button").click(function(){
                                    var selectedVariation = $(this).attr("data-variation");
                                    $(".variation-section").hide();
                                    $("."+selectedVariation).show();
                                    $(".variation-button").removeClass("active");
                                    $(this).addClass("active");
                                    $('.'+selectedVariation+' .portrait-button:first-child').click();
                                });
                            });
                        </script>
                        <div class="book-section">
                            <span class="variation-section variation-1">
                                <div class="story section-box"><h4>Story<span class="fa fa-plus"></h4><div class="section-content"><?php echo $story ?></div></div>
                                <div class="section-box">
                                <h4>Evolution<span class="fa fa-plus"></h4>
                                <div class="section-content">
                                <table class="evolution">
                                    <tr>
                                        
                                        <?php
                                            $missingCount = 0; 
                                            $obtainable = false;
                                            if($evo1) {
                                                echo '<th colspan="5">Obtainable at 1 <i class="fas fa-star"></i></th></tr><tr>';
                                                echo '<td class="evolution-stage"><img class="evolution-image" src="'.$evo1.'"><img class="hero-stars" src="'.get_template_directory_uri().'/assets/img/icons/1star.png" /></td>';
                                                $obtainable = true;
                                            }
                                            if($evo2) {
                                                if ($obtainable == false) {
                                                    echo '<th colspan="4">Obtainable at 2 <i class="fas fa-star"></i></th></tr><tr>';
                                                    $obtainable = true;
                                                    $missingCount += 1;
                                                }
                                                echo '<td class="evolution-stage"><img class="evolution-image" src="'.$evo2.'"><img class="hero-stars" src="'.get_template_directory_uri().'/assets/img/icons/2star.png" /></td>';
                                            }
                                            if($evo3) {
                                                if ($obtainable == false) {
                                                    echo '<th colspan="3">Obtainable at 3 <i class="fas fa-star"></i></th></tr><tr>';
                                                    $obtainable = true;
                                                    $missingCount += 1;
                                                }
                                                echo '<td class="evolution-stage"><img class="evolution-image" src="'.$evo3.'"><img class="hero-stars" src="'.get_template_directory_uri().'/assets/img/icons/3star.png" /></td>';
                                            }
                                            if($evo4) {
                                                if ($obtainable == false) {
                                                    echo '<th colspan="2">Obtainable at 4 <i class="fas fa-star"></i></th></tr><tr>';
                                                    $obtainable = true;
                                                }
                                                echo '<td class="evolution-stage"><img class="evolution-image" src="'.$evo4.'"><img class="hero-stars" src="'.get_template_directory_uri().'/assets/img/icons/4star.png" /></td>';
                                            }
                                            if($evo5) {
                                                if ($obtainable == false) {
                                                    echo '<th colspan="1">Obtainable at 5 <i class="fas fa-star"></i></th></tr><tr>';
                                                    $obtainable = true;
                                                }
                                                echo '<td class="evolution-stage"><img class="evolution-image" src="'.$evo5.'"><img class="hero-stars" src="'.get_template_directory_uri().'/assets/img/icons/5star.png" /></td>';
                                            }
                                            for ($x = 0; $x <= $missingCount; $x++) {
                                                echo "<td class='missing-stage'></td>";
                                            } 
                                        ?>
                                    </tr>
                                </table>
                                </div>
                                </div>
                            </span>
                            <?php if($variations > 1) : ?>
                                <span class="variation-section variation-2">
                                    <div class="story section-box"><h4>Story<span class="fa fa-plus"></h4><div class="section-content"><?php echo $story2 ?></div></div>
                                    <div class="section-box">
                                    <h4>Evolution<span class="fa fa-plus"></h4>
                                    <div class="section-content">
                                    <table class="evolution">
                                        <tr>
                                            
                                            <?php
                                                $missingCount = 0; 
                                                $obtainable = false;
                                                if($evo1) {
                                                    echo '<th colspan="5">Obtainable at 1 <i class="fas fa-star"></i></th></tr><tr>';
                                                    echo '<td class="evolution-stage"><img class="evolution-image" src="'.$evo21.'"><img class="hero-stars" src="'.get_template_directory_uri().'/assets/img/icons/1star.png" /></td>';
                                                    $obtainable = true;
                                                }
                                                if($evo2) {
                                                    if ($obtainable == false) {
                                                        echo '<th colspan="4">Obtainable at 2 <i class="fas fa-star"></i></th></tr><tr>';
                                                        $obtainable = true;
                                                        $missingCount += 1;
                                                    }
                                                    echo '<td class="evolution-stage"><img class="evolution-image" src="'.$evo22.'"><img class="hero-stars" src="'.get_template_directory_uri().'/assets/img/icons/2star.png" /></td>';
                                                }
                                                if($evo3) {
                                                    if ($obtainable == false) {
                                                        echo '<th colspan="3">Obtainable at 3 <i class="fas fa-star"></i></th></tr><tr>';
                                                        $obtainable = true;
                                                        $missingCount += 1;
                                                    }
                                                    echo '<td class="evolution-stage"><img class="evolution-image" src="'.$evo23.'"><img class="hero-stars" src="'.get_template_directory_uri().'/assets/img/icons/3star.png" /></td>';
                                                }
                                                if($evo4) {
                                                    if ($obtainable == false) {
                                                        echo '<th colspan="2">Obtainable at 4 <i class="fas fa-star"></i></th></tr><tr>';
                                                        $obtainable = true;
                                                    }
                                                    echo '<td class="evolution-stage"><img class="evolution-image" src="'.$evo24.'"><img class="hero-stars" src="'.get_template_directory_uri().'/assets/img/icons/4star.png" /></td>';
                                                }
                                                if($evo5) {
                                                    if ($obtainable == false) {
                                                        echo '<th colspan="1">Obtainable at 5 <i class="fas fa-star"></i></th></tr><tr>';
                                                        $obtainable = true;
                                                    }
                                                    echo '<td class="evolution-stage"><img class="evolution-image" src="'.$evo25.'"><img class="hero-stars" src="'.get_template_directory_uri().'/assets/img/icons/5star.png" /></td>';
                                                }
                                                for ($x = 0; $x <= $missingCount; $x++) {
                                                    echo "<td class='missing-stage'></td>";
                                                } 
                                            ?>
                                        </tr>
                                    </table>
                                    </div>
                                    </div>
                                </span>
                            <?php endif; ?>

                            <div class="stats section-box">
                            <h4>Max Awakened Stats <?php echo '<span class="skill-level">Lv.'.$hero_max_level.'</span>'; ?><span class="fa fa-plus"></h4>
                            <div class="section-content">
                            <?php

                            $heroes = get_posts(array(
                                    'post_type'   => 'heroes',
                                    'post_status' => 'publish',
                                    'posts_per_page' => -1,
                                    'fields' => 'ids'
                                )
                            );

                            $atkList = array();
                            $hpList = array();
                            $defList = array();
                            $critList = array();
                            $drList = array();
                            $healList = array();

                            foreach( $heroes as $hero ) {
                                $atkList[] = get_post_meta( $hero, 'stat_fields_atk', true );
                                $hpList[] = get_post_meta( $hero, 'stat_fields_hp', true );
                                $defList[] = get_post_meta( $hero, 'stat_fields_def', true );
                                $critList[] = get_post_meta( $hero, 'stat_fields_crit', true );
                                $drList[] = get_post_meta( $hero, 'stat_fields_damage_reduction', true );
                                $healList[] = get_post_meta( $hero, 'stat_fields_heal', true );
                            }

                            $totalHeroes = count($heroes);

                            rsort($atkList);
                            rsort($hpList);
                            rsort($defList);
                            rsort($critList);
                            rsort($drList);
                            rsort($healList);

                            $atkRank = array_search($atk, $atkList, true) + 1;
                            $hpRank = array_search($hp, $hpList, true) + 1;
                            $defRank = array_search($def, $defList, true) + 1;
                            $critRank = array_search($crit, $critList, true) + 1;
                            $drRank = array_search($dr, $drList, true) + 1;
                            $healRank = array_search($heal, $healList, true) + 1;
                            
                            $atk_widget = \Elementor\Plugin::instance()->elements_manager->create_element_instance(
                                [
                                    'elType' => 'widget',
                                    'widgetType' => 'progress',
                                    'id' => 'atk-bar',
                                    'settings' => [
                                        'title' => 'Rank: '.$atkRank.'/'.$totalHeroes,
                                        'title_color' => 'show',
                                        'display_percentage' => 'hide',
                                        'inner_text' => 'ATK '.$atk,
                                    ],
                                ],
                                []
                            );
                            $hp_widget = \Elementor\Plugin::instance()->elements_manager->create_element_instance(
                                [
                                    'elType' => 'widget',
                                    'widgetType' => 'progress',
                                    'id' => 'hp-bar',
                                    'settings' => [
                                        'title' => 'Rank: '.$hpRank.'/'.$totalHeroes,
                                        'title_color' => 'show',
                                        'display_percentage' => 'hide',
                                        'inner_text' => 'HP '.$hp,
                                    ],
                                ],
                                []
                            );
                            $def_widget = \Elementor\Plugin::instance()->elements_manager->create_element_instance(
                                [
                                    'elType' => 'widget',
                                    'widgetType' => 'progress',
                                    'id' => 'def-bar',
                                    'settings' => [
                                        'title' => 'Rank: '.$defRank.'/'.$totalHeroes,
                                        'title_color' => 'show',
                                        'display_percentage' => 'hide',
                                        'inner_text' => 'DEF '.$def,
                                    ],
                                ],
                                []
                            );
                            $crit_widget = \Elementor\Plugin::instance()->elements_manager->create_element_instance(
                                [
                                    'elType' => 'widget',
                                    'widgetType' => 'progress',
                                    'id' => 'crit-bar',
                                    'settings' => [
                                        'title' => 'Rank: '.$critRank.'/'.$totalHeroes,
                                        'title_color' => 'show',
                                        'display_percentage' => 'hide',
                                        'inner_text' => 'Crit Chance '.$crit,
                                    ],
                                ],
                                []
                            );
                            $dr_widget = \Elementor\Plugin::instance()->elements_manager->create_element_instance(
                                [
                                    'elType' => 'widget',
                                    'widgetType' => 'progress',
                                    'id' => 'dr-bar',
                                    'settings' => [
                                        'title' => 'Rank: '.$drRank.'/'.$totalHeroes,
                                        'title_color' => 'show',
                                        'display_percentage' => 'hide',
                                        'inner_text' => 'Damage Reduction '.$dr,
                                    ],
                                ],
                                []
                            );
                            $heal_widget = \Elementor\Plugin::instance()->elements_manager->create_element_instance(
                                [
                                    'elType' => 'widget',
                                    'widgetType' => 'progress',
                                    'id' => 'heal-bar',
                                    'settings' => [
                                        'title' => 'Rank: '.$healRank.'/'.$totalHeroes,
                                        'title_color' => 'show',
                                        'display_percentage' => 'hide',
                                        'inner_text' => 'Heal '.$heal,
                                    ],
                                ],
                                []
                            );
                            $atk_widget->print_element();
                            $hp_widget->print_element();
                            $def_widget->print_element();
                            $crit_widget->print_element();
                            $dr_widget->print_element();
                            $heal_widget->print_element();

                            $atkFill = $atk/$atkList[0] * 100;
                            $hpFill = $hp/$hpList[0] * 100;
                            $defFill = $def/$defList[0] * 100;
                            $critFill = $crit/$critList[0] * 100;
                            $drFill = $dr/$drList[0] * 100;
                            $healFill = $heal/$healList[0] * 100;
                            ?>
                            
                            <script>
                                jQuery(".elementor-element-atk-bar .elementor-progress-bar").css("width", "<?php echo $atkFill ?>%");
                                jQuery(".elementor-element-hp-bar .elementor-progress-bar").css("width", "<?php echo $hpFill ?>%");
                                jQuery(".elementor-element-def-bar .elementor-progress-bar").css("width", "<?php echo $defFill ?>%");
                                jQuery(".elementor-element-crit-bar .elementor-progress-bar").css("width", "<?php echo $critFill ?>%");
                                jQuery(".elementor-element-dr-bar .elementor-progress-bar").css("width", "<?php echo $drFill ?>%");
                                jQuery(".elementor-element-heal-bar .elementor-progress-bar").css("width", "<?php echo $healFill ?>%");

                                jQuery(".elementor-element-atk-bar .elementor-progress-bar").css("background-color", "rgb(185, 40, 53)");
                                jQuery(".elementor-element-hp-bar .elementor-progress-bar").css("background-color", "rgb(112, 158, 55)");
                                jQuery(".elementor-element-def-bar .elementor-progress-bar").css("background-color", "rgb(57, 133, 191)");
                                jQuery(".elementor-element-crit-bar .elementor-progress-bar").css("background-color", "rgb(222, 78, 0)");
                                jQuery(".elementor-element-dr-bar .elementor-progress-bar").css("background-color", "rgb(128, 46, 116)");
                                jQuery(".elementor-element-heal-bar .elementor-progress-bar").css("background-color", "#008477");

                                <?php if($crit == 0) {
                                    ?>
                                    jQuery(".elementor-element-crit-bar").css("display", "none");
                                <?php     
                                }
                                if ($dr == 0) {
                                    ?>
                                    jQuery(".elementor-element-dr-bar").css("display", "none");
                                <?php
                                }
                                if ($heal == 0) {
                                    ?>
                                    jQuery(".elementor-element-heal-bar").css("display", "none");
                                <?php
                                }
                                ?>
                            </script>
                            <div class="elemental-stats">
                                    <div class="elemental-left">
                                        <div class="elemental-resistance elemental-weakness">
                                        <?php 
                                            if($water_resistance < 0) {
                                                echo '<img src="'.get_template_directory_uri().'/assets/img/icons/water.png" /> <span class="resistance-text">Water Resistance '.$water_resistance.'%</span>';
                                            }
                                            else if ($earth_resistance < 0)
                                            {
                                                echo '<img src="'.get_template_directory_uri().'/assets/img/icons/earth.png" /> <span class="resistance-text">Earth Resistance '.$earth_resistance.'%</span>';
                                            }
                                            else if ($fire_resistance < 0)
                                            {
                                                echo '<img src="'.get_template_directory_uri().'/assets/img/icons/fire.png" /> <span class="resistance-text">Fire Resistance '.$fire_resistance.'%</span>';
                                            }
                                            else if ($basic_resistance < 0)
                                            {
                                                echo '<img src="'.get_template_directory_uri().'/assets/img/icons/basic.png" /> <span class="resistance-text">Basic Resistance '.$basic_resistance.'%</span>';
                                            }
                                            else if ($light_resistance < 0)
                                            {
                                                echo '<img src="'.get_template_directory_uri().'/assets/img/icons/light.png" /> <span class="resistance-text">Light Resistance '.$light_resistance.'%</span>';
                                            }
                                            else if ($dark_resistance < 0)
                                            {
                                                echo '<img src="'.get_template_directory_uri().'/assets/img/icons/dark.png" /> <span class="resistance-text">Dark Resistance '.$dark_resistance.'%</span>';
                                            }
                                        ?>
                                        </div>
                                        </div>
                                        <div class="elemental-right">
                                        <div class="elemental-resistance elemental-strength">
                                        <?php 
                                            if($water_resistance > 0) {
                                                echo '<img src="'.get_template_directory_uri().'/assets/img/icons/water.png" /> <span class="resistance-text">Water Resistance +'.$water_resistance.'%</span>';
                                            }
                                            else if ($earth_resistance > 0)
                                            {
                                                echo '<img src="'.get_template_directory_uri().'/assets/img/icons/earth.png" /> <span class="resistance-text">Earth Resistance +'.$earth_resistance.'%</span>';
                                            }
                                            else if ($fire_resistance > 0)
                                            {
                                                echo '<img src="'.get_template_directory_uri().'/assets/img/icons/fire.png" /> <span class="resistance-text">Fire Resistance +'.$fire_resistance.'%</span>';
                                            }
                                            else if ($basic_resistance > 0)
                                            {
                                                echo '<img src="'.get_template_directory_uri().'/assets/img/icons/basic.png" /> <span class="resistance-text">Basic Resistance +'.$basic_resistance.'%</span>';
                                            }
                                            else if ($light_resistance > 0)
                                            {
                                                echo '<img src="'.get_template_directory_uri().'/assets/img/icons/light.png" /> <span class="resistance-text">Light Resistance +'.$light_resistance.'%</span>';
                                            }
                                            else if ($dark_resistance > 0)
                                            {
                                                echo '<img src="'.get_template_directory_uri().'/assets/img/icons/dark.png" /> <span class="resistance-text">Dark Resistance +'.$dark_resistance.'%</span>';
                                            }
                                        ?>
                                        </div>
                                        </div>
                                        </div>
                                </div>
                            </div>
                            <div class="hero-abilities section-box">
                                <h4>Abilities<span class="fa fa-plus"></h4>
                                <div class="section-content"> 
                                <table class="hero-abilities-table">
                                    <tr><th class="ability-header"><img class="ability-icon" src="<?php echo get_template_directory_uri()?>/assets/img/icons/normal.png" /><br>Normal Attack</th><td colspan="2"><span class="bold"><?php echo $natk_name ?></span><br><?php echo $natk_desc ?></td></tr>
                                    <tr><th rowspan="2" class="ability-header"><img class="ability-icon" src="<?php echo get_template_directory_uri()?>/assets/img/icons/chain.png" /><br>Chain Ability</th><td class="chain-skill"><span class="bold">Trigger</span><br><?php getChain($cskill_trigger) ?></td><td class="chain-skill"><span class="bold">Result</span><br><?php getChain($cskill_result) ?></td></tr>
                                        <tr><td colspan="2"><span class="bold"><?php echo $cskill_name ?></span><br><?php echo $cskill_desc ?></td></tr>
                                    <tr><th class="ability-header"><img class="ability-icon" src="<?php echo get_template_directory_uri()?>/assets/img/icons/special.png" /><br>Special Ability</th><td colspan="2"><span class="bold"><?php echo $sability_name ?></span><br><?php echo $sability_desc ?></td></tr>
                                    <tr><th class="ability-header">Passives</th><td colspan="2"><?php echo $passives ?></td></tr>
                                </table>
                                </div>
                            </div>
                            <?php 
                            if($exclusive) :
                            if(sizeof($exclusive)> 0 && $exclusive[0]->post_type == 'items') : 
                                ?>
                                <div class="section-box">
                                <h4>Exclusive Weapons<span class="fa fa-plus"></h4>
                                <div class="section-content">
                                <table class="hero-abilities-table">
                                <tr><th class="ability-header">Weapon</th><th class="ability-header skill-header">Weapon Skill</th></tr>
                                <?php 
                                foreach($exclusive as $weapon) {
                                    $weapon_element = get_field('element', $weapon->ID);
                                    $weapon_max_atk = get_field('max_atk', $weapon->ID);
                                    $weapon_min_atk = get_field('min_atk', $weapon->ID);
                                    $weapon_max_dps = get_field('dps', $weapon->ID);
                                    $weapon_min_dps = get_field('min_dps', $weapon->ID);

                                    $weapon_exclusive = get_field('exclusive', $weapon->ID);

                                    $weapon_magazine = get_field('magazine', $weapon->ID);
                                    $weapon_atk = get_field('atk', $weapon->ID);
                                    $weapon_crit = get_field('crit_chance', $weapon->ID);
                                    $weapon_dr = get_field('damage_reduction', $weapon->ID);
                                    $weapon_def_flat = get_field('def_flat', $weapon->ID);
                                    $weapon_def = get_field('def', $weapon->ID);
                                    $weapon_heal_flat = get_field('heal_flat', $weapon->ID);
                                    $weapon_heal = get_field('heal_percent', $weapon->ID);
                                    $weapon_hp = get_field('hp', $weapon->ID);
                                    $weapon_atk_on_kill = get_field('atk_on_kill', $weapon->ID);
                                    $weapon_hp_on_kill = get_field('hp_on_kill', $weapon->ID);
                                    $weapon_skill_regen_on_kill = get_field('skill_regen_on_kill', $weapon->ID);
                                    $weapon_shield_on_start = get_field('shield_on_start', $weapon->ID);
                                    $weapon_shield_on_kill = get_field('shield_on_kill', $weapon->ID);
                                    $weapon_skill_damage = get_field('skill_damage', $weapon->ID);
                                    $weapon_skill_regen_speed = get_field('skill_regen_speed', $weapon->ID);
                                    $weapon_earth_type_atk = get_field('earth_type_atk', $weapon->ID);
                                    $weapon_fire_type_atk = get_field('fire_type_atk', $weapon->ID);
                                    $weapon_water_type_atk = get_field('water_type_atk', $weapon->ID);
                                    $weapon_dark_type_atk = get_field('dark_type_atk', $weapon->ID);
                                    $weapon_light_type_atk = get_field('light_type_atk', $weapon->ID);
                                    $weapon_basic_type_atk = get_field('basic_type_atk', $weapon->ID);
                                    $weapon_options = get_field('options', $weapon->ID);

                                    $weapon_sub_atk = get_field('sub_atk', $weapon->ID);
                                    $weapon_sub_crit = get_field('sub_crit_chance', $weapon->ID);
                                    $weapon_sub_dr = get_field('sub_damage_reduction', $weapon->ID);
                                    $weapon_sub_def_flat = get_field('sub_def_flat', $weapon->ID);
                                    $weapon_sub_def = get_field('sub_def', $weapon->ID);
                                    $weapon_sub_heal_flat = get_field('sub_heal_flat', $weapon->ID);
                                    $weapon_sub_heal = get_field('sub_heal_percent', $weapon->ID);
                                    $weapon_sub_hp = get_field('sub_hp', $weapon->ID);
                                    $weapon_sub_atk_on_kill = get_field('sub_atk_on_kill', $weapon->ID);
                                    $weapon_sub_hp_on_kill = get_field('sub_hp_on_kill', $weapon->ID);
                                    $weapon_sub_skill_regen_on_kill = get_field('sub_skill_regen_on_kill', $weapon->ID);
                                    $weapon_sub_shield_on_start = get_field('sub_shield_on_start', $weapon->ID);
                                    $weapon_sub_shield_on_kill = get_field('sub_shield_on_kill', $weapon->ID);
                                    $weapon_sub_skill_damage = get_field('sub_skill_damage', $weapon->ID);
                                    $weapon_sub_skill_regen_speed = get_field('sub_skill_regen_speed', $weapon->ID);
                                    $weapon_sub_earth_type_atk = get_field('sub_earth_type_atk', $weapon->ID);
                                    $weapon_sub_fire_type_atk = get_field('sub_fire_type_atk', $weapon->ID);
                                    $weapon_sub_water_type_atk = get_field('sub_water_type_atk', $weapon->ID);
                                    $weapon_sub_dark_type_atk = get_field('sub_dark_type_atk', $weapon->ID);
                                    $weapon_sub_light_type_atk = get_field('sub_light_type_atk', $weapon->ID);
                                    $weapon_sub_basic_type_atk = get_field('sub_basic_type_atk', $weapon->ID);
                                    $weapon_sub_options = get_field('sub_options', $weapon->ID);

                                    $weapon_rarity = get_field('rarity', $weapon->ID);

                                    $weapon_lb5 = get_field('lb5_option', $weapon->ID);
                                    $weapon_lb5_value = get_field('lb5_value', $weapon->ID);
                                    $weapon_skill_name = get_field('weapon_skill_name', $weapon->ID);
                                    $weapon_skill_name = preg_replace('/Lv\.\d*/i', '<span class="skill-level">$0</span>', $weapon_skill_name);
                                    $weapon_skill_atk = get_field('weapon_skill_atk', $weapon->ID);
                                    $weapon_skill_regen_time = get_field('weapon_skill_regen_time', $weapon->ID);
                                    $weapon_skill_description = get_field('weapon_skill_description', $weapon->ID);
                                    $weapon_skill_description = str_replace("injured", '<span class="green">injured</span>', $weapon_skill_description);
                                    $weapon_skill_description = str_replace("airborne", '<span class="cyan">airborne</span>', $weapon_skill_description);
                                    $weapon_skill_description = str_replace("downed", '<span class="yellowgreen">downed</span>', $weapon_skill_description);
                                    $weapon_skill_chain = get_field('weapon_skill_chain', $weapon->ID);
                                    $weapon_max_level = get_field('max_level', $weapon->ID);


                                    $negated_options = preg_grep('/.*negated.*/', $weapon_options);
                                    $negated_sub_options = preg_grep('/.*negated.*/', $weapon_sub_options);

                                    $weapon_max_lines = get_field('max_lines', $weapon->ID);

                                    $weapon_type = get_the_terms($post->ID, 'item_categories', $weapon->ID);

                                    ?>
                                    <tr class="item-single" style="background: transparent !important;">
                                    <td class="item-stats">
                                        <div class="item-single-picture"><?php echo get_the_post_thumbnail($weapon->ID); ?></div>
                                            <div class="item-main-text">
                                                <a href="<?php echo get_the_permalink($weapon->ID) ?>"><span class="weapon-stat weapon-chain-title bold"><?php echo get_the_title($weapon->ID); ?>
                                            </span></a>
                                                <span class="weapon-stat equipment-rarity"><?php echo $weapon_rarity.' '.get_field('weapon_type', $weapon->ID) ?></span>
                                                <span class="weapon-stat weapon-dps">
                                                    <?php 
                                                    if(($weapon_min_dps > 0) and ($weapon_min_dps < $weapon_max_dps)) {
                                                        echo $weapon_min_dps.'-'.$weapon_max_dps; 
                                                    }
                                                    else {
                                                        echo $weapon_max_dps; 
                                                    }
                                                    ?> <span class="dps-label">DPS</span></span><br>
                                            </div>
                                                <span class="weapon-stat weapon-atk"><span class="stat-label weapon-<?php echo get_field('element', $weapon->ID); ?>"><?php echo get_field('element', $weapon->ID); ?> Atk</span> 
                                                <?php 
                                                    if(($weapon_min_atk > 0) and ($weapon_min_atk < $weapon_max_atk)) {
                                                        echo $weapon_min_atk.'-'.$weapon_max_atk; 
                                                    }
                                                    else {
                                                        echo $weapon_max_atk; 
                                                    }
                                                ?></span>
                                            <?php
                                            if ($weapon_atk>0) {
                                                echo '<span class="weapon-stat weapon-atk"><span class="stat-label label-offensive">Atk</span> +'.$weapon_atk.'%</span>';
                                            }  
                                            if ($weapon_magazine>0) {
                                                echo '<span class="weapon-stat weapon-magazine"><span class="stat-label label-offensive">Magazine Size</span> '.$weapon_magazine.'</span>';
                                            } 
                                            if ($weapon_heal_flat>0) {
                                                echo '<span class="weapon-stat weapon-heal-flat"><span class="stat-label label-offensive">Heal </span> '.$weapon_heal_flat.'</span>';
                                            } 
                                            if ($weapon_crit>0) {
                                                echo '<span class="weapon-stat weapon-crit"><span class="stat-label label-offensive">Crit Hit Chance</span> '.$weapon_crit.'%</span>';
                                            } 
                                            if ($weapon_def_flat>0) {
                                                echo '<span class="weapon-stat weapon-def-flat"><span class="stat-label label-offensive">Def</span> '.$weapon_def_flat.'</span>';
                                            } 
                                            if ($weapon_dr>0) {
                                                echo '<span class="weapon-stat weapon-dr"><span class="stat-label">Damage Reduction</span> <span class="green">'.$weapon_dr.'</span></span>';
                                            }
                                            if ($weapon_atk_on_kill>0) {
                                                echo '<span class="weapon-stat weapon-atk-on-kill"><span class="green">+'.$weapon_atk_on_kill.'%</span> Atk increase on enemy kill</span>';
                                            } 
                                            if ($weapon_hp_on_kill>0) {
                                                echo '<span class="weapon-stat weapon-hp-on-kill"><span class="green">+'.$weapon_hp_on_kill.'%</span> HP recovery on enemy kill</span>';
                                            } 
                                            if ($weapon_shield_on_kill>0) {
                                                echo '<span class="weapon-stat weapon-shield-on-kill"><span class="green">+'.$weapon_shield_on_kill.'%</span> shield increase on enemy kill</span>';
                                            } 
                                            if ($weapon_shield_on_start>0) {
                                                echo '<span class="weapon-stat weapon-shield-on-start"><span class="green">+'.$weapon_shield_on_start.'%</span> shield increase on battle start</span>';
                                            }
                                            if ($weapon_def>0) {
                                                echo '<span class="weapon-stat weapon-def"><span class="stat-label label-defensive">Def</span> +'.$weapon_def.'%</span>';
                                            } 
                                            if ($weapon_hp>0) {
                                                echo '<span class="weapon-stat weapon-hp"><span class="stat-label label-defensive">HP</span> +'.$weapon_hp.'%</span>';
                                            }
                                            if ($weapon_heal>0) {
                                                echo '<span class="weapon-stat weapon-heal"><span class="stat-label label-defensive">Heal</span> +'.$weapon_heal.'%</span>';
                                            } 
                                            if ($weapon_skill_damage>0) {
                                                echo '<span class="weapon-stat weapon-skill-damage"><span class="stat-label label-defensive">Skill Damage</span> +'.$weapon_skill_damage.'%</span>';
                                            }  
                                            if ($weapon_skill_regen_speed>0) {
                                                echo '<span class="weapon-stat weapon-regen-speed"><span class="stat-label label-defensive">Weapon Skill Regen Speed</span> +'.$weapon_skill_regen_speed.'%</span>';
                                            } 
                                            if ($weapon_skill_regen_on_kill<0) {
                                                echo '<span class="weapon-stat weapon-regen-on-kill"><span class="green">'.$weapon_skill_regen_on_kill.'</span> seconds of weapon skill Regen time on enemy kill</span>';
                                            } 
                                            if ($weapon_earth_type_atk>0) {
                                                echo '<span class="weapon-stat weapon-def"><span class="stat-label label-defensive">Earth type Atk</span> +'.$weapon_earth_type_atk.'%</span>';
                                            } 
                                            if ($weapon_fire_type_atk>0) {
                                                echo '<span class="weapon-stat weapon-def"><span class="stat-label label-defensive">Fire type Atk</span> +'.$weapon_fire_type_atk.'%</span>';
                                            }
                                            if ($weapon_water_type_atk>0) {
                                                echo '<span class="weapon-stat weapon-def"><span class="stat-label label-defensive">Water type Atk</span> +'.$weapon_water_type_atk.'%</span>';
                                            }  
                                            if ($weapon_basic_type_atk>0) {
                                                echo '<span class="weapon-stat weapon-def"><span class="stat-label label-defensive">Basic type Atk</span> +'.$weapon_basic_type_atk.'%</span>';
                                            } 
                                            if ($weapon_light_type_atk>0) {
                                                echo '<span class="weapon-stat weapon-def"><span class="stat-label label-defensive">Light type Atk</span> +'.$weapon_light_type_atk.'%</span>';
                                            } 
                                            if ($weapon_dark_type_atk>0) {
                                                echo '<span class="weapon-stat weapon-def"><span class="stat-label label-defensive">Dark type Atk</span> +'.$weapon_dark_type_atk.'%</span>';
                                            } 
                                            foreach($negated_options as $negated) 
                                            {
                                                echo '<span class="weapon-stat weapon-def">'.$negated.'</span>';
                                            }
                                            ?>
                                            <?php
                                            if($weapon_lb5)
                                            {
                                                echo '<br><span class="weapon-stat limit-break limit-break-header">[Required Limit Break 5]</span><span class="weapon-stat limit-break">';
                                                if($weapon_lb5=='Atk (%)'){
                                                    echo '<span class="stat-label label-defensive">Atk</span> <span class="green">+'.$weapon_lb5_value.'%</span>';
                                                }
                                                else if($weapon_lb5=='HP (%)') {
                                                    echo '<span class="stat-label label-defensive">HP</span> <span class="green">+'.$weapon_lb5_value.'%</span>';
                                                }
                                                else if($weapon_lb5=='Crit Hit Chance') {
                                                    echo '<span class="stat-label label-defensive">Crit Hit Chance</span> <span class="green">+'.$weapon_lb5_value.'%</span>';
                                                }
                                                else if($weapon_lb5=='Damage Reduction') {
                                                    echo '<span class="stat-label label-defensive">Damage Reduction</span> <span class="green">+'.$weapon_lb5_value.'</span>';
                                                }
                                                else if($weapon_lb5=='Def') {
                                                    echo '<span class="stat-label label-defensive">Def</span> <span class="green">+'.$weapon_lb5_value.'%</span>';
                                                }
                                                else if($weapon_lb5=='Heal (Flat)') {
                                                    echo '<span class="stat-label label-defensive">Heal</span> <span class="green">+'.$weapon_lb5_value.'</span>';
                                                }
                                                else if($weapon_lb5=='Heal (%)') {
                                                    echo '<span class="stat-label label-defensive">Heal</span> <span class="green">+'.$weapon_lb5_value.'%</span>';
                                                }
                                                else if($weapon_lb5=='Atk increase on enemy kill') {
                                                    echo '<span class="weapon-stat weapon-atk-on-kill"><span class="green">+'.$weapon_lb5_value.'%</span> Atk increase on enemy kill</span>';
                                                }
                                                else if($weapon_lb5=='HP recovery on enemy kill') {
                                                    echo '<span class="weapon-stat weapon-hp-on-kill"><span class="green">+'.$weapon_lb5_value.'%</span> HP recovery on enemy kill</span>';
                                                }
                                                else if($weapon_lb5=='Seconds of weapon skill Regen time on enemy kill') {
                                                    echo '<span class="weapon-stat weapon-regen-on-kill"><span class="green">'.$weapon_lb5_value.'</span> seconds of weapon skill Regen time on enemy kill</span>';
                                                }
                                                else if($weapon_lb5=='Shield increase on battle start') {
                                                    echo '<span class="weapon-stat weapon-shield-on-start"><span class="green">+'.$weapon_lb5_value.'%</span> shield increase on battle start</span>';
                                                }
                                                else if($weapon_lb5=='Shield increase on enemy kill') {
                                                    echo '<span class="weapon-stat weapon-shield-on-kill"><span class="green">+'.$weapon_lb5_value.'%</span> shield increase on enemy kill</span>';
                                                }
                                                else if($weapon_lb5=='Skill Damage') {
                                                    echo '<span class="weapon-stat weapon-skill-damage"><span class="stat-label label-defensive">Skill Damage</span> +'.$weapon_lb5_value.'%</span>';
                                                }
                                                else if($weapon_lb5=='Weapon Skill Regen Speed') {
                                                    echo '<span class="weapon-stat weapon-regen-speed"><span class="stat-label label-defensive">Weapon Skill Regen Speed</span> +'.$weapon_lb5_value.'%</span>';
                                                }
                                                echo '<br>';
                                            } 
                                            if ($weapon_exclusive): ?>
                                                <?php 
                                                    $hero = get_field('hero', $weapon->ID)[0];
                                                    $weapon_exclusive_effects = get_field('exclusive_effects', $weapon->ID);
                                                    echo '<br><span class="exclusive"><span class="exclusive-header">[';
                                                    echo $hero->post_title;
                                                    echo ' only]</span><br>';
                                                    echo $weapon_exclusive_effects;
                                                ?>
                                                </span>
                                                <br>
                                            <?php
                                            endif;
                                            if(sizeof($weapon_sub_options) > 0) {
                                                echo '<br><span class="weapon-stat limit-break limit-break-header sub-options-text">[Sub-Options] <span class="sub-options-max">(Max '.$weapon_max_lines.')</span></span>';
                                                if ($weapon_sub_atk>0) {
                                                    echo '<span class="weapon-stat weapon-atk"><span class="stat-label label-offensive">Atk</span> +'.$weapon_sub_atk.'%</span>';
                                                }  
                                                if ($weapon_sub_heal_flat>0) {
                                                    echo '<span class="weapon-stat weapon-heal-flat"><span class="stat-label label-offensive">Heal </span> '.$weapon_sub_heal_flat.'</span>';
                                                } 
                                                if ($weapon_sub_crit>0) {
                                                    echo '<span class="weapon-stat weapon-crit"><span class="stat-label label-offensive">Crit Hit Chance</span> '.$weapon_sub_crit.'%</span>';
                                                } 
                                                if ($weapon_sub_def_flat>0) {
                                                    echo '<span class="weapon-stat weapon-def-flat"><span class="stat-label label-offensive">Def</span> '.$weapon_sub_def_flat.'</span>';
                                                } 
                                                if ($weapon_sub_dr>0) {
                                                    echo '<span class="weapon-stat weapon-dr"><span class="stat-label">Damage Reduction</span> <span class="green">'.$weapon_sub_dr.'</span></span>';
                                                }
                                                if ($weapon_sub_atk_on_kill>0) {
                                                    echo '<span class="weapon-stat weapon-atk-on-kill"><span class="green">+'.$weapon_sub_atk_on_kill.'%</span> Atk increase on enemy kill</span>';
                                                } 
                                                if ($weapon_sub_hp_on_kill>0) {
                                                    echo '<span class="weapon-stat weapon-hp-on-kill"><span class="green">+'.$weapon_sub_hp_on_kill.'%</span> HP recovery on enemy kill</span>';
                                                } 
                                                if ($weapon_sub_shield_on_kill>0) {
                                                    echo '<span class="weapon-stat weapon-shield-on-kill"><span class="green">+'.$weapon_sub_shield_on_kill.'%</span> shield increase on enemy kill</span>';
                                                } 
                                                if ($weapon_sub_shield_on_start>0) {
                                                    echo '<span class="weapon-stat weapon-shield-on-start"><span class="green">+'.$weapon_sub_shield_on_start.'%</span> shield increase on battle start</span>';
                                                }
                                                if ($weapon_sub_def>0) {
                                                    echo '<span class="weapon-stat weapon-def"><span class="stat-label label-defensive">Def</span> +'.$weapon_sub_def.'%</span>';
                                                } 
                                                if ($weapon_sub_hp>0) {
                                                    echo '<span class="weapon-stat weapon-hp"><span class="stat-label label-defensive">HP</span> +'.$weapon_sub_hp.'%</span>';
                                                }
                                                if ($weapon_sub_heal>0) {
                                                    echo '<span class="weapon-stat weapon-heal"><span class="stat-label label-defensive">Heal</span> +'.$weapon_sub_heal.'%</span>';
                                                } 
                                                if ($weapon_sub_skill_damage>0) {
                                                    echo '<span class="weapon-stat weapon-skill-damage"><span class="stat-label label-defensive">Skill Damage</span> +'.$weapon_sub_skill_damage.'%</span>';
                                                }  
                                                if ($weapon_sub_skill_regen_speed>0) {
                                                    echo '<span class="weapon-stat weapon-regen-speed"><span class="stat-label label-defensive">Weapon Skill Regen Speed</span> +'.$weapon_sub_skill_regen_speed.'%</span>';
                                                } 
                                                if ($weapon_sub_skill_regen_on_kill<0) {
                                                    echo '<span class="weapon-stat weapon-regen-on-kill"><span class="green">'.$weapon_sub_skill_regen_on_kill.'</span> seconds of weapon skill Regen time on enemy kill</span>';
                                                } 
                                                if ($weapon_sub_earth_type_atk>0) {
                                                    echo '<span class="weapon-stat weapon-def"><span class="stat-label label-defensive">Earth type Atk</span> +'.$weapon_sub_earth_type_atk.'%</span>';
                                                } 
                                                if ($weapon_sub_fire_type_atk>0) {
                                                    echo '<span class="weapon-stat weapon-def"><span class="stat-label label-defensive">Fire type Atk</span> +'.$weapon_sub_fire_type_atk.'%</span>';
                                                }
                                                if ($weapon_sub_water_type_atk>0) {
                                                    echo '<span class="weapon-stat weapon-def"><span class="stat-label label-defensive">Water type Atk</span> +'.$weapon_sub_water_type_atk.'%</span>';
                                                }  
                                                if ($weapon_sub_basic_type_atk>0) {
                                                    echo '<span class="weapon-stat weapon-def"><span class="stat-label label-defensive">Basic type Atk</span> +'.$weapon_sub_basic_type_atk.'%</span>';
                                                } 
                                                if ($weapon_sub_light_type_atk>0) {
                                                    echo '<span class="weapon-stat weapon-def"><span class="stat-label label-defensive">Light type Atk</span> +'.$weapon_sub_light_type_atk.'%</span>';
                                                } 
                                                if ($weapon_sub_dark_type_atk>0) {
                                                    echo '<span class="weapon-stat weapon-def"><span class="stat-label label-defensive">Dark type Atk</span> +'.$weapon_sub_dark_type_atk.'%</span>';
                                                } 
                                                foreach($negated_sub_options as $negated) 
                                                {
                                                    echo '<span class="weapon-stat weapon-def">'.$negated.'</span>';
                                                }
                                            }
                                            ?>
                                        </td>
                                        <?php if($weapon_skill_name): ?>
                                        <td class="weapon-skill">
                                            <div class="weapon-skill-chain-info">
                                                <?php getChainIcon($weapon_skill_chain) ?><br>
                                                <span class="weapon-chain-title"><?php echo $weapon_skill_name ?></span><br><br>
                                                <span class="weapon-chain-atk">Atk: <span class="green"><?php echo $weapon_skill_atk ?>%</span> DPS</span><br>
                                                <span class="weapon-chain-regen">Regen time: <?php echo $weapon_skill_regen_time ?> seconds</span><br><br>
                                                <span class="weapon-chain-description"><?php echo $weapon_skill_description ?></span>
                                            </div>
                                        </td>
                                        <?php endif; ?>
                                    </tr>
                                    <?php
                                }
                                ?>                                                                                    
                                </table>
                                </div>
                            </div>
                            <?php endif; endif; ?>
                            
                            <?php if($lamlb) : ?>
                                <div class="section-box">
                                <h4>Awakening Materials<span class="fa fa-plus"></h4>
                                <div class="section-content">
                                <table class="hero-abilities-table awakening-table">
                                    <tr>
                                        <th class="ability-header tier-header">
                                            <select class="tier-select" name="tier" id="tier">
                                                <option value="MLB">MLB</option>
                                                <option value="five-star">5★</option>
                                                <option value="four-star">4★</option>
                                                <option value="three-star">3★</option>
                                                <?php if($evo2) : ?><option value="two-star">2★</option><?php endif; ?>
                                                <?php if($evo1) : ?><option value="one-star">1★</option><?php endif; ?>
                                            </select>
                                        </th><th class="ability-header">Low-grade</th><th class="ability-header">Mid-grade</th><th class="ability-header">High-grade</th>
                                    </tr>
                                    <tr>
                                    <th class="ability-header left-header"><span class="header-spacing">Atk</span></th>
                                        <th>
                                            <div class="low-grade-attack-stone"></div><br>
                                            <span class="mlb-awakening awakening-value"><?php echo $lamlb ?></span>
                                            <span class="five-star-awakening awakening-value"><?php echo $la5 ?></span>
                                            <span class="four-star-awakening awakening-value"><?php echo $la4 ?></span>
                                            <span class="three-star-awakening awakening-value"><?php echo $la3 ?></span>
                                            <span class="two-star-awakening awakening-value"><?php echo $la2 ?></span>
                                            <span class="one-star-awakening awakening-value"><?php echo $la1 ?></span>
                                        </th>
                                        <th>
                                            <div class="mid-grade-attack-stone"></div><br>
                                            <span class="mlb-awakening awakening-value"><?php echo $mamlb ?></span>
                                            <span class="five-star-awakening awakening-value"><?php echo $ma5 ?></span>
                                            <span class="four-star-awakening awakening-value"><?php echo $ma4 ?></span>
                                            <span class="three-star-awakening awakening-value"><?php echo $ma3 ?></span>
                                            <span class="two-star-awakening awakening-value"><?php echo $ma2 ?></span>
                                            <span class="one-star-awakening awakening-value"><?php echo $ma1 ?></span>
                                        </th>
                                        <th>
                                            <div class="high-grade-attack-stone"></div><br>
                                            <span class="mlb-awakening awakening-value"><?php echo $hamlb ?></span>
                                            <span class="five-star-awakening awakening-value"><?php echo $ha5 ?></span>
                                            <span class="four-star-awakening awakening-value"><?php echo $ha4 ?></span>
                                            <span class="three-star-awakening awakening-value"><?php echo $ha3 ?></span>
                                            <span class="two-star-awakening awakening-value"><?php echo $ha2 ?></span>
                                            <span class="one-star-awakening awakening-value"><?php echo $ha1 ?></span>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th class="ability-header left-header"><span class="header-spacing">Def</span></th>
                                        <th>
                                            <div class="low-grade-def-stone"></div><br>
                                            <span class="mlb-awakening awakening-value"><?php echo $ldmlb ?></span>
                                            <span class="five-star-awakening awakening-value"><?php echo $ld5 ?></span>
                                            <span class="four-star-awakening awakening-value"><?php echo $ld4 ?></span>
                                            <span class="three-star-awakening awakening-value"><?php echo $ld3 ?></span>
                                            <span class="two-star-awakening awakening-value"><?php echo $ld2 ?></span>
                                            <span class="one-star-awakening awakening-value"><?php echo $ld1 ?></span>
                                        </th>
                                        <th>
                                            <div class="mid-grade-def-stone"></div><br>
                                            <span class="mlb-awakening awakening-value"><?php echo $mdmlb ?></span>
                                            <span class="five-star-awakening awakening-value"><?php echo $md5 ?></span>
                                            <span class="four-star-awakening awakening-value"><?php echo $md4 ?></span>
                                            <span class="three-star-awakening awakening-value"><?php echo $md3 ?></span>
                                            <span class="two-star-awakening awakening-value"><?php echo $md2 ?></span>
                                            <span class="one-star-awakening awakening-value"><?php echo $md1 ?></span>
                                        </th>
                                        <th>
                                            <div class="high-grade-def-stone"></div><br>
                                            <span class="mlb-awakening awakening-value"><?php echo $hdmlb ?></span>
                                            <span class="five-star-awakening awakening-value"><?php echo $hd5 ?></span>
                                            <span class="four-star-awakening awakening-value"><?php echo $hd4 ?></span>
                                            <span class="three-star-awakening awakening-value"><?php echo $hd3 ?></span>
                                            <span class="two-star-awakening awakening-value"><?php echo $hd2 ?></span>
                                            <span class="one-star-awakening awakening-value"><?php echo $hd1 ?></span>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th class="ability-header left-header"><span class="header-spacing">HP</span></th>
                                        <th>
                                            <div class="low-grade-hp-stone"></div><br>
                                            <span class="mlb-awakening awakening-value"><?php echo $lhmlb ?></span>
                                            <span class="five-star-awakening awakening-value"><?php echo $lh5 ?></span>
                                            <span class="four-star-awakening awakening-value"><?php echo $lh4 ?></span>
                                            <span class="three-star-awakening awakening-value"><?php echo $lh3 ?></span>
                                            <span class="two-star-awakening awakening-value"><?php echo $lh2 ?></span>
                                            <span class="one-star-awakening awakening-value"><?php echo $lh1 ?></span>
                                        </th>
                                        <th>
                                            <div class="mid-grade-hp-stone"></div><br>
                                            <span class="mlb-awakening awakening-value"><?php echo $mhmlb ?></span>
                                            <span class="five-star-awakening awakening-value"><?php echo $mh5 ?></span>
                                            <span class="four-star-awakening awakening-value"><?php echo $mh4 ?></span>
                                            <span class="three-star-awakening awakening-value"><?php echo $mh3 ?></span>
                                            <span class="two-star-awakening awakening-value"><?php echo $mh2 ?></span>
                                            <span class="one-star-awakening awakening-value"><?php echo $mh1 ?></span>
                                        </th>
                                        <th>
                                            <div class="high-grade-hp-stone"></div><br>
                                            <span class="mlb-awakening awakening-value"><?php echo $hhmlb ?></span>
                                            <span class="five-star-awakening awakening-value"><?php echo $hh5 ?></span>
                                            <span class="four-star-awakening awakening-value"><?php echo $hh4 ?></span>
                                            <span class="three-star-awakening awakening-value"><?php echo $hh3 ?></span>
                                            <span class="two-star-awakening awakening-value"><?php echo $hh2 ?></span>
                                            <span class="one-star-awakening awakening-value"><?php echo $hh1 ?></span>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th class="ability-header left-header"><span class="header-spacing">Dream</span></th>
                                        <th>
                                            <div class="low-grade-dream-stone"></div><br>
                                            <span class="mlb-awakening awakening-value"><?php echo $ldrmlb ?></span>
                                            <span class="five-star-awakening awakening-value"><?php echo $ldr5 ?></span>
                                            <span class="four-star-awakening awakening-value"><?php echo $ldr4 ?></span>
                                            <span class="three-star-awakening awakening-value"><?php echo $ldr3 ?></span>
                                            <span class="two-star-awakening awakening-value"><?php echo $ldr2 ?></span>
                                            <span class="one-star-awakening awakening-value"><?php echo $ldr1 ?></span>
                                        </th>
                                        <th>
                                            <div class="mid-grade-dream-stone"></div><br>
                                            <span class="mlb-awakening awakening-value"><?php echo $mdrmlb ?></span>
                                            <span class="five-star-awakening awakening-value"><?php echo $mdr5 ?></span>
                                            <span class="four-star-awakening awakening-value"><?php echo $mdr4 ?></span>
                                            <span class="three-star-awakening awakening-value"><?php echo $mdr3 ?></span>
                                            <span class="two-star-awakening awakening-value"><?php echo $mdr2 ?></span>
                                            <span class="one-star-awakening awakening-value"><?php echo $mdr1 ?></span>
                                        </th>
                                        <th>
                                            <div class="high-grade-dream-stone"></div><br>
                                            <span class="mlb-awakening awakening-value"><?php echo $hdrmlb ?></span>
                                            <span class="five-star-awakening awakening-value"><?php echo $hdr5 ?></span>
                                            <span class="four-star-awakening awakening-value"><?php echo $hdr4 ?></span>
                                            <span class="three-star-awakening awakening-value"><?php echo $hdr3 ?></span>
                                            <span class="two-star-awakening awakening-value"><?php echo $hdr2 ?></span>
                                            <span class="one-star-awakening awakening-value"><?php echo $hdr1 ?></span>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th class="ability-header left-header"><span class="header-spacing">Legendary</span></th>
                                        <th colspan="3">
                                            <div class="legendary-awakening-stone"></div><br>
                                            <span class="mlb-awakening awakening-value"><?php echo $lawmlb ?></span>
                                            <span class="five-star-awakening awakening-value"><?php echo $law5 ?></span>
                                            <span class="four-star-awakening awakening-value"><?php echo $law4 ?></span>
                                            <span class="three-star-awakening awakening-value"><?php echo $law3 ?></span>
                                            <span class="two-star-awakening awakening-value"><?php echo $law2 ?></span>
                                            <span class="one-star-awakening awakening-value"><?php echo $law1 ?></span>
                                        </th>
                                    </tr>
                                </table>
                                <script>
                                    jQuery(function($) {
                                        $(".awakening-value").hide();
                                        $(".mlb-awakening").show();
                                        $(".tier-select").change(function(){
                                            if(this.value == 'five-star') {
                                                $(".awakening-value").hide();
                                                $(".five-star-awakening").show();
                                            }
                                            else if(this.value == 'four-star') {
                                                $(".awakening-value").hide();
                                                $(".four-star-awakening").show();
                                            }
                                            else if(this.value == 'three-star') {
                                                $(".awakening-value").hide();
                                                $(".three-star-awakening").show();
                                            }
                                            else if(this.value == 'two-star') {
                                                $(".awakening-value").hide();
                                                $(".two-star-awakening").show();
                                            }
                                            else if(this.value == 'one-star') {
                                                $(".awakening-value").hide();
                                                $(".one-star-awakening").show();
                                            }
                                            else if(this.value == 'MLB') {
                                                $(".awakening-value").hide();
                                                $(".mlb-awakening").show();
                                            }
                                        });
                                    });
                                </script>
                                </div>
                                </div>
                            <?php endif; ?>
                            <?php $posts = get_field('costumes'); ?>
                            <?php if ($posts) : ?>
                                <div class="section-box">
                                <h4>Costumes<span class="fa fa-plus"></h4>
                                <div class="section-content">
                                <div class="owl-carousel owl-theme carousel-main">
                                <?php 
                                foreach ($posts as $post) {
                                    echo '<a href="'.get_the_permalink().'"><div style="background-image:url('.get_the_post_thumbnail_url().');background-size:cover;width:100%;padding-bottom:100%;">';
                                    echo '<div class="costume-name">'.get_the_title().'</div>';
                                    $gems_cost = get_field('cost', $post);
                                    $battle_medal_cost = get_field('battle_medal_shop_cost', $post);
                                    $how_to_obtain = get_field('how_to_obtain', $post);
                                    $stage_location = get_field('stage_location', $post);
                                    $bottle_cap_cost = get_field('bottle_cap_cost', $post);
                                    $mystic_thread_cost = get_field('mystic_thread_cost', $post);
                                    $achievement = get_field('achievement', $post);

                                    if($how_to_obtain)
                                        {
                                            foreach($how_to_obtain as $source) {
                                                if ($source == 'World Completion') {
                                                    $world_completed = true;
                                                }
                                            }
                                        }
                                    
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
                                }
                                ?>
                                </div>
                                <?php wp_reset_postdata(); ?>
                                </div>
                                </div>
                            <?php endif; ?>
                            <?php if($hero_banners) : ?>
                                <div class="section-box">
                                <h4>Banner History<span class="fa fa-plus"></h4>
                                <div class="section-content">
                                <?php 
                                    $ordered_banners = array();
                                    foreach ($hero_banners as $banner) {
                                        array_push($ordered_banners, array(
                                            'title' => get_the_title($banner),
                                            'permalink' => get_the_permalink($banner),
                                            'thumbnail' =>  get_the_post_thumbnail_url($banner,'thumbnail'),
                                            'start_date' => get_field('date_start', $banner),
                                            'end_date'  => get_field('date_end', $banner)
                                        ));
                                    }
                                    array_multisort(array_map('strtotime',array_column($ordered_banners,'start_date')), SORT_DESC, $ordered_banners);
                                ?>
                                <table class="hero-abilities-table">
                                    <?php 
                                    foreach ($ordered_banners as $banner) {
                                        $start_date = $banner['start_date'];
                                        $end_date = $banner['end_date'];
                                        $today = date('m/d/Y');
                                        $current = '';
                                        if (($today >= $start_date) && ($today <= $end_date)){
                                            $current = 'current-banner';
                                        }
                                        echo '<tr class="'.$current.'"><th class="ability-header" style="background-image:url('.$banner['thumbnail'].'); background-size: cover;background-repeat: no-repeat;width: 70px; height: 70px;"></th><td class="banner-name"><a class="bold" href="'.$banner['permalink'].'">'.$banner['title'].'</a></td>';
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
                        </div>
                        <div class="analysis-section">
                        <?php if($rating>0) : ?>
                                <div class="section-box">
                                <h4>Ratings<span class="fa fa-plus"></h4>
                                <div class="section-content">
                                <table class="hero-abilities-table rating-table">
                                    <tr><th class="ability-header" colspan="4">Overall</th></tr>
                                    <?php $overall_letter = get_rating_letter($rating); ?>
                                    <tr>
                                        <td colspan="4">
                                            <span class="content-score <?php echo 'rating-'.$overall_letter; ?>"><?php echo $overall_letter; ?></span>
                                            <span class="rating-number"><?php echo $rating ?></span><span class="max-number">/10</span>
                                            <span class="rating-count">
                                                <?php 
                                                    $ratings = $wpdb->get_results("SELECT * FROM bitnami_wordpress.discord_ratings WHERE hero_id = '".get_the_ID()."';");
                                                    echo 'Based on <a href="/ratings/?hero='.get_the_id().'"><strong>'.count($ratings).'</strong></a> submitted ratings.';
                                                ?>
                                            </span>
                                        </td>
                                    </tr>
                                    <tr><th class="ability-header">Arena</th><th class="ability-header">Colosseum</th><th class="ability-header">Raid</th><th class="ability-header">Co-op</th></tr>
                                    <tr>
                                        <?php 
                                            $arena_letter = get_rating_letter($arena_rating);
                                            $colo_letter = get_rating_letter($colo_rating);
                                            $raid_letter = get_rating_letter($raid_rating);
                                            $coop_letter = get_rating_letter($coop_rating);
                                            $story_letter = get_rating_letter($story_rating);
                                            $kamazone_letter = get_rating_letter($kamazone_rating);
                                            $orbital_letter = get_rating_letter($orbital_rating);
                                            $tower_letter = get_rating_letter($tower_rating);    
                                        ?>
                                        <td>
                                            <span class="content-score <?php echo 'rating-'.$arena_letter; ?>"><?php echo $arena_letter; ?></span>
                                            <span class="rating-number"><?php echo isset($arena_rating) ? $arena_rating : '?' ?></span><span class="max-number">/10</span>
                                            <?php /*if(array_key_exists(get_the_title(),$naCurrentColoMeta)) : ?>
                                                <table class="hero-usage-section">
                                                    <tr>
                                                        <td>
                                                            <span class="hero-usage-region-header">NA Usage</span>
                                                            <?php $currentValue = $naCurrentColoMeta[get_the_title()]; ?>
                                                            <span class="hero-usage-value"><?php echo $currentValue; ?>%</span>
                                                            <?php
                                                                if (array_key_exists(get_the_title(),$naOldColoMeta)) {
                                                                    $oldValue = $naOldColoMeta[get_the_title()];
                                                                } 
                                                                else {
                                                                    $oldValue = 0;
                                                                }
                                                                if ($currentValue > $oldValue) {
                                                                    $change = $currentValue - $oldValue;
                                                                    echo '<span class="hero-usage-change-positive"><i class="fas fa-caret-up"></i> '.$change.'</span>';
                                                                }
                                                                else {
                                                                    $change = $oldValue - $currentValue;
                                                                    echo '<span class="hero-usage-change-negative"><i class="fas fa-caret-down"></i> '.$change.'</span>';
                                                                }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <span class="hero-usage-region-header">KR Usage</span>
                                                            <?php $currentValue = $krCurrentColoMeta[get_the_title()]; ?>
                                                            <span class="hero-usage-value"><?php echo $currentValue; ?>%</span>
                                                            <?php
                                                                if (array_key_exists(get_the_title(),$krOldColoMeta)) {
                                                                    $oldValue = $krOldColoMeta[get_the_title()];
                                                                } 
                                                                else {
                                                                    $oldValue = 0;
                                                                }
                                                                if ($currentValue > $oldValue) {
                                                                    $change = $currentValue - $oldValue;
                                                                    echo '<span class="hero-usage-change-positive"><i class="fas fa-caret-up"></i> '.$change.'</span>';
                                                                }
                                                                else {
                                                                    $change = $oldValue - $currentValue;
                                                                    echo '<span class="hero-usage-change-negative"><i class="fas fa-caret-down"></i> '.$change.'</span>';
                                                                }
                                                            ?>
                                                        </td>
                                                    </tr>
                                                </table>
                                            <?php endif; */ ?>
                                        </td>
                                        <td>
                                            <span class="content-score <?php echo 'rating-'.$colo_letter; ?>"><?php echo $colo_letter; ?></span>
                                            <span class="rating-number"><?php echo isset($colo_rating) ? $colo_rating : '?' ?></span><span class="max-number">/10</span>
                                            <?php /* if(array_key_exists(get_the_title(),$naCurrentArenaMeta)) : ?>
                                                <table class="hero-usage-section">
                                                    <tr>
                                                        <td>
                                                            <span class="hero-usage-region-header">NA Usage</span>
                                                            <?php $currentValue = $naCurrentArenaMeta[get_the_title()]; ?>
                                                            <span class="hero-usage-value"><?php echo $currentValue; ?>%</span>
                                                            <?php
                                                                if (array_key_exists(get_the_title(),$naOldArenaMeta)) {
                                                                    $oldValue = $naOldArenaMeta[get_the_title()];
                                                                } 
                                                                else {
                                                                    $oldValue = 0;
                                                                }
                                                                if ($currentValue > $oldValue) {
                                                                    $change = $currentValue - $oldValue;
                                                                    echo '<span class="hero-usage-change-positive"><i class="fas fa-caret-up"></i> '.$change.'</span>';
                                                                }
                                                                else {
                                                                    $change = $oldValue - $currentValue;
                                                                    echo '<span class="hero-usage-change-negative"><i class="fas fa-caret-down"></i> '.$change.'</span>';
                                                                }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <span class="hero-usage-region-header">KR Usage</span>
                                                            <?php $currentValue = $krCurrentArenaMeta[get_the_title()]; ?>
                                                            <span class="hero-usage-value"><?php echo $currentValue; ?>%</span>
                                                            <?php
                                                                if (array_key_exists(get_the_title(),$krOldArenaMeta)) {
                                                                    $oldValue = $krOldArenaMeta[get_the_title()];
                                                                } 
                                                                else {
                                                                    $oldValue = 0;
                                                                }
                                                                if ($currentValue > $oldValue) {
                                                                    $change = $currentValue - $oldValue;
                                                                    echo '<span class="hero-usage-change-positive"><i class="fas fa-caret-up"></i> '.$change.'</span>';
                                                                }
                                                                else {
                                                                    $change = $oldValue - $currentValue;
                                                                    echo '<span class="hero-usage-change-negative"><i class="fas fa-caret-down"></i> '.$change.'</span>';
                                                                }
                                                            ?>
                                                        </td>
                                                    </tr>
                                                </table>
                                            <?php endif; */?>
                                        </td>
                                        <td>
                                            <span class="content-score <?php echo 'rating-'.$raid_letter; ?>"><?php echo $raid_letter; ?></span>
                                            <span class="rating-number"><?php echo isset($raid_rating) ? $raid_rating : '?' ?></span><span class="max-number">/10</span>
                                        </td>
                                        <td>
                                            <span class="content-score <?php echo 'rating-'.$coop_letter; ?>"><?php echo $coop_letter; ?></span>
                                            <span class="rating-number"><?php echo isset($coop_rating) ? $coop_rating : '?' ?></span><span class="max-number">/10</span>
                                        </td>
                                    </tr>
                                    <tr><th class="ability-header">Story</th><th class="ability-header">Kama-ZONE</th><th class="ability-header">Orbital Lift</th><th class="ability-header">Towers</th></tr>
                                    <tr>
                                        <td><span class="content-score <?php echo 'rating-'.$story_letter; ?>"><?php echo $story_letter; ?></span><span class="rating-number"><?php echo isset($story_rating) ? $story_rating : '?' ?></span><span class="max-number">/10</span></td>
                                        <td><span class="content-score <?php echo 'rating-'.$kamazone_letter; ?>"><?php echo $kamazone_letter; ?></span><span class="rating-number"><?php echo isset($kamazone_rating) ? $kamazone_rating : '?' ?></span><span class="max-number">/10</span></td>
                                        <td><span class="content-score <?php echo 'rating-'.$orbital_letter; ?>"><?php echo $orbital_letter; ?></span><span class="rating-number"><?php echo isset($orbital_rating) ? $orbital_rating : '?' ?></span><span class="max-number">/10</span></td>
                                        <td><span class="content-score <?php echo 'rating-'.$tower_letter; ?>"><?php echo $tower_letter; ?></span><span class="rating-number"><?php echo isset($tower_rating) ? $tower_rating : '?' ?></span><span class="max-number">/10</span></td>
                                        <?php /*
                                        <td class="content-ratings" colspan="3">
                                                <div class="content-rating"><span class="content-label">Story</span><span class="content-score <?php echo 'rating-'.$story; ?>"><?php echo $story; ?></span></div>
                                                <div class="content-rating"><span class="content-label">Guild Raid</span><span class="content-score <?php echo 'rating-'.$raid; ?>"><?php echo $raid; ?></span></div>
                                                <div class="content-rating"><span class="content-label">Kama-ZONE</span><span class="content-score <?php echo 'rating-'.$kamazone; ?>"><?php echo $kamazone; ?></span></div>
                                                <div class="content-rating"><span class="content-label">Orbital Lift</span><span class="content-score <?php echo 'rating-'.$orbital; ?>"><?php echo $orbital; ?></span></div>
                                                <div class="content-rating"><span class="content-label">Towers</span><span class="content-score <?php echo 'rating-'.$tower; ?>"><?php echo $tower; ?></span></div>
                                        </td>
                                        */ ?>
                                    </tr>
                                </table>
                                <script>
                                jQuery(".rating-number").each(function(i){
                                    jQuery(this).css("color",heatmap_color_for(parseInt(jQuery(this).text())));
                                });

                                jQuery(".rating-number-overall").each(function(i){
                                    jQuery(this).css("color",heatmap_color_for_100(parseInt(jQuery(this).text())));
                                });
                                

                                function heatmap_color_for(value) {
                                    var r = 255-(10*(10-value));
                                    var g = 55+(20*(10-value));
                                    var b = 0;

                                    return 'rgb('+r+', '+g+', '+b+')';
                                }

                                function heatmap_color_for_100(value) {
                                    var r = 255-(100-value);
                                    var g = 55+(2*(100-value));
                                    var b = 0;

                                    return 'rgb('+r+', '+g+', '+b+')';
                                }
                                </script>
                                </div>
                                </div>
                                <?php if(count($pros) > 1 || count($cons) > 1) : ?>
                                <div class="section-box">
                                    <h4>Quick Evaluation<span class="fa fa-plus"></h4>
                                    <div class="section-content">
                                        <ul class="fa-ul">
                                            <div class="positives">
                                                <?php
                                                    foreach($pros as $pro) {
                                                        if ($pro != '') {
                                                            echo '<li><span class="fa-li"><i class="fas fa-thumbs-up"></i></span> '.$pro.'</li>';
                                                        }
                                                    }
                                                ?>
                                            </div>
                                            <div class="negatives">
                                                <?php
                                                    foreach($cons as $con) {
                                                        if ($con != '') {
                                                            echo '<li><span class="fa-li"><i class="fas fa-thumbs-down"></i></span> '.$con.'</li>';
                                                        }
                                                    }
                                                ?>
                                            </div>
                                        </ul>
                                    </div>
                                </div>
                                <?php endif; ?>
                                <?php if($good_matchups || $bad_matchups) : ?>
                                <div class="section-box">
                                    <h4>Arena Matchups<span class="fa fa-plus"></h4>
                                    <div class="section-content">
                                        <div class="matchup-selection">
                                            <div class="good-matchups">
                                                <span class="good-matchup-header"><?php echo $hero_name ?> is strong against...</span>
                                                <?php 
                                                foreach ($good_matchups as $matchup) {
                                                    echo '<img class="matchup-thumb good-matchup-thumb" id="'.$matchup.'" src="'.get_the_post_thumbnail_url(get_field('underdog', $matchup),'thumbnail').'">';
                                                }
                                                ?>
                                            </div>
                                            <div class="bad-matchups">
                                                <span class="bad-matchup-header"><?php echo $hero_name ?> is weak against...</span>
                                                <?php 
                                                foreach ($bad_matchups as $matchup) {
                                                    echo '<img class="matchup-thumb bad-matchup-thumb" id="'.$matchup.'" src="'.get_the_post_thumbnail_url(get_field('favourite', $matchup),'thumbnail').'">';
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        <?php 
                                        foreach ($good_matchups as $matchup) : 
                                            $opponent = get_field('underdog', $matchup);
                                            $opponent_role = get_field('bio_fields_role', $opponent);
                                            $opponent_element = get_field('bio_fields_element', $opponent);
                                            $videos = get_field('videos', $matchup);
                                        ?>
                                        <div class="hero-matchup-info" id="matchup-<?php echo $matchup ?>">
                                            <div class="hero-matchup e-<?php echo $opponent_element ?>">
                                                <div class="hero-identity">
                                                    <a href="<?php echo get_the_permalink($opponent) ?>"><div class="hero-image" style="background-image:url('<?php echo get_the_post_thumbnail_url($opponent, 'thumbnail') ?>');"><?php getRoleIcon($opponent_role) ?><?php getElementIcon($opponent_element) ?></div><?php echo get_the_title($opponent) ?></a>
                                                </div>
                                                <?php /*<div class="hero-usage-stats">
                                                    <?php if(array_key_exists(get_the_title($opponent),$naCurrentArenaMeta)) : ?>
                                                        <table class="hero-usage-section">
                                                            <tr>
                                                                <td>
                                                                    <span class="hero-usage-region-header">NA Usage</span>
                                                                    <?php $currentValue = $naCurrentArenaMeta[get_the_title($opponent)]; ?>
                                                                    <span class="hero-usage-value"><?php echo $currentValue; ?>%</span>
                                                                    <?php
                                                                        if (array_key_exists(get_the_title($opponent),$naOldArenaMeta)) {
                                                                            $oldValue = $naOldArenaMeta[get_the_title($opponent)];
                                                                        } 
                                                                        else {
                                                                            $oldValue = 0;
                                                                        }
                                                                        if ($currentValue > $oldValue) {
                                                                            $change = $currentValue - $oldValue;
                                                                            echo '<span class="hero-usage-change-positive"><i class="fas fa-caret-up"></i> '.$change.'</span>';
                                                                        }
                                                                        else {
                                                                            $change = $oldValue - $currentValue;
                                                                            echo '<span class="hero-usage-change-negative"><i class="fas fa-caret-down"></i> '.$change.'</span>';
                                                                        }
                                                                    ?>
                                                                </td>
                                                                <td>
                                                                    <span class="hero-usage-region-header">KR Usage</span>
                                                                    <?php $currentValue = $krCurrentArenaMeta[get_the_title($opponent)]; ?>
                                                                    <span class="hero-usage-value"><?php echo $currentValue; ?>%</span>
                                                                    <?php
                                                                        if (array_key_exists(get_the_title($opponent),$krOldArenaMeta)) {
                                                                            $oldValue = $krOldArenaMeta[get_the_title($opponent)];
                                                                        } 
                                                                        else {
                                                                            $oldValue = 0;
                                                                        }
                                                                        if ($currentValue > $oldValue) {
                                                                            $change = $currentValue - $oldValue;
                                                                            echo '<span class="hero-usage-change-positive"><i class="fas fa-caret-up"></i> '.$change.'</span>';
                                                                        }
                                                                        else {
                                                                            $change = $oldValue - $currentValue;
                                                                            echo '<span class="hero-usage-change-negative"><i class="fas fa-caret-down"></i> '.$change.'</span>';
                                                                        }
                                                                    ?>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    <?php endif; ?>
                                                </div> */ ?>
                                            </div>
                                            <div class="matchup-summary">
                                                <h6><strong>Strategy</strong></h6>
                                                <?php echo get_field('favourite_strategy', $matchup); ?>
                                            </div>
                                            <?php if(have_rows('videos', $matchup)): ?>
                                                <div class="matchup-videos">
                                                    <h6><strong>Videos</strong></h6>
                                                    <div class="owl-carousel owl-theme carousel-main">
                                                        <?php 
                                                        while(have_rows('videos', $matchup)) {
                                                            the_row(); 
                                                            echo '<div class="item-video"><a class="owl-video" style="height: 150px;" href="'.get_sub_field('video').'"></a></div>';
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        <?php 
                                        endforeach;
                                        ?>
                                        <?php 
                                        foreach ($bad_matchups as $matchup) : 
                                            $opponent = get_field('favourite', $matchup);
                                            $opponent_role = get_field('bio_fields_role', $opponent);
                                            $opponent_element = get_field('bio_fields_element', $opponent);
                                            $videos = get_field('videos', $matchup);
                                        ?>
                                        <div class="hero-matchup-info" id="matchup-<?php echo $matchup ?>">
                                            <div class="hero-matchup e-<?php echo $opponent_element ?>">
                                                <div class="hero-identity">
                                                    <a href="<?php echo get_the_permalink($opponent) ?>"><div class="hero-image" style="background-image:url('<?php echo get_the_post_thumbnail_url($opponent, 'thumbnail') ?>');"><?php getRoleIcon($opponent_role) ?><?php getElementIcon($opponent_element) ?></div><?php echo get_the_title($opponent) ?></a>
                                                </div>
                                                <?php /* <div class="hero-usage-stats">
                                                    <?php if(array_key_exists(get_the_title($opponent),$naCurrentArenaMeta)) : ?>
                                                        <table class="hero-usage-section">
                                                            <tr>
                                                                <td>
                                                                    <span class="hero-usage-region-header">NA Usage</span>
                                                                    <?php $currentValue = $naCurrentArenaMeta[get_the_title($opponent)]; ?>
                                                                    <span class="hero-usage-value"><?php echo $currentValue; ?>%</span>
                                                                    <?php
                                                                        if (array_key_exists(get_the_title($opponent),$naOldArenaMeta)) {
                                                                            $oldValue = $naOldArenaMeta[get_the_title($opponent)];
                                                                        } 
                                                                        else {
                                                                            $oldValue = 0;
                                                                        }
                                                                        if ($currentValue > $oldValue) {
                                                                            $change = $currentValue - $oldValue;
                                                                            echo '<span class="hero-usage-change-positive"><i class="fas fa-caret-up"></i> '.$change.'</span>';
                                                                        }
                                                                        else {
                                                                            $change = $oldValue - $currentValue;
                                                                            echo '<span class="hero-usage-change-negative"><i class="fas fa-caret-down"></i> '.$change.'</span>';
                                                                        }
                                                                    ?>
                                                                </td>
                                                                <td>
                                                                    <span class="hero-usage-region-header">KR Usage</span>
                                                                    <?php $currentValue = $krCurrentArenaMeta[get_the_title($opponent)]; ?>
                                                                    <span class="hero-usage-value"><?php echo $currentValue; ?>%</span>
                                                                    <?php
                                                                        if (array_key_exists(get_the_title($opponent),$krOldArenaMeta)) {
                                                                            $oldValue = $krOldArenaMeta[get_the_title($opponent)];
                                                                        } 
                                                                        else {
                                                                            $oldValue = 0;
                                                                        }
                                                                        if ($currentValue > $oldValue) {
                                                                            $change = $currentValue - $oldValue;
                                                                            echo '<span class="hero-usage-change-positive"><i class="fas fa-caret-up"></i> '.$change.'</span>';
                                                                        }
                                                                        else {
                                                                            $change = $oldValue - $currentValue;
                                                                            echo '<span class="hero-usage-change-negative"><i class="fas fa-caret-down"></i> '.$change.'</span>';
                                                                        }
                                                                    ?>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    <?php endif; ?>
                                                </div> */ ?>
                                            </div>
                                            <div class="matchup-summary">
                                                <h6><strong>Strategy</strong></h6>
                                                <?php echo get_field('underdog_strategy', $matchup); ?>
                                            </div>
                                            <?php if(have_rows('videos', $matchup)): ?>
                                                <div class="matchup-videos">
                                                    <h6><strong>Videos</strong></h6>
                                                    <div class="owl-carousel owl-theme carousel-main">
                                                        <?php 
                                                        while(have_rows('videos', $matchup)) {
                                                            the_row(); 
                                                            echo '<div class="item-video"><a class="owl-video" style="height: 150px;" href="'.get_sub_field('video').'"></a></div>';
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        <?php 
                                        endforeach;
                                        ?>
                                    </div>
                                </div>
                                <?php endif; ?>
                                <script>
                                    jQuery(function($) {
                                        $('.hero-matchup-info').hide();
                                        $('.matchup-thumb').click(function() {
                                            $('.matchup-thumb').removeClass('selected-matchup');
                                            $(this).addClass('selected-matchup');
                                            $('.hero-matchup-info').hide();
                                            $('#matchup-'+$(this).attr("id")).show();
                                        });
                                    });
                                </script>
                            <?php endif; ?>
                        </div>
                        <div class="build-section">
                        <?php if(have_rows('stat_priorities')): ?>
                            <div class="section-box">
                                <h4>Stat Priority<span class="fa fa-plus"></h4>
                                <div class="section-content">
                                    <?php 
                                    $first_item = true;
                                    while(have_rows('stat_priorities')) {
                                        the_row(); 
                                        if($first_item) {
                                            $first_item = false;
                                        }
                                        else {
                                            echo '<h6 class="separator"><span>OR</span></h6>';
                                        }
                                        $build_name = get_sub_field('build_name');
                                        $stat_priority = get_sub_field('stat_priority');
                                        $explanation = get_sub_field('explanation');
                                        $counter = 0;
                                        echo '<div class="suggested-item"><strong class="stat-build-title">'.$build_name.'</strong><div class="stat-build-container">';
                                        foreach ($stat_priority as $stat) {
                                            $counter++;
                                            $stat_name = get_the_title($stat);
                                            $colour_code = "";
                                            echo '<div class="build-stat"><span class="stat-priority-number">'.$counter.'</span><img class="stat-icon" src="'.get_the_post_thumbnail_url($stat).'"><span class="stat-name-text stat-'.str_replace(' ','-',$stat_name).'">'.$stat_name.'</span></div>';
                                        }
                                        echo '</div><div class="stat-priority-explanation">'.$explanation.'</div></div>';
                                    }
                                    ?>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if(have_rows('build_guide_fields_suggested_weapons')): ?>
                                <div class="section-box">
                                    <h4>Suggested Weapon<span class="fa fa-plus"></h4>
                                    <div class="section-content">
                                    <?php 
                                    $first_item = true;
                                    while(have_rows('build_guide_fields_suggested_weapons')) {
                                        the_row(); 
                                        if($first_item) {
                                            $first_item = false;
                                        }
                                        else {
                                            echo '<h6 class="separator"><span>OR</span></h6>';
                                        }
                                        $suggested_weapon = get_sub_field('suggested_weapon');
                                        $suggested_element = get_field('element', $suggested_weapon);
                                        $suggested_max_atk = get_field('max_atk', $suggested_weapon);
                                        $suggested_min_atk = get_field('min_atk', $suggested_weapon);
                                        $suggested_max_dps = get_field('dps', $suggested_weapon);
                                        $suggested_min_dps = get_field('min_dps', $suggested_weapon);

                                        $suggested_exclusive = get_field('exclusive', $suggested_weapon);

                                        $suggested_magazine = get_field('magazine', $suggested_weapon);
                                        $suggested_atk = get_field('atk', $suggested_weapon);
                                        $suggested_crit = get_field('crit_chance', $suggested_weapon);
                                        $suggested_dr = get_field('damage_reduction', $suggested_weapon);
                                        $suggested_def_flat = get_field('def_flat', $suggested_weapon);
                                        $suggested_def = get_field('def', $suggested_weapon);
                                        $suggested_heal_flat = get_field('heal_flat', $suggested_weapon);
                                        $suggested_heal = get_field('heal_percent', $suggested_weapon);
                                        $suggested_hp = get_field('hp', $suggested_weapon);
                                        $suggested_atk_on_kill = get_field('atk_on_kill', $suggested_weapon);
                                        $suggested_hp_on_kill = get_field('hp_on_kill', $suggested_weapon);
                                        $suggested_skill_regen_on_kill = get_field('skill_regen_on_kill', $suggested_weapon);
                                        $suggested_shield_on_start = get_field('shield_on_start', $suggested_weapon);
                                        $suggested_shield_on_kill = get_field('shield_on_kill', $suggested_weapon);
                                        $suggested_skill_damage = get_field('skill_damage', $suggested_weapon);
                                        $suggested_skill_regen_speed = get_field('skill_regen_speed', $suggested_weapon);
                                        $suggested_earth_type_atk = get_field('earth_type_atk', $suggested_weapon);
                                        $suggested_fire_type_atk = get_field('fire_type_atk', $suggested_weapon);
                                        $suggested_water_type_atk = get_field('water_type_atk', $suggested_weapon);
                                        $suggested_dark_type_atk = get_field('dark_type_atk', $suggested_weapon);
                                        $suggested_light_type_atk = get_field('light_type_atk', $suggested_weapon);
                                        $suggested_basic_type_atk = get_field('basic_type_atk', $suggested_weapon);
                                        $suggested_options = get_field('options', $suggested_weapon);

                                        $suggested_sub_atk = get_field('sub_atk', $suggested_weapon);
                                        $suggested_sub_crit = get_field('sub_crit_chance', $suggested_weapon);
                                        $suggested_sub_dr = get_field('sub_damage_reduction', $suggested_weapon);
                                        $suggested_sub_def_flat = get_field('sub_def_flat', $suggested_weapon);
                                        $suggested_sub_def = get_field('sub_def', $suggested_weapon);
                                        $suggested_sub_heal_flat = get_field('sub_heal_flat', $suggested_weapon);
                                        $suggested_sub_heal = get_field('sub_heal_percent', $suggested_weapon);
                                        $suggested_sub_hp = get_field('sub_hp', $suggested_weapon);
                                        $suggested_sub_atk_on_kill = get_field('sub_atk_on_kill', $suggested_weapon);
                                        $suggested_sub_hp_on_kill = get_field('sub_hp_on_kill', $suggested_weapon);
                                        $suggested_sub_skill_regen_on_kill = get_field('sub_skill_regen_on_kill', $suggested_weapon);
                                        $suggested_sub_shield_on_start = get_field('sub_shield_on_start', $suggested_weapon);
                                        $suggested_sub_shield_on_kill = get_field('sub_shield_on_kill', $suggested_weapon);
                                        $suggested_sub_skill_damage = get_field('sub_skill_damage', $suggested_weapon);
                                        $suggested_sub_skill_regen_speed = get_field('sub_skill_regen_speed', $suggested_weapon);
                                        $suggested_sub_earth_type_atk = get_field('sub_earth_type_atk', $suggested_weapon);
                                        $suggested_sub_fire_type_atk = get_field('sub_fire_type_atk', $suggested_weapon);
                                        $suggested_sub_water_type_atk = get_field('sub_water_type_atk', $suggested_weapon);
                                        $suggested_sub_dark_type_atk = get_field('sub_dark_type_atk', $suggested_weapon);
                                        $suggested_sub_light_type_atk = get_field('sub_light_type_atk', $suggested_weapon);
                                        $suggested_sub_basic_type_atk = get_field('sub_basic_type_atk', $suggested_weapon);
                                        $suggested_sub_options = get_field('sub_options', $suggested_weapon);

                                        $suggested_rarity = get_field('rarity', $suggested_weapon);

                                        $suggested_lb5 = get_field('lb5_option', $suggested_weapon);
                                        $suggested_lb5_value = get_field('lb5_value', $suggested_weapon);
                                        $suggested_skill_name = get_field('weapon_skill_name', $suggested_weapon);
                                        $suggested_skill_name = preg_replace('/Lv\.\d*/i', '<span class="skill-level">$0</span>', $suggested_skill_name);
                                        $suggested_skill_atk = get_field('weapon_skill_atk', $suggested_weapon);
                                        $suggested_skill_regen_time = get_field('weapon_skill_regen_time', $suggested_weapon);
                                        $suggested_skill_description = get_field('weapon_skill_description', $suggested_weapon);
                                        $suggested_skill_description = str_replace("injured", '<span class="green">injured</span>', $suggested_skill_description);
                                        $suggested_skill_description = str_replace("airborne", '<span class="cyan">airborne</span>', $suggested_skill_description);
                                        $suggested_skill_description = str_replace("downed", '<span class="yellowgreen">downed</span>', $suggested_skill_description);

                                        $negated_options = preg_grep('/.*negated.*/', $suggested_options);
                                        $negated_sub_options = preg_grep('/.*negated.*/', $suggested_sub_options);

                                        $suggested_max_lines = get_field('max_lines', $suggested_weapon);

                                        $suggested_type = get_the_terms($suggested_weapon, 'item_categories');
                                        $suggested_skill_chain = get_field('weapon_skill_chain', $suggested_weapon);

                                        $tooltip_text = '';

                                        if($suggested_type[0]->name=='Weapon') {
                                            $tooltip_text .= '<span class="weapon-stat weapon-dps">';
                                            if(($suggested_min_dps > 0) and ($suggested_min_dps < $suggested_max_dps)) {
                                                $tooltip_text .= $suggested_min_dps.'-'.$suggested_max_dps; 
                                            }
                                            else {
                                                $tooltip_text .= $suggested_max_dps; 
                                            }
                                            $tooltip_text .= ' <span class="dps-label">DPS</span></span><br>';
                                        }
                                        elseif($suggested_type[0]->name=='Card') {
                                        }
                                        elseif($suggested_type[0]->name=='Costume') {
                                            $costume_hero = get_field('hero')[0];
                                            $tooltip_text .= '<div class="applicable-heroes">Applicable Heroes</div>';
                                            $tooltip_text .= '<a href="'.get_the_permalink($costume_hero->ID).'"><div class="applicable-hero">';
                                            $tooltip_text .= '<img class="applicable-hero-image" src="'.get_the_post_thumbnail_url($costume_hero->ID, 'thumbnail').'">';
                                            $tooltip_text .= '<div class="applicable-hero-info"><span class="applicable-hero-name">'.$costume_hero->post_title.'</span></div></div></a>';
                                        }
                                        else {
                                            $tooltip_text .= '<span class="weapon-stat equipment-rarity">'.$suggested_rarity.' '.$suggested_type[0]->name.'</span><br>';
                                        }
                                        $tooltip_text .= '</div>';
                                        if($suggested_type[0]->name=='Weapon') {
                                            $tooltip_text .= '<span class="weapon-stat weapon-atk"><span class="stat-label weapon-'.get_field('element', $suggested_weapon).'">'.get_field('element', $suggested_weapon).' Atk</span> ';
                                            if(($suggested_min_atk > 0) and ($suggested_min_atk < $suggested_max_atk)) {
                                                $tooltip_text .= $suggested_min_atk.'-'.$suggested_max_atk; 
                                            }
                                            else {
                                                $tooltip_text .= $suggested_max_atk; 
                                            }
                                            $tooltip_text .= '</span>';
                                        }
                                        
                                        if ($suggested_atk>0) {
                                            $tooltip_text .= '<span class="weapon-stat weapon-atk"><span class="stat-label label-offensive">Atk</span> +'.$suggested_atk.'%</span>';
                                        }  
                                        if ($suggested_magazine>0) {
                                            $tooltip_text .= '<span class="weapon-stat weapon-magazine"><span class="stat-label label-offensive">Magazine Size</span> '.$suggested_magazine.'</span>';
                                        } 
                                        if ($suggested_heal_flat>0) {
                                            $tooltip_text .= '<span class="weapon-stat weapon-heal-flat"><span class="stat-label label-offensive">Heal </span> '.$suggested_heal_flat.'</span>';
                                        } 
                                        if ($suggested_crit>0) {
                                            $tooltip_text .= '<span class="weapon-stat weapon-crit"><span class="stat-label label-offensive">Crit Hit Chance</span> '.$suggested_crit.'%</span>';
                                        } 
                                        if ($suggested_def_flat>0) {
                                            $tooltip_text .= '<span class="weapon-stat weapon-def-flat"><span class="stat-label label-offensive">Def</span> '.$suggested_def_flat.'</span>';
                                        } 
                                        if ($suggested_dr>0) {
                                            $tooltip_text .= '<span class="weapon-stat weapon-dr"><span class="stat-label">Damage Reduction</span> <span class="green">'.$suggested_dr.'</span></span>';
                                        }
                                        if ($suggested_atk_on_kill>0) {
                                            $tooltip_text .= '<span class="weapon-stat weapon-atk-on-kill"><span class="green">+'.$suggested_atk_on_kill.'%</span> Atk increase on enemy kill</span>';
                                        } 
                                        if ($suggested_hp_on_kill>0) {
                                            $tooltip_text .= '<span class="weapon-stat weapon-hp-on-kill"><span class="green">+'.$suggested_hp_on_kill.'%</span> HP recovery on enemy kill</span>';
                                        } 
                                        if ($suggested_shield_on_kill>0) {
                                            $tooltip_text .= '<span class="weapon-stat weapon-shield-on-kill"><span class="green">+'.$suggested_shield_on_kill.'%</span> shield increase on enemy kill</span>';
                                        } 
                                        if ($suggested_shield_on_start>0) {
                                            $tooltip_text .= '<span class="weapon-stat weapon-shield-on-start"><span class="green">+'.$suggested_shield_on_start.'%</span> shield increase on battle start</span>';
                                        }
                                        if ($suggested_def>0) {
                                            $tooltip_text .= '<span class="weapon-stat weapon-def"><span class="stat-label label-defensive">Def</span> +'.$suggested_def.'%</span>';
                                        } 
                                        if ($suggested_hp>0) {
                                            $tooltip_text .= '<span class="weapon-stat weapon-hp"><span class="stat-label label-defensive">HP</span> +'.$suggested_hp.'%</span>';
                                        }
                                        if ($suggested_heal>0) {
                                            $tooltip_text .= '<span class="weapon-stat weapon-heal"><span class="stat-label label-defensive">Heal</span> +'.$suggested_heal.'%</span>';
                                        } 
                                        if ($suggested_skill_damage>0) {
                                            $tooltip_text .= '<span class="weapon-stat weapon-skill-damage"><span class="stat-label label-defensive">Skill Damage</span> +'.$suggested_skill_damage.'%</span>';
                                        }  
                                        if ($suggested_skill_regen_speed>0) {
                                            $tooltip_text .= '<span class="weapon-stat weapon-regen-speed"><span class="stat-label label-defensive">Weapon Skill Regen Speed</span> +'.$suggested_skill_regen_speed.'%</span>';
                                        } 
                                        if ($suggested_skill_regen_on_kill<0) {
                                            $tooltip_text .= '<span class="weapon-stat weapon-regen-on-kill"><span class="green">'.$suggested_skill_regen_on_kill.'</span> seconds of weapon skill Regen time on enemy kill</span>';
                                        } 
                                        if ($suggested_earth_type_atk>0) {
                                            $tooltip_text .= '<span class="weapon-stat weapon-def"><span class="stat-label label-defensive">Earth type Atk</span> +'.$suggested_earth_type_atk.'%</span>';
                                        } 
                                        if ($suggested_fire_type_atk>0) {
                                            $tooltip_text .= '<span class="weapon-stat weapon-def"><span class="stat-label label-defensive">Fire type Atk</span> +'.$suggested_fire_type_atk.'%</span>';
                                        }
                                        if ($suggested_water_type_atk>0) {
                                            $tooltip_text .= '<span class="weapon-stat weapon-def"><span class="stat-label label-defensive">Water type Atk</span> +'.$suggested_water_type_atk.'%</span>';
                                        }  
                                        if ($suggested_basic_type_atk>0) {
                                            $tooltip_text .= '<span class="weapon-stat weapon-def"><span class="stat-label label-defensive">Basic type Atk</span> +'.$suggested_basic_type_atk.'%</span>';
                                        } 
                                        if ($suggested_light_type_atk>0) {
                                            $tooltip_text .= '<span class="weapon-stat weapon-def"><span class="stat-label label-defensive">Light type Atk</span> +'.$suggested_light_type_atk.'%</span>';
                                        } 
                                        if ($suggested_dark_type_atk>0) {
                                            $tooltip_text .= '<span class="weapon-stat weapon-def"><span class="stat-label label-defensive">Dark type Atk</span> +'.$suggested_dark_type_atk.'%</span>';
                                        } 
                                        foreach($negated_options as $negated) 
                                        {
                                            $tooltip_text .= '<span class="weapon-stat weapon-def">'.$negated.'</span>';
                                        }
                                        if($suggested_lb5)
                                        {
                                            $tooltip_text .= '<br><span class="weapon-stat limit-break limit-break-header">[Required Limit Break 5]</span><span class="weapon-stat limit-break">';
                                            if($suggested_lb5=='Atk (%)'){
                                                $tooltip_text .= '<span class="stat-label label-defensive">Atk</span> <span class="green">+'.$suggested_lb5_value.'%</span>';
                                            }
                                            else if($suggested_lb5=='HP (%)') {
                                                $tooltip_text .= '<span class="stat-label label-defensive">HP</span> <span class="green">+'.$suggested_lb5_value.'%</span>';
                                            }
                                            else if($suggested_lb5=='Crit Hit Chance') {
                                                $tooltip_text .= '<span class="stat-label label-defensive">Crit Hit Chance</span> <span class="green">+'.$suggested_lb5_value.'%</span>';
                                            }
                                            else if($suggested_lb5=='Damage Reduction') {
                                                $tooltip_text .= '<span class="stat-label label-defensive">Damage Reduction</span> <span class="green">+'.$suggested_lb5_value.'</span>';
                                            }
                                            else if($suggested_lb5=='Def') {
                                                $tooltip_text .= '<span class="stat-label label-defensive">Def</span> <span class="green">+'.$suggested_lb5_value.'%</span>';
                                            }
                                            else if($suggested_lb5=='Heal (Flat)') {
                                                $tooltip_text .= '<span class="stat-label label-defensive">Heal</span> <span class="green">+'.$suggested_lb5_value.'</span>';
                                            }
                                            else if($suggested_lb5=='Heal (%)') {
                                                $tooltip_text .= '<span class="stat-label label-defensive">Heal</span> <span class="green">+'.$suggested_lb5_value.'%</span>';
                                            }
                                            else if($suggested_lb5=='Atk increase on enemy kill') {
                                                $tooltip_text .= '<span class="weapon-stat weapon-atk-on-kill"><span class="green">+'.$suggested_lb5_value.'%</span> Atk increase on enemy kill</span>';
                                            }
                                            else if($suggested_lb5=='HP recovery on enemy kill') {
                                                $tooltip_text .= '<span class="weapon-stat weapon-hp-on-kill"><span class="green">+'.$suggested_lb5_value.'%</span> HP recovery on enemy kill</span>';
                                            }
                                            else if($suggested_lb5=='Seconds of weapon skill Regen time on enemy kill') {
                                                $tooltip_text .= '<span class="weapon-stat weapon-regen-on-kill"><span class="green">'.$suggested_lb5_value.'</span> seconds of weapon skill Regen time on enemy kill</span>';
                                            }
                                            else if($suggested_lb5=='Shield increase on battle start') {
                                                $tooltip_text .= '<span class="weapon-stat weapon-shield-on-start"><span class="green">+'.$suggested_lb5_value.'%</span> shield increase on battle start</span>';
                                            }
                                            else if($suggested_lb5=='Shield increase on enemy kill') {
                                                $tooltip_text .= '<span class="weapon-stat weapon-shield-on-kill"><span class="green">+'.$suggested_lb5_value.'%</span> shield increase on enemy kill</span>';
                                            }
                                            else if($suggested_lb5=='Skill Damage') {
                                                $tooltip_text .= '<span class="weapon-stat weapon-skill-damage"><span class="stat-label label-defensive">Skill Damage</span> +'.$suggested_lb5_value.'%</span>';
                                            }
                                            else if($suggested_lb5=='Weapon Skill Regen Speed') {
                                                $tooltip_text .= '<span class="weapon-stat weapon-regen-speed"><span class="stat-label label-defensive">Weapon Skill Regen Speed</span> +'.$suggested_lb5_value.'%</span>';
                                            }
                                            $tooltip_text .= '<br>';
                                        } 
                                        if ($suggested_exclusive) {
                                            $hero = get_field('hero', $suggested_weapon)[0];
                                            $suggested_exclusive_effects = get_field('exclusive_effects', $suggested_weapon);
                                            $tooltip_text .= '<br><span class="exclusive"><span class="exclusive-header">[';
                                            $tooltip_text .= $hero->post_title;
                                            $tooltip_text .= ' only]</span><br>';
                                            $tooltip_text .= $suggested_exclusive_effects;
                                            $tooltip_text .= '</span><br>';
                                        }
                                        if(sizeof($suggested_sub_options) > 0) {
                                            $tooltip_text .= '<br><span class="weapon-stat limit-break limit-break-header sub-options-text">[Sub-Options] <span class="sub-options-max">(Max '.$suggested_max_lines.')</span></span>';
                                            if ($suggested_sub_atk>0) {
                                                $tooltip_text .= '<span class="weapon-stat weapon-atk"><span class="stat-label label-offensive">Atk</span> +'.$suggested_sub_atk.'%</span>';
                                            }  
                                            if ($suggested_sub_heal_flat>0) {
                                                $tooltip_text .= '<span class="weapon-stat weapon-heal-flat"><span class="stat-label label-offensive">Heal </span> '.$suggested_sub_heal_flat.'</span>';
                                            } 
                                            if ($suggested_sub_crit>0) {
                                                $tooltip_text .= '<span class="weapon-stat weapon-crit"><span class="stat-label label-offensive">Crit Hit Chance</span> '.$suggested_sub_crit.'%</span>';
                                            } 
                                            if ($suggested_sub_def_flat>0) {
                                                $tooltip_text .= '<span class="weapon-stat weapon-def-flat"><span class="stat-label label-offensive">Def</span> '.$suggested_sub_def_flat.'</span>';
                                            } 
                                            if ($suggested_sub_dr>0) {
                                                $tooltip_text .= '<span class="weapon-stat weapon-dr"><span class="stat-label">Damage Reduction</span> <span class="green">'.$suggested_sub_dr.'</span></span>';
                                            }
                                            if ($suggested_sub_atk_on_kill>0) {
                                                $tooltip_text .= '<span class="weapon-stat weapon-atk-on-kill"><span class="green">+'.$suggested_sub_atk_on_kill.'%</span> Atk increase on enemy kill</span>';
                                            } 
                                            if ($suggested_sub_hp_on_kill>0) {
                                                $tooltip_text .= '<span class="weapon-stat weapon-hp-on-kill"><span class="green">+'.$suggested_sub_hp_on_kill.'%</span> HP recovery on enemy kill</span>';
                                            } 
                                            if ($suggested_sub_shield_on_kill>0) {
                                                $tooltip_text .= '<span class="weapon-stat weapon-shield-on-kill"><span class="green">+'.$suggested_sub_shield_on_kill.'%</span> shield increase on enemy kill</span>';
                                            } 
                                            if ($suggested_sub_shield_on_start>0) {
                                                $tooltip_text .= '<span class="weapon-stat weapon-shield-on-start"><span class="green">+'.$suggested_sub_shield_on_start.'%</span> shield increase on battle start</span>';
                                            }
                                            if ($suggested_sub_def>0) {
                                                $tooltip_text .= '<span class="weapon-stat weapon-def"><span class="stat-label label-defensive">Def</span> +'.$suggested_sub_def.'%</span>';
                                            } 
                                            if ($suggested_sub_hp>0) {
                                                $tooltip_text .= '<span class="weapon-stat weapon-hp"><span class="stat-label label-defensive">HP</span> +'.$suggested_sub_hp.'%</span>';
                                            }
                                            if ($suggested_sub_heal>0) {
                                                $tooltip_text .= '<span class="weapon-stat weapon-heal"><span class="stat-label label-defensive">Heal</span> +'.$suggested_sub_heal.'%</span>';
                                            } 
                                            if ($suggested_sub_skill_damage>0) {
                                                $tooltip_text .= '<span class="weapon-stat weapon-skill-damage"><span class="stat-label label-defensive">Skill Damage</span> +'.$suggested_sub_skill_damage.'%</span>';
                                            }  
                                            if ($suggested_sub_skill_regen_speed>0) {
                                                $tooltip_text .= '<span class="weapon-stat weapon-regen-speed"><span class="stat-label label-defensive">Weapon Skill Regen Speed</span> +'.$suggested_sub_skill_regen_speed.'%</span>';
                                            } 
                                            if ($suggested_sub_skill_regen_on_kill<0) {
                                                $tooltip_text .= '<span class="weapon-stat weapon-regen-on-kill"><span class="green">'.$suggested_sub_skill_regen_on_kill.'</span> seconds of weapon skill Regen time on enemy kill</span>';
                                            } 
                                            if ($suggested_sub_earth_type_atk>0) {
                                                $tooltip_text .= '<span class="weapon-stat weapon-def"><span class="stat-label label-defensive">Earth type Atk</span> +'.$suggested_sub_earth_type_atk.'%</span>';
                                            } 
                                            if ($suggested_sub_fire_type_atk>0) {
                                                $tooltip_text .= '<span class="weapon-stat weapon-def"><span class="stat-label label-defensive">Fire type Atk</span> +'.$suggested_sub_fire_type_atk.'%</span>';
                                            }
                                            if ($suggested_sub_water_type_atk>0) {
                                                $tooltip_text .= '<span class="weapon-stat weapon-def"><span class="stat-label label-defensive">Water type Atk</span> +'.$suggested_sub_water_type_atk.'%</span>';
                                            }  
                                            if ($suggested_sub_basic_type_atk>0) {
                                                $tooltip_text .= '<span class="weapon-stat weapon-def"><span class="stat-label label-defensive">Basic type Atk</span> +'.$suggested_sub_basic_type_atk.'%</span>';
                                            } 
                                            if ($suggested_sub_light_type_atk>0) {
                                                $tooltip_text .= '<span class="weapon-stat weapon-def"><span class="stat-label label-defensive">Light type Atk</span> +'.$suggested_sub_light_type_atk.'%</span>';
                                            } 
                                            if ($suggested_sub_dark_type_atk>0) {
                                                $tooltip_text .= '<span class="weapon-stat weapon-def"><span class="stat-label label-defensive">Dark type Atk</span> +'.$suggested_sub_dark_type_atk.'%</span>';
                                            } 
                                            foreach($negated_sub_options as $negated) 
                                            {
                                                $tooltip_text .= '<span class="weapon-stat weapon-def">'.$negated.'</span>';
                                            }
                                        }

                                        echo '<div class="suggested-item">';
                                        echo "<div class='item-tooltip item-with-description' id='item-".$suggested_weapon."' style='background:url(".get_the_post_thumbnail_url($suggested_weapon,'thumbnail').");'></div> ";
                                        echo "<a href='".get_the_permalink($suggested_weapon)."'><strong class='item-explanation-title'>".get_the_title($suggested_weapon)."</strong></a><span class='suggested-explanation'>";
                                        echo get_sub_field('weapon_explanation');
                                        echo '</span></div>';
                                        $tooltip_text = addslashes(str_replace("\r\n","",$tooltip_text));
                                        echo '<script type="text/javascript">jQuery(function ($) { $("#item-'.$suggested_weapon.'").prop(\'title\', \'<img class="item-tooltip-image" src="'.get_the_post_thumbnail_url($suggested_weapon,'thumbnail').'" /><span class="bold item-tooltip-title">'.get_the_title($suggested_weapon).'</span><br>'.$tooltip_text.'\');$("#item-'.$suggested_weapon.'").tooltip({tooltipClass 	: "item-tooltip",persistent 	: true,html 	: true,trigger 	: "hover"}); });</script>';
                                    ?>
                                    <?php
                                    }
                                    ?>
                                    </div>
                                </div>
                                <?php if(have_rows('build_guide_fields_suggested_shield')) : ?>
                                <div class="section-box">
                                    <h4>Suggested Shield<span class="fa fa-plus"></h4>
                                    <div class="section-content">
                                    <?php
                                    $first_item = true;
                                    while(have_rows('build_guide_fields_suggested_shield')) {
                                        the_row(); 
                                        if($first_item) {
                                            $first_item = false;
                                        }
                                        else {
                                            echo '<h6 class="separator"><span>OR</span></h6>';
                                        }
                                        $suggested_shield = get_sub_field('suggested_shield');
                                        $suggested_element = get_field('element', $suggested_shield);
                                        $suggested_max_atk = get_field('max_atk', $suggested_shield);

                                        $suggested_exclusive = get_field('exclusive', $suggested_shield);

                                        $suggested_magazine = get_field('magazine', $suggested_shield);
                                        $suggested_atk = get_field('atk', $suggested_shield);
                                        $suggested_crit = get_field('crit_chance', $suggested_shield);
                                        $suggested_dr = get_field('damage_reduction', $suggested_shield);
                                        $suggested_def_flat = get_field('def_flat', $suggested_shield);
                                        $suggested_def = get_field('def', $suggested_shield);
                                        $suggested_heal_flat = get_field('heal_flat', $suggested_shield);
                                        $suggested_heal = get_field('heal_percent', $suggested_shield);
                                        $suggested_hp = get_field('hp', $suggested_shield);
                                        $suggested_atk_on_kill = get_field('atk_on_kill', $suggested_shield);
                                        $suggested_hp_on_kill = get_field('hp_on_kill', $suggested_shield);
                                        $suggested_skill_regen_on_kill = get_field('skill_regen_on_kill', $suggested_shield);
                                        $suggested_shield_on_start = get_field('shield_on_start', $suggested_shield);
                                        $suggested_shield_on_kill = get_field('shield_on_kill', $suggested_shield);
                                        $suggested_skill_damage = get_field('skill_damage', $suggested_shield);
                                        $suggested_skill_regen_speed = get_field('skill_regen_speed', $suggested_shield);
                                        $suggested_earth_type_atk = get_field('earth_type_atk', $suggested_shield);
                                        $suggested_fire_type_atk = get_field('fire_type_atk', $suggested_shield);
                                        $suggested_water_type_atk = get_field('water_type_atk', $suggested_shield);
                                        $suggested_dark_type_atk = get_field('dark_type_atk', $suggested_shield);
                                        $suggested_light_type_atk = get_field('light_type_atk', $suggested_shield);
                                        $suggested_basic_type_atk = get_field('basic_type_atk', $suggested_shield);
                                        $suggested_options = get_field('options', $suggested_shield);

                                        $suggested_sub_atk = get_field('sub_atk', $suggested_shield);
                                        $suggested_sub_crit = get_field('sub_crit_chance', $suggested_shield);
                                        $suggested_sub_dr = get_field('sub_damage_reduction', $suggested_shield);
                                        $suggested_sub_def_flat = get_field('sub_def_flat', $suggested_shield);
                                        $suggested_sub_def = get_field('sub_def', $suggested_shield);
                                        $suggested_sub_heal_flat = get_field('sub_heal_flat', $suggested_shield);
                                        $suggested_sub_heal = get_field('sub_heal_percent', $suggested_shield);
                                        $suggested_sub_hp = get_field('sub_hp', $suggested_shield);
                                        $suggested_sub_atk_on_kill = get_field('sub_atk_on_kill', $suggested_shield);
                                        $suggested_sub_hp_on_kill = get_field('sub_hp_on_kill', $suggested_shield);
                                        $suggested_sub_skill_regen_on_kill = get_field('sub_skill_regen_on_kill', $suggested_shield);
                                        $suggested_sub_shield_on_start = get_field('sub_shield_on_start', $suggested_shield);
                                        $suggested_sub_shield_on_kill = get_field('sub_shield_on_kill', $suggested_shield);
                                        $suggested_sub_skill_damage = get_field('sub_skill_damage', $suggested_shield);
                                        $suggested_sub_skill_regen_speed = get_field('sub_skill_regen_speed', $suggested_shield);
                                        $suggested_sub_earth_type_atk = get_field('sub_earth_type_atk', $suggested_shield);
                                        $suggested_sub_fire_type_atk = get_field('sub_fire_type_atk', $suggested_shield);
                                        $suggested_sub_water_type_atk = get_field('sub_water_type_atk', $suggested_shield);
                                        $suggested_sub_dark_type_atk = get_field('sub_dark_type_atk', $suggested_shield);
                                        $suggested_sub_light_type_atk = get_field('sub_light_type_atk', $suggested_shield);
                                        $suggested_sub_basic_type_atk = get_field('sub_basic_type_atk', $suggested_shield);
                                        $suggested_sub_options = get_field('sub_options', $suggested_shield);

                                        $suggested_rarity = get_field('rarity', $suggested_shield);

                                        $suggested_lb5 = get_field('lb5_option', $suggested_shield);
                                        $suggested_lb5_value = get_field('lb5_value', $suggested_shield);
                                        $suggested_skill_name = get_field('weapon_skill_name', $suggested_shield);
                                        $suggested_skill_name = preg_replace('/Lv\.\d*/i', '<span class="skill-level">$0</span>', $suggested_skill_name);
                                        $suggested_skill_atk = get_field('weapon_skill_atk', $suggested_shield);
                                        $suggested_skill_regen_time = get_field('weapon_skill_regen_time', $suggested_shield);
                                        $suggested_skill_description = get_field('weapon_skill_description', $suggested_shield);
                                        $suggested_skill_description = str_replace("injured", '<span class="green">injured</span>', $suggested_skill_description);
                                        $suggested_skill_description = str_replace("airborne", '<span class="cyan">airborne</span>', $suggested_skill_description);
                                        $suggested_skill_description = str_replace("downed", '<span class="yellowgreen">downed</span>', $suggested_skill_description);

                                        $negated_options = preg_grep('/.*negated.*/', $suggested_options);
                                        $negated_sub_options = preg_grep('/.*negated.*/', $suggested_sub_options);

                                        $suggested_max_lines = get_field('max_lines', $suggested_shield);

                                        $suggested_type = get_the_terms($suggested_shield, 'item_categories');
                                        $suggested_skill_chain = get_field('weapon_skill_chain', $suggested_shield);

                                        $tooltip_text = '';

                                        if($suggested_type[0]->name=='Weapon') {
                                            $tooltip_text .= '<span class="weapon-stat weapon-dps">'.get_field('dps', $suggested_shield).' <span class="dps-label">DPS</span></span><br>';
                                        }
                                        elseif($suggested_type[0]->name=='Card') {
                                        }
                                        elseif($suggested_type[0]->name=='Costume') {
                                            $costume_hero = get_field('hero')[0];
                                            $tooltip_text .= '<div class="applicable-heroes">Applicable Heroes</div>';
                                            $tooltip_text .= '<a href="'.get_the_permalink($costume_hero->ID).'"><div class="applicable-hero">';
                                            $tooltip_text .= '<img class="applicable-hero-image" src="'.get_the_post_thumbnail_url($costume_hero->ID, 'thumbnail').'">';
                                            $tooltip_text .= '<div class="applicable-hero-info"><span class="applicable-hero-name">'.$costume_hero->post_title.'</span></div></div></a>';
                                        }
                                        else {
                                            $tooltip_text .= '<span class="weapon-stat equipment-rarity">'.$suggested_rarity.' '.$suggested_type[0]->name.'</span><br>';
                                        }
                                        $tooltip_text .= '</div>';
                                        if($suggested_type[0]->name=='Weapon') {
                                            $tooltip_text .= '<span class="weapon-stat weapon-atk"><span class="stat-label weapon-'.get_field('element', $suggested_shield).'">'.get_field('element', $suggested_shield).' Atk</span> '.get_field('max_atk', $suggested_shield).'</span>';
                                        }
                                        
                                        if ($suggested_atk>0) {
                                            $tooltip_text .= '<span class="weapon-stat weapon-atk"><span class="stat-label label-offensive">Atk</span> +'.$suggested_atk.'%</span>';
                                        }  
                                        if ($suggested_magazine>0) {
                                            $tooltip_text .= '<span class="weapon-stat weapon-magazine"><span class="stat-label label-offensive">Magazine Size</span> '.$suggested_magazine.'</span>';
                                        } 
                                        if ($suggested_heal_flat>0) {
                                            $tooltip_text .= '<span class="weapon-stat weapon-heal-flat"><span class="stat-label label-offensive">Heal </span> '.$suggested_heal_flat.'</span>';
                                        } 
                                        if ($suggested_crit>0) {
                                            $tooltip_text .= '<span class="weapon-stat weapon-crit"><span class="stat-label label-offensive">Crit Hit Chance</span> '.$suggested_crit.'%</span>';
                                        } 
                                        if ($suggested_def_flat>0) {
                                            $tooltip_text .= '<span class="weapon-stat weapon-def-flat"><span class="stat-label label-offensive">Def</span> '.$suggested_def_flat.'</span>';
                                        } 
                                        if ($suggested_dr>0) {
                                            $tooltip_text .= '<span class="weapon-stat weapon-dr"><span class="stat-label">Damage Reduction</span> <span class="green">'.$suggested_dr.'</span></span>';
                                        }
                                        if ($suggested_atk_on_kill>0) {
                                            $tooltip_text .= '<span class="weapon-stat weapon-atk-on-kill"><span class="green">+'.$suggested_atk_on_kill.'%</span> Atk increase on enemy kill</span>';
                                        } 
                                        if ($suggested_hp_on_kill>0) {
                                            $tooltip_text .= '<span class="weapon-stat weapon-hp-on-kill"><span class="green">+'.$suggested_hp_on_kill.'%</span> HP recovery on enemy kill</span>';
                                        } 
                                        if ($suggested_shield_on_kill>0) {
                                            $tooltip_text .= '<span class="weapon-stat weapon-shield-on-kill"><span class="green">+'.$suggested_shield_on_kill.'%</span> shield increase on enemy kill</span>';
                                        } 
                                        if ($suggested_shield_on_start>0) {
                                            $tooltip_text .= '<span class="weapon-stat weapon-shield-on-start"><span class="green">+'.$suggested_shield_on_start.'%</span> shield increase on battle start</span>';
                                        }
                                        if ($suggested_def>0) {
                                            $tooltip_text .= '<span class="weapon-stat weapon-def"><span class="stat-label label-defensive">Def</span> +'.$suggested_def.'%</span>';
                                        } 
                                        if ($suggested_hp>0) {
                                            $tooltip_text .= '<span class="weapon-stat weapon-hp"><span class="stat-label label-defensive">HP</span> +'.$suggested_hp.'%</span>';
                                        }
                                        if ($suggested_heal>0) {
                                            $tooltip_text .= '<span class="weapon-stat weapon-heal"><span class="stat-label label-defensive">Heal</span> +'.$suggested_heal.'%</span>';
                                        } 
                                        if ($suggested_skill_damage>0) {
                                            $tooltip_text .= '<span class="weapon-stat weapon-skill-damage"><span class="stat-label label-defensive">Skill Damage</span> +'.$suggested_skill_damage.'%</span>';
                                        }  
                                        if ($suggested_skill_regen_speed>0) {
                                            $tooltip_text .= '<span class="weapon-stat weapon-regen-speed"><span class="stat-label label-defensive">Weapon Skill Regen Speed</span> +'.$suggested_skill_regen_speed.'%</span>';
                                        } 
                                        if ($suggested_skill_regen_on_kill<0) {
                                            $tooltip_text .= '<span class="weapon-stat weapon-regen-on-kill"><span class="green">'.$suggested_skill_regen_on_kill.'</span> seconds of weapon skill Regen time on enemy kill</span>';
                                        } 
                                        if ($suggested_earth_type_atk>0) {
                                            $tooltip_text .= '<span class="weapon-stat weapon-def"><span class="stat-label label-defensive">Earth type Atk</span> +'.$suggested_earth_type_atk.'%</span>';
                                        } 
                                        if ($suggested_fire_type_atk>0) {
                                            $tooltip_text .= '<span class="weapon-stat weapon-def"><span class="stat-label label-defensive">Fire type Atk</span> +'.$suggested_fire_type_atk.'%</span>';
                                        }
                                        if ($suggested_water_type_atk>0) {
                                            $tooltip_text .= '<span class="weapon-stat weapon-def"><span class="stat-label label-defensive">Water type Atk</span> +'.$suggested_water_type_atk.'%</span>';
                                        }  
                                        if ($suggested_basic_type_atk>0) {
                                            $tooltip_text .= '<span class="weapon-stat weapon-def"><span class="stat-label label-defensive">Basic type Atk</span> +'.$suggested_basic_type_atk.'%</span>';
                                        } 
                                        if ($suggested_light_type_atk>0) {
                                            $tooltip_text .= '<span class="weapon-stat weapon-def"><span class="stat-label label-defensive">Light type Atk</span> +'.$suggested_light_type_atk.'%</span>';
                                        } 
                                        if ($suggested_dark_type_atk>0) {
                                            $tooltip_text .= '<span class="weapon-stat weapon-def"><span class="stat-label label-defensive">Dark type Atk</span> +'.$suggested_dark_type_atk.'%</span>';
                                        } 
                                        foreach($negated_options as $negated) 
                                        {
                                            $tooltip_text .= '<span class="weapon-stat weapon-def">'.$negated.'</span>';
                                        }
                                        if($suggested_lb5)
                                        {
                                            $tooltip_text .= '<br><span class="weapon-stat limit-break limit-break-header">[Required Limit Break 5]</span><span class="weapon-stat limit-break">';
                                            if($suggested_lb5=='Atk (%)'){
                                                $tooltip_text .= '<span class="stat-label label-defensive">Atk</span> <span class="green">+'.$suggested_lb5_value.'%</span>';
                                            }
                                            else if($suggested_lb5=='HP (%)') {
                                                $tooltip_text .= '<span class="stat-label label-defensive">HP</span> <span class="green">+'.$suggested_lb5_value.'%</span>';
                                            }
                                            else if($suggested_lb5=='Crit Hit Chance') {
                                                $tooltip_text .= '<span class="stat-label label-defensive">Crit Hit Chance</span> <span class="green">+'.$suggested_lb5_value.'%</span>';
                                            }
                                            else if($suggested_lb5=='Damage Reduction') {
                                                $tooltip_text .= '<span class="stat-label label-defensive">Damage Reduction</span> <span class="green">+'.$suggested_lb5_value.'</span>';
                                            }
                                            else if($suggested_lb5=='Def') {
                                                $tooltip_text .= '<span class="stat-label label-defensive">Def</span> <span class="green">+'.$suggested_lb5_value.'%</span>';
                                            }
                                            else if($suggested_lb5=='Heal (Flat)') {
                                                $tooltip_text .= '<span class="stat-label label-defensive">Heal</span> <span class="green">+'.$suggested_lb5_value.'</span>';
                                            }
                                            else if($suggested_lb5=='Heal (%)') {
                                                $tooltip_text .= '<span class="stat-label label-defensive">Heal</span> <span class="green">+'.$suggested_lb5_value.'%</span>';
                                            }
                                            else if($suggested_lb5=='Atk increase on enemy kill') {
                                                $tooltip_text .= '<span class="weapon-stat weapon-atk-on-kill"><span class="green">+'.$suggested_lb5_value.'%</span> Atk increase on enemy kill</span>';
                                            }
                                            else if($suggested_lb5=='HP recovery on enemy kill') {
                                                $tooltip_text .= '<span class="weapon-stat weapon-hp-on-kill"><span class="green">+'.$suggested_lb5_value.'%</span> HP recovery on enemy kill</span>';
                                            }
                                            else if($suggested_lb5=='Seconds of weapon skill Regen time on enemy kill') {
                                                $tooltip_text .= '<span class="weapon-stat weapon-regen-on-kill"><span class="green">'.$suggested_lb5_value.'</span> seconds of weapon skill Regen time on enemy kill</span>';
                                            }
                                            else if($suggested_lb5=='Shield increase on battle start') {
                                                $tooltip_text .= '<span class="weapon-stat weapon-shield-on-start"><span class="green">+'.$suggested_lb5_value.'%</span> shield increase on battle start</span>';
                                            }
                                            else if($suggested_lb5=='Shield increase on enemy kill') {
                                                $tooltip_text .= '<span class="weapon-stat weapon-shield-on-kill"><span class="green">+'.$suggested_lb5_value.'%</span> shield increase on enemy kill</span>';
                                            }
                                            else if($suggested_lb5=='Skill Damage') {
                                                $tooltip_text .= '<span class="weapon-stat weapon-skill-damage"><span class="stat-label label-defensive">Skill Damage</span> +'.$suggested_lb5_value.'%</span>';
                                            }
                                            else if($suggested_lb5=='Weapon Skill Regen Speed') {
                                                $tooltip_text .= '<span class="weapon-stat weapon-regen-speed"><span class="stat-label label-defensive">Weapon Skill Regen Speed</span> +'.$suggested_lb5_value.'%</span>';
                                            }
                                            $tooltip_text .= '<br>';
                                        } 
                                        if ($suggested_exclusive) {
                                            $hero = get_field('hero', $suggested_shield)[0];
                                            $suggested_exclusive_effects = get_field('exclusive_effects', $suggested_shield);
                                            $tooltip_text .= '<br><span class="exclusive"><span class="exclusive-header">[';
                                            $tooltip_text .= $hero->post_title;
                                            $tooltip_text .= ' only]</span><br>';
                                            $tooltip_text .= $suggested_exclusive_effects;
                                            $tooltip_text .= '</span><br>';
                                        }
                                        if(sizeof($suggested_sub_options) > 0) {
                                            $tooltip_text .= '<br><span class="weapon-stat limit-break limit-break-header sub-options-text">[Sub-Options] <span class="sub-options-max">(Max '.$suggested_max_lines.')</span></span>';
                                            if ($suggested_sub_atk>0) {
                                                $tooltip_text .= '<span class="weapon-stat weapon-atk"><span class="stat-label label-offensive">Atk</span> +'.$suggested_sub_atk.'%</span>';
                                            }  
                                            if ($suggested_sub_heal_flat>0) {
                                                $tooltip_text .= '<span class="weapon-stat weapon-heal-flat"><span class="stat-label label-offensive">Heal </span> '.$suggested_sub_heal_flat.'</span>';
                                            } 
                                            if ($suggested_sub_crit>0) {
                                                $tooltip_text .= '<span class="weapon-stat weapon-crit"><span class="stat-label label-offensive">Crit Hit Chance</span> '.$suggested_sub_crit.'%</span>';
                                            } 
                                            if ($suggested_sub_def_flat>0) {
                                                $tooltip_text .= '<span class="weapon-stat weapon-def-flat"><span class="stat-label label-offensive">Def</span> '.$suggested_sub_def_flat.'</span>';
                                            } 
                                            if ($suggested_sub_dr>0) {
                                                $tooltip_text .= '<span class="weapon-stat weapon-dr"><span class="stat-label">Damage Reduction</span> <span class="green">'.$suggested_sub_dr.'</span></span>';
                                            }
                                            if ($suggested_sub_atk_on_kill>0) {
                                                $tooltip_text .= '<span class="weapon-stat weapon-atk-on-kill"><span class="green">+'.$suggested_sub_atk_on_kill.'%</span> Atk increase on enemy kill</span>';
                                            } 
                                            if ($suggested_sub_hp_on_kill>0) {
                                                $tooltip_text .= '<span class="weapon-stat weapon-hp-on-kill"><span class="green">+'.$suggested_sub_hp_on_kill.'%</span> HP recovery on enemy kill</span>';
                                            } 
                                            if ($suggested_sub_shield_on_kill>0) {
                                                $tooltip_text .= '<span class="weapon-stat weapon-shield-on-kill"><span class="green">+'.$suggested_sub_shield_on_kill.'%</span> shield increase on enemy kill</span>';
                                            } 
                                            if ($suggested_sub_shield_on_start>0) {
                                                $tooltip_text .= '<span class="weapon-stat weapon-shield-on-start"><span class="green">+'.$suggested_sub_shield_on_start.'%</span> shield increase on battle start</span>';
                                            }
                                            if ($suggested_sub_def>0) {
                                                $tooltip_text .= '<span class="weapon-stat weapon-def"><span class="stat-label label-defensive">Def</span> +'.$suggested_sub_def.'%</span>';
                                            } 
                                            if ($suggested_sub_hp>0) {
                                                $tooltip_text .= '<span class="weapon-stat weapon-hp"><span class="stat-label label-defensive">HP</span> +'.$suggested_sub_hp.'%</span>';
                                            }
                                            if ($suggested_sub_heal>0) {
                                                $tooltip_text .= '<span class="weapon-stat weapon-heal"><span class="stat-label label-defensive">Heal</span> +'.$suggested_sub_heal.'%</span>';
                                            } 
                                            if ($suggested_sub_skill_damage>0) {
                                                $tooltip_text .= '<span class="weapon-stat weapon-skill-damage"><span class="stat-label label-defensive">Skill Damage</span> +'.$suggested_sub_skill_damage.'%</span>';
                                            }  
                                            if ($suggested_sub_skill_regen_speed>0) {
                                                $tooltip_text .= '<span class="weapon-stat weapon-regen-speed"><span class="stat-label label-defensive">Weapon Skill Regen Speed</span> +'.$suggested_sub_skill_regen_speed.'%</span>';
                                            } 
                                            if ($suggested_sub_skill_regen_on_kill<0) {
                                                $tooltip_text .= '<span class="weapon-stat weapon-regen-on-kill"><span class="green">'.$suggested_sub_skill_regen_on_kill.'</span> seconds of weapon skill Regen time on enemy kill</span>';
                                            } 
                                            if ($suggested_sub_earth_type_atk>0) {
                                                $tooltip_text .= '<span class="weapon-stat weapon-def"><span class="stat-label label-defensive">Earth type Atk</span> +'.$suggested_sub_earth_type_atk.'%</span>';
                                            } 
                                            if ($suggested_sub_fire_type_atk>0) {
                                                $tooltip_text .= '<span class="weapon-stat weapon-def"><span class="stat-label label-defensive">Fire type Atk</span> +'.$suggested_sub_fire_type_atk.'%</span>';
                                            }
                                            if ($suggested_sub_water_type_atk>0) {
                                                $tooltip_text .= '<span class="weapon-stat weapon-def"><span class="stat-label label-defensive">Water type Atk</span> +'.$suggested_sub_water_type_atk.'%</span>';
                                            }  
                                            if ($suggested_sub_basic_type_atk>0) {
                                                $tooltip_text .= '<span class="weapon-stat weapon-def"><span class="stat-label label-defensive">Basic type Atk</span> +'.$suggested_sub_basic_type_atk.'%</span>';
                                            } 
                                            if ($suggested_sub_light_type_atk>0) {
                                                $tooltip_text .= '<span class="weapon-stat weapon-def"><span class="stat-label label-defensive">Light type Atk</span> +'.$suggested_sub_light_type_atk.'%</span>';
                                            } 
                                            if ($suggested_sub_dark_type_atk>0) {
                                                $tooltip_text .= '<span class="weapon-stat weapon-def"><span class="stat-label label-defensive">Dark type Atk</span> +'.$suggested_sub_dark_type_atk.'%</span>';
                                            } 
                                            foreach($negated_sub_options as $negated) 
                                            {
                                                $tooltip_text .= '<span class="weapon-stat weapon-def">'.$negated.'</span>';
                                            }
                                        }

                                        echo '<div class="suggested-item">';
                                        echo "<div class='item-tooltip item-with-description' id='item-".$suggested_shield."' style='background:url(".get_the_post_thumbnail_url($suggested_shield,'thumbnail').");'></div> ";
                                        echo "<a href='".get_the_permalink($suggested_shield)."'><strong class='item-explanation-title'>".get_the_title($suggested_shield)."</strong></a><span class='suggested-explanation'>";
                                        echo get_sub_field('shield_explanation');
                                        echo '</span></div>';
                                        $tooltip_text = addslashes(str_replace("\r\n","",$tooltip_text));
                                        echo '<script type="text/javascript">jQuery(function ($) { $("#item-'.$suggested_shield.'").prop(\'title\', \'<img class="item-tooltip-image" src="'.get_the_post_thumbnail_url($suggested_shield,'thumbnail').'" /><span class="bold item-tooltip-title">'.get_the_title($suggested_shield).'</span><br>'.$tooltip_text.'\');$("#item-'.$suggested_shield.'").tooltip({tooltipClass 	: "item-tooltip",persistent 	: true,html 	: true,trigger 	: "hover"}); });</script>';
                                    ?>
                                <?php
                                }
                                ?>
                                </div>
                                </div>
                                <?php
                                endif;
                                ?>
                                <?php if(have_rows('build_guide_fields_suggested_accessories')) : ?>
                                <div class="section-box">
                                    <h4>Suggested Accessory<span class="fa fa-plus"></h4>
                                    <div class="section-content">
                                    <?php
                                    $first_item = true;
                                    while(have_rows('build_guide_fields_suggested_accessories')) {
                                        the_row(); 
                                        if($first_item) {
                                            $first_item = false;
                                        }
                                        else {
                                            echo '<h6 class="separator"><span>OR</span></h6>';
                                        }
                                        $suggested_accessory = get_sub_field('suggested_accessory');
                                        $suggested_element = get_field('element', $suggested_accessory);
                                        $suggested_max_atk = get_field('max_atk', $suggested_accessory);

                                        $suggested_exclusive = get_field('exclusive', $suggested_accessory);

                                        $suggested_magazine = get_field('magazine', $suggested_accessory);
                                        $suggested_atk = get_field('atk', $suggested_accessory);
                                        $suggested_crit = get_field('crit_chance', $suggested_accessory);
                                        $suggested_dr = get_field('damage_reduction', $suggested_accessory);
                                        $suggested_def_flat = get_field('def_flat', $suggested_accessory);
                                        $suggested_def = get_field('def', $suggested_accessory);
                                        $suggested_heal_flat = get_field('heal_flat', $suggested_accessory);
                                        $suggested_heal = get_field('heal_percent', $suggested_accessory);
                                        $suggested_hp = get_field('hp', $suggested_accessory);
                                        $suggested_atk_on_kill = get_field('atk_on_kill', $suggested_accessory);
                                        $suggested_hp_on_kill = get_field('hp_on_kill', $suggested_accessory);
                                        $suggested_skill_regen_on_kill = get_field('skill_regen_on_kill', $suggested_accessory);
                                        $suggested_accessory_on_start = get_field('shield_on_start', $suggested_accessory);
                                        $suggested_accessory_on_kill = get_field('shield_on_kill', $suggested_accessory);
                                        $suggested_skill_damage = get_field('skill_damage', $suggested_accessory);
                                        $suggested_skill_regen_speed = get_field('skill_regen_speed', $suggested_accessory);
                                        $suggested_earth_type_atk = get_field('earth_type_atk', $suggested_accessory);
                                        $suggested_fire_type_atk = get_field('fire_type_atk', $suggested_accessory);
                                        $suggested_water_type_atk = get_field('water_type_atk', $suggested_accessory);
                                        $suggested_dark_type_atk = get_field('dark_type_atk', $suggested_accessory);
                                        $suggested_light_type_atk = get_field('light_type_atk', $suggested_accessory);
                                        $suggested_basic_type_atk = get_field('basic_type_atk', $suggested_accessory);
                                        $suggested_options = get_field('options', $suggested_accessory);

                                        $suggested_sub_atk = get_field('sub_atk', $suggested_accessory);
                                        $suggested_sub_crit = get_field('sub_crit_chance', $suggested_accessory);
                                        $suggested_sub_dr = get_field('sub_damage_reduction', $suggested_accessory);
                                        $suggested_sub_def_flat = get_field('sub_def_flat', $suggested_accessory);
                                        $suggested_sub_def = get_field('sub_def', $suggested_accessory);
                                        $suggested_sub_heal_flat = get_field('sub_heal_flat', $suggested_accessory);
                                        $suggested_sub_heal = get_field('sub_heal_percent', $suggested_accessory);
                                        $suggested_sub_hp = get_field('sub_hp', $suggested_accessory);
                                        $suggested_sub_atk_on_kill = get_field('sub_atk_on_kill', $suggested_accessory);
                                        $suggested_sub_hp_on_kill = get_field('sub_hp_on_kill', $suggested_accessory);
                                        $suggested_sub_skill_regen_on_kill = get_field('sub_skill_regen_on_kill', $suggested_accessory);
                                        $suggested_sub_accessory_on_start = get_field('sub_accessory_on_start', $suggested_accessory);
                                        $suggested_sub_accessory_on_kill = get_field('sub_accessory_on_kill', $suggested_accessory);
                                        $suggested_sub_skill_damage = get_field('sub_skill_damage', $suggested_accessory);
                                        $suggested_sub_skill_regen_speed = get_field('sub_skill_regen_speed', $suggested_accessory);
                                        $suggested_sub_earth_type_atk = get_field('sub_earth_type_atk', $suggested_accessory);
                                        $suggested_sub_fire_type_atk = get_field('sub_fire_type_atk', $suggested_accessory);
                                        $suggested_sub_water_type_atk = get_field('sub_water_type_atk', $suggested_accessory);
                                        $suggested_sub_dark_type_atk = get_field('sub_dark_type_atk', $suggested_accessory);
                                        $suggested_sub_light_type_atk = get_field('sub_light_type_atk', $suggested_accessory);
                                        $suggested_sub_basic_type_atk = get_field('sub_basic_type_atk', $suggested_accessory);
                                        $suggested_sub_options = get_field('sub_options', $suggested_accessory);

                                        $suggested_rarity = get_field('rarity', $suggested_accessory);

                                        $suggested_lb5 = get_field('lb5_option', $suggested_accessory);
                                        $suggested_lb5_value = get_field('lb5_value', $suggested_accessory);
                                        $suggested_skill_name = get_field('weapon_skill_name', $suggested_accessory);
                                        $suggested_skill_name = preg_replace('/Lv\.\d*/i', '<span class="skill-level">$0</span>', $suggested_skill_name);
                                        $suggested_skill_atk = get_field('weapon_skill_atk', $suggested_accessory);
                                        $suggested_skill_regen_time = get_field('weapon_skill_regen_time', $suggested_accessory);
                                        $suggested_skill_description = get_field('weapon_skill_description', $suggested_accessory);
                                        $suggested_skill_description = str_replace("injured", '<span class="green">injured</span>', $suggested_skill_description);
                                        $suggested_skill_description = str_replace("airborne", '<span class="cyan">airborne</span>', $suggested_skill_description);
                                        $suggested_skill_description = str_replace("downed", '<span class="yellowgreen">downed</span>', $suggested_skill_description);

                                        $negated_options = preg_grep('/.*negated.*/', $suggested_options);
                                        $negated_sub_options = preg_grep('/.*negated.*/', $suggested_sub_options);

                                        $suggested_max_lines = get_field('max_lines', $suggested_accessory);

                                        $suggested_type = get_the_terms($suggested_accessory, 'item_categories');
                                        $suggested_skill_chain = get_field('weapon_skill_chain', $suggested_accessory);

                                        $tooltip_text = '';

                                        if($suggested_type[0]->name=='Weapon') {
                                            $tooltip_text .= '<span class="weapon-stat weapon-dps">'.get_field('dps', $suggested_accessory).' <span class="dps-label">DPS</span></span><br>';
                                        }
                                        elseif($suggested_type[0]->name=='Card') {
                                        }
                                        elseif($suggested_type[0]->name=='Costume') {
                                            $costume_hero = get_field('hero')[0];
                                            $tooltip_text .= '<div class="applicable-heroes">Applicable Heroes</div>';
                                            $tooltip_text .= '<a href="'.get_the_permalink($costume_hero->ID).'"><div class="applicable-hero">';
                                            $tooltip_text .= '<img class="applicable-hero-image" src="'.get_the_post_thumbnail_url($costume_hero->ID, 'thumbnail').'">';
                                            $tooltip_text .= '<div class="applicable-hero-info"><span class="applicable-hero-name">'.$costume_hero->post_title.'</span></div></div></a>';
                                        }
                                        else {
                                            $tooltip_text .= '<span class="weapon-stat equipment-rarity">'.$suggested_rarity.' '.$suggested_type[0]->name.'</span><br>';
                                        }
                                        $tooltip_text .= '</div>';
                                        if($suggested_type[0]->name=='Weapon') {
                                            $tooltip_text .= '<span class="weapon-stat weapon-atk"><span class="stat-label weapon-'.get_field('element', $suggested_accessory).'">'.get_field('element', $suggested_accessory).' Atk</span> '.get_field('max_atk', $suggested_accessory).'</span>';
                                        }
                                        
                                        if ($suggested_atk>0) {
                                            $tooltip_text .= '<span class="weapon-stat weapon-atk"><span class="stat-label label-offensive">Atk</span> +'.$suggested_atk.'%</span>';
                                        }  
                                        if ($suggested_magazine>0) {
                                            $tooltip_text .= '<span class="weapon-stat weapon-magazine"><span class="stat-label label-offensive">Magazine Size</span> '.$suggested_magazine.'</span>';
                                        } 
                                        if ($suggested_heal_flat>0) {
                                            $tooltip_text .= '<span class="weapon-stat weapon-heal-flat"><span class="stat-label label-offensive">Heal </span> '.$suggested_heal_flat.'</span>';
                                        } 
                                        if ($suggested_crit>0) {
                                            $tooltip_text .= '<span class="weapon-stat weapon-crit"><span class="stat-label label-offensive">Crit Hit Chance</span> '.$suggested_crit.'%</span>';
                                        } 
                                        if ($suggested_def_flat>0) {
                                            $tooltip_text .= '<span class="weapon-stat weapon-def-flat"><span class="stat-label label-offensive">Def</span> '.$suggested_def_flat.'</span>';
                                        } 
                                        if ($suggested_dr>0) {
                                            $tooltip_text .= '<span class="weapon-stat weapon-dr"><span class="stat-label">Damage Reduction</span> <span class="green">'.$suggested_dr.'</span></span>';
                                        }
                                        if ($suggested_atk_on_kill>0) {
                                            $tooltip_text .= '<span class="weapon-stat weapon-atk-on-kill"><span class="green">+'.$suggested_atk_on_kill.'%</span> Atk increase on enemy kill</span>';
                                        } 
                                        if ($suggested_hp_on_kill>0) {
                                            $tooltip_text .= '<span class="weapon-stat weapon-hp-on-kill"><span class="green">+'.$suggested_hp_on_kill.'%</span> HP recovery on enemy kill</span>';
                                        } 
                                        if ($suggested_accessory_on_kill>0) {
                                            $tooltip_text .= '<span class="weapon-stat weapon-shield-on-kill"><span class="green">+'.$suggested_accessory_on_kill.'%</span> shield increase on enemy kill</span>';
                                        } 
                                        if ($suggested_accessory_on_start>0) {
                                            $tooltip_text .= '<span class="weapon-stat weapon-shield-on-start"><span class="green">+'.$suggested_accessory_on_start.'%</span> shield increase on battle start</span>';
                                        }
                                        if ($suggested_def>0) {
                                            $tooltip_text .= '<span class="weapon-stat weapon-def"><span class="stat-label label-defensive">Def</span> +'.$suggested_def.'%</span>';
                                        } 
                                        if ($suggested_hp>0) {
                                            $tooltip_text .= '<span class="weapon-stat weapon-hp"><span class="stat-label label-defensive">HP</span> +'.$suggested_hp.'%</span>';
                                        }
                                        if ($suggested_heal>0) {
                                            $tooltip_text .= '<span class="weapon-stat weapon-heal"><span class="stat-label label-defensive">Heal</span> +'.$suggested_heal.'%</span>';
                                        } 
                                        if ($suggested_skill_damage>0) {
                                            $tooltip_text .= '<span class="weapon-stat weapon-skill-damage"><span class="stat-label label-defensive">Skill Damage</span> +'.$suggested_skill_damage.'%</span>';
                                        }  
                                        if ($suggested_skill_regen_speed>0) {
                                            $tooltip_text .= '<span class="weapon-stat weapon-regen-speed"><span class="stat-label label-defensive">Weapon Skill Regen Speed</span> +'.$suggested_skill_regen_speed.'%</span>';
                                        } 
                                        if ($suggested_skill_regen_on_kill<0) {
                                            $tooltip_text .= '<span class="weapon-stat weapon-regen-on-kill"><span class="green">'.$suggested_skill_regen_on_kill.'</span> seconds of weapon skill Regen time on enemy kill</span>';
                                        } 
                                        if ($suggested_earth_type_atk>0) {
                                            $tooltip_text .= '<span class="weapon-stat weapon-def"><span class="stat-label label-defensive">Earth type Atk</span> +'.$suggested_earth_type_atk.'%</span>';
                                        } 
                                        if ($suggested_fire_type_atk>0) {
                                            $tooltip_text .= '<span class="weapon-stat weapon-def"><span class="stat-label label-defensive">Fire type Atk</span> +'.$suggested_fire_type_atk.'%</span>';
                                        }
                                        if ($suggested_water_type_atk>0) {
                                            $tooltip_text .= '<span class="weapon-stat weapon-def"><span class="stat-label label-defensive">Water type Atk</span> +'.$suggested_water_type_atk.'%</span>';
                                        }  
                                        if ($suggested_basic_type_atk>0) {
                                            $tooltip_text .= '<span class="weapon-stat weapon-def"><span class="stat-label label-defensive">Basic type Atk</span> +'.$suggested_basic_type_atk.'%</span>';
                                        } 
                                        if ($suggested_light_type_atk>0) {
                                            $tooltip_text .= '<span class="weapon-stat weapon-def"><span class="stat-label label-defensive">Light type Atk</span> +'.$suggested_light_type_atk.'%</span>';
                                        } 
                                        if ($suggested_dark_type_atk>0) {
                                            $tooltip_text .= '<span class="weapon-stat weapon-def"><span class="stat-label label-defensive">Dark type Atk</span> +'.$suggested_dark_type_atk.'%</span>';
                                        } 
                                        foreach($negated_options as $negated) 
                                        {
                                            $tooltip_text .= '<span class="weapon-stat weapon-def">'.$negated.'</span>';
                                        }
                                        if($suggested_lb5)
                                        {
                                            $tooltip_text .= '<br><span class="weapon-stat limit-break limit-break-header">[Required Limit Break 5]</span><span class="weapon-stat limit-break">';
                                            if($suggested_lb5=='Atk (%)'){
                                                $tooltip_text .= '<span class="stat-label label-defensive">Atk</span> <span class="green">+'.$suggested_lb5_value.'%</span>';
                                            }
                                            else if($suggested_lb5=='HP (%)') {
                                                $tooltip_text .= '<span class="stat-label label-defensive">HP</span> <span class="green">+'.$suggested_lb5_value.'%</span>';
                                            }
                                            else if($suggested_lb5=='Crit Hit Chance') {
                                                $tooltip_text .= '<span class="stat-label label-defensive">Crit Hit Chance</span> <span class="green">+'.$suggested_lb5_value.'%</span>';
                                            }
                                            else if($suggested_lb5=='Damage Reduction') {
                                                $tooltip_text .= '<span class="stat-label label-defensive">Damage Reduction</span> <span class="green">+'.$suggested_lb5_value.'</span>';
                                            }
                                            else if($suggested_lb5=='Def') {
                                                $tooltip_text .= '<span class="stat-label label-defensive">Def</span> <span class="green">+'.$suggested_lb5_value.'%</span>';
                                            }
                                            else if($suggested_lb5=='Heal (Flat)') {
                                                $tooltip_text .= '<span class="stat-label label-defensive">Heal</span> <span class="green">+'.$suggested_lb5_value.'</span>';
                                            }
                                            else if($suggested_lb5=='Heal (%)') {
                                                $tooltip_text .= '<span class="stat-label label-defensive">Heal</span> <span class="green">+'.$suggested_lb5_value.'%</span>';
                                            }
                                            else if($suggested_lb5=='Atk increase on enemy kill') {
                                                $tooltip_text .= '<span class="weapon-stat weapon-atk-on-kill"><span class="green">+'.$suggested_lb5_value.'%</span> Atk increase on enemy kill</span>';
                                            }
                                            else if($suggested_lb5=='HP recovery on enemy kill') {
                                                $tooltip_text .= '<span class="weapon-stat weapon-hp-on-kill"><span class="green">+'.$suggested_lb5_value.'%</span> HP recovery on enemy kill</span>';
                                            }
                                            else if($suggested_lb5=='Seconds of weapon skill Regen time on enemy kill') {
                                                $tooltip_text .= '<span class="weapon-stat weapon-regen-on-kill"><span class="green">'.$suggested_lb5_value.'</span> seconds of weapon skill Regen time on enemy kill</span>';
                                            }
                                            else if($suggested_lb5=='Shield increase on battle start') {
                                                $tooltip_text .= '<span class="weapon-stat weapon-shield-on-start"><span class="green">+'.$suggested_lb5_value.'%</span> shield increase on battle start</span>';
                                            }
                                            else if($suggested_lb5=='Shield increase on enemy kill') {
                                                $tooltip_text .= '<span class="weapon-stat weapon-shield-on-kill"><span class="green">+'.$suggested_lb5_value.'%</span> shield increase on enemy kill</span>';
                                            }
                                            else if($suggested_lb5=='Skill Damage') {
                                                $tooltip_text .= '<span class="weapon-stat weapon-skill-damage"><span class="stat-label label-defensive">Skill Damage</span> +'.$suggested_lb5_value.'%</span>';
                                            }
                                            else if($suggested_lb5=='Weapon Skill Regen Speed') {
                                                $tooltip_text .= '<span class="weapon-stat weapon-regen-speed"><span class="stat-label label-defensive">Weapon Skill Regen Speed</span> +'.$suggested_lb5_value.'%</span>';
                                            }
                                            $tooltip_text .= '<br>';
                                        } 
                                        if ($suggested_exclusive) {
                                            $hero = get_field('hero', $suggested_accessory)[0];
                                            $suggested_exclusive_effects = get_field('exclusive_effects', $suggested_accessory);
                                            $tooltip_text .= '<br><span class="exclusive"><span class="exclusive-header">[';
                                            $tooltip_text .= $hero->post_title;
                                            $tooltip_text .= ' only]</span><br>';
                                            $tooltip_text .= $suggested_exclusive_effects;
                                            $tooltip_text .= '</span><br>';
                                        }
                                        if(sizeof($suggested_sub_options) > 0) {
                                            $tooltip_text .= '<br><span class="weapon-stat limit-break limit-break-header sub-options-text">[Sub-Options] <span class="sub-options-max">(Max '.$suggested_max_lines.')</span></span>';
                                            if ($suggested_sub_atk>0) {
                                                $tooltip_text .= '<span class="weapon-stat weapon-atk"><span class="stat-label label-offensive">Atk</span> +'.$suggested_sub_atk.'%</span>';
                                            }  
                                            if ($suggested_sub_heal_flat>0) {
                                                $tooltip_text .= '<span class="weapon-stat weapon-heal-flat"><span class="stat-label label-offensive">Heal </span> '.$suggested_sub_heal_flat.'</span>';
                                            } 
                                            if ($suggested_sub_crit>0) {
                                                $tooltip_text .= '<span class="weapon-stat weapon-crit"><span class="stat-label label-offensive">Crit Hit Chance</span> '.$suggested_sub_crit.'%</span>';
                                            } 
                                            if ($suggested_sub_def_flat>0) {
                                                $tooltip_text .= '<span class="weapon-stat weapon-def-flat"><span class="stat-label label-offensive">Def</span> '.$suggested_sub_def_flat.'</span>';
                                            } 
                                            if ($suggested_sub_dr>0) {
                                                $tooltip_text .= '<span class="weapon-stat weapon-dr"><span class="stat-label">Damage Reduction</span> <span class="green">'.$suggested_sub_dr.'</span></span>';
                                            }
                                            if ($suggested_sub_atk_on_kill>0) {
                                                $tooltip_text .= '<span class="weapon-stat weapon-atk-on-kill"><span class="green">+'.$suggested_sub_atk_on_kill.'%</span> Atk increase on enemy kill</span>';
                                            } 
                                            if ($suggested_sub_hp_on_kill>0) {
                                                $tooltip_text .= '<span class="weapon-stat weapon-hp-on-kill"><span class="green">+'.$suggested_sub_hp_on_kill.'%</span> HP recovery on enemy kill</span>';
                                            } 
                                            if ($suggested_sub_accessory_on_kill>0) {
                                                $tooltip_text .= '<span class="weapon-stat weapon-shield-on-kill"><span class="green">+'.$suggested_sub_accessory_on_kill.'%</span> shield increase on enemy kill</span>';
                                            } 
                                            if ($suggested_sub_accessory_on_start>0) {
                                                $tooltip_text .= '<span class="weapon-stat weapon-shield-on-start"><span class="green">+'.$suggested_sub_accessory_on_start.'%</span> shield increase on battle start</span>';
                                            }
                                            if ($suggested_sub_def>0) {
                                                $tooltip_text .= '<span class="weapon-stat weapon-def"><span class="stat-label label-defensive">Def</span> +'.$suggested_sub_def.'%</span>';
                                            } 
                                            if ($suggested_sub_hp>0) {
                                                $tooltip_text .= '<span class="weapon-stat weapon-hp"><span class="stat-label label-defensive">HP</span> +'.$suggested_sub_hp.'%</span>';
                                            }
                                            if ($suggested_sub_heal>0) {
                                                $tooltip_text .= '<span class="weapon-stat weapon-heal"><span class="stat-label label-defensive">Heal</span> +'.$suggested_sub_heal.'%</span>';
                                            } 
                                            if ($suggested_sub_skill_damage>0) {
                                                $tooltip_text .= '<span class="weapon-stat weapon-skill-damage"><span class="stat-label label-defensive">Skill Damage</span> +'.$suggested_sub_skill_damage.'%</span>';
                                            }  
                                            if ($suggested_sub_skill_regen_speed>0) {
                                                $tooltip_text .= '<span class="weapon-stat weapon-regen-speed"><span class="stat-label label-defensive">Weapon Skill Regen Speed</span> +'.$suggested_sub_skill_regen_speed.'%</span>';
                                            } 
                                            if ($suggested_sub_skill_regen_on_kill<0) {
                                                $tooltip_text .= '<span class="weapon-stat weapon-regen-on-kill"><span class="green">'.$suggested_sub_skill_regen_on_kill.'</span> seconds of weapon skill Regen time on enemy kill</span>';
                                            } 
                                            if ($suggested_sub_earth_type_atk>0) {
                                                $tooltip_text .= '<span class="weapon-stat weapon-def"><span class="stat-label label-defensive">Earth type Atk</span> +'.$suggested_sub_earth_type_atk.'%</span>';
                                            } 
                                            if ($suggested_sub_fire_type_atk>0) {
                                                $tooltip_text .= '<span class="weapon-stat weapon-def"><span class="stat-label label-defensive">Fire type Atk</span> +'.$suggested_sub_fire_type_atk.'%</span>';
                                            }
                                            if ($suggested_sub_water_type_atk>0) {
                                                $tooltip_text .= '<span class="weapon-stat weapon-def"><span class="stat-label label-defensive">Water type Atk</span> +'.$suggested_sub_water_type_atk.'%</span>';
                                            }  
                                            if ($suggested_sub_basic_type_atk>0) {
                                                $tooltip_text .= '<span class="weapon-stat weapon-def"><span class="stat-label label-defensive">Basic type Atk</span> +'.$suggested_sub_basic_type_atk.'%</span>';
                                            } 
                                            if ($suggested_sub_light_type_atk>0) {
                                                $tooltip_text .= '<span class="weapon-stat weapon-def"><span class="stat-label label-defensive">Light type Atk</span> +'.$suggested_sub_light_type_atk.'%</span>';
                                            } 
                                            if ($suggested_sub_dark_type_atk>0) {
                                                $tooltip_text .= '<span class="weapon-stat weapon-def"><span class="stat-label label-defensive">Dark type Atk</span> +'.$suggested_sub_dark_type_atk.'%</span>';
                                            } 
                                            foreach($negated_sub_options as $negated) 
                                            {
                                                $tooltip_text .= '<span class="weapon-stat weapon-def">'.$negated.'</span>';
                                            }
                                        }

                                        echo '<div class="suggested-item">';
                                        echo "<div class='item-tooltip item-with-description' id='item-".$suggested_accessory."' style='background:url(".get_the_post_thumbnail_url($suggested_accessory,'thumbnail').");'></div> ";
                                        echo "<a href='".get_the_permalink($suggested_accessory)."'><strong class='item-explanation-title'>".get_the_title($suggested_accessory)."</strong></a><span class='suggested-explanation'>";
                                        echo get_sub_field('accessory_explanation');
                                        echo '</span></div>';
                                        $tooltip_text = addslashes(str_replace("\r\n","",$tooltip_text));
                                        echo '<script type="text/javascript">jQuery(function ($) { $("#item-'.$suggested_accessory.'").prop(\'title\', \'<img class="item-tooltip-image" src="'.get_the_post_thumbnail_url($suggested_accessory,'thumbnail').'" /><span class="bold item-tooltip-title">'.get_the_title($suggested_accessory).'</span><br>'.$tooltip_text.'\');$("#item-'.$suggested_accessory.'").tooltip({tooltipClass 	: "item-tooltip",persistent 	: true,html 	: true,trigger 	: "hover"}); });</script>';
                                    ?>
                                <?php
                                }
                                ?>
                                </div>
                                </div>
                                <?php
                                endif;
                                ?>
                                <?php if(have_rows('build_guide_fields_suggested_merch')) : ?>
                                <div class="section-box">
                                    <h4>Suggested Merch<span class="fa fa-plus"></h4>
                                    <div class="section-content">
                                    <?php
                                    $first_item = true;
                                    while(have_rows('build_guide_fields_suggested_merch')) {
                                        the_row(); 
                                        if($first_item) {
                                            $first_item = false;
                                        }
                                        else {
                                            echo '<h6 class="separator"><span>OR</span></h6>';
                                        }
                                        $suggested_merch = get_sub_field('suggested_merch');
                                        $suggested_element = get_field('element', $suggested_merch);
                                        $suggested_max_atk = get_field('max_atk', $suggested_merch);

                                        $suggested_exclusive = get_field('exclusive', $suggested_merch);

                                        $suggested_magazine = get_field('magazine', $suggested_merch);
                                        $suggested_atk = get_field('atk', $suggested_merch);
                                        $suggested_crit = get_field('crit_chance', $suggested_merch);
                                        $suggested_dr = get_field('damage_reduction', $suggested_merch);
                                        $suggested_def_flat = get_field('def_flat', $suggested_merch);
                                        $suggested_def = get_field('def', $suggested_merch);
                                        $suggested_heal_flat = get_field('heal_flat', $suggested_merch);
                                        $suggested_heal = get_field('heal_percent', $suggested_merch);
                                        $suggested_hp = get_field('hp', $suggested_merch);
                                        $suggested_atk_on_kill = get_field('atk_on_kill', $suggested_merch);
                                        $suggested_hp_on_kill = get_field('hp_on_kill', $suggested_merch);
                                        $suggested_skill_regen_on_kill = get_field('skill_regen_on_kill', $suggested_merch);
                                        $suggested_merch_on_start = get_field('shield_on_start', $suggested_merch);
                                        $suggested_merch_on_kill = get_field('shield_on_kill', $suggested_merch);
                                        $suggested_skill_damage = get_field('skill_damage', $suggested_merch);
                                        $suggested_skill_regen_speed = get_field('skill_regen_speed', $suggested_merch);
                                        $suggested_earth_type_atk = get_field('earth_type_atk', $suggested_merch);
                                        $suggested_fire_type_atk = get_field('fire_type_atk', $suggested_merch);
                                        $suggested_water_type_atk = get_field('water_type_atk', $suggested_merch);
                                        $suggested_dark_type_atk = get_field('dark_type_atk', $suggested_merch);
                                        $suggested_light_type_atk = get_field('light_type_atk', $suggested_merch);
                                        $suggested_basic_type_atk = get_field('basic_type_atk', $suggested_merch);
                                        $suggested_options = get_field('options', $suggested_merch);

                                        $suggested_sub_atk = get_field('sub_atk', $suggested_merch);
                                        $suggested_sub_crit = get_field('sub_crit_chance', $suggested_merch);
                                        $suggested_sub_dr = get_field('sub_damage_reduction', $suggested_merch);
                                        $suggested_sub_def_flat = get_field('sub_def_flat', $suggested_merch);
                                        $suggested_sub_def = get_field('sub_def', $suggested_merch);
                                        $suggested_sub_heal_flat = get_field('sub_heal_flat', $suggested_merch);
                                        $suggested_sub_heal = get_field('sub_heal_percent', $suggested_merch);
                                        $suggested_sub_hp = get_field('sub_hp', $suggested_merch);
                                        $suggested_sub_atk_on_kill = get_field('sub_atk_on_kill', $suggested_merch);
                                        $suggested_sub_hp_on_kill = get_field('sub_hp_on_kill', $suggested_merch);
                                        $suggested_sub_skill_regen_on_kill = get_field('sub_skill_regen_on_kill', $suggested_merch);
                                        $suggested_sub_accessory_on_start = get_field('sub_accessory_on_start', $suggested_merch);
                                        $suggested_sub_accessory_on_kill = get_field('sub_accessory_on_kill', $suggested_merch);
                                        $suggested_sub_skill_damage = get_field('sub_skill_damage', $suggested_merch);
                                        $suggested_sub_skill_regen_speed = get_field('sub_skill_regen_speed', $suggested_merch);
                                        $suggested_sub_earth_type_atk = get_field('sub_earth_type_atk', $suggested_merch);
                                        $suggested_sub_fire_type_atk = get_field('sub_fire_type_atk', $suggested_merch);
                                        $suggested_sub_water_type_atk = get_field('sub_water_type_atk', $suggested_merch);
                                        $suggested_sub_dark_type_atk = get_field('sub_dark_type_atk', $suggested_merch);
                                        $suggested_sub_light_type_atk = get_field('sub_light_type_atk', $suggested_merch);
                                        $suggested_sub_basic_type_atk = get_field('sub_basic_type_atk', $suggested_merch);
                                        $suggested_sub_options = get_field('sub_options', $suggested_merch);

                                        $suggested_rarity = get_field('rarity', $suggested_merch);

                                        $suggested_lb5 = get_field('lb5_option', $suggested_merch);
                                        $suggested_lb5_value = get_field('lb5_value', $suggested_merch);
                                        $suggested_skill_name = get_field('weapon_skill_name', $suggested_merch);
                                        $suggested_skill_name = preg_replace('/Lv\.\d*/i', '<span class="skill-level">$0</span>', $suggested_skill_name);
                                        $suggested_skill_atk = get_field('weapon_skill_atk', $suggested_merch);
                                        $suggested_skill_regen_time = get_field('weapon_skill_regen_time', $suggested_merch);
                                        $suggested_skill_description = get_field('weapon_skill_description', $suggested_merch);
                                        $suggested_skill_description = str_replace("injured", '<span class="green">injured</span>', $suggested_skill_description);
                                        $suggested_skill_description = str_replace("airborne", '<span class="cyan">airborne</span>', $suggested_skill_description);
                                        $suggested_skill_description = str_replace("downed", '<span class="yellowgreen">downed</span>', $suggested_skill_description);

                                        $negated_options = preg_grep('/.*negated.*/', $suggested_options);
                                        $negated_sub_options = preg_grep('/.*negated.*/', $suggested_sub_options);

                                        $suggested_max_lines = get_field('max_lines', $suggested_merch);

                                        $suggested_type = get_the_terms($suggested_merch, 'item_categories');
                                        $suggested_skill_chain = get_field('weapon_skill_chain', $suggested_merch);

                                        $tooltip_text = '';

                                        if($suggested_type[0]->name=='Weapon') {
                                            $tooltip_text .= '<span class="weapon-stat weapon-dps">'.get_field('dps', $suggested_merch).' <span class="dps-label">DPS</span></span><br>';
                                        }
                                        elseif($suggested_type[0]->name=='Card') {
                                        }
                                        elseif($suggested_type[0]->name=='Costume') {
                                            $costume_hero = get_field('hero')[0];
                                            $tooltip_text .= '<div class="applicable-heroes">Applicable Heroes</div>';
                                            $tooltip_text .= '<a href="'.get_the_permalink($costume_hero->ID).'"><div class="applicable-hero">';
                                            $tooltip_text .= '<img class="applicable-hero-image" src="'.get_the_post_thumbnail_url($costume_hero->ID, 'thumbnail').'">';
                                            $tooltip_text .= '<div class="applicable-hero-info"><span class="applicable-hero-name">'.$costume_hero->post_title.'</span></div></div></a>';
                                        }
                                        else {
                                            $tooltip_text .= '<span class="weapon-stat equipment-rarity">'.$suggested_rarity.' '.$suggested_type[0]->name.'</span><br>';
                                        }
                                        $tooltip_text .= '</div>';
                                        if($suggested_type[0]->name=='Weapon') {
                                            $tooltip_text .= '<span class="weapon-stat weapon-atk"><span class="stat-label weapon-'.get_field('element', $suggested_merch).'">'.get_field('element', $suggested_merch).' Atk</span> '.get_field('max_atk', $suggested_merch).'</span>';
                                        }
                                        
                                        if ($suggested_atk>0) {
                                            $tooltip_text .= '<span class="weapon-stat weapon-atk"><span class="stat-label label-offensive">Atk</span> +'.$suggested_atk.'%</span>';
                                        }  
                                        if ($suggested_magazine>0) {
                                            $tooltip_text .= '<span class="weapon-stat weapon-magazine"><span class="stat-label label-offensive">Magazine Size</span> '.$suggested_magazine.'</span>';
                                        } 
                                        if ($suggested_heal_flat>0) {
                                            $tooltip_text .= '<span class="weapon-stat weapon-heal-flat"><span class="stat-label label-offensive">Heal </span> '.$suggested_heal_flat.'</span>';
                                        } 
                                        if ($suggested_crit>0) {
                                            $tooltip_text .= '<span class="weapon-stat weapon-crit"><span class="stat-label label-offensive">Crit Hit Chance</span> '.$suggested_crit.'%</span>';
                                        } 
                                        if ($suggested_def_flat>0) {
                                            $tooltip_text .= '<span class="weapon-stat weapon-def-flat"><span class="stat-label label-offensive">Def</span> '.$suggested_def_flat.'</span>';
                                        } 
                                        if ($suggested_dr>0) {
                                            $tooltip_text .= '<span class="weapon-stat weapon-dr"><span class="stat-label">Damage Reduction</span> <span class="green">'.$suggested_dr.'</span></span>';
                                        }
                                        if ($suggested_atk_on_kill>0) {
                                            $tooltip_text .= '<span class="weapon-stat weapon-atk-on-kill"><span class="green">+'.$suggested_atk_on_kill.'%</span> Atk increase on enemy kill</span>';
                                        } 
                                        if ($suggested_hp_on_kill>0) {
                                            $tooltip_text .= '<span class="weapon-stat weapon-hp-on-kill"><span class="green">+'.$suggested_hp_on_kill.'%</span> HP recovery on enemy kill</span>';
                                        } 
                                        if ($suggested_merch_on_kill>0) {
                                            $tooltip_text .= '<span class="weapon-stat weapon-shield-on-kill"><span class="green">+'.$suggested_merch_on_kill.'%</span> shield increase on enemy kill</span>';
                                        } 
                                        if ($suggested_merch_on_start>0) {
                                            $tooltip_text .= '<span class="weapon-stat weapon-shield-on-start"><span class="green">+'.$suggested_merch_on_start.'%</span> shield increase on battle start</span>';
                                        }
                                        if ($suggested_def>0) {
                                            $tooltip_text .= '<span class="weapon-stat weapon-def"><span class="stat-label label-defensive">Def</span> +'.$suggested_def.'%</span>';
                                        } 
                                        if ($suggested_hp>0) {
                                            $tooltip_text .= '<span class="weapon-stat weapon-hp"><span class="stat-label label-defensive">HP</span> +'.$suggested_hp.'%</span>';
                                        }
                                        if ($suggested_heal>0) {
                                            $tooltip_text .= '<span class="weapon-stat weapon-heal"><span class="stat-label label-defensive">Heal</span> +'.$suggested_heal.'%</span>';
                                        } 
                                        if ($suggested_skill_damage>0) {
                                            $tooltip_text .= '<span class="weapon-stat weapon-skill-damage"><span class="stat-label label-defensive">Skill Damage</span> +'.$suggested_skill_damage.'%</span>';
                                        }  
                                        if ($suggested_skill_regen_speed>0) {
                                            $tooltip_text .= '<span class="weapon-stat weapon-regen-speed"><span class="stat-label label-defensive">Weapon Skill Regen Speed</span> +'.$suggested_skill_regen_speed.'%</span>';
                                        } 
                                        if ($suggested_skill_regen_on_kill<0) {
                                            $tooltip_text .= '<span class="weapon-stat weapon-regen-on-kill"><span class="green">'.$suggested_skill_regen_on_kill.'</span> seconds of weapon skill Regen time on enemy kill</span>';
                                        } 
                                        if ($suggested_earth_type_atk>0) {
                                            $tooltip_text .= '<span class="weapon-stat weapon-def"><span class="stat-label label-defensive">Earth type Atk</span> +'.$suggested_earth_type_atk.'%</span>';
                                        } 
                                        if ($suggested_fire_type_atk>0) {
                                            $tooltip_text .= '<span class="weapon-stat weapon-def"><span class="stat-label label-defensive">Fire type Atk</span> +'.$suggested_fire_type_atk.'%</span>';
                                        }
                                        if ($suggested_water_type_atk>0) {
                                            $tooltip_text .= '<span class="weapon-stat weapon-def"><span class="stat-label label-defensive">Water type Atk</span> +'.$suggested_water_type_atk.'%</span>';
                                        }  
                                        if ($suggested_basic_type_atk>0) {
                                            $tooltip_text .= '<span class="weapon-stat weapon-def"><span class="stat-label label-defensive">Basic type Atk</span> +'.$suggested_basic_type_atk.'%</span>';
                                        } 
                                        if ($suggested_light_type_atk>0) {
                                            $tooltip_text .= '<span class="weapon-stat weapon-def"><span class="stat-label label-defensive">Light type Atk</span> +'.$suggested_light_type_atk.'%</span>';
                                        } 
                                        if ($suggested_dark_type_atk>0) {
                                            $tooltip_text .= '<span class="weapon-stat weapon-def"><span class="stat-label label-defensive">Dark type Atk</span> +'.$suggested_dark_type_atk.'%</span>';
                                        } 
                                        foreach($negated_options as $negated) 
                                        {
                                            $tooltip_text .= '<span class="weapon-stat weapon-def">'.$negated.'</span>';
                                        }
                                        if($suggested_lb5)
                                        {
                                            $tooltip_text .= '<br><span class="weapon-stat limit-break limit-break-header">[Required Limit Break 5]</span><span class="weapon-stat limit-break">';
                                            if($suggested_lb5=='Atk (%)'){
                                                $tooltip_text .= '<span class="stat-label label-defensive">Atk</span> <span class="green">+'.$suggested_lb5_value.'%</span>';
                                            }
                                            else if($suggested_lb5=='HP (%)') {
                                                $tooltip_text .= '<span class="stat-label label-defensive">HP</span> <span class="green">+'.$suggested_lb5_value.'%</span>';
                                            }
                                            else if($suggested_lb5=='Crit Hit Chance') {
                                                $tooltip_text .= '<span class="stat-label label-defensive">Crit Hit Chance</span> <span class="green">+'.$suggested_lb5_value.'%</span>';
                                            }
                                            else if($suggested_lb5=='Damage Reduction') {
                                                $tooltip_text .= '<span class="stat-label label-defensive">Damage Reduction</span> <span class="green">+'.$suggested_lb5_value.'</span>';
                                            }
                                            else if($suggested_lb5=='Def') {
                                                $tooltip_text .= '<span class="stat-label label-defensive">Def</span> <span class="green">+'.$suggested_lb5_value.'%</span>';
                                            }
                                            else if($suggested_lb5=='Heal (Flat)') {
                                                $tooltip_text .= '<span class="stat-label label-defensive">Heal</span> <span class="green">+'.$suggested_lb5_value.'</span>';
                                            }
                                            else if($suggested_lb5=='Heal (%)') {
                                                $tooltip_text .= '<span class="stat-label label-defensive">Heal</span> <span class="green">+'.$suggested_lb5_value.'%</span>';
                                            }
                                            else if($suggested_lb5=='Atk increase on enemy kill') {
                                                $tooltip_text .= '<span class="weapon-stat weapon-atk-on-kill"><span class="green">+'.$suggested_lb5_value.'%</span> Atk increase on enemy kill</span>';
                                            }
                                            else if($suggested_lb5=='HP recovery on enemy kill') {
                                                $tooltip_text .= '<span class="weapon-stat weapon-hp-on-kill"><span class="green">+'.$suggested_lb5_value.'%</span> HP recovery on enemy kill</span>';
                                            }
                                            else if($suggested_lb5=='Seconds of weapon skill Regen time on enemy kill') {
                                                $tooltip_text .= '<span class="weapon-stat weapon-regen-on-kill"><span class="green">'.$suggested_lb5_value.'</span> seconds of weapon skill Regen time on enemy kill</span>';
                                            }
                                            else if($suggested_lb5=='Shield increase on battle start') {
                                                $tooltip_text .= '<span class="weapon-stat weapon-shield-on-start"><span class="green">+'.$suggested_lb5_value.'%</span> shield increase on battle start</span>';
                                            }
                                            else if($suggested_lb5=='Shield increase on enemy kill') {
                                                $tooltip_text .= '<span class="weapon-stat weapon-shield-on-kill"><span class="green">+'.$suggested_lb5_value.'%</span> shield increase on enemy kill</span>';
                                            }
                                            else if($suggested_lb5=='Skill Damage') {
                                                $tooltip_text .= '<span class="weapon-stat weapon-skill-damage"><span class="stat-label label-defensive">Skill Damage</span> +'.$suggested_lb5_value.'%</span>';
                                            }
                                            else if($suggested_lb5=='Weapon Skill Regen Speed') {
                                                $tooltip_text .= '<span class="weapon-stat weapon-regen-speed"><span class="stat-label label-defensive">Weapon Skill Regen Speed</span> +'.$suggested_lb5_value.'%</span>';
                                            }
                                            $tooltip_text .= '<br>';
                                        } 
                                        if ($suggested_exclusive) {
                                            $hero = get_field('hero', $suggested_merch)[0];
                                            $suggested_exclusive_effects = get_field('exclusive_effects', $suggested_merch);
                                            $tooltip_text .= '<br><span class="exclusive"><span class="exclusive-header">[';
                                            $tooltip_text .= $hero->post_title;
                                            $tooltip_text .= ' only]</span><br>';
                                            $tooltip_text .= $suggested_exclusive_effects;
                                            $tooltip_text .= '</span><br>';
                                        }
                                        if(sizeof($suggested_sub_options) > 0) {
                                            $tooltip_text .= '<br><span class="weapon-stat limit-break limit-break-header sub-options-text">[Sub-Options] <span class="sub-options-max">(Max '.$suggested_max_lines.')</span></span>';
                                            if ($suggested_sub_atk>0) {
                                                $tooltip_text .= '<span class="weapon-stat weapon-atk"><span class="stat-label label-offensive">Atk</span> +'.$suggested_sub_atk.'%</span>';
                                            }  
                                            if ($suggested_sub_heal_flat>0) {
                                                $tooltip_text .= '<span class="weapon-stat weapon-heal-flat"><span class="stat-label label-offensive">Heal </span> '.$suggested_sub_heal_flat.'</span>';
                                            } 
                                            if ($suggested_sub_crit>0) {
                                                $tooltip_text .= '<span class="weapon-stat weapon-crit"><span class="stat-label label-offensive">Crit Hit Chance</span> '.$suggested_sub_crit.'%</span>';
                                            } 
                                            if ($suggested_sub_def_flat>0) {
                                                $tooltip_text .= '<span class="weapon-stat weapon-def-flat"><span class="stat-label label-offensive">Def</span> '.$suggested_sub_def_flat.'</span>';
                                            } 
                                            if ($suggested_sub_dr>0) {
                                                $tooltip_text .= '<span class="weapon-stat weapon-dr"><span class="stat-label">Damage Reduction</span> <span class="green">'.$suggested_sub_dr.'</span></span>';
                                            }
                                            if ($suggested_sub_atk_on_kill>0) {
                                                $tooltip_text .= '<span class="weapon-stat weapon-atk-on-kill"><span class="green">+'.$suggested_sub_atk_on_kill.'%</span> Atk increase on enemy kill</span>';
                                            } 
                                            if ($suggested_sub_hp_on_kill>0) {
                                                $tooltip_text .= '<span class="weapon-stat weapon-hp-on-kill"><span class="green">+'.$suggested_sub_hp_on_kill.'%</span> HP recovery on enemy kill</span>';
                                            } 
                                            if ($suggested_sub_accessory_on_kill>0) {
                                                $tooltip_text .= '<span class="weapon-stat weapon-shield-on-kill"><span class="green">+'.$suggested_sub_accessory_on_kill.'%</span> shield increase on enemy kill</span>';
                                            } 
                                            if ($suggested_sub_accessory_on_start>0) {
                                                $tooltip_text .= '<span class="weapon-stat weapon-shield-on-start"><span class="green">+'.$suggested_sub_accessory_on_start.'%</span> shield increase on battle start</span>';
                                            }
                                            if ($suggested_sub_def>0) {
                                                $tooltip_text .= '<span class="weapon-stat weapon-def"><span class="stat-label label-defensive">Def</span> +'.$suggested_sub_def.'%</span>';
                                            } 
                                            if ($suggested_sub_hp>0) {
                                                $tooltip_text .= '<span class="weapon-stat weapon-hp"><span class="stat-label label-defensive">HP</span> +'.$suggested_sub_hp.'%</span>';
                                            }
                                            if ($suggested_sub_heal>0) {
                                                $tooltip_text .= '<span class="weapon-stat weapon-heal"><span class="stat-label label-defensive">Heal</span> +'.$suggested_sub_heal.'%</span>';
                                            } 
                                            if ($suggested_sub_skill_damage>0) {
                                                $tooltip_text .= '<span class="weapon-stat weapon-skill-damage"><span class="stat-label label-defensive">Skill Damage</span> +'.$suggested_sub_skill_damage.'%</span>';
                                            }  
                                            if ($suggested_sub_skill_regen_speed>0) {
                                                $tooltip_text .= '<span class="weapon-stat weapon-regen-speed"><span class="stat-label label-defensive">Weapon Skill Regen Speed</span> +'.$suggested_sub_skill_regen_speed.'%</span>';
                                            } 
                                            if ($suggested_sub_skill_regen_on_kill<0) {
                                                $tooltip_text .= '<span class="weapon-stat weapon-regen-on-kill"><span class="green">'.$suggested_sub_skill_regen_on_kill.'</span> seconds of weapon skill Regen time on enemy kill</span>';
                                            } 
                                            if ($suggested_sub_earth_type_atk>0) {
                                                $tooltip_text .= '<span class="weapon-stat weapon-def"><span class="stat-label label-defensive">Earth type Atk</span> +'.$suggested_sub_earth_type_atk.'%</span>';
                                            } 
                                            if ($suggested_sub_fire_type_atk>0) {
                                                $tooltip_text .= '<span class="weapon-stat weapon-def"><span class="stat-label label-defensive">Fire type Atk</span> +'.$suggested_sub_fire_type_atk.'%</span>';
                                            }
                                            if ($suggested_sub_water_type_atk>0) {
                                                $tooltip_text .= '<span class="weapon-stat weapon-def"><span class="stat-label label-defensive">Water type Atk</span> +'.$suggested_sub_water_type_atk.'%</span>';
                                            }  
                                            if ($suggested_sub_basic_type_atk>0) {
                                                $tooltip_text .= '<span class="weapon-stat weapon-def"><span class="stat-label label-defensive">Basic type Atk</span> +'.$suggested_sub_basic_type_atk.'%</span>';
                                            } 
                                            if ($suggested_sub_light_type_atk>0) {
                                                $tooltip_text .= '<span class="weapon-stat weapon-def"><span class="stat-label label-defensive">Light type Atk</span> +'.$suggested_sub_light_type_atk.'%</span>';
                                            } 
                                            if ($suggested_sub_dark_type_atk>0) {
                                                $tooltip_text .= '<span class="weapon-stat weapon-def"><span class="stat-label label-defensive">Dark type Atk</span> +'.$suggested_sub_dark_type_atk.'%</span>';
                                            } 
                                            foreach($negated_sub_options as $negated) 
                                            {
                                                $tooltip_text .= '<span class="weapon-stat weapon-def">'.$negated.'</span>';
                                            }
                                        }

                                        echo '<div class="suggested-item">';
                                        echo "<div class='item-tooltip item-with-description' id='item-".$suggested_merch."' style='background:url(".get_the_post_thumbnail_url($suggested_merch,'thumbnail').");'></div> ";
                                        echo "<a href='".get_the_permalink($suggested_merch)."'><strong class='item-explanation-title'>".get_the_title($suggested_merch)."</strong></a><span class='suggested-explanation'>";
                                        echo get_sub_field('accessory_explanation');
                                        echo '</span></div>';
                                        $tooltip_text = addslashes(str_replace("\r\n","",$tooltip_text));
                                        echo '<script type="text/javascript">jQuery(function ($) { $("#item-'.$suggested_merch.'").prop(\'title\', \'<img class="item-tooltip-image" src="'.get_the_post_thumbnail_url($suggested_merch,'thumbnail').'" /><span class="bold item-tooltip-title">'.get_the_title($suggested_merch).'</span><br>'.$tooltip_text.'\');$("#item-'.$suggested_merch.'").tooltip({tooltipClass 	: "item-tooltip",persistent 	: true,html 	: true,trigger 	: "hover"}); });</script>';
                                    ?>
                                <?php
                                }
                                ?>
                                </div>
                                </div>
                                <?php
                                endif;
                                ?>
                                <?php if(have_rows('build_guide_fields_suggested_cards')) : ?>
                                <div class="section-box">
                                    <h4>Suggested Cards<span class="fa fa-plus"></h4>
                                    <div class="section-content">
                                    <?php
                                    $first_item = true;
                                    while(have_rows('build_guide_fields_suggested_cards')) {
                                        the_row(); 
                                        if($first_item) {
                                            $first_item = false;
                                        }
                                        else {
                                            echo '<h6 class="separator"><span>OR</span></h6>';
                                        }
                                        $suggested_card = get_sub_field('suggested_card');
                                        echo '<div class="suggested-item">';
                                        echo "<strong class='suggested-card-title'>".$suggested_card."</strong><span class='suggested-explanation'>";
                                        echo get_sub_field('card_explanation');
                                        echo '</span></div>';                       
                                    ?>
                                <?php
                                }
                                ?>
                                </div>
                                </div>
                                <?php
                                endif;
                                ?>
                                
                        <?php endif; ?>
                        </div>
                        <?php
                    // Post share
                    if ( class_exists('Heavenhold_core') ) {
                        heavenholdcore_social_share();
                    }

                    // If comments are open or we have at least one comment, load up the comment template.
                    if ( comments_open() || get_comments_number() ) :
                        comments_template();
                    endif;
                    ?>
                    <script>
                        jQuery(function($) {
                            $('.portrait-button:first-child').click(); 
                            $('.variation-button:first-child').click();                                                       
                            var owl = $(".owl-carousel");
                            owl.owlCarousel({
                                animateOut: 'slideOutDown',
                                autoplay: true,
                                autoplayHoverPause: true,
                                items:3,
                                margin:15,
                                video:true,
                                smartSpeed:450,
                                nav: true,
                                dots: false,
                                navText: ['<span class="fas fa-chevron-left fa-3x"></span>','<span class="fas fa-chevron-right fa-3x"></span>'],
                                responsive: {
                                    0: {
                                    items: 2
                                    },
                                    600: {
                                    items: 3
                                    }
                                }
                            });
                            owl.on('mousewheel', '.owl-stage', function (e) {
                                if (e.deltaY>0) {
                                    owl.trigger('next.owl');
                                } else {
                                    owl.trigger('prev.owl');
                                }
                                e.preventDefault();
                            });
                        });
                    </script>
            </div>
            <div class="col-lg-4">
            <?php dynamic_sidebar( 'forum_archive_sidebar' ); ?>
            <div class="hero-box hb-desktop">
                <?php if($variations > 1) : ?> 
                    <div class="variation-buttons">
                        <span class="variation-button" data-variation="variation-1"><?php echo $fullname; ?></span>
                        <span class="variation-button" data-variation="variation-2"><?php echo $fullname2; ?></span>
                    </div> 
                <?php endif; ?>
                
                <img class="hero-portrait" src>  
                <span class="variation-section variation-1">
                    <div class="portrait-buttons">
                        <?php while( have_rows('portrait') ) : the_row(); ?>
                            <?php
                                $portrait = get_sub_field('art');
                                $portrait_title = get_sub_field('title');
                            ?>
                            <span class="portrait-button" data-image="<?php echo $portrait; ?>"><?php echo $portrait_title; ?></span>
                        <?php endwhile; ?>    
                    </div>
                </span> 
                <?php if($variations > 1) : ?>
                    <span class="variation-section variation-2">
                        <div class="portrait-buttons">
                            <?php while( have_rows('portrait_2') ) : the_row(); ?>
                                <?php
                                    $portrait = get_sub_field('art');
                                    $portrait_title = get_sub_field('title');
                                ?> 
                                <span class="portrait-button" data-image="<?php echo $portrait; ?>"><?php echo $portrait_title; ?></span>
                            <?php endwhile; ?>
                        </div>
                    </span> 
                <?php endif; ?>
                <table class="hero-box-table">
                    <tr>
                        <td class="hero-box-left">Name</td>
                        <td class="hero-box-right">
                            <span class="variation-section variation-1"><?php echo $fullname ?></span>
                            <?php if($variations > 1) : ?>
                                <span class="variation-section variation-2"><?php echo $fullname2 ?></span>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="hero-box-left">Released</td><td class="hero-box-right">
                        <?php 
                        if($kr_release_date==$global_release_date) {
                            echo $kr_release_date.' (GL/KR)';
                        }
                        else 
                        {
                            if($kr_release_date) {
                                echo $kr_release_date.' (Korea)';
                            }
                            if($global_release_date) {
                                if($kr_release_date) {
                                    echo '<br>';
                                }
                                echo $global_release_date.' (Global)';
                            }                                    
                        }
                        if($jp_release_date) {
                            if($kr_release_date || $global_release_date) {
                                echo '<br>';
                            }
                            echo $jp_release_date.' (Japan)';
                        }
                        ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="hero-box-left">Age</td>
                        <td class="hero-box-right">
                            <span class="variation-section variation-1"><?php echo $age ?></span>
                            <?php if($variations > 1) : ?>
                                <span class="variation-section variation-2"><?php echo $age2 ?></span>
                            <?php endif; ?> 
                        </td>
                    </tr>
                    <tr>
                        <td class="hero-box-left">Height</td>
                        <td class="hero-box-right">
                            <span class="variation-section variation-1"><?php echo $height ?></span>
                            <?php if($variations > 1) : ?>
                                <span class="variation-section variation-2"><?php echo $height2 ?></span>
                            <?php endif; ?> 
                        </td>
                    </tr>
                    <?php if(get_field('bio_fields_weight')) : ?> 
                        <tr>
                            <td class="hero-box-left">Weight</td>
                            <td class="hero-box-right">
                                <span class="variation-section variation-1"><?php echo $weight ?></span>
                                <?php if($variations > 1) : ?>
                                    <span class="variation-section variation-2"><?php echo $weight2 ?></span>
                                <?php endif; ?> 
                            </td>
                        </tr>
                    <?php endif; ?>
                <tr><td class="hero-box-left">Species</td><td class="hero-box-right"><?php echo $species ?></td></tr>
                <tr><td class="hero-box-left">Element</td><td class="hero-box-right"><?php echo getElement($element) ?></td></tr>
                <tr><td class="hero-box-left">Role</td><td class="hero-box-right"><?php echo getRole($role) ?></td></tr>
                <tr><td class="hero-box-left">Equipment</td><td class="hero-box-right">
                    <?php 
                    foreach ($compatible_equipment as $type) {
                        getEquipment($type);
                        echo '<br>';
                    }
                    ?></td></tr>
            </table>  
            <?php
                endwhile;
            ?>      
            </div>
            <?php getDiscordSidebar(); ?>
            <!--<div class="sidebar-small">
            <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
            <ins class="adsbygoogle"
                style="display:block"
                data-ad-client="ca-pub-5413624345530843"
                data-ad-slot="7224880210"
                data-ad-format="horizontal"
                data-full-width-responsive="true"></ins>
            <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
            </script>
            </div>-->
            <?php dynamic_sidebar( 'sidebar_widgets' ); ?>
            </div>
        </div>
    </div>
</section>
<script src="<?php echo get_template_directory_uri() ?>/assets/js/owl.carousel.min.js"></script>
<script src="<?php echo get_template_directory_uri() ?>/assets/js/jquery.mousewheel.min.js"></script>
<?php
get_footer();