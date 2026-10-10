<?php
/**
 * Theme setup: supports, menus, assets.
 *
 * @package Billodig
 */

/**
 * Register theme supports and navigation menu locations.
 */
function billodig_setup() {
	load_theme_textdomain( 'billodig', get_template_directory() . '/languages' );

	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support(
		'html5',
		array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' )
	);
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 60,
			'width'       => 240,
			'flex-height' => true,
			'flex-width'  => true,
		)
	);

	register_nav_menus(
		array(
			'primary' => __( 'Primary menu (header)', 'billodig' ),
			'footer'  => __( 'Footer quick links', 'billodig' ),
		)
	);
}
add_action( 'after_setup_theme', 'billodig_setup' );

/**
 * Max content width, used by WordPress for embeds and images.
 */
function billodig_content_width() {
	$GLOBALS['content_width'] = 1200;
}
add_action( 'after_setup_theme', 'billodig_content_width', 0 );

/**
 * Front-end styles and scripts.
 */
function billodig_enqueue_assets() {
	wp_enqueue_style( 'billodig-fonts', 'https://fonts.googleapis.com/css2?family=Noto+Sans+SC:wght@400;500;700&display=swap', array(), null );
	wp_enqueue_style( 'billodig-style', get_stylesheet_uri(), array(), BILLODIG_VERSION );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'billodig_enqueue_assets' );
