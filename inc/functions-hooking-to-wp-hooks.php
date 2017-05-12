<?php
add_filter( 'body_class', 'pagespeed_body_classes' );

function pagespeed_body_classes( $classes ) {
	$classes[] = 'layout-' . get_theme_mod( 'theme_layout', 'centered' );
	return $classes;
}

?>