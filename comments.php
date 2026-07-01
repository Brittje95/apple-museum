<?php
/**
 * Comment template for the Apple Museum theme.
 */

if ( post_password_required() ) {
	return;
}
?>
<div id="comments" class="comments-area">
	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php
			printf(
				esc_html( _n( 'One comment', '%1$s comments', get_comments_number(), 'apple-museum' ) ),
				number_format_i18n( get_comments_number() )
			);
			?>
		</h2>

		<?php the_comments_navigation(); ?>

		<ol class="comment-list">
			<?php
			wp_list_comments(
				array(
					'short_ping' => true,
					'avatar_size' => 48,
				)
			);
			?>
		</ol>

		<?php the_comments_navigation(); ?>
	<?php endif; ?>

	<?php if ( ! comments_open() && get_comments_number() ) : ?>
		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'apple-museum' ); ?></p>
	<?php endif; ?>

	<?php
	comment_form(
		array(
			'class_form' => 'comment-form',
		)
	);
	?>
</div>
