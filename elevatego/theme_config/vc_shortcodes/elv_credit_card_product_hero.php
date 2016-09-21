<?php
$atts = vc_map_get_attributes($this->getShortcode(), $atts);

$btn_link = $atts['btn_link'];
$green_border_heading_box_1 = $atts['green_border_heading_box_1'];
$green_border_price_box_1 = $atts['green_border_price_box_1'];
$green_border_description_1 = $atts['green_border_description_1'];
$icon_typicons = $atts['icon_typicons'];
$green_border_heading_box_2 = $atts['green_border_heading_box_2'];
$green_border_price_box_2 = $atts['green_border_price_box_2'];

$green_border_description_2 = $atts['green_border_description_2'];
$background_image = $atts['background_image'];


$content = wpb_js_remove_wpautop(apply_filters('the_content', $content), true);

$css_class = !empty($css) ? vc_shortcode_custom_css_class($css) : '';
$url = vc_build_link($btn_link);

$output = '<div class="container l-padding-t-1 l-padding-b-1">
		<div class="row product-feature offer-info">
			<div class="col-md-6 col-sm-8 col-xs-12 l-padding-t-2 l-padding-b-3">
				<div class="bg-white-90 top-border-primary offer-body">
					' . $content . '
					<a href="' . esc_url($url['url']) . '" class="btn btn-success" title="' . esc_attr($url['title']) . '" target="' . (strlen($url['target']) > 0 ? esc_attr($url['target']) : '_self') . '">' . esc_attr($url['title']) . '</a>
				</div>
			</div>
			<div class="col-md-6 col-sm-4 col-xs-12 l-padding-t-2 l-padding-b-3">
			
				<div class="col-md-8 col-sm-12 hidden-xs col-md-offset-2 text-center offer-body-small-top">
					<img src="' . esc_url(wp_get_attachment_url($background_image)) . '" class="img-responsive margin-auto" ></div>
				<div class="col-md-6 col-sm-12 col-xs-6 sm-margin-b-1">
					<div class="col-md-12 bg-white-90 top-border-success text-center offer-body-small-bottom">
						<h4>' . esc_attr($green_border_heading_box_1) . '</h4>
						<div class="rate-display rate-sml text-success">' . esc_attr($green_border_price_box_1) . '</div>
						<p class="lead">' . esc_attr($green_border_description_1) . '</p>
					</div>
				</div>
				<div class="col-md-6 col-sm-12 col-xs-6">
					<div class="col-md-12 bg-white-90 top-border-success text-center offer-body-small-bottom">
						<h4>' . esc_attr($green_border_heading_box_2) . '</h4>
						<span class="rate-display ' . $icon_typicons . '"><!-- fill --></span>
						<span class="rate-display rate-sml text-success">' . esc_attr($green_border_price_box_2) . '</span>
						<p class="lead">' . esc_attr($green_border_description_2) . '</p>
					</div>
				</div>
			
			</div>
		</div>
	</div>';

print balanceTags($output);

