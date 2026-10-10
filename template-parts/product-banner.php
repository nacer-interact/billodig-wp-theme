<?php
/**
 * Black section banner used across Products & Services / product line
 * listings / product detail — matches the mockup's "BILLODIG挖掘机" banner
 * (dark background, excavator photo bleeding in from the left, bold
 * right-aligned title, optional breadcrumb for deeper pages).
 *
 * Expects $args: en, zh, crumb (optional).
 */
$en     = $args['en'] ?? '';
$zh     = $args['zh'] ?? '';
$crumb  = $args['crumb'] ?? '';
?>
<div class="product-banner">
	<div class="pb-photo">
		<img src="<?php echo esc_url( billodig_image_url( 'product_banner_image', 'billodig-worksite.jpg' ) ); ?>" alt="<?php echo esc_attr( billodig_t( 'alt.excavator' ) ); ?>">
	</div>
	<div class="pb-text">
		<?php if ( $crumb ) : ?><div class="pb-crumb"><?php echo esc_html( $crumb ); ?></div><?php endif; ?>
		<div class="pb-zh"><?php echo esc_html( $zh ); ?></div>
		<h1><?php echo esc_html( $en ); ?></h1>
	</div>
</div>
