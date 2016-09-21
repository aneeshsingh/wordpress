<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */





?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php
	if (is_singular() && pings_open(get_queried_object())) {
		?>
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
		<?php
	}
	wp_head();
	$id = get_post();
	?>
</head>
<?php

/**
 *
 * We are updating background image based on user persona
 *
 *
 */
$body_background_image_url = '';

$persona = 1;



switch ($persona) {

	case 1:
		if (class_exists('MultiPostThumbnails')) {
			$body_background_image_url = MultiPostThumbnails::get_post_thumbnail_url(get_post_type(), 'secondary-image-1');
		} else {
			$body_background_image_url = '';
		}
		break;
	case 2:
		if (class_exists('MultiPostThumbnails')) {
			$body_background_image_url = MultiPostThumbnails::get_post_thumbnail_url(get_post_type(), 'secondary-image-2');
		} else {
			$body_background_image_url = '';
		}
		break;
	case 3:
		if (class_exists('MultiPostThumbnails')) {
			$body_background_image_url = MultiPostThumbnails::get_post_thumbnail_url(get_post_type(), 'secondary-image-3');
		} else {
			$body_background_image_url = '';
		}
		break;
	case 4:
		if (class_exists('MultiPostThumbnails')) {
			$body_background_image_url = MultiPostThumbnails::get_post_thumbnail_url(get_post_type(), 'secondary-image-4');
		} else {
			$body_background_image_url = '';
		}
		break;
	case 5:
		if (class_exists('MultiPostThumbnails')) {
			$body_background_image_url = MultiPostThumbnails::get_post_thumbnail_url(get_post_type(), 'secondary-image-5');
		} else {
			$body_background_image_url = '';
		}
		break;
	case 6:
		if (class_exists('MultiPostThumbnails')) {
			$body_background_image_url = MultiPostThumbnails::get_post_thumbnail_url(get_post_type(), 'secondary-image-6');
		} else {
			$body_background_image_url = '';
		}
		break;
	case 7:
		if (class_exists('MultiPostThumbnails')) {
			$body_background_image_url = MultiPostThumbnails::get_post_thumbnail_url(get_post_type(), 'secondary-image-7');
		} else {
			$body_background_image_url = '';
		}
		break;
	case 8:
		if (class_exists('MultiPostThumbnails')) {
			$body_background_image_url = MultiPostThumbnails::get_post_thumbnail_url(get_post_type(), 'secondary-image-8');
		} else {
			$body_background_image_url = '';
		}
		break;
	case 9:
		if (class_exists('MultiPostThumbnails')) {
			$body_background_image_url = MultiPostThumbnails::get_post_thumbnail_url(get_post_type(), 'secondary-image-9');
		} else {
			$body_background_image_url = '';
		}
		break;
	case 10:
		if (class_exists('MultiPostThumbnails')) {
			$body_background_image_url = MultiPostThumbnails::get_post_thumbnail_url(get_post_type(), 'secondary-image-10');
		} else {
			$body_background_image_url = '';
		}
		break;
	case 11:
		if (class_exists('MultiPostThumbnails')) {
			$body_background_image_url = MultiPostThumbnails::get_post_thumbnail_url(get_post_type(), 'secondary-image-11');
		} else {
			$body_background_image_url = '';
		}
		break;
	case 12:
		if (class_exists('MultiPostThumbnails')) {
			$body_background_image_url = MultiPostThumbnails::get_post_thumbnail_url(get_post_type(), 'secondary-image-12');
		} else {
			$body_background_image_url = '';
		}
		break;
	default:
		$body_background_image_url = wp_get_attachment_url(get_post_thumbnail_id($id));

}

?>
<body <?php body_class(); ?> style="background-image: url('<?php echo esc_url($body_background_image_url) ?>');">
<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-5CXTKC"
				  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
		new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
		j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
		'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-5CXTKC');</script>
<script type='text/javascript'>
	liveagent.init('https://d.la10.salesforceliveagent.com/chat', '<?php echo esc_attr(get_theme_mod('live_chat_salesforce_id_1')); ?>', '<?php echo esc_attr(get_theme_mod('live_chat_salesforce_id_2')); ?>');
