<?php
/* Template Name: Billodig — Contact Us */

$billodig_contact_sent = false;
if ( isset( $_POST['billodig_contact_nonce'] ) && wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['billodig_contact_nonce'] ) ), 'billodig_contact_submit' ) ) {
	$name    = sanitize_text_field( wp_unslash( $_POST['contact_name'] ?? '' ) );
	$phone   = sanitize_text_field( wp_unslash( $_POST['contact_phone'] ?? '' ) );
	$message = sanitize_textarea_field( wp_unslash( $_POST['contact_message'] ?? '' ) );
	if ( $name && $phone ) {
		wp_mail(
			billodig_inquiry_email(),
			sprintf( billodig_t( 'contact.mail_subject' ), $name ),
			sprintf( billodig_t( 'contact.mail_body' ), $name, $phone, $message )
		);
		$billodig_contact_sent = true;
	}
}

get_header();
get_template_part( 'template-parts/hero-banner', null, array(
	'en' => billodig_t( 'nav.contact' ),
	'zh' => billodig_zh( 'nav.contact' ),
) );
?>

<div class="contact-wrap">
	<div class="contact-form">
		<h2><?php echo esc_html( billodig_t( 'contact.eyebrow' ) ); ?></h2>
		<h3><?php billodig_the_label( 'nav.contact' ); ?></h3>
		<div class="lead"><?php echo esc_html( billodig_t( 'contact.lead' ) ); ?><br><span class="zh"><?php echo esc_html( billodig_zh( 'contact.lead' ) ); ?></span></div>

		<?php if ( $billodig_contact_sent ) : ?>
			<div class="form-notice"><?php echo esc_html( billodig_t( 'contact.sent' ) ); ?></div>
		<?php endif; ?>

		<form method="post">
			<?php wp_nonce_field( 'billodig_contact_submit', 'billodig_contact_nonce' ); ?>
			<div class="field">
				<input type="text" name="contact_name" placeholder="<?php echo esc_attr( billodig_pair( 'contact.name' ) ); ?>" required>
			</div>
			<div class="field">
				<input type="text" name="contact_phone" placeholder="<?php echo esc_attr( billodig_pair( 'contact.phone' ) ); ?>" required>
			</div>
			<div class="field">
				<textarea name="contact_message" rows="5" placeholder="<?php echo esc_attr( billodig_pair( 'contact.message' ) ); ?>"></textarea>
			</div>
			<button type="submit" class="submit-btn"><?php billodig_the_label( 'contact.submit' ); ?></button>
		</form>
	</div>

	<div class="contact-info">
		<div class="eyebrow"><?php echo esc_html( billodig_t( 'contact.eyebrow' ) ); ?></div>
		<h3><?php billodig_the_label( 'contact.info_title' ); ?></h3>
		<p><?php echo esc_html( billodig_t( 'contact.lead' ) ); ?></p>

		<div class="infoline">
			<div class="icn"><svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="1.8"><path d="M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3.1 19.5 19.5 0 0 1-6-6 19.8 19.8 0 0 1-3.1-8.6A2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7c.1 1 .4 2 .7 3a2 2 0 0 1-.5 2.1L8 10.1a16 16 0 0 0 6 6l1.3-1.3a2 2 0 0 1 2.1-.5c1 .3 2 .5 3 .7a2 2 0 0 1 1.6 2Z"></path></svg></div>
			<div><div class="lbl"><?php echo esc_html( billodig_pair( 'contact.tel' ) ); ?></div><div class="val"><?php echo esc_html( billodig_mod( 'phone' ) ); ?></div></div>
		</div>
		<div class="infoline">
			<div class="icn"><svg width="17" height="17" viewBox="0 0 24 24" fill="#fff"><path d="M22 5.9c-.7.3-1.5.5-2.3.6a4 4 0 0 0-6.9 3.6A11.4 11.4 0 0 1 3.9 4.6a4 4 0 0 0 1.24 5.3 4 4 0 0 1-1.8-.5v.05a4 4 0 0 0 3.2 3.9 4 4 0 0 1-1.8.07 4 4 0 0 0 3.7 2.75A8 8 0 0 1 2 17.6a11.4 11.4 0 0 0 6.2 1.8c7.4 0 11.5-6.1 11.5-11.5v-.5A8 8 0 0 0 22 5.9Z"></path></svg></div>
			<div><div class="lbl"><?php echo esc_html( billodig_pair( 'contact.whatsapp' ) ); ?></div><div class="val"><?php echo esc_html( billodig_mod( 'whatsapp' ) ); ?></div></div>
		</div>
		<div class="infoline">
			<div class="icn"><svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="1.8"><path d="M4 4h16v16H4z" opacity="0"></path><path d="M3 8 L12 14 L21 8 M4 6 H20 A1 1 0 0 1 21 7 V17 A1 1 0 0 1 20 18 H4 A1 1 0 0 1 3 17 V7 A1 1 0 0 1 4 6 Z"></path></svg></div>
			<div><div class="lbl"><?php echo esc_html( billodig_pair( 'contact.email' ) ); ?></div><div class="val"><?php echo esc_html( billodig_contact_email() ); ?></div></div>
		</div>
		<div class="infoline">
			<div class="icn"><svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="1.8"><path d="M12 21s-7-6.1-7-11.5A7 7 0 0 1 19 9.5C19 14.9 12 21 12 21Z"></path><circle cx="12" cy="9.5" r="2.4"></circle></svg></div>
			<div><div class="lbl"><?php echo esc_html( billodig_pair( 'contact.china' ) ); ?></div><div class="val"><?php echo billodig_multiline( billodig_mod( 'office_china' ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- escaped per line. ?></div></div>
		</div>
		<div class="infoline">
			<div class="icn"><svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="1.8"><path d="M12 21s-7-6.1-7-11.5A7 7 0 0 1 19 9.5C19 14.9 12 21 12 21Z"></path><circle cx="12" cy="9.5" r="2.4"></circle></svg></div>
			<div><div class="lbl"><?php echo esc_html( billodig_pair( 'contact.ethiopia' ) ); ?></div><div class="val"><?php echo billodig_multiline( billodig_mod( 'office_ethiopia' ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- escaped per line. ?></div></div>
		</div>
	</div>
</div>

<?php get_footer(); ?>
