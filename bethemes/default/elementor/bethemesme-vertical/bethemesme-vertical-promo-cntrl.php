<?php

namespace Elementor;
use Elementor\Core\Schemes\Color;

if ( ! defined( 'ABSPATH' ) ) exit;

// Register BeThemesMe Vertical Promotion Widget class
class BETM_BeThemesMe_Vertical_Promotion extends Widget_Base {
	
	public function get_categories() {
		return [ 'bethemesme-widgets' ];
	}
	
	public function get_name() {
		return 'bethemesme-vertical-promotion';
	}
	
	public function get_title() {
      return __( 'BeThemesMe Vertical Promotion', 'bethemesme' );
	}
	
	public function get_icon() {
      return 'eicon-slider-vertical';
	}
	
	protected function register_controls() {
		
		$this->add_control(
			'bethemesme_ver_promotion',
			[
				'label' => __( 'Vertical Promotion', 'bethemesme' ),
				'type'	=> Controls_Manager::SECTION,
			]
		);
		
		//subtitle
		$this->add_control(
			'bethemesme_ver_button_subtitle',
			[
				'label' 	=> __( "Sub Title", 'bethemesme' ),
				'type' 		=> Controls_Manager::TEXT,
				'default' 	=> __( 'Lorem ipsum dolor sit', 'bethemesme' ),
				'title' 	=> __( 'Enter Sub Title', 'bethemesme' ),
				'section' 	=> 'bethemesme_about',
				'selector' => '{{WRAPPER}} .bethemesme_about h2',
			]
		);
		
		// Button Text
		$this->add_control(
			'bethemesme_ver_button_text',
			[
				'label' 	=> __( 'Button Text', 'bethemesme' ),
				'type' 		=> Controls_Manager::TEXT,
				'default'	=> 	__( 'Learn More', 'bethemesme' ),
				'title'		=> __( 'Enter Twitter Username', 'bethemesme' ),
				'section' 	=> 'bethemesme_ver_promotion',
			]
		);
		
		// Button URL
		$this->add_control(
			'bethemesme_ver_button_url',
			[
				'label' 	=> 	__( "Button URL", 'bethemesme' ),
				'type' 		=> 	Controls_Manager::TEXT,
				'default'	=> 	__( 'http://betheme.me', 'bethemesme' ),
				'title' 	=> 	__( 'Enter Button URL', 'bethemesme' ),
				'section' 	=> 	'bethemesme_ver_promotion',
			]		 
		);
		
	}
	// End function

	public function __construct($data = [], $args = null) {
		parent::__construct($data, $args);

		//Heading
		wp_enqueue_style( 'heading-style',  plugin_dir_url( __FILE__ ). 'assets/css/bethemesme-vertical-promo.css' );
	}

	public function get_script_depends() {
	   return [ 'heading-style' ];
	}

	protected function render( $instance = [] ) {
		$settings = $this->get_settings();
		
		include( 'bethemesme-vertical-promo-output.php');
		
	}

	protected function content_template() {}
	
	public function render_plain_content( $instance = [] ) {}
}
Plugin::instance()->widgets_manager->register_widget_type( new BETM_BeThemesMe_Vertical_Promotion );