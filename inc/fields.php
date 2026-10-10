<?php
/**
 * Secure Custom Fields (ACF) field groups.
 *
 * @package Billodig
 */

/**
 * Product characteristics — Secure Custom Fields field group.
 *
 * Card/hero-slot fields stay named fields (fixed position in the design).
 * Everything else lives in two repeaters so specs can be added, removed,
 * or reordered from the product edit screen with no code changes.
 */
function billodig_register_product_fields() {
	if ( ! function_exists( 'acf_add_local_field_group' ) ) {
		return;
	}

	acf_add_local_field_group( array(
		'key'    => 'group_billodig_product',
		'title'  => 'Product Specifications',
		'fields' => array(
			array( 'key' => 'field_subtitle', 'name' => 'subtitle', 'label' => __( 'Category tag', 'billodig' ), 'type' => 'text', 'instructions' => __( 'e.g. Fuel-powered · Diesel', 'billodig' ) ),
			array( 'key' => 'field_tagline', 'name' => 'tagline', 'label' => __( 'Marketing tagline', 'billodig' ), 'type' => 'text' ),
			array( 'key' => 'field_is_hot', 'name' => 'is_hot', 'label' => __( 'Featured / HOT badge', 'billodig' ), 'type' => 'true_false' ),
			array( 'key' => 'field_working_weight', 'name' => 'working_weight', 'label' => __( 'Working weight', 'billodig' ), 'type' => 'text', 'instructions' => __( 'e.g. 34,700 kg', 'billodig' ) ),
			array( 'key' => 'field_rated_power', 'name' => 'rated_power', 'label' => __( 'Rated power (short)', 'billodig' ), 'type' => 'text', 'instructions' => __( 'e.g. 194 kW', 'billodig' ) ),
			array( 'key' => 'field_rated_power_full', 'name' => 'rated_power_full', 'label' => __( 'Rated power (full)', 'billodig' ), 'type' => 'text', 'instructions' => __( 'e.g. 194 kW (260 HP) / 2,200 rpm', 'billodig' ) ),
			array( 'key' => 'field_bucket_capacity', 'name' => 'bucket_capacity', 'label' => __( 'Bucket capacity', 'billodig' ), 'type' => 'text', 'instructions' => __( 'e.g. 1.6 m³', 'billodig' ) ),
			array( 'key' => 'field_engine_model', 'name' => 'engine_model', 'label' => __( 'Engine model', 'billodig' ), 'type' => 'text' ),
			array(
				'key'          => 'field_main_specifications',
				'name'         => 'main_specifications',
				'label'        => 'Main Specifications',
				'type'         => 'repeater',
				'instructions' => __( 'The categorized spec table (Engine, Main pump, Pilot pump, Relief valve, Speed, Tank capacity…). Rows sharing the same category are grouped together automatically.', 'billodig' ),
				'layout'       => 'table',
				'button_label' => __( 'Add specification row', 'billodig' ),
				'sub_fields'   => array(
					array( 'key' => 'field_main_spec_category', 'name' => 'category', 'label' => __( 'Category', 'billodig' ), 'type' => 'text', 'instructions' => __( 'e.g. Engine, Main pump, Relief valve', 'billodig' ) ),
					array( 'key' => 'field_main_spec_category_zh', 'name' => 'category_zh', 'label' => __( 'Category (Chinese)', 'billodig' ), 'type' => 'text', 'instructions' => __( 'e.g. 发动机, 主泵, 溢流阀', 'billodig' ) ),
					array( 'key' => 'field_main_spec_label', 'name' => 'label', 'label' => __( 'Label', 'billodig' ), 'type' => 'text' ),
					array( 'key' => 'field_main_spec_value', 'name' => 'value', 'label' => __( 'Value', 'billodig' ), 'type' => 'text' ),
				),
			),
			array(
				'key'          => 'field_technical_parameters',
				'name'         => 'technical_parameters',
				'label'        => 'Technical Parameters',
				'type'         => 'repeater',
				'instructions' => __( 'The flat dimensions / digging-geometry table.', 'billodig' ),
				'layout'       => 'table',
				'button_label' => __( 'Add parameter row', 'billodig' ),
				'sub_fields'   => array(
					array( 'key' => 'field_tech_param_label', 'name' => 'label', 'label' => __( 'Label', 'billodig' ), 'type' => 'text' ),
					array( 'key' => 'field_tech_param_value', 'name' => 'value', 'label' => __( 'Value', 'billodig' ), 'type' => 'text' ),
				),
			),
			array(
				'key'          => 'field_product_videos',
				'name'         => 'product_videos',
				'label'        => 'Work Videos',
				'type'         => 'repeater',
				'instructions' => __( 'Work/operation videos for this specific model — shown on its product page, not as a separate site section.', 'billodig' ),
				'layout'       => 'table',
				'button_label' => __( 'Add video', 'billodig' ),
				'sub_fields'   => array(
					array( 'key' => 'field_product_video_url', 'name' => 'video_url', 'label' => __( 'Video URL', 'billodig' ), 'type' => 'url', 'instructions' => __( 'YouTube/Vimeo link or a direct video file URL.', 'billodig' ) ),
					array( 'key' => 'field_product_video_thumbnail', 'name' => 'thumbnail', 'label' => __( 'Thumbnail', 'billodig' ), 'type' => 'image', 'return_format' => 'url', 'preview_size' => 'medium' ),
					array( 'key' => 'field_product_video_caption_zh', 'name' => 'caption_zh', 'label' => __( 'Caption (Chinese)', 'billodig' ), 'type' => 'text', 'instructions' => __( 'e.g. 作业视频', 'billodig' ) ),
				),
			),
		),
		'location' => array(
			array(
				array( 'param' => 'post_type', 'operator' => '==', 'value' => 'product' ),
			),
		),
	) );
}
add_action( 'acf/init', 'billodig_register_product_fields' );
