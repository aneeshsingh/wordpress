</div>
<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

function elv_tdrows($elements) {
	$a_disclaimer = array();
	foreach ($elements as $element) {
		if(trim($element->nodeValue)){
			$a_disclaimer[] = $element->nodeValue;
		}
	}
	return $a_disclaimer;
}

function elv_getdata($contents) {


		$a_all_disclaimers = array();
		$DOM = new DOMDocument;
		$DOM->loadHTML($contents);
		$items = $DOM->getElementsByTagName('tr');

		foreach ($items as $node) {
			$a_all_disclaimers[] = elv_tdrows($node->childNodes);
		}


	return $a_all_disclaimers;
}

wp_reset_postdata();


$disclaimer_1_value = get_post_meta(get_the_ID(), 'elv_posts_disclaimer1',true);
$disclaimer_1_open_close =get_post_meta(get_the_ID(), 'elv_posts_accordion',true);


$disclaimer_2_value =  get_post_meta(get_the_ID(), 'elv_posts_disclaimer2', true);
$disclaimer_2_open_close = get_post_meta(get_the_ID(), 'elv_posts_accordion2',true);

$disclaimer_2_value_formatted = '';
$disclaimer_1_value_formatted = '';

if($disclaimer_1_value != ''){
	$disclaimer_1_value_formatted =  elv_getdata($disclaimer_1_value);

}

if($disclaimer_2_value != ''){
	$disclaimer_2_value_formatted = elv_getdata($disclaimer_2_value);
}




$disclaimer_partner_object = null;

$disclaimer_partner_object = wpcom_vip_get_page_by_title('Partner Disclaimer',OBJECT, 'elv_disclaimers');

$disclaimer_partner_value = '';
if(isset($disclaimer_partner_object->post_content)){
	$disclaimer_partner_value = $disclaimer_partner_object->post_content;
}
?>

