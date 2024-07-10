;(function ($) {
    $(document).ready(function () {

        if($('#post h2').length) {
            anchors.options = {
                icon: '#'
            };
            anchors.add('#post h2');
        }

        $('#searchInput').on('input', function(e) {
            if('' == this.value) {
                $('#heavenhold-search-result').removeClass('ajax-search');
            }
        });

        if ($('.sticky').length) {
            $(window).scroll(function () {
                var scroll = $(window).scrollTop();
                if (scroll) {
                    $(".sticky").addClass("navbar_fixed");
                } else {
                    $(".sticky").removeClass("navbar_fixed");
                }
            })
        }

    })
})(jQuery);

var WpJsonUrl = document.querySelector('link[rel="https://api.w.org/"]').href
var homeurl = WpJsonUrl.replace('/wp-json/','');

function fetchResults(){
    let keyword = jQuery('#searchInput').val();
    if( keyword == "" ){
        jQuery('#home-search-result').removeClass('ajax-search').html("");
    } else {
        jQuery.ajax({
            url: homeurl+'/wp-admin/admin-ajax.php',
            type: 'post',
            data: { action: 'load_search_results', keyword: keyword  },
            success: function(data) {
                jQuery('#home-search-result').addClass('ajax-search').html( data );
            }
        });
    }
}

function fetchResultsNav(){
    let keyword = jQuery('#search').val();
    if( keyword == "" ){
        jQuery('#heavenhold-search-result').removeClass('ajax-search').html("");
    } else {
        jQuery.ajax({
            url: homeurl+'/wp-admin/admin-ajax.php',
            type: 'post',
            data: { action: 'load_search_results', keyword: keyword  },
            success: function(data) {
                jQuery('#heavenhold-search-result').addClass('ajax-search').html( data );
            }
        });
    }
}