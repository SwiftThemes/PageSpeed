<?php
/**
 * Created by Satish Gandham.
 * User: satish
 * Date: 21/02/17
 * Time: 6:10 PM
 */

function helium_get_thumb_size( $namespace ) {
	global $helium;

	if ( $helium->is_mobile() ) {
		return array(
			320,
			200
		);
	} else {
		return array(
			intval( get_theme_mod( $namespace . '_width', 100 ) ),
			intval( get_theme_mod( $namespace . '_height', 100 ) )
		);
	}
}

function helium_random_string( $length = 5 ) {
	return substr( str_shuffle( str_repeat( $x = 'abcdefghijklmnopqrstuvwxyz', ceil( $length / strlen( $x ) ) ) ), 1, $length );
}