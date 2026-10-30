<?php
/**
 * Site header.
 *
 * @package Mepchem
 */

defined( 'ABSPATH' ) || exit;

$mepchem_phone     = (string) mepchem_option( 'phone', '27 11 783 4900' );
$mepchem_email     = (string) mepchem_option( 'email', 'sales@mepchem.com' );
$mepchem_login     = mepchem_option( 'login_link', array() );
$mepchem_login_url = ! empty( $mepchem_login['url'] ) ? $mepchem_login['url'] : wp_login_url();
$mepchem_login_txt = ! empty( $mepchem_login['title'] ) ? $mepchem_login['title'] : __( 'Login', 'mepchem' );
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'mepchem' ); ?></a>

<header class="site-header">
	<div class="topbar">
		<div class="container topbar__inner">
			<ul class="topbar__list">
				<?php if ( $mepchem_phone ) : ?>
					<li><a href="<?php echo esc_url( 'tel:' . preg_replace( '/[^0-9+]/', '', $mepchem_phone ) ); ?>"><?php mepchem_the_icon( 'phone' ); ?><span class="screen-reader-text"><?php esc_html_e( 'Phone:', 'mepchem' ); ?> </span><?php echo esc_html( $mepchem_phone ); ?></a></li>
				<?php endif; ?>
				<?php if ( $mepchem_email ) : ?>
					<li><a href="<?php echo esc_url( 'mailto:' . antispambot( $mepchem_email ) ); ?>"><?php mepchem_the_icon( 'mail' ); ?><span class="screen-reader-text"><?php esc_html_e( 'Email:', 'mepchem' ); ?> </span><?php echo esc_html( antispambot( $mepchem_email ) ); ?></a></li>
				<?php endif; ?>
			</ul>
		</div>
	</div>

	<div class="container masthead">
		<a class="brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
			<img src="<?php echo esc_url( MEPCHEM_URI . '/assets/img/logo-342.webp' ); ?>" srcset="<?php echo esc_attr( MEPCHEM_URI . '/assets/img/logo-200.webp 200w, ' . MEPCHEM_URI . '/assets/img/logo-342.webp 342w, ' . MEPCHEM_URI . '/assets/img/logo.webp 684w' ); ?>" sizes="(min-width: 843px) 17.8vw, 150px" width="342" height="115" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
		</a>

		<button class="nav-toggle" type="button" aria-expanded="false" aria-controls="site-nav" data-nav-toggle>
			<?php mepchem_the_icon( 'menu', 'nav-toggle__open' ); ?>
			<?php mepchem_the_icon( 'close', 'nav-toggle__close' ); ?>
			<span class="screen-reader-text"><?php esc_html_e( 'Menu', 'mepchem' ); ?></span>
		</button>

		<div class="site-nav" id="site-nav">
			<nav class="primary-nav" aria-label="<?php esc_attr_e( 'Primary', 'mepchem' ); ?>">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'primary',
						'container'      => false,
						'menu_class'     => 'menu',
						'depth'          => 2,
						'fallback_cb'    => false,
					)
				);
				?>
			</nav>
			<a class="btn btn--login" href="<?php echo esc_url( $mepchem_login_url ); ?>"><?php echo esc_html( $mepchem_login_txt ); ?></a>
		</div>
	</div>
</header>

<main id="main" class="site-main" tabindex="-1">
