<?php
$atts = vc_map_get_attributes($this->getShortcode(), $atts);

$heading = $atts['heading'];
$description = $atts['description'];
$background_data = $atts['background_data'];
$background_video = $atts['background_video'];
$menu_data = $atts['menu_data'];



$css_class = !empty($css) ? vc_shortcode_custom_css_class($css) : '';
//$url = vc_build_link( $link );

$menu_data_s = (array)vc_param_group_parse_atts($menu_data);
$background_image = elv_find_right_background_image($background_data);
$description_string = '';

$i = 0;

$counter = count($menu_data_s);

foreach ($menu_data_s as $menu_data_p) {

    if($i==0) {
        $description_string = $description_string . '<div id="modelse-' . $i . '" class="row l-padding-b-2">';
    } elseif (!($i % 2)) {
        $description_string = $description_string . '</div><div id="modif-'.$i.'" class="row l-padding-b-2">';
    }

    $description_string = $description_string . '
<div class="col-md-1 col-sm-1 col-xs-2"><br/><span class="' . $menu_data_p['icon_typicons'] . '"><!-- fill --> </span></div>
<div class="col-md-5 col-sm-5 col-xs-10">
<h4>' . esc_attr($menu_data_p['name']) . '</h4>
<p>' . str_replace(",", "",$menu_data_p['Description']) . '
</div>';
    $i++;
}

$output = '<div class="container-fluid product-feature">
<img class="img-responsive feature-background hidden-sm hidden-xs" src="' . esc_url(wp_get_attachment_url($background_image)) . '">
<div class="container">
<div class="row l-padding-t-2 l-padding-b-2">
<div class="col-md-9">
<h4>' . esc_attr($heading) . '</h4>
<h2>' . esc_attr($description) . '</h2>
' . $description_string . '
</div>
</div>
</div>
</div>
</div>';

print balanceTags($output);
