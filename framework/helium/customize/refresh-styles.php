<?php


define( 'PAGE_SPEED_SELECTIVE_REFRESHABLES', array(
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
	'enable_transparent_backgrounds',
	'primary_font_stack',
	'primary_font_size',
	'primary_font_lh',
	'primary_font_weight',
	'secondary_font_stack',
	'secondary_font_size',
	'secondary_font_lh',
	'secondary_font_weight',

) );


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
	$require_css_refresh = array();
	foreach ( $wp_customize->settings() as $setting ) {
		if ( 'theme_mod' === $setting->type && 'postMessage' === $setting->transport ) {
			array_push( $require_css_refresh, $setting->id );
		}
	}


//	return array('body_colors');
//	return $require_css_refresh;

	return array_merge( PAGE_SPEED_GRADIENT_BGS, PAGE_SPEED_SELECTIVE_REFRESHABLES );
}