<?php
/**
 * Created by PhpStorm.
 * User: satish
 * Date: 13/03/17
 * Time: 6:12 PM
 */

add_action( 'wp_ajax_helium_clear_sass_cache', 'helium_clear_sass_cache' );

function helium_clear_sass_cache() {
	$prefix = wp_get_theme()->stylesheet . '_';
	delete_transient( $prefix . 'sass_file_list' );
	delete_transient( $prefix . 'sass_combined_bf' );
	delete_transient( $prefix . 'sass_combined_af' );
	echo 'true';

	wp_die(); // this is required to terminate immediately and return a proper response
}


add_action( 'wp_ajax_helium_save_theme_options', 'helium_save_theme_options' );

function helium_save_theme_options() {
	check_ajax_referer( 'helium_ajax_nonce', 'security' );
	$params = array();
	parse_str( $_POST['data'], $params );

	GLOBAL $theme_options;

	$theme_slug = get_option( 'stylesheet' );

	$mods = get_option( "theme_mods_$theme_slug" );

	foreach ( $theme_options as $option ) {
		if ( $option['id'] ) {
			$id          = $option['id'];
			$mods[ $id ] = isset( $params[ $id ] ) ? $params[ $id ] : 0;
		}
	}

	update_option( "theme_mods_$theme_slug", $mods );
}
