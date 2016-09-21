<?php
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );


$filter_main_tag =  'bank';
if(isset($_GET['tile_tag'])){
	$filter_main_tag = get_tag($_GET['tile_tag'])->name;
}

$s_tiles = '';

$s_tiles .= '<div class="container-fluid bg-white sub-navigation anchor-links">
	<div class="container">
		<div class="row text-center"></div>
	</div>
</div>
<div class="container-fluid">
	<div class="container">
<div class="row l-padding-t-2 l-padding-b-2 column-content"><div class="grid-sizer col-md-4"></div>';



$s_tiles .= elv_generate_expertise_param_tiles($filter_main_tag, 100);


wp_reset_postdata();

$s_tiles .= '	</div>' . PHP_EOL . '</div>';


print balanceTags($s_tiles);

