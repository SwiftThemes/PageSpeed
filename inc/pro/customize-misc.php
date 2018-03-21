<?php

add_action( 'customize_register', 'pagespeed_customize_misc', 1 );
function pagespeed_customize_misc( $wp_customize ) {


	$wp_customize->add_setting( 'show_search_in_header', array(
		'sanitize_callback' => 'helium_boolean',
		'default'           => false,
	) );

	$wp_customize->add_control( 'show_search_in_header', array(
		'label'   => __( 'Show search in primary navigation', 'page-speed' ),
		'section' => 'header',
		'type'    => 'checkbox',
		'priority' => 40,


	) );
}