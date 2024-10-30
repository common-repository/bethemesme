<?php

namespace Elementor;

use Elementor\Core\Schemes\Color;
use Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;

// Register BeThemesMe BeThemesMe_Contact Widget class
if ( ! defined( 'ABSPATH' ) ) exit;
class BETM_BeThemesMe_Contact extends  Widget_Base {
	
	public function get_categories() {
		return [ 'bethemesme-widgets' ];
	}
	
	public function get_name() {
		return 'bethemesme-contact';
	}
	
	public function get_title() {
		return __( 'BeThemesMe Contact', 'bethemesme' );
	}
	
	public function get_icon() {
		return 'eicon-preferences';
	}
	
	protected function register_controls() {
		$this->add_control(
			'bethemesme_contact',
			[
            'label' => __( 'Contact Option', 'bethemesme' ),
            'type' 	=> Controls_Manager::SECTION,
			]
		); 

		// Send Button Text
		$this->add_control(
			'section_send_btn_text',
			[
				'label' 	=> __( "Send Button Text", 'bethemesme' ),
				'type' 		=> Controls_Manager::TEXT,
				'default' 	=> __( 'Send', 'bethemesme' ),
				'section' 	=> 'bethemesme_contact',
			]
		);
	
		// Enable privacy checkbox
        $this->add_control(
			'section_enable_privacy_notice',
			[
				'label' 		=> __( 'Enable privacy checkbox?', 'bethemesme' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Yes', 'bethemesme' ),
				'label_off' 	=> __( 'No', 'bethemesme' ),
				'return_value' 	=> 'yes',
				'default' 		=> __( 'no', 'bethemesme' ),
				'section' 		=> 'bethemesme_contact',
			]
        );
		
		//Select privacy page
        $this->add_control(
            'section_privacy_page',
            [
                'label'   => __( 'Select privacy page', 'bethemesme' ),
                'type'    => Controls_Manager::SELECT,
                'default' => '',
                'condition' => [
					'section_enable_privacy_notice' => 'yes',
				],
                'section' => 'bethemesme_contact',
            ]        
        );
		
		//Contact data
		$section_contact_box_repeater = new \Elementor\Repeater();
		$section_contact_box_repeater->add_control(
			'section_contact_box_label',
			[
				'label' 		=> __( "Label", 'bethemesme' ),
				'type' 			=> Controls_Manager::TEXT,
				'default' 		=> __( 'List Item', 'bethemesme'),
				'label_block' 	=> true,
			]
		);
		$section_contact_box_repeater->add_control(
			'section_contact_box_description',
			[
				'label' 		=> 	__( "Description", 'bethemesme' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 	7,
			]
		);
		$section_contact_box_repeater->add_control(
			'section_contact_box_icon',
			[
				'label' 		=> 	__( "Icon", 'bethemesme' ),
				'type' 			=> 	Controls_Manager::ICON,
			]
		);
		$section_contact_box_repeater->add_control(
			'section_contact_box_url',
			[
				'label' 		=> __( "URL", 'bethemesme' ),
				'type' 			=> Controls_Manager::TEXT,
				'placeholder' 	=> __( 'https://your-link.com', 'bethemesme' ),
			]
		);
		$section_contact_box_repeater->add_control(
			'section_contact_box_animation',
			[
				'label' 		=> __( 'Animation', 'bethemesme' ),
				'type' 			=> Controls_Manager::SELECT,
			]
		); 
		$this->add_control(
			'section_contact_boxes',
			[
				'label' 	=> __('Contact data', 'bethemesme' ),
				'type' 		=> Controls_Manager::REPEATER,
				'fields' 	=> $section_contact_box_repeater->get_controls(),
				'section'	 	=> 'bethemesme_contact',
			]
		);
		$this->start_controls_section(
			'content_el_content_section',
			[
				'label' => __( 'Content', 'bethemesme' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'ci_title_typography',
				'label' => __( 'Ci Title Typography', 'bethemesme' ),
				'scheme' => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .ci-title',
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'ci_content_typography',
				'label' => __( 'Ci Content Typography', 'bethemesme' ),
				'scheme' => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .ci-content',
			]
		);
	}// End finction
	
	public function __construct($data = [], $args = null) {
		parent::__construct($data, $args);

		wp_enqueue_style( 'bethemesme-contact-style', plugin_dir_url( __FILE__ ). 'assets/css/bethemesme-contact.css' );
		wp_enqueue_script( 'bethemesme-contact-js', plugin_dir_url( __FILE__ ). 'assets/js/bethemesme-contact.js' );
	}

	public function get_script_depends() {
	   return [ 'bethemesme-contact-js' ];
	}
	protected function render( $instance = [] ) {
		$settings = $this->get_settings();	
		
		include( 'bethemesme-contact-output.php');
	
	}
	protected function content_template() {}
	public function render_plain_content( $instance = [] ) {}
}
Plugin::instance()->widgets_manager->register_widget_type( new BETM_BeThemesMe_Contact );
