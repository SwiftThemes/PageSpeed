<?php
/**
 * Created by Satish Gandham.
 * User: satish
 * Date: 09/02/17
 * Time: 9:44 PM
 */

add_action( 'customize_register', 'pagespeed_customize_colors', 600 );
function pagespeed_customize_colors( $wp_customize ) {

	$wp_customize->add_section( 'colors', array(
		'title'    => __( 'Color Settings', 'page-speed' ),
		'priority' => 30,
	) );


	$wp_customize->add_setting( 'color_scheme', array(
		'sanitize_callback' => 'esc_attr',
		'default'           => 'default',

	) );


	$wp_customize->add_setting( 'override_color_scheme', array(
		'sanitize_callback' => 'helium_boolean',
		'default'           => false,
	) );


	$wp_customize->add_setting( 'primary_color', array(
		'sanitize_callback' => 'helium_meta',
		'default'           => '#007AFF',

	) );

	$wp_customize->add_setting( 'shades_from', array(
		'sanitize_callback' => 'helium_meta',
		'default'           => '211',

	) );


	$wp_customize->add_setting( 'shade_saturation', array(
		'sanitize_callback' => 'absint',
		'default'           => 8,

	) );

	$wp_customize->add_setting( 'invert_colors', array(
		'sanitize_callback' => 'helium_boolean',
		'default'           => 0,

	) );




	require_once( THEME_ADMIN . 'color-schemes.php' );

	$wp_customize->add_control(
		new Hybrid_Customize_Control_Radio_Image(
			$wp_customize,
			'color_scheme',
			array(
				'label'    => esc_html__( 'Color Schemes', 'page-speed' ),
				'section'  => 'colors',
				'priority' => 10,
				'choices'  => pagespeed_get_color_scheme_choices()
			)
		)
	);



	$wp_customize->add_control( 'override_color_scheme', array(
		'label'   => __( 'Override shades generated from color scheme', 'page-speed' ),
		'description'=>__('Check this if you want to use the below three options.','page-speed'),
		'section' => 'colors',
		'type'    => 'checkbox',

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
