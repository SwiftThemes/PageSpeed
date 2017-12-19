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
$page_speed_color_schemes['facebook'] = array(
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
	'site-title-color'       => '$primary-nav-bg',
	'site-description-color' => '',

	// Navigation Colors
	'primary-nav-bg'         => '#3b5998',
	'primary-nav-color'      => '#fff',
	'secondary-nav-bg'       => '',
	'secondary-nav-color'    => '',

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
$page_speed_color_schemes['pink']    = array(
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
	'site-title-color'       => '',
	'site-description-color' => '',

	// Navigation Colors
	'primary-nav-bg'         => '#c43e74',
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
		$out .= '@if($is_sleek_header == 1){$header-bg:$primary-nav-bg;}';
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