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

<section class="blog_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="filter-toolbar">
                    <table class="filter-table">
                        <tr><th colspan="2">Filter Type</th><th colspan="3">Filter Stat Reward</th></tr>
                        <tr>
                            <td onclick="filter(this, 'Costumes', 'r')">Costumes</td>
                            <td onclick="filter(this, 'Equipment', 'r')">Equipment</td>
                            <td onclick="filter(this, 'Atk', 's')">Atk</td>
                            <td onclick="filter(this, 'Def', 's')">Def</td>
                            <td onclick="filter(this, 'HP', 's')">HP</td>
                        </tr>
                    </table>
                </div>
                <?php 
                    if(have_posts()) : while(have_posts()) : the_post();
                        $items = get_field('items');
                        $reward_stat = get_field('reward_stat');
                        $reward_value = get_field('reward_value');
                        $item_level = get_field('item_level');
                        $collection_type = get_the_terms($post->ID, 'collection_categories');
                ?>
                        <div class="item-collection Collection-<?php echo $collection_type[0]->name; ?> Reward-<?php echo $reward_stat ?>">
                            <div class="collection-info-bar">
                                <span class="collection-name"><?php the_title(); ?></span>
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
                    endwhile; endif;
                ?>
            </div>
            <div class="col-lg-4">
                <?php dynamic_sidebar( 'forum_archive_sidebar' ); ?>
                <?php dynamic_sidebar( 'sidebar_widgets' ); ?>
            </div>
            <script>
                var heroTable, selectedElements=[], selectedRoles=[], selectedType=[], selectedStars=[], orderNumber=1, orderString;
            

                function filter(element, keyword, type) {
                    if(element.classList.contains("clicked")) {
                        element.classList.remove("clicked");
                        if (type=='r'){ 
                            selectedType.splice(selectedType.indexOf('Collection-'+keyword), 1);
                        }
                        else if(type=='s') {
                            selectedStars.splice(selectedStars.indexOf('Reward-'+keyword), 1);
                        }
                        else if (type=='e') {
                            selectedElements.splice(selectedElements.indexOf('e-'+keyword), 1);
                        }
                        else {
                            selectedRoles.splice(selectedRoles.indexOf('r-'+keyword), 1);
                        }
                        
                        if((selectedElements.length + selectedRoles.length + selectedType.length + selectedStars.length) > 0) 
                        {
                            var collectionList = jQuery('.item-collection');
                            var elementList = '';
                            var roleList = '';
                            var starList = '';
                            var equipmentList = '';
                            if(selectedElements.length > 0) {
                                elementList = '.' + selectedElements.join(', .');
                                collectionList = collectionList.filter(elementList);
                            }
                            if(selectedRoles.length > 0) {
                                roleList = '.' + selectedRoles.join(', .');
                                collectionList = collectionList.filter(roleList);
                            }
                            if(selectedType.length > 0)
                            {
                                equipmentList = '.' + selectedType.join(', .');
                                collectionList = collectionList.filter(equipmentList);
                            }
                            if(selectedStars.length > 0) {
                                starList = '.' + selectedStars.join(', .');
                                collectionList = collectionList.filter(starList);
                            }

                            jQuery('.item-collection').addClass('hidden');
                            collectionList.removeClass("hidden"); 
                        }
                        else {
                            jQuery('.item-collection').removeClass("hidden");
                        }
                    }
                    else {
                        element.classList.add("clicked");
                        if (type=='r'){ 
                            selectedType.push('Collection-'+keyword);
                        }
                        else if (type=='s') {
                            selectedStars.push('Reward-'+keyword);
                        }
                        else if (type=='e') {
                            selectedElements.push('e-'+keyword);
                        }
                        else {
                            selectedRoles.push('r-'+keyword);
                        }

                        var collectionList = jQuery('.item-collection');
                        var elementList = '';
                        var starList = '';
                        var roleList = '';
                        var equipmentList = '';
                        if(selectedElements.length > 0) {
                            elementList = '.' + selectedElements.join(', .');
                            collectionList = collectionList.filter(elementList);
                        }
                        if(selectedStars.length > 0) {
                            starList = '.' + selectedStars.join(', .');
                            collectionList = collectionList.filter(starList);
                        }
                        if(selectedRoles.length > 0) {
                            roleList = '.' + selectedRoles.join(', .');
                            collectionList = collectionList.filter(roleList);
                        }
                        if(selectedType.length > 0)
                        {
                            equipmentList = '.' + selectedType.join(', .');
                            collectionList = collectionList.filter(equipmentList);
                        }

                        jQuery('.item-collection').addClass('hidden');
                        collectionList.removeClass("hidden"); 
                    }
                } 
                
            </script>
        </div>
    </div>
</section>

<?php
get_footer();
?>