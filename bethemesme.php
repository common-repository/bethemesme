<?php
/**
 * Plugin Name: BeThemesMe
 * Description: The BeThemesMe plugin you install after Elementor! Packed with stunning free elements.
 * Plugin URI: https://betheme.me/products/bethemesme
 * Author: BeTheme
 * Version: 1.0.4
 * Author URI: https://betheme.me/
 * Text Domain: bethemesme
 * Domain Path: /languages
 * Elementor tested up to: 3.7.1
 * Elementor Pro tested up to: 3.2.2
 */

if ( !defined( 'ABSPATH' ) ) {
    exit;
} // Exit if accessed directly
 
if( defined( 'BETM_PLUGIN_PATH' ) ){
	deactivate_plugins( '/bethemesme-pro/bethemesme.php' );
}

/**
 * Defining plugin constants.
 *
 * @since 1.0.0
 */

define( 'BETM_PLUGIN_PATH', trailingslashit( plugin_dir_path( __FILE__ ) ) );

define( 'BETM_PLUGIN_URL', trailingslashit( plugin_dir_url( __FILE__ ) ) );

/**
 * Load Plugin Text Domain.
 *
 * @since 1.0.0
 */

load_plugin_textdomain( 'bethemesme' );

if( !class_exists( 'BETM_bethemesme' ) ) {
	class BETM_Bethemesme {
		public static function init() {
			$class = __CLASS__;
			$plugin_file = basename( __FILE__ );
			$plugin_folder = basename( dirname( __FILE__ ) );
			$plugin_hook = "after_plugin_row_{$plugin_folder}/{$plugin_file}";

			new $class;
			add_action( $plugin_hook, array( 'BETM_Bethemesme', 'bethemesme_get_premium' ) );
		}

		public function __construct() {

			// Add Betheme include File.
			$theme = wp_get_theme();

			if ( strpos($theme -> Author, 'BeTheme') === false ) {
				add_action( 'init', array( 'BETM_Bethemesme', 'bethemesme_default_theme_file' ) );
			}else{
				add_filter( 'betm_get_theme_slug', array( 'BETM_Bethemesme', 'bethemesme_include_theme_file' ) );
			}
			
			add_action( 'admin_enqueue_scripts', array( 'BETM_Bethemesme', 'bethemesme_include_admin_scripts' ) );
		}

		/**
		 * Add upgrade information to plugin page.
		 */
		public static function bethemesme_get_premium() {
			
			if (function_exists('bethemes_premium_info')){
				echo '</tr><tr class="plugin-update-tr"><td colspan="5" class="plugin-update"><div class="update-message">' . bethemes_premium_info() . '</div></td></tr>';
			}
		}

		/**
		 * Include Theme File From Slug 
		 */
		public static function bethemesme_include_theme_file( $theme_slug ) {

			require_once BETM_PLUGIN_PATH .'bethemes/'.$theme_slug.'/theme-files-include.php';

		}
		
		/**
		 * Include theme admin script 
		 */
		public static function bethemesme_include_admin_scripts() {

			wp_enqueue_style( 'demo-importer-style', BETM_PLUGIN_URL . 'assets/css/demo-importer.css', array(), '1.0', false );
			
			wp_enqueue_script( 'bethemesme-demo-importer-script', BETM_PLUGIN_URL . 'assets/js/demo-importer.js', array() );

		}
		
		 public static function bethemesme_default_theme_file() {

			require_once BETM_PLUGIN_PATH .'bethemes/default/default-plugin.php'; 
		}

	}
}
add_action( 'plugins_loaded', array( 'BETM_Bethemesme', 'init' ) );