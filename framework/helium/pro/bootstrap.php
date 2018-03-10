<?php
/**
 * Created by PhpStorm.
 * User: satish
 * Date: 11/02/18
 * Time: 4:19 PM
 */

require_once 'functions-styles.php';
require_once 'admin-render-theme-options.php';
require_once( 'helium-tools.php' );


//@todo move below code to a better place.
if ( is_admin() ) {
	require_once 'disable-updates.php';
	require_once 'admin-ajax-functions.php';
	require 'plugin-update-checker/plugin-update-checker.php';
	require 'license.php';

	$theme_slug = get_option( 'stylesheet' );
	$theme_update_checker = Puc_v4_Factory::buildUpdateChecker(
		'https://updates.swiftthemes.com/?action=get_metadata&slug=' . $theme_slug, //Metadata URL.
		HELIUM_THEME_DIR . 'functions.php',
		$theme_slug
	);

	$theme_update_checker->addQueryArgFilter( 'helium_filter_update_checks' );
	$theme_update_checker->addFilter( 'pre_inject_update', 'helium_filter_download_link' );


}

function helium_filter_update_checks( $query_args ) {
	if ( get_theme_mod( 'license_key' ) ) {
		$query_args['license_key'] = get_theme_mod( 'license_key' );
		$query_args['url']         = get_site_url();
	}
	return $query_args;
}


function helium_filter_download_link( $query_args ) {

	$download_url = $query_args->download_url;

	add_query_arg( array(
		'license_key' => get_theme_mod( 'license_key' ),
		'url'         => urlencode( get_site_url() )
	), $download_url );

	$query_args->download_url = $download_url;

	return $query_args;
//
//	$url_components = parse_url( $query_args->download_url );
//
//	if ( strpos( $url_components['query'], 'license_key' ) ) {
//		return $query_args;
//	}
//	if ( $url_components['query'] ) {
//		$query_args->download_url .= '&license_key=' . get_theme_mod( 'license_key' ) . '&url=' . urlencode( get_site_url() );
//	} else {
//		$query_args->download_url .= '?license_key=' . get_theme_mod( 'license_key' ) . '&url=' . urlencode( get_site_url() );
//	}
//
//	return $query_args;
}


define( 'HELIUM_PRO', true );
define( 'HELIUM_ACTIVATION_URL', 'https://members.swiftthemes.com/softsale/api' );