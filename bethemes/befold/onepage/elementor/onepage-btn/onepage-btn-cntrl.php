<?php

namespace Elementor;
use Elementor\Core\Schemes\Color;
use Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;


if ( ! defined( 'ABSPATH' ) ) exit;

// Register OnePage Button Widget class
class BETM_OnePage_Button  extends Widget_Base {
	
	public function get_categories() {
		return [ 'befold-onepage-widgets' ];
	}
	
	public function get_name() {
		return 'onepage-button';
	}
	
	public function get_title() {
		return __( 'OnePage Button', 'bethemesme' );
	}
	
	public function get_icon() {
		return 'eicon-button';
	}
	
	protected function register_controls() {
		$this->add_control(
			'onepage_button',
			[
				'label' => __( 'Button Option', 'bethemesme' ),
				'type' 	=> Controls_Manager::SECTION,
			]
		);

		// Button Text
		$this->add_control(
			'onepage_button_text',
			[
				'label' 	=> __( 'Button Text', 'bethemesme' ),
				'type' 		=> Controls_Manager::TEXT,
				'default' 	=> __( 'Follow Us', 'bethemesme' ),
				'title'		=> __( 'Enter Twitter Username', 'bethemesme' ),
				'section' 	=> 'onepage_button',
			]
		);
		// Button URL
		$this->add_control(
			'onepage_button_url',
			[
				'label' 	=> 	__( "Button URL", 'bethemesme' ),
				'type' 		=> 	Controls_Manager::TEXT,
				'default'	=> 	__( 'http://betheme.me', 'bethemesme' ),
				'title' 	=> 	__( 'Enter Button URL', 'bethemesme' ),
				'section' 	=> 	'onepage_button',
			]		 
		);
		
	}
	/**
	 * Enqueue scripts and styles.
	 */
	public function __construct($data = [], $args = null) {
		parent::__construct($data, $args);

		wp_enqueue_style( 'onepage-button-style', plugin_dir_url( __FILE__ ). 'assets/css/onepage-button-style.css');
	}

	public function get_script_depends() {
	   return [ 'onepage-button-style' ];
	}
	protected function render( $instance = [] ) {
		$settings = $this->get_settings();
		
		include( 'onepage-btn-output.php');
	}
	protected function content_template() {}
	public function render_plain_content( $instance = [] ) {}
}
Plugin::instance()->widgets_manager->register_widget_type( new BETM_OnePage_Button );