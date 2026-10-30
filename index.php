<?php
/**
 * Fallback template.
 *
 * @package Mepchem
 */

defined( 'ABSPATH' ) || exit;

get_header();

get_template_part( 'template-parts/flex-layouts/page_banner', null, array( 'title' => wp_strip_all_tags( get_the_archive_title() ) ) );
?>
<section class="section">
	<div class="container">
		<?php if ( have_posts() ) : ?>
			<div class="post-grid">
				<?php
				while ( have_posts() ) {
					the_post();
					get_template_part( 'template-parts/components/post-card' );
				}
				?>
			</div>
			<?php
			the_posts_pagination(
				array(
					'prev_text' => __( 'Previous', 'mepchem' ),
					'next_text' => __( 'Next', 'mepchem' ),
				)
			);
			?>
		<?php else : ?>
			<p><?php esc_html_e( 'Nothing found.', 'mepchem' ); ?></p>
		<?php endif; ?>
	</div>
</section>
<?php
get_footer();
