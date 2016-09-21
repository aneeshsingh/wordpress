<?php
$atts = vc_map_get_attributes($this->getShortcode(), $atts);

$link = $atts['link'];
$chat = $atts['chat'];

$css_class = !empty($css) ? vc_shortcode_custom_css_class($css) : '';

$post_url = vc_build_link($link);
$post_id = wpcom_vip_url_to_postid(esc_url($post_url['url']));


$elv_uid = elv_get_persona_id();
/**
 *
 * Getting user data
 *
 *
 */
$i_article_count = 32;
$author_id = elv_get_article_author_id($post_id);
$all_article_tags = get_the_tags($post_id);
$get_the_title = '';
$get_the_title = get_the_title($post_id);

$content = elv_get_post_trimmed_content($post_id, 200);

$number_of_likes_value = elv_get_number_of_post_likes(get_the_ID());
$number_of_dislikes_value = elv_get_number_of_post_dislikes(get_the_ID());

$form_post_url = EXPERTISE_AJAX_URL;
$user_followed_authors = elv_has_user_followed_author($elv_uid);
$user_bookmark_posts = elv_has_user_bookmarked($elv_uid);

$user_liked_posts = elv_has_user_liked($elv_uid);
$user_disliked_posts = elv_has_user_disliked($elv_uid);

$create_follow_button = '';

$create_bookmark_button = '';
$create_like_button = '';

$create_dislike_button = '';

$output  = '';
$output .='<input type="hidden" id="elv_uid" value="'. esc_attr($elv_uid) .'" name="elv_uid" />';
$output .= '<div class="container-fluid l-padding-t-2 l-padding-b-2 parallax-bg " style="background-image: url(' . esc_url( wp_get_attachment_url(get_post_thumbnail_id($post_id))) . '">
	<div class="container lifestage-feature fixed-height">
		<div class="row">
			<div class="col-md-9 lifestage-stick-to-bottom left bg-white">
				<div class="row">
					<div class="col-md-10 col-md-offset-1 l-padding-b-1 l-padding-t-1">
						<div class="row">
							<div>
								<h4>Featured Expertise</h4>
							</div>
						</div>
						<div class="row">
							<div>
								<h2 class="article-details">
								<a href="' . esc_url(get_permalink($post_id)) . '" class="text-default">' . esc_attr($get_the_title) . '</a>
								</h2>
								<h5 class="article-date">
									<small><strong>' . get_the_date('d F Y', $post_id) . '</strong></small>
									<!--<small class="article-views"><em>216 views</em></small>-->
								</h5>
								<hr />
							</div>
						</div>
						<div class="row">
							<div class="l-padding-b-2">
									' . nl2br($content) . '
							</div>
						</div>
						<div class="row">
						<div class="col-md-8"><div class="row"><h4><a href="' . esc_url(get_permalink($post_id)) . '">Read full article</a></h4></div></div>
						<div class="col-md-4 social-action"><div class="row">
						<h4 class="pull-right">';
$output .= $create_like_button;
$output .= '</h4>';
$output .= '<h4 class="pull-right">';
$output .= $create_dislike_button;

$output .= '</h4>
								</div>
							</div></div>
							<div class="bookmark-icon pull-right">
								' . $create_bookmark_button . '
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-3 calculator lifestage-stick-to-bottom right">';

if($chat == 'yes'){
	$output .= elv_live_chat_area();
}
else{

}

$output .= '</div>
			</div>
		</div>
	</div>
</div>';

$output .= <<<EOD
	<script>
	(function () {

		var parallax = document.querySelectorAll(".parallax-bg"),
				speed = 0.3;

		window.onscroll = function () {
			[].slice.call(parallax).forEach(function (el, i) {

				var windowYOffset = window.pageYOffset,
						elBackgrounPos = "50% " + (-1 * windowYOffset * speed) + "px";

				el.style.backgroundPosition = elBackgrounPos;

			});
		};

	})();
	
	</script>
EOD;

print balanceTags($output);
