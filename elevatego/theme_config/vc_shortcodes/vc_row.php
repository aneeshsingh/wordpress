<?php
/**
 * Shortcode attributes
 * @var $atts
 * @var $el_class
 * @var $full_width
 * @var $full_height
 * @var $content_placement
 * @var $parallax
 * @var $parallax_image
 * @var $css
 * @var $el_id
 * @var $video_bg
 * @var $video_bg_url
 * @var $video_bg_parallax
 * @var $content - shortcode content
 * Shortcode class
 * @var $this WPBakeryShortCode_VC_Row
 */
$output = $after_output = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );

$full_width  = $atts['full_width'];
$gap = $atts['gap'];
$full_height = $atts['full_height'];
$columns_placement  = $atts['columns_placement'];
$equal_height  = $atts['equal_height'];
$content_placement  = $atts['content_placement'];
$video_bg = $atts['video_bg'];
$video_bg_url  = $atts['video_bg_url'];
$video_bg_parallax  = $atts['video_bg_parallax'];
$parallax  = $atts['parallax'];
$parallax_image  = $atts['parallax_image'];
$parallax_speed_video = $atts['parallax_speed_video'];
$parallax_speed_bg = $atts['parallax_speed_bg'];
$el_id = $atts['el_id'];

if(isset($atts['disable_element'])){
	$disable_element  = $atts['disable_element'];
}
$el_class  = $atts['el_class'];
$css = $atts['css'];
$anchor_id = $atts['anchor_id'];

wp_enqueue_script( 'wpb_composer_front_js' );

$wrapper_attributes = array();

$el_class = $this->getExtraClass( $el_class );

$full_height = !empty($full_height) ? 'full-height' : '';
$content_placement = !empty($full_height) && $content_placement === 'middle' ? 'middle-content' : '';

if ( ! empty( $el_id ) ) {
	$wrapper_attributes[] = 'id="' . esc_attr( $el_id ) . '"';
}

if ( ! empty( $anchor_id ) ) {
	$wrapper_attributes[] = 'data-anchor="' . esc_attr( $anchor_id ) . '"';
}

$has_video_bg = ( ! empty( $video_bg ) && ! empty( $video_bg_url ) && vc_extract_youtube_id( $video_bg_url ) );

$video_bg = '';
if ( $has_video_bg ) {
	$parallax = $video_bg_parallax;
	$parallax_image = $video_bg_url;
	$video_bg = 'vc_video-bg-container';
	wp_enqueue_script( 'vc_youtube_iframe_api_js' );
}

if ( ! empty( $parallax ) ) {
	wp_enqueue_script( 'vc_jquery_skrollr_js' );
	$wrapper_attributes[] = 'data-vc-parallax="1.5"'; // parallax speed
	$css_classes[] = 'vc_general vc_parallax vc_parallax-' . $parallax;
	if ( strpos( $parallax, 'fade' ) !== false ) {
		$css_classes[] = 'js-vc_parallax-o-fade';
		$wrapper_attributes[] = 'data-vc-parallax-o-fade="on"';
	} elseif ( strpos( $parallax, 'fixed' ) !== false ) {
		$css_classes[] = 'js-vc_parallax-o-fixed';
	}
}

$parallax_class = !empty( $parallax ) ? 'paralax-section' : '';

if ( ! empty ( $parallax_image ) ) {
	if ( $has_video_bg ) {
		$parallax_image_src = $parallax_image;
	} else {
		$parallax_image_id = preg_replace( '/[^\d]/', '', $parallax_image );
		$parallax_image_src = wp_get_attachment_image_src( $parallax_image_id, 'full' );
		if ( ! empty( $parallax_image_src[0] ) ) {
			$parallax_image_src = $parallax_image_src[0];
		}
	}
	$wrapper_attributes[] = 'data-vc-parallax-image="' . esc_attr( $parallax_image_src ) . '"';
}
if ( ! $parallax && $has_video_bg ) {
	$wrapper_attributes[] = 'data-vc-video-bg="' . esc_attr( $video_bg_url ) . '"';
}

$section_data = implode(' ', $wrapper_attributes);

$col_gap = !empty($atts['gap']) ? 'vc_column-gap-'.$atts['gap'] : '';

$tt_css = array(
		vc_shortcode_custom_css_class( $css ),
		'vc_row',
		$video_bg,
		$full_height,
		$parallax_class,
		$content_placement,
		$el_class,
		$col_gap
	);

$tt_css = implode(' ', $tt_css);

switch ($full_width) {
	case 'stretch_row':
		printf('<section class="section %s" %s><div class="container"><div class="row">%s</div></div></section>', $tt_css, $section_data, wpb_js_remove_wpautop( $content ));
		break;

	case 'stretch_row_content':
		printf('<section class="section %s" %s><div class="container-fluid"><div class="row">%s</div></div></section>', $tt_css, $section_data, wpb_js_remove_wpautop( $content ));
		break;

	case 'stretch_row_content_no_spaces':
		printf('<section class="section ovh %s" %s><div class="container-fluid no-padding"><div class="row row-fit">%s</div></div></section>', $tt_css, $section_data, wpb_js_remove_wpautop( $content ));
		break;
	
	default:
		printf('<div class="row %s" %s>%s</div>', $tt_css, $section_data, wpb_js_remove_wpautop( $content ));
		break;
}