<?php

namespace Elementor;
use Elementor\Core\Schemes\Color; 

if ( ! defined( 'ABSPATH' ) ) exit;

// Register BeThemesMe blog Widget class
class BETM_BeThemesMe_Blog extends Widget_Base {
	
	public function get_categories() {
		return [ 'bethemesme-widgets' ];
	}
	
	public function get_name() {
		return 'bethemesme-blog';
	}
	
	public function get_title() {
		return __( 'BeThemesMe Blog', 'bethemesme' );
	}
	
	public function get_icon() {
		return 'eicon-table-of-contents';
	}
	
	protected function register_controls() {
		$this->add_control(
			'bethemesme_blog',
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
				'section' 	=> 'bethemesme_blog',
			]			
		);
	}// End function 
	
	public function __construct($data = [], $args = null) {
		parent::__construct($data, $args);

		//Blog
		wp_enqueue_style( 'bethemesme-blog-style', plugin_dir_url( __FILE__ ). 'assets/css/bethemesme-blog.css' );
	}

	public function get_script_depends() {
	   return [ 'bethemesme-blog-script' ];
	}
	
	protected function render( $instance = [] ) {
		$settings = $this->get_settings();	
		
		include( 'bethemesme-blog-output.php'); 
	}
	protected function content_template() {}
	public function render_plain_content( $instance = [] ) {}
}
Plugin::instance()->widgets_manager->register_widget_type( new BETM_BeThemesMe_Blog );