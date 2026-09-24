<?php get_header();
$term = get_queried_object();
get_template_part( 'template-parts/product-banner', null, array(
	'en'    => 'Billodig Excavators',
	'zh'    => '挖掘机',
	'crumb' => 'Products & Services / Excavators',
) );
?>

<div class="section-head" style="padding-top:56px;">
	<div class="kicker"><?php echo esc_html( billodig_line_zh( $term->slug ) ); ?></div>
	<h2><?php echo esc_html( $term->name ); ?> Excavators</h2>
	<div class="rule"></div>
</div>

<div class="model-grid">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post();
	get_template_part( 'template-parts/model-card' );
endwhile; else : ?>
	<div class="empty-state">No models in this line yet. <a href="<?php echo esc_url( home_url( '/contact-us/' ) ); ?>">Contact us</a> for availability.</div>
<?php endif; ?>
</div>

<?php if ( $wp_query->max_num_pages > 1 ) : ?>
<div class="pagination"><?php echo paginate_links( array( 'prev_text' => '←', 'next_text' => '→' ) ); ?></div>
<?php endif; ?>

<?php get_footer(); ?>
