<?php
/**
 * Call-to-action banner for tickets and donations.
 */
?>
<section class="cta-banner" aria-labelledby="cta-banner-title">
	<div class="cta-banner__inner">
		<div>
			<p class="cta-banner__eyebrow"><?php esc_html_e( 'Plan your visit', 'apple-museum' ); ?></p>
			<h2 id="cta-banner-title"><?php esc_html_e( 'Experience the collection and support the museum', 'apple-museum' ); ?></h2>
		</div>
		<div class="cta-banner__actions">
			<a class="button button--primary" href="<?php echo esc_url( home_url( '/tickets/' ) ); ?>"><?php esc_html_e( 'Buy tickets', 'apple-museum' ); ?></a>
			<a class="button button--secondary" href="<?php echo esc_url( home_url( '/donate/' ) ); ?>"><?php esc_html_e( 'Donate now', 'apple-museum' ); ?></a>
		</div>
	</div>
</section>
