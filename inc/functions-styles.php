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
add_action( 'wp_enqueue_scripts', 'pagespeed_register_styles', 8 );
add_action( 'wp_enqueue_scripts', 'pagespeed_enqueue_styles', 9 );
add_action( 'wp_head', 'pagespeed_add_image_bg_for_single_post', 99 );


function pagespeed_register_styles() {
	wp_register_style( 'pagespeed', HELIUM_THEME_CSS_URI . 'style.prod.css', array(), '1.34' );
	wp_register_style( 'pagespeed-icons', HELIUM_THEME_CSS_URI . 'font-icons.css' );

	$upload_dir = wp_upload_dir();
	wp_register_style( 'pagespeed-generated', trailingslashit( $upload_dir['baseurl'] ) . wp_get_theme()->stylesheet . '.css' );
	wp_register_style( 'pagespeed-print-styles', HELIUM_THEME_CSS_URI . 'print-styles.css' );
}

function pagespeed_enqueue_styles() {
	wp_enqueue_style( 'pagespeed-icons' );

	if ( defined( 'HELIUM_DEV_ENV' ) && HELIUM_DEV_ENV || ! get_theme_mod( 'can_read_write', false ) ) {
		wp_enqueue_style( 'pagespeed' );
	} else {
		wp_enqueue_style( 'pagespeed-generated', '', null, 'screen' );
	}
	wp_enqueue_style( 'pagespeed-print-styles', '', null, 'print' );

}


function pagespeed_load_fonts() {

	$url = helium_generate_gfont_link();

	if ( $url ):
		wp_enqueue_style( 'helium_google_fonts', $url );
	endif;
}


function pagespeed_add_image_bg_for_single_post() {
	global $helium;
	if ( $helium->is_mobile() ) {
		$size = array(
			560,
			224
		);
	} else {
		$size = array(
			1400,
			560
		);
	}
	if ( is_page() && basename( get_page_template() ) === 'tpl-airy-img.php' ) {
		?>
        <style>
            #content-wrapper {
                background-image: url('<?php echo esc_url(get_the_post_thumbnail_url(null, $size))?>')
            }
        </style>
		<?php
		return;
	}


	if ( ! is_singular( 'post' ) || get_theme_mod( 'single_post_layout' ) !== '1c' || ! has_post_thumbnail() ) {
		return;
	}

	?>
    <style>
        #content-wrapper {
            background-image: url('<?php echo esc_url(get_the_post_thumbnail_url(null, $size))?>')
        }
    </style>
	<?php
}