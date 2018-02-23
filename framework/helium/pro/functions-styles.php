<?php
/**
 * Created by PhpStorm.
 * User: satish
 * Date: 11/02/18
 * Time: 4:19 PM
 */

add_action( 'wp_enqueue_scripts', 'helium_enqueue_styles', 9 );

function helium_enqueue_styles() {
	if ( get_theme_mod( 'enable_non_render_blocking_css', false ) ) {
		echo '<style>' . get_theme_mod( 'af_css' ) . '</style>';
	}

	return;
}
