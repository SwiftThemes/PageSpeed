<?php
/**
 * Created by Satish Gandham.
 * User: satish
 * Date: 18/03/17
 * Time: 5:37 PM
 */

add_filter( 'body_class', 'helium_body_classes' );

function helium_body_classes( $classes ) {
	global $helium;
	$classes[] = $helium->is_mobile() ? 'mobile' : 'desktop';

	if ( is_single() && has_post_thumbnail() ) {
		$classes[] = 'has-thumb';
	}


	return $classes;
}


add_filter( 'content_div_class', 'helium_content_div_classes' );
function helium_content_div_classes( $classes ) {

	global $post;
	if(is_singular() &&get_post_meta( $post->ID, 'pull_content', true )){
		$classes .=' pull-content';
	}

	return $classes;
}


