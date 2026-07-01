<?php
/**
 * Search results template for the Apple Museum theme.
 */

get_header();
?>
<main class="site-main" role="main">
	<header class="page-header">
		<h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'apple-museum' ), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h1>
	</header>

	<?php
	if ( have_posts() ) {
		while ( have_posts() ) {
			the_post();
			get_template_part( 'template-parts/content' );
		}
	} else {
		get_template_part( 'template-parts/content-none' );
	}
	?>
</main>
<?php
get_footer();
