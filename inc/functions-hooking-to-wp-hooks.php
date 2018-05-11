<?php
add_filter( 'body_class', 'pagespeed_body_classes' );

function pagespeed_body_classes( $classes ) {
	$classes[] = 'layout-' . sanitize_html_class( get_theme_mod( 'theme_layout', 'r-sb' ) );
	$classes[] = 'container-' . sanitize_html_class( get_theme_mod( 'container_type', 'regular' ) );
	$classes[] = 'single-' . sanitize_html_class( get_theme_mod( 'single_post_layout', 'regular' ) );
	if ( get_theme_mod( 'enable_sleek_header', true ) ) {
		$classes[] = 'sleek-header';
	}
	if ( get_theme_mod( 'use_masonry', false ) ) {
		$classes[] = 'masonry';
	}
	return $classes;
}

?>