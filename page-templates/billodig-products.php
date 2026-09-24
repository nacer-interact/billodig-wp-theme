<?php
/* Template Name: Billodig — Products & Services */
get_header();

function billodig_line_url( $slug ) {
	$term = get_term_by( 'slug', $slug, 'product_line' );
	return $term ? get_term_link( $term ) : home_url( '/contact-us/' );
}

$assets = get_stylesheet_directory_uri() . '/assets';

get_template_part( 'template-parts/product-banner', null, array(
	'en' => 'Products & Services',
	'zh' => '产品与服务',
) );
?>

<div class="section" id="fuel">
	<div class="section-head left">
		<div class="kicker">燃油版设备挖掘机产品线</div>
		<h2>Fuel-Powered Equipment</h2>
		<div class="rule"></div>
	</div>
	<div class="pline-grid cols-3">
		<a href="<?php echo esc_url( billodig_line_url( 'gasoline' ) ); ?>" class="pline-card">
			<div class="thumb"><img src="<?php echo esc_url( $assets . '/10lc-hero.jpg' ); ?>" alt="Gasoline excavator"></div>
			<div class="band"><div class="en">Gasoline Excavator</div><div class="zh">汽油挖掘机</div></div>
			<span class="cta"><span class="en">Learn More</span> <span class="zh">了解更多详情</span> →</span>
		</a>
		<a href="<?php echo esc_url( billodig_line_url( 'diesel' ) ); ?>" class="pline-card">
			<div class="thumb"><img src="<?php echo esc_url( $assets . '/ec360-hero.jpg' ); ?>" alt="Diesel excavator"></div>
			<div class="band"><div class="en">Diesel Excavator</div><div class="zh">柴油挖掘机</div></div>
			<span class="cta"><span class="en">Learn More</span> <span class="zh">了解更多详情</span> →</span>
		</a>
		<a href="<?php echo esc_url( billodig_line_url( 'gas' ) ); ?>" class="pline-card">
			<div class="thumb">
				<svg width="46" height="46" viewBox="0 0 24 24" fill="none" stroke="var(--navy)" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="10" width="8" height="7" rx="1"></rect><circle cx="6" cy="19" r="1.6"></circle><circle cx="12" cy="19" r="1.6"></circle><path d="M11 12 L16 12 L19 16 L19 17 L11 17"></path><path d="M14 3 L14 8 M16.5 5.5 L11.5 5.5"></path></svg>
			</div>
			<div class="band"><div class="en">GAS Excavator</div><div class="zh">GAS挖掘机 · coming soon</div></div>
			<span class="cta"><span class="en">Enquire</span> <span class="zh">咨询</span> →</span>
		</a>
	</div>
</div>

<div class="section tight" id="electric">
	<div class="section-head left">
		<div class="kicker">电动版设备挖掘机产品线</div>
		<h2>Electric Equipment</h2>
		<div class="rule"></div>
	</div>
	<div class="pline-grid cols-2">
		<a href="<?php echo esc_url( billodig_line_url( 'cable' ) ); ?>" class="pline-card">
			<div class="thumb">
				<svg width="46" height="46" viewBox="0 0 24 24" fill="none" stroke="var(--navy)" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="10" width="8" height="7" rx="1"></rect><circle cx="6" cy="19" r="1.6"></circle><circle cx="12" cy="19" r="1.6"></circle><path d="M11 12 L16 12 L19 16 L19 17 L11 17"></path><path d="M13.5 3.5 L15.5 3.5 M14.5 3.5 L14.5 8.5 M13 8.5 L16 8.5"></path></svg>
			</div>
			<div class="band"><div class="en">Cable Excavator</div><div class="zh">电缆式挖掘机 · coming soon</div></div>
			<span class="cta"><span class="en">Enquire</span> <span class="zh">咨询</span> →</span>
		</a>
		<a href="<?php echo esc_url( billodig_line_url( 'battery' ) ); ?>" class="pline-card">
			<div class="thumb">
				<svg width="46" height="46" viewBox="0 0 24 24" fill="none" stroke="var(--navy)" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="10" width="8" height="7" rx="1"></rect><circle cx="6" cy="19" r="1.6"></circle><circle cx="12" cy="19" r="1.6"></circle><path d="M11 12 L16 12 L19 16 L19 17 L11 17"></path><path d="M14.5 3 L13 6.5 L15 6.5 L13.5 10"></path></svg>
			</div>
			<div class="band"><div class="en">Battery Excavator</div><div class="zh">电池式挖掘机 · coming soon</div></div>
			<span class="cta"><span class="en">Enquire</span> <span class="zh">咨询</span> →</span>
		</a>
	</div>
</div>

<div class="section tight" id="parts">
	<div class="section-head left">
		<div class="kicker">配件</div>
		<h2>Parts</h2>
		<div class="rule"></div>
	</div>
	<div class="pline-grid cols-1">
		<a href="<?php echo esc_url( home_url( '/contact-us/' ) ); ?>" class="pline-card">
			<div class="thumb">
				<svg width="46" height="46" viewBox="0 0 24 24" fill="none" stroke="var(--navy)" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M14.7 6.3a4 4 0 0 0-5.6 5.6 L4 17l3 3 5.1-5.1a4 4 0 0 0 5.6-5.6l-2.3 2.3-2-2Z"></path></svg>
			</div>
			<div class="band"><div class="en">Excavator Parts</div><div class="zh">挖掘机配件</div></div>
			<span class="cta"><span class="en">Contact Us</span> <span class="zh">联系我们</span> →</span>
		</a>
	</div>
</div>

<?php get_footer(); ?>
