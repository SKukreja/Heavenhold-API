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
                    <tr><th colspan="2">Filter Rarity</th></tr>
                    <tr class='rarityList'>
                        <td onclick="filter(this, '3Star', 's')"><i class="fas fa-star star3"></i><i class="fas fa-star star3"></i><i class="fas fa-star star3"></i></td>
                        <td onclick="filter(this, '2Star', 's')"><i class="fas fa-star star2"></i><i class="fas fa-star star2"></i></i></td>
                    </tr>
                </table>
                <table class="filter-table">
                    <tr><th colspan="3">Filter Region</th></tr>
                    <tr>
                        <td onclick="filter(this, 'NAReleased', 'region')">Global</td> 
                        <td onclick="filter(this, 'KRReleased', 'region')">Korea</td>
                        <td onclick="filter(this, 'JPReleased', 'region')">Japan</td>
                    </tr>
                </table> 
                <table class="filter-table category-filters">
                    <tr><th colspan="4">Toggle Categories</th></tr>
                    <tr>
                        <td class="toggle-vis clicked" data-column="1">Arena</td>
                        <td class="toggle-vis clicked" data-column="2">Colosseum</td>
                        <td class="toggle-vis clicked" data-column="3">Raid</td> 
                        <td class="toggle-vis clicked" data-column="4">Co-op</td>
                    </tr>
                    <tr>
                        <td class="toggle-vis" data-column="5">Story</td>
                        <td class="toggle-vis" data-column="6">Kama-ZONE</td>
                        <td class="toggle-vis" data-column="7">Orbital Lift</td>
                        <td class="toggle-vis" data-column="8">Towers</td>
                    </tr>
                </table>

                <table class="filter-table mobile-sort" id="sortControls">
                    <tr><th colspan="3">Sort By</th></tr>
                    <tr>
                        <td id="sortArena">Arena</td>
                        <td id="sortColo">Colosseum</td>
                        <td id="sortRaid">Raid</td>
                    </tr>
                    <tr>
                        <td id="sortCoop">Co-op</td>
                        <td id="sortStory">Story</td>
                        <td id="sortKamazone">Kama-ZONE</td>
                    </tr>
                    <tr>
                        <td id="sortOrbital">Orbital Lift</td>
                        <td id="sortTowers">Towers</td>
                        <td id="sortOverall">Overall</td>
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
                    echo '<thead><tr><th>Hero</th><th class="rating-column">Arena</th><th class="rating-column">Colosseum</th><th class="rating-column">Raid</th><th class="rating-column">Co-op</th><th class="rating-column">Story</th><th class="rating-column">KamaZONE</th><th class="rating-column">Orbital Lift</th><th class="rating-column">Towers</th><th class="rating-column">Overall</th></tr></thead>';
                    echo '<tbody>';
                    // Loop
                    if( $query->have_posts() ) :
                        while( $query->have_posts() ) : $query->the_post(); 
                        $fullname = get_field('bio_fields_name');
                        $rarity = get_field('bio_fields_rarity');
                        $equipment = get_field('bio_fields_compatible_equipment');
                        $role = get_field('bio_fields_role');
                        $element = get_field('bio_fields_element');
                        $na_released = get_field('bio_fields_na_release_date');
                        $kr_released = get_field('bio_fields_kr_release_date');
                        $jp_released = get_field('bio_fields_jp_release_date');
                        
                        if($na_released) {
                            $na_released = "NAReleased";
                        }

                        if($kr_released) {
                            $kr_released = "KRReleased";
                        }

                        if($jp_released) {
                            $jp_released = "JPReleased";
                        }

                        ?>
                            <tr class="hero-rating-row <?php echo $na_released ?> <?php echo $kr_released ?> <?php echo $jp_released ?> e-<?php echo $element ?> r-<?php echo $role ?> <?php echo str_replace(' ', '', $rarity); ?> <?php foreach($equipment as $type){echo $type.' ';} ?>" id="hero-<?php echo $fullname ?>">
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
                                        <span class="mobile-rating-row"><span class="rating-type">Co-op</span><span class="mobile-rating"><?php echo get_field('evaluation_fields_coop_rating'); ?></span></span>
                                        <span class="mobile-rating-row"><span class="rating-type">Story</span><span class="mobile-rating"><?php echo get_field('evaluation_fields_story_rating'); ?></span></span>
                                        <span class="mobile-rating-row"><span class="rating-type">KamaZONE</span><span class="mobile-rating"><?php echo get_field('evaluation_fields_kamazone_rating'); ?></span></span>
                                        <span class="mobile-rating-row"><span class="rating-type">Orbital Lift</span><span class="mobile-rating"><?php echo get_field('evaluation_fields_orbital_rating'); ?></span></span>
                                        <span class="mobile-rating-row"><span class="rating-type">Tower</span><span class="mobile-rating"><?php echo get_field('evaluation_fields_tower_rating'); ?></span></span>
                                        <span class="mobile-rating-row"><strong><span class="rating-type">Overall</span></strong><span class="mobile-rating"><strong><?php echo get_field('evaluation_fields_rating'); ?></strong></span></span>
                                    </div>
                                </td>   
                                <td class="rating-column"><?php echo get_field('evaluation_fields_arena_rating'); ?></td>
                                <td class="rating-column"><?php echo get_field('evaluation_fields_colo_rating'); ?></td>
                                <td class="rating-column"><?php echo get_field('evaluation_fields_raid_rating'); ?></td>
                                <td class="rating-column"><?php echo get_field('evaluation_fields_coop_rating'); ?></td>
                                <td class="rating-column"><?php echo get_field('evaluation_fields_story_rating'); ?></td>
                                <td class="rating-column"><?php echo get_field('evaluation_fields_kamazone_rating'); ?></td>
                                <td class="rating-column"><?php echo get_field('evaluation_fields_orbital_rating'); ?></td>
                                <td class="rating-column"><?php echo get_field('evaluation_fields_tower_rating'); ?></td>
                                <td class="rating-column overall-rating"><?php echo get_field('evaluation_fields_rating'); ?></td>
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
    var heroTable, selectedElements=[], selectedRoles=[], selectedEquipment=[], selectedStars=[], selectedRegions=[], orderNumber=1, orderString;   

    jQuery(function($){
        var currentSort="sortOverall", orderNumber=1, orderString;

        var table = $('#tier-list').DataTable( {
            "paging":   false,
            "info":     false,
            "order": [[ 9, "desc" ]],
            "columnDefs": [
                { "type": "num-fmt", "targets": 1 },
                { "type": "num-fmt", "targets": 2 },
                { "type": "num-fmt", "targets": 3 },
                { "type": "num-fmt", "targets": 4 },
                { "type": "num-fmt", "targets": 5 },
                { "type": "num-fmt", "targets": 6 },
                { "type": "num-fmt", "targets": 7 },
                { "type": "num-fmt", "targets": 8 },
                { "type": "num-fmt", "targets": 9 }
            ]
        } );
        table.columns([5,6,7,8]).visible(false, false);
        $(".rating-column").each(function(i){
            $(this).css("color",heatmap_color_for(parseInt(parseFloat($(this).text()) * 10)));
        });
        $('td.toggle-vis').on( 'click', function (e) {
            e.preventDefault();
    
            // Get the column API object
            var column = table.column( $(this).attr('data-column') );
            
            $(this).toggleClass("clicked");

            // Toggle the visibility
            column.visible( ! column.visible() );

            $(".rating-column").each(function(i){
                $(this).css("color",heatmap_color_for(parseInt(parseFloat($(this).text()) * 10)));
            });
        } );

        $("#sortArena").click(function(){

            $("#"+currentSort).find("i").remove();

            if(this.id == currentSort) {
                orderNumber *= -1;
                
            }
            else {
                orderNumber = 1;
            }

            switch(orderNumber)
            {
                case 1:
                {
                    orderString="<i class='fas fa-caret-down'></i>";
                    table.order([[ 1, "desc" ]]).draw();
                    break;
                }
                case -1:
                {
                    orderString="<i class='fas fa-caret-up'></i>";
                    table.order([[ 1, "asc" ]]).draw();
                    break;
                }
            }

            $(this).append(orderString);
            currentSort = this.id;
        });

        $("#sortColo").click(function(){

            $("#"+currentSort).find("i").remove();

            if(this.id == currentSort) {
                orderNumber *= -1;
                
            }
            else {
                orderNumber = 1;
            }

            switch(orderNumber)
            {
                case 1:
                {
                    orderString="<i class='fas fa-caret-down'></i>";
                    table.order([[ 2, "desc" ]]).draw();
                    break;
                }
                case -1:
                {
                    orderString="<i class='fas fa-caret-up'></i>";
                    table.order([[ 2, "asc" ]]).draw();
                    break;
                }
            }

            $(this).append(orderString);
            currentSort = this.id;
        });

        $("#sortRaid").click(function(){

            $("#"+currentSort).find("i").remove();

            if(this.id == currentSort) {
                orderNumber *= -1;
                
            }
            else {
                orderNumber = 1;
            }

            switch(orderNumber)
            {
                case 1:
                {
                    orderString="<i class='fas fa-caret-down'></i>";
                    table.order([[ 3, "desc" ]]).draw();
                    break;
                }
                case -1:
                {
                    orderString="<i class='fas fa-caret-up'></i>";
                    table.order([[ 3, "asc" ]]).draw();
                    break;
                }
            }

            $(this).append(orderString);
            currentSort = this.id;
        });

        $("#sortCoop").click(function(){

            $("#"+currentSort).find("i").remove();

            if(this.id == currentSort) {
                orderNumber *= -1;
                
            }
            else {
                orderNumber = 1;
            }

            switch(orderNumber)
            {
                case 1:
                {
                    orderString="<i class='fas fa-caret-down'></i>";
                    table.order([[ 4, "desc" ]]).draw();
                    break;
                }
                case -1:
                {
                    orderString="<i class='fas fa-caret-up'></i>";
                    table.order([[ 4, "asc" ]]).draw();
                    break;
                }
            }

            $(this).append(orderString);
            currentSort = this.id;
        });

        $("#sortStory").click(function(){

            $("#"+currentSort).find("i").remove();

            if(this.id == currentSort) {
                orderNumber *= -1;
                
            }
            else {
                orderNumber = 1;
            }

            switch(orderNumber)
            {
                case 1:
                {
                    orderString="<i class='fas fa-caret-down'></i>";
                    table.order([[ 5, "desc" ]]).draw();
                    break;
                }
                case -1:
                {
                    orderString="<i class='fas fa-caret-up'></i>";
                    table.order([[ 5, "asc" ]]).draw();
                    break;
                }
            }

            $(this).append(orderString);
            currentSort = this.id;
        });

        $("#sortKamazone").click(function(){

            $("#"+currentSort).find("i").remove();

            if(this.id == currentSort) {
                orderNumber *= -1;
                
            }
            else {
                orderNumber = 1;
            }

            switch(orderNumber)
            {
                case 1:
                {
                    orderString="<i class='fas fa-caret-down'></i>";
                    table.order([[ 6, "desc" ]]).draw();
                    break;
                }
                case -1:
                {
                    orderString="<i class='fas fa-caret-up'></i>";
                    table.order([[ 6, "asc" ]]).draw();
                    break;
                }
            }

            $(this).append(orderString);
            currentSort = this.id;
        });

        $("#sortOrbital").click(function(){

            $("#"+currentSort).find("i").remove();

            if(this.id == currentSort) {
                orderNumber *= -1;
                
            }
            else {
                orderNumber = 1;
            }

            switch(orderNumber)
            {
                case 1:
                {
                    orderString="<i class='fas fa-caret-down'></i>";
                    table.order([[ 7, "desc" ]]).draw();
                    break;
                }
                case -1:
                {
                    orderString="<i class='fas fa-caret-up'></i>";
                    table.order([[ 7, "asc" ]]).draw();
                    break;
                }
            }

            $(this).append(orderString);
            currentSort = this.id;
        });

        $("#sortTowers").click(function(){

            $("#"+currentSort).find("i").remove();

            if(this.id == currentSort) {
                orderNumber *= -1;
                
            }
            else {
                orderNumber = 1;
            }

            switch(orderNumber)
            {
                case 1:
                {
                    orderString="<i class='fas fa-caret-down'></i>";
                    table.order([[ 8, "desc" ]]).draw();
                    break;
                }
                case -1:
                {
                    orderString="<i class='fas fa-caret-up'></i>";
                    table.order([[ 8, "asc" ]]).draw();
                    break;
                }
            }

            $(this).append(orderString);
            currentSort = this.id;
        });

        $("#sortOverall").click(function(){

            $("#"+currentSort).find("i").remove();

            if(this.id == currentSort) {
                orderNumber *= -1;
                
            }
            else {
                orderNumber = 1;
            }

            switch(orderNumber)
            {
                case 1:
                {
                    orderString="<i class='fas fa-caret-down'></i>";
                    table.order([[ 9, "desc" ]]).draw();
                    break;
                }
                case -1:
                {
                    orderString="<i class='fas fa-caret-up'></i>";
                    table.order([[ 9, "asc" ]]).draw();
                    break;
                }
            }

            $(this).append(orderString);
            currentSort = this.id;
        });
    });
    
    function heatmap_color_for(value) {
        var r = 255-(100-value);
        var g = 55+(2*(100-value));
        var b = 0;

        return 'rgb('+r+', '+g+', '+b+')';
    }

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
            else if (type=='r') {
                selectedRoles.splice(selectedRoles.indexOf('r-'+keyword), 1);
            }
            else if (type='region') {
                selectedRegions.splice(selectedRegions.indexOf(keyword), 1);
            }
            
            if((selectedElements.length + selectedRoles.length + selectedEquipment.length + selectedStars.length + selectedRegions.length) > 0) 
            {
                var heroList = jQuery('.hero-rating-row');
                var elementList = '';
                var roleList = '';
                var starList = '';
                var equipmentList = '';
                var regionList = '';
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
                if(selectedRegions.length > 0) {
                    regionList = '.' + selectedRegions.join(', .');
                    heroList = heroList.filter(regionList);
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
            else if (type=='r') {
                selectedRoles.push('r-'+keyword);
            }
            else if (type=='region') {
                selectedRegions.push(keyword);
            }

            var heroList = jQuery('.hero-rating-row');
            var elementList = '';
            var starList = '';
            var roleList = '';
            var equipmentList = '';
            var regionList = '';
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
            if(selectedRegions.length > 0) {
                regionList = '.' + selectedRegions.join(', .');
                heroList = heroList.filter(regionList);
            }

            jQuery('.hero-rating-row').addClass('hidden');
            heroList.removeClass("hidden"); 
        }
    } 
</script>

<?php
get_footer();
?>
