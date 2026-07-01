<?php
/**
 * Site branding template part for the Apple Museum theme.
 */
?>
<div class="site-branding">
	<?php if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) : ?>
		<div class="site-logo">
			<?php the_custom_logo(); ?>
		</div>
	<?php endif; ?>

	<div class="site-title-wrapper">
		<?php if ( is_front_page() && is_home() ) : ?>
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
		<?php else : ?>
			<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></p>
		<?php endif; ?>

		<?php if ( get_bloginfo( 'description' ) ) : ?>
			<p class="site-description"><?php bloginfo( 'description' ); ?></p>
		<?php endif; ?>
	</div>
</div>
