<section id="contact" class="module bethemesme_contact_module clearfix">
	<div class="container">
		<div class="row">
			
			<?php $contact_boxes = $settings['section_contact_boxes']; ?>
			<?php if ( ! empty( $contact_boxes ) ) : ?>
				<div class="contact-info col-md-4 col-sm-4 col-12 clearfix">
					<?php foreach ( $contact_boxes as $contact_box ) : ?>
						<div class="contact-item">
							<?php if ( isset( $contact_box['section_contact_box_icon'] ) && $contact_box['section_contact_box_icon'] != '' ) : ?>
								<div class="ci-icon"><i class="<?php $icon = $contact_box['section_contact_box_icon']; 
									if (strpos($icon, 'fa fa-') !== false) {
									echo $icon; 
								}else{
									echo "fa fa-".$icon; 
								} ?>"></i></div>
							<?php endif; ?>

							<?php if ( isset( $contact_box['section_contact_box_label'] ) && $contact_box['section_contact_box_label'] != '' ) : ?>
								<div class="ci-title"><?php echo $contact_box['section_contact_box_label']; ?></div>
							<?php endif; ?>

							<?php if ( isset( $contact_box['section_contact_box_description'] ) && $contact_box['section_contact_box_description'] != '' ) : ?>
								<?php if ( isset( $contact_box['section_contact_box_url'] ) && $contact_box['section_contact_box_url'] != '' ) : ?>
									<div class="ci-content"><a href="<?php echo $contact_box['section_contact_box_url']; ?>"><?php echo $contact_box['section_contact_box_description']; ?></a></div>
								<?php else : ?>
									<div class="ci-content"><?php echo $contact_box['section_contact_box_description']; ?></div>
								<?php endif; ?>
							<?php endif; ?>
						</div><!-- .contact-info -->
					<?php endforeach; ?> 
				</div><!-- .contact-item  -->
			<?php endif; ?>

			<div class="contact-form col-md-8  col-sm-8 col-12 clearfix">
				<?php
					$a = rand( 0, 9 );
					$b = rand( 0, 9 );
					$required = esc_attr__( 'This field is required.', 'bethemesme' );
					$equalto = esc_attr__( 'Please check your math.', 'bethemesme' );
					$email = esc_attr__( 'Invalid email address.', 'bethemesme' );
				?>

				<form id="contact-form" class="contact-form bethemesme_contact_form clearfix">
					<div class="contact-form-process">
						<i class="fa fa-spinner fa-pulse"></i>
					</div><!-- .contact-form-process -->

					<div id="contact-form-result"><span></span></div>

					<fieldset class="col-sm-4">
						<input type="text" id="contact-form-name" name="name" placeholder="<?php echo esc_html__( 'Name', 'bethemesme' ); ?>" value="<?php if( isset( $_POST['name'] ) ) { echo esc_attr( $_POST['name'] ); } ?>" class="cf-form-control required" data-msg-required="<?php echo $required; ?>" />
					</fieldset>

					<fieldset class="col-sm-4">
						<input type="email" id="contact-form-email" name="email" placeholder="<?php esc_html_e( 'Email', 'bethemesme' ); ?>" value="<?php if( isset( $_POST['email'] ) ) { echo esc_attr( $_POST['email'] ); } ?>" class="required email cf-form-control" data-msg-required="<?php echo $required; ?>" data-msg-email="<?php echo $email; ?>" />
					</fieldset>

					<fieldset class="col-sm-4">
						<input type="text" id="contact-form-phone" name="phone" placeholder="<?php esc_html_e( 'Phone', 'bethemesme' ); ?>" value="<?php if( isset( $_POST['phone'] ) ) { echo esc_attr( $_POST['phone'] ); } ?>" class="cf-form-control" />
					</fieldset>

					<fieldset class="col-sm-12">
						<input type="text" id="contact-form-subject" name="subject" placeholder="<?php esc_html_e( 'Subject', 'bethemesme' ); ?>" value="<?php if( isset( $_POST['subject'] ) ) { echo esc_attr( $_POST['subject'] ); } ?>" class="required cf-form-control" data-msg-required="<?php echo $required; ?>" />
					</fieldset>

					<fieldset class="col-sm-12">
						<textarea rows="3" id="contact-form-message" name="message" placeholder="<?php esc_html_e( 'Message', 'bethemesme' ); ?>" class="required cf-form-control" data-msg-required="<?php echo $required; ?>"><?php if( isset( $_POST['message'] ) ) { echo esc_attr( $_POST['message'] ); } ?></textarea>
					</fieldset>

					<fieldset class="captcha col-sm-6">
						<input type="text" id="contact-form-captcha" name="captcha" placeholder="<?php echo $a . ' + ' . $b . ' = ?'; ?>" class="required cf-form-control" data-msg-required="<?php echo $required; ?>" data-rule-equalto="#captcha-value" data-msg-equalto="<?php echo $equalto; ?>" />
						<input type="hidden" id="captcha-value" value="<?php echo $a + $b; ?>">
					</fieldset><!-- .captcha -->
					
					<?php if ( $settings['section_enable_privacy_notice'] == 'yes' ) {
						$page_id = $settings['section_privacy_page'];
						?>
					<fieldset class="checkbox col-sm-12">
						<input type="checkbox" id="contact-form-checkbox" name="checkbox" required class="required cf-form-control" value="1"  />
						<span><?php esc_html_e( 'By filling out this form and clicking submit, you agree to our ', 'bethemesme' ); ?></span><a class="link" href="<?php the_permalink($page_id); ?> " target="_blank"><?php echo get_the_title($page_id); ?></a>
					</fieldset><!-- .checkbox -->
					<?php } ?>
					
					<fieldset class="submit col-sm-6">
						<input type="hidden" name="action" value="contact_form">

						<?php wp_nonce_field( 'ajax_contact_form', 'ajax_contact_form_nonce' ); ?>

						<button class="btn bethemesme_btn_text" type="submit" id="contact-form-submit" name="submit" value="submit"><span><?php echo $settings['section_send_btn_text']; ?></span></button>
					
					</fieldset><!-- .submit -->
				</form>
			</div><!-- .contact-form -->
			
			
		</div><!-- .row -->
	</div><!-- .container -->

	

</section><!-- #contact -->