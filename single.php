<?php get_header();
get_template_part( 'template-parts/hero-banner', null, array(
	'en' => 'News & Events',
	'zh' => '新闻与活动',
) );
?>
<div class="basic-page">
<?php while ( have_posts() ) : the_post(); ?>
	<h1><?php the_title(); ?></h1>
	<?php if ( has_post_thumbnail() ) : ?>
		<div style="margin:24px 0;"><?php the_post_thumbnail( 'large' ); ?></div>
	<?php endif; ?>
	<div class="content"><?php the_content(); ?></div>
	<div style="margin-top:32px;"><a href="<?php echo esc_url( home_url( '/news-events/' ) ); ?>" style="color:var(--navy);font-weight:700;">← <span class="en">Back to News &amp; Events</span> <span class="zh">返回新闻与活动</span></a></div>
<?php endwhile; ?>
</div>
<?php get_footer(); ?>
