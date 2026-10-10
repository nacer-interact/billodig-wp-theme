<?php
/**
 * Custom post types and taxonomies.
 *
 * @package Billodig
 */

/**
 * Product custom post type — Billodig excavator catalog.
 * Same post type / meta model as the previous shared theme (billodig-mt),
 * so existing product content keeps working when this theme is activated.
 */
function billodig_register_content_types() {
	register_post_type( 'product', array(
		'labels' => array(
			'name'          => _x( 'Products', 'post type general name', 'billodig' ),
			'singular_name' => _x( 'Product', 'post type singular name', 'billodig' ),
			'add_new_item'  => __( 'Add New Product', 'billodig' ),
			'edit_item'     => __( 'Edit Product', 'billodig' ),
		),
		'public'      => true,
		'has_archive' => true,
		'rewrite'     => array( 'slug' => 'excavators' ),
		'menu_icon'   => 'dashicons-admin-tools',
		'supports'    => array( 'title', 'editor', 'thumbnail' ),
	) );

	register_taxonomy( 'product_line', 'product', array(
		'labels'            => array(
			'name'          => _x( 'Product Lines', 'taxonomy general name', 'billodig' ),
			'singular_name' => _x( 'Product Line', 'taxonomy singular name', 'billodig' ),
		),
		'public'            => true,
		'hierarchical'      => false,
		'rewrite'           => array( 'slug' => 'product-line' ),
		'show_admin_column' => true,
	) );
}
add_action( 'init', 'billodig_register_content_types' );
