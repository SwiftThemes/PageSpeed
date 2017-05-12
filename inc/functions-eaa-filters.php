<?php
add_filter( 'eaa_ad_locations', 'pagespeed_add_eaa_ad_locations' );

function pagespeed_add_eaa_ad_locations( $ad_locations ) {

	$ad_locations['ps_above_header'] = array( 'label' => esc_html__( 'Above header', 'page-speed' ) );
	$ad_locations['ps_header']       = array( 'label' => esc_html__( 'In header', 'page-speed' ) );
	$ad_locations['ps_below_header'] = array( 'label' => esc_html__( 'Below header', 'page-speed' ) );
	$ad_locations['ps_before_main']  = array( 'label' => esc_html__( 'Before main div', 'page-speed' ) );
	$ad_locations['ps_after_main']   = array( 'label' => esc_html__( 'After main div', 'page-speed' ) );
	$ad_locations['ps_above_footer'] = array( 'label' => esc_html__( 'Above footer', 'page-speed' ) );

	return $ad_locations;
}


if ( function_exists( 'eaa_get_ad' ) ) {
	add_action( 'pagespeed_after_body', 'pagespeed_above_header_ad', 8 );
	add_action( 'pagespeed_header_start', 'pagespeed_header_ad', 14 );
	add_action( 'pagespeed_after_header', 'pagespeed_below_header_ad', 14 );
	add_action( 'pagespeed_main_start', 'pagespeed_before_main_ad', 8 );
	add_action( 'pagespeed_main_end', 'pagespeed_after_main_ad', 8 );
	add_action( 'pagespeed_before_footer', 'pagespeed_above_footer_ad', 8 );
}


if ( ! function_exists( 'pagespeed_above_header_ad' ) ) {
	function pagespeed_above_header_ad() {
		$args = array(
			'before_ad' => '<div class="hybrid"><div class="inner">',
			'after_ad'  => '</div></div>',
		);
		$ad   = eaa_get_ad( 'ps_above_header', $args );
		if ( ! $ad ) {
			return;
		}
		echo $ad;
	}
}


if ( ! function_exists( 'pagespeed_header_ad' ) ) {
	function pagespeed_header_ad() {
		$ad = eaa_get_ad( 'ps_header', array( 'class' => 'ps-header-ad' ) );
		if ( ! $ad ) {
			return;
		}
		echo $ad;
	}
}


if ( ! function_exists( 'pagespeed_below_header_ad' ) ) {
	function pagespeed_below_header_ad() {
		$args = array(
			'before_ad' => '<div id="below-header-ad-container"><div class="hybrid" id="below-header-ad"><div class="inner">',
			'after_ad'  => '</div></div></div>',
		);
		$ad   = eaa_get_ad( 'ps_below_header', $args );
		if ( ! $ad ) {
			return;
		}
		echo $ad;
	}
}

if ( ! function_exists( 'pagespeed_before_main_ad' ) ) {

	function pagespeed_before_main_ad() {
		$ad = eaa_get_ad( 'ps_before_main' );
		if ( ! $ad ) {
			return;
		}
		echo $ad;
	}

}

if ( ! function_exists( 'pagespeed_after_main_ad' ) ) {
	function pagespeed_after_main_ad() {
		$ad = eaa_get_ad( 'ps_after_main' );
		if ( ! $ad ) {
			return;
		}
		echo $ad;
	}
}

if ( ! function_exists( 'pagespeed_above_footer_ad' ) ) {
	function pagespeed_above_footer_ad() {
		$args = array(
			'before_ad' => '<div id="above-footer-ad-container"><div class="hybrid" id="above-footer-ad"><div class="inner">',
			'after_ad'  => '</div></div></div>',
		);
		$ad   = eaa_get_ad( 'ps_above_footer', $args );
		if ( ! $ad ) {
			return;
		}
		echo $ad;
	}
}