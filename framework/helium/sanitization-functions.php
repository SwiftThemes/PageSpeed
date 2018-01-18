<?php
/**
 * Created by Satish Gandham.
 * User: satish
 * Date: 10/04/17
 * Time: 12:22 PM
 */

function helium_boolean( $val ) {
	return (bool) $val;
}


function helium_meta( $val ) {
	return wp_kses( $val, wp_kses_allowed_html( 'post' ) );
}


function helium_float( $val ) {
	return (float) $val;
}

function helium_sanitize_post_meta( $val ) {
	return array_map( 'helium_sanitize_post_meta_values', $val );
}

function helium_sanitize_post_meta_values( $val ) {
	$san          = array();
	$san['key']   = sanitize_text_field( $val['key'] );
	$san['value'] = sanitize_text_field( $val['value'] );

	return $san;
}


function helium_sanitize_gfonts( $val ) {
	$san = array();
	foreach ( $val as $k => $v ) {
		if ( is_array( $v ) ) {
			$san[ $k ] = helium_sanitize_gfonts( $v );
		} else {
			$san[ $k ] = sanitize_text_field( $v );
		}
	}

	return $san;
}

/**
 * Usually used for arrays which are sanitized at other place.
 *
 * @param $val
 *
 * @return mixed
 */
function helium_pass( $val ) {

	return $val;
}
