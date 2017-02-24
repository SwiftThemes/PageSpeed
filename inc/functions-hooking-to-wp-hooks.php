<?php
add_filter( 'body_class', 'nybr_body_classes' );

function nybr_body_classes( $classes ) {
	$classes[] = 'layout-' . get_theme_mod( 'theme_layout', 'centered' );
	return $classes;
}

?>