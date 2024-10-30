<?php
namespace Elementor;
use Elementor\Core\Schemes\Color;

if ( ! defined( 'ABSPATH' ) ) exit;

// Register OnePage Banner Widget class
class BETM_OnePage_Slider_Banner extends Widget_Base {
	
	public function get_categories() {
		return [ 'befold-onepage-widgets' ];
	}
	
	public function get_name() {
		return 'onepage-banner';
	}
	
	public function get_title() {
		return __( 'OnePage Banner', 'bethemesme' );
	}
	
	public function get_icon() {
		return 'eicon-media-carousel';
	}
	
	protected function register_controls() {
		
		$this->add_control(
			'onepage_banner',
			[
				'label' 	=> __( 'Banner Option', 'bethemesme' ),
				'type' 		=> Controls_Manager::SECTION,
			]
		);
			
		// Text Title
		$this->add_control(
			'onepage_banner_title',
			[
				'label' 	=> __( "Heading", 'bethemesme' ),
				'type' 		=> Controls_Manager::TEXT,
				'default' 	=> __( 'Be <span>Imaginative</span> Be <span>Yourself</span>', 'bethemesme' ),
				'title'		=> __( 'Enter Title', 'bethemesme' ),
				'section' 	=> 'onepage_banner',
				
			]
		);
		
        //Text Content
		$this->add_control(
			'onepage_banner_content',
			[
				'label' 	=> 	__( "Content", 'bethemesme' ),
				'type' 		=> 	Controls_Manager::TEXTAREA,
				'rows' 		=> 	7,
				'default'	=> 	__( 'We handcraft well-thought-out WordPress themes', 'bethemesme' ),
				'placeholder' => __( 'Enter Content', 'bethemesme' ),
				'section' 	=> 	'onepage_banner',
				
			]
		 
		);

		//Text Button TEXT
		$this->add_control(
			'onepage_banner_button_text',
			[
				'label' 	=> 	__( "Button Text", 'bethemesme' ),
				'type' 		=> 	Controls_Manager::TEXT,
				'default'	=> 	__( 'Learn More', 'bethemesme' ),
				'title' 	=> 	__( 'Enter Button Text', 'bethemesme' ),
				'section' 	=> 	'onepage_banner',
				
			]		 
		);
		
		//Text Button Url
		$this->add_control(
			'onepage_banner_button_url',
			[
				'label' 	=> 	__( "Button URL", 'bethemesme' ),
				'type' 		=> 	Controls_Manager::TEXT,
				'default'	=> 	__( 'http://betheme.me', 'bethemesme' ),
				'title' 	=> 	__( 'Enter Button URL', 'bethemesme' ),
				'section' 	=> 	'onepage_banner',
				
			]		 
		);
		
		//Text Background image 

        $this->add_control(
			'onepage_banner_background_image',
			[
				'label' 	=> __( "Background Image", 'bethemesme' ),
				'type' 		=> Controls_Manager::MEDIA,
				'section' 	=> 'onepage_banner',
			]          
        ); 
	
	} // End function
	
	//Enqueue scripts and styles.
	public function __construct($data = [], $args = null) {
		parent::__construct($data, $args);

		wp_enqueue_style( 'onepage-slider-style', plugin_dir_url( __FILE__ ). 'assets/css/onepage-banner.css' );
	}

	public function get_script_depends() {
	   return [ 'onepage-slider-script' ];
	}
	protected function render( $instance = [] ) {
		$settings = $this->get_settings();
		
		include( 'onepage-banner-output.php');		
	}
	
	protected function content_template() {}
	
	public function render_plain_content( $instance = [] ) {}
}
Plugin::instance()->widgets_manager->register_widget_type( new BETM_OnePage_Slider_Banner );
