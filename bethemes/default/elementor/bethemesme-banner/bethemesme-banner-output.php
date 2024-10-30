<?php
	$bethemesme_banner_background_image = isset( $settings['bethemesme_banner_background_image']['url'] ) && !empty( $settings['bethemesme_banner_background_image']['url'] ) ? $settings['bethemesme_banner_background_image']['url'] : '';
?>
<section class="bethemesme_banner" style="background-image: url('<?php echo $settings['bethemesme_banner_background_image']['url']; ?>');">
	<span class="bethemesme_vertical_line first">
		<span></span>
	</span>
	<span class="bethemesme_vertical_line second">
		<span></span>
		<span></span>
	</span>
	<div class="bethemesme_banner_wrapper">
		<div class="bethemesme_banner_overlay">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="slider-caption text-left clearfix">
							<div class="row">
								<div class="col-md-7 col-sm-12">
									<?php
									if ( $settings['bethemesme_banner_title'] != '' ) {
										echo '<h1 class="banner_title">' . strip_tags( html_entity_decode( $settings['bethemesme_banner_title'] ), '<span>' ) . '</h1>';
									} ?>
								
									<?php
									if ( $settings['bethemesme_banner_content'] != '' ) {
										echo '<p>' . strip_tags( html_entity_decode( $settings['bethemesme_banner_content'] ), '<span>' ) . '</p>';
									}
									?>
									<?php 
									if ( $settings['bethemesme_banner_button_text'] != '' ) : 
										?>
										<div class="banner_buttton banner-button-animation">
											<a href="<?php echo $settings['bethemesme_banner_button_url']; ?>" class="banner_btn banner_btn_el"><?php echo $settings['bethemesme_banner_button_text']; ?></a>
										</div><!-- .slider-btn -->
									<?php endif; ?>
								
								</div><!-- .md -->
							</div><!-- .row -->
						</div><!-- .slider-caption -->
					</div><!-- .md -->
				</div><!-- .row -->
			</div><!-- .container -->
		</div><!-- .slider-overlay -->
	</div><!-- .bethemesme_banner_wrapper -->
</section><!-- .bethemesme_banner-->