<?php

global $pagespeed_selective_refreshables;
$pagespeed_selective_refreshables = array(
	'site_width',
	'main_width',
	'left_sidebar_width',
	'enable_card_style_widgets_sb',
	'color_scheme',
	'override_color_scheme',
	'primary_color',
	'shades_from',
	'shade_saturation',
	'invert_colors',
	'primary_font_stack',
	'primary_font_size',
	'primary_font_lh',
	'primary_font_weight',
	'secondary_font_stack',
	'secondary_font_size',
	'secondary_font_lh',
	'secondary_font_weight',
	'separate_containers',

	'theme_layout',

	// Premium
	'footer_widths',
	'use_masonry',
	'masonry_column_count',
	'social_media_monochrome',
	'enable_transparent_backgrounds',


	'body_background_image_url',
	'body_background_image_id',
	'body_background_repeat',
	'body_background_size',
	'body_background_attach',
	'body_background_position',

	'header_background_image_url',
	'header_background_image_id',
	'header_background_repeat',
	'header_background_size',
	'header_background_attach',
	'header_background_position',

	'footer_background_image_url',
	'footer_background_image_id',
	'footer_background_repeat',
	'footer_background_size',
	'footer_background_attach',
	'footer_background_position',


);

add_action( 'customize_register', 'helium_refresh_styles', 9000 );
function helium_refresh_styles( $wp_customize ) {
	$wp_customize->selective_refresh->add_partial( 'refresh_styles', array(
		'selector'            => '#page-speed-inline-styles',
		'type'                => 'refresh_styles',
		'settings'            => helium_get_values_requiring_css_refresh( $wp_customize ),
		'container_inclusive' => false,
		'render_callback'     => 'pagespeed_put_css_in_head',
		'fallback_refresh'    => false,
	) );
}


function helium_get_values_requiring_css_refresh( $wp_customize ) {
//	$require_css_refresh = array();
//	foreach ( $wp_customize->settings() as $setting ) {
//		if ( 'theme_mod' === $setting->type && 'postMessage' === $setting->transport ) {
//			array_push( $require_css_refresh, $setting->id );
//		}
//	}
//	var_dump( $require_css_refresh);

	global $pagespeed_gradient_bgs;
	global $pagespeed_selective_refreshables;
	$pagespeed_gradient_bgs = $pagespeed_gradient_bgs ? $pagespeed_gradient_bgs : array();

	return array_merge( $pagespeed_gradient_bgs, $pagespeed_selective_refreshables );
}


add_action( 'wp_head', 'pagespeed_put_css_in_head', 9 );

function pagespeed_put_css_in_head() {
	if ( ! is_customize_preview() ) {
		return;
	}
	$misc_css = '<link rel="stylesheet" type="text/css" href="' . HELIUM_ADMIN_ASSETS_URI . 'css/selective-refresh-loader.css">';

	require_once( ABSPATH . 'wp-admin/includes/file.php' );

	$style_generator = new Helium_Styles( HELIUM_THEME_ASSETS . 'css/src/' );

	echo $misc_css . '<style id="page-speed-inline-styles">' . $style_generator->generate_css( 'af' ) . $style_generator->generate_css( 'bf' ) . '</style>';
}

add_action( 'wp_footer', 'pagespeed_put_selective_refresh_loader', 9 );

function pagespeed_put_selective_refresh_loader() {
	if ( ! is_customize_preview() ) {
		return;
	}
	echo '<div id="selective_refresh_loader"><p data-shadow="' . __( 'Reloading Stylesheet', 'page-speed' ) . '">' . __( 'Reloading Stylesheet', 'page-speed' ) . '</p></div>';
}

add_action( 'pagespeed_before_header', 'pagespeed_show_errors' );

function pagespeed_show_errors() {
	if ( ! is_customize_preview() ) {
		return;
	}
	$prefix = wp_get_theme()->stylesheet . '_';
	$error  = get_transient( $prefix . 'sass_error' );
	if ( $error ) {


		echo '<div style="background: #f79ea8;color:#fff;padding:16px;font-size: 14px;font-family: Sans-serif">
<h3>Oh Snap!!</h3>
We are sorry, Something went wrong while compiling the styles. 
If you recognize the variables in the error below, toggle/change them to see if it fixes the problem.
Else, contact support with the below error message. 
<br />
<code>' . $error . '</code>
<br />
<strong>Note</strong>: Most of the times the error is due to wrong input in SCSS override setting. Disabling it might help</div>';

	}
}
