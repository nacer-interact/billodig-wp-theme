<?php $assets = get_stylesheet_directory_uri() . '/assets'; ?>

<div class="site-footer">
	<div class="footer-top">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="flogo">
			<img src="<?php echo esc_url( $assets . '/billodig-logo-white.png' ); ?>" alt="Billodig">
		</a>
		<div class="footer-social">
			<a href="#" aria-label="Facebook"><svg width="15" height="15" viewBox="0 0 24 24" fill="currentColor"><path d="M13.5 21v-7.5h2.5l.4-3H13.5V8.4c0-.87.24-1.46 1.5-1.46h1.6V4.3C16.3 4.2 15.3 4 14.2 4c-2.4 0-4 1.46-4 4.15v2.35H7.7v3H10.2V21Z"></path></svg></a>
			<a href="#" aria-label="Twitter"><svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><path d="M22 5.9c-.7.3-1.5.5-2.3.6a4 4 0 0 0 1.75-2.2 8 8 0 0 1-2.5 1 4 4 0 0 0-6.9 3.6A11.4 11.4 0 0 1 3.9 4.6a4 4 0 0 0 1.24 5.3 4 4 0 0 1-1.8-.5v.05a4 4 0 0 0 3.2 3.9 4 4 0 0 1-1.8.07 4 4 0 0 0 3.7 2.75A8 8 0 0 1 2 17.6a11.4 11.4 0 0 0 6.2 1.8c7.4 0 11.5-6.1 11.5-11.5v-.5A8 8 0 0 0 22 5.9Z"></path></svg></a>
			<a href="#" aria-label="LinkedIn"><svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><rect x="3" y="3" width="18" height="18" rx="2"></rect><line x1="8" y1="11" x2="8" y2="17"></line><circle cx="8" cy="8" r="0.6" fill="currentColor"></circle><path d="M12 17 L12 11 M12 13.5 C12 11.5 16 11.5 16 13.5 L16 17"></path></svg></a>
			<a href="#" aria-label="TikTok"><svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><path d="M16 8a4 4 0 0 1-4-4 M12 4 L12 15.5 a3.5 3.5 0 1 1-3.5-3.5 M16 8 a4 4 0 0 0 4 0"></path></svg></a>
			<a href="#" aria-label="WeChat"><svg width="15" height="15" viewBox="0 0 24 24" fill="currentColor"><path d="M8.5 3C4.4 3 1 5.7 1 9.1c0 1.9 1.1 3.6 2.8 4.7l-.7 2.1 2.4-1.2c.7.2 1.3.3 2 .3h.3a5.6 5.6 0 0 1-.2-1.5c0-3.5 3.3-6.3 7.4-6.3h.3C14.6 4.7 11.8 3 8.5 3Zm-2.4 4a1 1 0 1 1 0 2 1 1 0 0 1 0-2Zm4.8 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2Zm5.6 2.4c-3.5 0-6.3 2.3-6.3 5.1 0 2.8 2.8 5.1 6.3 5.1.6 0 1.2-.1 1.7-.2l2 1-.6-1.8c1.4-1 2.2-2.4 2.2-4.1 0-2.8-2.8-5.1-5.3-5.1Zm-2.1 3.3a.8.8 0 1 1 0 1.6.8.8 0 0 1 0-1.6Zm4.2 0a.8.8 0 1 1 0 1.6.8.8 0 0 1 0-1.6Z"></path></svg></a>
		</div>
	</div>
	<div class="footer-bottom">
		<div class="col" style="max-width:320px;">
			<div class="lbl">BILLODIG</div>
			<div>A Billodig excavator &amp; heavy machinery brand of Fujian Kunyi Trading Co., Ltd (福建省鲲亿贸易有限公司), focused on fuel-efficient, reliable engineering equipment for overseas markets.</div>
		</div>
		<div class="col">
			<div class="lbl">Contact 联系方式</div>
			<a href="tel:+8618305934802">Tel / WeChat: +86 183-0593-4802</a>
			<a href="https://wa.me/251929240509">WhatsApp: +251 929-240-509</a>
		</div>
		<div class="col">
			<div class="lbl">Offices 办事处</div>
			<div>Fuzhou, Fujian, China 福建福州</div>
			<div>Addis Ababa, Ethiopia 埃塞俄比亚亚的斯亚贝巴</div>
		</div>
		<div class="col">
			<div class="lbl">Quick Links</div>
			<a href="<?php echo esc_url( home_url( '/products-services/' ) ); ?>">Products &amp; Services</a>
			<a href="<?php echo esc_url( home_url( '/contact-us/' ) ); ?>">Contact Us</a>
		</div>
	</div>
	<div class="footer-copy">&copy; <?php echo esc_html( date( 'Y' ) ); ?> Billodig — Fujian Kunyi Trading Co., Ltd. All rights reserved.</div>
</div>

</div>
<?php wp_footer(); ?>
</body>
</html>
