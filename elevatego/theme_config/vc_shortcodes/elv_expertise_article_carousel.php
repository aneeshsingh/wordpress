<?php
$atts = vc_map_get_attributes($this->getShortcode(), $atts);

$filter[0]['parent_name'] = $atts['filter1'];
$filter[1]['parent_name'] = $atts['filter2'];
$filter[2]['parent_name'] = $atts['filter3'];
$filter[3]['parent_name'] = $atts['filter4'];
$number_of_tiles = $atts['number_of_tiles'];
$s_tiles = '';
$s_tiles .= elv_generate_expertise_carousel_tiles($filter, $number_of_tiles);

/* Get repayments calc javascript file*/

$output = '<div class="container-fluid l-padding-b-3 l-padding-t-3">
	<div class="row">
		<div class="container tile-columns">
			<div class="tile-carousel">' . $s_tiles . '</div>
		</div>
	</div>
	<div class="row l-padding-t-1">
		<div class="container">
			<div class="col-md-12 text-center"><a href="' . esc_url(get_home_url()) . '/expertise-hub">More articles suggested for you</a></div>
		</div>
	</div>
</div>';
$output .= '<script type="text/javascript">
	jQuery(document).ready(function () {
		jQuery(\'.tile-carousel\').slick({
			prevArrow: \'<button type="button" data-role="none" class="slick-prev" aria-label="Previous" tabindex="0" role="button"><span class="picon picon-chevron-left"><!--fill--></span></button>\',
			nextArrow: \'<button type="button" data-role="none" class="slick-next" aria-label="Next" tabindex="0" role="button"><span class="picon picon-chevron-right"><!--fill--></span></button>\',
			centerMode: true,
			centerPadding: \'60px\',
			slidesToShow: 12,
			dots: false,
			infinite: true,
			variableWidth: true,
			responsive: [
				{
					breakpoint: 1200,
					settings: {
						arrows: true,
						centerMode: true,
						centerPadding: \'40px\',
						slidesToShow: 2
					}
				},
				{
					breakpoint: 768,
					settings: {
						arrows: true,
						centerMode: true,
						centerPadding: \'40px\',
						slidesToShow: 1
					}
				},
				{
					breakpoint: 480,
					settings: {
						arrows: false
					}
				}
			]
		});
	});
</script>';

print balanceTags($output);

