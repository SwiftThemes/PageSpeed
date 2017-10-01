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
	$wp_customize->add_setting( 'gfont_1', array(
//		'sanitize_callback' => 'helium_meta',
		'default' => '',

	) );

	$wp_customize->add_setting( 'gfont_2', array(
//		'sanitize_callback' => 'helium_meta',
		'default' => '',

	) );


	$wp_customize->add_setting( 'primary_font', array(
//		'sanitize_callback' => 'helium_meta',
		'default' => '',

	) );

	$wp_customize->add_setting( 'secondary_font', array(
//		'sanitize_callback' => 'helium_meta',
		'default' => '',

	) );




	$wp_customize->add_control(
		new Helium_Customize_Control_Font_Selection(
			$wp_customize,
			'gfont_1',
			array(
				'label'       => __( 'Goolge Font #1', 'page-speed' ),
				'description' => __( '', 'page-speed' ),
				'section'     => 'fonts',
				'priority'    => 10,
				'setting'    => 'gfont_1'
			) )
	);
	$wp_customize->add_control(
		new Helium_Customize_Control_Font_Selection(
			$wp_customize,
			'gfont_2',
			array(
				'label'       => __( 'Goolge Font #2', 'page-speed' ),
				'description' => __( '', 'page-speed' ),
				'section'     => 'fonts',
				'priority'    => 10,
				'setting'    => 'gfont_2'
			) )
	);


	$wp_customize->add_control( 'copyright_text', array(
		'label'   => 'Copyright text',
		'section' => 'footer',
		'type'    => 'textarea',
	) );


}
