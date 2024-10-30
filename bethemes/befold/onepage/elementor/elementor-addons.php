<?php
	// Include all elementor widgets
	if( !function_exists( 'betm_elementor_widgets_addons' ) ) {
		function betm_elementor_widgets_addons() {
			require 'onepage-banner/onepage-banner-cntrl.php';
			require 'onepage-icon/onepage-icon-cntrl.php';
			require 'onepage-portfolio/onepage-portfolio-cntrl.php';
			require 'onepage-vertical/onepage-vertical-promo-cntrl.php';
			require 'onepage-blog/onepage-blog-cntrl.php';
			require 'onepage-contact/onepage-contact-cntrl.php';
			require 'onepage-btn/onepage-btn-cntrl.php';
			require 'onepage-about/onepage-about-cntrl.php';
		}
	}
	add_action('elementor/widgets/widgets_registered', 'betm_elementor_widgets_addons');
	
	// Add Widgets Category
	if ( !function_exists( 'betm_register_onepage_category' ) ) {
		function betm_register_onepage_category( $elements_manager ) {
			$elements_manager->add_category(
				'befold-onepage-widgets',
				[
					'title' => __( 'Befold OnePage Widgets', 'bethemesme' ),
					'icon' => 'fa fa-plug',
				]
			);
		}
	}
	add_action( 'elementor/elements/categories_registered', 'betm_register_onepage_category' );
	