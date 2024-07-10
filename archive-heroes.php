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
                        <td onclick="filter(this, '1Star', 's')"><i class="fas fa-star star1"></i></i></td>
                    </tr>
                </table>
                <table class="filter-table equipmentFilter">
                    <tr><th colspan="3">Filter Equipment</th></tr>
                    <tr>
                        <td onclick="filter(this, 'One-Handed', 'eq')"><?php getEquipment("One-Handed Sword") ?></td>
                        <td onclick="filter(this, 'Two-Handed', 'eq')"><?php getEquipment("Two-Handed Sword") ?></td>
                        <td onclick="filter(this, 'Gauntlet', 'eq')"><?php getEquipment("Gauntlet") ?></td>
                    </tr>
                    <tr>
                        <td onclick="filter(this, 'Claw', 'eq')"><?php getEquipment("Claw") ?></td>
                        <td onclick="filter(this, 'Bow', 'eq')"><?php getEquipment("Bow") ?></td>
                        <td onclick="filter(this, 'Rifle', 'eq')"><?php getEquipment("Rifle") ?></td>
                    </tr>
                    <tr>
                        <td onclick="filter(this, 'Staff', 'eq')"><?php getEquipment("Staff") ?></td>
                        <td onclick="filter(this, 'Basket', 'eq')"><?php getEquipment("Basket") ?></td>
                        <td onclick="filter(this, 'Shield', 'eq')"><?php getEquipment("Shield") ?></td>
                    </tr>
                </table>
                <table class="filter-table" id="sortControls">
                    <tr><th colspan="11">Sort By</th></tr>
                    <tr>
                        <td id="sortTitle">Name</td>
                        <td id="sortElement">Element</td>
                        <td id="sortRarity">Rarity</td>
                        <td id="sortRole">Role</td>
                    </tr>
                    <tr>
                        <td id="sortNA">NA Release</td>
                        <td id="sortKR">KR Release</td>
                        <td id="sortJP">JP Release</td>
                        <td id="sortRating">Rating</td>
                    </tr>
                    <tr>
                        <td id="sortTrigger">Chain 1</td>
                        <td id="sortResult">Chain 2</td>
                        <td id="sortAtk">Atk</td>
                        <td id="sortHP">HP</td>
                    </tr>
                    <tr>
                        <td id="sortDef">Def</td>
                        <td id="sortCrit">Crit</td>
                        <td id="sortDR">DR</td>
                        <td id="sortHeal">Heal</td>
                    </tr>
                </table>
                <table class="hero-list">
                    <thead> 
                        <tr> 
                            <th id='column-rating'>Rating</th>
                            <th id='column-hero'>Hero</th>
                            <th id='column-rarity' style="display: none;">Rarity</th>
                            <th id='column-name' style="display: none;">Name</th>
                            <th id='column-element' style="display: none;">Element</th>
                            <th id='column-role' style="display: none;">Role</th>
                            <th id='column-c1' style="display: none;">Chain Trigger</th>
                            <th id='column-c2' style="display: none;">Chain Result</th>
                            <th id='column-na' style="display: none;">NA Release</th>
                            <th id='column-kr' style="display: none;">KR Release</th>
                            <th id='column-jp' style="display: none;">JP Release</th>
                            <th id='column-chain'>Chain</th>
                            <th id='column-stats'>Stats</th>
                            <th id='column-atk' style="display: none;">Atk</th>
                            <th id='column-hp' style="display: none;">HP</th>
                            <th id='column-def' style="display: none;">Def</th>
                            <th id='column-crit' style="display: none;">Crit Chance</th>
                            <th id='column-dr' style="display: none;">Damage Reduction</th>
                            <th id='column-heal' style="display: none;">Heal</th>
                        </tr>
                    </thead>
                    <tbody id="hero-data">
                    <?php 
                        if(have_posts()) : while(have_posts()) : the_post();
                            get_template_part('template-parts/heroes/hero-single');
                        endwhile; endif;
                    ?>
                    </tbody>
                </table>
            </div>
            <div class="col-lg-4">
                <?php dynamic_sidebar( 'forum_archive_sidebar' ); ?>
                <?php dynamic_sidebar( 'sidebar_widgets' ); ?>
            </div>
            <script>
                var heroTable, selectedElements=[], selectedRoles=[], selectedEquipment=[], selectedStars=[], orderNumber=1, orderString;
                window.onload = function() {
                    jQuery(function($){
                        numberTableSort($("#column-rating")[0]);
                        numberTableSort($("#column-rating")[0]);
                        orderNumber=1;

                        var currentSort="sortRarity";

                        $(".hero-rating").each(function(i){
                            $(this).css("color",heatmap_color_for(parseInt($(this).text())));
                        });

                        $("#sortTitle").click(function(){
                            tableSort($('#column-hero')[0]);
                            
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
                                    orderString="<i class='fas fa-caret-up'></i>";
                                    break;
                                }
                                case -1:
                                {
                                    orderString="<i class='fas fa-caret-down'></i>";
                                    break;
                                }
                            }

                            $(this).append(orderString);
                            currentSort = this.id;
                        });

                        $("#sortElement").click(function(){
                            tableSort($('#column-element')[0]);
                            
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
                                    orderString="<i class='fas fa-caret-up'></i>";
                                    break;
                                }
                                case -1:
                                {
                                    orderString="<i class='fas fa-caret-down'></i>";
                                    break;
                                }
                            }

                            $(this).append(orderString);
                            currentSort = this.id;
                        });

                        $("#sortNA").click(function(){
                            tableSort($('#column-na')[0]);
                            
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
                                    orderString="<i class='fas fa-caret-up'></i>";
                                    break;
                                }
                                case -1:
                                {
                                    orderString="<i class='fas fa-caret-down'></i>";
                                    break;
                                }
                            }

                            $(this).append(orderString);
                            currentSort = this.id;
                        });

                        $("#sortKR").click(function(){
                            tableSort($('#column-kr')[0]);
                            
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
                                    orderString="<i class='fas fa-caret-up'></i>";
                                    break;
                                }
                                case -1:
                                {
                                    orderString="<i class='fas fa-caret-down'></i>";
                                    break;
                                }
                            }

                            $(this).append(orderString);
                            currentSort = this.id;
                        });

                        $("#sortJP").click(function(){
                            tableSort($('#column-jp')[0]);
                            
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
                                    orderString="<i class='fas fa-caret-up'></i>";
                                    break;
                                }
                                case -1:
                                {
                                    orderString="<i class='fas fa-caret-down'></i>";
                                    break;
                                }
                            }

                            $(this).append(orderString);
                            currentSort = this.id;
                        });

                        $("#sortRole").click(function(){
                            tableSort($('#column-role')[0]);
                            
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
                                    orderString="<i class='fas fa-caret-up'></i>";
                                    break;
                                }
                                case -1:
                                {
                                    orderString="<i class='fas fa-caret-down'></i>";
                                    break;
                                }
                            }

                            $(this).append(orderString);
                            currentSort = this.id;
                        });

                        $("#sortTrigger").click(function(){
                            tableSort($('#column-c1')[0]);
                            
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
                                    orderString="<i class='fas fa-caret-up'></i>";
                                    break;
                                }
                                case -1:
                                {
                                    orderString="<i class='fas fa-caret-down'></i>";
                                    break;
                                }
                            }

                            $(this).append(orderString);
                            currentSort = this.id;
                        });

                        $("#sortResult").click(function(){
                            tableSort($('#column-c2')[0]);
                            
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
                                    orderString="<i class='fas fa-caret-up'></i>";
                                    break;
                                }
                                case -1:
                                {
                                    orderString="<i class='fas fa-caret-down'></i>";
                                    break;
                                }
                            }

                            $(this).append(orderString);
                            currentSort = this.id;
                        });

                        $("#sortAtk").click(function(){
                            numberTableSort($('#column-atk')[0]);
                            
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
                                    orderString="<i class='fas fa-caret-up'></i>";
                                    break;
                                }
                                case -1:
                                {
                                    orderString="<i class='fas fa-caret-down'></i>";
                                    break;
                                }
                            }

                            $(this).append(orderString);
                            currentSort = this.id;
                        });

                        $("#sortHP").click(function(){
                            numberTableSort($('#column-hp')[0]);
                            
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
                                    orderString="<i class='fas fa-caret-up'></i>";
                                    break;
                                }
                                case -1:
                                {
                                    orderString="<i class='fas fa-caret-down'></i>";
                                    break;
                                }
                            }

                            $(this).append(orderString);
                            currentSort = this.id;
                        });

                        $("#sortDef").click(function(){
                            numberTableSort($('#column-def')[0]);
                            
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
                                    orderString="<i class='fas fa-caret-up'></i>";
                                    break;
                                }
                                case -1:
                                {
                                    orderString="<i class='fas fa-caret-down'></i>";
                                    break;
                                }
                            }

                            $(this).append(orderString);
                            currentSort = this.id;
                        });

                        $("#sortCrit").click(function(){
                            numberTableSort($('#column-crit')[0]);
                            
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
                                    orderString="<i class='fas fa-caret-up'></i>";
                                    break;
                                }
                                case -1:
                                {
                                    orderString="<i class='fas fa-caret-down'></i>";
                                    break;
                                }
                            }

                            $(this).append(orderString);
                            currentSort = this.id;
                        });

                        $("#sortDR").click(function(){
                            numberTableSort($('#column-dr')[0]);
                            
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
                                    orderString="<i class='fas fa-caret-up'></i>";
                                    break;
                                }
                                case -1:
                                {
                                    orderString="<i class='fas fa-caret-down'></i>";
                                    break;
                                }
                            }

                            $(this).append(orderString);
                            currentSort = this.id;
                        });

                        $("#sortHeal").click(function(){
                            numberTableSort($('#column-heal')[0]);
                            
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
                                    orderString="<i class='fas fa-caret-up'></i>";
                                    break;
                                }
                                case -1:
                                {
                                    orderString="<i class='fas fa-caret-down'></i>";
                                    break;
                                }
                            }

                            $(this).append(orderString);
                            currentSort = this.id;
                        });

                        $("#sortRating").click(function(){
                            numberTableSort($('#column-rating')[0]);
                            
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
                                    orderString="<i class='fas fa-caret-up'></i>";
                                    break;
                                }
                                case -1:
                                {
                                    orderString="<i class='fas fa-caret-down'></i>";
                                    break;
                                }
                            }

                            $(this).append(orderString);
                            currentSort = this.id;
                        });

                        $("#sortRarity").click(function(){
                            tableSort($('#column-rarity')[0]);
                            
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
                                    orderString="<i class='fas fa-caret-up'></i>";
                                    break;
                                }
                                case -1:
                                {
                                    orderString="<i class='fas fa-caret-down'></i>";
                                    break;
                                }
                            }

                            $(this).append(orderString);
                            currentSort = this.id;
                        });

                        $("#sortName").click(function(){
                            tableSort($('#column-name')[0]);
                            
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
                                    orderString="<i class='fas fa-caret-up'></i>";
                                    break;
                                }
                                case -1:
                                {
                                    orderString="<i class='fas fa-caret-down'></i>";
                                    break;
                                }
                            }

                            $(this).append(orderString);
                            currentSort = this.id;
                        });
                    });
                }
              
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
                        else {
                            selectedRoles.splice(selectedRoles.indexOf('r-'+keyword), 1);
                        }
                        
                        if((selectedElements.length + selectedRoles.length + selectedEquipment.length + selectedStars.length) > 0) 
                        {
                            var heroList = jQuery('.hero-row');
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

                            jQuery('.hero-row').addClass('hidden');
                            heroList.removeClass("hidden"); 
                        }
                        else {
                            jQuery('.hero-row').removeClass("hidden");
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

                        var heroList = jQuery('.hero-row');
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

                        jQuery('.hero-row').addClass('hidden');
                        heroList.removeClass("hidden"); 
                    }
                } 
                
            </script>
        </div>
    </div>
</section>

<?php
get_footer();
?>