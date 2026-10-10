</main>

<div class="site-footer">
	<div class="footer-top">
		<?php billodig_site_logo( 'flogo' ); ?>
		<div class="footer-social">
			<?php billodig_social_links(); ?>
		</div>
	</div>
	<div class="footer-bottom">
		<div class="col" style="max-width:320px;">
			<div class="lbl"><?php echo esc_html( billodig_t( 'footer.brand' ) ); ?></div>
			<div><?php echo esc_html( billodig_mod( 'footer_about' ) ); ?></div>
		</div>
		<div class="col">
			<div class="lbl"><?php echo esc_html( billodig_pair( 'footer.contact' ) ); ?></div>
			<a href="tel:<?php echo esc_attr( billodig_phone_digits( billodig_mod( 'phone' ) ) ); ?>"><?php echo esc_html( billodig_t( 'footer.tel' ) ); ?> <?php echo esc_html( billodig_mod( 'phone' ) ); ?></a>
			<a href="https://wa.me/<?php echo esc_attr( billodig_phone_digits( billodig_mod( 'whatsapp' ), false ) ); ?>"><?php echo esc_html( billodig_t( 'footer.whatsapp' ) ); ?> <?php echo esc_html( billodig_mod( 'whatsapp' ) ); ?></a>
		</div>
		<div class="col">
			<div class="lbl"><?php echo esc_html( billodig_pair( 'footer.offices' ) ); ?></div>
			<div><?php echo esc_html( billodig_mod( 'footer_office_1' ) ); ?></div>
			<div><?php echo esc_html( billodig_mod( 'footer_office_2' ) ); ?></div>
		</div>
		<div class="col">
			<div class="lbl"><?php echo esc_html( billodig_t( 'footer.quick_links' ) ); ?></div>
			<?php billodig_footer_menu(); ?>
		</div>
	</div>
	<div class="footer-copy">&copy; <?php echo esc_html( wp_date( 'Y' ) . ' ' . billodig_mod( 'footer_copyright' ) ); ?></div>
</div>

</div>
<?php wp_footer(); ?>
</body>
</html>
