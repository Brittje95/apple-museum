<?php
/**
 * Adds theme.json-compatible support for the Apple Museum theme.
 */

add_action( 'after_setup_theme', 'apple_museum_register_theme_json_support' );

/**
 * Registers theme.json-style support for the editor.
 */
function apple_museum_register_theme_json_support() {
	add_theme_support(
		'editor-color-palette',
		array(
			array(
				'name'  => __( 'Museum Gold', 'apple-museum' ),
				'slug'  => 'museum-gold',
				'color' => '#c39b55',
			),
			array(
				'name'  => __( 'Deep Charcoal', 'apple-museum' ),
				'slug'  => 'deep-charcoal',
				'color' => '#222222',
			),
			array(
				'name'  => __( 'Soft Ivory', 'apple-museum' ),
				'slug'  => 'soft-ivory',
				'color' => '#f7f5ee',
			),
			array(
				'name'  => __( 'Museum Teal', 'apple-museum' ),
				'slug'  => 'museum-teal',
				'color' => '#4c7a75',
			),
		)
	);

	add_theme_support(
		'editor-font-sizes',
		array(
			array(
				'name'      => __( 'Small', 'apple-museum' ),
				'shortName' => __( 'S', 'apple-museum' ),
				'size'      => 14,
				'slug'      => 'small',
			),
			array(
				'name'      => __( 'Regular', 'apple-museum' ),
				'shortName' => __( 'M', 'apple-museum' ),
				'size'      => 18,
				'slug'      => 'regular',
			),
			array(
				'name'      => __( 'Large', 'apple-museum' ),
				'shortName' => __( 'L', 'apple-museum' ),
				'size'      => 24,
				'slug'      => 'large',
			),
			array(
				'name'      => __( 'Display', 'apple-museum' ),
				'shortName' => __( 'XL', 'apple-museum' ),
				'size'      => 32,
				'slug'      => 'display',
			),
		)
	);

	add_theme_support( 'custom-line-height' );
	add_theme_support( 'custom-spacing' );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'align-wide' );
}
