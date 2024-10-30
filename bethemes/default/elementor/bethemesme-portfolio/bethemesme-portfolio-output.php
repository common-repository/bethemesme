<section class="bethemesme_portfolio">
	<div class="container-fluid portfolio_el_container">
		<?php
			$tags = get_terms( 'portfolio_tag' );
			$count = count( $tags );
			?>
		<?php  if ( ! is_wp_error( $tags ) && $count > 0 && $settings['section_enable_port_filter'] == "yes"  ) : ?>
	
		<div id="portfolio-filter" class="portfolio-filters  col-md-12 text-center">
			<a href="#" class="active" data-filter="*"><?php echo $settings['section_all_btn_text']; ?></a>
			<?php
		
				$t=0;
				foreach ( $tags as $tag ) {
					$tag_name = str_replace( ' ', '-', strtolower( $tag->name ) );
								
						printf( '<a href="#" class="active" data-filter=".portfolio-tag-%1s">%2s</a>', $tag_name, $tag->name );
						
					$t++;	
				}
			?>
		</div>
		<!-- #portfolio-filter -->
		
		<?php endif; ?>
			
		<div id="portfolio-container" class="col-md-10 col-md-offset-1"></div>
		<div id="portfolio-loader">
			<i class="fa fa-spinner fa-pulse"></i>
		</div>
		<!-- .portfolio-loader -->
		
		<div class="row">
			<div class="portfolio-wrap col-md-12 clearfix" data-itemcolumn="">
				<?php
				if(isset($settings['portfolio_item_number_to_show']) && !empty($settings['portfolio_item_number_to_show']) ){
					$bethemesme_portfolio_post_number = $settings['portfolio_item_number_to_show'];
				}else{
					$bethemesme_portfolio_post_number = -1;
				}
				$display_showall_button = "";	

					$number_of_portfolio_showall_button_text = $settings['portfolio_show_more_button'];
					
					$display_showall_button_url = $settings['portfolio_show_more_button_url'];
					
					$display_showall_button = '<div class="clearfix"><a href="'.$display_showall_button_url.'" target="_blank" class="btn bethemesme_btn_text"><span>'.$number_of_portfolio_showall_button_text.'</span></a></div>';

				$args = array(
					'post_type' => 'portfolio',
					'posts_per_page' => $bethemesme_portfolio_post_number,
				);
				$query = new \WP_Query( $args );
				
				if ( $query->have_posts() ) {
					global $post; 
					while ( $query->have_posts() ) : $query->the_post();
						$terms = get_the_terms( $post->ID, 'portfolio_tag' );
						if ( $terms && ! is_wp_error( $terms ) ) {
							$tag = array();
							$filter = array();
				
							foreach ( $terms as $term ) {
								$tag[] = $term->name;
								$filter[] = 'portfolio-tag-' . $term->name;
							}
				
							$filter = str_replace( ' ', '-', $filter );
							$portfolio_tag = ( join( ', ', $tag ) );
							$portfolio_filter = strtolower( join( ' ', $filter ) );
						}
						?>
						<article id="portfolio-item-<?php the_ID() ?>" class="portfolio-item <?php echo isset( $portfolio_filter ) ? ' ' . esc_attr( $portfolio_filter) : ''; ?> wow fadeIn" data-wow-delay=".5s">
							<?php
								$portfolio_thumbnail_url = get_the_post_thumbnail_url();			
							?>

							<a href="<?php echo esc_url($portfolio_thumbnail_url);?>" class="fancybox fancybox-images" data-fancybox-group="group" title="<?php the_title(); ?>">
								
								<div class="portfolio-image">
								<?php
									if ( has_post_thumbnail() ) {
										the_post_thumbnail( 'featured-thumb' );
									} else {
										printf( '<img src="%s">', esc_url( get_template_directory_uri() . '/images/portfolio-placeholder.png' ) );
									}
								?>
								</div>
								<!--.portfolio-image -->
								
								<div class="portfolio-caption">
									<h3 class="entry-title"><?php the_title(); ?></h3>
									<?php echo isset( $portfolio_tag ) ? '<span class="entry-meta">' . esc_html( $portfolio_tag ) . '</span>' : ''; ?>
								</div>
								<!--.portfolio-caption -->
								
							</a>
						
							<div class="popup_preview" id="popup_preview-<?php the_ID() ?>" style="display:none;">	
								<?php 
									$args = array(
										'post_parent'    => $post->ID,
										'post_type'      => 'attachment',
										'numberposts'    => -1, // show all
										'post_status'    => 'any',
										'post_mime_type' => 'image',
										'orderby'        => 'menu_order',
										'order'           => 'ASC'
									);
									$images = get_posts($args);	
								
									foreach ( $images as $image ) : 
										if ( count( $images ) > 1 ) :		
											?>
											<a href="<?php echo wp_get_attachment_url($image->ID); ?>"  data-fancybox-group="group" title="<?php the_title(); ?> "></a>		
											<?php 
										endif; 
									endforeach;
									if(empty($images)){
									?>
										<a href="<?php echo esc_url($portfolio_thumbnail_url); ?>"  data-fancybox-group="group" title="<?php the_title(); ?>">
										</a>
									<?php
									}			
								?>			
							</div>
							
						</article>
						<?php
					endwhile;
				} ?>
			</div>
		</div>
		<!-- #portfolio-wrap -->
		<div class="col-md-12 text-center showall_btn_wrap">
			<?php echo $display_showall_button;?>
		</div>
	
		<!-- .row -->
	</div>
	<!-- .container-fluid -->
</section>
<!-- #portfolio -->