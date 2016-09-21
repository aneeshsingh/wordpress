<?php
$atts = vc_map_get_attributes($this->getShortcode(), $atts);

$main_heading = $atts['main_heading'];
$sub_heading = $atts['sub_heading'];
$background_data = $atts['background_data'];


$css_class = !empty($css) ? vc_shortcode_custom_css_class($css) : '';
//$url = vc_build_link( $link );


$menu_data_s = (array)vc_param_group_parse_atts($background_data);
$description_string = '';


foreach ($menu_data_s as $menu_data_p) {

	$url = vc_build_link($menu_data_p['btn_link']);

	$description_string .= '<div class=" col-md-6 l-padding-b-1">
		<div class="bg-blue feature-tile fixed-height-420 dark-gradient-btm" style="background-image: url(' . esc_url(wp_get_attachment_url($menu_data_p['background_image'])) . ');">
			<div class="tile-body">
				<a href="' . esc_url($url['url']) . '" class="" title="' . esc_attr($url['title']) . '" target="' . (strlen($url['target']) > 0 ? esc_attr($url['target']) : '_self') . '">
					<h3 class="text-white">
						' . esc_attr($menu_data_p['tile_heading']) . '
					</h3>
					<p class="text-white">' . html_entity_decode($menu_data_p['tile_description']) . '</p>
				</a>
				<div class="tile-link text-white">
					<a href="' . esc_url($url['url']) . '" class="" title="' . esc_attr($url['title']) . '" target="' . (strlen($url['target']) > 0 ? esc_attr($url['target']) : '_self') . '">' . esc_attr($url['title']) . '</a>
				</div>
			</div>
		</div>
	</div>';


}


$output = '<div class="container-fluid bg-grey l-padding-t-2 l-padding-b-2">
	<div class="container tile-columns static-columns">
		<div class="row column-content"><div class="grid-sizer col-md-6"></div>
		<h3>' . esc_attr($main_heading) . '</h3>
		<h2>' . esc_attr($sub_heading) . '</h2>
		' . $description_string . '
		</div>
	</div>
</div>';

print balanceTags($output);

