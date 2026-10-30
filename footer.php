<?php
/**
 * Site footer.
 *
 * @package Mepchem
 */

defined( 'ABSPATH' ) || exit;

$mepchem_phone      = (string) mepchem_option( 'phone', '27 11 783 4900' );
$mepchem_email      = (string) mepchem_option( 'email', 'sales@mepchem.com' );
$mepchem_address    = (string) mepchem_option( 'footer_address', '' );
$mepchem_newsletter = mepchem_option( 'newsletter_form', 0 );
$mepchem_socials    = (array) mepchem_option( 'social_links', array() );
$mepchem_copyright  = (string) mepchem_option( 'copyright', '' );
if ( '' === $mepchem_copyright ) {
	/* translators: 1: year, 2: site name. */
	$mepchem_copyright = sprintf( __( 'Copyright © %1$s %2$s', 'mepchem' ), wp_date( 'Y' ), get_bloginfo( 'name' ) );
}
$mepchem_networks = array(
	'twitter'   => 'X (Twitter)',
	'instagram' => 'Instagram',
	'facebook'  => 'Facebook',
	'linkedin'  => 'LinkedIn',
	'youtube'   => 'YouTube',
);
?>
</main>

<footer class="site-footer">
	<div class="container">
		<div class="site-footer__grid">
			<section class="footer-col footer-col--newsletter" aria-labelledby="footer-newsletter">
				<h2 class="footer-title" id="footer-newsletter"><?php esc_html_e( 'Subscribe to our newsletter', 'mepchem' ); ?></h2>
				<?php mepchem_form( $mepchem_newsletter, 'form--newsletter' ); ?>
			</section>

			<section class="footer-col" aria-labelledby="footer-contact">
				<h2 class="footer-title" id="footer-contact"><?php esc_html_e( 'Contact Us', 'mepchem' ); ?></h2>
				<ul class="footer-contact">
					<?php if ( $mepchem_phone ) : ?>
						<li><a href="<?php echo esc_url( 'tel:' . preg_replace( '/[^0-9+]/', '', $mepchem_phone ) ); ?>"><?php mepchem_the_icon( 'phone' ); ?><span class="screen-reader-text"><?php esc_html_e( 'Phone:', 'mepchem' ); ?> </span><?php echo esc_html( $mepchem_phone ); ?></a></li>
					<?php endif; ?>
					<?php if ( $mepchem_email ) : ?>
						<li><a href="<?php echo esc_url( 'mailto:' . antispambot( $mepchem_email ) ); ?>"><?php mepchem_the_icon( 'mail' ); ?><span class="screen-reader-text"><?php esc_html_e( 'Email:', 'mepchem' ); ?> </span><?php echo esc_html( antispambot( $mepchem_email ) ); ?></a></li>
					<?php endif; ?>
				</ul>
			</section>

			<nav class="footer-col" aria-labelledby="footer-pages">
				<h2 class="footer-title" id="footer-pages"><?php esc_html_e( 'Pages', 'mepchem' ); ?></h2>
				<div class="footer-menus">
					<?php
					foreach ( array( 'footer', 'footer_2' ) as $mepchem_location ) {
						wp_nav_menu(
							array(
								'theme_location' => $mepchem_location,
								'container'      => false,
								'menu_class'     => 'footer-menu',
								'depth'          => 1,
								'fallback_cb'    => false,
							)
						);
					}
					?>
				</div>
			</nav>

			<section class="footer-col" aria-labelledby="footer-address">
				<h2 class="footer-title" id="footer-address"><?php esc_html_e( 'Where to find us', 'mepchem' ); ?></h2>
				<?php if ( $mepchem_address ) : ?>
					<address><?php echo wp_kses( nl2br( $mepchem_address ), mepchem_inline_kses() ); ?></address>
				<?php endif; ?>
			</section>
		</div>

		<div class="site-footer__bottom">
			<p class="copyright"><?php echo esc_html( $mepchem_copyright ); ?></p>
			<?php if ( $mepchem_socials ) : ?>
				<ul class="socials">
					<?php
					foreach ( $mepchem_socials as $mepchem_social ) :
						if ( empty( $mepchem_social['url'] ) || empty( $mepchem_networks[ $mepchem_social['network'] ] ) ) {
							continue;
						}
						?>
						<li><a href="<?php echo esc_url( $mepchem_social['url'] ); ?>" target="_blank" rel="noopener"><?php mepchem_the_icon( $mepchem_social['network'] ); ?><span class="screen-reader-text"><?php echo esc_html( $mepchem_networks[ $mepchem_social['network'] ] . ' ' . __( '(opens in a new tab)', 'mepchem' ) ); ?></span></a></li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
