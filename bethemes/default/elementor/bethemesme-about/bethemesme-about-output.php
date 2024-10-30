<section class="bethemesme_about clearfix">	
	<div class="bethemesme_about_caption">
		<div class="bethemesme_about_background_text">
		
			<?php if  (( $settings['bethemesme_about_title'] ) != '' ) : ?>
				<h5 class="bethemesme_about_title" ><?php echo strip_tags( html_entity_decode( $settings['bethemesme_about_title'] ), '<span>' ); ?></h5>
			<?php endif;
			
			if ( $settings['bethemesme_about_sub_title'] != '' ) : 
			?>
				<h2 class="bethemesme_about_sub_title sepline" ><?php echo $settings['bethemesme_about_sub_title']; ?></h2>
			<?php endif; ?> 
			
		</div>
	</div><!-- .bethemesme_about_caption -->
</section>