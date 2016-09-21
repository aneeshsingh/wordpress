<?php
$atts = vc_map_get_attributes($this->getShortcode(), $atts);

$light_dark = $atts['light_dark'];
$background_data = $atts['background_data'];
$apply_now_link = $atts['apply_now_link'];
$product_link = $atts['product_link'];
$product_type = $atts['product_type'];


$css_class = !empty($css) ? vc_shortcode_custom_css_class($css) : '';
$url = vc_build_link($apply_now_link);

$main_background_image = elv_find_right_background_image($background_data);

$url_product = vc_build_link($product_link);

if (function_exists('bcn_display')) {
	$breadcrumb = bcn_display(true);
}

switch($light_dark) {
	case "dark":
		$light_dark = "text-white";
		break;
	default:
		$light_dark = "text-default";
		break;
}

$output = '<div class="product-hero l-padding-b-3 l-padding-t-3">';
$output .= '<div class="vertical-tab-bg">';
$output .= '<div class="vertical-tab-bgimg light-gradient-top active">';
$output .= '<img class="hero-image-sim img-responsive" src="' . esc_url(wp_get_attachment_url($main_background_image)) . '" />';
$output .= '</div>';
$output .= '</div>';

/* Breadcrumb area */
$output .= '<div class="container"><ol class="breadcrumb ' . esc_attr($light_dark) . '" typeof="BreadcrumbList" vocab="http://schema.org/">' . $breadcrumb . '</ol></div>';

$output .= '<div class="container l-padding-b-1">';
$output .= '<div class="col-md-12"><div class="row">';
$output .= '<div class="col-md-6 hero-area ' . esc_attr($light_dark) . '">';
$output .= wpb_js_remove_wpautop(apply_filters('the_content', $content), true);
$output .= '<p>';
if ($url['url'] != '') {
	$output .= '<div class="pull-left margin-right-20"><a href="' . esc_url($url['url']) . '" class="btn btn-primary">' . esc_attr($url['title']) . '</a></div>';
}
if ($url_product['url'] != '') {
	$output .= '<div class="pull-left"><a href="' . esc_url($url_product['url']) . '" target="' . esc_attr($url_product['target']) . '" class="btn btn-primary-inverse">' . esc_attr($url_product['title']) . '</a></div>';
}
$output .= '</p>';
$output .= '</div></div>';
$output .= '</div>';
$output .= '</div>';
$output .= '</div>';

print balanceTags($output);