</script>
<div id="page" class="site">
	<div class="site-inner">
		<a class="skip-link screen-reader-text hidden" href="#content"><?php _e('Skip to content', 'twentysixteen'); ?></a>
		<!--		<header id="masthead" class="site-header" role="banner">-->
		<div class="container-fluid mobile-menu-lr-padding-0 bg-white">
			<div class="container nav-wider mobile-menu-lr-padding-0">
				<div class="col-sm-4 col-md-4 sm-scrn-padding-remove hidden-xs main-logo">
					<?php echo get_custom_logo(); ?>
				</div>
				<div class="col-sm-8 col-md-8 sm-scrn-padding-remove">
					<div class="row hidden-xs">
						<ul class="nav-details">
							<li>
								<strong><span class="picon picon-0294-phone-call-ringing inline-icon"><!-- fill --></span>&nbsp;<a href="tel:<?php echo esc_attr(str_replace(' ', '', get_theme_mod('phone_field_id'))); ?>">&nbsp;<?php echo esc_attr(get_theme_mod('phone_field_id')); ?></a></strong>
							</li>
							<li id="searchbutton" style="cursor: pointer;">
								<span class="picon picon-0033-search-find-zoom inline-icon"><!-- fill --></span> Search
							</li>
							<li>
								<a href="https://online.macquarie.com.au/personal/" class="text-primary"><span class="picon picon-0632-security-lock inline-icon"><!-- fill --></span> Online Banking</a>
							</li>
						</ul>
					</div>
					<nav class="navbar fixed-top">
						<div class="row">
							<div class="navbar-header">
								<button type="button" class="navbar-toggle collapsed navbar-inverse" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
									<span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span>
									<span class="icon-bar"></span> <span class="icon-bar"></span>
								</button>
								<span class="mobile-toggleLogoSmall navbar-brand hidden-sm hidden-md hidden-lg">
									<img src="<?php echo get_header_image(); ?>" />
								</span>
								<span class="picon picon-0033-search-find-zoom inline-icon mobile-search hidden-lg hidden-md hidden-sm hidden-xs"><!-- fill --></span>
								<a href="https://online.macquarie.com.au/personal/" class="mobile-login hidden-lg hidden-md hidden-sm"><span class="picon picon-0632-security-lock inline-icon"><!-- fill --></span></a>
							</div>
							<ul id="navbar" class="navbar-collapse collapse navbar-inverse mobile-menu-back">
							<span class="toggleLogoSmall navbar-brand hide hidden-xs">
								<img src="<?php echo get_header_image(); ?>" />
							</span>
								<ul class="nav navbar-nav pull-right">
									<?php

									$navs = wp_get_nav_menus();
									$menu_counter = 1;

									foreach ($navs as $v) {
										if ($v->name == 'primary') {

											$menuitems = wp_get_nav_menu_items($v);
											$complete_menu_array = elv_buildTree($menuitems, 0);

											foreach ($complete_menu_array as $k => $v) {
												if ($v->post_title != 'Your.Macquarie' && $v->title != 'Your.Macquarie') {
													$b_ul = true;
													?>
													<li class="bg-grey">
														<a href="<?php echo esc_url($v->url); ?>"><?php echo esc_attr(elv_get_headings($v)); ?></a>
													</li>
													<?php
												} else {
													$b_ul = true;
													?>
													<li class="primary-color your-macquarie">
														<a><span class="picon picon-0709-user-profile-avatar-man-male inline-icon hidden-xs"><!--fill--> &nbsp; </span><?php echo esc_attr(elv_get_headings($v)); ?></a>
													<?php

													if (!empty($v->wpse_children)) {
														$b_ul = false;
														$i = 0;
													?>
														<ul class="macquarie-menu hide">
														<?php
														foreach ($v->wpse_children as $wpse_child) { ?>
															<li><a href="<?php echo esc_url($wpse_child->url); ?>"><?php echo esc_attr(elv_get_headings($wpse_child)); ?></a> </li>
															<?php
														} ?>
														</ul><?php
													} ?>
														</li>
														<?php
												}
											}
										}
									}?>
										</div>
							</div>
					</nav>
				</div>
			</div>
			<!--

			Search area

			-->
			<div class="container-fluid">
				<div class="container">
					<div id="morphsearch" class="morphsearch">
						<?php get_search_form(); ?>
					</div>
					<div class="overlay"></div>
				</div>
			</div>
			<script>
				(function () {
					var morphSearch = document.getElementById('morphsearch'), //						input = morphSearch.querySelector('input.search-field'),
						ctrlClose = morphSearch.querySelector('span.morphsearch-close'), isOpen = isAnimating = false, // show/hide search area

						toggleSearch = function (evt) {
							// return if open and the input gets focused
							if (evt.type.toLowerCase() === 'focus' && isOpen) return false;
							var offsets = morphsearch.getBoundingClientRect();
							if (isOpen) {
								classie.remove(morphSearch, 'open');

								// trick to hide input text once the search overlay closes
								// todo: hardcoded times, should be done after transition ends

								if ((document.getElementById('searchbutton').value != null) && (document.getElementById('searchbutton').value !== '')) {
									setTimeout(function () {
										classie.add(morphSearch, 'hideInput');
										setTimeout(function () {
											classie.remove(morphSearch, 'hideInput');
											document.getElementById('searchbutton').value = '';
										}, 300);
									}, 500);
								}

								document.getElementById('searchbutton').blur();
							} else {
								classie.add(morphSearch, 'open');
							}
							isOpen = !isOpen;
						};

					// events
					document.getElementById('searchbutton').addEventListener('click', toggleSearch);
					ctrlClose.addEventListener('click', toggleSearch);
					// esc key closes search overlay
					// keyboard navigation events
					document.addEventListener('keydown', function (ev) {
						var keyCode = ev.keyCode || ev.which;
						if (keyCode === 27 && isOpen) {
							toggleSearch(ev);
						}
					});

				})();
			</script>
			<div id="content" class="row site-content">
