<?php
/**
 * Mepchem theme bootstrap.
 *
 * @package Mepchem
 */

defined( 'ABSPATH' ) || exit;

define( 'MEPCHEM_VERSION', '1.0.0' );
define( 'MEPCHEM_DIR', get_template_directory() );
define( 'MEPCHEM_URI', get_template_directory_uri() );

require MEPCHEM_DIR . '/inc/setup.php';
require MEPCHEM_DIR . '/inc/performance.php';
require MEPCHEM_DIR . '/inc/enqueue.php';
require MEPCHEM_DIR . '/inc/post-types.php';
require MEPCHEM_DIR . '/inc/acf.php';
require MEPCHEM_DIR . '/inc/template-tags.php';
require MEPCHEM_DIR . '/inc/breadcrumbs.php';
require MEPCHEM_DIR . '/inc/page-builder.php';
require MEPCHEM_DIR . '/inc/forms.php';
require MEPCHEM_DIR . '/inc/schema.php';
