<?php
$page_speed_color_schemes = array();
GLOBAL $page_speed_color_schemes;



$page_speed_color_schemes['default'] = array(
	//Generic colors
	'body-color'       => '',
	'link-color'       => '',
	'meta-color'       => '',
	'sticky-header-bg' => '',

	'button-bg'              => '',
	'button-color'           => '',
	'wp-caption-text-color'  => '',

	// Layout colors
	'body-bg'                => '',
	'wrapper-bg'             => '',
	'content-bg'             => '',
	'main-bg'                => '',
	'sb1-bg'                 => '',
	'sb2-bg'                 => '',
	'footer-bg'              => '',
	'footer-color'           => '',

	// Header Colors
	'header-bg'              => '',
	'site-title-color'       => '',
	'site-description-color' => '',

	// Navigation Colors
	'primary-nav-bg'         => '',
	'primary-nav-color'      => '',
	'secondary-nav-bg'       => '',
	'secondary-nav-color'    => '',

	// Sidebar Widgets
	'sb-widget-title-color'  => '',
	'sb-widget-title-bg'     => '',
	'sb-widget-border-color' => '',
	'sb-widget-bg'           => '',

);
$page_speed_color_schemes['blue'] = array(
	//Generic colors
	'body-color'       => '',
	'link-color'       => '',
	'meta-color'       => '',
	'sticky-header-bg' => '',

	'button-bg'              => '',
	'button-color'           => '',
	'wp-caption-text-color'  => '',

	// Layout colors
	'body-bg'                => '',
	'wrapper-bg'             => '',
	'content-bg'             => '',
	'main-bg'                => '',
	'sb1-bg'                 => '',
	'sb2-bg'                 => '',
	'footer-bg'              => '',
	'footer-color'           => '',


	// Navigation Colors
	'primary-nav-bg'         => '#3b5998',
	'primary-nav-color'      => '#fff',
	'secondary-nav-bg'       => '',
	'secondary-nav-color'    => '',


	// Header Colors
	'header-bg'              => '$light-1',
	'site-title-color'       => '$primary-nav-bg',
	'site-description-color' => '',

	// Sidebar Widgets
	'sb-widget-title-color'  => '',
	'sb-widget-title-bg'     => '',
	'sb-widget-border-color' => '',
	'sb-widget-bg'           => '',


	//Important vars
	'primary'                => '#2078f9',
	'hue'                    => 'hue($primary)',
	'saturation'             => 22

);
$page_speed_color_schemes['yellow-black'] = array(
	//Generic colors
	'body-color'       => '',
	'link-color'       => '',
	'meta-color'       => '',
	'sticky-header-bg' => '',

	'button-bg'              => '',
	'button-color'           => '',
	'wp-caption-text-color'  => '',

	// Layout colors
	'body-bg'                => '',
	'wrapper-bg'             => '',
	'content-bg'             => '',
	'main-bg'                => '',
	'sb1-bg'                 => '#101820',
	'sb2-bg'                 => '#101820',
	'footer-bg'              => '',
	'footer-color'           => '',


	// Navigation Colors
	'primary-nav-bg'         => '#fdc134',
	'primary-nav-color'      => '#101820',
	'secondary-nav-bg'       => '',
	'secondary-nav-color'    => '',


	// Header Colors
	'header-bg'              => '#101820',
	'site-title-color'       => '$primary-nav-bg',
	'site-description-color' => '',

	// Sidebar Widgets
	'sb-widget-title-color'  => '#FFF',
	'sb-widget-title-bg'     => 'lighten(#101820,.03)',
	'sb-widget-border-color' => '',
	'sb-widget-bg'           => 'lighten(#101820,.06)',
	'sb-widget-color'           => '#DDD',
	'sb-widget-link-color'           => '#FFF',


	//Important vars
	'primary'                => '#eeb304',
	'hue'                    => 'hue(#101820)',
	'saturation'             => 12

);
$page_speed_color_schemes['Fuchsia']    = array(
	//Generic colors
	'body-color'       => '',
	'link-color'       => '',
	'meta-color'       => '',
	'sticky-header-bg' => '',

	'button-bg'              => '',
	'button-color'           => '',
	'wp-caption-text-color'  => '',

	// Layout colors
	'body-bg'                => '',
	'wrapper-bg'             => '',
	'content-bg'             => '',
	'main-bg'                => '',
	'sb1-bg'                 => '',
	'sb2-bg'                 => '',
	'footer-bg'              => '',
	'footer-color'           => '',

	// Header Colors
	'header-bg'              => '$light-1',
	'site-title-color'       => 'darken(#5a95ca,.1)',
	'site-description-color' => '',

	// Navigation Colors
	'primary-nav-bg'         => 'rgba(#c43e74,.95)',
	'primary-nav-color'      => '#FFF',
	'secondary-nav-bg'       => '',
	'secondary-nav-color'    => '',

	// Sidebar Widgets
	'sb-widget-title-color'  => '$dark-6',
	'sb-widget-title-bg'     => 'lighten(#c43e74,.2)',
	'sb-widget-border-color' => '',
	'sb-widget-bg'           => '',


	//Important vars
	'primary'                => '#5a95ca',
	'hue'                    => 'hue($primary)',
	'saturation'             => 22


);
function pagespeed_get_color_scheme_choices() {
	GLOBAL $page_speed_color_schemes;
	$choices = array();
	foreach ( $page_speed_color_schemes as $key => $value ) {
		$choices[ $key ] = array(
			'url'   => ADMIN_IMAGES_URI . '/color-schemes/' . $key . '.png',
			'label' => $key
		);
	}

	return $choices;
}


function helium_generate_scss( $values ) {
	$out = '';
	foreach ( $values as $key => $value ) {
		if ( $value ) {
			$out .= '$' . $key . ':' . $value . ';';
		}
	}

	//if a color scheme doesn't explicitly define header-bg
	//use primary nav bg as header bg for sleek layout.
	if ( 1 || ! $values['header-bg'] ) {
		$out .= '@if($is_sleek_header == 1){$header-bg:$primary-nav-bg;$site-title-color:$primary-nav-color}';
	}

	return $out;
}


function helium_get_hue_and_primary_color( $values ) {

	$values_to_set = array( 'primary', 'hue', 'saturation', 'invert' );
	$out           = '';
	foreach ( $values_to_set as $key ) {
		if ( isset( $values[ $key ] ) && $values[ $key ] ) {
			$out .= '$' . $key . ':' . $values[ $key ] . ';';
		}
	}

	return $out;
}