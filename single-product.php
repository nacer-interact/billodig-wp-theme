<?php get_header(); while ( have_posts() ) : the_post();
$id = get_the_ID();
$f  = function ( $key ) use ( $id ) { return esc_html( get_field( $key, $id ) ); };
$is_hot = get_field( 'is_hot', $id );

get_template_part( 'template-parts/product-banner', null, array(
	'en'    => 'Billodig Excavators',
	'zh'    => '挖掘机',
	'crumb' => 'Products & Services / Excavators / ' . get_the_title(),
) );

/* Group main_specifications rows by category, preserving row order and
 * carrying the Chinese category label along with it. */
$main_spec_groups = array();
if ( have_rows( 'main_specifications', $id ) ) {
	while ( have_rows( 'main_specifications', $id ) ) {
		the_row();
		$category = get_sub_field( 'category' );
		if ( ! isset( $main_spec_groups[ $category ] ) ) {
			$main_spec_groups[ $category ] = array(
				'zh'   => get_sub_field( 'category_zh' ),
				'rows' => array(),
			);
		}
		$main_spec_groups[ $category ]['rows'][] = array(
			'label' => get_sub_field( 'label' ),
			'value' => get_sub_field( 'value' ),
		);
	}
}

$technical_parameters = array();
if ( have_rows( 'technical_parameters', $id ) ) {
	while ( have_rows( 'technical_parameters', $id ) ) {
		the_row();
		$technical_parameters[] = array(
			'label' => get_sub_field( 'label' ),
			'value' => get_sub_field( 'value' ),
		);
	}
}
$tech_mid     = (int) ceil( count( $technical_parameters ) / 2 );
$tech_columns = array(
	array_slice( $technical_parameters, 0, $tech_mid ),
	array_slice( $technical_parameters, $tech_mid ),
);
?>

<form class="product-search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<input type="hidden" name="post_type" value="product">
	<input type="search" name="s" placeholder="Search by keyword… 请输入产品关键词搜索" value="<?php echo esc_attr( get_search_query() ); ?>">
	<button type="submit" aria-label="Search"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="7"></circle><line x1="21" y1="21" x2="16.2" y2="16.2"></line></svg></button>
</form>

<div class="detail-head">
	<div class="photo">
		<?php if ( has_post_thumbnail() ) : the_post_thumbnail( 'large' ); else : ?>
			<div style="background:var(--fog);height:320px;border-radius:4px;"></div>
		<?php endif; ?>
	</div>
	<div class="info">
		<?php if ( $is_hot ) : ?><span class="hot-badge" style="position:static;display:inline-block;margin-bottom:10px;">HOT</span><?php endif; ?>
		<div class="model-code"><?php the_title(); ?></div>
		<div style="font-size:14px;color:var(--ink-soft);margin-bottom:20px;"><?php echo $f( 'subtitle' ); ?> · <?php echo $f( 'tagline' ); ?></div>
		<div class="badges">
			<div class="badge"><span class="en">Working weight</span> <span class="zh">整机重量</span><b><?php echo $f( 'working_weight' ); ?></b></div>
			<div class="badge"><span class="en">Rated power</span> <span class="zh">额定功率</span><b><?php echo $f( 'rated_power_full' ); ?></b></div>
			<div class="badge"><span class="en">Bucket capacity</span> <span class="zh">铲斗容量</span><b><?php echo $f( 'bucket_capacity' ); ?></b></div>
		</div>
		<div class="cta-row">
			<a class="btn btn-primary" href="<?php echo esc_url( home_url( '/contact-us/' ) ); ?>"><span class="en">Request a Quote</span> <span class="zh">获取报价</span></a>
			<a class="btn btn-outline" href="<?php echo esc_url( home_url( '/contact-us/' ) ); ?>"><span class="en">Download Spec Sheet</span> <span class="zh">下载规格表</span></a>
		</div>
	</div>
</div>

<?php if ( ! empty( $main_spec_groups ) ) : ?>
<div class="spectable">
	<div class="sechead"><span class="en">Main Specifications</span><span class="zh">主要参数</span></div>
	<div class="specgrid">
		<?php foreach ( $main_spec_groups as $category => $group ) : ?>
			<div class="catcell" style="grid-row:span <?php echo (int) count( $group['rows'] ); ?>;">
				<?php echo esc_html( $category ); ?><?php if ( $group['zh'] ) : ?><span class="zh" style="display:block;font-weight:400;color:var(--ink-soft);"><?php echo esc_html( $group['zh'] ); ?></span><?php endif; ?>
			</div>
			<?php foreach ( $group['rows'] as $row ) : ?>
				<div class="labelcell"><?php echo esc_html( $row['label'] ); ?></div><div class="valcell"><?php echo esc_html( $row['value'] ); ?></div>
			<?php endforeach; ?>
		<?php endforeach; ?>
	</div>
</div>
<?php endif; ?>

<?php if ( ! empty( $technical_parameters ) ) : ?>
<div class="spectable">
	<div class="sechead"><span class="en">Technical Parameters</span><span class="zh">技术参数</span></div>
	<div class="spec-two-col">
		<?php foreach ( $tech_columns as $column ) : ?>
		<div>
			<div class="specgrid narrow">
				<?php foreach ( $column as $row ) : ?>
					<div class="labelcell"><?php echo esc_html( $row['label'] ); ?></div><div class="valcell"><?php echo esc_html( $row['value'] ); ?></div>
				<?php endforeach; ?>
			</div>
		</div>
		<?php endforeach; ?>
	</div>
</div>
<?php endif; ?>

<?php if ( have_rows( 'product_videos', $id ) ) : ?>
<div class="section-head left" style="padding:0 56px;margin-bottom:24px;">
	<div class="kicker">作业视频</div>
	<h2 style="font-size:22px;">Work Videos</h2>
	<div class="rule"></div>
</div>
<div class="video-grid">
	<?php while ( have_rows( 'product_videos', $id ) ) : the_row();
		$video_url = get_sub_field( 'video_url' );
		$thumb     = get_sub_field( 'thumbnail' );
		$caption_zh = get_sub_field( 'caption_zh' );
		if ( ! $video_url ) {
			continue;
		}
		?>
		<a class="video-tile" href="<?php echo esc_url( $video_url ); ?>" target="_blank" rel="noopener">
			<img src="<?php echo $thumb ? esc_url( $thumb ) : esc_url( get_the_post_thumbnail_url( $id, 'medium' ) ); ?>" alt="">
			<div class="caption">
				<span class="play"><svg width="16" height="16" viewBox="0 0 24 24" fill="#fff"><path d="M8 5 L19 12 L8 19 Z"></path></svg></span>
				<span><span class="en">Work Video</span> <span class="zh"><?php echo esc_html( $caption_zh ?: '作业视频' ); ?></span></span>
			</div>
		</a>
	<?php endwhile; ?>
</div>
<?php endif; ?>

<div style="height:40px;"></div>

<?php endwhile; get_footer(); ?>
