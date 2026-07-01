<?php
/**
 * Registers custom post types for the Apple Museum theme.
 */

// Register custom post types during init so WordPress can recognize them early.
add_action( 'init', 'apple_museum_register_post_types' );

/**
 * Registers the theme's custom post types.
 */
function apple_museum_register_post_types() {
	$wishlist_labels = array(
		'name'                  => __( 'Wishlist Items', 'apple-museum' ),
		'singular_name'         => __( 'Wishlist Item', 'apple-museum' ),
		'add_new'               => __( 'Add New', 'apple-museum' ),
		'add_new_item'          => __( 'Add New Wishlist Item', 'apple-museum' ),
		'edit_item'             => __( 'Edit Wishlist Item', 'apple-museum' ),
		'new_item'              => __( 'New Wishlist Item', 'apple-museum' ),
		'view_item'             => __( 'View Wishlist Item', 'apple-museum' ),
		'search_items'          => __( 'Search Wishlist', 'apple-museum' ),
		'not_found'             => __( 'No wishlist items found', 'apple-museum' ),
		'not_found_in_trash'    => __( 'No wishlist items found in Trash', 'apple-museum' ),
		'all_items'             => __( 'All Wishlist Items', 'apple-museum' ),
		'menu_name'             => __( 'Wishlist', 'apple-museum' ),
	);

	$story_labels = array(
		'name'                  => __( 'Stories', 'apple-museum' ),
		'singular_name'         => __( 'Story', 'apple-museum' ),
		'add_new'               => __( 'Add New', 'apple-museum' ),
		'add_new_item'          => __( 'Add New Story', 'apple-museum' ),
		'edit_item'             => __( 'Edit Story', 'apple-museum' ),
		'new_item'              => __( 'New Story', 'apple-museum' ),
		'view_item'             => __( 'View Story', 'apple-museum' ),
		'search_items'          => __( 'Search Stories', 'apple-museum' ),
		'not_found'             => __( 'No stories found', 'apple-museum' ),
		'not_found_in_trash'    => __( 'No stories found in Trash', 'apple-museum' ),
		'all_items'             => __( 'All Stories', 'apple-museum' ),
		'menu_name'             => __( 'Stories', 'apple-museum' ),
	);

	register_post_type(
		'museum_wishlist',
		array(
			'labels'             => $wishlist_labels,
			'public'             => true, // Make content available on the front end.
			'show_in_rest'       => true, // Enable block editor and REST API support.
			'has_archive'        => true, // Provide an archive page at /wishlist/.
			'rewrite'            => array( 'slug' => 'wishlist' ), // Use a readable URL base.
			'supports'           => array( 'title', 'editor', 'excerpt', 'thumbnail', 'custom-fields' ), // Enable core editor features.
			'menu_position'      => 5, // Place below default dashboard items.
			'menu_icon'          => 'dashicons-heart', // Use a heart icon for the admin menu.
			'taxonomies'         => array( 'wishlist_category' ), // Associate this CPT with its taxonomy.
		)
	);

	register_post_type(
		'museum_story',
		array(
			'labels'             => $story_labels,
			'public'             => true, // Make content available on the front end.
			'show_in_rest'       => true, // Enable block editor and REST API support.
			'has_archive'        => true, // Provide an archive page at /stories/.
			'rewrite'            => array( 'slug' => 'stories' ), // Use a readable URL base.
			'supports'           => array( 'title', 'editor', 'excerpt', 'thumbnail', 'custom-fields' ), // Enable core editor features.
			'menu_position'      => 6, // Place below Wishlist in the admin menu.
			'menu_icon'          => 'dashicons-book', // Use a book icon for the admin menu.
			'taxonomies'         => array( 'story_category' ), // Associate this CPT with its taxonomy.
		)
	);
}
