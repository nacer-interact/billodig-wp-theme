<?php
/**
 * Customizer options (Appearance > Customize > Billodig Theme Options).
 *
 * Logo, site title, tagline and Site Icon are WordPress' own controls under
 * "Site Identity"; menus are under "Menus"; static front page under
 * "Homepage Settings". This file adds everything that used to be hardcoded.
 *
 * @package Billodig
 */

/**
 * Register one setting plus its control.
 *
 * @param WP_Customize_Manager $wp_customize Customizer.
 * @param string               $id           Setting id (key in billodig_defaults()).
 * @param string               $section      Section id.
 * @param string               $label        Control label.
 * @param string               $type         text | textarea | url | email | color | image.
 * @param string               $description  Optional help text.
 */
function billodig_add_control( $wp_customize, $id, $section, $label, $type = 'text', $description = '' ) {
	$defaults = billodig_defaults();

	$sanitize = array(
		'text'     => 'sanitize_text_field',
		'textarea' => 'sanitize_textarea_field',
		'url'      => 'esc_url_raw',
		'email'    => 'sanitize_email',
		'color'    => 'sanitize_hex_color',
		'image'    => 'absint',
	);

	$wp_customize->add_setting(
		$id,
		array(
			'default'           => $defaults[ $id ] ?? '',
			'sanitize_callback' => $sanitize[ $type ],
			'transport'         => 'refresh',
		)
	);

	$args = array(
		'label'       => $label,
		'section'     => $section,
		'settings'    => $id,
		'description' => $description,
	);

	if ( 'color' === $type ) {
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $id, $args ) );
	} elseif ( 'image' === $type ) {
		$args['mime_type'] = 'image';
		$wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, $id, $args ) );
	} else {
		$args['type'] = $type;
		$wp_customize->add_control( $id, $args );
	}
}

/**
 * Register panels, sections, settings and controls.
 *
 * @param WP_Customize_Manager $wp_customize Customizer.
 */
