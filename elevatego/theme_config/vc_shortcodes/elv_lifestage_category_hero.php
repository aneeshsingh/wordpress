<?php
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );

$light_dark = $atts['light_dark'];
$background_data = $atts['background_data'];
$heading = $atts['heading'];
$background_video = $atts['background_video'];
$link = $atts['link'];

$css_class = !empty($css) ? vc_shortcode_custom_css_class( $css ) : '';
$url = vc_build_link( $link );

$background_image = elv_find_right_background_image($background_data);

$user_id = '1';
$user_id = elv_get_persona_id();

$user_followed_author = get_post_meta($user_id, 'elv_personalisations_authors');
$user_followed_authors = array();
if (isset($user_followed_author[0]) && $user_followed_author[0] != '') {
	$user_followed_authors = explode('|', $user_followed_author[0]);
}

$author_id = get_post_meta(get_the_ID(), 'elv_posts_authors');
$author_id_value = 295;
if (isset($author_id[0]) && $author_id[0] != '') {
	$author_id_value = $author_id[0];
}

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

$content = wpb_js_remove_wpautop( apply_filters( 'the_content', $content ), true );

$output = '
    <div class="container l-padding-b-3 l-padding-t-3">
		<div class="container"><div class="row"><ol class="breadcrumb ' . esc_attr($light_dark) . '" typeof="BreadcrumbList" vocab="http://schema.org/">'.$breadcrumb.'</ol></div></div>
		<div class="row">
			<div class="col-md-5 '.esc_attr($light_dark).'">
				<div class="hero-area">
					<h1>' . esc_attr($heading) . '</h1>
					' . $content . '
				</div>
			</div>
		</div>
	</div>
	<div class="vertical-tab-bg">
		<div class="vertical-tab-bgimg active">';
if(!$background_video){
	$output .= '<div class="vertical-tab-bgimg light-gradient-top active">';
	$output .= '<img class="hero-image-sim img-responsive" src="'. esc_url(wp_get_attachment_url($background_image)) .'" />';
	$output .= '</div>';
} else {
	$output .= '<div id="bg-video-container">';
	$output .= '<iframe id="bg" src="https://www.youtube.com/embed/'. esc_url($background_video).'?autoplay=1&amp;playlist='.esc_url($background_video).'&amp;controls=0&amp;loop=1" frameborder="0"></iframe>';
	$output .= '</div>';
}

$output .= '</div>
	</div>';

print balanceTags($output);
