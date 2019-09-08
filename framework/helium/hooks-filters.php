<?php
/**
 * Created by PhpStorm.
 * User: satish
 * Date: 06/08/18
 * Time: 6:14 PM
 */

add_action( 'wp_head', 'helium_header_background', 99 );

function helium_header_background() {
	global $post;
	$header_bg = get_post_meta( get_queried_object_id(), 'header_bg', true );
	$css       = get_post_meta( get_queried_object_id(), 'css_all', true );
	if ( $header_bg ) {
		$css .= '#site-header-container{background:' . $header_bg . '!important}';
	}
	$css_desktops = get_post_meta( get_queried_object_id(), 'css_desktops', true );

	$css .= '@media only screen and (min-width:' . get_theme_mod( 'site_width' ) . ') {' . $css_desktops . '}';

	$css_mobiles = get_post_meta( get_queried_object_id(), 'css_mobiles', true );

	$css .= '@media only screen and (max-width:480px) {' . $css_mobiles . '}';

	$css_tablets = get_post_meta( get_queried_object_id(), 'css_tablets', true );

	$css .= '@media only screen and (min-width:480px) and (max-width:768px) {' . $css_tablets . '}';

	if ( $css ) {
		echo '<style type="text/css">' . $css . '</style>';
	}
}
