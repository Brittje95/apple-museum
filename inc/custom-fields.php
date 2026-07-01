<?php
/**
 * Defines custom field groups and save logic for the Apple Museum theme.
 */

add_action( 'init', 'apple_museum_register_custom_fields' );
add_action( 'add_meta_boxes', 'apple_museum_add_meta_boxes' );
add_action( 'save_post', 'apple_museum_save_meta_boxes' );

/**
 * Registers the theme's custom field metadata for secure storage.
 */
function apple_museum_register_custom_fields() {
	register_post_meta(
		'museum_wishlist',
		'apple_museum_wishlist_highlight',
		array(
			'show_in_rest'      => true,
			'single'            => true,
			'type'              => 'string',
			'sanitize_callback' => 'sanitize_text_field',
			'auth_callback'     => 'apple_museum_meta_auth_callback',
		)
	);

	register_post_meta(
		'museum_story',
		'apple_museum_story_location',
		array(
			'show_in_rest'      => true,
			'single'            => true,
			'type'              => 'string',
			'sanitize_callback' => 'sanitize_text_field',
			'auth_callback'     => 'apple_museum_meta_auth_callback',
		)
	);

	register_post_meta(
		'post',
		'apple_museum_news_source',
		array(
			'show_in_rest'      => true,
			'single'            => true,
			'type'              => 'string',
			'sanitize_callback' => 'sanitize_text_field',
			'auth_callback'     => 'apple_museum_meta_auth_callback',
		)
	);
}

/**
 * Meta authorization callback for custom field metadata.
 */
function apple_museum_meta_auth_callback( $allowed, $meta_key, $post_id, $user_id, $cap, $caps ) {
	return current_user_can( 'edit_post', $post_id );
}

/**
 * Registers admin meta boxes for theme-specific fields.
 */
function apple_museum_add_meta_boxes() {
	add_meta_box(
		'apple_museum_wishlist_meta',
		__( 'Wishlist Highlight', 'apple-museum' ),
		'apple_museum_wishlist_meta_box_callback',
		'museum_wishlist',
		'side',
		'core'
	);

	add_meta_box(
		'apple_museum_story_meta',
		__( 'Story Location', 'apple-museum' ),
		'apple_museum_story_meta_box_callback',
		'museum_story',
		'side',
		'core'
	);

	add_meta_box(
		'apple_museum_news_meta',
		__( 'News Source', 'apple-museum' ),
		'apple_museum_news_meta_box_callback',
		'post',
		'side',
		'core'
	);
}

/**
 * Prints the wishlist highlight meta box.
 */
function apple_museum_wishlist_meta_box_callback( $post ) {
	wp_nonce_field( 'apple_museum_save_meta', 'apple_museum_meta_nonce' );
	$value = get_post_meta( $post->ID, 'apple_museum_wishlist_highlight', true );
	?>
	<p>
		<label for="apple_museum_wishlist_highlight"><?php esc_html_e( 'Short highlight text for this wishlist item.', 'apple-museum' ); ?></label>
	</p>
	<p>
		<input type="text" id="apple_museum_wishlist_highlight" name="apple_museum_wishlist_highlight" value="<?php echo esc_attr( $value ); ?>" class="widefat" />
	</p>
	<?php
}

/**
 * Prints the story location meta box.
 */
function apple_museum_story_meta_box_callback( $post ) {
	wp_nonce_field( 'apple_museum_save_meta', 'apple_museum_meta_nonce' );
	$value = get_post_meta( $post->ID, 'apple_museum_story_location', true );
	?>
	<p>
		<label for="apple_museum_story_location"><?php esc_html_e( 'Where this story is located or originated.', 'apple-museum' ); ?></label>
	</p>
	<p>
		<input type="text" id="apple_museum_story_location" name="apple_museum_story_location" value="<?php echo esc_attr( $value ); ?>" class="widefat" />
	</p>
	<?php
}

/**
 * Prints the news source meta box.
 */
function apple_museum_news_meta_box_callback( $post ) {
	wp_nonce_field( 'apple_museum_save_meta', 'apple_museum_meta_nonce' );
	$value = get_post_meta( $post->ID, 'apple_museum_news_source', true );
	?>
	<p>
		<label for="apple_museum_news_source"><?php esc_html_e( 'Source or publisher for this news article.', 'apple-museum' ); ?></label>
	</p>
	<p>
		<input type="text" id="apple_museum_news_source" name="apple_museum_news_source" value="<?php echo esc_attr( $value ); ?>" class="widefat" />
	</p>
	<?php
}

/**
 * Saves custom field meta box values.
 */
function apple_museum_save_meta_boxes( $post_id ) {
	if ( ! isset( $_POST['apple_museum_meta_nonce'] ) ) {
		return;
	}

	if ( ! wp_verify_nonce( $_POST['apple_museum_meta_nonce'], 'apple_museum_save_meta' ) ) {
		return;
	}

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	$meta_fields = array(
		'apple_museum_wishlist_highlight',
		'apple_museum_story_location',
		'apple_museum_news_source',
	);

	foreach ( $meta_fields as $field ) {
		if ( array_key_exists( $field, $_POST ) ) {
			$clean_value = sanitize_text_field( wp_unslash( $_POST[ $field ] ) );
			update_post_meta( $post_id, $field, $clean_value );
		}
	}
}
