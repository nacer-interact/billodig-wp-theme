<?php
/* Template Name: Billodig — About Us */
get_header();
get_template_part( 'template-parts/hero-banner', null, array(
	'en' => 'About Us',
	'zh' => '关于我们',
) );
?>

<div class="basic-page" style="margin:0 auto;">
	<?php while ( have_posts() ) : the_post(); ?>
		<h1><?php the_title(); ?></h1>
		<div class="content"><?php the_content(); ?></div>
	<?php endwhile; ?>
</div>

<?php get_footer(); ?>
