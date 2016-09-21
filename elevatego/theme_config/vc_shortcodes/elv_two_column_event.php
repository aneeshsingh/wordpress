<?php
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );

$link = $atts['link'];
$el_class = $atts['el_class'];
$background_data = $atts['background_data'];
$border_color = $atts['border_color'];

$css_class = !empty($css) ? vc_shortcode_custom_css_class( $css ) : '';
$url = vc_build_link( $link );


if(!$border_color){
    $border_color = 'transparent';
}
$template_dir = get_template_directory_uri();

$main_background_image = elv_find_right_background_image($background_data);

$content = wpb_js_remove_wpautop( apply_filters( 'the_content', $content ), true );

$output = '
<div class="container-fluid bg-grey l-padding-t-2 l-padding-b-2">
	<div class="container bg-white promo-feature ">
		<div class="row">

			<div class="col-md-6 pull-left promo-feature-chat">
				'. $content .'
				<div class="learn-more-event-position">
			
				<a href="' . esc_url($url['url']) . '" class="btn btn-success learn-more" title="' . esc_attr($url['title']) . '" target="' . (strlen($url['target']) > 0 ? esc_attr($url['target']) : '_self') . '">' . esc_attr($url['title']) . '</a>
			</div>
			</div>
			<div class="col-md-6 full-image pull-right featured-image-widget  promo-feature-chat" style="background-image: url('. esc_url(wp_get_attachment_url($main_background_image)) .'); ">
			</div>
			
		</div>
	</div>
</div>';


print balanceTags($output);
