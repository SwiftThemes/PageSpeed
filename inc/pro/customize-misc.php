<?php

add_action( 'customize_register', 'pagespeed_customize_misc', 1 );
function pagespeed_customize_misc( $wp_customize ) {



	$wp_customize->add_setting(
		'show_first_post_in_full',
		array(
			'sanitize_callback' => 'helium_boolean',
			'default'           => false,
		)
	);

	$wp_customize->add_control(
		'show_first_post_in_full',
		array(
			'label'           => __( 'Show first post in full length', 'page-speed' ),
			//@todo add link to the panel.
			'description'     => __( 'Select this option to show first post in full length when using excerpts.', 'page-speed' ),
			'section'         => 'home_page_design',
			'type'            => 'checkbox',
			'priority'        => 10,
			'active_callback' => function () {
				return get_theme_mod( 'home_show_excerpts', true ) && ! get_theme_mod( 'use_masonry', false );
			},
		)
	);
}
