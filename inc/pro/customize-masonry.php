<?php

add_action( 'customize_register', 'pagespeed_customize_masonry', 88 );
function pagespeed_customize_masonry( $wp_customize ) {

	//layout_settings
	$wp_customize->add_setting(
		'use_masonry',
		array(
			'sanitize_callback' => 'helium_boolean',
			'default'           => false,
			'transport'         => 'postMessage',
		)
	);

	$wp_customize->add_control(
		'use_masonry',
		array(
			'label'           => __( 'Use masonry style for displaying posts on home page and archives.', 'page-speed' ),
			'section'         => 'layout_settings',
			'type'            => 'checkbox',
			'priority'        => 20,
			'active_callback' => function () {
				return get_theme_mod( 'separate_containers', true );
			},
		)
	);

	// Show excerpts or full post
	$wp_customize->add_setting(
		'masonry_column_count',
		array(
			'sanitize_callback' => 'absint',
			'default'           => 3,
			'transport'         => 'postMessage',

		)
	);

	$wp_customize->add_control(
		'masonry_column_count',
		array(
			'label'           => __( 'Number of masonry columns', 'page-speed' ),
			'section'         => 'layout_settings',
			'type'            => 'number',
			'priority'        => 20,
			'input_attrs'     => array(
				'min' => 2,
				'max' => 8,
			),
			'active_callback' => function () {
				return get_theme_mod( 'use_masonry', false ) && get_theme_mod( 'separate_containers', true );
			},
		)
	);

	//@todo Display ideal thumbnail sizes.
}
