<section id="blog" class="module  blog_module_elementor">
	<div class="row">
		<div class="blog-wrap col-md-12 clearfix">
			<?php
				$args = array(
					'posts_per_page' => 3,
					'post_status' => 'publish',
					'ignore_sticky_posts'=> 1
				);
				$query = new WP_Query( $args );

				if ( $query->have_posts() ) {
					while ( $query->have_posts() ) : $query->the_post();
					$thumb_id = get_post_thumbnail_id();
					$thumb_url = wp_get_attachment_image_src( $thumb_id, 'full' );
					?>
					
				<div class="col-md-4 col-sm-6">
					<div class="post_box_content">
						<div class="taxonomy_content_blog">
							<div class="category"> Latest </div>
							<div class="blog_date_elementor">
								<span class="post-date-day"><?php echo esc_html( get_the_date('d') ); ?></span>
								<span class="post-date-month"><?php echo esc_html( get_the_date('M') ); ?></span>
								<span class="post-date-year"><?php echo esc_html( get_the_date('Y') ); ?></span>
							</div>
						</div><!-- .entry-publish-date -->

						 <a href="<?php echo esc_url( get_permalink() ); ?>">
							<?php echo get_the_post_thumbnail( null, 'full', array( 'class' => 'image-fade' ) ); ?>
						</a>
						
						<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
						
						<div class="entry-excerpt">
							<?php //the_excerpt(); 
								$excerpt = get_the_excerpt();
								if (strlen($excerpt) > 100) 
								$excerpt = substr($excerpt, 0, 200) . '...';
								echo "<p>".$excerpt."</p>";
							?>
						</div><!-- .entry-excerpt --> 
						
						<div class="blog_btn_elementor">
							<a href="<?php echo get_the_permalink(); ?>" class="btn-more"><?php echo $settings['section_rm_btn_text'];?></a>
						</div>
					</div>
				</div>
				<?php		
					endwhile;
				}
				wp_reset_postdata();
			?>
		</div>
	</div>
</section><!-- #blog -->