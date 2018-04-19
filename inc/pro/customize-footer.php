<?php

add_action( 'customize_register', 'pagespeed_customize_footer_columns', 1 );
function pagespeed_customize_footer_columns( $wp_customize ) {

	// Show excerpts or full post
	$wp_customize->add_setting( 'footer_column_count', array(
		'sanitize_callback' => 'absint',
		'default'           => 4,
//		'transport'         => 'postMessage',

	) );

	$wp_customize->add_control( 'footer_column_count', array(
		'label'   => __( 'Footer Columns', 'page-speed' ),
		'section' => 'footer',
		'type'    => 'number',
		'input_attrs' => array( 'min' => 0, 'max' => 8 )


	) );


	$wp_customize->add_setting( 'footer_widths', array(
		'sanitize_callback' => 'helium_sanitize_column_widths',
		'default'           => array( 25, 25, 25 ),
		'transport'         => 'postMessage',

	) );

	$wp_customize->add_control(
		new Helium_Customize_Column_Widths(
			$wp_customize,
			'footer_widths',
			array(
				'label'    => esc_html__( 'Footer column widths', 'page-speed' ),
				'section'  => 'footer',
				'priority' => 10,
			)
		)
	);
}