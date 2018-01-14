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
	$keys_to_skip = array( 'primary', 'hue', 'saturation', 'invert' );
	$out = '';
	foreach ( $values as $key => $value ) {
		if ( $value && array_search($key, $keys_to_skip) === false ) {
			$out .= '$' . $key . ':' . $value . ';';
		}
	}

	//if a color scheme doesn't explicitly define header-bg
	//use primary nav bg as header bg for sleek layout.
	if ( 1 || ! $values['header-bg'] ) {
		$out .= '@if($is_sleek_header == 1){$header-bg:$primary-nav-bg;$site-title-color:$primary-nav-color}';
	}

	return $out;
}


/**
 * @param $values Color scheme array
 *
 * @return Just read special SCSS properties.
 */
function helium_get_hue_and_primary_color( $values ) {
	$values_to_set = array( 'primary', 'hue', 'saturation', 'invert' );
	$out           = '';
	foreach ( $values_to_set as $key ) {
		if ( isset( $values[ $key ] ) && $values[ $key ] ) {
			$out .= '$' . $key . ':' . $values[ $key ] . ';';
		}
	}
	return $out;
}