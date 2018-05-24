<?php
/*
    Copyright 2009-2018  Satish Gandham  (email : hello@satishgandham.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License version 2,
    as published by the Free Software Foundation.

    You may NOT assume that you can use any other version of the GPL.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    The license for this software can likely be found here:
    http://www.gnu.org/licenses/gpl-2.0.html
 */
/**
 * Created by Satish Gandham.
 * User: satish
 * Date: 17/10/17
 * Time: 8:04 PM
 */

function helium_get_font_stacks() {
	$font_stack = array();

	if ( get_theme_mod( 'gfont_1' ) ) {
		$temp         = get_theme_mod( 'gfont_1' );
		$font_stack[] = sanitize_text_field( $temp['stack'] );
	}
	if ( get_theme_mod( 'gfont_2' ) ) {
		$temp         = get_theme_mod( 'gfont_2' );
		$font_stack[] = sanitize_text_field( $temp['stack'] );
	}
	$web_safe_stacks = array(
		'Helvetica Neue,Helvetica,Arial,sans-serif',
		'Baskerville, \'Times New Roman\', Times, serif',
		'Garamond, \'Hoefler Text\', \'Times New Roman\', Times, serif',
		'Geneva, \'Lucida Sans\', \'Lucida Grande\', \'Lucida Sans Unicode\', Verdana, sans-serif',
		'GillSans, Calibri, Trebuchet, sans-serif',
		'Georgia, Times, \'Times New Roman\', serif',
		'Palatino, \'Palatino Linotype\', \'Hoefler Text\', Times, \'Times New Roman\', serif',
		'Tahoma, Verdana, Geneva',
		'Trebuchet, Tahoma, Arial, sans-serif',
		'Verdana, Geneva, sans-serif',
		'Tahoma, Arial, Helvetica, sans-serif',
		'\'Times New Roman\', Times, serif',
		'\'Courier New\', Courier, monospace'
	);

	array_push( $web_safe_stacks, sanitize_text_field( get_theme_mod( 'custom_font_stack' ) ) );

	$web_safe_stacks = array_merge( $font_stack, $web_safe_stacks );

	return array_combine( $web_safe_stacks, $web_safe_stacks );
}

function helium_generate_gfont_link() {
	$g1 = get_theme_mod( 'gfont_1' );
	$g2 = get_theme_mod( 'gfont_2' );

	if ( ! $g1 && ! $g2 ) {
		return false;
	}

	$base = 'https://fonts.googleapis.com/css?family=';

	if ( $g1 ) {
		$base .= str_replace( ' ', '+', $g1['fontObject']['family'] );
		if ( isset( $g1['weights'] ) && $g1['weights'] ) {
			$base .= ':' . implode( ',', $g1['weights'] );
		}
	}

	if ( $g2 ) {
		$base .= '|' . str_replace( ' ', '+', $g2['fontObject']['family'] );
		if ( isset( $g2['weights'] ) && $g2['weights'] ) {
			$base .= ':' . implode( ',', $g2['weights'] );
		}
	}
	return esc_url($base);
}


function helium_plugin_install_url( $plugin ) {
	// This is to prevent the issue where this URL is called from outside the admin
	if ( is_admin() || ! function_exists( 'get_plugins' ) ) {
		return false;
	}

	$plugins = get_plugins();
	$plugins = array_keys( $plugins );

	$installed = false;
	foreach ( $plugins as $plugin_path ) {
		if ( strpos( $plugin_path, $plugin . '/' ) === 0 ) {
			$installed = true;
			break;
		}
	}


	if ( $installed && ! is_plugin_active( $plugin ) ) {
		$url = add_query_arg(
			array(
				'page'           => 'tgmpa-install-plugins',
				'plugin'         => $plugin,
				'tgmpa-activate' => 'activate-plugin',
				'plugin_source'  => ! empty( $source ) ? urlencode( $source ) : false,
			),
			admin_url( 'themes.php' ) );


		return wp_nonce_url( $url,
			'tgmpa-activate',
			'tgmpa-nonce'
		);
	} elseif ( $installed && is_plugin_active( $plugin ) ) {
		return '#';
	} else {
		$url = add_query_arg(
			array(
				'page'          => 'tgmpa-install-plugins',
				'plugin'        => $plugin,
				'tgmpa-install' => 'install-plugin',
				'plugin_source' => ! empty( $source ) ? urlencode( $source ) : false,
			),
			admin_url( 'themes.php' ) );

		return wp_nonce_url( $url,
			'tgmpa-install-plugin',
			'tgmpa-nonce'
		);
	}
}