<section class="onepage_about clearfix">	
	<div class="onepage_about_caption">
		<div class="onepage_about_background_text">
		
			<?php if  (( $settings['onepage_about_title'] ) != '' ) : ?>
				<h5 class="onepage_about_title" ><?php echo strip_tags( html_entity_decode( $settings['onepage_about_title'] ), '<span>' ); ?></h5>
			<?php endif;
			
			if ( $settings['onepage_about_sub_title'] != '' ) : 
			?>
				<h2 class="onepage_about_sub_title sepline" ><?php echo $settings['onepage_about_sub_title']; ?></h2>
			<?php endif; ?> 
			
		</div>
	</div><!-- .onepage_about_caption -->
</section>