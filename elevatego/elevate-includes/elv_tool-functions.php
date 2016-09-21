<?php

/** This file contains all the tool functions */

/**
 * @param $product_id
 * @return mixed
 *
 * Bank Accounts
 *
 */

function elv_get_product_data_from_url($product_id)
{

	$product_details['id'] = $product_id;
	$product_details['title'] = get_the_title($product_id);

	$content_post = get_post($product_id);
	$product_details['content'] = $content_post->post_content;

	$product_details['tags'] = elv_get_tag_names(get_the_tags($product_id));
	$product_details['tagline'] = get_post_meta($product_id, 'elv_product_features_tagline');
	$product_details['learnmore'] = get_post_meta($product_id, 'elv_product_features_learn_more');
	$product_details['applynow'] = get_post_meta($product_id, 'elv_product_features_apply_now');

	return $product_details;
}

/**
 * @param $posttags
 * @return array
 *
 * Bank Accounts
 *
 */
function elv_get_tag_names($posttags)
{
	$tag_names = array();
	if ($posttags) {
		foreach ($posttags as $tag) {

			if ($tag->description == '') {
				$tag_names[] = $tag->name;
			} else {
				$tag_names[] = $tag->description;
			}
		}
	}

	return $tag_names;
}

/**
 * @param $tag_name
 * @return mixed
 *
 * Bank Accounts
 *
 *
 */
function elv_convert_tags_to_anchors($tag_name)
{

	$final_tag_name = $tag_name;
	if (strpos($tag_name, '{') !== false) {

		$starting_index = strpos($tag_name, '{');

		$anchor_id = substr($tag_name, $starting_index + 1, 1);

		$replaced_string = '{' . $anchor_id . '}';

		$replacement_string = '<a href="#footnote-' . esc_attr(loopAndEncode($anchor_id)) . '" class="disclaimer-link"><sup>' . esc_attr($anchor_id) . '</sup></a>';

		$final_tag_name = str_replace($replaced_string, $replacement_string, $tag_name);

		return $final_tag_name;
	} else {
		return $final_tag_name;
	}

}

/**
 * @param $product_id
 * @return mixed
 *
 * Credit Cards
 *
 */
function elv_get_product_data_from_url_with_image($product_id)
{

	$product_details['id'] = $product_id;
	$product_details['title'] = get_the_title($product_id);

	$content_post = get_post($product_id);
	$product_details['content'] = $content_post->post_content;

	$product_details['tags'] = elv_get_tag_names(get_the_tags($product_id));
	$product_details['tagline'] = get_post_meta($product_id, 'elv_product_features_tagline');
	$product_details['learnmore'] = get_post_meta($product_id, 'elv_product_features_learn_more');
	$product_details['applynow'] = get_post_meta($product_id, 'elv_product_features_apply_now');
	$product_details['rewards'] = get_post_meta($product_id, 'elv_product_features_rewards');
	$product_details['savings'] = get_post_meta($product_id, 'elv_product_features_your_savings');
	$product_details['image'] = wp_get_attachment_url(get_post_thumbnail_id($product_id));

	return $product_details;
}

function elv_get_tab_1_left_most_column($product_detail_information_array)
{
	$output_tt_11 = '';
	foreach ($product_detail_information_array as $product_detail_information) {
		$output_tt_11 .= '<tr>
    <td>
        <div class="feature-tile bg-white">
            <div class="tile-head">
                <span class="h4">' . esc_attr($product_detail_information['title']) . '</span>
            </div>
            <div class="tile-body first-col">
                <h3>' . (isset($product_detail_information['tagline'][0]) ? html_entity_decode($product_detail_information['tagline'][0]) : '') . '</h3>
                <div class="tile-link">
                    <div class="col-xs-6 col-sm-6 col-md-5"><div class="row"><a class="btn btn-primary btn-block" href="' . (isset($product_detail_information['applynow'][0]) ? esc_url($product_detail_information['applynow'][0]) : '#') . '">Apply now</a></div></div>
                    <div class="col-xs-6 col-sm-6 col-md-5 col-md-offset-1"><div class="row"><a class="btn btn-primary-inverse btn-block" href="' . (isset($product_detail_information['learnmore'][0]) ? esc_url($product_detail_information['learnmore'][0]) : '#') . '">Learn more</a>&nbsp;</div></div>
                </div>
            </div>
        </div>
    </td>
</tr>';
	}
	return $output_tt_11;
}

