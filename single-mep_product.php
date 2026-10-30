<?php
/**
 * Single product.
 *
 * Product data comes from the Product Details field group; an optional page builder
 * on the product can append extra layouts after the description.
 *
 * @package Mepchem
 */

defined( 'ABSPATH' ) || exit;

get_header();

while ( have_posts() ) :
	the_post();
	$mepchem_product_id = get_the_ID();
	$mepchem_note       = (string) mepchem_field( 'price_note', $mepchem_product_id, '' );

	get_template_part(
		'template-parts/flex-layouts/page_banner',
		null,
		array(
			'title'       => mepchem_option( 'product_banner_title', __( 'Product Page', 'mepchem' ) ),
			'heading_tag' => 'p',
		)
	);
	?>
	<article <?php post_class( 'section product' ); ?>>
		<div class="container">
			<div class="product__top">
				<?php get_template_part( 'template-parts/components/product-gallery', null, array( 'product_id' => $mepchem_product_id ) ); ?>
				<div class="product__summary">
					<h1 class="product__title"><?php echo wp_kses( mepchem_shy( get_the_title() ), array() ); ?></h1>
					<div class="product__price">
						<?php mepchem_product_price( $mepchem_product_id, 'summary' ); ?>
						<?php if ( $mepchem_note ) : ?>
							<span class="pill"><?php echo esc_html( $mepchem_note ); ?></span>
						<?php endif; ?>
					</div>
					<?php if ( has_excerpt() ) : ?>
						<p class="product__excerpt"><?php echo esc_html( get_the_excerpt() ); ?></p>
					<?php endif; ?>
					<?php get_template_part( 'template-parts/components/quote-form', null, array( 'product_id' => $mepchem_product_id ) ); ?>
				</div>
			</div>

			<div class="product__description entry-content">
				<?php the_content(); ?>
			</div>

			<div class="product__specs">
				<?php
				get_template_part( 'template-parts/components/analysis-table', null, array( 'product_id' => $mepchem_product_id ) );
				get_template_part( 'template-parts/components/product-documents', null, array( 'product_id' => $mepchem_product_id ) );
				?>
			</div>
		</div>
	</article>
	<?php
	mepchem_render_page_builder( $mepchem_product_id );

	get_template_part(
		'template-parts/flex-layouts/products_grid',
		null,
		array(
			'title'       => mepchem_option( 'related_title', __( 'Other Product', 'mepchem' ) ),
			'intro'       => mepchem_option( 'related_intro', '' ),
			'count'       => 3,
			'price_style' => 'inline',
			'exclude'     => $mepchem_product_id,
			'variant'     => 'related',
		)
	);
endwhile;

get_template_part( 'template-parts/flex-layouts/contact_cta' );
get_footer();
