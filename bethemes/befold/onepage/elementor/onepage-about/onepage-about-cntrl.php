<?php

namespace Elementor;
use Elementor\Core\Schemes\Color;

if ( ! defined( 'ABSPATH' ) ) exit;

// Register OnePage  About heading Widget class
class OnePage_About extends Widget_Base {
	
	public function get_categories() {
		return [ 'befold-onepage-widgets' ];
	}
	
	public function get_name() {
		return 'onepage-about';
	}
	
	public function get_title() {
      return __( 'OnePage Heading', 'bethemesme' );
	}
	
	public function get_icon() {
      return 'eicon-t-letter';
	}
	
	protected function register_controls() {
		$this->add_control(
			'onepage_about',
			[
				'label' => __( 'About Option', 'bethemesme' ),
				'type'	=> Controls_Manager::SECTION,
			]
		);
			
		//Section Title
		$this->add_control(
			'onepage_about_title',
			[
				'label' 	=> __( "Heading Title", 'bethemesme' ),
				'type' 		=> Controls_Manager::TEXT,
				'default' 	=> __( 'About Title', 'bethemesme' ),
				'title' 	=> __( 'Enter Title', 'bethemesme' ),
				'section' 	=> 'onepage_about',
				'selector' => '{{WRAPPER}} .onepage_about h5',
			]
		);
		
		//subtitle
		$this->add_control(
			'onepage_about_sub_title',
			[
				'label' 	=> __( "Sub Heading Title", 'bethemesme' ),
				'type' 		=> Controls_Manager::TEXT,
				'default' 	=> __( 'Lorem ipsum dolor sit', 'bethemesme' ),
				'title' 	=> __( 'Enter Sub Title', 'bethemesme' ),
				'section' 	=> 'onepage_about',
				'selector' => '{{WRAPPER}} .onepage_about h2',
			]
		);

	}// End function

	public function __construct($data = [], $args = null) {
		parent::__construct($data, $args);

		//Heading
		wp_enqueue_style( 'onepage-about-style',  plugin_dir_url( __FILE__ ). 'assets/css/elementor-heading.css' );
	}

	public function get_script_depends() {
	   return [ 'onepage-about-style' ];
	}

	protected function render( $instance = [] ) {
		$settings = $this->get_settings();
		
		include( 'onepage-about-output.php');
		
	}
	
	protected function content_template() {}
	public function render_plain_content( $instance = [] ) {}
}
Plugin::instance()->widgets_manager->register_widget_type( new OnePage_About );