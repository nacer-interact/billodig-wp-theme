<!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="skip-link screen-reader-text" href="#content"><?php echo esc_html( billodig_t( 'a11y.skip' ) ); ?></a>
<div class="wrap">

<div class="site-nav">
	<?php billodig_site_logo( 'logo' ); ?>
	<div class="navlinks">
		<?php billodig_primary_menu(); ?>
	</div>
	<details class="nav-search">
		<summary aria-label="<?php echo esc_attr( billodig_t( 'search.label' ) ); ?>">
			<svg width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><circle cx="11" cy="11" r="7"></circle><line x1="21" y1="21" x2="16.2" y2="16.2"></line></svg>
		</summary>
		<form method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
			<input type="search" name="s" placeholder="<?php echo esc_attr( billodig_t( 'search.placeholder' ) ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>">
			<button type="submit" aria-label="<?php echo esc_attr( billodig_t( 'search.submit' ) ); ?>">
				<svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><circle cx="11" cy="11" r="7"></circle><line x1="21" y1="21" x2="16.2" y2="16.2"></line></svg>
			</button>
		</form>
	</details>
</div>

<main id="content" class="site-main">
