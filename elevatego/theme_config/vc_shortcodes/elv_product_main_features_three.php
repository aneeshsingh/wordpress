<?php
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );

$menu_data = $atts['menu_data'];


$css_class = !empty($css) ? vc_shortcode_custom_css_class( $css ) : '';
//$url = vc_build_link( $link );

$menu_data_s = (array)vc_param_group_parse_atts($menu_data);
$description_string = '';


foreach ($menu_data_s as $menu_data_p) {

	$description_string .= '<div class="col-md-4">
				<div class="col-md-3">
					<br><span class="'.$menu_data_p['icon_typicons'].'"><!-- fill --> </span></div>
				<div class="col-md-9 padding-right-0">
					<h4>'. esc_attr($menu_data_p['name']) .'</h4>
					<p>'. esc_attr($menu_data_p['description']) .'</p>
				</div>
			</div>';
}





$output = '<div class="container-fluid product-feature bg-white">
	<div class="container">
		<div class="row l-padding-t-2 l-padding-b-2">
		'.$description_string.'
		</div>
	</div>
</div>';

print balanceTags($output);

