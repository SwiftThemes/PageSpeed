<?php

add_action( 'customize_register', 'helium_customizer_options', 1 );
function helium_customizer_options( $wp_customize ) {

	// Show excerpts or full post
	$wp_customize->add_setting( 'logo_link', array(
		'sanitize_callback' => 'esc_url',
		'default'           => '',

	) );

	$wp_customize->add_control( 'logo_link', array(
		'label'           => __( 'Link logo to a custom link', 'page-speed' ),
		'description'     => __( 'Enter the url you want your logo to link to.', '' ),
		'section'         => 'title_tagline',
		'type'            => 'url',
		'priority'        => 10,
		'active_callback' => function () {
			return (bool)get_theme_mod('custom_logo',false);
		},
	) );

}