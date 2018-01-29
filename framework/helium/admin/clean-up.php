<?php
/**
 * Created by PhpStorm.
 * User: satish
 * Date: 28/01/18
 * Time: 8:03 PM
 */

add_action( 'switch_theme', 'helium_theme_cleanup' );


function helium_theme_cleanup() {
	$prefix = get_option('theme_switched') . '_';
	//Clear transients
	delete_transient( $prefix . 'sass_file_list' );
	delete_transient( $prefix . 'sass_combined_bf' );
	delete_transient( $prefix . 'sass_combined_af' );

	//Delete stylesheet
	require_once( ABSPATH . 'wp-admin/includes/file.php' );
	WP_Filesystem();

	$upload_dir = wp_upload_dir();
	$file       = trailingslashit( $upload_dir['basedir'] ) . get_option('theme_switched').'.css';
	global $wp_filesystem;
	$wp_filesystem->delete( $file );
}
