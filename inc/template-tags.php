<?php
/**
 * Template helpers used by header, footer and page templates.
 *
 * @package Billodig
 */

/**
 * Bilingual English/Chinese label helper, used throughout the templates.
 */
function billodig_bi( $en, $zh ) {
	printf( '<span class="en">%s</span><span class="zh">%s</span>', esc_html( $en ), esc_html( $zh ) );
}

/**
 * Chinese label for a product_line taxonomy term slug — the term names
 * themselves stay in plain English in wp-admin, this just supplies the
 * matching Chinese subtitle shown on the front end.
 */
function billodig_line_zh( $slug ) {
	return billodig_zh( 'term.' . $slug );
}

/**
 * Nav link with active-state detection.
 */
function billodig_navlink( $url, $en, $zh, $is_active ) {
	printf(
		'<a class="navlink%s" href="%s"><span class="en">%s</span><span class="zh">%s</span></a>',
		$is_active ? ' active' : '',
		esc_url( $url ),
		esc_html( $en ),
		esc_html( $zh )
	);
}

/**
 * URL of a file in the theme's assets/ folder.
 *
 * @param string $path Path relative to assets/.
 * @return string
 */
function billodig_asset_url( $path ) {
	return get_template_directory_uri() . '/assets/' . ltrim( $path, '/' );
}

/**
 * Site logo link. Uses the logo set in Appearance > Customize > Site Identity,
 * or the bundled white Billodig logo when none was chosen.
 *
 * @param string $class CSS class for the link ('logo' in the header, 'flogo' in the footer).
 */
