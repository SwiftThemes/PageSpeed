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

add_action( 'wp_enqueue_scripts', 'pagespeed_register_scripts', 8 );
add_action( 'wp_enqueue_scripts', 'pagespeed_enqueue_scripts', 9 );


function pagespeed_register_scripts() {
	wp_register_script( 'pagespeed-vendors-js', HELIUM_THEME_JS_URI . 'vendors.min.js', array( 'jquery' ) );

	wp_register_script( 'pagespeed-custom-js', HELIUM_THEME_JS_URI . 'custom.min.js', array(
		'jquery',
//		'jquery-masonry'
	) );
	wp_register_script( 'pagespeed-custom-js-dev', HELIUM_THEME_JS_URI . 'custom/desktop.js', array(
		'jquery',
		'jquery-masonry'
	) );
}

function pagespeed_enqueue_scripts() {
	wp_enqueue_script( 'jquery' );
	if ( get_theme_mod( 'use_masonry', false ) ) {
		wp_enqueue_script( 'jquery-masonry' );
	}

	wp_enqueue_script( 'pagespeed-vendors-js' );

	if ( defined( 'HELIUM_DEV_ENV' ) && HELIUM_DEV_ENV ) {
		wp_enqueue_script( 'pagespeed-custom-js-dev' );
	} else {
		wp_enqueue_script( 'pagespeed-custom-js' );
	}
}

