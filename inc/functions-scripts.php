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
add_action( 'wp_enqueue_scripts', 'pagespeed_enqueue_styles', 9 );


function pagespeed_register_scripts() {
	//@todo remove
	wp_register_script( 'pagespeed-vendors-js', THEME_JS_URI . 'vendors.min.js', [ 'jquery' ] );
	wp_register_script( 'pagespeed-custom-js', THEME_JS_URI . 'custom.min.js', [ 'jquery' ] );
}

function pagespeed_enqueue_styles() {
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'pagespeed-vendors-js' );
	wp_enqueue_script( 'pagespeed-custom-js' );
}

