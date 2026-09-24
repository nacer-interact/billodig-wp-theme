<?php get_header(); ?>
<div class="basic-page">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<article style="margin-bottom:40px;">
		<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		<div class="content"><?php the_excerpt(); ?></div>
	</article>
<?php endwhile; else : ?>
	<p>Nothing found.</p>
<?php endif; ?>
</div>
<?php get_footer(); ?>
