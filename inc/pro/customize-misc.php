<?php

add_action( 'customize_register', 'pagespeed_customize_misc', 1 );
function pagespeed_customize_misc( $wp_customize ) {


	$wp_customize->add_setting( 'show_search_in_header', array(
		'sanitize_callback' => 'helium_boolean',
		'default'           => false,
	) );

	$wp_customize->add_control( 'show_search_in_header', array(
		'label'    => __( 'Show search in primary navigation', 'page-speed' ),
		'section'  => 'header',
		'type'     => 'checkbox',
		'priority' => 40,

	) );



	$wp_customize->add_setting( 'show_social_media_link_in_header', array(
		'sanitize_callback' => 'helium_boolean',
		'default'           => false,
	) );

	$wp_customize->add_control( 'show_social_media_link_in_header', array(
		'label'    => __( 'Show social media profile links in header', 'page-speed' ),
		//@todo add link to the panel.
		'description'    => __( 'You can add your links from the social media section.', 'page-speed' ),
		'section'  => 'header',
		'type'     => 'checkbox',
		'priority' => 40,
	) );
}