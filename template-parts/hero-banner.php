<?php
/**
 * Big photo hero banner, reused on Home / Contact Us / News & Events —
 * matches the mockup's "MEET FUTURE"-style full-bleed slide used as the shared
 * page header for all top-level sections.
 *
 * Expects $args: en, zh, tag (optional overline), photo (path under assets/).
 */
$assets = get_stylesheet_directory_uri() . '/assets';
$en     = $args['en'] ?? '';
$zh     = $args['zh'] ?? '';
$tag    = $args['tag'] ?? 'THE MOST FUEL-EFFICIENT EXCAVATOR';
$photo  = $args['photo'] ?? 'catalog/page-01.jpg';
?>
<div class="hero-banner">
	<img class="hero-photo" src="<?php echo esc_url( $assets . '/' . $photo ); ?>" alt="Billodig equipment lineup">
	<?php if ( $en ) : ?>
	<div class="hero-scrim"></div>
	<div class="hero-overlay">
		<?php if ( $zh ) : ?><div class="hero-zh light"><?php echo esc_html( $zh ); ?></div><?php endif; ?>
		<div class="hero-en light"><?php echo esc_html( $en ); ?></div>
		<div class="hero-tag"><?php echo esc_html( $tag ); ?></div>
	</div>
	<?php endif; ?>
	<div class="hero-arrow prev" aria-hidden="true"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M15 5 L8 12 L15 19"></path></svg></div>
	<div class="hero-arrow next" aria-hidden="true"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M9 5 L16 12 L9 19"></path></svg></div>
	<div class="hero-dots" aria-hidden="true"><span class="on"></span><span></span></div>
</div>
