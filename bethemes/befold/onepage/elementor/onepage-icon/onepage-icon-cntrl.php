<?php

namespace Elementor;	
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Typography;
use Elementor\Core\Schemes\Typography;
use Elementor\Core\Schemes\Color;

if ( ! defined( 'ABSPATH' ) ) exit;	

// Register OnePage Icon Service Widget class
class BETM_OnePage_Icon_Service extends Widget_Base {
	
	public function get_categories() {
		return [ 'befold-onepage-widgets' ];
	}
	
	public function get_name() {
		return 'onepage-icon-service';
	}		
	public function get_title() {
		return __( 'OnePage Icon Service', 'bethemesme' );
	}
		
	public function get_icon() {
		return 'eicon-favorite';
	}
	
	protected function register_controls() {	
		$this->add_control(
		'onepage_icon_service',
			[
				'label' => __( 'Icon Service Option', 'bethemesme' ),
				'type' 	=> Controls_Manager::SECTION,
			]
		);
		
		//Box content		
		$this->add_control(
			'section_icon_service_title',
			[
				'label' 	=> __( "Title", 'bethemesme' ),
				'type' 		=> Controls_Manager::TEXT,
				'default' 	=> __( 'Enter the Title', 'bethemesme' ),
				'section' 	=> 'onepage_icon_service',
				
			]
		);
		//Box Description
		$this->add_control(
			'section_icon_service_description',
			[
				'label' 	=> 	__( "Description", 'bethemesme' ),
				'type' 		=> 	Controls_Manager::TEXTAREA,
				'rows' 		=> 	7,
				'default' 	=> __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua', 'bethemesme' ),
				'section' 	=> 'onepage_icon_service',
			]
		);
		
		//Box Icon
		$this->add_control(
			'section_icon_service_icon',
			[
				'label' 	=> 	__( "Icon", 'bethemesme' ),
				'type' 		=> 	Controls_Manager::ICON,
				'default' 	=> __( 'fa fa-address-book', 'bethemesme' ),
				'section' 	=> 'onepage_icon_service',
			]
		);
		
		// Button URL
		$this->add_control(
			'section_icon_service_icon_url',
			[
				'label' 	=> 	__( "Section Icon Service Icon URL", 'bethemesme' ),
				'type' 		=> 	Controls_Manager::TEXT,
				'default'	=> 	__( 'http://betheme.me', 'bethemesme' ),
				'title' 	=> 	__( 'Enter Icon Servicen URL', 'bethemesme' ),
				'section' 	=> 	'onepage_icon_service',
			]		 
		);
		
	}// End function
	public function __construct($data = [], $args = null) {
		parent::__construct($data, $args);

		//Icon Servies
		wp_enqueue_style( 'onepage-icon-style', plugin_dir_url( __FILE__ ). 'assets/css/onepage-icon.css' );
	}

	public function get_script_depends() {
	   return [ 'onepage-icon-style' ];
	}	
	protected function render( $instance = [] ) {
		$settings = $this->get_settings();
		
		include( 'onepage-icon-output.php');
			
	}		
	protected function content_template() {}
	public function render_plain_content( $instance = [] ) {}		
}
Plugin::instance()->widgets_manager->register_widget_type( new BETM_OnePage_Icon_Service );