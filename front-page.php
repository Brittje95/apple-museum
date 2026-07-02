<?php
/**
 * Front page template for the Apple Museum theme.
 */

get_header();

get_template_part( 'template-parts/hero' );

?>
<main id="primary" class="site-main front-page-main">
	<?php
	if ( have_posts() ) {
		while ( have_posts() ) {
			the_post();

			if ( get_the_content() ) {
				printf( '<section class="front-page-content">%s</section>', wp_kses_post( get_the_content() ) );
			}
		}
	}
	?>
</main>

<?php
get_template_part( 'template-parts/cta-banner' );

get_footer();
