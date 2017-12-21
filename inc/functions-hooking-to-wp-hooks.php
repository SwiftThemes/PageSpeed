<?php
add_filter( 'body_class', 'pagespeed_body_classes' );

function pagespeed_body_classes( $classes ) {
	$classes[] = 'layout-' . get_theme_mod( 'theme_layout', 'centered' );
	$classes[] = 'container-' . get_theme_mod( 'container_type', 'regular' );
	$classes[] = 'single-' . get_theme_mod( 'single_post_layout', 'regular' );
	return $classes;
}

?>