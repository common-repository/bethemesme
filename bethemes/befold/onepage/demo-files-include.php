<?php

// Add elementor addons widget.
if (defined( 'ELEMENTOR_VERSION')) {
	require_once plugin_dir_path( __FILE__ ) .'elementor/elementor-addons.php'; 
}

// Add Custom Meta Box 2 plugin.
if (!function_exists('bethemesme_register_metabox')) {
	require_once plugin_dir_path( __FILE__ ) . 'inc/cmb/CMB.php';
}

// Add Custom Post Type plugin.
if( ! class_exists('CPT', false) ) {
	require_once BETM_PLUGIN_PATH . 'includes/cpt/CPT.php';
	require_once plugin_dir_path( __FILE__ ) . 'inc/cpt/portfolio-post-type.php';
}

// Add Helper functions required in default plugin
require_once plugin_dir_path( __FILE__ ) .'inc/helper-functions.php';