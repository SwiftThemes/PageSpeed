<?php
/**
 * Created by Satish Gandham.
 * User: satish
 * Date: 13/03/17
 * Time: 6:00 PM
 */


add_action( 'admin_menu', 'helium_theme_menu' );

function helium_theme_menu() {
	$helium_theme_options = add_theme_page(
		'PageSpeed ' . __( 'Theme Helpers', 'page-speed' ),            // The title to be displayed in the browser window for this page.
//		'PageSpeed ' . __( 'Helpers', 'page-speed' ),            // The text to be displayed for this menu item
		'PageSpeed',            // The text to be displayed for this menu item
		'edit_theme_options',            // Which type of users can see this menu item
		'helium_theme_options',    // The unique ID - that is, the slug - for this menu item
		'helium_theme_options_display'     // The name of the function to call when rendering this menu's page
	);

	add_action( "admin_enqueue_scripts", 'helium_admin_stylesheet' );
	add_action( "admin_enqueue_scripts", 'helium_admin_scripts' );
}


function helium_admin_scripts( $hook ) {

	if ( 'appearance_page_helium_theme_options' !== $hook ) {
		return;
	}
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'jquery-ui-core' );
	wp_enqueue_script( 'jquery-ui-tabs' );
	wp_enqueue_script( 'admin-scripts', HELIUM_ADMIN_ASSETS_URI . 'js/tabs.js', array(
		'jquery',
		'jquery-ui-core',
		'jquery-ui-tabs',
	) );

	wp_enqueue_script( 'helium-admin-scripts', HELIUM_ADMIN_ASSETS_URI . 'js/scripts.js' );
}


function helium_admin_stylesheet( $hook ) {
	if ( 'appearance_page_helium_theme_options' !== $hook ) {
		return;
	}
	wp_register_style( 'helium_admin_styles', HELIUM_ADMIN_ASSETS_URI . 'css/style.css', false, '1.0.0' );
	wp_enqueue_style( 'helium_admin_styles');
}