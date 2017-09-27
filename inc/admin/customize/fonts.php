<?php
/**
 * Created by PhpStorm.
 * User: satish
 * Date: 09/02/17
 * Time: 9:44 PM
 */

add_action( 'customize_register', 'pagespeed_customize_fonts', 500 );
function pagespeed_customize_fonts( $wp_customize ) {
	$wp_customize->add_section( 'fonts', array(
		'title'    => __( 'Typography', 'page-speed' ),
		'priority' => 21,
	) );

	//@todo add proper sanitization callbacks
	$wp_customize->add_setting( 'font[family]', array(
//		'sanitize_callback' => 'helium_meta',
		'default' => '',

	) );

	$wp_customize->add_setting( 'font[weights]', array(
//		'sanitize_callback' => 'helium_meta',
		'default' => '',

	) );

	$wp_customize->add_setting( 'font[subsets]', array(
//		'sanitize_callback' => 'helium_meta',
		'default' => '',

	) );
	$wp_customize->add_setting( 'font[category]', array(
//		'sanitize_callback' => 'helium_meta',
		'default' => '',

	) );
	$wp_customize->add_setting( 'font[all_weights]', array(
//		'sanitize_callback' => 'helium_meta',
		'default' => '',

	) );
	$wp_customize->add_setting( 'font[all_subsets]', array(
//		'sanitize_callback' => 'helium_meta',
		'default' => '',
	) );


	$wp_customize->add_control(
		new Helium_Customize_Control_Font_Selection(
			$wp_customize,
			'fonts_',
			array(
				'label'       => __( 'Primary Color', 'page-speed' ),
				'description' => __( 'Used for buttons and links', 'page-speed' ),
				'section'     => 'fonts',
				'priority'    => 10,
				'type'        => 'text',
				'settings'    => array(
					'font'        => 'font[family]',
					'weights'     => 'font[weights]',
					'subsets'      => 'font[subsets]',
					'category'    => 'font[category]',
					'all_weights' => 'font[all_weights]',
					'all_subsets' => 'font[all_subsets]'
				)
			) )
	);




}
