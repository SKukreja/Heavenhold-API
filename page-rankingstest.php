<?php
/**
 * Template Name: Tier List v2
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

<script src="//cdn.datatables.net/1.11.0/js/jquery.dataTables.min.js"></script>

<section class="blog_area">
    <div class="container tier-list">
        <div class="row">
            <div class="col-lg-8"> 
                <table class="filter-table">
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
                <table class="filter-table">
                    <tr><th colspan="4">Filter Role</th></tr>
                    <tr>
                        <td onclick="filter(this, 'Tanker', 'r')"><?php getRole("Tanker") ?></td>
                        <td onclick="filter(this, 'Warrior', 'r')"><?php getRole("Warrior") ?></td>
                        <td onclick="filter(this, 'Ranged', 'r')"><?php getRole("Ranged") ?></td>
                        <td onclick="filter(this, 'Support', 'r')"><?php getRole("Support") ?></td>
                    </tr>
                </table>
                <table class="filter-table">
                    <tr><th colspan="3">Filter Rarity</th></tr>
                    <tr class='rarityList'>
                        <td onclick="filter(this, '3Star', 's')"><i class="fas fa-star star3"></i><i class="fas fa-star star3"></i><i class="fas fa-star star3"></i></td>
                        <td onclick="filter(this, '2Star', 's')"><i class="fas fa-star star2"></i><i class="fas fa-star star2"></i></i></td>

                    </tr>
                </table>
                 <?php 
                    $args = array(
                        'post_type'     => 'heroes',
                        'numberposts'   => -1,
                        'meta_query'    => array( 
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
                    echo '<table id="tier-list" class="filter-table tier-list-table">';
                    echo '<thead><tr><th>Hero</th><th class="rating-column">Arena</th><th class="rating-column">Colosseum</th><th class="rating-column">Raid</th><th class="rating-column">Story</th><th class="rating-column">KamaZONE</th><th class="rating-column">Orbital Lift</th><th class="rating-column">Towers</th><th class="rating-column">Overall</th></tr></thead>';
                    echo '<tbody>';
                    // Loop
                    if( $query->have_posts() ) :
                        while( $query->have_posts() ) : $query->the_post(); 
                        $fullname = get_field('bio_fields_name');
                        $rarity = get_field('bio_fields_rarity');
                        $equipment = get_field('bio_fields_compatible_equipment');
                        $role = get_field('bio_fields_role');
                        $element = get_field('bio_fields_element');

                        ?>
                            <tr class="hero-rating-row e-<?php echo $element ?> r-<?php echo $role ?> <?php echo str_replace(' ', '', $rarity); ?> <?php foreach($equipment as $type){echo $type.' ';} ?>" id="hero-<?php echo $fullname ?>">
                                <td class="hero-column">
                                    <span class="hero-info">
                                        <a class="hero-link" href="<?php the_permalink() ?>"><div class="hero-image" style="background-image:url('<?php the_post_thumbnail_url('thumbnail') ?>');"><?php getRoleIcon($role) ?><?php getElementIcon($element) ?></div><span class="hero-name"><?php echo the_title() ?></span></a>
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
                                        <span class="mobile-rating-row"><span class="rating-type">Arena</span><span class="mobile-rating"><?php echo get_field('evaluation_fields_arena_rating'); ?></span></span>
                                        <span class="mobile-rating-row"><span class="rating-type">Colosseum</span><span class="mobile-rating"><?php echo get_field('evaluation_fields_colo_rating'); ?></span></span>
                                        <span class="mobile-rating-row"><span class="rating-type">Raid</span><span class="mobile-rating"><?php echo get_field('evaluation_fields_raid_rating'); ?></span></span>
                                        <span class="mobile-rating-row"><span class="rating-type">Story</span><span class="mobile-rating"><?php echo get_field('evaluation_fields_story_rating'); ?></span></span>
                                        <span class="mobile-rating-row"><span class="rating-type">KamaZONE</span><span class="mobile-rating"><?php echo get_field('evaluation_fields_kamazone_rating'); ?></span></span>
                                        <span class="mobile-rating-row"><span class="rating-type">Orbital Lift</span><span class="mobile-rating"><?php echo get_field('evaluation_fields_orbital_rating'); ?></span></span>
                                        <span class="mobile-rating-row"><span class="rating-type">Tower</span><span class="mobile-rating"><?php echo get_field('evaluation_fields_tower_rating'); ?></span></span>
                                        <span class="mobile-rating-row"><span class="rating-type">Overall</span><span class="mobile-rating"><strong><?php echo get_field('evaluation_fields_rating'); ?></strong></span></span>
                                    </div>
                                </td>
                                <td class="rating-column"><?php echo get_field('evaluation_fields_arena_rating'); ?></td>
                                <td class="rating-column"><?php echo get_field('evaluation_fields_colo_rating'); ?></td>
                                <td class="rating-column"><?php echo get_field('evaluation_fields_raid_rating'); ?></td>
                                <td class="rating-column"><?php echo get_field('evaluation_fields_story_rating'); ?></td>
                                <td class="rating-column"><?php echo get_field('evaluation_fields_kamazone_rating'); ?></td>
                                <td class="rating-column"><?php echo get_field('evaluation_fields_orbital_rating'); ?></td>
                                <td class="rating-column"><?php echo get_field('evaluation_fields_tower_rating'); ?></td>
                                <td class="rating-column"><strong><?php echo get_field('evaluation_fields_rating'); ?></strong></td>
                            </tr>
                        <?php    
                        endwhile; 
                    endif;
                    echo '</tbody>';
                    echo '</table>';
                ?>
            </div>
            <div class="col-lg-4">
                <?php getDiscordSidebar(); ?>
                <?php dynamic_sidebar( 'forum_archive_sidebar' ); ?>
                <?php dynamic_sidebar( 'sidebar_widgets' ); ?>
            </div>
        </div>
    </div>
</section>

<script>
    var heroTable, selectedElements=[], selectedRoles=[], selectedEquipment=[], selectedStars=[], orderNumber=1, orderString;   

    jQuery(function($){
        $('#tier-list').DataTable( {
            "paging":   false,
            "info":     false,
            "order": [[ 8, "desc" ]]
        } );
    });

    function filter(element, keyword, type) {
        if(element.classList.contains("clicked")) {
            element.classList.remove("clicked");
            if (type=='eq'){ 
                selectedEquipment.splice(selectedEquipment.indexOf(keyword), 1);
            }
            else if(type=='s') {
                selectedStars.splice(selectedStars.indexOf(keyword), 1);
            }
            else if (type=='e') {
                selectedElements.splice(selectedElements.indexOf('e-'+keyword), 1);
            }
            else {
                selectedRoles.splice(selectedRoles.indexOf('r-'+keyword), 1);
            }
            
            if((selectedElements.length + selectedRoles.length + selectedEquipment.length + selectedStars.length) > 0) 
            {
                var heroList = jQuery('.hero-rating-row');
                var elementList = '';
                var roleList = '';
                var starList = '';
                var equipmentList = '';
                if(selectedElements.length > 0) {
                    elementList = '.' + selectedElements.join(', .');
                    heroList = heroList.filter(elementList);
                }
                if(selectedRoles.length > 0) {
                    roleList = '.' + selectedRoles.join(', .');
                    heroList = heroList.filter(roleList);
                }
                if(selectedEquipment.length > 0)
                {
                    equipmentList = '.' + selectedEquipment.join(', .');
                    heroList = heroList.filter(equipmentList);
                }
                if(selectedStars.length > 0) {
                    starList = '.' + selectedStars.join(', .');
                    heroList = heroList.filter(starList);
                }

                jQuery('.hero-rating-row').addClass('hidden');
                heroList.removeClass("hidden"); 
            }
            else {
                jQuery('.hero-rating-row').removeClass("hidden");
            }
        }
        else {
            element.classList.add("clicked");
            if (type=='eq'){ 
                selectedEquipment.push(keyword);
            }
            else if (type=='s') {
                selectedStars.push(keyword);
            }
            else if (type=='e') {
                selectedElements.push('e-'+keyword);
            }
            else {
                selectedRoles.push('r-'+keyword);
            }

            var heroList = jQuery('.hero-rating-row');
            var elementList = '';
            var starList = '';
            var roleList = '';
            var equipmentList = '';
            if(selectedElements.length > 0) {
                elementList = '.' + selectedElements.join(', .');
                heroList = heroList.filter(elementList);
            }
            if(selectedStars.length > 0) {
                starList = '.' + selectedStars.join(', .');
                heroList = heroList.filter(starList);
            }
            if(selectedRoles.length > 0) {
                roleList = '.' + selectedRoles.join(', .');
                heroList = heroList.filter(roleList);
            }
            if(selectedEquipment.length > 0)
            {
                equipmentList = '.' + selectedEquipment.join(', .');
                heroList = heroList.filter(equipmentList);
            }

            jQuery('.hero-rating-row').addClass('hidden');
            heroList.removeClass("hidden"); 
        }
    } 
</script>

<?php
get_footer();
?>
