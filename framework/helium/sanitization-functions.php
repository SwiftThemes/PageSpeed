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

function helium_sanitize_choice_field( $val, $setting ) {
	global $wp_customize;
	$control = $wp_customize->get_control( $setting->id );
	if ( array_key_exists( $val, $control->choices ) ) {
		return $val;
	} else {
		return $setting->default;
	}
}

function helium_sanitize_thumbnail_alignment( $val ) {
	$choices = array(
		'alignleft',
		'aligncenter',
		'alignright',
		'alternate',
		'stretched'
	);
	if ( array_search( $val, $choices ) !== false ) {
		return $val;
	} else {
		return 'alternate';
	}
}

function helium_sanitize_post_meta( $val ) {
	$sanitized = array_map( 'helium_sanitize_post_meta_values', $val );

	return array_filter( $sanitized );
}

function helium_sanitize_post_meta_values( $val ) {
	$san        = array();
	$valid_keys = array(
		'Text',
		'Cat',
		'Tags',
		'AuthorPosts',
		'AuthorLink',
		'Published',
		'Updated',
		'Line',
	);
	if ( array_search( $val['key'], $valid_keys ) === false ) {
		return false;
	}

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

function helium_sanitize_column_widths( $vals ) {
	error_log( implode( ',', $vals ) );
	if ( ! is_array( $vals ) ) {
		return array();
	} else {
		$vals = array_map( 'abs', $vals );
		error_log( implode( ',', $vals ) );
		asort( $vals );
		error_log( implode( ',', $vals ) );

		$sanitized = array();
		$prev      = 0;
		foreach ( $vals as $val ) {
			array_push( $sanitized, $val - $prev );
			$prev = $val;
		}
		array_push( $sanitized, 100 - $prev );


		return $sanitized;
	}


}

/**
 * Used only during development.
 *
 * @param $val
 *
 * @return mixed
 */
function helium_pass( $val ) {
	return $val;
}