function billodig_customize_register( $wp_customize ) {
	$wp_customize->add_panel(
		'billodig_options',
		array(
			'title'       => __( 'Billodig Theme Options', 'billodig' ),
			'description' => __( 'Texts, images, contact details and colours used across the site. Leave a field as it is to keep the default.', 'billodig' ),
			'priority'    => 30,
		)
	);

	/* ---- Homepage hero --------------------------------------------- */
	$wp_customize->add_section( 'billodig_hero', array( 'title' => __( 'Homepage: Hero banner', 'billodig' ), 'panel' => 'billodig_options' ) );
	billodig_add_control( $wp_customize, 'hero_title', 'billodig_hero', __( 'Headline', 'billodig' ) );
	billodig_add_control( $wp_customize, 'hero_tagline', 'billodig_hero', __( 'Tagline under the headline', 'billodig' ) );
	billodig_add_control( $wp_customize, 'hero_image', 'billodig_hero', __( 'Background image', 'billodig' ), 'image', __( 'Wide photo, about 1600 x 700 px. Leave empty to keep the bundled image.', 'billodig' ) );

	/* ---- Homepage: Machinery Products tiles ------------------------ */
	$wp_customize->add_section( 'billodig_tiles', array( 'title' => __( 'Homepage: Machinery Products', 'billodig' ), 'panel' => 'billodig_options' ) );
	billodig_add_control( $wp_customize, 'products_kicker', 'billodig_tiles', __( 'Section label (Chinese)', 'billodig' ) );
	billodig_add_control( $wp_customize, 'products_title', 'billodig_tiles', __( 'Section title', 'billodig' ) );
	for ( $i = 1; $i <= 5; $i++ ) {
		/* translators: %d: tile number */
		billodig_add_control( $wp_customize, "tile_{$i}_en", 'billodig_tiles', sprintf( __( 'Tile %d: English name', 'billodig' ), $i ) );
		/* translators: %d: tile number */
		billodig_add_control( $wp_customize, "tile_{$i}_zh", 'billodig_tiles', sprintf( __( 'Tile %d: Chinese name', 'billodig' ), $i ) );
		/* translators: %d: tile number */
		billodig_add_control( $wp_customize, "tile_{$i}_url", 'billodig_tiles', sprintf( __( 'Tile %d: link', 'billodig' ), $i ), 'url', 1 === $i ? __( 'Leave empty to link to the product catalogue.', 'billodig' ) : __( 'Leave empty to link to the Contact Us page.', 'billodig' ) );
	}

	/* ---- Homepage: Patents / split banner -------------------------- */
	$wp_customize->add_section( 'billodig_split', array( 'title' => __( 'Homepage: Patents banner', 'billodig' ), 'panel' => 'billodig_options' ) );
	billodig_add_control( $wp_customize, 'patents_kicker', 'billodig_split', __( 'Section label (Chinese)', 'billodig' ) );
	billodig_add_control( $wp_customize, 'patents_title', 'billodig_split', __( 'Section title', 'billodig' ) );
	billodig_add_control( $wp_customize, 'split_image', 'billodig_split', __( 'Photo', 'billodig' ), 'image' );
	billodig_add_control( $wp_customize, 'split_kicker', 'billodig_split', __( 'Panel heading', 'billodig' ), 'textarea' );
	billodig_add_control( $wp_customize, 'split_text', 'billodig_split', __( 'Panel text', 'billodig' ), 'textarea' );

	/* ---- Inner-page banners ---------------------------------------- */
	$wp_customize->add_section( 'billodig_banners', array( 'title' => __( 'Page banners', 'billodig' ), 'panel' => 'billodig_options' ) );
	billodig_add_control( $wp_customize, 'banner_tag', 'billodig_banners', __( 'Banner overline text', 'billodig' ), 'text', __( 'Small text above the title on Contact Us, News & Events, About Us and standard pages.', 'billodig' ) );
	billodig_add_control( $wp_customize, 'banner_image', 'billodig_banners', __( 'Banner image', 'billodig' ), 'image', __( 'Used behind the title on inner pages.', 'billodig' ) );
	billodig_add_control( $wp_customize, 'product_banner_image', 'billodig_banners', __( 'Products banner photo', 'billodig' ), 'image', __( 'Excavator photo in the black banner on Products & Services and product pages.', 'billodig' ) );

	/* ---- Contact details ------------------------------------------- */
	$wp_customize->add_section( 'billodig_contact', array( 'title' => __( 'Contact details', 'billodig' ), 'panel' => 'billodig_options' ) );
	billodig_add_control( $wp_customize, 'phone', 'billodig_contact', __( 'Phone / WeChat number', 'billodig' ), 'text', __( 'Shown in the footer and on Contact Us; also used for the call link.', 'billodig' ) );
	billodig_add_control( $wp_customize, 'whatsapp', 'billodig_contact', __( 'WhatsApp number', 'billodig' ), 'text', __( 'Include the country code. Used for the wa.me chat link.', 'billodig' ) );
	billodig_add_control( $wp_customize, 'contact_email', 'billodig_contact', __( 'Public email address', 'billodig' ), 'email', __( 'Shown on Contact Us. Empty = the site admin email (Settings > General).', 'billodig' ) );
	billodig_add_control( $wp_customize, 'inquiry_email', 'billodig_contact', __( 'Send enquiries to', 'billodig' ), 'email', __( 'Where Contact Us form messages are delivered. Empty = the site admin email.', 'billodig' ) );
	billodig_add_control( $wp_customize, 'office_china', 'billodig_contact', __( 'China office (Contact Us page)', 'billodig' ), 'textarea', __( 'One line per row.', 'billodig' ) );
	billodig_add_control( $wp_customize, 'office_ethiopia', 'billodig_contact', __( 'Ethiopia office (Contact Us page)', 'billodig' ), 'textarea' );

	/* ---- Footer ----------------------------------------------------- */
	$wp_customize->add_section( 'billodig_footer', array( 'title' => __( 'Footer', 'billodig' ), 'panel' => 'billodig_options', 'description' => __( 'The Quick Links column is a menu: assign one to "Footer quick links" under Menus.', 'billodig' ) ) );
	billodig_add_control( $wp_customize, 'footer_about', 'billodig_footer', __( 'About text', 'billodig' ), 'textarea' );
	billodig_add_control( $wp_customize, 'footer_office_1', 'billodig_footer', __( 'Office line 1', 'billodig' ) );
	billodig_add_control( $wp_customize, 'footer_office_2', 'billodig_footer', __( 'Office line 2', 'billodig' ) );
	billodig_add_control( $wp_customize, 'footer_copyright', 'billodig_footer', __( 'Copyright text', 'billodig' ), 'text', __( 'The "©" sign and current year are added automatically.', 'billodig' ) );

	/* ---- Social links ---------------------------------------------- */
	$wp_customize->add_section( 'billodig_social', array( 'title' => __( 'Social links', 'billodig' ), 'panel' => 'billodig_options', 'description' => __( 'Footer icons. Clear a field to hide that icon.', 'billodig' ) ) );
	foreach ( billodig_social_networks() as $key => $network ) {
		billodig_add_control( $wp_customize, 'social_' . $key, 'billodig_social', $network[0], 'url' );
	}

	/* ---- Colours ----------------------------------------------------- */
	$wp_customize->add_section( 'billodig_colors', array( 'title' => __( 'Colours', 'billodig' ), 'panel' => 'billodig_options' ) );
	billodig_add_control( $wp_customize, 'color_red', 'billodig_colors', __( 'Accent red (buttons, active links)', 'billodig' ), 'color' );
	billodig_add_control( $wp_customize, 'color_red_dark', 'billodig_colors', __( 'Accent red, dark shade', 'billodig' ), 'color' );
	billodig_add_control( $wp_customize, 'color_blue', 'billodig_colors', __( 'Blue (hero diagonal, headings)', 'billodig' ), 'color' );
	billodig_add_control( $wp_customize, 'color_blue_dark', 'billodig_colors', __( 'Blue, dark shade', 'billodig' ), 'color' );
	billodig_add_control( $wp_customize, 'color_ink', 'billodig_colors', __( 'Black (header, footer, tables)', 'billodig' ), 'color' );
}
add_action( 'customize_register', 'billodig_customize_register' );

/**
 * Print colour overrides. Only colours that differ from the defaults are output,
 * so an untouched site gets no extra CSS.
 */
function billodig_customizer_css() {
	$map = array(
		'color_red'       => '--red',
		'color_red_dark'  => '--red-dark',
		'color_blue'      => '--blue',
		'color_blue_dark' => '--blue-dark',
		'color_ink'       => '--ink',
	);

	$defaults = billodig_defaults();
	$rules    = '';
	foreach ( $map as $key => $var ) {
		$value = sanitize_hex_color( billodig_mod( $key ) );
		if ( $value && strtolower( $value ) !== strtolower( $defaults[ $key ] ) ) {
			$rules .= $var . ':' . $value . ';';
		}
	}

	if ( $rules ) {
		wp_add_inline_style( 'billodig-style', ':root{' . $rules . '}' );
	}
}
add_action( 'wp_enqueue_scripts', 'billodig_customizer_css', 20 );
