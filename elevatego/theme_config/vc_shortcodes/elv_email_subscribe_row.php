<?php
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );


$oid = $atts['oid'];
$retURL = $atts['retURL'];
$sales_00N28000001ZCdL = $atts['sales_00N28000001ZCdL'];
$recordType = $atts['recordType'];
$sales_00N28000002BqFl = $atts['sales_00N28000002BqFl'];
$Campaign_ID = $atts['Campaign_ID'];
$lead_source = $atts['lead_source'];
$Referral_Source__c = $atts['Referral_Source__c'];
$main_text = $atts['main_text'];
$error_text = $atts['error_text'];
$button_text = $atts['button_text'];

$css_class = !empty($css) ? vc_shortcode_custom_css_class( $css ) : '';
//$url = vc_build_link( $link );

$content = wpb_js_remove_wpautop( apply_filters( 'the_content', $content ), true );

$output = '<div class="container-fluid l-padding-t-2 l-padding-b-2 subscription-email-form">
	<div class="container">
		<div class="row">
			<div class="col-xs-2 col-sm-2 col-md-1 pull-right">
				<div class="form-group">
					<button type="button" class="close subscription-email-form-close" aria-label="Close">
						<span aria-hidden="true" class="picon picon-large-cross"></span>
					</button>
				</div>
			</div>
			<div class="col-xs-10 col-sm-10 col-md-5 pull-left">
				<p class="subscription-email-form-text">'.esc_attr($main_text).'</p>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-6 pull-left">
				<div id="submitEmailFormSection" class="show">
					<form id="submitEmailForm" name="submitEmailForm" method="post" class="submitEmailForm form-inline" action="https://www.salesforce.com/servlet/servlet.WebToLead?encoding=UTF-8">
						<!--SALESFORCE: OID-->
						<input type="hidden" id="oid" name="oid" value="'.esc_attr($oid).'" />
						<!--SALESFORCE: Return URL-->
						<input type="hidden" id="retURL" name="retURL" value="'. get_site_url() .'?form=success" />
						<!--SALESFORCE: Web to Lead form name-->
						<input type="hidden" id="00N28000001ZCdL" name="00N28000001ZCdL" value="'.esc_attr($sales_00N28000001ZCdL).'" />
						<!--SALESFORCE: Lead record type-->
						<input type="hidden" id="recordType" name="recordType" value="'.esc_attr($recordType).'" />
						<!--SALESFORCE: Product/s-->
						<input type="hidden" id="00N28000002BqFl" name="00N28000002BqFl" value="" />
						<!--SALESFORCE: Camapign Id-->
						<input type="hidden" id="Campaign_ID" name="Campaign_ID" value="'.esc_attr($Campaign_ID).'" />
						<!--SALESFORCE: Lead source-->
						<input type="hidden" id="lead_source" name="lead_source" value="'.esc_attr($lead_source).'" />
						<!--SALESFORCE: Referral source-->
						<input type="hidden" id="Referral_Source__c" name="Referral_Source__c" value="'.esc_attr($Referral_Source__c).'" />
						<!--SALESFORCE: Debug code-->
						<input type="hidden" id="debug" name="debug" value="0" />
						<!-- form text -->
						<div class="form-group col-xs-6 col-sm-7">
							<label class="sr-only" for="email">Email address<abbr title="Required">*</abbr></label>
							<input class="form-control subscription-email-form-input" type="email" name="email" id="email" placeholder="Email address" />
						</div>
						<!--form button and meter progress -->
						<div class="form-group col-xs-6 col-sm-5">
							<button class="btn btn-default subscription-email-form-button btn-block" type="submit">'. esc_attr($button_text) .'</button>
							<div class="meter nostripes hide">
								<span style="100%"></span>
							</div>
						</div>
					</form>
				</div>
				<div id="submitEmailFormThankyouSection" class="text-center hide">
					'. $content .'
				</div>
			</div>
		</div>
	</div>
</div>';
$output .= '<script>
jQuery(document).ready(function () {
//Modal window subscribe form
		jQuery("#submitEmailForm").submit(function(e) {e.preventDefault();}).validate({
			rules: {
				email: {
					required: true, email: true
				}
			}, messages: {
				email: {
					required: "Please fill in your email", email: "Please enter valid email"
				}
			}, success: "valid", submitHandler: function (e) {
				jQuery.ajax({
					type: "POST",
					url: "https://www.salesforce.com/servlet/servlet.WebToLead?encoding=UTF-8",
					data: jQuery(\'#submitEmailForm\').serialize(),
					statusCode: {
						200: function () {
							console.log("success");
							jQuery("#submitEmailForm").removeClass(\'show\');
							jQuery("#submitEmailForm").addClass(\'hide\');
							jQuery("#submitEmailFormThankyouSection").removeClass(\'hide\');
							jQuery("#submitEmailFormThankyouSection").addClass(\'show\');
						}
					}
				});
				jQuery("#submitEmailForm .meter").removeClass("hide");
				jQuery("#submitEmailForm .meter > span").each(function () {
					jQuery(this).data("origWidth", jQuery(this).width()).width(0).animate({
						width: jQuery(this).data("origWidth")
					}, 3000);
				});
				return false;
			}
		});
	});
</script>';


print balanceTags($output);
