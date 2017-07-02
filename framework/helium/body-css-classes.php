<?php
/**
 * Created by PhpStorm.
 * User: satish
 * Date: 18/03/17
 * Time: 5:37 PM
 */

add_filter( 'body_class', 'he_body_classes' );

function he_body_classes( $classes ) {
	global $he;
	$classes[] = $he->is_mobile()?'mobile':'desktop';
	return $classes;
}