function billodig_site_logo( $class = 'logo' ) {
	$logo_id = (int) get_theme_mod( 'custom_logo' );
	$name    = get_bloginfo( 'name' ) ? get_bloginfo( 'name' ) : 'Billodig';

	printf( '<a href="%s" class="%s">', esc_url( home_url( '/' ) ), esc_attr( $class ) );
	if ( $logo_id && wp_attachment_is_image( $logo_id ) ) {
		echo wp_get_attachment_image( $logo_id, 'full', false, array( 'class' => 'custom-logo', 'alt' => $name ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	} else {
		printf( '<img src="%s" alt="%s">', esc_url( billodig_asset_url( 'billodig-logo-white.png' ) ), esc_attr( $name ) );
	}
	echo '</a>';
}

/**
 * True on the Products & Services page and everything under it.
 *
 * @return bool
 */
function billodig_is_products_area() {
	return is_page( 'products-services' ) || is_post_type_archive( 'product' ) || is_singular( 'product' ) || is_tax( 'product_line' );
}

/**
 * Header menu shown until a menu is assigned to the "Primary menu" location.
 * Same markup the Billodig walker produces for a real menu.
 */
function billodig_primary_menu_fallback() {
	$is_products_area = billodig_is_products_area();
	?>
		<div class="navitem<?php echo is_front_page() ? ' active' : ''; ?>">
			<?php billodig_navlink( home_url( '/' ), billodig_t( 'nav.home' ), billodig_zh( 'nav.home' ), is_front_page() ); ?>
		</div>
		<div class="navitem<?php echo is_page( 'about-us' ) ? ' active' : ''; ?>">
			<?php billodig_navlink( home_url( '/about-us/' ), billodig_t( 'nav.about' ), billodig_zh( 'nav.about' ), is_page( 'about-us' ) ); ?>
		</div>
		<div class="navitem<?php echo $is_products_area ? ' active' : ''; ?>">
			<?php billodig_navlink( home_url( '/products-services/' ), billodig_t( 'nav.products' ), billodig_zh( 'nav.products' ), $is_products_area ); ?>
			<div class="navdrop">
				<a href="<?php echo esc_url( home_url( '/products-services/#fuel' ) ); ?>"><?php billodig_the_label( 'nav.fuel', '' ); ?></a>
				<a href="<?php echo esc_url( home_url( '/products-services/#electric' ) ); ?>"><?php billodig_the_label( 'nav.electric', '' ); ?></a>
				<a href="<?php echo esc_url( home_url( '/products-services/#parts' ) ); ?>"><?php billodig_the_label( 'nav.parts', '' ); ?></a>
			</div>
		</div>
		<div class="navitem<?php echo is_page( 'news-events' ) || is_singular( 'post' ) ? ' active' : ''; ?>">
			<?php billodig_navlink( home_url( '/news-events/' ), billodig_t( 'nav.news' ), billodig_zh( 'nav.news' ), is_page( 'news-events' ) || is_singular( 'post' ) ); ?>
		</div>
		<div class="navitem<?php echo is_page( 'contact-us' ) ? ' active' : ''; ?>">
			<?php billodig_navlink( home_url( '/contact-us/' ), billodig_t( 'nav.contact' ), billodig_zh( 'nav.contact' ), is_page( 'contact-us' ) ); ?>
		</div>
	<?php
}

/**
 * Footer "Quick Links" shown until a menu is assigned to the "Footer quick links" location.
 */
function billodig_footer_menu_fallback() {
	?>
			<a href="<?php echo esc_url( home_url( '/products-services/' ) ); ?>"><?php echo esc_html( billodig_t( 'nav.products' ) ); ?></a>
			<a href="<?php echo esc_url( home_url( '/contact-us/' ) ); ?>"><?php echo esc_html( billodig_t( 'nav.contact' ) ); ?></a>
	<?php
}

/**
 * Print the primary menu (real menu if assigned, otherwise the built-in default).
 */
function billodig_primary_menu() {
	wp_nav_menu(
		array(
			'theme_location' => 'primary',
			'container'      => false,
			'items_wrap'     => '%3$s',
			'depth'          => 2,
			'walker'         => new Billodig_Walker_Nav(),
			'fallback_cb'    => 'billodig_primary_menu_fallback',
		)
	);
}

/**
 * Print the footer quick links.
 */
function billodig_footer_menu() {
	wp_nav_menu(
		array(
			'theme_location' => 'footer',
			'container'      => false,
			'items_wrap'     => '%3$s',
			'depth'          => 1,
			'walker'         => new Billodig_Walker_Footer_Nav(),
			'fallback_cb'    => 'billodig_footer_menu_fallback',
		)
	);
}

/**
 * Escape a multi-line text option and join its lines with <br>.
 *
 * @param string $text Text with newline-separated lines.
 * @return string Safe HTML.
 */
function billodig_multiline( $text ) {
	return implode( '<br>', array_map( 'esc_html', preg_split( '/\R/', trim( $text ) ) ) );
}

/**
 * Email address shown on the Contact page.
 *
 * @return string
 */
function billodig_contact_email() {
	$email = billodig_mod( 'contact_email' );
	return is_email( $email ) ? $email : get_option( 'admin_email' );
}

/**
 * Where contact-form enquiries are sent.
 *
 * @return string
 */
function billodig_inquiry_email() {
	$email = billodig_mod( 'inquiry_email' );
	return is_email( $email ) ? $email : get_option( 'admin_email' );
}

/**
 * Strip a displayed phone number down to what tel: / wa.me links accept.
 *
 * @param string $number Number as typed, e.g. "+86 183-0593-4802".
 * @param bool   $plus   Keep the leading "+" (tel: links) or not (wa.me links).
 * @return string
 */
function billodig_phone_digits( $number, $plus = true ) {
	$digits = preg_replace( '/[^0-9]/', '', $number );
	return ( $plus && 0 === strpos( trim( $number ), '+' ) ? '+' : '' ) . $digits;
}

/**
 * Footer social icons: setting suffix => array( label, inline SVG ).
 *
 * @return array<string,array{0:string,1:string}>
 */
function billodig_social_networks() {
	return array(
		'facebook' => array( 'Facebook', '<svg width="15" height="15" viewBox="0 0 24 24" fill="currentColor"><path d="M13.5 21v-7.5h2.5l.4-3H13.5V8.4c0-.87.24-1.46 1.5-1.46h1.6V4.3C16.3 4.2 15.3 4 14.2 4c-2.4 0-4 1.46-4 4.15v2.35H7.7v3H10.2V21Z"></path></svg>' ),
		'twitter' => array( 'Twitter', '<svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><path d="M22 5.9c-.7.3-1.5.5-2.3.6a4 4 0 0 0 1.75-2.2 8 8 0 0 1-2.5 1 4 4 0 0 0-6.9 3.6A11.4 11.4 0 0 1 3.9 4.6a4 4 0 0 0 1.24 5.3 4 4 0 0 1-1.8-.5v.05a4 4 0 0 0 3.2 3.9 4 4 0 0 1-1.8.07 4 4 0 0 0 3.7 2.75A8 8 0 0 1 2 17.6a11.4 11.4 0 0 0 6.2 1.8c7.4 0 11.5-6.1 11.5-11.5v-.5A8 8 0 0 0 22 5.9Z"></path></svg>' ),
		'linkedin' => array( 'LinkedIn', '<svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><rect x="3" y="3" width="18" height="18" rx="2"></rect><line x1="8" y1="11" x2="8" y2="17"></line><circle cx="8" cy="8" r="0.6" fill="currentColor"></circle><path d="M12 17 L12 11 M12 13.5 C12 11.5 16 11.5 16 13.5 L16 17"></path></svg>' ),
		'tiktok' => array( 'TikTok', '<svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><path d="M16 8a4 4 0 0 1-4-4 M12 4 L12 15.5 a3.5 3.5 0 1 1-3.5-3.5 M16 8 a4 4 0 0 0 4 0"></path></svg>' ),
		'wechat' => array( 'WeChat', '<svg width="15" height="15" viewBox="0 0 24 24" fill="currentColor"><path d="M8.5 3C4.4 3 1 5.7 1 9.1c0 1.9 1.1 3.6 2.8 4.7l-.7 2.1 2.4-1.2c.7.2 1.3.3 2 .3h.3a5.6 5.6 0 0 1-.2-1.5c0-3.5 3.3-6.3 7.4-6.3h.3C14.6 4.7 11.8 3 8.5 3Zm-2.4 4a1 1 0 1 1 0 2 1 1 0 0 1 0-2Zm4.8 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2Zm5.6 2.4c-3.5 0-6.3 2.3-6.3 5.1 0 2.8 2.8 5.1 6.3 5.1.6 0 1.2-.1 1.7-.2l2 1-.6-1.8c1.4-1 2.2-2.4 2.2-4.1 0-2.8-2.8-5.1-5.3-5.1Zm-2.1 3.3a.8.8 0 1 1 0 1.6.8.8 0 0 1 0-1.6Zm4.2 0a.8.8 0 1 1 0 1.6.8.8 0 0 1 0-1.6Z"></path></svg>' ),
	);
}

/**
 * Print the footer social icons, skipping networks with an empty URL.
 */
function billodig_social_links() {
	foreach ( billodig_social_networks() as $key => $network ) {
		$url = billodig_mod( 'social_' . $key );
		if ( '' === $url ) {
			continue;
		}
		printf(
			'<a href="%s" aria-label="%s">%s</a>',
			esc_url( $url ),
			esc_attr( $network[0] ),
			$network[1] // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG.
		);
	}
}
