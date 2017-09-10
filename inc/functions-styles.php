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

add_action( 'wp_enqueue_scripts', 'pagespeed_load_fonts', 7 );
//add_action( 'wp_enqueue_scripts', 'pagespeed_load_above_fold_css', 7 );
add_action( 'wp_enqueue_scripts', 'pagespeed_register_styles', 8 );
add_action( 'wp_footer', 'pagespeed_enqueue_styles', 9 );


function pagespeed_register_styles() {
	wp_register_style( 'page-speed', THEME_CSS_URI . 'style.prod.css' );
	wp_register_style( 'page-speed-icons', THEME_CSS_URI . 'font-icons.css' );

	$upload_dir = wp_upload_dir();
	wp_register_style( 'page-speed-2', trailingslashit( $upload_dir['baseurl'] ) . wp_get_theme()->stylesheet . '.css' );
	wp_register_style( 'page-speed-print-styles', THEME_CSS_URI . 'print-styles.css' );
}

function pagespeed_enqueue_styles() {
	wp_enqueue_style( 'page-speed-icons' );

	if ( defined( 'DEV_ENV' ) && DEV_ENV || ! get_theme_mod( 'can_read_write' ) ) {
		wp_enqueue_style( 'page-speed' );
	} else {
		wp_enqueue_style( 'page-speed-2', '', null, 'screen' );
	}


	wp_enqueue_style( 'page-speed-print-styles', '', null, 'screen' );

}


function pagespeed_load_fonts() {
	?>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet" media="none"
          onload="this.media='all';">
	<?php
}

function pagespeed_load_above_fold_css() {
	$theme_name = wp_get_theme()->stylesheet;
	$css        = get_option( $theme_name . '_above_fold_css' );

	echo "<style>{$css}</style>";
}