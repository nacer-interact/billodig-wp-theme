<?php
/**
 * Fixed interface text, kept out of the templates.
 *
 * Every visible label that is not a Customizer option lives here as
 * 'key' => array( English, Chinese ). The theme is bilingual: the English text
 * is the primary label and the Chinese text is the secondary label shown next
 * to it. Both are wrapped for translation (English with __(), Chinese with
 * _x() and a context so translators can tell them apart), so they can be
 * changed from a .po file, a translation plugin, or the `billodig_strings`
 * filter, without touching a template.
 *
 * Templates read them with billodig_t(), billodig_zh(), billodig_pair() and
 * billodig_the_label(). Text that is editable in Appearance > Customize lives
 * in defaults.php instead.
 *
 * @package Billodig
 */

/**
 * All fixed strings.
 *
 * @return array<string,array{0:string,1:string}>
 */
function billodig_strings() {
	static $strings = null;

	if ( null === $strings ) {
		$strings = apply_filters(
			'billodig_strings',
			array(
				/* ---- Accessibility and search --------------------------- */
				'a11y.skip'           => array( __( 'Skip to content', 'billodig' ), '' ),
				'search.label'        => array( __( 'Search', 'billodig' ), '' ),
				'search.submit'       => array( __( 'Submit search', 'billodig' ), '' ),
				'search.placeholder'  => array( __( 'Search products…', 'billodig' ), '' ),
				'search.title'        => array( __( 'Search Results', 'billodig' ), _x( '搜索结果', 'Chinese label: Search Results', 'billodig' ) ),
				/* translators: 1: number of results, 2: search term */
				'search.count'        => array( __( '%1$d result(s) for “%2$s”', 'billodig' ), '' ),
				/* translators: %s: "Contact us" link */
				'search.none'         => array( __( 'No results found. %s and we\'ll help you find what you need.', 'billodig' ), '' ),
				'index.none'          => array( __( 'Nothing found.', 'billodig' ), '' ),

				/* ---- Main navigation (also the footer and page banners) --- */
				'nav.home'            => array( __( 'Home', 'billodig' ), _x( '首页', 'Chinese label: Home', 'billodig' ) ),
				'nav.about'           => array( __( 'About Us', 'billodig' ), _x( '关于我们', 'Chinese label: About Us', 'billodig' ) ),
				'nav.products'        => array( __( 'Products & Services', 'billodig' ), _x( '产品与服务', 'Chinese label: Products & Services', 'billodig' ) ),
				'nav.fuel'            => array( __( 'Fuel-Powered Equipment', 'billodig' ), _x( '燃油版设备', 'Chinese label: Fuel-Powered Equipment (menu)', 'billodig' ) ),
				'nav.electric'        => array( __( 'Electric Equipment', 'billodig' ), _x( '电动版设备', 'Chinese label: Electric Equipment (menu)', 'billodig' ) ),
				'nav.parts'           => array( __( 'Parts', 'billodig' ), _x( '配件', 'Chinese label: Parts', 'billodig' ) ),
				'nav.news'            => array( __( 'News & Events', 'billodig' ), _x( '新闻与活动', 'Chinese label: News & Events', 'billodig' ) ),
				'nav.contact'         => array( __( 'Contact Us', 'billodig' ), _x( '联系我们', 'Chinese label: Contact Us', 'billodig' ) ),

				/* ---- Footer --------------------------------------------- */
				'footer.brand'        => array( __( 'BILLODIG', 'billodig' ), '' ),
				'footer.contact'      => array( __( 'Contact', 'billodig' ), _x( '联系方式', 'Chinese label: Contact (footer column)', 'billodig' ) ),
				'footer.tel'          => array( __( 'Tel / WeChat:', 'billodig' ), '' ),
				'footer.whatsapp'     => array( __( 'WhatsApp:', 'billodig' ), '' ),
				'footer.offices'      => array( __( 'Offices', 'billodig' ), _x( '办事处', 'Chinese label: Offices', 'billodig' ) ),
				'footer.quick_links'  => array( __( 'Quick Links', 'billodig' ), '' ),

				/* ---- Image descriptions --------------------------------- */
				'alt.hero'            => array( __( 'Billodig equipment lineup', 'billodig' ), '' ),
				'alt.site'            => array( __( 'Billodig excavators on site', 'billodig' ), '' ),
				'alt.excavator'       => array( __( 'Billodig excavator', 'billodig' ), '' ),
				'alt.gasoline'        => array( __( 'Gasoline excavator', 'billodig' ), '' ),
				'alt.diesel'          => array( __( 'Diesel excavator', 'billodig' ), '' ),

				/* ---- Shared buttons and badges -------------------------- */
				'common.hot'          => array( __( 'HOT', 'billodig' ), '' ),
				'common.learn_more'   => array( __( 'Learn More', 'billodig' ), _x( '了解更多详情', 'Chinese label: Learn More', 'billodig' ) ),
				'common.enquire'      => array( __( 'Enquire', 'billodig' ), _x( '咨询', 'Chinese label: Enquire', 'billodig' ) ),
				'common.contact_link' => array( __( 'Contact us', 'billodig' ), '' ),

				/* ---- Product catalogue ---------------------------------- */
				'catalog.banner'      => array( __( 'Billodig Excavators', 'billodig' ), _x( '挖掘机', 'Chinese label: Excavators', 'billodig' ) ),
				'catalog.crumb'       => array( __( 'Products & Services / Excavators', 'billodig' ), '' ),
				'catalog.all_models'  => array( __( 'All Excavator Models', 'billodig' ), _x( '全部型号', 'Chinese label: All models', 'billodig' ) ),
				/* translators: %s: product line name, e.g. "Diesel" */
				'catalog.line_title'  => array( __( '%s Excavators', 'billodig' ), '' ),
				/* translators: %s: "Contact us" link */
				'catalog.empty'       => array( __( 'No models published yet. %s for availability.', 'billodig' ), '' ),
				/* translators: %s: "Contact us" link */
				'catalog.empty_line'  => array( __( 'No models in this line yet. %s for availability.', 'billodig' ), '' ),

				/* ---- Product page --------------------------------------- */
				'product.search'      => array( __( 'Search by keyword…', 'billodig' ), _x( '请输入产品关键词搜索', 'Chinese label: enter a product keyword', 'billodig' ) ),
				'product.weight'      => array( __( 'Working weight', 'billodig' ), _x( '整机重量', 'Chinese label: Working weight', 'billodig' ) ),
				'product.power'       => array( __( 'Rated power', 'billodig' ), _x( '额定功率', 'Chinese label: Rated power', 'billodig' ) ),
				'product.bucket'      => array( __( 'Bucket capacity', 'billodig' ), _x( '铲斗容量', 'Chinese label: Bucket capacity', 'billodig' ) ),
				'product.quote'       => array( __( 'Request a Quote', 'billodig' ), _x( '获取报价', 'Chinese label: Request a Quote', 'billodig' ) ),
				'product.spec_sheet'  => array( __( 'Download Spec Sheet', 'billodig' ), _x( '下载规格表', 'Chinese label: Download Spec Sheet', 'billodig' ) ),
				'product.main_specs'  => array( __( 'Main Specifications', 'billodig' ), _x( '主要参数', 'Chinese label: Main Specifications', 'billodig' ) ),
				'product.tech_params' => array( __( 'Technical Parameters', 'billodig' ), _x( '技术参数', 'Chinese label: Technical Parameters', 'billodig' ) ),
				'product.videos'      => array( __( 'Work Videos', 'billodig' ), _x( '作业视频', 'Chinese label: Work Videos (section)', 'billodig' ) ),
				'product.video'       => array( __( 'Work Video', 'billodig' ), _x( '作业视频', 'Chinese label: Work Video (default caption)', 'billodig' ) ),

				/* ---- Product lines: Chinese name of each taxonomy term ---- */
				'term.gasoline'       => array( '', _x( '汽油挖掘机', 'Chinese name of the Gasoline product line', 'billodig' ) ),
				'term.diesel'         => array( '', _x( '柴油挖掘机', 'Chinese name of the Diesel product line', 'billodig' ) ),
				'term.gas'            => array( '', _x( 'GAS挖掘机', 'Chinese name of the Gas product line', 'billodig' ) ),
				'term.cable'          => array( '', _x( '电缆式挖掘机', 'Chinese name of the Cable product line', 'billodig' ) ),
				'term.battery'        => array( '', _x( '电池式挖掘机', 'Chinese name of the Battery product line', 'billodig' ) ),

				/* ---- Products & Services page --------------------------- */
				'pline.fuel_title'    => array( __( 'Fuel-Powered Equipment', 'billodig' ), _x( '燃油版设备挖掘机产品线', 'Chinese heading: fuel-powered excavator line', 'billodig' ) ),
				'pline.electric_title' => array( __( 'Electric Equipment', 'billodig' ), _x( '电动版设备挖掘机产品线', 'Chinese heading: electric excavator line', 'billodig' ) ),
				'pline.gasoline'      => array( __( 'Gasoline Excavator', 'billodig' ), _x( '汽油挖掘机', 'Chinese card label: Gasoline Excavator', 'billodig' ) ),
				'pline.diesel'        => array( __( 'Diesel Excavator', 'billodig' ), _x( '柴油挖掘机', 'Chinese card label: Diesel Excavator', 'billodig' ) ),
				'pline.gas'           => array( __( 'GAS Excavator', 'billodig' ), _x( 'GAS挖掘机 · coming soon', 'Chinese card label: GAS Excavator (coming soon)', 'billodig' ) ),
				'pline.cable'         => array( __( 'Cable Excavator', 'billodig' ), _x( '电缆式挖掘机 · coming soon', 'Chinese card label: Cable Excavator (coming soon)', 'billodig' ) ),
				'pline.battery'       => array( __( 'Battery Excavator', 'billodig' ), _x( '电池式挖掘机 · coming soon', 'Chinese card label: Battery Excavator (coming soon)', 'billodig' ) ),
				'pline.parts_card'    => array( __( 'Excavator Parts', 'billodig' ), _x( '挖掘机配件', 'Chinese card label: Excavator Parts', 'billodig' ) ),

				/* ---- News & Events -------------------------------------- */
				'news.company'        => array( __( 'Company News', 'billodig' ), _x( '公司新闻', 'Chinese label: Company News', 'billodig' ) ),
				'news.empty'          => array( __( 'No news posted yet — check back soon, or follow us on WeChat/WhatsApp for updates.', 'billodig' ), '' ),
				'news.back'           => array( __( 'Back to News & Events', 'billodig' ), _x( '返回新闻与活动', 'Chinese label: Back to News & Events', 'billodig' ) ),

				/* ---- Contact Us ----------------------------------------- */
				'contact.eyebrow'     => array( __( 'CONTACT US', 'billodig' ), '' ),
				'contact.info_title'  => array( __( 'Contact Information', 'billodig' ), _x( '联系我们', 'Chinese label: Contact Information', 'billodig' ) ),
				'contact.lead'        => array( __( 'If you have any product enquiries or after-sales needs, please get in touch — thank you for your support.', 'billodig' ), _x( '如果有任何产品咨询和售后方面的需求请您与我们取得联系，感谢您的支持~', 'Chinese: contact page intro', 'billodig' ) ),
				'contact.sent'        => array( __( 'Thank you — your inquiry has been sent. We\'ll be in touch shortly.', 'billodig' ), '' ),
				'contact.name'        => array( __( 'Your name', 'billodig' ), _x( '您的姓名 *', 'Chinese label: Your name (required)', 'billodig' ) ),
				'contact.phone'       => array( __( 'Your phone', 'billodig' ), _x( '您的电话 *', 'Chinese label: Your phone (required)', 'billodig' ) ),
				'contact.message'     => array( __( 'Message', 'billodig' ), _x( '留言内容', 'Chinese label: Message', 'billodig' ) ),
				'contact.submit'      => array( __( 'Submit Now', 'billodig' ), _x( '立即提交', 'Chinese label: Submit Now', 'billodig' ) ),
				'contact.tel'         => array( __( 'TEL / WECHAT', 'billodig' ), _x( '电话', 'Chinese label: Phone', 'billodig' ) ),
				'contact.whatsapp'    => array( __( 'WHATSAPP', 'billodig' ), '' ),
				'contact.email'       => array( __( 'EMAIL', 'billodig' ), _x( '邮箱', 'Chinese label: Email', 'billodig' ) ),
				'contact.china'       => array( __( 'CHINA OFFICE', 'billodig' ), _x( '中国办事处', 'Chinese label: China office', 'billodig' ) ),
				'contact.ethiopia'    => array( __( 'ETHIOPIA OFFICE', 'billodig' ), _x( '埃塞俄比亚办事处', 'Chinese label: Ethiopia office', 'billodig' ) ),
				/* translators: %s: sender name */
				'contact.mail_subject' => array( __( 'New Billodig inquiry from %s', 'billodig' ), '' ),
				/* translators: 1: sender name, 2: sender phone, 3: message */
				'contact.mail_body'   => array( __( "Name: %1\$s\nPhone: %2\$s\n\nMessage:\n%3\$s", 'billodig' ), '' ),
			)
		);
	}

	return $strings;
}

