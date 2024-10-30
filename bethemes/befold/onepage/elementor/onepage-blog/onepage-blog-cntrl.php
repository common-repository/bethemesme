<?php

namespace Elementor;
use Elementor\Core\Schemes\Color; 

if ( ! defined( 'ABSPATH' ) ) exit;

// Register OnePage blog Widget class
class BETM_OnePage_Blog extends Widget_Base {
	
	public function get_categories() {
		return [ 'befold-onepage-widgets' ];
	}
	
	public function get_name() {
		return 'onepage-blog';
	}
	
	public function get_title() {
		return __( 'OnePage Blog', 'bethemesme' );
	}
	
	public function get_icon() {
		return 'eicon-table-of-contents';
	}
	
	protected function register_controls() {
		$this->add_control(
			'onepage_blog',
			[
				'label' => __( 'Blog Slider Option', 'bethemesme' ),
				'type' 	=> Controls_Manager::SECTION,
			]
		);
		
		//Read More Button Text
		$this->add_control(
			'section_rm_btn_text',
			[
				'label' 	=> __( "Read More Button Text", 'bethemesme' ),
				'type' 		=> Controls_Manager::TEXT,
				'default' 	=> __( 'Read More', 'bethemesme' ),
				'section' 	=> 'onepage_blog',
			]			
		);
	}// End function 
	
	public function __construct($data = [], $args = null) {
		parent::__construct($data, $args);

		//Blog
		wp_enqueue_style( 'onepage-blog-style', plugin_dir_url( __FILE__ ). 'assets/css/onepage-blog.css' );
	}

	public function get_script_depends() {
	   return [ 'onepage-blog-script' ];
	}
	
	protected function render( $instance = [] ) {
		$settings = $this->get_settings();	
		
		include( 'onepage-blog-output.php'); 
	}
	protected function content_template() {}
	public function render_plain_content( $instance = [] ) {}
}
Plugin::instance()->widgets_manager->register_widget_type( new BETM_OnePage_Blog );