<?php
// Add elementor addons widget.
if (defined( 'ELEMENTOR_VERSION')) {
	require_once plugin_dir_path( __FILE__ ) .'elementor/elementor-addons.php'; 
}

// Add Helper functions required in default plugin
require_once plugin_dir_path( __FILE__ ) .'inc/helper-functions.php';

// Add Custom Post Type plugin.
if( !class_exists('CPT', false) ) {
	require_once BETM_PLUGIN_PATH . 'includes/cpt/CPT.php';
	require_once plugin_dir_path( __FILE__ ) .'inc/cpt/portfolio-post-type.php';
}