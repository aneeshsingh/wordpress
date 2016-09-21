<?php
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );

$bg_color = $atts['bg_color'];
$menu_headings = $atts['menu_headings'];

$css_class = !empty($css) ? vc_shortcode_custom_css_class( $css ) : '';
//$url = vc_build_link( $link );


$menu_data_s = (array)vc_param_group_parse_atts($menu_headings);
$description_string = '';
$active = 0;
$active_class = 'active';
foreach ($menu_data_s as $menu_data_p) {
    if($active > 0){
        $active_class = '';
    }
    $description_string .= '
    
    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 sub-navigation-boxtile '.esc_attr($active_class).' text-center l-padding-t-1 l-padding-b-1">
				
			<a href="#'.esc_attr($menu_data_p['target_id']).'" class="anchor-link">	
					<div class="sub-navigation-boxtile-icon">
						<span class="'.esc_attr($menu_data_p['icon_fontawesome']).'"></span>
					</div>
					<div class="sub-navigation-boxtile-text">
                '.esc_attr($menu_data_p['name']).'
                </div>
					<div class="sub-navigation-boxtile-chevron">
						<span class="picon picon-chevron-down"><!-- fill --></span></div>
				</a>
			</div>';
    $active++;
}

$output = '<div class="container-fluid bg-white sub-navigation anchor-links">
	<div class="container">
		<div class="row text-center">
           '. $description_string .'
		</div>
	</div>
</div>';
print balanceTags($output);
