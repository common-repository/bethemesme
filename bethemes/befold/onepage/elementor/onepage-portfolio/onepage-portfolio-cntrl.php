<?php

namespace Elementor;
use Elementor\Core\Schemes\Color;

if ( ! defined( 'ABSPATH' ) ) exit;

// Register OnePage Portfolio Widget class
class BETM_OnePage_Portfolio extends Widget_Base {
	
	public function get_categories() {
		return [ 'befold-onepage-widgets' ];
	}
	
	public function get_name() {
		return 'onepage-portfolio';
	}
	
	public function get_title() {
		return __( 'OnePage Portfolio', 'bethemesme' );
	}
	
	public function get_icon() {
		return 'eicon-gallery-grid';
	}
	
	protected function register_controls() {
		$this->add_control(
			'elementor_portfolio',
			[
				'label' => __( 'Portfolio Option', 'bethemesme' ),
				'type' 	=> Controls_Manager::SECTION,
			]
		);
	
		//Enable Portfolio Filter
		$this->add_control(
			'section_enable_port_filter',
			[
				'label' 		=> __( 'Enable Portfolio Filter?', 'bethemesme' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Enable', 'bethemesme' ),
				'label_off' 	=> __( 'Disable', 'bethemesme' ),
				'return_value' 	=> 'yes',
				'default' 		=> __( 'yes', 'bethemesme' ),
				'section' 		=> 'elementor_portfolio',
			]
		);
		
		//Show All Button Text
		$this->add_control(
		'section_all_btn_text',
			[
				'label' 	=> __( "Show All Button Text", 'bethemesme' ),
				'type' 		=> Controls_Manager::TEXT,
				'default' 	=> __( 'Show All', 'bethemesme' ),
				'section' 	=> 'elementor_portfolio',
			]
		);
		
		//Enable Portfolio Button
		$this->add_control(
		'portfolio_show_more_button',
			[
				'label' 	=> __( "Show More Button Text", 'bethemesme' ),
				'type' 		=> Controls_Manager::TEXT,
				'default' 	=> __( 'Show More', 'bethemesme' ),
				'title'		=> __( 'Show More Button Text', 'bethemesme' ),
				'section' 	=> 'elementor_portfolio',
			]
		);
		
		//Enable Portfolio Button URL
		$this->add_control(
			'portfolio_show_more_button_url',
			[
				'label' 	=> __( "Show More Button URL", 'bethemesme' ),
				'type' 		=> Controls_Manager::TEXT,
				'default' 	=> '',
				'title'		=> __( 'Show More Button URL', 'bethemesme' ),
				'section' 	=> 'elementor_portfolio',
			]			
		);
	}
	// End function
	
	public function __construct($data = [], $args = null) {
		parent::__construct($data, $args);

		//Portfolio
		wp_enqueue_style( 'css-fancymedia-popup');
		wp_enqueue_script( 'isotope-pkgd');
		wp_enqueue_script( 'bethemesme-jquery-fancybox-pack-script');
		wp_enqueue_script( 'bethemesme-jquery-fancybox-media-script');
		wp_enqueue_style( 'onepage-portfolio-style',plugin_dir_url( __FILE__ ). 'assets/css/onepage-portfolio.css' ); 
		wp_enqueue_script( 'onepage-portfolio-script',plugin_dir_url( __FILE__ ). 'assets/js/onepage-portfolio.js' );
	}

	public function get_script_depends() {
	   return [ 'onepage-portfolio-script' ];
	}
	
    protected function render( $instance = [] ) {
    	$settings = $this->get_settings();   
	
		include( 'onepage-portfolio-output.php');
	}
	
	protected function content_template() {}
	public function render_plain_content( $instance = [] ) {}
}
Plugin::instance()->widgets_manager->register_widget_type( new BETM_OnePage_Portfolio );