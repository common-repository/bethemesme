<?php

add_action( 'admin_enqueue_scripts', 'betm_include_admin_scripts' );

function betm_include_admin_scripts() {
	
	wp_enqueue_script( 'bethemesme-admin-script', BETM_PLUGIN_URL . 'assets/js/admin.js', array(), '4.1.3', true );
	
	// Localize the script with new data.
	global $pagenow;
	wp_localize_script( 'bethemesme-admin-script', 'be_admin_vars', array(
		'screen'            => $pagenow,
		's_icon_found'      => esc_html__( 'icon found.', 'befold' ),
		'p_icons_found'     => esc_html__( 'icons found.', 'befold' ),
		'no_icons_found'    => esc_html__( 'No icons found.', 'befold' )
	) );
	
}