<?php
/** This file contains all the Modal Window functions */

/**
 *
 * Function to generate booking html
 *
 * @param $filter
 * @param $s_inline_style
 * @param $expertise
 * @return string
 *
 *
 * Grid
 *
 */
function elv_create_tile_html(
	$filter,
	$s_inline_style,
	$s_href,
	$s_title
)
{
	$tile_classes = 'col-md-4 tile-one-one';
	if (rand(1, 6) == 1) {
		$tile_classes = 'col-md-8 tile-one-two';
	}
	$content_html = '<div class="grid-item animate col-xs-12 col-sm-12 ' . esc_attr($tile_classes) . ' l-padding-b-2 cat-' . esc_attr($filter) . '">
					<a class="" href="' . esc_url($s_href) . '"><div class="bg-blue feature-tile "' . $s_inline_style . '>
						<div class="tile-head"><span class="h4 text-black">Expertise</span></div>
						<div class="tile-body"><span class="arrow-indent"><!-- fill --></span> 
							<h3 class="text-black">
								' . esc_attr($s_title) . '
							</h3>
						</div>
					</div></a>
				</div>' . PHP_EOL;

	return $content_html;
}

/**
 * @param $filter
 * @param $s_inline_style
 * @param $expertise
 * @return string
 *
 * Carousel
 *
 */
function elv_create_tile_carousel_html(
	$filter,
	$s_inline_style,
	$s_href,
	$s_title
)
{

	$content_html = '<div class="grid-item animate col-xs-12 col-sm-12 col-md-4 l-padding-b-2 cat-' . esc_attr($filter) . '">
					<div class="bg-blue feature-tile "' . $s_inline_style . '>
						<div class="tile-head"><span class="h4">Expertise</span></div>
						<div class="tile-body">
							<h3>
								<a class="text-white" href="' . esc_url($s_href) . '">' . esc_attr($s_title) . '</a>
							</h3>
							<div class="tile-link text-white">
								<a class="" href="' . esc_url($s_href) . '">Learn more</a>
							</div>
						</div>
					</div>
				</div>' . PHP_EOL;

	return $content_html;
}

/**
 * @param $filter1
 * @param $filter2
 * @param $filter3
 * @param $filter4
 * @param int $number_of_posts
 * @return string
 *
 * Grid Expertise Generator
 *
 */
function elv_generate_expertise_tiles($filters, $number_of_posts)
{

	$s_tiles = '';
	$s_inline_style = '';

	if ($number_of_posts == '') {
		$number_of_posts = -1;
	}

	$args_expertise = array('posts_per_page' => $number_of_posts);
	$o_query_expertise = new WP_Query($args_expertise);

	//var_dump($o_query_expertise);

	if ($o_query_expertise->have_posts()) {
		while ($o_query_expertise->have_posts()) {

			$o_query_expertise->the_post();

			//var_dump( get_the_ID() );

			$s_featured_img_url = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()));

			if ($s_featured_img_url != '') {
				$s_inline_style = ' style="background-image: url(' . esc_url($s_featured_img_url) . ');"';
			}

			$all_article_tags_name = array();
			$all_article_tags = get_the_terms(get_the_ID(), 'post_tag');

			if (!empty($all_article_tags)) {

				foreach ($all_article_tags as $all_article_tag) {
					$all_article_tags_name[] = $all_article_tag->name;
				}
				$s_href = '';
				$s_href = get_permalink(get_the_ID());

				$s_title = '';
				$s_title = get_the_title(get_the_ID());

				foreach ($filters as $filter) {
					if (in_array($filter['parent_name'], $all_article_tags_name)) {
						$s_tiles .= elv_create_tile_html($filter['parent_name'], $s_inline_style, $s_href, $s_title);
					}
				}
				wp_reset_postdata();

			}
		}
	}
	return $s_tiles;
}



/**
 * @param $filter1
 * @param $filter2
 * @param $filter3
 * @param $filter4
 * @param int $number_of_posts
 * @return string
 *
 * Grid Expertise Generator
 *
 */
