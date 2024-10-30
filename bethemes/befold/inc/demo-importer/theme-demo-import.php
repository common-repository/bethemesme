<?php

function befold_import_files() {
    return array(
        array(
            'import_file_name'           => 'One Page',
            'import_file_url'            => plugin_dir_url( __FILE__ ) . 'demo/onepage/all.xml',
            'import_redux'               => array(
                array(
                    'file_url'    =>  plugin_dir_url( __FILE__ ) . 'demo/onepage/redux_options.json',
                    'option_name' => 'redux_demo',
                ),
            ),
            'import_preview_image_url'   => get_template_directory_uri(). '/screenshot.png',
            'preview_url'                => 'http://wordpress.webaashi.com/befold/preview/',
        ),
		array(
            'import_file_name'           => 'Creato',
            'import_preview_image_url'   => plugin_dir_url( __FILE__ ) . 'demo/creato/screenshots.png',
        ),
		array(
            'import_file_name'           => 'Lawyer',
            'import_preview_image_url'   => plugin_dir_url( __FILE__ ) . 'demo/creato/screenshots.png',
        )
    );
}
add_filter( 'pt-ocdi/import_files', 'befold_import_files' );

function befold_after_import_setup() {
    // Assign menus to their locations.
    $beOne_main_menu = get_term_by( 'name', 'Header Menu', 'nav_menu' );
    set_theme_mod( 'nav_menu_locations', array(
            'main-menu' => $beOne_main_menu->term_id,
        )
    );
    // Assign front page and posts page (blog page).
    $beOne_front_page_id = get_page_by_title( 'Home' );
    $beOne_blog_page_id  = get_page_by_title( 'Blog' );
    update_option( 'show_on_front', 'page' );
    update_option( 'page_on_front', $beOne_front_page_id->ID );
    update_option( 'page_for_posts', $beOne_blog_page_id->ID );
}
add_action( 'ocdi/after_import', 'befold_after_import_setup' );

function ocdi_after_import( $selected_import ) {
	$demo_name = trim( $selected_import['import_file_name'] );
	$demo_name_lower = strtolower( $demo_name );
	$demo_slug = str_replace( " ","",$demo_name_lower );

	update_option( 'imported_demo_slug', $demo_slug );

}
add_action( 'ocdi/after_import', 'ocdi_after_import' );