<footer id="colophon" class="site-footer row" role="contentinfo">
	<div class="container-fluid" id="disclaimer-links">
		<div class="container l-padding-b-2">
			<div class="row">
				<?php
				$navs = wp_get_nav_menus();
				foreach ($navs as $v) {
					if ($v->name == 'Footer') {
						$menuitems = wp_get_nav_menu_items($v);
						$complete_menu_array = elv_buildTree($menuitems, 0);
						$menu_number = 1;
						foreach ($complete_menu_array as $k => $v) {
							?>
							<div class="col-md-3">
								<h5 class="l-padding-t-2 hidden-xs hidden-sm">
									<?php
									if ($v->url == "" || $v->url == "#") {
										echo esc_attr(elv_get_headings($v));
									} else {

										?>
										<a href="<?php echo esc_url($v->url); ?>" class="footer-level-one-item-link"><?php echo esc_attr(elv_get_headings($v)); ?></a>
										<?php
									} ?>
								</h5>
								<h5 class="l-padding-t-1 hidden-md hidden-lg footer-menu-title">
									<a role="button" class="footer-level-one-item-link accordion-toggle" data-toggle="collapse" data-parent="#footer<?php echo esc_attr($menu_number); ?>" href="#footer<?php echo esc_attr($menu_number); ?>" aria-expanded="false" aria-controls="footer<?php echo esc_attr($menu_number); ?>"><?php echo esc_attr(elv_get_headings($v)); ?></a>
								</h5>
								<ul id="footer<?php echo esc_attr($menu_number); ?>" class="footerMenu" role="tabpanel" aria-labelledby="<?php echo esc_attr(elv_get_headings($v)); ?>">
									<?php
									if (!empty($v->wpse_children)) {
										foreach ($v->wpse_children as $wpse_child) {
											?>
											<li>
												<a href="<?php echo esc_url($wpse_child->url); ?>" class="footer-level-two-item-link"><?php echo esc_attr(elv_get_headings($wpse_child)); ?></a>
												<?php

												if (!empty($wpse_child->wpse_children)) {

													?>
													<ul>
														<?php
														foreach ($wpse_child->wpse_children as $wpse_child_child) {

															?>
															<li>
																<a href="<?php echo esc_url($wpse_child_child->url); ?>" class="footer-level-three-item-link"><?php echo esc_attr(elv_get_headings($wpse_child_child)); ?></a>
															</li>
															<?php

														}

														?>
													</ul>
													<?php
												}
												?>
											</li>
											<?php
										}
									}
									?>
								</ul>
							</div>
							<?php
							$menu_number++;
						}
					}
				}
				?>
			</div>
		</div>
	</div>
	<?php

	if( !empty($disclaimer_1_value_formatted) ) {
	?>
	<div class="container-fluid bg-white" id="disclaimer-accordion">
		<div class="container l-padding-t-3 l-padding-b-2">
			<div class="row">
				<div class="col-md-12">
					<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
						<div class="panel panel-default">
							<div class="panel-heading" role="tab" id="headingOne">
								<h4>
									<?php


									if( $disclaimer_1_open_close  == 2 ){
									?>
									<a role="button" class="accordion-toggle " data-toggle="collapse"
									   data-parent="#accordion" href="#disclaimer-accordion-title" aria-expanded="true"
									   aria-controls="collapseOne"> Disclaimers</span></a>
								</h4>
							</div>
							<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel"
								 aria-labelledby="headingOne">
								<div class="panel-body">
									<?php
										foreach ($disclaimer_1_value_formatted as $disclaimer_accordion_value) {
											if(is_array ( $disclaimer_accordion_value )) {
												$anchor_id = $disclaimer_accordion_value[0];
												$disclaimer_url = $disclaimer_accordion_value[1];

												$disclaimer_value = '';

												$post_object = get_post(wpcom_vip_url_to_postid($disclaimer_url));

												if( isset($post_object->post_content) && is_object($post_object) ){
														$disclaimer_value = $post_object->post_content;
												}

												if(is_object($disclaimer_value)) {
													if (strtolower($anchor_id) == 'na') {
														echo '<p>' . esc_attr($disclaimer_value) . '</p>';
													} else {
														echo '<p><a id="footnote-' . esc_attr(loopAndEncode($anchor_id)) . '" name="footnote-' . esc_attr(loopAndEncode($anchor_id)) . '"></a><sup>' . esc_attr($anchor_id) . '</sup>&nbsp;' . $disclaimer_value . '</p>';
													}
												}

											}
										}
									} else {
									?>
									<a role="button" class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne"> Disclaimers</a>
									</h4>
								</div>
								<div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne" aria-expanded="false" style="height: 0px;">
									<div class="panel-body">
										<?php
											foreach ($disclaimer_1_value_formatted as $disclaimer_accordion_value) {
												if(is_array ( $disclaimer_accordion_value )) {
												$anchor_id = $disclaimer_accordion_value[0];
												$disclaimer_url = $disclaimer_accordion_value[1];


												$disclaimer_value = '';

													$post_object = get_post(wpcom_vip_url_to_postid($disclaimer_url));

													if( isset($post_object->post_content) && is_object($post_object) ){

														$disclaimer_value = $post_object->post_content;


													}

													if(strtolower($anchor_id) == 'na'){
													echo '<p>' . esc_attr($disclaimer_value) . '</p>';

												} else{
													echo '<p><a id="footnote-' . esc_attr(loopAndEncode($anchor_id)) . '" name="footnote-' . esc_attr(loopAndEncode($anchor_id)) . '"></a><sup>' . esc_attr($anchor_id) . '</sup>&nbsp;' . esc_attr ($disclaimer_value) . '</p>';

												}
											}
										}
										}
										?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
		}
		?>
		<div class="container-fluid bg-black l-padding-t-1" id="disclaimer-footer">
			<div class="container l-padding-t-1">
				<?php
				if( !empty($disclaimer_2_value_formatted) ) {

					if ($disclaimer_2_open_close == 2) {
						if(is_array($disclaimer_2_value_formatted)){
						foreach ($disclaimer_2_value_formatted as $disclaimer_open_value) {
							if (is_array($disclaimer_open_value)) {
								$anchor_id = $disclaimer_open_value[0];
								$disclaimer_url = $disclaimer_open_value[1];
								$post_object = get_post(wpcom_vip_url_to_postid($disclaimer_url));

								if (isset($post_object->post_content) && is_object($post_object)) {

									$disclaimer_value = $post_object->post_content;


								}

								if (is_object($disclaimer_value)) {
									if (strtolower($anchor_id) == 'na') {

										echo '
						<div class="row">
							<div class="col-md-12">
								<p>
									' . esc_attr($disclaimer_value) . '
								</p>
							</div>
						</div>' . PHP_EOL;
									} else {

										echo '
						<div class="row">
							<div class="col-md-12">
								<p>
								<a id="footnote-' . esc_attr(loopAndEncode($anchor_id)) . '" name="footnote-' . esc_attr(loopAndEncode($anchor_id)) . '"></a><sup>' . esc_attr($anchor_id) . '</sup>&nbsp;
									' . esc_attr($disclaimer_value) . '
								</p>
							</div>
						</div>' . PHP_EOL;
									}
								}
							}
						}
					}
				}
					}
				else {
					if(is_array($disclaimer_2_value_formatted)){
						foreach ($disclaimer_2_value_formatted as $disclaimer_open_value) {
							if (is_array($disclaimer_open_value)) {
								$anchor_id = $disclaimer_open_value[0];
								$disclaimer_url = $disclaimer_open_value[1];
								$post_object = get_post(wpcom_vip_url_to_postid($disclaimer_url));

								if (isset($post_object->post_content) && is_object($post_object)) {

									$disclaimer_value = $post_object->post_content;


								}

								if (strtolower($anchor_id) == 'na') {

									echo '
								<div class="row">
									<div class="col-md-12">
										<p>
											' . esc_attr($disclaimer_value) . '
										</p>
									</div>
								</div>' . PHP_EOL;
								} else {

									echo '
								<div class="row">
									<div class="col-md-12">
										<p>
										<a id="footnote-' . esc_attr(loopAndEncode($anchor_id)) . '" name="footnote-' . esc_attr(loopAndEncode($anchor_id)) . '"></a><sup>' . esc_attr($anchor_id) . '</sup>&nbsp;
											' . esc_attr($disclaimer_value) . '
										</p>
									</div>
								</div>' . PHP_EOL;
								}

							}
						}
					}
					}

				?>
				<div class="row">
					<div class="col-md-12">
						<p><?php echo esc_attr($disclaimer_partner_value) ?></p>
						<p>Elevate is a service provided by Macquarie Bank Limited for employees of Macquarie and Macquarie Workplace Banking Partners only.</p>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<hr />
						<p>Information on this website does not take into account your objectives, financial situation or needs. You should consider whether it is appropriate for you.</p>
						<p>Unless otherwise specified, the products and services described on this website are available from Macquarie Bank Limited ABN 46 008 583 542 AFSL and Australian Credit Licence 237502 (MBL). All applications for credit products are subject to standard credit approval criteria. Terms, conditions, fees and charges apply and may be varied or introduced in the future.</p>
						<p>Except for MBL, any entity referred to is not an authorised deposit-taking institution for the purposes of the Banking Act 1959 (Cth). That entity's obligations do not represent deposits or other liabilities of MBL. MBL does not guarantee or otherwise provide assurance in respect of the obligations of that entity, unless noted otherwise.</p>
						<p>Powered by WordPress.com VIP.</p>
						<hr />
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<p class="pull-left">&copy; Macquarie Group Limited</p>
					</div>
					<div class="col-md-6">
						<p class="pull-right"><a href="/important-information" target="_blank">Important information</a> | <a href="/privacy-policy" target="_blank">Privacy policy</a></p>
					</div>
				</div>
			</div>
		</div>

</footer>
</div>
</div>
<?php

wp_footer(); 
vip_powered_wpcom();
?>
</body>
</html>
