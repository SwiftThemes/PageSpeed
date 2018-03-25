<?php
/**
 * Created by PhpStorm.
 * User: satish
 * Date: 23/03/18
 * Time: 11:51 AM
 */


if ( defined( 'NNS_URI' ) && get_theme_mod( 'show_slider_on_homepage', false ) ) {
	if ( 'wide' === get_theme_mod( 'container_type', 'regular' ) ) {
		add_action( 'pagespeed_after_header', 'pagespeed_nns_home_slider', 8 );
	} else {
		add_action( 'pagespeed_content_start', 'pagespeed_nns_home_slider', 8 );
	}
}


function pagespeed_nns_home_slider() {

	global $helium;

	$query_args = array( 'cat' => get_theme_mod( 'home_slider_categories' ), array() );
	$template   = 'wide' === get_theme_mod( 'container_type', 'regular' ) ? 'background_image' : 'inline_image';

	$site_width = helium_get_site_width();
	$excerpts   = true;
	if ( $helium->is_mobile() ) {
		$thumb_size = array(
			600,
			(int) ( 600 / $site_width * get_theme_mod( 'home_slider_height', (int) ( $site_width / 2 ) ) )
		);
		$excerpts   = false;
	} else {
		$thumb_size = array( $site_width, get_theme_mod( 'home_slider_height', (int) ( $site_width / 2 ) ) );
	}
	nns_query_slider( $query_args, $template, $thumb_size, $excerpts );
}