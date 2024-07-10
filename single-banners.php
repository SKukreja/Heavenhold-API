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

$elementor_library = isset($_GET['elementor_library']) ? $_GET['elementor_library'] : '';
$is_single_post_date = isset ($opt['is_single_post_date']) ? $opt['is_single_post_date'] : '1';

$banner_name = get_the_title();
$banner_type = get_the_terms($post->ID, 'banner_categories');
?>

<link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/assets/css/owl.carousel.min.css">
<section class="blog_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="banner-pull" style="background-image:url('<?php echo get_the_post_thumbnail_url() ?>');"></div>
                <?php if($banner_type[0]->name == "Items") : ?>
                    <?php
                        $featured_items = get_field('featured_items');
                        $number_items = 0;
                        if (is_array($featured_items)) {
                            $number_items = count($featured_items);
                        }

                        $two_star_rate = floatval(get_field("two_star_rate"));
                        $three_star_rate = floatval(get_field("three_star_rate"));
                        $four_star_rate = floatval(get_field("four_star_rate"));
                        $five_star_rate = floatval(get_field("five_star_rate"));
                        $exclusive_rate = floatval(get_field("exclusive_rate"));

                        $normal_items = get_transient('normal_item_data');
                        $rare_items = get_transient('rare_item_data');
                        $unique_items = get_transient('unique_item_data');
                        $legend_items = get_transient('legend_item_data');
                        $epic_items = get_transient('epic_item_data');
                        $exclusive_items = get_transient('exclusive_item_data');

                        $two_star_items = array();
                        $three_star_items = array();
                        $four_star_items = array();
                        $five_star_items = array();

                        $two_star_items = array_merge( $normal_items, $rare_items );
                        $three_star_items = $unique_items;
                        $four_star_items = array_merge( $unique_items, $legend_items );
                        $five_star_items = array_merge( $unique_items, $legend_items, $epic_items );

                        $two_star_count = count($two_star_items);
                        $three_star_count = count($three_star_items);
                        $four_star_count = count($four_star_items);
                        $five_star_count = count($five_star_items);
                        $exclusive_count = count($exclusive_items) - $number_items;

                        $featured_item_rates = array();
                    ?>
                    <div class="section-box">
                        <h4>Pull Simulator<span class="fa fa-plus"></h4>
                        <div class="section-content">
                            <div id="multi-pull" class="multi-roll">
                                <div class="multi-item"><div id="multi-item-1" class="multi-item-image"><span class="multi-item-stars multi-stars-1"></span></div><span id="multi-item-name-1" class="multi-item-name"></span></div>
                                <div class="multi-item"><div id="multi-item-2" class="multi-item-image"><span class="multi-item-stars multi-stars-2"></span></div><span id="multi-item-name-2" class="multi-item-name"></span></div>
                                <div class="multi-item"><div id="multi-item-3" class="multi-item-image"><span class="multi-item-stars multi-stars-3"></span></div><span id="multi-item-name-3" class="multi-item-name"></span></div>
                                <div class="multi-item"><div id="multi-item-4" class="multi-item-image"><span class="multi-item-stars multi-stars-4"></span></div><span id="multi-item-name-4" class="multi-item-name"></span></div>
                                <div class="multi-item"><div id="multi-item-5" class="multi-item-image"><span class="multi-item-stars multi-stars-5"></span></div><span id="multi-item-name-5" class="multi-item-name"></span></div>
                                <div class="multi-item"><div id="multi-item-6" class="multi-item-image"><span class="multi-item-stars multi-stars-6"></span></div><span id="multi-item-name-6" class="multi-item-name"></span></div>
                                <div class="multi-item"><div id="multi-item-7" class="multi-item-image"><span class="multi-item-stars multi-stars-7"></span></div><span id="multi-item-name-7" class="multi-item-name"></span></div>
                                <div class="multi-item"><div id="multi-item-8" class="multi-item-image"><span class="multi-item-stars multi-stars-8"></span></div><span id="multi-item-name-8" class="multi-item-name"></span></div>
                                <div class="multi-item"><div id="multi-item-9" class="multi-item-image"><span class="multi-item-stars multi-stars-9"></span></div><span id="multi-item-name-9" class="multi-item-name"></span></div>
                                <div class="multi-item"><div id="multi-item-10" class="multi-item-image"><span class="multi-item-stars multi-stars-10"></span></div><span id="multi-item-name-10" class="multi-item-name"></span></div>
                            </div>
                            <div id="single-pull" class="single-roll">
                                <div class="multi-item"><div id="single-item" class="multi-item-image"><span class="multi-item-stars single-stars"></span></div><span id="single-item-name" class="multi-item-name"></span></div>
                            </div>
                            <div class="pull-buttons">
                                <div id="roll-1" class="pull-button">
                                    <span class="pull-button-text">Single Summon</span>
                                    <span class="pull-cost">
                                        <img class="gem-icon" src="https://heavenhold.com/wp-content/themes/heavenhold/assets/img/icons/gems.png">
                                        <span class="pull-cost-amount">300</span>
                                    </span>
                                </div>
                                <div id="roll-10" class="pull-button">
                                    <span class="pull-button-text">10x Summon</span>
                                    <span class="pull-cost">
                                        <img class="gem-icon" src="https://heavenhold.com/wp-content/themes/heavenhold/assets/img/icons/gems.png">
                                        <span class="pull-cost-amount">2700</span>
                                    </span>
                                </div>
                            </div>
                            <div class="pull-results">
                                <div class="results-metric">
                                    <span class="results-header">Gems Spent</span><span id="gems-spent">0</span>
                                </div>
                                <div class="results-metric">
                                    <span class="results-header">Mileage</span><span id="mileage-earned">0</span>
                                </div>
                                <div class="results-metric">
                                    <span class="results-header">Magic Metal</span><span id="magic-metal">0</span>
                                </div>
                                <div class="results-metric">
                                    <span class="results-header">Exclusives</span><span id="exclusives-pulled">0</span>
                                </div>
                            </div>
                            <div id="exclusive-pulls-Epic" class="multi-row results-row"><strong>Obtained Epic Exclusives</strong></div>
                            <div id="exclusive-pulls-Legend" class="multi-row results-row"><strong>Obtained Legend Exclusives</strong></div>
                        </div>
                    </div>
                    <?php if ( have_rows( 'featured_items' ) ) : ?>
                    <div class="section-box">
                        <h4>Featured Equipment<span class="fa fa-plus"></h4>
                        <div class="section-content">
                            <table class="hero-abilities-table">
                                <tr>
                                    <th class="ability-header">Equipment</th>
                                    <th class="ability-header">Type</th>
                                    <th class="ability-header">Exclusive Hero</th>
                                </tr>
                                <?php while ( have_rows( 'featured_items' ) ) : the_row(); ?>
                                    <?php 
                                    $item = get_sub_field('featured_item')[0]; 
                                    $item_type = get_the_terms($item, 'item_categories');
                                    $exclusive = get_field('exclusive', $item);
                                    $picture = get_the_post_thumbnail_url($item);
                                    ?>
                                    <tr>
                                        <td>
                                            <a href="<?php echo get_the_permalink($item) ?>">
                                                <img class="artifact-image" src="<?php echo $picture ?>"><span class="artifact-name"><?php echo get_the_title($item) ?></span>    
                                            </a>
                                        </td>
                                        <td class="center">
                                            <?php 
                                                if($item_type[0]->name=="Weapon") {
                                                    echo get_field('weapon_type', $item);
                                                }
                                                else {
                                                    echo $item_type[0]->name;
                                                }
                                            ?>
                                        </td>
                                        <td class="center">
                                            <?php 
                                                if($exclusive) {
                                                    $ex_hero = get_field('hero', $item)[0];
                                                    echo '<a href="'.get_the_permalink($ex_hero).'">'.$ex_hero->post_title.'</a>';
                                                }
                                                else {
                                                    echo 'N/A';
                                                }
                                            ?>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                            </table>
                        </div>
                    </div>
                    <?php endif; ?>   
                    <div class="section-box">
                        <h4>Rates<span class="fa fa-plus"></h4>
                        <div class="section-content">
                        <table class="hero-abilities-table">
                            <tr>
                                <th class="ability-header">Equipment</th>
                                <th class="ability-header">Chance</th>
                                <th class="ability-header">Possible Items</th>
                            </tr>
                            <tr><td><strong>2★</strong></td><td class="center"><?php echo number_format($two_star_rate,3,'.','').'%' ?></td><td class="center"><?php echo $two_star_count ?></td></tr>
                            <tr><td><strong>3★</strong></td><td class="center"><?php echo number_format($three_star_rate,3,'.','').'%' ?></td><td class="center"><?php echo $three_star_count ?></td></tr>
                            <tr><td><strong>4★</strong></td><td class="center"><?php echo number_format($four_star_rate,3,'.','').'%' ?></td><td class="center"><?php echo $four_star_count ?></td></tr>
                            <tr><td><strong>5★</strong></td><td class="center"><?php echo number_format($five_star_rate,3,'.','').'%' ?></td><td class="center"><?php echo $five_star_count ?></td></tr>
                            <tr><td><strong>Exclusive Weapon</strong></td><td class="center"><?php echo number_format($exclusive_rate,3,'.','').'%' ?></td><td class="center"><?php echo $exclusive_count ?></td></tr>
                            <?php if ( have_rows( 'featured_items' ) ) : ?>
                                <?php while ( have_rows( 'featured_items' ) ) : the_row(); ?>
                                    <?php 
                                        $item = get_sub_field('featured_item')[0]; 
                                        $rate = get_sub_field('rate');
                                        array_push($featured_item_rates, array (
                                            'item'  => $item,
                                            'acf_fields' => get_fields($item),
                                            'featured_image' => get_the_post_thumbnail_url($item),
                                            'rate'  => $rate
                                        ));
                                    ?>
                                    <tr><td><strong><a href="<?php echo get_the_permalink($item); ?>"><?php echo get_the_title($item); ?></a></strong></td><td class="center"><?php echo number_format($rate,3,'.','').'%' ?></td><td class="center">1</td></tr>
                                <?php endwhile; ?>
                            <?php endif; ?>   
                        </table>
                        </div>
                    </div>
                    <script>
                        jQuery(function($) {
                            var gems_spent = 0, magic_metal = 0, mileage = 0, exclusives = 0;
                            var pulled_exclusives = [];
                            
                            var two_star_rate = <?php echo $two_star_rate; ?>;
                            var three_star_rate = <?php echo $three_star_rate; ?>;
                            var four_star_rate = <?php echo $four_star_rate; ?>;
                            var five_star_rate = <?php echo $five_star_rate; ?>;
                            var exclusive_rate = <?php echo $exclusive_rate; ?>;

                            var two_star_items = <?php echo json_encode($two_star_items); ?>;
                            var three_star_items = <?php echo json_encode($three_star_items); ?>;
                            var four_star_items = <?php echo json_encode($four_star_items); ?>;
                            var five_star_items = <?php echo json_encode($five_star_items); ?>;
                            var exclusive_items = <?php echo json_encode($exclusive_items); ?>;

                            var featured_items = <?php echo json_encode($featured_item_rates); ?>;
                            
                            var rate_sum = two_star_rate + three_star_rate + four_star_rate + five_star_rate + exclusive_rate;

                            featured_items.forEach(function (item, index){
                                rate_sum = rate_sum + (parseFloat(item.rate));
                            });
                                
                            console.log(two_star_items);
                            console.log(featured_items);
                            
                            $("#roll-1").click(function() {
                                roll1();
                            });

                            $("#roll-10").click(function() {
                                roll10();
                            });

                            $("#multi-pull").hide();
                            $("#single-pull").hide();
                            $(".pull-results").hide();
                            $("#exclusive-pulls-Epic").hide();
                            $("#exclusive-pulls-Legend").hide();


                            function roll10() {
                                $("#single-pull").hide();
                                $("#multi-pull").show();
                                gems_spent = gems_spent + 2700;
                                $("#gems-spent").html('<img class="gem-icon" src="https://heavenhold.com/wp-content/themes/heavenhold/assets/img/icons/gems.png"> ' + gems_spent);
                                magic_metal = magic_metal + 100;
                                $("#magic-metal").html(magic_metal);
                                mileage = mileage + 10;
                                $("#mileage-earned").html('<img class="gem-icon" src="https://heavenhold.com/wp-content/themes/heavenhold/assets/img/icons/mileage.png"> ' + mileage);
                                $(".pull-results").show();
                                for(var i=1; i<=10; i++) 
                                {
                                    var roll = 0;
                                    if(i<10) {
                                        roll = Math.random() * rate_sum;
                                    }
                                    else if(i=10) {
                                        roll = Math.random() * rate_sum;
                                        if (roll < (two_star_rate + three_star_rate)) {
                                            roll = two_star_rate + three_star_rate + four_star_rate - 1;
                                        }
                                    }
                                    
                                    var rolled_item;
                                    
                                    if(roll < two_star_rate) {
                                        rolled_item = two_star_items[Math.floor(Math.random() * two_star_items.length)];
                                        $("#multi-item-" + i).css('background-image','url(' + rolled_item.featured_image + ')');
                                        $(".multi-stars-" + i).text("★★");
                                        $(".multi-stars-" + i).addClass("");
                                        $("#multi-item-name-" + i).text(rolled_item.post_title);
                                    }
                                    else if(roll < (two_star_rate + three_star_rate)) {
                                        rolled_item = three_star_items[Math.floor(Math.random() * three_star_items.length)];
                                        $("#multi-item-" + i).css('background-image','url(' + rolled_item.featured_image + ')');
                                        $(".multi-stars-" + i).text("★★★");
                                        $("#multi-item-name-" + i).text(rolled_item.post_title);
                                    }
                                    else if(roll < (two_star_rate + three_star_rate + four_star_rate)) {
                                        rolled_item = four_star_items[Math.floor(Math.random() * four_star_items.length)];
                                        $("#multi-item-" + i).css('background-image','url(' + rolled_item.featured_image + ')');
                                        $(".multi-stars-" + i).text("★★★★");
                                        $("#multi-item-name-" + i).text(rolled_item.post_title);
                                    }
                                    else if(roll < (two_star_rate + three_star_rate + four_star_rate + five_star_rate)) {
                                        rolled_item = five_star_items[Math.floor(Math.random() * five_star_items.length)];
                                        $("#multi-item-" + i).css('background-image','url(' + rolled_item.featured_image + ')');
                                        $(".multi-stars-" + i).text("★★★★★");
                                        $("#multi-item-name-" + i).text(rolled_item.post_title);
                                    }
                                    else if(roll < (two_star_rate + three_star_rate + four_star_rate + five_star_rate + exclusive_rate)) {
                                        var featured_indexes = [];
                                        exclusive_items.forEach(function (item, index) {
                                            featured_items.forEach(function (featured, x) {
                                                if(item.post_title == featured.item.post_title) {
                                                    featured_indexes.push(index);
                                                }
                                            });
                                        });
                                        var rolled_index = Math.floor(Math.random() * exclusive_items.length);
                                        while (featured_indexes.includes(rolled_index)) {
                                            rolled_index = Math.floor(Math.random() * exclusive_items.length);
                                        }
                                        rolled_item = exclusive_items[rolled_index];
                                        $("#multi-item-" + i).css('background-image','url(' + rolled_item.featured_image + ')');
                                        var stars = '';
                                        if (rolled_item.acf_fields.rarity == "Epic") {
                                            stars = '★★★★★';
                                        }
                                        else if (rolled_item.acf_fields.rarity == "Legend") {
                                            stars = '★★★★';
                                        }
                                        $(".multi-stars-" + i).text(stars);
                                        $("#multi-item-name-" + i).text(rolled_item.post_title);
                                        exclusive_index = pulled_exclusives.findIndex(item => item.name === rolled_item.post_title);
                                        if(exclusive_index > -1) {
                                            pulled_exclusives[exclusive_index].number = pulled_exclusives[exclusive_index].number + 1;
                                            $("#pulled-" + rolled_item.post_title.replace( /\s/g, '')).text("x" + pulled_exclusives[exclusive_index].number);
                                            $("#pulled-" + rolled_item.post_title.replace( /\s/g, '')).show();
                                        }
                                        else {
                                            pulled_exclusives.push({
                                                    name: rolled_item.post_title,
                                                    number: 1   
                                            });
                                            $("#exclusive-pulls-" + rolled_item.acf_fields.rarity).append("<div class='multi-item'><div class='multi-item-image' style='background-image:url(" + rolled_item.featured_image + ")'><span class='multi-item-stars multi-items-" + rolled_item.acf_fields.rarity + "-stars'>" + stars + "</span><span id='pulled-" + rolled_item.post_title.replace( /\s/g, '') + "' class='pulled-exclusive-count'></span></div><span class='multi-item-name'>" + rolled_item.post_title +"</span></div>");
                                            $("#pulled-" + rolled_item.post_title.replace( /\s/g, '')).hide();
                                        }
                                        exclusives = exclusives + 1;
                                        $("#exclusive-pulls-" + rolled_item.acf_fields.rarity).show();
                                        $("#exclusives-pulled").text(exclusives);
                                    }
                                    else {
                                        var featured_roll = Math.random() * (rate_sum - (two_star_rate + three_star_rate + four_star_rate + five_star_rate + exclusive_rate));
                                        var checked_rate = 0;
                                        featured_items.forEach(function (item, index){
                                            checked_rate = checked_rate + (parseFloat(item.rate));
                                            if (featured_roll < checked_rate) {
                                                rolled_item = item;
                                                $("#multi-item-" + i).css('background-image','url(' + rolled_item.featured_image + ')');
                                                var stars = '';
                                                if (rolled_item.acf_fields.rarity == "Epic") {
                                                    stars = '★★★★★';
                                                }
                                                else if (rolled_item.acf_fields.rarity == "Legend") {
                                                    stars = '★★★★';
                                                }
                                                $(".multi-stars-" + i).text(stars);
                                                $("#multi-item-name-" + i).text(rolled_item.item.post_title);
                                                exclusive_index = pulled_exclusives.findIndex(item => item.name === rolled_item.item.post_title);
                                                console.log("Rolled: " + rolled_item.item.post_title + " " + exclusive_index);
                                                console.log(pulled_exclusives);
                                                if(exclusive_index > -1) {
                                                    pulled_exclusives[exclusive_index].number = pulled_exclusives[exclusive_index].number + 1;
                                                    console.log("Updating value for #pulled-" + rolled_item.item.post_title.replace( /\s/g, ''));
                                                    $("#pulled-" + rolled_item.item.post_title.replace( /\s/g, '')).text("x" + pulled_exclusives[exclusive_index].number);
                                                    $("#pulled-" + rolled_item.item.post_title.replace( /\s/g, '')).show();
                                                }
                                                else {
                                                    pulled_exclusives.push({
                                                            name: rolled_item.item.post_title,
                                                            number: 1   
                                                    });
                                                    console.log("Creating #pulled-" + rolled_item.item.post_title.replace( /\s/g, ''));
                                                    $("#exclusive-pulls-" + rolled_item.acf_fields.rarity).append("<div class='multi-item'><div class='multi-item-image' style='background-image:url(" + rolled_item.featured_image + ")'><span class='multi-item-stars multi-items-" + rolled_item.acf_fields.rarity + "-stars'>" + stars + "</span><span id='pulled-" + rolled_item.item.post_title.replace( /\s/g, '') + "' class='pulled-exclusive-count'></span></div><span class='multi-item-name'>" + rolled_item.item.post_title +"</span></div>");
                                                    $("#pulled-" + rolled_item.item.post_title.replace( /\s/g, '')).hide();
                                                }
                                                exclusives = exclusives + 1;
                                                $("#exclusive-pulls").show();
                                                $("#exclusives-pulled").text(exclusives);
                                            }
                                        });
                                    }

                                    $(".multi-stars-" + i).removeClass("multi-items-Normal-stars");
                                    $(".multi-stars-" + i).removeClass("multi-items-Rare-stars");
                                    $(".multi-stars-" + i).removeClass("multi-items-Unique-stars");
                                    $(".multi-stars-" + i).removeClass("multi-items-Legend-stars");
                                    $(".multi-stars-" + i).removeClass("multi-items-Epic-stars");
                                    $(".multi-stars-" + i).addClass("multi-items-" + rolled_item.acf_fields.rarity + "-stars");
                                }
                            }
                            function roll1() {
                                $("#multi-pull").hide();
                                $("#single-pull").show();
                                
                                gems_spent = gems_spent + 300;
                                $("#gems-spent").html('<img class="gem-icon" src="https://heavenhold.com/wp-content/themes/heavenhold/assets/img/icons/gems.png"> ' + gems_spent);
                                magic_metal = magic_metal + 10;
                                $("#magic-metal").html('<img class="gem-icon" src="https://heavenhold.com/wp-content/themes/heavenhold/assets/img/icons/magic-metal.png"> ' + magic_metal);
                                mileage = mileage + 1;
                                $("#mileage-earned").html('<img class="gem-icon" src="https://heavenhold.com/wp-content/themes/heavenhold/assets/img/icons/mileage.png"> ' + mileage);
                                $(".pull-results").show();


                                roll = Math.random() * rate_sum;

                                var rolled_item;
                                
                                if(roll < two_star_rate) {
                                    rolled_item = two_star_items[Math.floor(Math.random() * two_star_items.length)];
                                    $("#single-item").css('background-image','url(' + rolled_item.featured_image + ')');
                                    $(".single-stars").text("★★");
                                    $(".single-stars").addClass("");
                                    $("#single-item-name").text(rolled_item.post_title);
                                }
                                else if(roll < (two_star_rate + three_star_rate)) {
                                    rolled_item = three_star_items[Math.floor(Math.random() * three_star_items.length)];
                                    $("#single-item").css('background-image','url(' + rolled_item.featured_image + ')');
                                    $(".single-stars").text("★★★");
                                    $("#single-item-name").text(rolled_item.post_title);
                                }
                                else if(roll < (two_star_rate + three_star_rate + four_star_rate)) {
                                    rolled_item = four_star_items[Math.floor(Math.random() * four_star_items.length)];
                                    $("#single-item").css('background-image','url(' + rolled_item.featured_image + ')');
                                    $(".single-stars").text("★★★★");
                                    $("#single-item-name").text(rolled_item.post_title);
                                }
                                else if(roll < (two_star_rate + three_star_rate + four_star_rate + five_star_rate)) {
                                    rolled_item = five_star_items[Math.floor(Math.random() * five_star_items.length)];
                                    $("#single-item").css('background-image','url(' + rolled_item.featured_image + ')');
                                    $(".single-stars").text("★★★★★");
                                    $("#single-item-name").text(rolled_item.post_title);
                                }
                                else if(roll < (two_star_rate + three_star_rate + four_star_rate + five_star_rate + exclusive_rate)) {
                                    var featured_indexes = [];
                                    exclusive_items.forEach(function (item, index) {
                                        featured_items.forEach(function (featured, x) {
                                            if(item.post_title == featured.item.post_title) {
                                                featured_indexes.push(index);
                                            }
                                        });
                                    });
                                    var rolled_index = Math.floor(Math.random() * exclusive_items.length);
                                    while (featured_indexes.includes(rolled_index)) {
                                        rolled_index = Math.floor(Math.random() * exclusive_items.length);
                                    }
                                    rolled_item = exclusive_items[rolled_index];

                                    $("#single-item").css('background-image','url(' + rolled_item.featured_image + ')');
                                    var stars = '';
                                    if (rolled_item.acf_fields.rarity == "Epic") {
                                        stars = '★★★★★';
                                    }
                                    else if (rolled_item.acf_fields.rarity == "Legend") {
                                        stars = '★★★★';
                                    }
                                    $(".single-stars").text(stars);
                                    $("#single-item-name").text(rolled_item.post_title);
                                    exclusive_index = pulled_exclusives.findIndex(item => item.name === rolled_item.post_title);
                                        if(exclusive_index > -1) {
                                            pulled_exclusives[exclusive_index].number = pulled_exclusives[exclusive_index].number + 1;
                                            $("#pulled-" + rolled_item.post_title.replace( /\s/g, '')).text("x" + pulled_exclusives[exclusive_index].number);
                                            $("#pulled-" + rolled_item.post_title.replace( /\s/g, '')).show();
                                        }
                                        else {
                                            pulled_exclusives.push({
                                                    name: rolled_item.post_title,
                                                    number: 1   
                                            });
                                            $("#exclusive-pulls-" + rolled_item.acf_fields.rarity).append("<div class='multi-item'><div class='multi-item-image' style='background-image:url(" + rolled_item.featured_image + ")'><span class='multi-item-stars multi-items-" + rolled_item.acf_fields.rarity + "-stars'>" + stars + "</span><span id='pulled-" + rolled_item.post_title.replace( /\s/g, '') + "' class='pulled-exclusive-count'></span></div><span class='multi-item-name'>" + rolled_item.post_title +"</span></div>");
                                            $("#pulled-" + rolled_item.post_title.replace( /\s/g, '')).hide();
                                        }
                                    exclusives = exclusives + 1;
                                    $("#exclusive-pulls-" + rolled_item.acf_fields.rarity).show();
                                    $("#exclusives-pulled").text(exclusives);
                                }
                                else {
                                    var featured_roll = Math.random() * (rate_sum - (two_star_rate + three_star_rate + four_star_rate + five_star_rate + exclusive_rate));
                                    var checked_rate = 0;
                                    featured_items.forEach(function (item, index){
                                        checked_rate = checked_rate + (parseFloat(item.rate));
                                        if (featured_roll < checked_rate) {
                                            rolled_item = item;
                                            $("#single-item").css('background-image','url(' + rolled_item.featured_image + ')');
                                            var stars = '';
                                            if (rolled_item.acf_fields.rarity == "Epic") {
                                                stars = '★★★★★';
                                            }
                                            else if (rolled_item.acf_fields.rarity == "Legend") {
                                                stars = '★★★★';
                                            }
                                            $(".single-stars").text(stars);
                                            $("#single-item-name").text(rolled_item.item.post_title);
                                            if(exclusive_index > -1) {
                                                pulled_exclusives[exclusive_index].number = pulled_exclusives[exclusive_index].number + 1;
                                                $("#pulled-" + rolled_item.item.post_title.replace( /\s/g, '')).text("x" + pulled_exclusives[exclusive_index].number);
                                                $("#pulled-" + rolled_item.item.post_title.replace( /\s/g, '')).show();
                                            }
                                            else {
                                                pulled_exclusives.push({
                                                        name: rolled_item.item.post_title,
                                                        number: 1   
                                                });
                                                $("#exclusive-pulls-" + rolled_item.acf_fields.rarity).append("<div class='multi-item'><div class='multi-item-image' style='background-image:url(" + rolled_item.featured_image + ")'><span class='multi-item-stars multi-items-" + rolled_item.acf_fields.rarity + "-stars'>" + stars + "</span><span id='pulled-" + rolled_item.item.post_title.replace( /\s/g, '') + "' class='pulled-exclusive-count'></span></div><span class='multi-item-name'>" + rolled_item.item.post_title +"</span></div>");
                                                $("#pulled-" + rolled_item.item.post_title.replace( /\s/g, '')).hide();
                                            }
                                            exclusives = exclusives + 1;
                                            $("#exclusive-pulls-" + rolled_item.acf_fields.rarity).show();
                                            $("#exclusives-pulled").text(exclusives);
                                        }
                                    });
                                }

                                $(".single-stars").removeClass("multi-items-Normal-stars");
                                $(".single-stars").removeClass("multi-items-Rare-stars");
                                $(".single-stars").removeClass("multi-items-Unique-stars");
                                $(".single-stars").removeClass("multi-items-Legend-stars");
                                $(".single-stars").removeClass("multi-items-Epic-stars");
                                $(".single-stars").addClass("multi-items-" + rolled_item.acf_fields.rarity + "-stars");
                            }
                        });
                    </script>
                <?php endif; ?>
                <?php if($banner_type[0]->name == "Heroes") : ?>
                    <?php
                        $featured_heroes = get_field('featured_heroes');
                        $number_heroes = 0;
                        if (is_array($featured_heroes)) {
                            $number_heroes = count($featured_heroes);
                        }

                        $one_star_rate = floatval(get_field("one_star_rate"));
                        $two_star_rate = floatval(get_field("two_star_rate"));
                        $three_star_rate = floatval(get_field("three_star_rate"));

                        $one_star_heroes = get_transient('normal_hero_data');
                        $two_star_heroes = get_transient('rare_hero_data');
                        $three_star_heroes = get_transient('unique_hero_data');

                        $one_star_count = count($one_star_heroes);
                        $two_star_count = count($two_star_heroes);
                        $three_star_count = count($three_star_heroes);

                        $featured_hero_rates = array();
                    ?>
                    <div class="section-box hero-summon">
                        <h4>Pull Simulator<span class="fa fa-plus"></h4>
                        <div class="section-content">
                            <div id="multi-pull" class="multi-roll">
                                <div class="multi-item"><div id="multi-hero-1" class="multi-item-image"><span class="multi-hero-stars multi-stars-1"></span></div><span id="multi-hero-name-1" class="multi-item-name"></span></div>
                                <div class="multi-item"><div id="multi-hero-2" class="multi-item-image"><span class="multi-hero-stars multi-stars-2"></span></div><span id="multi-hero-name-2" class="multi-item-name"></span></div>
                                <div class="multi-item"><div id="multi-hero-3" class="multi-item-image"><span class="multi-hero-stars multi-stars-3"></span></div><span id="multi-hero-name-3" class="multi-item-name"></span></div>
                                <div class="multi-item"><div id="multi-hero-4" class="multi-item-image"><span class="multi-hero-stars multi-stars-4"></span></div><span id="multi-hero-name-4" class="multi-item-name"></span></div>
                                <div class="multi-item"><div id="multi-hero-5" class="multi-item-image"><span class="multi-hero-stars multi-stars-5"></span></div><span id="multi-hero-name-5" class="multi-item-name"></span></div>
                                <div class="multi-item"><div id="multi-hero-6" class="multi-item-image"><span class="multi-hero-stars multi-stars-6"></span></div><span id="multi-hero-name-6" class="multi-item-name"></span></div>
                                <div class="multi-item"><div id="multi-hero-7" class="multi-item-image"><span class="multi-hero-stars multi-stars-7"></span></div><span id="multi-hero-name-7" class="multi-item-name"></span></div>
                                <div class="multi-item"><div id="multi-hero-8" class="multi-item-image"><span class="multi-hero-stars multi-stars-8"></span></div><span id="multi-hero-name-8" class="multi-item-name"></span></div>
                                <div class="multi-item"><div id="multi-hero-9" class="multi-item-image"><span class="multi-hero-stars multi-stars-9"></span></div><span id="multi-hero-name-9" class="multi-item-name"></span></div>
                                <div class="multi-item"><div id="multi-hero-10" class="multi-item-image"><span class="multi-hero-stars multi-stars-10"></span></div><span id="multi-hero-name-10" class="multi-item-name"></span></div>
                            </div>
                            <div id="single-pull" class="single-roll">
                                <div class="multi-item"><div id="single-hero" class="multi-item-image"><span class="multi-hero-stars single-stars"></span></div><span id="single-hero-name" class="multi-item-name"></span></div>
                            </div>
                            <div class="pull-buttons">
                                <div id="roll-1" class="pull-button">
                                    <span class="pull-button-text">Single Summon</span>
                                    <span class="pull-cost">
                                        <img class="gem-icon" src="https://heavenhold.com/wp-content/themes/heavenhold/assets/img/icons/gems.png">
                                        <span class="pull-cost-amount">300</span>
                                    </span>
                                </div>
                                <div id="roll-10" class="pull-button">
                                    <span class="pull-button-text">10x Summon</span>
                                    <span class="pull-cost">
                                        <img class="gem-icon" src="https://heavenhold.com/wp-content/themes/heavenhold/assets/img/icons/gems.png">
                                        <span class="pull-cost-amount">2700</span>
                                    </span>
                                </div>
                            </div>
                            <div class="pull-results">
                                <div class="results-metric">
                                    <span class="results-header">Gems Spent</span><span id="gems-spent">0</span>
                                </div>
                                <div class="results-metric">
                                    <span class="results-header">Mileage</span><span id="mileage-earned">0</span>
                                </div>
                                <div class="results-metric">
                                    <span class="results-header">Max Hero Crystals</span><span id="hero-crystals">0</span>
                                </div>
                                <div class="results-metric">
                                    <span class="results-header">Uniques</span><span id="uniques-pulled">0</span>
                                </div>
                            </div>
                            <div id="unique-pulls" class="multi-row results-row"><strong>Obtained Unique Heroes</strong></div>
                        </div>
                    </div>
                    <?php if ( have_rows( 'featured_heroes' ) ) : ?>
                        <div class="section-box">
                            <h4>Featured Heroes<span class="fa fa-plus"></h4>
                            <div class="section-content">
                                <table class="hero-abilities-table hero-list">
                                    <tr>
                                        <th class="ability-header">Hero</th>
                                        <th class="ability-header">Chain</th>
                                        <th class="ability-header">Stats</th>
                                    </tr>
                                    <?php while ( have_rows( 'featured_heroes' ) ) : the_row(); ?>
                                        <?php 
                                        $hero = get_sub_field('featured_hero')[0]; 
                                    
                                        $fullname = get_field('bio_fields_name', $hero);
                                        $rarity = get_field('bio_fields_rarity', $hero);
                                        $equipment = get_field('bio_fields_compatible_equipment', $hero);
                                        $role = get_field('bio_fields_role', $hero);
                                        $element = get_field('bio_fields_element', $hero);
                                        
                                        $atk = get_field('stat_fields_atk', $hero);
                                        $hp = get_field('stat_fields_hp', $hero);
                                        $def = get_field('stat_fields_def', $hero);
                                        $crit = get_field('stat_fields_crit', $hero);
                                        $heal = get_field('stat_fields_heal', $hero);
                                        $dr = get_field('stat_fields_damage_reduction', $hero);
                                        
                                        $cskill_trigger = get_field('ability_fields_chain_state_trigger', $hero);
                                        $cskill_result = get_field('ability_fields_chain_state_result', $hero);
                                        ?>
                                        <tr class="hero-row e-<?php echo $element ?> r-<?php echo $role ?> c1-<?php echo $cskill_trigger ?> c2-<?php echo $cskill_result ?> <?php echo str_replace(' ', '', $rarity); ?> <?php foreach($equipment as $type){echo $type.' ';} ?>" id="hero-<?php echo $fullname ?>">
                                            <td><a href="<?php echo get_the_permalink($hero) ?>"><div class="hero-image" style="background-image:url('<?php echo get_the_post_thumbnail_url($hero,'thumbnail') ?>');"><?php getRoleIcon($role) ?><?php getElementIcon($element) ?></div><?php echo get_the_title($hero) ?></a><br>
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
                                            </td>
                                            <td class="hidden"><?php echo $rarity ?></td>
                                            <td class="hidden"><?php echo $fullname ?></td>
                                            <td class="hidden"><?php getElement($element) ?></td>
                                            <td class="hidden"><?php getRole($role) ?></td>
                                            <td class="hidden"><?php echo $cskill_trigger ?></td>
                                            <td class="hidden"><?php echo $cskill_result ?></td>
                                            <td class="chain-column"><div class="chain1"><?php getChain($cskill_trigger) ?></div><br class="icon-line"><span class="bold"><i class='fas fa-caret-right'></i><i class='fas fa-caret-down'></i></span><br class="icon-line"><div class="chain2"><?php getChain($cskill_result) ?></div></td>
                                            <td class="stat-column">
                                                <div class="stat-rows">
                                                    <div class="hero-stat"><span class="hero-stat-number"><?php echo $atk ?></span><span class="hero-stat-label label-atk">ATK</span></div>
                                                    <div class="hero-stat"><span class="hero-stat-number"><?php echo $hp ?></span><span class="hero-stat-label label-hp">HP</span></div>
                                                    <div class="hero-stat"><span class="hero-stat-number"><?php echo $def ?></span><span class="hero-stat-label label-def">DEF</span></div>
                                                </div>
                                                <div class="stat-rows">
                                                    <div class="hero-stat"><span class="hero-stat-number"><?php echo $crit ?></span><span class="hero-stat-label label-crit">CRIT</span></div>
                                                    <div class="hero-stat"><span class="hero-stat-number"><?php echo $dr ?></span><span class="hero-stat-label label-dr">DR</span></div>
                                                    <div class="hero-stat"><span class="hero-stat-number"><?php echo $heal ?></span><span class="hero-stat-label label-heal">HEAL</span></div>
                                                </div>
                                            </td>
                                            <td class="hidden"><?php echo $atk ?></td>
                                            <td class="hidden"><?php echo $hp ?></td>
                                            <td class="hidden"><?php echo $def ?></td>
                                            <td class="hidden"><?php echo $crit ?></td>
                                            <td class="hidden"><?php echo $dr ?></td>
                                            <td class="hidden"><?php echo $heal ?></td>
                                        </tr>
                                    <?php endwhile; ?>  
                                </table>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="section-box">
                        <h4>Rates<span class="fa fa-plus"></h4>
                        <div class="section-content">
                        <table class="hero-abilities-table">
                            <tr>
                                <th class="ability-header">Heroes</th>
                                <th class="ability-header">Chance</th>
                                <th class="ability-header">Possible Heroes</th>
                            </tr>
                            <tr><td><strong>1★</strong></td><td class="center"><?php echo number_format($one_star_rate,3,'.','').'%' ?></td><td class="center"><?php echo $one_star_count ?></td></tr>
                            <tr><td><strong>2★</strong></td><td class="center"><?php echo number_format($two_star_rate,3,'.','').'%' ?></td><td class="center"><?php echo $two_star_count ?></td></tr>
                            <tr><td><strong>3★</strong></td><td class="center"><?php echo number_format($three_star_rate,3,'.','').'%' ?></td><td class="center"><?php echo $three_star_count ?></td></tr>
                            <?php if ( have_rows( 'featured_heroes' ) ) : ?>
                                <?php while ( have_rows( 'featured_heroes' ) ) : the_row(); ?>
                                    <?php 
                                        $hero = get_sub_field('featured_hero')[0]; 
                                        $rate = get_sub_field('rate');
                                        array_push($featured_hero_rates, array (
                                            'hero'  => $hero,
                                            'acf_fields' => get_fields($hero),
                                            'post_title' => get_the_title($hero),
                                            'featured_image' => get_the_post_thumbnail_url($hero),
                                            'rate'  => $rate
                                        ));
                                    ?>
                                    <tr><td><strong><a href="<?php echo get_the_permalink($hero); ?>"><?php echo get_the_title($hero); ?></a></strong></td><td class="center"><?php echo $rate.'%' ?></td><td class="center">1</td></tr>
                                <?php endwhile; ?>
                            <?php endif; ?>   
                        </table>
                        </div>
                    </div>
                    <script>
                        jQuery(function($) {
                            var gems_spent = 0, hero_crystals = 0, mileage = 0, uniques = 0;
                            var pulled_uniques = [];
                            
                            var one_star_rate = <?php echo $one_star_rate; ?>;
                            var two_star_rate = <?php echo $two_star_rate; ?>;
                            var three_star_rate = <?php echo $three_star_rate; ?>;

                            var one_star_heroes = <?php echo json_encode($one_star_heroes); ?>;
                            var two_star_heroes = <?php echo json_encode($two_star_heroes); ?>;
                            var three_star_heroes = <?php echo json_encode($three_star_heroes); ?>;

                            var featured_heroes = <?php echo json_encode($featured_hero_rates); ?>;
                            
                            var rate_sum = one_star_rate + two_star_rate + three_star_rate;

                            featured_heroes.forEach(function (hero, index){
                                rate_sum = rate_sum + (parseFloat(hero.rate));
                            });
                            
                            $("#roll-1").click(function() {
                                roll1();
                            });

                            $("#roll-10").click(function() {
                                roll10();
                            });

                            $("#multi-pull").hide();
                            $("#single-pull").hide();
                            $(".pull-results").hide();
                            $("#unique-pulls").hide();


                            console.log(one_star_heroes);

                            function roll10() {
                                $("#single-pull").hide();
                                $("#multi-pull").show();
                                gems_spent = gems_spent + 2700;
                                $("#gems-spent").html('<img class="gem-icon" src="https://heavenhold.com/wp-content/themes/heavenhold/assets/img/icons/gems.png"> ' + gems_spent);
                                mileage = mileage + 10;
                                $("#mileage-earned").html('<img class="gem-icon" src="https://heavenhold.com/wp-content/themes/heavenhold/assets/img/icons/mileage.png"> ' + mileage);
                                $(".pull-results").show();
                                for(var i=1; i<=10; i++) 
                                {
                                    var roll = 0;
                                    if(i<10) {
                                        roll = Math.random() * rate_sum;
                                    }
                                    else if(i=10) {
                                        roll = Math.random() * rate_sum;
                                        if (roll < (one_star_rate + two_star_rate)) {
                                            roll = one_star_rate + two_star_rate - 1;
                                        }
                                    }
                                    
                                    var rolled_hero;

                                    
                                    
                                    if(roll < one_star_rate) {
                                        rolled_hero = one_star_heroes[Math.floor(Math.random() * one_star_heroes.length)];
                                        $("#multi-hero-" + i).css('background-image','url(' + rolled_hero.acf_fields.evolution_fields.evolution_1 + ')');
                                        $(".multi-stars-" + i).text("★");
                                        $("#multi-hero-name-" + i).text(rolled_hero.post_title);
                                        hero_crystals = hero_crystals + 1;
                                        $("#hero-crystals").html('<img class="gem-icon" src="https://heavenhold.com/wp-content/themes/heavenhold/assets/img/icons/hero-crystals.png"> ' + hero_crystals);
                                    }
                                    else if(roll < (one_star_rate + two_star_rate)) {
                                        rolled_hero = two_star_heroes[Math.floor(Math.random() * two_star_heroes.length)];
                                        $("#multi-hero-" + i).css('background-image','url(' + rolled_hero.acf_fields.evolution_fields.evolution_2 + ')');
                                        $(".multi-stars-" + i).text("★★");
                                        $("#multi-hero-name-" + i).text(rolled_hero.post_title);
                                        hero_crystals = hero_crystals + 8;
                                        $("#hero-crystals").html('<img class="gem-icon" src="https://heavenhold.com/wp-content/themes/heavenhold/assets/img/icons/hero-crystals.png"> ' + hero_crystals);
                                    }
                                    else if(roll < (one_star_rate + two_star_rate + three_star_rate)) {
                                        var featured_indexes = [];
                                        three_star_heroes.forEach(function (hero, index) {
                                            featured_heroes.forEach(function (featured, x) {
                                                if(hero.post_title == featured.hero.post_title) {
                                                    featured_indexes.push(index);
                                                }
                                            });
                                        });
                                        var rolled_index = Math.floor(Math.random() * three_star_heroes.length);
                                        while (featured_indexes.includes(rolled_index)) {
                                            rolled_index = Math.floor(Math.random() * three_star_heroes.length);
                                        }
                                        rolled_hero = three_star_heroes[rolled_index];
                                        $("#multi-hero-" + i).css('background-image','url(' + rolled_hero.acf_fields.evolution_fields.evolution_3 + ')');
                                        var stars = '★★★';
                                        $(".multi-stars-" + i).text(stars);
                                        $("#multi-hero-name-" + i).text(rolled_hero.post_title.replace( /&#8217;/g, "'"));
                                        unique_index = pulled_uniques.findIndex(hero => hero.name === rolled_hero.post_title);
                                        if(unique_index > -1) {
                                            pulled_uniques[unique_index].number = pulled_uniques[unique_index].number + 1;
                                            $("#pulled-" + rolled_hero.post_title.replace( /\s/g, '').replace( /'/g, '').replace( /&#8217;/g, '').replace(/\./g, '')).text("x" + pulled_uniques[unique_index].number);
                                            $("#pulled-" + rolled_hero.post_title.replace( /\s/g, '').replace( /'/g, '').replace( /&#8217;/g, '').replace(/\./g, '')).show();
                                        }
                                        else {
                                            pulled_uniques.push({
                                                    name: rolled_hero.post_title,
                                                    number: 1   
                                            });
                                            $("#unique-pulls").append("<div class='multi-item'><div class='multi-item-image' style='background-image:url(" + rolled_hero.acf_fields.evolution_fields.evolution_3 + ")'><span class='multi-hero-stars multi-heroes-three-stars'>" + stars + "</span><span id='pulled-" + rolled_hero.post_title.replace( /\s/g, '').replace( /'/g, '').replace( /&#8217;/g, '').replace(/\./g, '') + "' class='pulled-exclusive-count'></span></div><span class='multi-item-name'>" + rolled_hero.post_title +"</span></div>");
                                            $("#pulled-" + rolled_hero.post_title.replace( /\s/g, '').replace( /'/g, '').replace( /&#8217;/g, '').replace(/\./g, '')).hide();
                                        }
                                        uniques = uniques + 1;
                                        $("#unique-pulls").show();
                                        $("#uniques-pulled").text(uniques);
                                        hero_crystals = hero_crystals + 50;
                                        $("#hero-crystals").html('<img class="gem-icon" src="https://heavenhold.com/wp-content/themes/heavenhold/assets/img/icons/hero-crystals.png"> ' + hero_crystals);
                                    }
                                    else {
                                        var featured_roll = Math.random() * (rate_sum - (one_star_rate + two_star_rate + three_star_rate));
                                        var checked_rate = 0;
                                        featured_heroes.forEach(function (hero, index){
                                            checked_rate = checked_rate + (parseFloat(hero.rate));
                                            if (featured_roll < checked_rate) {
                                                rolled_hero = hero;
                                                $("#multi-hero-" + i).css('background-image','url(' + rolled_hero.acf_fields.evolution_fields.evolution_3 + ')');
                                                var stars = '★★★';
                                                $(".multi-stars-" + i).text(stars);
                                                $("#multi-hero-name-" + i).text(rolled_hero.post_title.replace( /&#8217;/g, "'"));
                                                unique_index = pulled_uniques.findIndex(hero => hero.name === rolled_hero.post_title.replace( /&#8217;/g, "'"));
                                                if(unique_index > -1) {
                                                    pulled_uniques[unique_index].number = pulled_uniques[unique_index].number + 1;
                                                    $("#pulled-" + rolled_hero.post_title.replace( /\s/g, '').replace( /'/g, '').replace( /&#8217;/g, '').replace(/\./g, '')).text("x" + pulled_uniques[unique_index].number);
                                                    $("#pulled-" + rolled_hero.post_title.replace( /\s/g, '').replace( /'/g, '').replace( /&#8217;/g, '').replace(/\./g, '')).show();
                                                }
                                                else {
                                                    pulled_uniques.push({
                                                            name: rolled_hero.post_title.replace( /&#8217;/g, "'"),
                                                            number: 1   
                                                    });
                                                    $("#unique-pulls").append("<div class='multi-item'><div class='multi-item-image' style='background-image:url(" + rolled_hero.acf_fields.evolution_fields.evolution_3 + ")'><span class='multi-hero-stars multi-heroes-three-stars'>" + stars + "</span><span id='pulled-" + rolled_hero.post_title.replace( /\s/g, '').replace( /'/g, '').replace( /&#8217;/g, '').replace(/\./g, '') + "' class='pulled-exclusive-count'></span></div><span class='multi-item-name'>" + rolled_hero.post_title +"</span></div>");
                                                    $("#pulled-" + rolled_hero.post_title.replace( /\s/g, '').replace( /'/g, '').replace( /&#8217;/g, '').replace(/\./g, '')).hide();
                                                }
                                                console.log(pulled_uniques);
                                                uniques = uniques + 1;
                                                $("#unique-pulls").show();
                                                $("#uniques-pulled").text(uniques);
                                                hero_crystals = hero_crystals + 50;
                                                $("#hero-crystals").html('<img class="gem-icon" src="https://heavenhold.com/wp-content/themes/heavenhold/assets/img/icons/hero-crystals.png"> ' + hero_crystals);
                                            }
                                        });
                                    }

                                    $(".multi-stars-" + i).removeClass("multi-heroes-one-stars");
                                    $(".multi-stars-" + i).removeClass("multi-heroes-two-stars");
                                    $(".multi-stars-" + i).removeClass("multi-heroes-three-stars");
                                    if(rolled_hero.acf_fields.bio_fields.rarity == "1 Star") {
                                        $(".multi-stars-" + i).addClass("multi-heroes-one-stars");
                                    }
                                    else if (rolled_hero.acf_fields.bio_fields.rarity == "2 Star") {
                                        $(".multi-stars-" + i).addClass("multi-heroes-two-stars");
                                    }
                                    else if (rolled_hero.acf_fields.bio_fields.rarity == "3 Star") {
                                        $(".multi-stars-" + i).addClass("multi-heroes-three-stars");
                                    }
                                }
                            }
                            function roll1() {
                                $("#multi-pull").hide();
                                $("#single-pull").show();
                                
                                gems_spent = gems_spent + 300;
                                $("#gems-spent").html('<img class="gem-icon" src="https://heavenhold.com/wp-content/themes/heavenhold/assets/img/icons/gems.png"> ' + gems_spent);
                                mileage = mileage + 1;
                                $("#mileage-earned").html('<img class="gem-icon" src="https://heavenhold.com/wp-content/themes/heavenhold/assets/img/icons/mileage.png"> ' + mileage);
                                $(".pull-results").show();
                                var roll = 0;
                                roll = Math.random() * rate_sum;
                                
                                var rolled_hero;

                                
                                
                                if(roll < one_star_rate) {
                                    rolled_hero = one_star_heroes[Math.floor(Math.random() * one_star_heroes.length)];
                                    $("#single-hero").css('background-image','url(' + rolled_hero.acf_fields.evolution_fields.evolution_1 + ')');
                                    $(".single-stars").text("★");
                                    $("#single-hero-name").text(rolled_hero.post_title);
                                    hero_crystals = hero_crystals + 1;
                                    $("#hero-crystals").html('<img class="gem-icon" src="https://heavenhold.com/wp-content/themes/heavenhold/assets/img/icons/hero-crystals.png"> ' + hero_crystals);
                                }
                                else if(roll < (one_star_rate + two_star_rate)) {
                                    rolled_hero = two_star_heroes[Math.floor(Math.random() * two_star_heroes.length)];
                                    $("#single-hero").css('background-image','url(' + rolled_hero.acf_fields.evolution_fields.evolution_2 + ')');
                                    $(".single-stars").text("★★");
                                    $("#single-hero-name").text(rolled_hero.post_title);
                                    hero_crystals = hero_crystals + 8;
                                    $("#hero-crystals").html('<img class="gem-icon" src="https://heavenhold.com/wp-content/themes/heavenhold/assets/img/icons/hero-crystals.png"> ' + hero_crystals);
                                }
                                else if(roll < (one_star_rate + two_star_rate + three_star_rate)) {
                                    var featured_indexes = [];
                                    three_star_heroes.forEach(function (hero, index) {
                                        featured_heroes.forEach(function (featured, x) {
                                            if(hero.post_title == featured.hero.post_title) {
                                                featured_indexes.push(index);
                                            }
                                        });
                                    });
                                    var rolled_index = Math.floor(Math.random() * three_star_heroes.length);
                                    while (featured_indexes.includes(rolled_index)) {
                                        rolled_index = Math.floor(Math.random() * three_star_heroes.length);
                                    }
                                    rolled_hero = three_star_heroes[rolled_index];
                                    $("#single-hero").css('background-image','url(' + rolled_hero.acf_fields.evolution_fields.evolution_3 + ')');
                                    var stars = '★★★';
                                    $(".single-stars").text(stars);
                                    $("#single-hero-name").text(rolled_hero.post_title.replace( /&#8217;/g, "'"));
                                    unique_index = pulled_uniques.findIndex(hero => hero.name === rolled_hero.post_title);
                                    if(unique_index > -1) {
                                        pulled_uniques[unique_index].number = pulled_uniques[unique_index].number + 1;
                                        $("#pulled-" + rolled_hero.post_title.replace( /\s/g, '').replace( /'/g, '').replace( /&#8217;/g, '').replace(/\./g, '')).text("x" + pulled_uniques[unique_index].number);
                                        $("#pulled-" + rolled_hero.post_title.replace( /\s/g, '').replace( /'/g, '').replace( /&#8217;/g, '').replace(/\./g, '')).show();
                                    }
                                    else {
                                        pulled_uniques.push({
                                                name: rolled_hero.post_title,
                                                number: 1   
                                        });
                                        $("#unique-pulls").append("<div class='multi-item'><div class='multi-item-image' style='background-image:url(" + rolled_hero.acf_fields.evolution_fields.evolution_3 + ")'><span class='multi-hero-stars multi-heroes-three-stars'>" + stars + "</span><span id='pulled-" + rolled_hero.post_title.replace( /\s/g, '').replace( /'/g, '').replace( /&#8217;/g, '').replace(/\./g, '') + "' class='pulled-exclusive-count'></span></div><span class='multi-item-name'>" + rolled_hero.post_title +"</span></div>");
                                        $("#pulled-" + rolled_hero.post_title.replace( /\s/g, '').replace( /'/g, '').replace( /&#8217;/g, '').replace(/\./g, '')).hide();
                                    }
                                    uniques = uniques + 1;
                                    $("#unique-pulls").show();
                                    $("#uniques-pulled").text(uniques);
                                    hero_crystals = hero_crystals + 50;
                                    $("#hero-crystals").html('<img class="gem-icon" src="https://heavenhold.com/wp-content/themes/heavenhold/assets/img/icons/hero-crystals.png"> ' + hero_crystals);
                                }
                                else {
                                    var featured_roll = Math.random() * (rate_sum - (one_star_rate + two_star_rate + three_star_rate));
                                    var checked_rate = 0;
                                    featured_heroes.forEach(function (hero, index){
                                        checked_rate = checked_rate + (parseFloat(hero.rate));
                                        if (featured_roll < checked_rate) {
                                            rolled_hero = hero;
                                            $("#single-hero").css('background-image','url(' + rolled_hero.acf_fields.evolution_fields.evolution_3 + ')');
                                            var stars = '★★★';
                                            $(".single-stars").text(stars);
                                            $("#single-hero-name").text(rolled_hero.post_title.replace( /&#8217;/g, "'"));
                                            unique_index = pulled_uniques.findIndex(hero => hero.name === rolled_hero.post_title.replace( /&#8217;/g, "'"));
                                            if(unique_index > -1) {
                                                pulled_uniques[unique_index].number = pulled_uniques[unique_index].number + 1;
                                                $("#pulled-" + rolled_hero.post_title.replace( /\s/g, '').replace( /'/g, '').replace( /&#8217;/g, '').replace(/\./g, '')).text("x" + pulled_uniques[unique_index].number);
                                                $("#pulled-" + rolled_hero.post_title.replace( /\s/g, '').replace( /'/g, '').replace( /&#8217;/g, '').replace(/\./g, '')).show();
                                            }
                                            else {
                                                pulled_uniques.push({
                                                        name: rolled_hero.post_title.replace( /&#8217;/g, "'"),
                                                        number: 1   
                                                });
                                                $("#unique-pulls").append("<div class='multi-item'><div class='multi-item-image' style='background-image:url(" + rolled_hero.acf_fields.evolution_fields.evolution_3 + ")'><span class='multi-hero-stars multi-heroes-three-stars'>" + stars + "</span><span id='pulled-" + rolled_hero.post_title.replace( /\s/g, '').replace( /'/g, '').replace( /&#8217;/g, '').replace(/\./g, '') + "' class='pulled-exclusive-count'></span></div><span class='multi-item-name'>" + rolled_hero.post_title +"</span></div>");
                                                $("#pulled-" + rolled_hero.post_title.replace( /\s/g, '').replace( /'/g, '').replace( /&#8217;/g, '').replace(/\./g, '')).hide();
                                            }
                                            console.log(pulled_uniques);
                                            uniques = uniques + 1;
                                            $("#unique-pulls").show();
                                            $("#uniques-pulled").text(uniques);
                                            hero_crystals = hero_crystals + 50;
                                            $("#hero-crystals").html('<img class="gem-icon" src="https://heavenhold.com/wp-content/themes/heavenhold/assets/img/icons/hero-crystals.png"> ' + hero_crystals);
                                        }
                                    });
                                }

                                $(".single-stars").removeClass("multi-heroes-one-stars");
                                $(".single-stars").removeClass("multi-heroes-two-stars");
                                $(".single-stars").removeClass("multi-heroes-three-stars");
                                if(rolled_hero.acf_fields.bio_fields.rarity == "1 Star") {
                                    $(".single-stars").addClass("multi-heroes-one-stars");
                                }
                                else if (rolled_hero.acf_fields.bio_fields.rarity == "2 Star") {
                                    $(".single-stars").addClass("multi-heroes-two-stars");
                                }
                                else if (rolled_hero.acf_fields.bio_fields.rarity == "3 Star") {
                                    $(".single-stars").addClass("multi-heroes-three-stars");
                                }
                            }
                        });
                    </script>
                <?php endif; ?>
                <script>
                jQuery(function($) {
                    var headers = ["H4","H5","H6"];
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
            </div>
            <div class="col-lg-4">
            <?php dynamic_sidebar( 'forum_archive_sidebar' ); ?> 
            <?php getDiscordSidebar(); ?>
            <?php dynamic_sidebar( 'sidebar_widgets' ); ?>
            </div>
        </div>
    </div>
</section>
<script src="<?php echo get_template_directory_uri() ?>/assets/js/owl.carousel.min.js"></script>
<script src="<?php echo get_template_directory_uri() ?>/assets/js/jquery.mousewheel.min.js"></script>
<?php
get_footer();