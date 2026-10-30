<?php
/**
 * Blog index (the "Blog" posts page).
 *
 * @package Mepchem
 */

defined( 'ABSPATH' ) || exit;

get_header();

$mepchem_blog_page = (int) get_option( 'page_for_posts' );
get_template_part(
	'template-parts/flex-layouts/page_banner',
	null,
	array( 'title' => $mepchem_blog_page ? get_the_title( $mepchem_blog_page ) : __( 'Blog', 'mepchem' ) )
);
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
			<p><?php esc_html_e( 'No articles yet.', 'mepchem' ); ?></p>
		<?php endif; ?>
	</div>
</section>
<?php
get_template_part( 'template-parts/flex-layouts/contact_cta' );
get_footer();
