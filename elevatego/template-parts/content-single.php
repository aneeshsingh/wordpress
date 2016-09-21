<?php
/**
 * The template part for displaying single posts
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */


/**
 *
 * Getting user data
 *
 */

$elv_uid = elv_get_persona_id();
$user_liked_posts = elv_has_user_liked($elv_uid);
$user_disliked_posts = elv_has_user_disliked($elv_uid);
$user_bookmark_posts = elv_has_user_bookmarked($elv_uid);
$user_followed_authors = elv_has_user_followed_author($elv_uid);
$author_id_value = elv_get_article_author_id($elv_uid);


$author_id = $author_id_value;

/**
 *
 *
 * Getting author data
 *
 */
$author_name = elv_get_elevate_author_name($author_id_value);
$author_content = elv_get_elevate_author_bio($author_id_value);
$author_tag_line = elv_get_elevate_author_tagline($author_id_value);
$number_author_followers = elv_get_elevate_author_followers($author_id_value);
$author_featured_image = elv_get_elevate_author_featured_image($author_id_value);

/**
 *
 *
 * Getting post data
 *
 *
 */

$number_of_likes_value = elv_get_number_of_post_likes(get_the_ID());
$number_of_dislikes_value = elv_get_number_of_post_dislikes(get_the_ID());
$all_article_tags = get_the_tags();
// bold to first 2 words
$get_the_title = '';
$get_the_title = get_the_title();
/*$s_title = bold_first_words($get_the_title, 3);*/
$s_title = $get_the_title;

/**
 *
 * Custom Data
 *
 */
$form_post_url = EXPERTISE_AJAX_URL;
$i_article_count = 32;
$post_id = get_the_ID();

?>
<input type="hidden" id="elv_uid" value="<?php echo esc_attr($elv_uid) ?>" name="elv_uid" />
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="vertical-tab-bg">
		<div class="vertical-tab-bgimg light-gradient-top active">
			<?php echo get_the_post_thumbnail(get_the_ID(), 'full', array('alt' => the_title_attribute('echo=0'), 'class' => 'hero-image-sim img-responsive')); ?>
		</div>
	</div>
	<div class="container-fluid l-padding-t-10">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2 bg-white">
					<div class="col-md-10 col-md-offset-1 l-padding-t-2 l-padding-b-1">
						<div class="row">
							<ol class="breadcrumb" typeof="BreadcrumbList" vocab="http://schema.org/">
								<?php if (function_exists('bcn_display')) {
									bcn_display();
								} ?>
							</ol>
						</div>
						<div class="row">
							
							<h2>
								<?php echo esc_attr($s_title); ?>
							</h2>
						</div>
						<div class="row">
							<h5><?php if( get_post_meta(get_the_ID(), 'elv_posts_dateyn', true) == '1' ) {

										if(get_post_meta(get_the_ID(), 'elv_posts_date_published', true) != '') {

											?>
											<small class="article-date"><strong>
													<?php echo esc_attr(get_post_meta(get_the_ID(), 'elv_posts_date_published', true)) ?>
												</strong>
											</small>

											<?php

										} else {

											?>

											<small class="article-date"><strong>
													<?php echo esc_attr(get_the_date('d F Y')); ?>
												</strong>
											</small>

											<?php

										}
								} ?>
								<!--<small class="article-views hide"><em>216 views</em></small>-->
							</h5>
							<hr />
							<h5>
								<small class="padding-right-20"><strong>Filters</strong></small>
								<?php
								if (get_the_terms(get_the_ID(),'post_tag')) {
									$tags = get_the_terms(get_the_ID(),'post_tag');

									foreach ($tags as $tag) {
										?>
										<span class="badge"><a href="<?php echo esc_url(get_home_url()) ?>/expertise-tags?title_tag=<?php echo esc_attr($tag->term_id) ?>"><?php echo esc_attr($tag->name) ?></a></span>
										<?php
									}
								}
								?></h5>
							<hr />
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container-fluid bg-white">
		<div class="container">
			<div class="row">
				<!--Article content-->
				<div class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2 l-padding-b-2">
					<div class="col-md-10 col-md-offset-1">
						<div class="row"><?php nl2br(esc_attr(the_content())); ?></div>
						<div class="row">

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</article>
