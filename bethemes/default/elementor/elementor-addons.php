<?php
	// Include all elementor widgets
	if( !function_exists( 'betm_elementor_widgets_addons' ) ) {
		function betm_elementor_widgets_addons() {
			require 'bethemesme-banner/bethemesme-banner-cntrl.php';
			require 'bethemesme-icon/bethemesme-icon-cntrl.php';
			//require 'bethemesme-portfolio/bethemesme-portfolio-cntrl.php';
			require 'bethemesme-vertical/bethemesme-vertical-promo-cntrl.php';
			require 'bethemesme-blog/bethemesme-blog-cntrl.php';
			require 'bethemesme-contact/bethemesme-contact-cntrl.php';
			require 'bethemesme-btn/bethemesme-btn-cntrl.php';
			require 'bethemesme-about/bethemesme-about-cntrl.php';
		}
	}
	add_action('elementor/widgets/widgets_registered', 'betm_elementor_widgets_addons');
	
	// Add Widgets Category
	if ( !function_exists( 'betm_register_bethemesme_category' ) ) {
		function betm_register_bethemesme_category( $elements_manager ) {
			$elements_manager->add_category(
				'bethemesme-widgets',
				[
					'title' => __( 'Bethemes Widgets', 'bethemesme' ),
					'icon' => 'fa fa-plug',
				]
			);
		}
	}
	add_action( 'elementor/elements/categories_registered', 'betm_register_bethemesme_category' );
	