function elv_get_tab_1_right_column($product_complete_information_array)
{
	$output_tt_22 = '';
	foreach ($product_complete_information_array as $product_complete_information) {
		if ($product_complete_information['modal_yes_no'] == 'yes') {
			$modal_link = $product_complete_information['modal_link'];

			$modal_link_url = vc_build_link($modal_link)['url'];
			$modal_id = wpcom_vip_url_to_postid(esc_url($modal_link_url));
			$output_tt_22 .= '<tr>
            <td>
                 <div class="bg-white feature-tile">';
			if($product_complete_information['modal_type'] == 'alert') {
				$output_tt_22 .= '
                    <div class="modal-triangle-small" data-toggle="modal" data-target="#' . esc_attr($product_complete_information['modal_type']) . esc_attr($modal_id) . '">
                        <span class="picon picon-0032-flag text-white"></span>
                    </div>';
			}
			else {
				$output_tt_22 .= '
                    <div class="modal-triangle-small modal-triangle-small-green" data-toggle="modal" data-target="#' . esc_attr($product_complete_information['modal_type']) . esc_attr($modal_id) . '">
                        <span class="picon picon-0651-star-favorite-rating text-white"></span>
                    </div>';
			}
			$output_tt_22 .= '
                    <div>
                        <div class="tile-body first-col">
                            <div class="col-md-2">
                                <br/>
                                <span class="' . esc_attr($product_complete_information['icon']) . '"></span>
                            </div>
                            <div class="col-md-10">
                                ' . html_entity_decode($product_complete_information['product_data']['content']) . '
                            </div>
                        </div>
                    </div>
                    <!--Add Modal Switch here-->
                    ' . elv_get_modal_switch($product_complete_information['modal_type'], '', $modal_id) . '
                </div>
            </td>
        </tr>';

		} else {

			/*if there is no modal window
			 *
			 *
			 */
			$output_tt_22 .= '<tr>
            <td> 
                <div class="bg-white feature-tile">
                    <div class="tile-body first-col">
                        <div class="col-md-2">
                            <br/>
                            <span class="' . esc_attr($product_complete_information['icon']) . '"></span>
                        </div>
                        <div class="col-md-10">
                            ' . html_entity_decode($product_complete_information['product_data']['content']) . '
                        </div>
                    </div>
                </div>
            </td>
        </tr>';
		}

	}

	return $output_tt_22;
}

function elv_get_feature_section($get_all_product_features, $product_detail_information_array)
{

	$output_tt_55 = '';
	foreach ($get_all_product_features as $get_all_product_feature) {
		$output_tt_55 .= '<td width="8.33%">
    <table width="100%">
        <tr>
            <td class="column-heading text-center text-grey">
                <small>' . elv_convert_tags_to_anchors($get_all_product_feature) . '</small>
            </td>
        </tr>';

		foreach ($product_detail_information_array as $product_detail_information) {
			if (in_array($get_all_product_feature, $product_detail_information['tags'])) {
				$output_tt_55 .= '<tr>
            <td>
                <div class="bg-white feature-tile">
                    <div class="tile-body text-center features-middle">
                        <span class="picon picon-large-tick text-success"> </span>
                    </div>
                </div>
            </td>
        </tr>';
			} else {
				$output_tt_55 .= '<tr>
            <td>
                <div class="bg-white feature-tile">
                    <div class="tile-body text-center features-middle">
                        <span class="picon picon-large-cross"> </span>
                    </div>
                </div>
            </td>
        </tr>';
			}
		}
		$output_tt_55 .= '</table>
</td>';
	}

	return $output_tt_55;

}

function elv_live_chat_area($class_name = "")
{
	$live_chat = '
	<div class="calculator-body bg-white fixed-height ' . esc_attr($class_name) . '">
		<img src="' . get_theme_mod('live_chat_image') . '" class="img-circle chat-thumbnail bottom" width="100px" height="100px">
		<h3>Need help?</h3>
		<span class="text-primary">We can answer any questions that you may have.</span>
		<div class="l-padding-t-1 l-padding-b-1 text-center">
			<button id="liveagent_button_online_57328000000Kz6n" href="javascript://Chat" style="display: none;" onclick="liveagent.startChat(\'57328000000Kz6n\')" class="btn btn-default btn-block">
				<span class="picon picon-0309-support-help-talk-call font-30 inline-icon"><!-- fill --></span> Live chat
			</button>
			<div id="liveagent_button_offline_57328000000Kz6n" style="">
				<a class="btn btn-default btn-block" href="' . get_site_url() . '/contact-us" title="Contact us" target="_self">
					Contact us
				</a>	
			</div>
		</div>
		<div class="row">
			<div class="col-md-3">
				<div class="row">
					<span class="picon picon-0294-phone-call-ringing font-40 text-default"><!-- fill --></span>
				</div>
			</div>
			<div class="col-md-9">
				<div class="row">
					<span class="call-number"><strong>' . get_theme_mod('phone_field_id') . '</strong></span><br />
					<small>Mon - Fri 8am - 8pm (AEST)</small>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
	if (!window._laq) {
		window._laq = [];
	}
	window._laq.push(function () {
		liveagent.showWhenOnline(\'57328000000Kz6n\', document.getElementById(\'liveagent_button_online_57328000000Kz6n\'));
		liveagent.showWhenOffline(\'57328000000Kz6n\', document.getElementById(\'liveagent_button_offline_57328000000Kz6n\'));
	});
</script>';

	return $live_chat;
}
