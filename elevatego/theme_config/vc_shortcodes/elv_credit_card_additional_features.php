<?php
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );

$menu_data = $atts['menu_data'];
$subtitle = $atts['subtitle'];
$heading = $atts['heading'];

$css_class = !empty($css) ? vc_shortcode_custom_css_class( $css ) : '';
//$url = vc_build_link( $link );

$link_tabs = '';

$menu_data_s = (array)vc_param_group_parse_atts($menu_data);
$description_string = '';
$active = 0;
$active_class = 'active';
$tabNo = 1;
foreach ($menu_data_s as $menu_data_p) {
	if($active > 0){
		$active_class = '';
	}
	$link_tabs .= '<a href="#" class="list-group-item '.esc_attr($active_class).'" rel="tab'.esc_attr($tabNo).'">
							<div class="icon"><span class="'.esc_attr($menu_data_p['icon_typicons']).'"></span></div>
							<div class="caption"><h4>'. esc_attr($menu_data_p['name']) .'</h4></div>
						</a> ';
	$description_string .= '<a href="#" class="mb-vertical-tab-menu hidden-lg hidden-md '.esc_attr($active_class).'" rel="tab'.esc_attr($tabNo).'"> <span class="'.esc_attr($menu_data_p['icon_typicons']).'"> </span>'. esc_attr($menu_data_p['name']) .'</a>
					<div id="tab'.esc_attr($tabNo).'" class="vertical-tab-content lr-padding-3 dark-gradient-btm '.esc_attr($active_class).'" style="background: url('. esc_url(wp_get_attachment_url($menu_data_p['background_image'])) .');">
						<div class="vertical-tab-text">
						<h3>'. html_entity_decode($menu_data_p['name']) .'</h3>
						<p class="">'. html_entity_decode($menu_data_p['description']) .'</p>
						</div>
					</div>';
	$active++;
	$tabNo++;
}

$custom_js_path = esc_url(get_template_directory_uri().'/js/elevate-wp_product-carousel.js');

$r = '<div class="container-fluid bg-grey">
	<div class="container l-padding-t-2">
		<h4>'. esc_attr($subtitle).'</h4>
		<h2>'. esc_attr($heading).'</h2>
	</div>
	<div class="container l-padding-b-2">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12 vertical-tab-container additional-features">
				<div class="col-md-3 hidden-sm hidden-xs vertical-tab-menu">
					<div class="list-group">
					'.$link_tabs.'
					</div>
				</div>
				<div class="col-md-9 col-sm-12 col-xs-12 vertical-tab">
					'. html_entity_decode($description_string) .'
				</div>
			</div>
		</div>
	</div>
</div><script src="'.$custom_js_path.'"></script>';
print balanceTags($r);


