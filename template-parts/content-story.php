<?php
/**
 * Shared story card/detail template part for museum stories.
 */

$story_date = get_post_meta( get_the_ID(), 'apple_museum_story_date', true );
if ( empty( $story_date ) ) {
	$story_date = get_post_meta( get_the_ID(), 'apple_museum_story_year', true );
}

$story_location = get_post_meta( get_the_ID(), 'apple_museum_story_location', true );
$story_terms     = get_the_terms( get_the_ID(), 'story_category' );
$story_classes   = array( 'story-card' );
if ( is_singular( 'museum_story' ) ) {
	$story_classes[] = 'story-card--single';
}
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( $story_classes ); ?>>
	<?php if ( has_post_thumbnail() ) : ?>
		<div class="story-card__media">
			<?php the_post_thumbnail( 'apple-museum-featured' ); ?>
		</div>
	<?php endif; ?>

	<div class="story-card__content">
		<?php if ( ! empty( $story_terms ) && ! is_wp_error( $story_terms ) ) : ?>
			<p class="story-card__meta">
				<?php echo esc_html( wp_strip_all_tags( wp_kses_post( join( wp_list_pluck( $story_terms, 'name' ), ', ' ) ) ) ); ?>
			</p>
		<?php endif; ?>

		<?php if ( $story_date ) : ?>
			<p class="story-card__date"><?php echo esc_html( $story_date ); ?></p>
		<?php endif; ?>

		<?php if ( $story_location ) : ?>
			<p class="story-card__location"><?php echo esc_html( $story_location ); ?></p>
		<?php endif; ?>

		<header class="story-card__header">
			<?php if ( is_singular( 'museum_story' ) ) : ?>
				<h1 class="story-card__title"><?php the_title(); ?></h1>
			<?php else : ?>
				<h2 class="story-card__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			<?php endif; ?>
		</header>

		<div class="story-card__body">
			<?php the_excerpt(); ?>
			<?php if ( is_singular( 'museum_story' ) ) : ?>
				<?php the_content(); ?>
			<?php endif; ?>
		</div>
	</div>
</article>
