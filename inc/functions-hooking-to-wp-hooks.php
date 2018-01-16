<?php
add_filter( 'body_class', 'pagespeed_body_classes' );

function pagespeed_body_classes( $classes ) {
	$classes[] = 'layout-' . sanitize_html_class( get_theme_mod( 'theme_layout', 'centered' ) );
	$classes[] = 'container-' . sanitize_html_class( get_theme_mod( 'container_type', 'regular' ) );
	$classes[] = 'single-' . sanitize_html_class( get_theme_mod( 'single_post_layout', 'regular' ) );

	return $classes;
}

?>