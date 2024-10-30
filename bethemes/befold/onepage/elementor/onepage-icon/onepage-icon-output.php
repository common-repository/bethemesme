<section class="onepage_icon_service">
	<div class="icon-service-box icon-elementor-box">
		<div class="service_fade_icon">
			<?php
				if(isset( $settings['section_icon_service_icon_image']['url'] ) && $settings['section_icon_service_icon_image']['url'] !=''){
			 ?>
				<img src="<?php echo $settings['section_icon_service_icon_image']['url'];?>"  width="40" height="40" alt="">
			
		   <?php         
			}else{ ?>
				<i class="<?php $icon = isset( $settings['section_icon_service_icon'] ) ? $settings['section_icon_service_icon'] : ''; 
			   if (strpos($icon, 'fa fa-') !== false) {
					echo $icon; 
				}else{
				   echo "fa fa-".$icon; 
				   } ?>">
			</i>
			 <?php
			}
			?>
		</div>
		<div class="service-icon">
			<?php
				if(isset( $settings['section_icon_service_icon_image']['url'] ) && $settings['section_icon_service_icon_image']['url'] !=''){
			?>
				<img src="<?php echo $settings['section_icon_service_icon_image']['url'];?>"  width="40" height="40" alt="">
		   <?php         
			}else{
				?>
			<a href="<?php echo $settings['section_icon_service_icon_url']; ?>">									
			   <i class="<?php $icon = isset( $settings['section_icon_service_icon'] ) ? $settings['section_icon_service_icon'] : ''; 
				   if (strpos($icon, 'fa fa-') !== false) {
						echo $icon; 
					}else{
					   echo "fa fa-".$icon; 
					   } ?>"></i></a>
			   <?php
			}
			?>
		</div><!-- .service-icon -->

		<?php if ( isset( $settings['section_icon_service_title'] ) && $settings['section_icon_service_title'] != '' ) : ?>
			<h3 class="service-title"><?php echo strip_tags( html_entity_decode ($settings['section_icon_service_title'] ), '<span>' ); ?></h3>
		<?php endif; ?>

		<?php if ( isset( $settings['section_icon_service_description'] ) && $settings['section_icon_service_description'] != '' ) : ?>
			<p class="service-content"><?php echo $settings['section_icon_service_description']; ?></p>
		<?php endif; ?>

		<?php if ( isset( $settings['section_icon_service_url'] ) && $settings['section_icon_service_url'] != '' ) : ?>

		<?php endif; ?>
	</div><!-- .icon-service-box -->
</section><!-- #icon-service -->