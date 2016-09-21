<?php
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );

$type = $atts['type'];

$css_class = !empty($css) ? vc_shortcode_custom_css_class( $css ) : '';
//$url = vc_build_link( $link );
$content = wpb_js_remove_wpautop( apply_filters( 'the_content', $content ), true );
if($type == 'blue'){
	$type = 'top-border-primary';
}else{
	$type = 'top-border-success';
}


$r = '
<div class="product-feature offer-info">
	<div class="l-padding-t-3 l-padding-b-3">
		<div class="bg-white-90 '.esc_attr($type).' offer-body">
			'. $content .'
		</div>	
	</div>
</div>' . PHP_EOL;

print balanceTags($r);

