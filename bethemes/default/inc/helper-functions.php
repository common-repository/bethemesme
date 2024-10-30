<?php

add_action( 'wp_enqueue_scripts', 'betm_include_scripts' );

function betm_include_scripts() {

	wp_enqueue_style( 'css-magnific-popup', BETM_PLUGIN_URL . '/assets/css/magnific.popup.css' );
	
	wp_enqueue_style( 'css-fancymedia-popup', BETM_PLUGIN_URL . '/assets/plugins/fancymedia/css/jquery.fancybox.css' );

	wp_enqueue_script( 'isotope-pkgd', BETM_PLUGIN_URL . '/assets/js/isotope.pkgd.min.js', array(), '2.2.2', true );

	wp_enqueue_script( 'bethemesme-imagesloaded-script', BETM_PLUGIN_URL . 'assets/js/imagesloaded.pkgd.min.js', array(), '4.1.3', true );
	
	wp_enqueue_script( 'bethemesme-jquery-fancybox-pack-script', BETM_PLUGIN_URL  . '/assets/plugins/fancymedia/js/jquery.fancybox.pack.js', array(), '2.1.5', true );
	
	wp_enqueue_script( 'bethemesme-jquery-fancybox-media-script', BETM_PLUGIN_URL  . '/assets/plugins/fancymedia/js/jquery.fancybox-media.js', array(), '1.0.6', true );
	
	wp_enqueue_script( 'jquery-nicescroll', BETM_PLUGIN_URL . 'assets/js/jquery.nicescroll.min.js', array(), '3.6.6', true );
	
	wp_enqueue_script( 'jquery-magnific-popup', BETM_PLUGIN_URL . 'assets/js/jquery.magnific.popup.min.js', array(), '1.0.1', true );

}