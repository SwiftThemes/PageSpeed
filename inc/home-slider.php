<?php
/**
 * Created by PhpStorm.
 * User: satish
 * Date: 23/03/18
 * Time: 11:51 AM
 */


if ( defined( 'SRS_URI' ) && get_theme_mod( 'show_slider_on_homepage', false ) ) {


	if ( get_theme_mod( 'use_custom_slider', false ) && get_theme_mod( 'custom_slider_id', 0 ) ) {
		add_action( 'pagespeed_after_header', 'pagespeed_srs_custom_home_slider', 15 );

	} else {
		add_action( 'pagespeed_after_header', 'pagespeed_srs_home_slider', 15 );
	}
}

add_action( 'pagespeed_after_header', 'pagespeed_srs_home_slider_placeholder', 15 );


function pagespeed_srs_home_slider() {

	// For customizer
	if ( ! get_theme_mod( 'show_slider_on_homepage', false ) ) {
		return " ";
	}
	$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

	if ( ! is_home() || $paged > 1 ) {
		return;
	}


	global $helium;

	$query_args = array(
		'cat'            => get_theme_mod( 'home_slider_categories' ),
		array(),
		'posts_per_page' => get_theme_mod( 'home_slider_posts_per_page', 4 )
	);
	$template   = 'wide' === get_theme_mod( 'container_type', 'regular' ) && ! $helium->is_mobile() ? 'background_image' : 'inline_image';

	$site_width = helium_get_site_width();
	$excerpts   = true;
	$speed = get_theme_mod('home_slider_speed',6000);
	if ( $helium->is_mobile() ) {
		$thumb_size = array(
			600,
			(int) ( 600 / $site_width * get_theme_mod( 'home_slider_height', (int) ( $site_width / 2 ) ) )
		);
		$excerpts   = false;
	} else {
		$thumb_size = array( $site_width, get_theme_mod( 'home_slider_height', (int) ( $site_width / 2 ) ) );
	}
	srs_query_slider( $query_args, $template, $thumb_size, $excerpts,'',$speed );
}

function pagespeed_srs_home_slider_placeholder() {
	if ( is_customize_preview() && ! get_theme_mod( 'show_slider_on_homepage', false ) ) {
		echo '<div class="srs-slider"></div>';
	}
}

function pagespeed_srs_custom_home_slider() {
	// @todo, why slider is handled here?
	// For customizer
	if ( ! get_theme_mod( 'show_slider_on_homepage', false ) ) {
		return " ";
	}
	$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

	if ( ! is_home() || $paged > 1 ) {
		return;
	}

	$slider = get_post_meta( get_theme_mod( 'custom_slider_id', 0 ), '_slider', true );

	if ( ! $slider ) {
		return;
	}

	$props = $slider['properties'];

	global $helium;

	$site_width = helium_get_site_width();
	if ( $helium->is_mobile() ) {
		$size = array(
			600,
			(int) ( 600 / $site_width * get_theme_mod( 'home_slider_height', (int) ( $site_width / 2 ) ) )
		);
	} else {
		$size = array( $site_width, get_theme_mod( 'home_slider_height', (int) ( $site_width / 2 ) ) );
	}

	if ( 'background' == $props['slider_type'] ) {
		$height = $props['height'] . 'px';

		if ( ( $helium->is_mobile() ) ) {
			$height = (string) ( $props['height'] / $props['width'] * 100 ) . 'vw';
		} else {
			$height = $props['height'] . 'px';
		}
	} else {
		$height = 'auto';
	}


	$slider_width = isset( $props['stretch'] ) && $props['stretch'] ? '100%' : $props['width'] . 'px';

	$speed = isset($props['speed']) && $props['speed'] && $props['speed']>3000?$props['speed']:3000;

	$out = "<div class='simple-slider-wrap' style='width:{$slider_width};margin: auto'><div class='srs-slider' data-speed ='{$speed}' style='height:{$height};'><ul>";
	foreach ( $slider['slides'] as $slide ) {
		$out .= srs_get_slide( $slide, $size, $props['slider_type'] );;
	}
	$out .= '</ul></div></div> ';

	echo $out;
}
