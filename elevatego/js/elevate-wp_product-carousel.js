/**
 * Elevate WP  v1.0.0
 */

//PRODUCT PAGE - VERTICAL TABS CAROUSEL
jQuery(window).load(function () {
    // background imag for content area
    //var backgroundImageURL=jQuery("#tab1").attr("data-bg");
    //jQuery("#tab1").css("background", "url("+backgroundImageURL +")");

    //Bind transition click
    jQuery('div.additional-features div.vertical-tab-menu div.list-group > a, div.additional-features div.vertical-tab > a.mb-vertical-tab-menu').click(function (e) {
        e.preventDefault();

        jQuery("div.additional-features div.vertical-tab>div.vertical-tab-content").removeClass("active");
        var activetab = jQuery(this).attr("rel");
        jQuery("#"+activetab).addClass("active");

        //backgroundImageURL=jQuery("#"+activetab).attr("data-bg");

        jQuery("div.additional-features div.vertical-tab > a.mb-vertical-tab-menu").removeClass("active");
        jQuery("div.additional-features div.vertical-tab > a.mb-vertical-tab-menu[rel^='"+activetab+"']").addClass("active");

        jQuery("div.additional-features div.vertical-tab-menu div.list-group > a").removeClass("active");
        jQuery("div.additional-features div.vertical-tab-menu div.list-group > a[rel^='"+activetab+"']").addClass("active");

        //jQuery("#"+activetab).css("background", "url("+backgroundImageURL +")");
    });
});
