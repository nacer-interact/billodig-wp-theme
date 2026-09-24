<?php get_header();
get_template_part( 'template-parts/hero-banner', null, array(
	'en' => 'Search Results',
	'zh' => '搜索结果',
) );
?>

<div class="section-head" style="padding-top:56px;">
	<h2><?php printf( '%d result(s) for “%s”', (int) $wp_query->found_posts, esc_html( get_search_query() ) ); ?></h2>
	<div class="rule"></div>
</div>

<?php if ( have_posts() && 'product' === get_query_var( 'post_type' ) ) : ?>
	<div class="model-grid">
	<?php while ( have_posts() ) : the_post();
		get_template_part( 'template-parts/model-card' );
	endwhile; ?>
	</div>
<?php elseif ( have_posts() ) : ?>
	<div class="basic-page">
	<?php while ( have_posts() ) : the_post(); ?>
		<article style="margin-bottom:32px;">
			<h3><a href="<?php the_permalink(); ?>" style="color:var(--navy);"><?php the_title(); ?></a></h3>
			<div class="content"><?php the_excerpt(); ?></div>
		</article>
	<?php endwhile; ?>
	</div>
<?php else : ?>
	<div class="empty-state">No results found. <a href="<?php echo esc_url( home_url( '/contact-us/' ) ); ?>">Contact us</a> and we'll help you find what you need.</div>
<?php endif; ?>

<?php get_footer(); ?>
