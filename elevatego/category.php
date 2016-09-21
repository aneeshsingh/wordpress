<?php

/*
 *
 * Template Name: Expertise Hub
 *
 * @package Wordpress
 * 'article id' and 'value'
 *
*/

$a_articles = array();
$a_featured_articles = array();
$a_tags = array();
$a_likes = array();
$args = array('posts_per_page' => -1);

$the_query = new WP_Query( $args );

if ( $the_query->have_posts() ) {
while ( $the_query->have_posts() ) {

	$the_query->the_post();

		$a_articles['ID'] = get_the_ID();
		$a_articles['meta'] = get_post_meta(get_the_ID());
		$a_articles['img'] = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()));

		if (isset($a_articles['meta']['elv_posts_featured'])) {

			if ($a_articles['meta']['elv_posts_featured'][0] == 2) {
				$a_featured_articles[get_the_ID()] = get_the_ID();

			}

		}

		$a_tag = array();
		$a_tag = get_the_tags();

		$a_likes['likes'] = (isset($a_articles['meta']['elv_posts_likes'][0]) ? $a_articles['meta']['elv_posts_likes'][0] : 0);
		$a_likes['dislikes'] = (isset($a_articles['meta']['elv_posts_dislikes'][0]) ? $a_articles['meta']['elv_posts_dislikes'][0] : 0);


}
} else{

}

wp_reset_postdata();

