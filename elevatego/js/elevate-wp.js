/**
 * Elevate WP  v1.0.0
 */

jQuery(document).ready(function () {

	/**
	 * Add validations for various forms
	 */
	if (typeof validate === "function") {
		//Modal window event form
		jQuery("#eventform").validate({
			rules: {
				email: {
					required: true, email: true
				}
			}, messages: {
				email: {
					required: "Please fill in your email", email: "Please enter valid email"
				}
			}, invalidHandler: function () {
				jQuery('.error-icon').removeClass('hide');
			}, success: "valid", submitHandler: function (evt) {
				evt.preventDefault();
				jQuery("#eventform .meter").removeClass("hide");
				jQuery("#eventform .meter > span").each(function () {
					jQuery(this).data("origWidth", jQuery(this).width()).width(0).animate({
						width: jQuery(this).data("origWidth")
					}, 3000);
				});
				jQuery.ajax({
					type: "POST", url: "test.php", data: jQuery('#eventform').serialize(), statusCode: {
						200: function () {
							console.log("success");
							jQuery("#EventSubscribeForm").removeClass('show');
							jQuery("#EventSubscribeForm").addClass('hide');
							jQuery("#eventThanks").removeClass('hide');
							jQuery("#eventThanks").addClass('show');
						}
					}
				});
			}
		});
		/*

		 Subscription email form

		 */
		jQuery("#subscriptionEmailForm").validate({
			rules: {
				email: {
					required: true, email: true
				}
			}, messages: {
				email: {
					required: "Please fill in your email", email: "Please enter valid email"
				}
			}, invalidHandler: function () {
				jQuery('.error-icon').removeClass('hide');
			}, success: "valid", submitHandler: function (evt) {
				evt.preventDefault();
				jQuery("#subscriptionEmailForm .meter").removeClass("hide");
				jQuery("#subscriptionEmailForm .meter > span").each(function () {
					jQuery(this).data("origWidth", jQuery(this).width()).width(0).animate({
						width: jQuery(this).data("origWidth")
					}, 3000);
				});
				jQuery.ajax({
					type: "POST",
					url: "https://www.salesforce.com/servlet/servlet.WebToLead?encoding=UTF-8",
					data: jQuery('#subscriptionEmailForm').serialize(),
					statusCode: {
						200: function () {
							jQuery("#subscribeForm").removeClass('show');
							jQuery("#subscribeForm").addClass('hide');
							jQuery("#subscriptionEmailFormThankyouSection").removeClass('hide');
							jQuery("#subscriptionEmailFormThankyouSection").addClass('show');
						}
					}
				});

			}

		});
	}

	/**
	 * Close subscription form if exists
	 * @type {*|jQuery|HTMLElement}
	 */
	var subscriptionformClose = jQuery('.subscription-email-form .subscription-email-form-close');

	if (subscriptionformClose) {
		var SubscriptionFormCloseButton = subscriptionformClose.on('click', function () {
			jQuery(this).closest('.subscription-email-form').addClass('hide');
		});
	}

	/**
	 * Main menu - Your Macquarie dropdown
	 */
	jQuery('li.your-macquarie ').click(function(e){
		jQuery('.macquarie-menu').toggleClass('hide');

	});
	/**
	 * Mega Menu show hide
	 * @type {*|jQuery|HTMLElement}
	 */
	var elv_megamenu = jQuery(function () {
		// navbar mega dropdown animation on scroll
		jQuery('.toggleLogoSmall').addClass('hide');
		jQuery('.toggleLogoBig').addClass('show');

		var position = jQuery(window).scrollTop();

		jQuery(window).scroll(function () {

			jQuery('.dropdown-toggle').each(function () {
				if (jQuery(this).parent().hasClass("open")) {
					jQuery(this).dropdown("toggle");
				}
			});
			//jQuery('.dropdown-menu').stop().fadeOut("fast");

			var scroll = jQuery(window).scrollTop();

			if (scroll > position) {
				//scroll up
				elv_hideStickyNav();
				elv_showStickyCTA();
			} else {
				//scroll down
				elv_showStickyNav();
				elv_showStickyCTA();

			}

			if (jQuery(this).scrollTop() < 560) {
				elv_hideStickyNav();
				elv_hideStickyCTA();
			}

			position = scroll;
		});

	});

	function elv_hideStickyNav() {
		jQuery('.navbar').addClass('fixed-top');
		jQuery('.navbar').removeClass('navbar-fixed-top');

		jQuery('.toggleLogoSmall').addClass('hide');
		jQuery('.toggleLogoSmall').removeClass('show');

		jQuery('.toggleLogoBig').addClass('show');
		jQuery('.toggleLogoBig').removeClass('hide');
	}

	function elv_hideStickyCTA() {
		jQuery('.sticky-cta').removeClass('navbar-fixed-bottom');
	}

	function elv_showStickyNav() {
		jQuery('.navbar').removeClass('fixed-top');
		jQuery('.navbar').addClass('navbar-fixed-top');
		jQuery('.navbar-fixed-top').addClass('animateWidebar');

		jQuery('.sticky-cta').addClass('animateWidebar');
		jQuery('.sticky-cta').addClass('navbar-fixed-bottom');

		jQuery('.toggleLogoSmall').addClass('show');
		jQuery('.toggleLogoSmall').removeClass('hide');

		jQuery('.toggleLogoBig').addClass('hide');
		jQuery('.toggleLogoBig').removeClass('show');
	}

	function elv_showStickyCTA() {
		jQuery('.sticky-cta').addClass('animateWidebar');
		jQuery('.sticky-cta').addClass('navbar-fixed-bottom');
	}

	var elv_megamenuDropdown = jQuery(function () {
		jQuery('.dropdown-menu').click(function (e) {
			e.stopPropagation();
		});
	});

	/**
	 * Scroll to anchor links
	 */
	jQuery(".disclaimer-link").click(function () {

		jQuery("#collapseOne").collapse('show');

		var addressValue = jQuery(this).attr("href");
		if (jQuery("a" + addressValue).length) {
			jQuery('html, body').animate({
				scrollTop: jQuery("a" + addressValue).offset().top - 65
			}, 500);
		}
		return false;
	});

	/**
	 * Footer Menu accordion for mobile
	 */
	if (jQuery(window).width() < 977) {
		jQuery('.footerMenu').addClass('panel-collapse');
		jQuery('.footerMenu').addClass('collapse');
		jQuery('.mobile-collapse').addClass('collapse');
	}
	else {
		var currHeight = jQuery('.footerMenu').height();
		jQuery('.footerMenu').removeClass('panel-collapse');
		jQuery('.footerMenu').removeClass('collapse');
		jQuery('.mobile-collapse').removeClass('collapse');
	}

	jQuery(window).resize(function() {
		if (jQuery(window).width() < 977) {
			jQuery('.footerMenu').addClass('panel-collapse');
			jQuery('.footerMenu').addClass('collapse');
			jQuery('.mobile-collapse').addClass('collapse');
		}
		else {
			if(jQuery('.footerMenu').height() != currHeight) {
				jQuery('.footerMenu').height(currHeight);
				jQuery('.mobile-collapse').height(currHeight);
			}
			jQuery('.footerMenu').removeClass('panel-collapse');
			jQuery('.footerMenu').removeClass('collapse');
			jQuery('.mobile-collapse').removeClass('collapse');
		}
	});

	/**
	 * Create tiles grid elements, add hash for filters
	 */
	if (typeof isotope === "function") {
		var grid = jQuery('.column-content').isotope({
			itemSelector: '.grid-item', percentPosition: true, stagger: 80, hiddenStyle: {
				opacity: 0
			}, visibleStyle: {
				opacity: 1
			},
			masonry: {
				columnWidth: '.grid-sizer'
			}

		});
	}

	function elv_getHashFilter() {
		var hash = location.hash;
		// get filter=filterName
		var matches = location.hash.match(/filter=([^&]+)/i);
		var hashFilter = matches && matches[1];
		return hashFilter && decodeURIComponent(hashFilter);
	}

	var grid = jQuery('.column-content');

	// bind filter button click
	var jQueryfilters = jQuery('.tile-filter');
	jQueryfilters.on('click', function () {
		var filterAttr = jQuery(this).attr('data-filter');
		// set filter in hash
		location.hash = 'filter=' + encodeURIComponent(filterAttr);
	});

	var isIsotopeInit = false;

	function elv_onHashchange() {
		var hashFilter = elv_getHashFilter();
		if (!hashFilter && isIsotopeInit) {
			return;
		}
		isIsotopeInit = true;
		// filter isotope
		grid.isotope({
			itemSelector: '.grid-item', percentPosition: true, stagger: 80, filter: hashFilter, hiddenStyle: {
				opacity: 0
			}, visibleStyle: {
				opacity: 1
			},
			masonry: {
				columnWidth: '.grid-sizer'
			}
		});
		// set selected class on button
		if (hashFilter) {
			filters.parent('li').removeClass('active');
			filters.parent('li').find('[data-filter="' + hashFilter + '"]').parent('li').addClass('active');
		}
	}

	jQuery(window).on('hashchange', elv_onHashchange);
	// trigger event handler to init Isotope
	elv_onHashchange();

	// reveal all items after init
	var items = grid.find('.grid-item');
	grid.addClass('animate').isotope('revealItemElements', items);

	/**
	 * Wrap rate with spans
	 * @param rate
	 * @returns {*}
	 */
	function elv_rateWrapper(rate) {
		var formattedRate;

		if((rate != undefined) && (rate.search("rate-pa")<0)) {
			var rateToNumber = parseFloat(rate).toFixed(2);

			if ((rate) && !isNaN(rateToNumber)) {
				formattedRate = rateToNumber + '<span class="rate-percent">%<span class="rate-pa">pa </span></span>';
			} else {
				formattedRate = 'n/a';
			}
		}
		return formattedRate;
	}

	if (jQuery(".rate-display").length) {
		jQuery(".rate-display").each(function () {
			var getHtml = jQuery(this).html().trim();

			if ((getHtml.substr(getHtml.length - 4) == "% pa")) {
				jQuery(this).html(elv_rateWrapper(getHtml));
			}
		});
	}
});


