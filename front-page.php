<?php
/**
 * Front page. Text, images and links come from Appearance > Customize >
 * Billodig Theme Options > Homepage.
 *
 * @package Billodig
 */

get_header();

get_template_part(
	'template-parts/hero-banner',
	null,
	array(
		'en'    => billodig_mod( 'hero_title' ),
		'tag'   => billodig_mod( 'hero_tagline' ),
		'photo' => billodig_image_url( 'hero_image', 'catalog/page-03.jpg' ),
	)
);

$billodig_contact_url = home_url( '/contact-us/' );
$billodig_tile_icons  = array(
	1 => '<svg class="ticon" width="46" height="46" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M3 20 L9 20 L9 15 L13 11"></path><path d="M13 11 L18 6 L20 8 L15 13 L13 11 Z"></path><rect x="2.5" y="19.5" width="8" height="3" rx="0.5"></rect></svg>',
	2 => '<svg class="ticon" width="46" height="46" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="8" height="6" rx="0.5"></rect><path d="M17 12 L21 10 L21 14 Z"></path><circle cx="7" cy="18" r="2.4"></circle><circle cx="15" cy="18" r="2.4"></circle></svg>',
	3 => '<svg class="ticon" width="46" height="46" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M4 20 L4 10 L20 10 L20 20"></path><path d="M4 10 L2 6 L22 6 L20 10"></path><line x1="9" y1="10" x2="9" y2="20"></line><line x1="15" y1="10" x2="15" y2="20"></line></svg>',
	4 => '<svg class="ticon" width="46" height="46" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M3 20 L9 20 L9 15 L13 11 L18 6 L20 8 L15 13 L13 11"></path><path d="M2 3 L22 21"></path></svg>',
	5 => '<svg class="ticon" width="46" height="46" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="3"></circle><path d="M12 3 L12 6 M12 18 L12 21 M3 12 L6 12 M18 12 L21 12 M5.6 5.6 L7.7 7.7 M16.3 16.3 L18.4 18.4 M5.6 18.4 L7.7 16.3 M16.3 7.7 L18.4 5.6"></path></svg>',
);
?>

<div class="section">
	<div class="section-head">
		<div class="kicker"><?php echo esc_html( billodig_mod( 'products_kicker' ) ); ?></div>
		<h2><?php echo esc_html( billodig_mod( 'products_title' ) ); ?></h2>
		<div class="rule"></div>
	</div>
	<div class="tiles-5">
		<?php
		for ( $i = 1; $i <= 5; $i++ ) :
			$url = billodig_mod( "tile_{$i}_url" );
			if ( '' === $url ) {
				$url = ( 1 === $i ) ? get_post_type_archive_link( 'product' ) : $billodig_contact_url;
			}
			?>
		<a href="<?php echo esc_url( $url ); ?>" class="tile<?php echo 1 === $i ? ' is-active' : ''; ?>">
			<?php echo $billodig_tile_icons[ $i ]; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
			<div class="ten"><?php echo esc_html( billodig_mod( "tile_{$i}_en" ) ); ?></div>
			<div class="tzh"><?php echo esc_html( billodig_mod( "tile_{$i}_zh" ) ); ?></div>
		</a>
		<?php endfor; ?>
	</div>
</div>

<div class="section tight">
	<div class="section-head">
		<div class="kicker"><?php echo esc_html( billodig_mod( 'patents_kicker' ) ); ?></div>
		<h2><?php echo esc_html( billodig_mod( 'patents_title' ) ); ?></h2>
		<div class="rule"></div>
	</div>
</div>
<div class="split-banner">
	<div class="photo"><img src="<?php echo esc_url( billodig_image_url( 'split_image', 'billodig-worksite.jpg' ) ); ?>" alt="<?php echo esc_attr( billodig_t( 'alt.site' ) ); ?>"></div>
	<div class="panel">
		<div class="kicker"><?php echo esc_html( billodig_mod( 'split_kicker' ) ); ?></div>
		<p><?php echo esc_html( billodig_mod( 'split_text' ) ); ?></p>
	</div>
</div>

<?php get_footer(); ?>
