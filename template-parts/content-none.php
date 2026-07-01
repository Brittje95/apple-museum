<?php
/**
 * Empty state template part for the Apple Museum theme.
 */
?>
<section class="no-results not-found">
	<header class="page-header">
		<h1><?php esc_html_e( 'Nothing Found', 'apple-museum' ); ?></h1>
	</header>

	<div class="page-content">
		<p><?php esc_html_e( 'It seems we can’t find what you’re looking for. Perhaps searching can help.', 'apple-museum' ); ?></p>
		<?php get_search_form(); ?>
	</div>
</section>
