<?php


/**
 * Filter thumbnail image
 *
 * @param string $input Post thumbnail.
 */
function helium_the_post_thumbnail( $input ) {
	if ( empty( $input ) ) {
		$placeholder = helium_get_prevdem_img_src();

		return '<img width="240" height="160" src="' . esc_url( $placeholder ) . '" class="alternate">';
	}

	return $input;
}

add_filter( 'post_thumbnail_html', 'helium_the_post_thumbnail' );

function helium_get_prevdem_img_src() {
	GLOBAL $helium_images;
	if ( ! $helium_images ) {
		$helium_images = range( 1, 12 );
		shuffle( $helium_images );
	}

	return HELIUM_THEME_ASSETS_URI . 'images/preview-images/' . array_pop( $helium_images ) . '.jpg';
}


add_filter( 'body_class', 'helium_org_release_body_classes' );

function helium_org_release_body_classes( $classes ) {

	$classes[] = 'demo-preview';

	return $classes;
}