function elv_generate_expertise_param_tiles($tag, $number_of_posts)
{

	$s_tiles = '';
	$s_inline_style = '';

	if ($number_of_posts == '') {
		$number_of_posts = -1;
	}

	$args_expertise = array('posts_per_page' => $number_of_posts);
	$o_query_expertise = new WP_Query($args_expertise);

	//var_dump($o_query_expertise);

	if ($o_query_expertise->have_posts()) {
		while ($o_query_expertise->have_posts()) {

			$o_query_expertise->the_post();

			//var_dump( get_the_ID() );

			$s_featured_img_url = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()));

			if ($s_featured_img_url != '') {
				$s_inline_style = ' style="background-image: url(' . esc_url($s_featured_img_url) . ');"';
			}

			$all_article_tags_name = array();
			$all_article_tags = get_the_terms(get_the_ID(), 'post_tag');

			if (!empty($all_article_tags)) {

				foreach ($all_article_tags as $all_article_tag) {
					$all_article_tags_name[] = $all_article_tag->name;
				}
				$s_href = '';
				$s_href = get_permalink(get_the_ID());

				$s_title = '';
				$s_title = get_the_title(get_the_ID());


					if (in_array($tag,$all_article_tags_name)) {
						$s_tiles .= elv_create_tile_html($tag, $s_inline_style, $s_href, $s_title);
				}
				wp_reset_postdata();

			}
		}
	}
	return $s_tiles;
}

/**
 * @param $filter1
 * @param $filter2
 * @param $filter3
 * @param $filter4
 * @param int $number_of_posts
 * @return string
 *
 *
 * Carousel Expertise
 *
 */

function elv_generate_expertise_carousel_tiles($filters, $number_of_posts = -1)
{

	$s_tiles = '';
	$s_inline_style = '';

	if ($number_of_posts == '') {
		$number_of_posts = -1;
	}

	$args_expertise = array('posts_per_page' => $number_of_posts);
	$o_query_expertise = new WP_Query($args_expertise);

	if ($o_query_expertise->have_posts()) {
		while ($o_query_expertise->have_posts()) {

			$o_query_expertise->the_post();

			$s_featured_img_url = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()));

			if ($s_featured_img_url != '') {
				$s_inline_style = ' style="background-image: linear-gradient( rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.8) ), url(' . esc_url($s_featured_img_url) . ');"';
			}

			$all_article_tags_name = array();
			$all_article_tags = get_the_terms(get_the_ID(), 'post_tag');

			if (!empty($all_article_tags)) {

				foreach ($all_article_tags as $all_article_tag) {
					$all_article_tags_name[] = $all_article_tag->name;
				}
				$s_href = '';
				$s_href = get_permalink(get_the_ID());

				$s_title = '';
				$s_title = get_the_title(get_the_ID());

				foreach ($filters as $filter) {
					if (in_array($filter['parent_name'], $all_article_tags_name)) {
						$s_tiles .= elv_create_tile_carousel_html($filter['parent_name'], $s_inline_style, $s_href, $s_title);
					}
				}

				wp_reset_postdata();
			}
		}
	}
	return $s_tiles;
}

function elv_get_tile_headers($filters)
{
	$content_html = '';
	$content_html .= '<div class="container-fluid bg-white sub-navigation anchor-links">
	<div class="container">
		<div class="row text-center">';

	foreach ($filters as $filter) {


		$content_html .= '
			<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 sub-navigation-boxtile  text-center l-padding-t-1 l-padding-b-1">
				<a class="tile-filter" data-filter=".cat-' . strtolower($filter['parent_name']) . '">
					<div class="sub-navigation-boxtile-icon">
						<span class="' . esc_attr($filter['parent_icon']) . '"><!--fill--></span>
					</div>
					<div class="sub-navigation-boxtile-text">
					' . ucwords(strtolower($filter['parent_name'])) . '
					</div>
				</a>
			</div>';
	}

	$content_html .= '</div>
	</div>
</div>
<div class="container-fluid">
	<div class="container">
<div class="row l-padding-t-2 l-padding-b-2 column-content"><div class="grid-sizer col-md-4"></div>';

	return $content_html . PHP_EOL;
}

function elv_create_product_categories($categories)
{
	//var_dump($categories);

	$content_html = '';
	foreach ($categories as $category) {
		$content_html .= '<div class="grid-item animate col-xs-12 col-sm-12 col-md-4 l-padding-b-2 cat-' . esc_attr($category['parent']) . ' ' . esc_attr($category['class']) . '">
					<a class="btn btn-default-inv btn-block" href="' . esc_attr($category['url']) . '"><span class="' . esc_attr($category['child_icon']) . ' padding-right-20 inline-icon font-30"><!-- fill --></span> ' . esc_attr($category['title']) . ' <span class="picon picon-chevron-right padding-left-20 inline-icon font-30"><!-- fill --></span></a>
				</div>' . PHP_EOL;
	}

	return $content_html. PHP_EOL;
}

