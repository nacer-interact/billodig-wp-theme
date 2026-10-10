<?php get_header();
$assets = get_stylesheet_directory_uri() . '/assets';
get_template_part( 'template-parts/hero-banner', null, array(
	'en'    => 'Billodig Construction Machinery',
	'tag'   => 'Hydraulic crawler excavators',
	'photo' => 'catalog/page-03.jpg',
) );
?>

<div class="section">
	<div class="section-head">
		<div class="kicker">机械产品</div>
		<h2>Machinery Products</h2>
		<div class="rule"></div>
	</div>
	<div class="tiles-5">
		<a href="<?php echo esc_url( get_post_type_archive_link( 'product' ) ); ?>" class="tile is-active">
			<svg class="ticon" width="46" height="46" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M3 20 L9 20 L9 15 L13 11"></path><path d="M13 11 L18 6 L20 8 L15 13 L13 11 Z"></path><rect x="2.5" y="19.5" width="8" height="3" rx="0.5"></rect></svg>
			<div class="ten">Excavators</div>
			<div class="tzh">挖掘机</div>
		</a>
		<a href="<?php echo esc_url( home_url( '/contact-us/' ) ); ?>" class="tile">
			<svg class="ticon" width="46" height="46" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="8" height="6" rx="0.5"></rect><path d="M17 12 L21 10 L21 14 Z"></path><circle cx="7" cy="18" r="2.4"></circle><circle cx="15" cy="18" r="2.4"></circle></svg>
			<div class="ten">Loaders</div>
			<div class="tzh">装载机</div>
		</a>
		<a href="<?php echo esc_url( home_url( '/contact-us/' ) ); ?>" class="tile">
			<svg class="ticon" width="46" height="46" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M4 20 L4 10 L20 10 L20 20"></path><path d="M4 10 L2 6 L22 6 L20 10"></path><line x1="9" y1="10" x2="9" y2="20"></line><line x1="15" y1="10" x2="15" y2="20"></line></svg>
			<div class="ten">Attachments</div>
			<div class="tzh">工程机械属具</div>
		</a>
		<a href="<?php echo esc_url( home_url( '/contact-us/' ) ); ?>" class="tile">
			<svg class="ticon" width="46" height="46" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M3 20 L9 20 L9 15 L13 11 L18 6 L20 8 L15 13 L13 11"></path><path d="M2 3 L22 21"></path></svg>
			<div class="ten">Used Excavators</div>
			<div class="tzh">二手挖掘机</div>
		</a>
		<a href="<?php echo esc_url( home_url( '/contact-us/' ) ); ?>" class="tile">
			<svg class="ticon" width="46" height="46" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="3"></circle><path d="M12 3 L12 6 M12 18 L12 21 M3 12 L6 12 M18 12 L21 12 M5.6 5.6 L7.7 7.7 M16.3 16.3 L18.4 18.4 M5.6 18.4 L7.7 16.3 M16.3 7.7 L18.4 5.6"></path></svg>
			<div class="ten">Excavator Parts</div>
			<div class="tzh">挖掘机配件</div>
		</a>
	</div>
</div>

<div class="section tight">
	<div class="section-head">
		<div class="kicker">BILLODIG专利</div>
		<h2>Billodig Patents</h2>
		<div class="rule"></div>
	</div>
</div>
<div class="split-banner">
	<div class="photo"><img src="<?php echo esc_url( $assets . '/billodig-worksite.jpg' ); ?>" alt="Billodig excavators on site"></div>
	<div class="panel">
		<div class="kicker">THE WINNING PLAYER IN GENERAL WORK · 一家全球化工程机械装备制造商</div>
		<p>A global construction machinery equipment manufacturer and solutions provider, focused on overseas market expansion and localization services.</p>
	</div>
</div>

<?php get_footer(); ?>
