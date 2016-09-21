<?php
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );

$menu_data = $atts['menu_data'];

$css_class = !empty($css) ? vc_shortcode_custom_css_class( $css ) : '';
//$url = vc_build_link( $link );



$menu_data_s = (array)vc_param_group_parse_atts($menu_data);
$pro = '';

$product_complete_information_array = array();
$product_detail_information_array = array();
$get_all_product_features = array();
$i = 0;
if( !empty($menu_data_s) && is_array($menu_data_s) ) {
	foreach ($menu_data_s as $menu_data_p) {


		$url = vc_build_link($menu_data_p['btn_link'])['url'];
		$product_id = wpcom_vip_url_to_postid(esc_url($url));
		$product_complete_information_array[$i]['product_data'] = elv_get_product_data_from_url_with_image($product_id);
		$product_detail_information_array[$i] = $product_complete_information_array[$i]['product_data'];
		$product_complete_information_array[$i]['icon'] = $menu_data_p['icon_typicons'];
		$product_complete_information_array[$i]['modal_yes_no'] = $menu_data_p['modal_yes_no'];
		$product_complete_information_array[$i]['modal_type'] = $menu_data_p['modal_type'];
		$product_complete_information_array[$i]['modal_link'] = isset($menu_data_p['modal_link']) ? $menu_data_p['modal_link'] : '';

		foreach ($product_complete_information_array[$i]['product_data']['tags'] as $feature_tags) {
			$get_all_product_features[$feature_tags] = $feature_tags;
		}
		$i++;
	}
}


$output_tt_11 = '';
$output_tt_11_a = '';
$output_tt_11_bb = '';
$output_tt_11_c = '';
foreach ($product_detail_information_array as $product_detail_information) {
	$output_tt_11 .= '<tr>
    <td>
        <div class="feature-tile bg-white">
            <div class="tile-head">
                <span class="h4"><span class="text-default">'.html_entity_decode($product_detail_information['title']).'
            </div>
            <div class="tile-body first-col">
                <table width="100%">
                    <tr>
                        <td width="20%">
                            <img src="'. esc_url($product_detail_information['image']) .'"  class="img-responsive"></td>
                        <td width="5%"><!--fill--></td>
                        <td><h3>'.(isset($product_detail_information['tagline'][0]) ? html_entity_decode($product_detail_information['tagline'][0]) : '').'</h3></td>
                    </tr>
                </table>
                <div class="tile-link">
                     <a class="" href="'.(isset($product_detail_information['learnmore'][0]) ? html_entity_decode($product_detail_information['learnmore'][0]) : '#').'">Learn more</a>
                    
                </div>
            </div>
        </div>
    </td>
</tr>

';

	$output_tt_11_a .= '<tr>
    <td>
       '.(isset($product_detail_information['rewards'][0]) ? $product_detail_information['rewards'][0] : '').'
    </td>
</tr>';

	$output_tt_11_bb .= '<tr>
    <td>
        <div class="feature-tile bg-white">
            <div class="tile-body text-center">
                <p>
                    <small><strong>Your Savings</strong></small>
                </p>
                <div class="rate-display rate-sml" id="result-basic-gift">
													<span class="rate-whole"><span class="rate-decimal"><span class="text-success"><h4>
	$ '.(isset($product_detail_information['savings'][0]) ? html_entity_decode($product_detail_information['savings'][0]) : '').'</h4></span></span></span>
                </div>
                <p>
                    <small>waived annual fee</small>
                </p>
            </div>
        </div>
    </td>
</tr>';

	$output_tt_11_c .= '<tr>
    <td>
        <div class="feature-tile bg-white">
            <div class="tile-body text-center">
                <div class="rate-display rate-sml">
                    <a class="btn btn-primary-inverse btn-block" href="'.(isset($product_detail_information['learnmore'][0]) ? html_entity_decode($product_detail_information['learnmore'][0]) : '#').'">Learn more</a>
                    <a class="btn btn-primary btn-block" href="'.(isset($product_detail_information['applynow'][0]) ? html_entity_decode($product_detail_information['applynow'][0]) : '#').'">Apply now</a>
                </div>
            </div>
        </div>
    </td>
</tr>';
}

$output_tt_55 = elv_get_feature_section($get_all_product_features,$product_detail_information_array);





$output ='<div class="container-fluid clearfix bg-white" id="tabCategory">
    <div class="row">
        <ul class="nav nav-tabs center-block">
            <li class="active"><a href="#tab-1" data-toggle="tab">Product Overview</a></li>
            <li><a href="#tab-2" data-toggle="tab">Compare features</a></li>
        </ul>
    </div>
</div>
<div class="container-fluid bg-grey">
    <div class="container">
        <div class="row tab-content">
            <div class="tab-pane active" id="tab-1">
                <div class="table-responsive">
<table class="table comparison-row cards-table" id="card-overview-table">
    <tr>
        <td width="40%" class="cards-table-col-title">
            <table width="100%">
                <tr>
                    <td class="column-heading">&nbsp;</td>
                </tr>
                 '.$output_tt_11.'
            </table>
        </td>
        <td width="15%" class="cards-table-col-rewards">
            <table width="100%">
                <tr>
                    <td class="column-heading text-center">
                        <small>Features</small>
                    </td>
                </tr>
                '.$output_tt_11_a.'
               
            </table>
        </td>
        <td width="15%" class="cards-table-col-savings">
            <table width="100%">
                <tr>
                    <td class="column-heading text-center">
                        <small>Offer</small>
                    </td>
                </tr>
                '.$output_tt_11_bb.'
            </table>
        </td>
        <td width="30%" class="cards-table-col-apply">
            <table width="100%">
                <tr>
                    <td class="column-heading text-center">
                        &nbsp;
                    </td>
                </tr>
                 '.$output_tt_11_c.'
            </table>
        </td>
    </tr>
</table>
                </div>
            </div>

            <div class="tab-pane" id="tab-2">
                <div class="table-responsive">
                    <table class="table comparison-row compare-features" id="comparison-table">
                        <tr>
                            <td width="33.33%" class="table-col-title">
                                <table width="100%">
                                    <tr>
                                        <td class="column-heading">&nbsp;</td>
                                    </tr>

                                    '.$output_tt_11.'
                                </table>
                            </td>

                            '.$output_tt_55.'

                        </tr>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>';
print balanceTags($output);

