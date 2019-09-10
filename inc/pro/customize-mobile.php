<?php

add_action( 'customize_register', 'pagespeed_customize_mobile', 100 );
function pagespeed_customize_mobile( $wp_customize ) {
	$wp_customize->add_section(
		'mobile',
		array(
			'title'    => __( 'Mobile Settings', 'page-speed' ),
			'priority' => 160,
			'panel'    => 'theme_options',
		)
	);

	$wp_customize->add_setting(
		'show_search_in_side_pane',
		array(
			'sanitize_callback' => 'helium_boolean',
			'default'           => true,
		)
	);

	$wp_customize->add_control(
		'show_search_in_side_pane',
		array(
			'label'   => __( 'Show search form in the side pane', 'page-speed' ),
			'section' => 'mobile',
			'type'    => 'checkbox',
		)
	);

}
