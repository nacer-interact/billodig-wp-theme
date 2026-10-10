<?php
/* Template Name: Billodig — News & Events */
get_header();
get_template_part( 'template-parts/hero-banner', null, array(
	'en' => billodig_t( 'nav.news' ),
	'zh' => billodig_zh( 'nav.news' ),
) );

$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
$news  = new WP_Query( array(
	'post_type'      => 'post',
	'posts_per_page' => 9,
	'paged'          => $paged,
) );
?>

<div class="section-head" style="padding-top:56px;">
	<div class="kicker"><?php echo esc_html( billodig_zh( 'news.company' ) ); ?></div>
	<h2><?php echo esc_html( billodig_t( 'news.company' ) ); ?></h2>
	<div class="rule"></div>
</div>

<div class="news-grid">
<?php if ( $news->have_posts() ) : while ( $news->have_posts() ) : $news->the_post(); ?>
	<a class="news-card" href="<?php the_permalink(); ?>">
		<div class="thumb">
			<span class="tag"><?php billodig_the_label( 'news.company' ); ?></span>
			<?php if ( has_post_thumbnail() ) : the_post_thumbnail( 'medium' ); else : ?>
				<div style="width:100%;height:100%;background:var(--fog);"></div>
			<?php endif; ?>
		</div>
		<div class="body">
			<h3><?php the_title(); ?></h3>
			<p><?php echo esc_html( wp_trim_words( get_the_excerpt(), 22 ) ); ?></p>
		</div>
	</a>
<?php endwhile; else : ?>
	<div class="empty-state"><?php echo esc_html( billodig_t( 'news.empty' ) ); ?></div>
<?php endif; wp_reset_postdata(); ?>
</div>

<?php if ( $news->max_num_pages > 1 ) : ?>
<div class="pagination"><?php echo paginate_links( array( 'total' => $news->max_num_pages, 'prev_text' => '←', 'next_text' => '→' ) ); ?></div>
<?php endif; ?>

<?php get_footer(); ?>
