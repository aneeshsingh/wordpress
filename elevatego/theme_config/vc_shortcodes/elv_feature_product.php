<?php
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );

$type = $atts['type'];
$background_data = $atts['background_data'];
$background_video = $atts['background_video'];


$css_class = !empty($css) ? vc_shortcode_custom_css_class( $css ) : '';


if($type == 'right'){
    $type = 'pull-right';
}else{
    $type = 'pull-left';
}
$background_image = elv_find_right_background_image($background_data);
$content = wpb_js_remove_wpautop( apply_filters( 'the_content', $content ), true );
$output = '<div class="container-fluid product-feature">
 <img class="img-responsive feature-background" src="'.wp_get_attachment_url($background_image).'">
	<div class="container l-padding-b-4">
		<div class="row">
			<div class="col-md-6 l-padding-t-5 l-padding-b-3 '.esc_attr($type).'">
				'.$content.'
			</div>
			<div class="col-md-6">
				<!-- fill -->
			</div>

		</div>
	</div>
</div>';
print balanceTags($output);
