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
	wp_register_style( 'page-speed', HELIUM_THEME_CSS_URI . 'style.prod.css' );
	wp_register_style( 'page-speed-icons', HELIUM_THEME_CSS_URI . 'font-icons.css' );

	$upload_dir = wp_upload_dir();
	wp_register_style( 'page-speed-2', trailingslashit( $upload_dir['baseurl'] ) . wp_get_theme()->stylesheet . '.css' );
	wp_register_style( 'page-speed-print-styles', HELIUM_THEME_CSS_URI . 'print-styles.css' );
}

function pagespeed_enqueue_styles() {
	wp_enqueue_style( 'page-speed-icons' );

	if ( defined( 'HELIUM_DEV_ENV' ) && HELIUM_DEV_ENV || ! get_theme_mod( 'can_read_write',false ) ) {
		wp_enqueue_style( 'page-speed' );
	} else {
		wp_enqueue_style( 'page-speed-2', '', null, 'screen' );
	}


	wp_enqueue_style( 'page-speed-print-styles', '', null, 'screen' );

}


function pagespeed_load_fonts() {
	//https://fonts.googleapis.com/css?family=Metal+Mania|Open+Sans:300,300i,400&amp;subset=cyrillic,latin-ext
	//https://fonts.googleapis.com/css?family=Open+Sans:400,700|Roboto:400,400i&amp;subset=cyrillic

	$url = helium_generate_gfont_link();

	if ( $url ):

		wp_enqueue_style( 'helium_google_fonts', $url )
		?>

		<?php
	endif;
}


function pagespeed_add_image_bg_for_single_post() {

	if ( ! is_single() || get_theme_mod( 'single_post_layout' ) !== '1c' || ! has_post_thumbnail() ) {
		return;
	}
	//@todo Add different sizes for mobile and desktop;
	global $he;
	if ( $he->is_mobile() ) {
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
	?>
    <style>
        #content {
            background-image: url('<?php echo get_the_post_thumbnail_url(null, $size)?>')
        }
    </style>
	<?php
}

function helium_generate_gfont_link() {
	$g1 = get_theme_mod( 'gfont_1' );
	$g2 = get_theme_mod( 'gfont_2' );

	if ( ! $g1 && ! $g2 ) {
		return false;
	}

	$base = 'https://fonts.googleapis.com/css?family=';

	if ( $g1 ) {
		$base .= str_replace( ' ', '+', $g1['fontObject']['family'] );
		if ( isset( $g1['weights'] ) && $g1['weights'] ) {
			$base .= ':' . implode( ',', $g1['weights'] );
		}
	}

	if ( $g2 ) {
		$base .= '|' . str_replace( ' ', '+', $g2['fontObject']['family'] );
		if ( isset( $g2['weights'] ) && $g2['weights'] ) {
			$base .= ':' . implode( ',', $g2['weights'] );
		}
	}

	return $base;
}