<?php
/**
 * Navigation template part for the Apple Museum theme.
 */
?>
<nav class="main-navigation" aria-label="<?php esc_attr_e( 'Primary menu', 'apple-museum' ); ?>">
	<button class="menu-toggle" aria-expanded="false" aria-controls="primary-menu">
		<?php esc_html_e( 'Menu', 'apple-museum' ); ?>
	</button>

	<?php
	wp_nav_menu(
		array(
			'theme_location' => 'primary',
			'container'      => false,
			'menu_class'     => 'primary-menu',
			'items_wrap'     => '<ul id="primary-menu" class="primary-menu">%3$s</ul>',
			'fallback_cb'    => 'apple_museum_primary_menu_fallback',
		)
	);
	?>
</nav>
