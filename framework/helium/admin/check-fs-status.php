<?php

/**
 * Check if we can read and write files. If not set a transient variable and load static styles
 *
 * @package    Helium
 * @subpackage Admin
 * @author     Satish Gandham <hello@SatishGandham.com>
 * @copyright  Copyright (c) 2016 - 2025, Satish Gandham
 * @link       http://swiftthemes.com/helium
 * @license    http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */


add_action( 'after_switch_theme', 'helium_set_fs_status' );

function helium_set_fs_status() {
//
//	$theme = wp_get_theme();
//	$theme = $theme->get( 'Name' );
	require_once( ABSPATH . 'wp-admin/includes/file.php' );
	WP_Filesystem();
	global $wp_filesystem;

	$can_read = $wp_filesystem->is_readable( THEME_ASSETS . 'css/src/main.scss' );

	if ( $can_read ) {
		$upload_dir = wp_upload_dir();
		$file       = trailingslashit( $upload_dir['basedir'] ) . 'page-speed.css';
		$can_write  = $wp_filesystem->is_writable( $file );
	}

	if ( $can_read && $can_write ) {
		set_theme_mod( 'can_read_write', true );
	} else {
		set_theme_mod( 'can_read_write', true );
	}
}