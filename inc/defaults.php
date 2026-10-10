<?php
/**
 * Default values for every Customizer option.
 *
 * Each default equals the text/link that used to be hardcoded in the
 * templates, so a fresh install renders exactly as before until someone
 * edits a value in Appearance > Customize.
 *
 * @package Billodig
 */

/**
 * All theme-mod defaults, keyed by setting id.
 *
 * @return array<string,string>
 */
function billodig_defaults() {
	return array(
		// Homepage hero.
		'hero_title'         => __( 'Billodig Construction Machinery', 'billodig' ),
		'hero_tagline'       => __( 'Hydraulic crawler excavators', 'billodig' ),
		'hero_image'         => '',

		// Inner-page banners.
		'banner_tag'         => __( 'THE MOST FUEL-EFFICIENT EXCAVATOR', 'billodig' ),
		'banner_image'       => '',
		'product_banner_image' => '',

		// Homepage: Machinery Products.
		'products_kicker'    => _x( '机械产品', 'Chinese text: products_kicker', 'billodig' ),
		'products_title'     => __( 'Machinery Products', 'billodig' ),
		'tile_1_en'          => __( 'Excavators', 'billodig' ),
		'tile_1_zh'          => _x( '挖掘机', 'Chinese text: tile_1_zh', 'billodig' ),
		'tile_1_url'         => '',
		'tile_2_en'          => __( 'Loaders', 'billodig' ),
		'tile_2_zh'          => _x( '装载机', 'Chinese text: tile_2_zh', 'billodig' ),
		'tile_2_url'         => '',
		'tile_3_en'          => __( 'Attachments', 'billodig' ),
		'tile_3_zh'          => _x( '工程机械属具', 'Chinese text: tile_3_zh', 'billodig' ),
		'tile_3_url'         => '',
		'tile_4_en'          => __( 'Used Excavators', 'billodig' ),
		'tile_4_zh'          => _x( '二手挖掘机', 'Chinese text: tile_4_zh', 'billodig' ),
		'tile_4_url'         => '',
		'tile_5_en'          => __( 'Excavator Parts', 'billodig' ),
		'tile_5_zh'          => _x( '挖掘机配件', 'Chinese text: tile_5_zh', 'billodig' ),
		'tile_5_url'         => '',

		// Homepage: Patents / split banner.
		'patents_kicker'     => __( 'BILLODIG专利', 'billodig' ),
		'patents_title'      => __( 'Billodig Patents', 'billodig' ),
		'split_image'        => '',
		'split_kicker'       => __( 'THE WINNING PLAYER IN GENERAL WORK · 一家全球化工程机械装备制造商', 'billodig' ),
		'split_text'         => __( 'A global construction machinery equipment manufacturer and solutions provider, focused on overseas market expansion and localization services.', 'billodig' ),

		// Contact details.
		'phone'              => '+86 183-0593-4802',
		'whatsapp'           => '+251 929-240-509',
		'contact_email'      => '',
		'inquiry_email'      => '',
		'office_china'       => __( "Fujian Kunyi Trading Co., Ltd\nFuzhou, Fujian, China", 'billodig' ),
		'office_ethiopia'    => __( 'Addis Ababa, Ethiopia', 'billodig' ),

		// Footer.
		'footer_about'       => __( 'A Billodig excavator & heavy machinery brand of Fujian Kunyi Trading Co., Ltd (福建省鲲亿贸易有限公司), focused on fuel-efficient, reliable engineering equipment for overseas markets.', 'billodig' ),
		'footer_office_1'    => __( 'Fuzhou, Fujian, China 福建福州', 'billodig' ),
		'footer_office_2'    => __( 'Addis Ababa, Ethiopia 埃塞俄比亚亚的斯亚贝巴', 'billodig' ),
		'footer_copyright'   => __( 'Billodig — Fujian Kunyi Trading Co., Ltd. All rights reserved.', 'billodig' ),

		// Social links ('#' keeps the current placeholder, empty hides the icon).
		'social_facebook'    => '#',
		'social_twitter'     => '#',
		'social_linkedin'    => '#',
		'social_tiktok'      => '#',
		'social_wechat'      => '#',

		// Colours.
		'color_red'          => '#cf2029',
		'color_red_dark'     => '#8f1017',
		'color_blue'         => '#064a98',
		'color_blue_dark'    => '#04336e',
		'color_ink'          => '#050507',
	);
}

/**
 * Read a theme option, falling back to the packaged default.
 *
 * @param string $key Setting id from billodig_defaults().
 * @return string
 */
function billodig_mod( $key ) {
	$defaults = billodig_defaults();
	$default  = isset( $defaults[ $key ] ) ? $defaults[ $key ] : '';
	return (string) get_theme_mod( $key, $default );
}

/**
 * URL of an image option (stored as an attachment ID), or of the bundled
 * asset when nothing was chosen in the Customizer.
 *
 * @param string $key      Setting id holding an attachment ID.
 * @param string $fallback Path under assets/ used when the option is empty.
 * @return string
 */
function billodig_image_url( $key, $fallback ) {
	$id  = absint( get_theme_mod( $key, 0 ) );
	$url = $id ? wp_get_attachment_image_url( $id, 'full' ) : '';
	return $url ? $url : get_template_directory_uri() . '/assets/' . $fallback;
}
