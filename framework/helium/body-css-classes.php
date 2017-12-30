<?php
/**
 * Created by Satish Gandham.
 * User: satish
 * Date: 18/03/17
 * Time: 5:37 PM
 */

add_filter( 'body_class', 'he_body_classes' );

function he_body_classes( $classes ) {
	global $he;
	$classes[] = $he->is_mobile()?'mobile':'desktop';

	if(is_single() && has_post_thumbnail()){
		$classes[] = 'has-thumb';
	}

	if(get_theme_mod('enable_sleek_header')){
		$classes[] = 'sleek-header';
	}
	return $classes;
}
