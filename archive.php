<?php
/**
 * Archive template for the Apple Museum theme.
 */

get_header();
?>
<main class="site-main" role="main">
	<?php if ( have_posts() ) : ?>
		<header class="page-header">
			<h1 class="page-title"><?php post_type_archive_title(); ?></h1>
		</header>

		<?php
		while ( have_posts() ) {
			the_post();
			get_template_part( 'template-parts/content' );
		}
	else :
		get_template_part( 'template-parts/content-none' );
	endif;
	?>
</main>
<?php
get_footer();
