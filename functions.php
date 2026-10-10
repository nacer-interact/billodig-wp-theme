<?php
/**
 * Billodig theme bootstrap.
 *
 * Everything lives in inc/ so this file stays a plain loader.
 *
 * @package Billodig
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'BILLODIG_VERSION', wp_get_theme( get_template() )->get( 'Version' ) );

require_once get_template_directory() . '/inc/setup.php';
require_once get_template_directory() . '/inc/post-types.php';
require_once get_template_directory() . '/inc/fields.php';
require_once get_template_directory() . '/inc/strings.php';
require_once get_template_directory() . '/inc/defaults.php';
require_once get_template_directory() . '/inc/template-tags.php';
require_once get_template_directory() . '/inc/class-billodig-walker-nav.php';
require_once get_template_directory() . '/inc/customizer.php';
