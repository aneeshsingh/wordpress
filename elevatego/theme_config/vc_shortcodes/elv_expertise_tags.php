<?php
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );


$background_data = $atts['background_data'];

$css_class = !empty($css) ? vc_shortcode_custom_css_class( $css ) : '';

$filter_main_tag = '';

if(isset($_GET['title_tag'])) {

	$temp_oject = get_tag($_GET['title_tag']);
	if(is_object($temp_oject)){
		$filter_main_tag = $temp_oject->name;
	}


}

$background_image = elv_find_right_background_image($background_data);

$html = '<div class="container-fluid bg-white l-padding-b-2" style="background-image: url('.wp_get_attachment_url($background_image).'); min-height:400px;background-repeat: no-repeat;background-size: cover;" >
	<div class="container">
		<div class="col-md-12 l-padding-b-2 pull-up-1-5em">
			<div class="col-md-2 feature-expertise-label">Browsing tag:</div>
		</div>
		<div class="col-md-12 center-block text-center"><h3>"' . esc_attr($filter_main_tag) . '"</h3></div>
	</div>
</div>
';

print balanceTags($html);


