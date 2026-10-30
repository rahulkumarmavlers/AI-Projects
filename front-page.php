<?php
/**
 * Front page: the static home page's page builder.
 *
 * @package Mepchem
 */

defined( 'ABSPATH' ) || exit;

if ( 'page' !== get_option( 'show_on_front' ) ) {
	get_template_part( 'home' );
	return;
}

get_template_part( 'page' );
