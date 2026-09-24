<?php
/* Template Name: Billodig — Videos */
get_header();
get_template_part( 'template-parts/hero-banner', null, array(
	'en' => 'Videos',
	'zh' => '精彩视频',
) );

$paged  = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
$videos = new WP_Query( array(
	'post_type'      => 'billodig_video',
	'posts_per_page' => 9,
	'paged'          => $paged,
) );
?>

<div class="section-head" style="padding-top:56px;">
	<div class="kicker">作业视频</div>
	<h2>Work Videos</h2>
	<div class="rule"></div>
</div>

<div class="video-grid">
<?php if ( $videos->have_posts() ) : while ( $videos->have_posts() ) : $videos->the_post();
	$url = get_field( 'video_url' );
	?>
	<a class="video-tile" href="<?php echo $url ? esc_url( $url ) : '#'; ?>" target="<?php echo $url ? '_blank' : '_self'; ?>" rel="noopener">
		<?php if ( has_post_thumbnail() ) : the_post_thumbnail( 'medium' ); else : ?>
			<img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/billodig-worksite.jpg' ); ?>" alt="">
		<?php endif; ?>
		<div class="caption">
			<span class="play"><svg width="16" height="16" viewBox="0 0 24 24" fill="#fff"><path d="M8 5 L19 12 L8 19 Z"></path></svg></span>
			<span><span class="en">Work Video</span> <span class="zh">作业视频</span></span>
		</div>
	</a>
<?php endwhile; else : ?>
	<div class="empty-state">No videos published yet — check back soon.</div>
<?php endif; wp_reset_postdata(); ?>
</div>

<?php if ( $videos->max_num_pages > 1 ) : ?>
<div class="pagination"><?php echo paginate_links( array( 'total' => $videos->max_num_pages, 'prev_text' => '←', 'next_text' => '→' ) ); ?></div>
<?php endif; ?>

<?php get_footer(); ?>
