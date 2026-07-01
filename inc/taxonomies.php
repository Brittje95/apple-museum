<?php
/**
 * Registers custom taxonomies for the Apple Museum theme.
 */

// Register taxonomies during init before post types are fully initialized.
add_action( 'init', 'apple_museum_register_taxonomies', 9 );

/**
 * Registers the theme's taxonomies.
 */
function apple_museum_register_taxonomies() {
	$wishlist_labels = array(
		'name'              => __( 'Wishlist Categories', 'apple-museum' ),
		'singular_name'     => __( 'Wishlist Category', 'apple-museum' ),
		'search_items'      => __( 'Search Wishlist Categories', 'apple-museum' ),
		'all_items'         => __( 'All Wishlist Categories', 'apple-museum' ),
		'parent_item'       => __( 'Parent Wishlist Category', 'apple-museum' ),
		'parent_item_colon' => __( 'Parent Wishlist Category:', 'apple-museum' ),
		'edit_item'         => __( 'Edit Wishlist Category', 'apple-museum' ),
		'update_item'       => __( 'Update Wishlist Category', 'apple-museum' ),
		'add_new_item'      => __( 'Add New Wishlist Category', 'apple-museum' ),
		'new_item_name'     => __( 'New Wishlist Category Name', 'apple-museum' ),
		'menu_name'         => __( 'Wishlist Categories', 'apple-museum' ),
	);

	$story_labels = array(
		'name'              => __( 'Story Categories', 'apple-museum' ),
		'singular_name'     => __( 'Story Category', 'apple-museum' ),
		'search_items'      => __( 'Search Story Categories', 'apple-museum' ),
		'all_items'         => __( 'All Story Categories', 'apple-museum' ),
		'parent_item'       => __( 'Parent Story Category', 'apple-museum' ),
		'parent_item_colon' => __( 'Parent Story Category:', 'apple-museum' ),
		'edit_item'         => __( 'Edit Story Category', 'apple-museum' ),
		'update_item'       => __( 'Update Story Category', 'apple-museum' ),
		'add_new_item'      => __( 'Add New Story Category', 'apple-museum' ),
		'new_item_name'     => __( 'New Story Category Name', 'apple-museum' ),
		'menu_name'         => __( 'Story Categories', 'apple-museum' ),
	);

	register_taxonomy(
		'wishlist_category',
		array( 'museum_wishlist' ),
		array(
			'labels'            => $wishlist_labels,
			'hierarchical'      => true, // Enable category-style parenting.
			'show_ui'           => true, // Show taxonomy UI in the admin menu.
			'show_admin_column' => true, // Add a taxonomy column to post list screens.
			'query_var'         => true, // Enable query var support in WP_Query.
			'rewrite'           => array( 'slug' => 'wishlist-category' ), // Use a readable taxonomy base.
			'show_in_rest'      => true, // Enable REST API and block editor support.
		)
	);

	register_taxonomy(
		'story_category',
		array( 'museum_story' ),
		array(
			'labels'            => $story_labels,
			'hierarchical'      => true, // Enable category-style parenting.
			'show_ui'           => true, // Show taxonomy UI in the admin menu.
			'show_admin_column' => true, // Add a taxonomy column to post list screens.
			'query_var'         => true, // Enable query var support in WP_Query.
			'rewrite'           => array( 'slug' => 'story-category' ), // Use a readable taxonomy base.
			'show_in_rest'      => true, // Enable REST API and block editor support.
		)
	);
}
