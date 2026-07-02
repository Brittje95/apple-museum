<?php
/**
 * Single museum story template for the Apple Museum theme.
 *
 * Renders a single museum_story entry through the shared content-story partial.
 */

get_header();

while ( have_posts() ) {
	the_post();
	?>
	<main id="primary" class="site-main">
		<?php get_template_part( 'template-parts/content-story', 'single' ); ?>
	</main>
	<?php
}

get_footer();
