<?php
/**
 * Functions for handling styles in the theme.
 *
 * @package    PageSpeed
 * @subpackage Includes
 * @author     Satish Gandham <hello@satishgandham.com>
 * @copyright  Copyright (c) 2008 - 2017, Satish Gandham
 * @link       https://swiftthemes.com/helium
 * @license
 */

add_action( 'wp_enqueue_scripts', 'helium_register_styles', 8 );
add_action( 'wp_enqueue_scripts', 'helium_enqueue_styles', 9 );


function helium_register_styles() {
	wp_register_style( 'page-speed', THEME_CSS_URI . 'style.prod.css' );

	$upload_dir = wp_upload_dir();
	wp_register_style( 'page-speed-2', trailingslashit( $upload_dir['baseurl'] ) . wp_get_theme()->stylesheet . '.css' );
}

function helium_enqueue_styles() {

	if ( defined( 'DEV_ENV' ) && DEV_ENV || get_theme_mod( 'can_read_write' ) ) {
		wp_enqueue_style( 'page-speed' );
	} else {
		wp_enqueue_style( 'page-speed-2' );
	}
}