get_header(); ?>
<div id="primary">
	<main id="main" class="site-main" role="main">
		<div class="vertical-tab-bg">
			<div class="vertical-tab-bgimg light-gradient-top active">
				<img class="hero-image-sim img-responsive" src="<?php echo esc_url(wp_get_attachment_url(the_post_thumbnail())); ?>" />
			</div>
		</div>
		<div class="container l-padding-b-10">
			<div class="row">
				<div class="col-md-6 hero-area text-default">
					<h1>Expertise hub</h1>
				</div>
			</div>
		</div>
		<div class="row">
			<!--

			 New and noteworthy

			-->
			<div class="container-fluid bg-white l-padding-b-2">
				<div class="container">
					<div class="col-md-12 l-padding-b-2 pull-up-1-5em">
						<div class="col-md-2 feature-expertise-label">New & noteworthy</div>
					</div>
					<?php


					$args = array('posts_per_page' => 6 ,
						'orderby'=> 'date',
						'order'   => 'DESC'
					);

					$the_query = new WP_Query( $args );

					if ( $the_query->have_posts() ) {
						while ($the_query->have_posts()) {
							$the_query->the_post();
							echo '<div class="col-xs-6 col-sm-4 col-md-2"><div class="expertise-thumb"><a href="' . esc_url(get_permalink(get_the_ID())) . '" class="text-default"><img src="' . esc_url(wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()))) . '" class="img-responsive" /></a></div>';
							echo '<div class="expertise-title"><p><a href="' . esc_url(get_permalink(get_the_ID())) . '" class="text-default">' . esc_attr(get_the_title()) . '</a></p></div></div>';
						}
					}
					wp_reset_postdata();
					?>
				</div>
			</div>
			<!--

			 Featured article

			-->
			<div class="container-fluid bg-grey l-padding-t-2 l-padding-b-2">
				<div class="container trending-article">
					<h2>Featured</h2>
					<?php
					$count = 0;

					foreach ($a_featured_articles as $a_featured_article) {

					$all_tags = get_the_terms($a_featured_article,'post_tag');

					?>
					<?php if ($count == 0) { ?>
					<div class="col-sm-12 col-md-6 primary-article dark-gradient-btm" style="background-image: url(<?php echo esc_url(wp_get_attachment_url(get_post_thumbnail_id($a_featured_article))) ?>)">
						<div class="col-md-11 caption">
							<h3>
								<a href="<?php echo esc_url(get_permalink($a_featured_article)) ?>" class="text-white"><?php echo esc_attr(get_the_title($a_featured_article)) ?></a>
							</h3>
							<div>
								<?php if (!empty($all_tags)) {
									$tagcount = 0;
									foreach ($all_tags as $tag) {
										?>
										<span class="badge"><a href="<?php echo esc_url(get_home_url()) ?>/expertise-tags?title_tag=<?php echo esc_attr($tag->term_id) ?>" class="text-default"><?php echo esc_attr($tag->name); ?></a></span>
										<?php if ($tagcount++ >= 2) {
											break;
										}
									}
								} ?>
							</div>
							<div class="social-action">
								<h4 class="pull-left">
									<span class="picon picon-0663-like-thumb-up-vote inline-icon thumbs-up"><!-- fill --></span>
									<span class="thumbs-up-numvote"><?php echo esc_attr(get_post_meta($a_featured_article,'elv_posts_likes',true)); ?></span>
								</h4>
								<h4 class="pull-left">
									<span class="picon picon-0664-dislike-thumb-down-vote inline-icon thumbs-down"><!-- fill --></span>
									<span class="thumbs-down-numvote"><?php echo esc_attr(get_post_meta($a_featured_article,'elv_posts_dislikes',true)); ?></span>
								</h4>
							</div>
						</div>
					</div>
					<div class="col-sm-12 col-md-6">
						<?php } else { ?>
							<div class="col-sm-12 col-md-12 secondary-article" style="background-image: url(<?php echo esc_url(wp_get_attachment_url(get_post_thumbnail_id($a_featured_article))) ?>)">
								<div class="col-md-9 col-md-offset-4 bg-white caption">
									<h3>
										<a href="<?php echo esc_url(get_permalink($a_featured_article)) ?>" class="text-default"><?php echo esc_attr(get_the_title($a_featured_article))?></a>
									</h3>
									<div>
										<?php if (!empty($all_tags)) {
											$tagcount = 0;
											foreach ($all_tags as $tag) {

												?>
												<span class="badge"><a href="<?php echo esc_url(get_home_url()) ?>/expertise-tags?title_tag=<?php echo esc_attr($tag->term_id) ?>" class="text-default"><?php echo esc_attr($tag->name); ?></a></span>
												<?php if ($tagcount++ >= 2) {
													break;
												}
											}
										} ?>
									</div>
									<div class="social-action">
										<h4 class="pull-left">
											<span class="picon picon-0663-like-thumb-up-vote inline-icon thumbs-up"><!-- fill --></span>
											<span class="thumbs-up-numvote"><?php echo esc_attr(get_post_meta($a_featured_article,'elv_posts_likes',true)); ?></span>
										</h4>
										<h4 class="pull-left">
											<span class="picon picon-0664-dislike-thumb-down-vote inline-icon thumbs-down"><!-- fill --></span>
											<span class="thumbs-down-numvote"><?php echo esc_attr(get_post_meta($a_featured_article,'elv_posts_dislikes',true)); ?></span>
										</h4>
									</div>
								</div>
							</div>
						<?php }
						if ($count++ >= 3) {
							break;
						};
						?>
						<?php } ?>
					</div>
				</div>
			</div>
		
			<!--

			Popular tags

			-->
			<div class="container-fluid bg-white l-padding-b-2">
				<div class="container popular-tags">
					<h2>Popular tags:</h2>
					<span class="tags">
						<?php


						function elv_custom_posts_per_tag($id, $post_type){

							$args = array(
								'post_type' => array($post_type),
								'posts_per_page' => -1,
								'tag_id' => $id
							);

							$the_query = new WP_Query( $args );
							wp_reset_query();

							return sizeof($the_query->posts);
						}

						$tags = get_tags();
						global $wp_query;
						$post_type = $wp_query->get('post');

						foreach ($tags as $tag){
							if (elv_custom_posts_per_tag($tag->term_id, $post_type) > 0) {


						?>
						<span class="badge"><a href="<?php echo esc_url(esc_url(get_home_url())) ?>/expertise-tags?title_tag=<?php echo esc_attr($tag->term_id); ?>" class="text-default"><?php echo esc_attr($tag->name); ?></a></span>

								<?php
							}
						}
						?>
					</span>
				</div>
			</div>


			<?php


			$cat_id = get_query_var('cat');

			//first get the current category ID
			$cat_id = get_query_var('cat');
			//then i get the data from the database
			$cat_data = get_option("category_$cat_id");
			//and then i just display my category image if it exists

			$filter1 = "Bank";
			$filter2 = "Borrow";
			$filter3 = "Rewards";
			$filter4 = "Expertise";


			$lifestage1 = "";
			$lifestage2 = "";
			$lifestage3 = "";
			$lifestage4 = "";

			$heading = "";
			$description = "";
			$video_cta = "";

			$video = "https://www.youtube.com/watch?v=lMJXxhRFO1k";

			if (isset($cat_data['filter1'])){
				$filter1 = $cat_data['filter1'];
			}

			if (isset($cat_data['filter2'])){
				$filter2 = $cat_data['filter2'];
			}

			if (isset($cat_data['filter3'])){
				$filter3 = $cat_data['filter3'];
			}

			if (isset($cat_data['filter4'])){
				$filter4 = $cat_data['filter4'];
			}


			if (isset($cat_data['lifestage1'])){
				$lifestage1 = $cat_data['lifestage1'];
			}

			if (isset($cat_data['lifestage2'])){
				$lifestage2 = $cat_data['lifestage2'];
			}

			if (isset($cat_data['lifestage3'])){
				$lifestage3 = $cat_data['lifestage3'];
			}

			if (isset($cat_data['lifestage4'])){
				$lifestage4 = $cat_data['lifestage4'];
			}

			if (isset($cat_data['video'])){
				$video = $cat_data['video'];
			}

			if (isset($cat_data['extra3'])){
				$heading = $cat_data['extra3'];
			}


			if (isset($cat_data['extra2'])){
				$description = $cat_data['extra2'];
			}

			if (isset($cat_data['extra1'])){
				$video_cta = $cat_data['extra1'];
			}
			$lifestage_1_id = wpcom_vip_url_to_postid( $lifestage1 );
			$lifestage_2_id = wpcom_vip_url_to_postid( $lifestage2 );
			$lifestage_3_id = wpcom_vip_url_to_postid( $lifestage3 );
			$lifestage_4_id = wpcom_vip_url_to_postid( $lifestage4 );
			?>

			<!--

			Lifestage column tiles

			-->

			<div class="container-fluid bg-grey l-padding-t-2 l-padding-b-2">
				<div class="container tile-columns static-columns">
					<h4>Your.Macquarie</h4>
					<h2>Lifestages</h2>
					<div class="row column-content">
						<div class=" col-md-3 l-padding-b-1">
							<div class="bg-blue feature-tile fixed-height-420 dark-gradient-btm" style="background: url('<?php echo esc_url(wp_get_attachment_image_src(get_post_thumbnail_id($lifestage_1_id),'large')[0])?>')">
								<div class="tile-body text-center">
									<h3 class="text-white">
										<a href="<?php echo esc_attr($lifestage1) ?>" class="text-white"><?php echo esc_attr (get_the_title($lifestage_1_id)) ?></a>
									</h3>
								</div>
							</div>
						</div>
						<div class=" col-md-3 l-padding-b-1">
							<div class="bg-blue feature-tile fixed-height-420 dark-gradient-btm" style="background: url('<?php echo esc_url(wp_get_attachment_image_src(get_post_thumbnail_id($lifestage_2_id),'large')[0]) ?>')">
								<div class="tile-body text-center">
									<h3 class="text-white">
										<a href="<?php echo esc_attr($lifestage2) ?>" class="text-white"><?php echo esc_attr (get_the_title($lifestage_2_id)) ?></a>
									</h3>
								</div>
							</div>
						</div>
						<div class=" col-md-3 l-padding-b-1">
							<div class="bg-blue feature-tile fixed-height-420 dark-gradient-btm" style="background: url('<?php echo esc_url(wp_get_attachment_image_src(get_post_thumbnail_id($lifestage_3_id),'large')[0]) ?>')">
								<div class="tile-body text-center">
									<h3 class="text-white">
										<a href="<?php echo esc_attr($lifestage3) ?>" class="text-white"><?php echo esc_attr (get_the_title($lifestage_3_id)) ?></a>
									</h3>
								</div>
							</div>
						</div>
						<div class=" col-md-3 l-padding-b-1">
							<div class="bg-blue feature-tile fixed-height-420 dark-gradient-btm" style="background: url('<?php echo esc_url(wp_get_attachment_image_src(get_post_thumbnail_id($lifestage_4_id),'large')[0]) ?>')">
								<div class="tile-body text-center">
									<h3 class="text-white">
										<a href="<?php echo esc_attr ($lifestage4) ?>" class="text-white"><?php echo esc_attr (get_the_title($lifestage_4_id)) ?></a>
									</h3>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
	</main><!-- .site-main -->
</div><!-- .content-area -->
<?php get_footer();