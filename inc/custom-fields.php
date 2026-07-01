<?php
/**
 * Registers custom field groups for the Apple Museum theme.
 *
 * These field groups are defined in code so they remain version controlled
 * and can be reused if the project later switches from SCF to ACF.
 */

if ( ! function_exists( 'apple_museum_register_custom_fields' ) ) {
	/**
	 * Registers the theme's custom field groups.
	 */
	function apple_museum_register_custom_fields() {
		if ( ! function_exists( 'acf_add_local_field_group' ) ) {
			return;
		}

		acf_add_local_field_group(
			array(
				'key'                   => 'group_apple_museum_wishlist',
				'title'                 => __( 'Wishlist Item Details', 'apple-museum' ),
				'fields'                => array(
					array(
						'key'           => 'field_apple_museum_wishlist_item_name',
						'label'         => __( 'Item Name', 'apple-museum' ),
						'name'          => 'item_name',
						'type'          => 'text',
						'instructions'  => __( 'Name of the item being requested.', 'apple-museum' ),
						'required'      => 1,
						'wrapper'       => array(
							'width' => '50',
						),
					),
					array(
						'key'           => 'field_apple_museum_wishlist_description',
						'label'         => __( 'Description', 'apple-museum' ),
						'name'          => 'description',
						'type'          => 'textarea',
						'instructions'  => __( 'Describe the item and its condition or use.', 'apple-museum' ),
						'rows'          => 4,
						'wrapper'       => array(
							'width' => '50',
						),
					),
					array(
						'key'           => 'field_apple_museum_wishlist_priority',
						'label'         => __( 'Priority', 'apple-museum' ),
						'name'          => 'priority',
						'type'          => 'select',
						'instructions'  => __( 'How urgently the museum needs this item.', 'apple-museum' ),
						'choices'       => array(
							'low'    => __( 'Low', 'apple-museum' ),
							'medium' => __( 'Medium', 'apple-museum' ),
							'high'   => __( 'High', 'apple-museum' ),
						),
						'default_value' => 'medium',
						'allow_null'    => 0,
						'multiple'      => 0,
						'ui'            => 0,
						'required'      => 1,
						'wrapper'       => array(
							'width' => '50',
						),
					),
					array(
						'key'           => 'field_apple_museum_wishlist_image',
						'label'         => __( 'Image', 'apple-museum' ),
						'name'          => 'image',
						'type'          => 'image',
						'instructions'  => __( 'Add an image of the requested item.', 'apple-museum' ),
						'return_format' => 'id',
						'preview_size'  => 'medium',
						'library'       => 'all',
						'wrapper'       => array(
							'width' => '50',
						),
					),
				),
				'location'              => array(
					array(
						array(
							'param'    => 'post_type',
							'operator' => '==',
							'value'    => 'museum_wishlist',
						),
					),
				),
				'menu_order'            => 0,
				'position'              => 'normal',
				'style'                 => 'default',
				'label_placement'       => 'top',
				'instruction_placement' => 'label',
				'hide_on_screen'        => array(),
				'active'                => true,
				'description'           => '',
				'show_in_rest'          => 0,
			)
		);

		acf_add_local_field_group(
			array(
				'key'                   => 'group_apple_museum_story',
				'title'                 => __( 'Story Details', 'apple-museum' ),
				'fields'                => array(
					array(
						'key'           => 'field_apple_museum_story_title',
						'label'         => __( 'Title', 'apple-museum' ),
						'name'          => 'story_title',
						'type'          => 'text',
						'instructions'  => __( 'Short title for this story entry.', 'apple-museum' ),
						'required'      => 1,
						'wrapper'       => array(
							'width' => '50',
						),
					),
					array(
						'key'           => 'field_apple_museum_story_year',
						'label'         => __( 'Year / Date', 'apple-museum' ),
						'name'          => 'story_year',
						'type'          => 'date_picker',
						'instructions'  => __( 'Select the year or date associated with this story.', 'apple-museum' ),
						'display_format' => 'Y',
						'return_format'  => 'Y',
						'wrapper'       => array(
							'width' => '50',
						),
					),
					array(
						'key'           => 'field_apple_museum_story_description',
						'label'         => __( 'Description', 'apple-museum' ),
						'name'          => 'story_description',
						'type'          => 'wysiwyg',
						'instructions'  => __( 'Describe this story entry.', 'apple-museum' ),
						'tabs'          => 'all',
						'toolbar'       => 'full',
						'media_upload'  => 0,
						'delay'         => 1,
					),
					array(
						'key'           => 'field_apple_museum_story_image',
						'label'         => __( 'Image', 'apple-museum' ),
						'name'          => 'story_image',
						'type'          => 'image',
						'instructions'  => __( 'Add a supporting image for this story entry.', 'apple-museum' ),
						'return_format' => 'id',
						'preview_size'  => 'medium',
						'library'       => 'all',
					),
					array(
						'key'           => 'field_apple_museum_story_related_links',
						'label'         => __( 'Related Links', 'apple-museum' ),
						'name'          => 'related_links',
						'type'          => 'repeater',
						'instructions'  => __( 'Add one or more related links for this story entry.', 'apple-museum' ),
						'layout'        => 'table',
						'button_label'  => __( 'Add Link', 'apple-museum' ),
						'sub_fields'    => array(
							array(
								'key'           => 'field_apple_museum_story_related_link_url',
								'label'         => __( 'Link URL', 'apple-museum' ),
								'name'          => 'link_url',
								'type'          => 'url',
								'placeholder'   => 'https://',
							),
						),
					),
				),
				'location'              => array(
					array(
						array(
							'param'    => 'post_type',
							'operator' => '==',
							'value'    => 'museum_story',
						),
					),
				),
				'menu_order'            => 0,
				'position'              => 'normal',
				'style'                 => 'default',
				'label_placement'       => 'top',
				'instruction_placement' => 'label',
				'hide_on_screen'        => array(),
				'active'                => true,
				'description'           => '',
				'show_in_rest'          => 0,
			)
		);
	}
}

add_action( 'acf/init', 'apple_museum_register_custom_fields' );
