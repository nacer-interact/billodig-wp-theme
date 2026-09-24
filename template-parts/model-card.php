<?php
/**
 * One excavator model card, used in the product archive and product-line
 * taxonomy listings — matches the mockup's photo + navy band + black
 * "Learn more" button card.
 */
$id     = get_the_ID();
$is_hot = get_field( 'is_hot', $id );
?>
<div class="model-card<?php echo $is_hot ? ' hot' : ''; ?>">
	<?php if ( $is_hot ) : ?><div class="hot-badge">HOT</div><?php endif; ?>
	<div class="thumb">
		<?php if ( has_post_thumbnail() ) : ?>
			<?php the_post_thumbnail( 'medium' ); ?>
		<?php else : ?>
			<svg width="120" height="90" viewBox="0 0 120 90" fill="none" stroke="var(--navy)" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><rect x="10" y="46" width="46" height="32" rx="3"></rect><path d="M44 46 L64 18 L90 8 L100 16 L74 34 L56 50"></path><rect x="4" y="78" width="58" height="9" rx="2"></rect></svg>
		<?php endif; ?>
	</div>
	<div class="band">
		<div class="code"><?php the_title(); ?></div>
		<div class="spec"><?php echo esc_html( get_field( 'rated_power', $id ) ); ?> · <?php echo esc_html( get_field( 'bucket_capacity', $id ) ); ?></div>
	</div>
	<a class="cta" href="<?php the_permalink(); ?>">
		<span class="en">Learn More</span> <span class="zh">了解更多详情</span> →
	</a>
</div>