/**
 * English text for a key (already translated for the current locale).
 *
 * @param string $key Key from billodig_strings().
 * @return string
 */
function billodig_t( $key ) {
	$strings = billodig_strings();
	return isset( $strings[ $key ] ) ? (string) $strings[ $key ][0] : '';
}

/**
 * Chinese text for a key.
 *
 * @param string $key Key from billodig_strings().
 * @return string
 */
function billodig_zh( $key ) {
	$strings = billodig_strings();
	return isset( $strings[ $key ] ) ? (string) $strings[ $key ][1] : '';
}

/**
 * "English Chinese" as one plain string (used for placeholders and labels
 * that are a single text node).
 *
 * @param string $key Key from billodig_strings().
 * @return string
 */
function billodig_pair( $key ) {
	return trim( billodig_t( $key ) . ' ' . billodig_zh( $key ) );
}

/**
 * Print the bilingual label markup: English span, separator, Chinese span.
 *
 * @param string $key Key from billodig_strings().
 * @param string $sep Text between the two spans (' ' or '').
 * @param string $tag Wrapper element, 'span' or 'div'.
 */
function billodig_the_label( $key, $sep = ' ', $tag = 'span' ) {
	$tag = in_array( $tag, array( 'span', 'div' ), true ) ? $tag : 'span';
	printf( '<%1$s class="en">%2$s</%1$s>', $tag, esc_html( billodig_t( $key ) ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- $tag is whitelisted above.
	if ( '' !== billodig_zh( $key ) ) {
		echo $sep; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- literal whitespace from templates.
		printf( '<%1$s class="zh">%2$s</%1$s>', $tag, esc_html( billodig_zh( $key ) ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}
}

/**
 * Sentence with a "Contact us" link, e.g. "No models yet. Contact us for availability."
 *
 * @param string $key Key whose English text contains one %s for the link.
 */
function billodig_the_sentence_with_contact_link( $key ) {
	$link = sprintf( '<a href="%s">%s</a>', esc_url( home_url( '/contact-us/' ) ), esc_html( billodig_t( 'common.contact_link' ) ) );
	echo wp_kses( sprintf( esc_html( billodig_t( $key ) ), $link ), array( 'a' => array( 'href' => array() ) ) );
}
