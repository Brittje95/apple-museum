<?php
/**
 * Default page template for the Apple Museum theme.
 */

get_header();

while ( have_posts() ) {
	the_post();
	get_template_part( 'template-parts/content-page' );
}

get_footer();
