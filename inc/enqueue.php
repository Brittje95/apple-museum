<?php
/**
 * Enqueues frontend stylesheets and scripts for the Apple Museum theme.
 */

add_action( 'wp_enqueue_scripts', 'apple_museum_enqueue_assets' );

/**
 * Enqueues the theme's front-end assets.
 */
function apple_museum_enqueue_assets() {
	$theme_version = wp_get_theme()->get( 'Version' );

	wp_enqueue_style(
		'apple-museum-tokens',
		get_template_directory_uri() . '/assets/css/tokens.css',
		array(),
		$theme_version
	);

	wp_enqueue_style(
		'apple-museum-style',
		get_stylesheet_uri(),
		array( 'apple-museum-tokens' ),
		$theme_version
	);

	wp_enqueue_style(
		'apple-museum-main',
		get_template_directory_uri() . '/assets/css/main.css',
		array( 'apple-museum-style', 'apple-museum-tokens' ),
		$theme_version
	);

	wp_enqueue_script(
		'apple-museum-script',
		get_template_directory_uri() . '/assets/js/main.js',
		array(),
		$theme_version,
		true
	);
}
