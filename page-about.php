<?php
/**
 * About page template for the Apple Museum theme.
 *
 * Displays a dynamic archive/timeline of museum_story entries and allows
 * filtering by story_category when a category is requested.
 */

get_header();

$selected_category = get_query_var( 'story_category' );
if ( empty( $selected_category ) && isset( $_GET['story_category'] ) ) {
	$selected_category = sanitize_title( wp_unslash( $_GET['story_category'] ) );
}

$about_page_url = get_permalink( get_page_by_path( 'about' ) );
if ( ! $about_page_url ) {
	$about_page_url = home_url( '/about/' );
}

$query_args = array(
	'post_type'      => 'museum_story',
	'post_status'    => 'publish',
	'posts_per_page' => 12,
	'orderby'        => 'date',
	'order'          => 'ASC',
);

if ( $selected_category ) {
	$query_args['tax_query'] = array(
		array(
			'taxonomy' => 'story_category',
			'field'    => 'slug',
			'terms'    => array( $selected_category ),
		),
	);
}

$story_query = new WP_Query( $query_args );
?>

<main id="primary" class="site-main">
	<header class="page-header">
		<?php
		while ( have_posts() ) {
			the_post();
			the_title( '<h1 class="page-title">', '</h1>' );
		}
		?>
	</header>

	<?php
	if ( have_posts() ) {
		while ( have_posts() ) {
			the_post();
			if ( get_the_content() ) {
				printf( '<div class="entry-content">%s</div>', apply_filters( 'the_content', get_the_content() ) );
			}
		}
	}
	?>

	<?php
	$categories = get_terms(
		array(
			'taxonomy'   => 'story_category',
			'hide_empty' => true,
		)
	);
	if ( ! empty( $categories ) && ! is_wp_error( $categories ) ) {
		?>
		<nav class="story-filters" aria-label="<?php esc_attr_e( 'Story categories', 'apple-museum' ); ?>">
			<a href="<?php echo esc_url( $about_page_url ); ?>" class="story-filter-link<?php echo empty( $selected_category ) ? ' is-active' : ''; ?>">
				<?php esc_html_e( 'All stories', 'apple-museum' ); ?>
			</a>
			<?php foreach ( $categories as $term ) : ?>
				<a href="<?php echo esc_url( add_query_arg( 'story_category', $term->slug, $about_page_url ) ); ?>" class="story-filter-link<?php echo $selected_category === $term->slug ? ' is-active' : ''; ?>">
					<?php echo esc_html( $term->name ); ?>
				</a>
			<?php endforeach; ?>
		</nav>
		<?php
	}
	?>

	<?php if ( $story_query->have_posts() ) : ?>
		<div class="story-timeline">
			<?php
			while ( $story_query->have_posts() ) {
				$story_query->the_post();
				get_template_part( 'template-parts/content-story' );
			}
			wp_reset_postdata();
			?>
		</div>
	<?php else : ?>
		<p><?php esc_html_e( 'No story entries are available yet.', 'apple-museum' ); ?></p>
	<?php endif; ?>
</main>

<?php get_footer(); ?>
