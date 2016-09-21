<?php
$atts = vc_map_get_attributes($this->getShortcode(), $atts);

$link = $atts['link'];
$el_class = $atts['el_class'];
$background_data = $atts['background_data'];

$css_class = !empty($css) ? vc_shortcode_custom_css_class($css) : '';
$url = vc_build_link($link);

$template_dir = get_template_directory_uri();

$main_background_image = elv_find_right_background_image($background_data);

$content = wpb_js_remove_wpautop(apply_filters('the_content', $content), true);

$output = '
<div class="container-fluid bg-grey l-padding-t-2 l-padding-b-2">
	<div class="container bg-white promo-feature ">
		<div class="row">
			

			<div class="col-md-6 pull-left promo-feature-chat">
				' . $content . '
				<div class="learn-more-chat-position">
			<div class="hidden-xs hidden-sm">
					<div class="chat-floatover-online" id="liveagent_button_online_57328000000Kz6n" style="display: none;"><span class="picon picon-0309-support-help-talk-call inline-icon"><!-- fill --></span> <a href="javascript://Chat" onclick="liveagent.startChat(\'57328000000Kz6n\')" class="chat-text-fixed-width"> Chat to us <img src="' . get_theme_mod('live_chat_image') . '" class="img-circle chat-thumbnail" width="100px" height="100px" style=" cursor: pointer" onclick="liveagent.startChat(\'57328000000Kz6n\')" ></a></div>
					<div class="chat-floatover" id="liveagent_button_offline_57328000000Kz6n" style=""><span class="picon picon-0309-support-help-talk-call inline-icon"><!-- fill --></span><a href="' . esc_url(get_site_url()) . '/contact-us" class="chat-text-fixed-width"> Request a call &nbsp;<img src="' . get_theme_mod('live_chat_image') . '" class="img-circle chat-thumbnail" width="100px" height="100px" id="liveagent_button_offline_57328000000Kz6n" ></a></div>
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
				<a href="' . esc_url($url['url']) . '" class="btn btn-success learn-more" title="' . esc_attr($url['title']) . '" target="' . (strlen($url['target']) > 0 ? esc_attr($url['target']) : '_self') . '">' . esc_attr($url['title']) . '</a>
			</div>
			</div>
			<div class="col-md-6 full-image pull-right featured-image-widget  promo-feature-chat" style="background-image: url(' . esc_url(wp_get_attachment_url($main_background_image)) . '); ">
				<!--<img src="' . esc_url(wp_get_attachment_url($main_background_image)) . '" class="img-responsive" /> -->
			</div>
			
		</div>
	</div>
</div>';

print balanceTags($output);
