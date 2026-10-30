<?php
/**
 * Page template: renders the ACF Flexible Content page builder, falling back to the editor content.
 *
 * @package Mepchem
 */

defined( 'ABSPATH' ) || exit;

get_header();

while ( have_posts() ) {
	the_post();
	if ( ! mepchem_render_page_builder( get_the_ID() ) ) {
		get_template_part( 'template-parts/flex-layouts/page_banner', null, array( 'title' => get_the_title() ) );
		echo '<section class="section"><div class="container entry-content">';
		the_content();
		echo '</div></section>';
	}
}

get_footer();
