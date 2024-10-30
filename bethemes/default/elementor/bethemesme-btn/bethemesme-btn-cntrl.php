<?php

namespace Elementor;
use Elementor\Core\Schemes\Color;
use Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;


if ( ! defined( 'ABSPATH' ) ) exit;

// Register BeThemesMe Button Widget class
class BETM_BeThemesMe_Button  extends Widget_Base {
	
	public function get_categories() {
		return [ 'bethemesme-widgets' ];
	}
	
	public function get_name() {
		return 'bethemesme-button';
	}
	
	public function get_title() {
		return __( 'BeThemesMe Button', 'bethemesme' );
	}
	
	public function get_icon() {
		return 'eicon-button';
	}
	
	protected function register_controls() {
		$this->add_control(
			'bethemesme_button',
			[
				'label' => __( 'Button Option', 'bethemesme' ),
				'type' 	=> Controls_Manager::SECTION,
			]
		);

		// Button Text
		$this->add_control(
			'bethemesme_button_text',
			[
				'label' 	=> __( 'Button Text', 'bethemesme' ),
				'type' 		=> Controls_Manager::TEXT,
				'default' 	=> __( 'Follow Us', 'bethemesme' ),
				'title'		=> __( 'Enter Twitter Username', 'bethemesme' ),
				'section' 	=> 'bethemesme_button',
			]
		);
		// Button URL
		$this->add_control(
			'bethemesme_button_url',
			[
				'label' 	=> 	__( "Button URL", 'bethemesme' ),
				'type' 		=> 	Controls_Manager::TEXT,
				'default'	=> 	__( 'http://betheme.me', 'bethemesme' ),
				'title' 	=> 	__( 'Enter Button URL', 'bethemesme' ),
				'section' 	=> 	'bethemesme_button',
			]		 
		);
		
	}
	/**
	 * Enqueue scripts and styles.
	 */
	public function __construct($data = [], $args = null) {
		parent::__construct($data, $args);

		wp_enqueue_style( 'bethemesme-button-style', plugin_dir_url( __FILE__ ). 'assets/css/bethemesme-button-style.css');
	}

	public function get_script_depends() {
	   return [ 'bethemesme-button-style' ];
	}
	protected function render( $instance = [] ) {
		$settings = $this->get_settings();
		
		include( 'bethemesme-btn-output.php');
	}
	protected function content_template() {}
	public function render_plain_content( $instance = [] ) {}
}
Plugin::instance()->widgets_manager->register_widget_type( new BETM_BeThemesMe_Button );