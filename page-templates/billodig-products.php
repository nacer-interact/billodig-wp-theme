<?php
/* Template Name: Billodig — Products & Services */
get_header();

function billodig_line_url( $slug ) {
	$term = get_term_by( 'slug', $slug, 'product_line' );
	return $term ? get_term_link( $term ) : home_url( '/contact-us/' );
}

$assets = get_stylesheet_directory_uri() . '/assets';

get_template_part( 'template-parts/product-banner', null, array(
	'en' => billodig_t( 'nav.products' ),
	'zh' => billodig_zh( 'nav.products' ),
) );
?>

<div class="section" id="fuel">
	<div class="section-head left">
		<div class="kicker"><?php echo esc_html( billodig_zh( 'pline.fuel_title' ) ); ?></div>
		<h2><?php echo esc_html( billodig_t( 'pline.fuel_title' ) ); ?></h2>
		<div class="rule"></div>
	</div>
	<div class="pline-grid cols-3">
		<a href="<?php echo esc_url( billodig_line_url( 'gasoline' ) ); ?>" class="pline-card">
			<div class="thumb"><img src="<?php echo esc_url( $assets . '/10lc-hero.jpg' ); ?>" alt="<?php echo esc_attr( billodig_t( 'alt.gasoline' ) ); ?>"></div>
			<div class="band"><?php billodig_the_label( 'pline.gasoline', '', 'div' ); ?></div>
			<span class="cta"><?php billodig_the_label( 'common.learn_more' ); ?> →</span>
		</a>
		<a href="<?php echo esc_url( billodig_line_url( 'diesel' ) ); ?>" class="pline-card">
			<div class="thumb"><img src="<?php echo esc_url( $assets . '/ec360-hero.jpg' ); ?>" alt="<?php echo esc_attr( billodig_t( 'alt.diesel' ) ); ?>"></div>
			<div class="band"><?php billodig_the_label( 'pline.diesel', '', 'div' ); ?></div>
			<span class="cta"><?php billodig_the_label( 'common.learn_more' ); ?> →</span>
		</a>
		<a href="<?php echo esc_url( billodig_line_url( 'gas' ) ); ?>" class="pline-card">
			<div class="thumb">
				<svg width="46" height="46" viewBox="0 0 24 24" fill="none" stroke="var(--navy)" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="10" width="8" height="7" rx="1"></rect><circle cx="6" cy="19" r="1.6"></circle><circle cx="12" cy="19" r="1.6"></circle><path d="M11 12 L16 12 L19 16 L19 17 L11 17"></path><path d="M14 3 L14 8 M16.5 5.5 L11.5 5.5"></path></svg>
			</div>
			<div class="band"><?php billodig_the_label( 'pline.gas', '', 'div' ); ?></div>
			<span class="cta"><?php billodig_the_label( 'common.enquire' ); ?> →</span>
		</a>
	</div>
</div>

<div class="section tight" id="electric">
	<div class="section-head left">
		<div class="kicker"><?php echo esc_html( billodig_zh( 'pline.electric_title' ) ); ?></div>
		<h2><?php echo esc_html( billodig_t( 'pline.electric_title' ) ); ?></h2>
		<div class="rule"></div>
	</div>
	<div class="pline-grid cols-2">
		<a href="<?php echo esc_url( billodig_line_url( 'cable' ) ); ?>" class="pline-card">
			<div class="thumb">
				<svg width="46" height="46" viewBox="0 0 24 24" fill="none" stroke="var(--navy)" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="10" width="8" height="7" rx="1"></rect><circle cx="6" cy="19" r="1.6"></circle><circle cx="12" cy="19" r="1.6"></circle><path d="M11 12 L16 12 L19 16 L19 17 L11 17"></path><path d="M13.5 3.5 L15.5 3.5 M14.5 3.5 L14.5 8.5 M13 8.5 L16 8.5"></path></svg>
			</div>
			<div class="band"><?php billodig_the_label( 'pline.cable', '', 'div' ); ?></div>
			<span class="cta"><?php billodig_the_label( 'common.enquire' ); ?> →</span>
		</a>
		<a href="<?php echo esc_url( billodig_line_url( 'battery' ) ); ?>" class="pline-card">
			<div class="thumb">
				<svg width="46" height="46" viewBox="0 0 24 24" fill="none" stroke="var(--navy)" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="10" width="8" height="7" rx="1"></rect><circle cx="6" cy="19" r="1.6"></circle><circle cx="12" cy="19" r="1.6"></circle><path d="M11 12 L16 12 L19 16 L19 17 L11 17"></path><path d="M14.5 3 L13 6.5 L15 6.5 L13.5 10"></path></svg>
			</div>
			<div class="band"><?php billodig_the_label( 'pline.battery', '', 'div' ); ?></div>
			<span class="cta"><?php billodig_the_label( 'common.enquire' ); ?> →</span>
		</a>
	</div>
</div>

<div class="section tight" id="parts">
	<div class="section-head left">
		<div class="kicker"><?php echo esc_html( billodig_zh( 'nav.parts' ) ); ?></div>
		<h2><?php echo esc_html( billodig_t( 'nav.parts' ) ); ?></h2>
		<div class="rule"></div>
	</div>
	<div class="pline-grid cols-1">
		<a href="<?php echo esc_url( home_url( '/contact-us/' ) ); ?>" class="pline-card">
			<div class="thumb">
				<svg width="46" height="46" viewBox="0 0 24 24" fill="none" stroke="var(--navy)" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M14.7 6.3a4 4 0 0 0-5.6 5.6 L4 17l3 3 5.1-5.1a4 4 0 0 0 5.6-5.6l-2.3 2.3-2-2Z"></path></svg>
			</div>
			<div class="band"><?php billodig_the_label( 'pline.parts_card', '', 'div' ); ?></div>
			<span class="cta"><?php billodig_the_label( 'nav.contact' ); ?> →</span>
		</a>
	</div>
</div>

<?php get_footer(); ?>
