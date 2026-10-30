<?php
/**
 * Not found.
 *
 * @package Mepchem
 */

defined( 'ABSPATH' ) || exit;

get_header();

get_template_part( 'template-parts/flex-layouts/page_banner', null, array( 'title' => __( 'Page not found', 'mepchem' ) ) );
?>
<section class="section">
	<div class="container rich-text--narrow">
		<p><?php esc_html_e( 'The page you are looking for has moved or no longer exists.', 'mepchem' ); ?></p>
		<?php get_search_form(); ?>
		<p><a class="btn" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Back to home', 'mepchem' ); ?></a></p>
	</div>
</section>
<?php
get_footer();
