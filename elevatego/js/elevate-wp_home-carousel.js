/**
 * Elevate WP  v1.0.0
 */

//HOME PAGE - VERTICAL TABS CAROUSEL
jQuery(document).ready(function () {
    // starting index
    var currTab = 1;
    // count of all tabs
    var totalTabs = jQuery("div.vertical-tab-menu div.list-group > a").length;

    if (totalTabs > 1) {
        //Start transition loop
        var i = setInterval(cycleTabs, 5000);

        //Bind transition click
        jQuery('div.vertical-tab-menu div.list-group > a, div.nav-thumbs>ul>li').click(function (e) {
            e.preventDefault();
            currTab = jQuery(this).index();
            cycleTabs();
            clearTimeout(i);
            i = setInterval(cycleTabs, 5000);
        });
    }

    function cycleTabs() {
        // increment counter
        currTab++;

        // reset if we're at the last one
        if (currTab == totalTabs + 1) {
            currTab = 1;
        }

        if (totalTabs) {
            jQuery("div.vertical-tab-menu div.list-group > a").removeClass("active");
            jQuery("div.vertical-tab-menu div.list-group > a:nth-of-type(" + (currTab) + ")").addClass("active");
            jQuery("div.nav-thumbs>ul>li").removeClass("active");
            jQuery("div.nav-thumbs>ul>li:nth-of-type(" + (currTab) + ")").addClass("active");
            jQuery("div.vertical-tab>div.vertical-tab-content").removeClass("active");
            jQuery("div.vertical-tab>div.vertical-tab-content:nth-of-type(" + (currTab) + ")").addClass("active");
            jQuery("div.vertical-tab-bg>div.vertical-tab-bgimg").removeClass("active");
            jQuery("div.vertical-tab-bg>div.vertical-tab-bgimg:nth-of-type(" + (currTab) + ")").addClass("active");
        }
    }
});

