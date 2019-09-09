<?php

add_action( 'wp_ajax_helium_activate_license', 'helium_activate_license' );
function helium_activate_license() {
	if ( ! current_user_can( 'switch_themes' ) ) {
		return false;
	}
	check_ajax_referer( 'helium_ajax_nonce', 'security' );
	include_once 'amember.php';
	$params = array();
	parse_str( $_POST['data'], $params );

	$response = array();
	if ( isset( $params['key'] ) && $params['key'] ) {
		$license_key = preg_replace( '/[^A-Za-z0-9-_]/', '', trim( $params['key'] ) );
		$checker     = new Am_LicenseChecker( $license_key, HELIUM_ACTIVATION_URL, '' );
		$mods        = get_site_option( 'helium_license', array() );

		if ( ! $checker->checkLicenseKey() ) {
			$mods['license_valid'] = false;
			$response['status']    = 'Error';
			$response['code']      = 'license_key_invalid';
			$response['msg']       = $checker->license_response->message ? $checker->license_response->message : __( 'The license key you entered is invalid', 'page-speed' );
			$response['data']      = $checker->license_response;
		} else {

			$activation_cache      = get_theme_mod( 'license_activation_cache' );
			$prev_activation_cache = $activation_cache; // store previous value to detect change

			$ret = empty( $activation_cache ) ?
				$checker->activate( $activation_cache ) : // explictly bind license to new installation
				$checker->checkActivation( $activation_cache ); // just check activation for subscription expriation, etc.

			if ( $prev_activation_cache != $activation_cache ) {
				$mods['license_activation_cache'] = $activation_cache;
			}

			$mods['license_valid'] = true;

			$response['status'] = 'Success';
			$response['msg']    = $checker->license_response->message ? $checker->license_response->message : __( 'License key validated successfully', 'page-speed' );
			$response['data']   = $checker->license_response;
		}

		$mods['license_key']          = sanitize_text_field( $license_key );
		$mods['license_valid']        = true;
		$mods['license_scheme_id']    = absint( $checker->license_response->scheme_id );
		$mods['license_scheme_title'] = sanitize_text_field( $checker->license_response->license_scheme_title );
		$mods['license_expires']      = date( $checker->license_response->license_expires );
		$mods['license_data']         = $checker->license_response;

		update_site_option( 'helium_license', $mods );

	} else {
		$response['status'] = 'Error';
		$response['msg']    = __( 'Please enter a valid license', 'page-speed' );
	}

	echo helium_license_info();

	//  wp_send_json( $response );
	wp_die();
}


add_action( 'wp_ajax_helium_dismiss_renew_nag', 'helium_dismiss_renew_nag' );
function helium_dismiss_renew_nag() {
	if ( ! current_user_can( 'switch_themes' ) ) {
		return false;
	}
	$license                                 = get_site_option( 'helium_license', array() );
	$license['license_renew_nag_show_after'] = time() + 86400 * 7;
	update_site_option( 'helium_license', $license );

	wp_die();
}
