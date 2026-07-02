<?php
/**
 * Hero section for the front page.
 */

$hero_title       = get_theme_mod( 'hero_title', __( 'A living archive of Apple history', 'apple-museum' ) );
$hero_description = get_theme_mod( 'hero_description', __( 'Step into a warm, immersive museum experience shaped by stories, restoration work, and the people who keep the past in motion.', 'apple-museum' ) );
$hero_link        = get_theme_mod( 'hero_link', home_url( '/tickets/' ) );
$hero_link_text   = get_theme_mod( 'hero_link_text', __( 'Reserve tickets', 'apple-museum' ) );
$hero_image       = get_theme_mod( 'hero_image' );
?>
<section class="hero-section" aria-labelledby="hero-title">
	<div class="hero-section__content">
		<p class="hero-section__eyebrow"><?php esc_html_e( 'Apple Museum', 'apple-museum' ); ?></p>
		<h1 id="hero-title"><?php echo esc_html( $hero_title ); ?></h1>
		<p class="hero-section__description"><?php echo esc_html( $hero_description ); ?></p>
		<div class="hero-section__actions">
			<a class="button button--primary" href="<?php echo esc_url( $hero_link ); ?>"><?php echo esc_html( $hero_link_text ); ?></a>
			<a class="button button--secondary" href="<?php echo esc_url( home_url( '/about/' ) ); ?>"><?php esc_html_e( 'Explore the story', 'apple-museum' ); ?></a>
		</div>
	</div>

	<?php if ( $hero_image ) : ?>
		<div class="hero-section__media">
			<img src="<?php echo esc_url( $hero_image ); ?>" alt="" loading="eager" />
		</div>
	<?php endif; ?>
</section>
