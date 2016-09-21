<?php

/*
 *
 * Template Name: Blank Page
 *
 * @package Wordpress
 *
*/

get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main row" role="main">
        <?php
        while ( have_posts() ) : the_post();

            get_template_part( 'template-parts/content', 'page' );

            if ( comments_open() || get_comments_number() ) {
                comments_template();
            }
        endwhile;
        ?>

    </main>

    <?php get_sidebar( 'content-bottom' ); ?>

</div>
<?php get_footer();

