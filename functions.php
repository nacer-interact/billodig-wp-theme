<?php
/**
 * Billodig theme setup.
 */

add_action( 'after_setup_theme', function () {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
} );

add_action( 'wp_enqueue_scripts', function () {
	wp_enqueue_style( 'billodig-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Noto+Sans+SC:wght@400;500;700&display=swap', array(), null );
	wp_enqueue_style( 'billodig-style', get_stylesheet_uri(), array(), '1.0' );
} );

/**
 * Product custom post type — Billodig excavator catalog.
 * Same post type / meta model as the previous shared theme (billodig-mt),
 * so existing product content keeps working when this theme is activated.
 */
add_action( 'init', function () {
	register_post_type( 'product', array(
		'labels' => array(
			'name'          => 'Products',
			'singular_name' => 'Product',
			'add_new_item'  => 'Add New Product',
			'edit_item'     => 'Edit Product',
		),
		'public'      => true,
		'has_archive' => true,
		'rewrite'     => array( 'slug' => 'excavators' ),
		'menu_icon'   => 'dashicons-admin-tools',
		'supports'    => array( 'title', 'editor', 'thumbnail' ),
	) );

	register_taxonomy( 'product_line', 'product', array(
		'labels'            => array(
			'name'          => 'Product Lines',
			'singular_name' => 'Product Line',
		),
		'public'            => true,
		'hierarchical'      => false,
		'rewrite'           => array( 'slug' => 'product-line' ),
		'show_admin_column' => true,
	) );
} );

/**
 * Product characteristics — Secure Custom Fields field group.
 *
 * Card/hero-slot fields stay named fields (fixed position in the design).
 * Everything else lives in two repeaters so specs can be added, removed,
 * or reordered from the product edit screen with no code changes.
 */
add_action( 'acf/init', function () {
	if ( ! function_exists( 'acf_add_local_field_group' ) ) {
		return;
	}

	acf_add_local_field_group( array(
		'key'    => 'group_billodig_product',
		'title'  => 'Product Specifications',
		'fields' => array(
			array( 'key' => 'field_subtitle', 'name' => 'subtitle', 'label' => 'Category tag', 'type' => 'text', 'instructions' => 'e.g. Fuel-powered · Diesel' ),
			array( 'key' => 'field_tagline', 'name' => 'tagline', 'label' => 'Marketing tagline', 'type' => 'text' ),
			array( 'key' => 'field_is_hot', 'name' => 'is_hot', 'label' => 'Featured / HOT badge', 'type' => 'true_false' ),
			array( 'key' => 'field_working_weight', 'name' => 'working_weight', 'label' => 'Working weight', 'type' => 'text', 'instructions' => 'e.g. 34,700 kg' ),
			array( 'key' => 'field_rated_power', 'name' => 'rated_power', 'label' => 'Rated power (short)', 'type' => 'text', 'instructions' => 'e.g. 194 kW' ),
			array( 'key' => 'field_rated_power_full', 'name' => 'rated_power_full', 'label' => 'Rated power (full)', 'type' => 'text', 'instructions' => 'e.g. 194 kW (260 HP) / 2,200 rpm' ),
			array( 'key' => 'field_bucket_capacity', 'name' => 'bucket_capacity', 'label' => 'Bucket capacity', 'type' => 'text', 'instructions' => 'e.g. 1.6 m³' ),
			array( 'key' => 'field_engine_model', 'name' => 'engine_model', 'label' => 'Engine model', 'type' => 'text' ),
			array(
				'key'          => 'field_main_specifications',
				'name'         => 'main_specifications',
				'label'        => 'Main Specifications',
				'type'         => 'repeater',
				'instructions' => 'The categorized spec table (Engine, Main pump, Pilot pump, Relief valve, Speed, Tank capacity…). Rows sharing the same category are grouped together automatically.',
				'layout'       => 'table',
				'button_label' => 'Add specification row',
				'sub_fields'   => array(
					array( 'key' => 'field_main_spec_category', 'name' => 'category', 'label' => 'Category', 'type' => 'text', 'instructions' => 'e.g. Engine, Main pump, Relief valve' ),
					array( 'key' => 'field_main_spec_category_zh', 'name' => 'category_zh', 'label' => 'Category (Chinese)', 'type' => 'text', 'instructions' => 'e.g. 发动机, 主泵, 溢流阀' ),
					array( 'key' => 'field_main_spec_label', 'name' => 'label', 'label' => 'Label', 'type' => 'text' ),
					array( 'key' => 'field_main_spec_value', 'name' => 'value', 'label' => 'Value', 'type' => 'text' ),
				),
			),
			array(
				'key'          => 'field_technical_parameters',
				'name'         => 'technical_parameters',
				'label'        => 'Technical Parameters',
				'type'         => 'repeater',
				'instructions' => 'The flat dimensions / digging-geometry table.',
				'layout'       => 'table',
				'button_label' => 'Add parameter row',
				'sub_fields'   => array(
					array( 'key' => 'field_tech_param_label', 'name' => 'label', 'label' => 'Label', 'type' => 'text' ),
					array( 'key' => 'field_tech_param_value', 'name' => 'value', 'label' => 'Value', 'type' => 'text' ),
				),
			),
			array(
				'key'          => 'field_product_videos',
				'name'         => 'product_videos',
				'label'        => 'Work Videos',
				'type'         => 'repeater',
				'instructions' => 'Work/operation videos for this specific model — shown on its product page, not as a separate site section.',
				'layout'       => 'table',
				'button_label' => 'Add video',
				'sub_fields'   => array(
					array( 'key' => 'field_product_video_url', 'name' => 'video_url', 'label' => 'Video URL', 'type' => 'url', 'instructions' => 'YouTube/Vimeo link or a direct video file URL.' ),
					array( 'key' => 'field_product_video_thumbnail', 'name' => 'thumbnail', 'label' => 'Thumbnail', 'type' => 'image', 'return_format' => 'url', 'preview_size' => 'medium' ),
					array( 'key' => 'field_product_video_caption_zh', 'name' => 'caption_zh', 'label' => 'Caption (Chinese)', 'type' => 'text', 'instructions' => 'e.g. 作业视频' ),
				),
			),
		),
		'location' => array(
			array(
				array( 'param' => 'post_type', 'operator' => '==', 'value' => 'product' ),
			),
		),
	) );
} );

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
	$map = array(
		'gasoline' => '汽油挖掘机',
		'diesel'   => '柴油挖掘机',
		'gas'      => 'GAS挖掘机',
		'cable'    => '电缆式挖掘机',
		'battery'  => '电池式挖掘机',
	);
	return $map[ $slug ] ?? '';
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
