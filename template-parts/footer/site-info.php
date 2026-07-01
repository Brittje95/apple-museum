<?php
/**
 * Footer site info template part for the Apple Museum theme.
 */
?>
<p class="site-info">
	&copy; <?php echo esc_html( date_i18n( _x( 'Y', 'copyright date format', 'apple-museum' ) ) ); ?>
	<?php echo esc_html( get_bloginfo( 'name' ) ); ?>.
	<?php esc_html_e( 'All rights reserved.', 'apple-museum' ); ?>
</p>
