<?php
	
	// Create Demo slug option
	if( !get_option( 'imported_demo_slug' ) ) {
		add_option( 'imported_demo_slug', 'onepage' );
	}
	
	// Get Demo slug name by option table
	$demo_slug_option_name = get_option( 'imported_demo_slug' );
	
	// Add Befold Theme Demo importer.
	require_once plugin_dir_path( __FILE__ ) . 'inc/demo-importer/theme-demo-import.php';
	
	// Add Befold Helper functions.
	require_once plugin_dir_path( __FILE__ ) . 'inc/befold-helper.php';

	// Add Demo importer.
	$demo_slug_name = ( isset ($demo_slug_option_name ) && !empty( $demo_slug_option_name ) ) ? $demo_slug_option_name : 'onepage' ;

	$demo_file_path = plugin_dir_path( __FILE__ ) . $demo_slug_name."/demo-files-include.php";
	
	// Add file by demo
	if( file_exists( $demo_file_path ) ) {
		require_once $demo_file_path;
	}else{
		require_once plugin_dir_path( __FILE__ ) . "/onepage/demo-files-include.php";
	}
	
	// Add Custom Menu plugin.
	if (!function_exists('array_column')) {
		require_once BETM_PLUGIN_PATH . 'includes/custom-menu/array-column.php';
	}
	
	if ( ! class_exists( 'bethemesme_Menu_Item_Custom_Fields' ) ) {
		require_once BETM_PLUGIN_PATH . 'includes/custom-menu/menu-item-custom-field.php';
	}
	