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


	$wp_customize->add_setting( 'sm_profiles_selection', array(
		'sanitize_callback' => 'helium_pass',
		'default'           => false,
	) );


	$wp_customize->add_control(
		new Helium_Customize_Control_Drag_Sort(
			$wp_customize,
			'sm_profiles_selection',
			array(
				'label'     => esc_html__( 'Meta after the post content', 'page-speed' ),
				'section'   => 'title_tagline',
				'priority'  => 12,
				'type'      => 'he_drag_sort',
				'sortables' => array(
					array( 'key' => 'facebook', 'value' => 'Facebook' ),
					array( 'key' => 'twitter', 'value' => 'Twitter' ),
					array( 'key' => 'youtube', 'value' => 'YouTube' ),
					array( 'key' => 'google-plus', 'value' => 'Google Plus' ),
					array( 'key' => 'instagram', 'value' => 'Instagram' ),
					array( 'key' => 'whatsapp', 'value' => 'WhatsApp' ),
					array( 'key' => 'dribbble', 'value' => 'Dribbble' ),
					array( 'key' => 'goodreads', 'value' => 'Good Reads' ),
				)
			)
		)
	);
}