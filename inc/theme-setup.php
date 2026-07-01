<?php
/**
 * Registers core theme support and theme configuration for Apple Museum.
 */

add_action( 'after_setup_theme', 'apple_museum_setup' );

/**
 * Sets up theme support and defaults.
 */
function apple_museum_setup() {
	load_theme_textdomain( 'apple-museum', get_template_directory() . '/languages' );

	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'apple-museum-featured', 1200, 630, true );
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'script',
			'style',
		)
	);

	add_theme_support(
		'custom-logo',
		array(
			'height'      => 100,
			'width'       => 400,
			'flex-height' => true,
			'flex-width'  => true,
		)
	);

	add_theme_support(
		'custom-background',
		array(
			'default-color' => 'f7f5ee',
		)
	);

	add_theme_support(
		'custom-header',
		array(
			'width'      => 1200,
			'height'     => 280,
			'flex-width' => true,
			'flex-height'=> true,
		)
	);

	add_theme_support( 'customize-selective-refresh-widgets' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'editor-styles' );
	add_editor_style( 'assets/css/main.css' );
	add_theme_support( 'editor-color-palette', array(
		array(
			'name'  => __( 'Background', 'apple-museum' ),
			'slug'  => 'color-bg',
			'color' => '#ffffff',
		),
		array(
			'name'  => __( 'Text', 'apple-museum' ),
			'slug'  => 'color-text',
			'color' => '#0a0a0a',
		),
		array(
			'name'  => __( 'Background Secondary', 'apple-museum' ),
			'slug'  => 'color-bg-secondary',
			'color' => '#f4f4f4',
		),
		array(
			'name'  => __( 'Background Hover', 'apple-museum' ),
			'slug'  => 'color-bg-hover',
			'color' => '#1a1a1a',
		),
		array(
			'name'  => __( 'Success', 'apple-museum' ),
			'slug'  => 'color-success',
			'color' => '#1e7f4f',
		),
		array(
			'name'  => __( 'Error', 'apple-museum' ),
			'slug'  => 'color-error',
			'color' => '#c0392b',
		),
	) );
	add_theme_support( 'editor-font-sizes', array(
		array(
			'name'      => __( 'H1', 'apple-museum' ),
			'shortName' => __( 'H1', 'apple-museum' ),
			'size'      => 56,
			'slug'      => 'h1',
		),
		array(
			'name'      => __( 'H2', 'apple-museum' ),
			'shortName' => __( 'H2', 'apple-museum' ),
			'size'      => 40,
			'slug'      => 'h2',
		),
		array(
			'name'      => __( 'H3', 'apple-museum' ),
			'shortName' => __( 'H3', 'apple-museum' ),
			'size'      => 28,
			'slug'      => 'h3',
		),
		array(
			'name'      => __( 'H4', 'apple-museum' ),
			'shortName' => __( 'H4', 'apple-museum' ),
			'size'      => 22,
			'slug'      => 'h4',
		),
		array(
			'name'      => __( 'Body', 'apple-museum' ),
			'shortName' => __( 'Body', 'apple-museum' ),
			'size'      => 18,
			'slug'      => 'body',
		),
		array(
			'name'      => __( 'Small', 'apple-museum' ),
			'shortName' => __( 'Small', 'apple-museum' ),
			'size'      => 14,
			'slug'      => 'small',
		),
	) );
	add_theme_support( 'custom-spacing' );
	add_theme_support( 'custom-line-height' );

	register_nav_menus(
		array(
			'primary' => esc_html__( 'Primary menu', 'apple-museum' ),
		)
	);
}

/**
 * Fallback for the primary menu when no menu has been assigned.
 */
function apple_museum_primary_menu_fallback() {
	wp_page_menu(
		array(
			'menu_class'  => 'menu',
			'show_home'   => true,
			'menu_id'     => 'fallback-menu',
		)
	);
}
