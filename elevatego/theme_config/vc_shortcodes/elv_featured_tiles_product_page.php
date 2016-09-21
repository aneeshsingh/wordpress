<?php
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );

$tile_url = $atts['tile_url'];
$background_data = $atts['background_data'];

$css_class = !empty($css) ? vc_shortcode_custom_css_class( $css ) : '';


$tile_url = vc_build_link( $tile_url );
$tileid = wpcom_vip_url_to_postid(esc_url($tile_url['url']));


$content_post = get_post($tileid);

$content_of_the_post = '';
if(is_object($content_post)){
    $content_of_the_post =  $content_post->post_content;
}

$o_cat = null;
$o_cat = get_the_category($tileid);


$a_cat = array();
if (!empty($o_cat)) {
    foreach ($o_cat as $o) {
        $a_cat[] = esc_html($o->name);
    }
}

$s_cat = '';
$s_cat = implode(', ', $a_cat);

$s_class_color = '';
$s_class_color = get_post_meta($tileid, 'elv_tiles_class', true);

$s_link = '';
$s_link = get_post_meta($tileid, 'elv_tiles_link', true);

$s_inline_style = '';
$s_featured_img_url = '';
$s_featured_img_url = get_the_post_thumbnail_url($tileid);

if ($s_featured_img_url != '') {
    $s_inline_style = ' src="' . $s_featured_img_url . '"';
}

$output = '<div class="container-fluid bg-white l-padding-t-2 l-padding-b-2">
	<div class="container tile-columns static-columns">
		<div class="column-content"><div class="grid-sizer col-md-4"></div>';



$output .= '<div class="grid-item animate col-md-4 l-padding-b-1">
				<div class="' . esc_attr($s_class_color) . ' feature-tile fixed-height-620">
					<div class="tile-head"><span class="h4">' . esc_attr($s_cat) . '</span></div>
					<div class="tile-body tiles-product-streched">
					' . $content_post->post_content . '
					</div>
				</div>
			</div>';

$menu_data_s = (array) vc_param_group_parse_atts( $background_data );
$products_pages = '';
    foreach ($menu_data_s as $menu_data_p) {
        $url = vc_build_link( $menu_data_p['btn_link']);
        $output .= '<div class="grid-item animate col-md-4 l-padding-b-1">
				<div class="feature-tile fixed-height-300 dark-gradient-btm" style="background-image: url(' . esc_url(wp_get_attachment_url($menu_data_p['background_image'])) . ');">
					<div class="tile-head"><span class="h4">Featured promotion</span></div>
					<div class="tile-body">
						<h3 class="text-white">
        ' . esc_attr($menu_data_p['tile_heading']) . '
        </h3>
						<p class="text-white">'.$menu_data_p['tile_description'].'</p>
						<div class="tile-link text-white">
							<a href="'.esc_url($url['url']).'" class="" title="'.esc_attr($url['title']).'" target="'.( strlen( $url['target'] ) > 0 ? esc_attr( $url['target'] ) : '_self').'">'.esc_attr($url['title']).'</a>
						</div>
					</div>
				</div>
			</div>';
    }


$output .= '</div>
	</div>
</div>';
print balanceTags($output);
