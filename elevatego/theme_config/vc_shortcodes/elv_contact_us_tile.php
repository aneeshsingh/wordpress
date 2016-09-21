<?php
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );

$tile_description = $atts['tile_description'];

$css_class = !empty($css) ? vc_shortcode_custom_css_class( $css ) : '';

$html = '
<div class="row product-feature">
	<div class="col-md-6 l-padding-t-3 l-padding-b-3">
		<div class="bg-white-90 top-border-primary contact-box">
			<h4>Call us</h4>
			<h2><span class="picon picon-0294-phone-call-ringing font-40"></span> <strong><a href="tel:' . esc_url(str_replace(' ', '', get_theme_mod('phone_field_id'))) . '" class="text-primary">&nbsp;' . esc_attr(get_theme_mod('phone_field_id')) . '</a></strong> </h2>
			<p class="lead">Monday – Friday, 8am – 7pm</p>
		</div>
	</div>
	<div class="col-md-6 l-padding-t-3 l-padding-b-3">
		<div class="bg-white-90 top-border-success contact-box">
			<div class="text-center">
				<h3 class="text-primary" data-toggle="modal" data-target="#requestCall"><strong>Request a call</strong> <span class="picon picon-chevron-right font-30"></span></h3>
				<!-- Modal -->
				<div class="modal fade" id="requestCall" tabindex="-1" role="dialog" aria-labelledby="Request a Call">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span><br /><span class="close-text">Close</span>
								</button>
							</div>
							<div class="modal-body col-lg-12 bg-grey ">
								<div id="requestCallBlock" class="text-left padding-lr-60 show">
									<h2 class="l-padding-t-1">Request a call</h2>
									<form id="requestCallForm" name="web-form" method="post" action="https://www.salesforce.com/servlet/servlet.WebToLead?encoding=UTF-8">
										'. htmlspecialchars_decode(get_theme_mod("salesforce_field_id")).'
										<div class="form-group col-lg-12 l-padding-b-1 padding-left-0 padding-right-0">
											<div class="col-lg-6 padding-left-0">
												<label class="sr-only" for="first_name">First name<abbr title="Required">*</abbr></label>
												<input name="first_name" id="first_name" type="text" class="form-control" placeholder="First name" />
											</div>
											<div class="col-lg-6 padding-right-0">
												<label class="sr-only" for="last_name">Last name<abbr title="Required">*</abbr></label>
												<input name="last_name" id="last_name" type="text" class="form-control" placeholder="Last name" />
											</div>
										</div>
										<div class="form-group col-lg-12 l-padding-b-1 padding-left-0 padding-right-0">
											<div class="col-lg-6 padding-left-0">
												<label class="sr-only" for="phone">Phone number<abbr title="Required">*</abbr></label>
												<input name="phone" id="phone" type="text" class="form-control" placeholder="Phone number" />
											</div>
											<div class="col-lg-6 padding-right-0">
												<label class="sr-only" for="email">Email address<abbr title="Required">*</abbr></label>
												<input name="email" id="email" type="email" class="form-control" placeholder="Email address" />
											</div>
										</div>
										<div class="form-group">
											<label class="select-arrow" for="00N28000003U6Hr">
											<select class="form-control" name="00N28000003U6Hr" id="00N28000003U6Hr">
												<option value="">Please select time </option>
												<option value="">ASAP</option>
												<option value="Morning - 8am to 12pm">Morning - 9am to 12pm</option>
												<option value="Afternoon - 12pm to 4pm">Afternoon - 12pm to 4pm</option>
												<option value="Evening - 4pm to 6pm">Evening - 4pm to 6pm</option>
											</select>
											</label>
										</div>
										<div class="form-group col-lg-12 l-padding-b-1 padding-left-0 padding-right-0">
											<div class="col-lg-6 padding-left-0">
												<button class="btn btn-primary btn-block" type="submit">Submit</button>
											</div>
											<div class="col-lg-6 padding-right-0">
												<button class="btn btn-default btn-block" type="reset">Clear</button>
											</div>
										</div>
										<div class="form-group disclaimer-copy">The information you provide on this form will be retained and handled by Macquarie in accordance with our
											<a href="//www.macquarie.com/about/disclosures/privacy-and-cookies">Privacy Policy</a> and we may contact you about products or services we feel may be of interest to you. If you do not wish to provide all details or receive information of this nature, please phone us on
											<a href="tel:'. esc_url(str_replace(' ', '', get_theme_mod('phone_field_id'))) .'">'. esc_attr(get_theme_mod('phone_field_id')) .'</a>.
										</div>
									</form>
								</div>
								<div id="requestCallThanks" class="text-center l-padding-b-2 hide">
									<h2 class="l-padding-b-1">Great! You\'ve successfully subscribed.</h2>
									<p class="l-padding-b-1"><strong>As a subscriber you can take advantage
										<br> of special Your.Macquarie content.</strong></p>
									<p>To activate your account please check your
										<br> email and click the activation link.</p>
								</div>
								<div class=" l-padding-b-2"></div>
							</div>
						</div>
					</div>
				</div>
				<p>&nbsp;</p>
				<h3 class="text-primary"><a id="liveagent_button_online_57328000000Kz6n" href="javascript://Chat" style="display: none;" onclick="liveagent.startChat(\'57328000000Kz6n\')" class="text-primary"><strong>Live chat</strong> <span class="picon picon-chevron-right font-30"></span></a></h3>
				<script type="text/javascript">
					if (!window._laq) {
						window._laq = [];
					}
					window._laq.push(function () {
						liveagent.showWhenOnline(\'57328000000Kz6n\', document.getElementById(\'liveagent_button_online_57328000000Kz6n\'));
						liveagent.showWhenOffline(\'57328000000Kz6n\', document.getElementById(\'liveagent_button_offline_57328000000Kz6n\'));
					});
				</script>
			</div>
		</div>
	</div>
</div>
<script>
jQuery(document).ready(function () {
//Modal window subscribe form
	jQuery("#requestCallForm").submit(function(e) {e.preventDefault();}).validate({
			rules: {
				first_name: {
					required: true
				}, last_name: {
					required: true
				}, phone: {
					required: true
				}, email: {
					required: true, email: true
				}
			}, messages: {
				first_name: "Please fill in your first name",
				last_name: "Please fill in your last name",
				phone: "Please fill in your phone number",
				email: {
					required: "Please fill in your email", email: "Please enter valid email"
				}
			}, success: "valid", submitHandler: function (e) {
				jQuery.ajax({
					type: "POST",
					url: "https://www.salesforce.com/servlet/servlet.WebToLead?encoding=UTF-8",
					data: jQuery(\'#requestCallForm\').serialize(),
					statusCode: {
						200: function () {
							console.log("success");
							jQuery("#requestCallBlock").removeClass(\'show\');
							jQuery("#requestCallBlock").addClass(\'hide\');
							jQuery("#requestCallThanks").removeClass(\'hide\');
							jQuery("#requestCallThanks").addClass(\'show\');
						}
					}
				});
				return false;
			}
		});
	});
</script>
';

print $html;