<section id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<?php
		if (have_posts()) { ?>
		<div id="search-container">
			<?php

			$count = 0;

			while (have_posts()) {
				the_post();

				get_template_part('template-parts/content', 'search');

			}

		} else {  ?>
			<div class="container l-padding-b-1">
				<h4 class="text-center">No results found, please try again or navigate <a href="<?php echo get_home_url(); ?>">home</a>.</h4>
			</div>
			<?php
		}
			?>
		</div><!-- /morphsearch-content -->
		<span class="morphsearch-close"></span>
	</main><!-- .site-main -->
</section><!-- .content-area -->
