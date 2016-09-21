<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="container-fluid clearfix">
				<div class="container l-padding-t-3 l-padding-b-10">
					<div class="row">
						<div class="col-md-5 hero-area">
							<h1>Oops!</h1>
							<hr class="error-hr" />
							<h3>This page could not be found. Please navigate to <a href="/">home</a> or try again later. </h3>
						</div>
						<div class="col-md-7 text-left">
							<span class="picon picon-0762-weather-rain-cloud huge-icon"><!-- fill --></span>
						</div>
					</div>
				</div>
				<div class="vertical-tab-bg">
					<div class="vertical-tab-bgimg light-gradient-top active">
						<img class="hero-image-sim img-responsive" src="<?php echo esc_url(get_template_directory_uri()) ?>/img/hero_elevate-product_lg.jpg" />
					</div>
				</div>
			</div>

		</main>
		<?php get_sidebar( 'content-bottom' ); ?>
	</div>
<?php 
	get_sidebar(); 
	get_footer(); 
