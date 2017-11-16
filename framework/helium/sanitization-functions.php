<?php
/**
 * Created by PhpStorm.
 * User: satish
 * Date: 10/04/17
 * Time: 12:22 PM
 */

function helium_boolean( $val ){
	return (bool) $val;
}


function helium_meta($val){
	return wp_kses($val,wp_kses_allowed_html('post'));
}


function helium_float( $val ){
	return (float) $val;
}

function helium_pass( $val ){
	return $val;
}
