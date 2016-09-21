<?php
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );

$btn_link = $atts['btn_link'];
$type = $atts['type'];
$background_data = $atts['background_data'];
$button_type = $atts['button_type'];

$css_class = !empty($css) ? vc_shortcode_custom_css_class( $css ) : '';
$url = vc_build_link( $btn_link );
$bg_image = elv_find_right_background_image($background_data);



if($button_type == 'primary'){
	$button_type = 'btn-primary';
}else{
	$button_type = 'btn-success';
}
/**
 * promo-feature
 *  l-padding-t-2 l-padding-b-2
 * <img src="'. wp_get_attachment_url($bg_image).'" class="img-responsive" />
 */
$content = wpb_js_remove_wpautop( apply_filters( 'the_content', $content ), true );
$putput = '<div class="container-fluid bg-white promo-feature remove-added-margin">
	<div class="container bg-white ">
		<div class="row">
			<div class="col-md-6 full-image pull-right featured-image-widget" style="background-image: url('. esc_url(wp_get_attachment_url($bg_image)) .');">
				
			</div>
			<div class="col-md-6 pull-left">
				'.$content.'</p>
				<p class="l-padding-t-1">
					<a href="' . esc_url($url['url']) . '" class="btn '.esc_attr($button_type).'" title="' . esc_attr($url['title']) . '" target="' . (strlen($url['target']) > 0 ? esc_attr($url['target']) : '_self') . '">' . esc_attr($url['title']) . '</a>
			</div>
		</div>
	</div>
</div>';

print balanceTags($putput);
