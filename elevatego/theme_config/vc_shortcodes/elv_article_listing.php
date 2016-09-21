<?php
$atts = vc_map_get_attributes($this->getShortcode(), $atts);

$name = $atts['name'];

$css_class = !empty($css) ? vc_shortcode_custom_css_class($css) : '';

$all_article_ids = get_post_meta(elv_get_persona_id(), 'elv_personalisations_bookmarks', true);
$all_article_ids_array = explode('|', $all_article_ids);
$article_html = '';

$article_html .= '<div class="container">
		<div class="row l-padding-b-1">
			<div class="col-sm-12 col-md-10 col-md-offset-1 saved-articles">';
foreach ($all_article_ids_array as $all_article_id) {
	if ($all_article_id) {
		$tags_html = '';
		if (!empty($all_tags)) {
			$tagcount = 0;
			foreach ($all_tags as $tag) {
				$tags_html .= '<span class="badge"><a href="' . esc_url(get_home_url()) . '/expertise-author?author_post_id=' . esc_attr($tag->term_id) . '" class="text-default">' . esc_attr($tag->name) . '</a></span>';
				$tagcount++;
				if ($tagcount >= 1) {
					break;
				}
			}
		}

		$article_html .= '<div class="col-sm-12 col-md-12 l-margin-b-1 secondary-article">
				<div class="row bg-white">
					<div class="col-md-6 padding-0">
						<a class="text-default" style="overflow: auto; max-height:200px" href="' . esc_url(get_permalink($all_article_id)) . '" ><img class="img-responsive center-block" src="' . esc_url(wp_get_attachment_url(get_post_thumbnail_id($all_article_id))) . '" /></a>
					</div>
					<div class="col-md-6 caption">
						<h3><a href="' . get_permalink($all_article_id) . '" class="text-default">' . esc_attr(get_the_title($all_article_id)) . '</a></h3>
						<h5><small class="article-date"><strong>' . get_the_date('d F Y', $all_article_id) . '</strong></small></h5>
						<div>
						' . $tags_html . '
						</div>
					</div>
				</div>
			</div>';
	} else {
		$article_html .= '<div class="col-sm-12 col-md-12 l-padding-b-1 secondary-article"><div class="row bg-white text-center"><h5>Bookmark articles by selecting the bookmark icon on the article and it will be displayed here. </h5></div></div>';
	}
}
$article_html .= '</div>
		</div>
	</div>';

print balanceTags($article_html);
