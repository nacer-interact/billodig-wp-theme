<!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div class="wrap">

<?php
$assets = get_stylesheet_directory_uri() . '/assets';
$is_products_area = is_page( 'products-services' ) || is_post_type_archive( 'product' ) || is_singular( 'product' ) || is_tax( 'product_line' );
?>

<div class="site-nav">
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo">
		<img src="<?php echo esc_url( $assets . '/billodig-logo.png' ); ?>" alt="Billodig">
	</a>
	<div class="navlinks">
		<div class="navitem<?php echo is_front_page() ? ' active' : ''; ?>">
			<?php billodig_navlink( home_url( '/' ), 'Home', '首页', is_front_page() ); ?>
		</div>
		<div class="navitem<?php echo is_page( 'about-us' ) ? ' active' : ''; ?>">
			<?php billodig_navlink( home_url( '/about-us/' ), 'About Us', '关于我们', is_page( 'about-us' ) ); ?>
		</div>
		<div class="navitem<?php echo $is_products_area ? ' active' : ''; ?>">
			<?php billodig_navlink( home_url( '/products-services/' ), 'Products & Services', '产品与服务', $is_products_area ); ?>
			<div class="navdrop">
				<a href="<?php echo esc_url( home_url( '/products-services/#fuel' ) ); ?>"><span class="en">Fuel-Powered Equipment</span><span class="zh">燃油版设备</span></a>
				<a href="<?php echo esc_url( home_url( '/products-services/#electric' ) ); ?>"><span class="en">Electric Equipment</span><span class="zh">电动版设备</span></a>
				<a href="<?php echo esc_url( home_url( '/products-services/#parts' ) ); ?>"><span class="en">Parts</span><span class="zh">配件</span></a>
			</div>
		</div>
		<div class="navitem<?php echo is_page( 'news-events' ) || is_singular( 'post' ) ? ' active' : ''; ?>">
			<?php billodig_navlink( home_url( '/news-events/' ), 'News & Events', '新闻与活动', is_page( 'news-events' ) || is_singular( 'post' ) ); ?>
		</div>
		<div class="navitem<?php echo is_page( 'contact-us' ) ? ' active' : ''; ?>">
			<?php billodig_navlink( home_url( '/contact-us/' ), 'Contact Us', '联系我们', is_page( 'contact-us' ) ); ?>
		</div>
	</div>
	<details class="nav-search">
		<summary aria-label="Search">
			<svg width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><circle cx="11" cy="11" r="7"></circle><line x1="21" y1="21" x2="16.2" y2="16.2"></line></svg>
		</summary>
		<form method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
			<input type="search" name="s" placeholder="Search products…" value="<?php echo esc_attr( get_search_query() ); ?>">
			<button type="submit" aria-label="Submit search">
				<svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><circle cx="11" cy="11" r="7"></circle><line x1="21" y1="21" x2="16.2" y2="16.2"></line></svg>
			</button>
		</form>
	</details>
</div>
