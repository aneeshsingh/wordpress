<?php
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );

$link = $atts['link'];
$type = $atts['type'];
$background_data = $atts['background_data'];

$css_class = !empty($css) ? vc_shortcode_custom_css_class( $css ) : '';
$url = vc_build_link( $link );

if($type == 'right'){
    $type = 'pull-right';
}else{
    $type = 'pull-left';
}

$persona = 1;

$content = wpb_js_remove_wpautop( apply_filters( 'the_content', $content ), true );

$main_background_image = elv_find_right_background_image($background_data);


$output = '<div class="container-fluid product-feature">
 <img class="img-responsive feature-background hidden-xs" src="'.wp_get_attachment_url($main_background_image).'">
	<div class="container">
		<div class="row l-padding-t-5 l-padding-b-5">
		    <div class="col-xs-12 hidden-sm hidden-md hidden-lg bg-white"><img class="img-responsive" src="'.wp_get_attachment_url($main_background_image).'"></div>
			<div class="col-md-6 col-sm-8 col-xs-12 bg-white l-padding-b-1 '.esc_attr($type).'">
				'.$content.'
                 <div>
				<a href="'.esc_url($url['url']).'" class="btn btn-default" title="'.esc_attr($url['title']).'" target="'.( strlen( $url['target'] ) > 0 ? esc_attr( $url['target'] ) : '_self').'">'.esc_attr($url['title']).'</a>
                   </div>
			</div>
			<div class="col-md-6">
				<!-- fill -->
			</div>

		</div>
	</div>
</div>';
print balanceTags($output);
