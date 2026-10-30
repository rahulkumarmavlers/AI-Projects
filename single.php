<?php
/**
 * Single blog article.
 *
 * @package Mepchem
 */

defined( 'ABSPATH' ) || exit;

get_header();

$mepchem_blog_page = (int) get_option( 'page_for_posts' );

while ( have_posts() ) :
	the_post();
	get_template_part(
		'template-parts/flex-layouts/page_banner',
		null,
		array( 'title' => $mepchem_blog_page ? get_the_title( $mepchem_blog_page ) : __( 'Blog', 'mepchem' ) )
	);
	?>
	<article <?php post_class( 'section article' ); ?>>
		<div class="container">
			<header class="article__header">
				<h2 class="section-title section-title--left article__title"><?php echo wp_kses( mepchem_shy( get_the_title() ), array() ); ?></h2>
				<p class="article__meta"><time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time></p>
			</header>
			<?php if ( has_post_thumbnail() ) : ?>
				<figure class="article__image">
					<?php the_post_thumbnail( 'mepchem-hero', array( 'sizes' => '(min-width: 1920px) 1520px, (min-width: 1024px) 79vw, calc(100vw - 40px)' ) ); ?>
				</figure>
			<?php endif; ?>
			<div class="entry-content">
				<?php the_content(); ?>
			</div>
			<?php
			$mepchem_cta = mepchem_field( 'article_cta', get_the_ID(), array() );
			if ( empty( $mepchem_cta['url'] ) ) {
				$mepchem_contact = (int) mepchem_option( 'contact_page' );
				$mepchem_cta     = $mepchem_contact ? array(
					'url'    => get_permalink( $mepchem_contact ),
					'title'  => __( 'Contact Us', 'mepchem' ),
					'target' => '',
				) : array();
			}
			if ( $mepchem_cta ) {
				echo '<p class="article__cta">';
				mepchem_link( $mepchem_cta, 'btn' );
				echo '</p>';
			}
			?>
		</div>
	</article>
	<?php
endwhile;

get_template_part( 'template-parts/flex-layouts/contact_cta' );
get_footer();
