<?php
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );

$background_data = $atts['background_data'];
$subheading = $atts['subheading'];
$heading = $atts['heading'];
$btn_link = $atts['btn_link'];
$type = $atts['type'];


$css_class = !empty($css) ? vc_shortcode_custom_css_class( $css ) : '';
$url = vc_build_link( $btn_link );
$main_background_image = elv_find_right_background_image($background_data);

$a_btn_link = array();
$a_btn_link = vc_build_link( $btn_link );
$content = wpb_js_remove_wpautop( apply_filters( 'the_content', $content ), true );
$output = '<div class="container-fluid product-feature dark-gradient-btm" style="background-image: url(\''. esc_url(wp_get_attachment_url($main_background_image)) .'\');">
	<div class="container l-padding-b-4">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-6 l-padding-t-5 l-padding-b-3 pull-'.esc_attr($type).' text-white"">
				<h4>'. esc_attr($subheading) .'</h4>
				<h2>'. esc_attr($heading) .'</h2>
				'. $content.'
				<p><a href="'. esc_url($url['url']) .'" class="btn btn-primary">'.  esc_attr($url['title']) .'</a></p>
			</div>
		</div>
	</div>
</div>';

print balanceTags($output);
