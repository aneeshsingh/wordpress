<?php
/**
 * The template part for displaying results in search pages
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

$background_image = elv_get_image_url($post->ID);

?>
	<div class="container l-padding-b-1">
		<div class="row bg-white">
			<div class="col-md-4 padding-0">
				<a class="text-default" style="overflow: auto;" href="<?php echo esc_url(get_permalink()); ?>"><img class="img-responsive center-block" src="<?php echo esc_url($background_image); ?>" alt="<?php echo esc_attr(get_the_title()); ?>"></a>
			</div>
			<div class="col-md-8">
				<a class="text-default" style="overflow: auto;" href="<?php echo esc_url(get_permalink()); ?>"></a>
					<h4><?php echo esc_attr( get_the_title() ); ?></h4>
					<?php elv_twentysixteen_excerpt(); ?>
					<p><?php
					$all_tags = get_the_tags($post->ID);

					if (!empty($all_tags)) {
						$tagcount = 0;
						foreach ($all_tags as $tag) {
							?>
							<span class="badge"><a href="<?php echo esc_url( get_home_url() ) ?>/expertise-tags?title_tag=<?php echo esc_attr( $tag->term_id ) ?>" class="text-default"><?php echo esc_attr( $tag->name ); ?></a></span>
						<?php }
					} ?></p>

			</div>
		</div>
	</div>
