<?php
/**
 * Created by PhpStorm.
 * User: satish
 * Date: 09/02/17
 * Time: 9:44 PM
 */

add_action( 'customize_register', 'pagespeed_customize_colors', 600 );
function pagespeed_customize_colors( $wp_customize ) {

	$wp_customize->add_section( 'colors', array(
		'title'    => __( 'Site Colors', 'page-speed' ),
		'priority' => 21,
	) );


	$wp_customize->add_setting( 'primary_color', array(
//		'sanitize_callback' => 'helium_meta',
		'default'           => '#007AFF',

	) );

	$wp_customize->add_setting( 'shades_from', array(
//		'sanitize_callback' => 'helium_meta',
		'default'           => '#007AFF',

	) );


	$wp_customize->add_setting( 'shade_saturation', array(
		'sanitize_callback' => 'absint',
		'default'           => 8,

	) );

	$wp_customize->add_setting( 'invert_colors', array(
		'sanitize_callback' => 'helium_boolean',
		'default'           => 0,

	) );

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'primary_color',
			array(
				'label'      => __( 'Primary Color', 'page-speed' ),
				'description'=>__('Used for buttons and links','page-speed'),
				'section'    => 'colors',
				'settings'   => 'primary_color',
			) )
	);


	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'shades_from',
			array(
				'mode'=>'hue',
				'label'      => __( 'Base color for shades', 'page-speed' ),
				'description'=>__('Used to generate light and dark colors used in the theme','page-speed'),
				'section'    => 'colors',
				'settings'   => 'shades_from',
			) )
	);

	$wp_customize->add_control( 'shade_saturation', array(
		'label'   => 'Amount of base color in the shades',
		'description'=>__('Higher the number more color the lights and darks have.','page-speed'),
		'section' => 'colors',
		'type'    => 'number',

	) );

	$wp_customize->add_control( 'invert_colors', array(
		'label'   => 'Invert light and dark colors',
		'section' => 'colors',
		'type'    => 'checkbox',

	) );
}
