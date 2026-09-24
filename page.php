<?php get_header();
get_template_part( 'template-parts/hero-banner', null, array(
	'en' => get_the_title(),
	'zh' => '',
) );
?>
<div class="basic-page">
<?php while ( have_posts() ) : the_post(); ?>
	<div class="content"><?php the_content(); ?></div>
<?php endwhile; ?>
</div>
<?php get_footer(); ?>
