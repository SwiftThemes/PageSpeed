<?php

add_action( 'wp_ajax_helium_activate_license', 'helium_activate_license' );
function helium_activate_license() {
	check_ajax_referer( 'helium_ajax_nonce', 'security' );
	include_once 'amember.php';
	$params = array();
	parse_str( $_POST['data'], $params );


	$response = array();
	if ( isset( $params['key'] ) && $params['key'] ) {
		$license_key = preg_replace( '/[^A-Za-z0-9-_]/', '', trim( $params['key'] ) );
		$checker     = new Am_LicenseChecker( $license_key, HELIUM_ACTIVATION_URL, '' );
		$theme_slug  = get_option( 'stylesheet' );
		$mods        = get_option( "theme_mods_$theme_slug" );

		if ( ! $checker->checkLicenseKey() ) {
			$mods['license_key']   = $license_key;
			$mods['license_valid'] = false;
			$response['status']    = 'Error';
			$response['code']      = 'license_key_invalid';
			$response['msg']       = $checker->license_response->message ? $checker->license_response->message : __( 'The license key you entered is invalid', 'page-speed' );
//			$response['data']      = $checker->license_response;
		} else {
			$mods['license_key']          = sanitize_text_field( $license_key );
			$mods['license_valid']        = true;
			$mods['license_scheme_id']    = absint( $checker->license_response->scheme_id );
			$mods['license_scheme_title'] = sanitize_text_field( $checker->license_response->license_scheme_title );
			$mods['license_expires']      = date( $checker->license_response->license_expires );

			$response['status'] = 'Success';
			$response['msg']    = __( 'License key validated successfully', 'page-speed' );
			$response['data']   = $checker->license_response;
		}

		update_option( "theme_mods_$theme_slug", $mods );

	} else {
		$response['status'] = 'Error';
		$response['msg']    = __( 'Please enter a valid license', 'page-speed' );
	}


	wp_send_json( $response );
	wp_die();
}