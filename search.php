<?php
/**
 * Search results.
 *
 * @package Mepchem
 */

defined( 'ABSPATH' ) || exit;

get_header();

get_template_part(
	'template-parts/flex-layouts/page_banner',
	null,
	array( 'title' => __( 'Search', 'mepchem' ) )
);
?>
<section class="section">
	<div class="container">
		<h2 class="section-title section-title--left">
			<?php
			/* translators: %s: search query. */
			echo esc_html( sprintf( __( 'Results for “%s”', 'mepchem' ), get_search_query() ) );
			?>
		</h2>
		<?php get_search_form(); ?>
		<?php if ( have_posts() ) : ?>
			<ul class="search-results">
				<?php
				while ( have_posts() ) :
					the_post();
					?>
					<li>
						<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						<p><?php echo esc_html( wp_trim_words( get_the_excerpt(), 30 ) ); ?></p>
					</li>
				<?php endwhile; ?>
			</ul>
			<?php the_posts_pagination(); ?>
		<?php else : ?>
			<p><?php esc_html_e( 'Nothing matched your search. Try different keywords.', 'mepchem' ); ?></p>
		<?php endif; ?>
	</div>
</section>
<?php
get_footer();
