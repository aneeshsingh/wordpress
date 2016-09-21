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

		$url = '';
		if( isset($menu_data_p['btn_link']) && is_array(vc_build_link($menu_data_p['btn_link'])) ) {
			$url = vc_build_link($menu_data_p['btn_link'])['url'];
		}
		$product_id = wpcom_vip_url_to_postid(esc_url($url));
		$product_complete_information_array[$i]['product_data'] = elv_get_product_data_from_url($product_id);
		$product_detail_information_array[$i] = $product_complete_information_array[$i]['product_data'];
		$product_complete_information_array[$i]['icon'] = $menu_data_p['icon_typicons'];
		$product_complete_information_array[$i]['modal_yes_no'] = $menu_data_p['modal_yes_no'];
		$product_complete_information_array[$i]['modal_type'] = $menu_data_p['modal_type'];
		$product_complete_information_array[$i]['modal_link'] = isset($menu_data_p['modal_link']) ? $menu_data_p['modal_link'] : '';

		if( isset($product_complete_information_array[$i]['product_data']['tags']) ) {
			foreach ($product_complete_information_array[$i]['product_data']['tags'] as $feature_tags) {
				$get_all_product_features[$feature_tags] = $feature_tags;
			}
		}
		$i++;
	}
}

$output_tt_11 = elv_get_tab_1_left_most_column($product_detail_information_array);
$output_tt_22 = elv_get_tab_1_right_column ($product_complete_information_array);
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
                    <table class="table comparison-row" id="repayments-table">
                        <tr>
                            <td width="40%" class="table-col-title">
                                <table width="100%">
                                    <tr>
                                        <td class="column-heading">&nbsp;</td>
                                    </tr>

                                   '.$output_tt_11.'

                                </table>
                            </td>
                            <td width="60%" class="table-col-title">
                                <table width="100%">
                                    <tr>
                                        <td class="column-heading">&nbsp;</td>
                                    </tr>
                                    '.$output_tt_22.'

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

