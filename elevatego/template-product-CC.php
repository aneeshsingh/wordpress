<?php
/*
 *
 * Template Name: Product CC CTA
 *
 * @package Wordpress
 *
*/

get_header(); ?>
	<div id="primary">
		<main id="main" class="site-main" role="main">
			<?php
			$query = new WP_Query(array('post_type' => 'elv_authors'));

			if ($query->have_posts()) :

				while ($query->have_posts()) : $query->the_post();

				endwhile;
				wp_reset_postdata();
			else :

			endif;

			$post = get_post();
			$content = apply_filters('the_content', $post->post_content);

			echo $content;

			?>
		</main><!-- .site-main -->
	</div><!-- .content-area -->
	<!--

	 Sticky CTA

	-->
<?php

$args = array('post_type' => 'elv_product_features', 'posts_per_page' => -1);
$loop = new WP_Query($args);
$i = 0;
$products = array();
while ($loop->have_posts()) : $loop->the_post();

	$post_id = get_the_ID();
	$all_product_categories = get_the_category(get_the_ID());

	if(is_array($all_product_categories) && is_object($all_product_categories[0])) {
		if ($all_product_categories[0]->name == 'Credit Cards') {

			$product_complete_information_array[$i]['product_data'] = elv_get_product_data_from_url_with_image($post_id);
			$product_detail_information_array[$i] = $product_complete_information_array[$i]['product_data'];
			$i++;

		}
	}

endwhile;

?>
	<div class="container-fluid sticky-cta" id="sticky-cta">
		<div class="container bg-white">
			<div class="row">
				<div class="col-xs-6 col-sm-6 col-md-4">
					<form class="form-horizontal">
						<select class="form-control" id="cta-product-select">
							<?php
							foreach ($product_detail_information_array as $product_details) {
								?>
								<option value="<?php echo isset($product_details['applynow'][0]) ? esc_attr($product_details['applynow'][0]) : '' ?>"><?php echo esc_attr($product_details['title']) ?></option>
								<?php

							} ?>
						</select>
					</form>
				</div>
				<div class="col-xs-6 col-sm-6 col-md-4">
					<ul class="list-unstyled list-inline pull-right">
						<li>
							<a href="#" class="h5 text-primary" id="cta-apply-url">Apply now</a>
						</li>
						<li><a href="<?php echo esc_url( get_home_url() ) ?>/contact-us" class="h5 text-primary">Contact us</a>
						</li>
					</ul>
				</div>
				<div class="col-xs-6 col-sm-6 col-md-4 live-chat">
					<ul class="list-unstyled list-inline pull-right">
						<li>
							<span class="picon picon-0294-phone-call-ringing inline-icon"><!-- fill --></span>
							<strong>Talk to us</strong></a>
						</li>
						<li>
							<a id="liveagent_button_online_57328000000Kz6n_cta" href="javascript://Chat" style="display: none;" onclick="liveagent.startChat('57328000000Kz6n')" class="h5"> Live chat
								<img src="<?php echo esc_attr( get_theme_mod('live_chat_image') ); ?>" class="img-circle chat-thumbnail" width="50" height="50"></a>
							<div id="liveagent_button_offline_57328000000Kz6n_cta" style="">
								<a href="<?php echo esc_url( get_home_url() ) ?>/contact-us">Request a call</a>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div><!-- /.container -->
		<script type="text/javascript">
			if (!window._laq) {
				window._laq = [];
			}
			window._laq.push(function () {
				liveagent.showWhenOnline('57328000000Kz6n', document.getElementById('liveagent_button_online_57328000000Kz6n_cta'));
				liveagent.showWhenOffline('57328000000Kz6n', document.getElementById('liveagent_button_offline_57328000000Kz6n_cta'));
			});
		</script>
		<script type="text/javascript">
			jQuery(document).ready(function () {
				jQuery('#cta-product-select').change(function () {
					jQuery('a#cta-apply-url').attr("href", jQuery(this).val());
				});
			});
		</script>
	</div>
<?php get_footer();
