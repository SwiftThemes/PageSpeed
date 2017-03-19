<?php
/**
 * Created by PhpStorm.
 * User: satish
 * Date: 13/03/17
 * Time: 6:12 PM
 */

add_action( 'wp_ajax_ngbr_clear_sass_cache', 'ngbr_clear_sass_cache' );

function ngbr_clear_sass_cache() {
	$prefix = wp_get_theme()->stylesheet . '_';
	delete_transient( $prefix . 'sass_file_list' );
	delete_transient( $prefix . 'sass_combined' );
	echo 'true';

	wp_die(); // this is required to terminate immediately and return a proper response
}