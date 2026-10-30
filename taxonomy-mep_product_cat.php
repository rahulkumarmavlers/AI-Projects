<?php
/**
 * Product category archive.
 *
 * @package Mepchem
 */

defined( 'ABSPATH' ) || exit;

get_header();

$mepchem_term = get_queried_object();
get_template_part( 'template-parts/flex-layouts/page_banner', null, array( 'title' => $mepchem_term->name ) );
?>
<section class="section products-section">
	<div class="container">
		<?php if ( $mepchem_term->description ) : ?>
			<div class="section-intro section-intro--left"><?php echo wp_kses_post( wpautop( $mepchem_term->description ) ); ?></div>
		<?php endif; ?>
		<?php if ( have_posts() ) : ?>
			<ul class="product-grid">
				<?php
				while ( have_posts() ) {
					the_post();
					echo '<li>';
					get_template_part( 'template-parts/components/product-card' );
					echo '</li>';
				}
				?>
			</ul>
			<?php
			the_posts_pagination(
				array(
					'prev_text' => __( 'Previous', 'mepchem' ),
					'next_text' => __( 'Next', 'mepchem' ),
				)
			);
			?>
		<?php else : ?>
			<p><?php esc_html_e( 'No products in this category yet.', 'mepchem' ); ?></p>
		<?php endif; ?>
	</div>
</section>
<?php
get_template_part( 'template-parts/flex-layouts/contact_cta' );
get_footer();
