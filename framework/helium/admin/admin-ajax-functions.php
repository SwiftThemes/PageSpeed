<?php
/**
 * Created by Satish Gandham.
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
	helium_write_stylesheet();
	echo 'true';

	wp_die(); // this is required to terminate immediately and return a proper response
}


add_action( 'wp_ajax_helium_update_file_system_status', 'helium_update_file_system_status' );

function helium_update_file_system_status() {
	if(helium_set_fs_status()){
		echo __('Update success, can read & write','page-speed').' :-)';
	}else{
		echo __('Update success, can\'t write','page-speed').' :-(';
	}
	wp_die(); // this is required to terminate immediately and return a proper response
}
