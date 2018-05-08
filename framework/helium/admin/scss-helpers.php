<?php
/**
 * Created by PhpStorm.
 * User: satish
 * Date: 14/01/18
 * Time: 8:03 PM
 */

/**
 * @param $values Color scheme array
 *
 * @return PHP array converted to string of SCSS variables and some logic.
 */

function helium_generate_scss( $values ) {
	//@todo Check why $values may be null or not array.
	if ( ! is_array( $values ) ) {
		return;
	}
	$keys_to_skip = array( 'primary', 'hue', 'saturation', 'invert' );
	$out          = '';
	foreach ( $values as $key => $value ) {
		if ( $value && array_search( $key, $keys_to_skip ) === false ) {
			$out .= '$' . $key . ':' . $value . ';';
		}
	}

	//if a color scheme doesn't explicitly define header-bg
	//use primary nav bg as header bg for sleek layout.
	if ( get_theme_mod( 'enable_sleek_header', true ) ) {
		error_log('heeee');
		$out .= '$header-bg:$primary-nav-bg;$site-title-color:$primary-nav-color;';
	}

	return $out;
}


/**
 * @param $values Color scheme array
 *
 * @return Just read special SCSS properties.
 */
function helium_get_hue_and_primary_color( $values ) {
	//@todo Check why $values may be null or not array.
	if ( ! is_array( $values ) ) {
		return;
	}

	$values_to_set = array( 'primary', 'hue', 'saturation', 'invert' );
	$out           = '';
	foreach ( $values_to_set as $key ) {
		if ( isset( $values[ $key ] ) && $values[ $key ] ) {
			$out .= '$' . $key . ':' . $values[ $key ] . ';';
		}
	}

	return $out;
}