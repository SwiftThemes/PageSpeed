<?php
/**
 * Created by Satish Gandham.
 * User: satish
 * Date: 09/02/17
 * Time: 9:44 PM
 */

add_action( 'customize_register', 'pagespeed_customize_fonts', 500 );
function pagespeed_customize_fonts( $wp_customize ) {


	$wp_customize->add_section( 'fonts', array(
		'title'    => __( 'Typography', 'page-speed' ),
		'priority' => 35,
	) );

	//@todo add proper sanitization callbacks
	$wp_customize->add_setting( 'gfont_1', array(
		'sanitize_callback' => 'helium_pass',
		'default' => '',

	) );

	$wp_customize->add_setting( 'gfont_2', array(
		'sanitize_callback' => 'helium_pass',
		'default' => '',

	) );


	$wp_customize->add_setting( 'example-control', array('sanitize_callback' => 'helium_pass',) );

	$wp_customize->add_control( new He_Help_Text( $wp_customize, 'example-control', array(
		'section'  => 'fonts',
		'priority' => 5,
		'label'    => __( ' ', 'page-speed' ),
		'content'  => __( 'If you would like to use Google fonts, first add them in the two options below.', 'page-speed' ) . '</p>',
//		'description' => __( 'Optional: Example Description.', 'page-speed' ),
	) ) );


	$wp_customize->add_setting( 'example-2', array('sanitize_callback' => 'helium_pass',) );

	$wp_customize->add_control( new He_Help_Text( $wp_customize, 'example-2', array(
		'section'  => 'fonts',
		'priority' => 15,
		'label'    => __( ' ', 'page-speed' ),
		'content'  => __( '<hr /><ul><li>Please choose the weights and character subsets you need carefully as adding more weights and subsets will slow down your site.</li>
<li> If you are not using the font(s) below, clear it so that they are not unnecessarily loaded</li></ul>', 'page-speed' ) . '</p>',
//		'description' => __( 'Optional: Example Description.', 'page-speed' ),
	) ) );


	$wp_customize->add_control(
		new Helium_Customize_Control_Font_Selection(
			$wp_customize,
			'gfont_1',
			array(
				'label'       => __( 'Goolge Font #1', 'page-speed' ),
				'description' => __( ' ', 'page-speed' ),
				'section'     => 'fonts',
				'priority'    => 20,
				'setting'     => 'gfont_1'
			) )
	);
	$wp_customize->add_control(
		new Helium_Customize_Control_Font_Selection(
			$wp_customize,
			'gfont_2',
			array(
				'label'       => __( 'Goolge Font #2', 'page-speed' ),
				'description' => __( ' ', 'page-speed' ),
				'section'     => 'fonts',
				'priority'    => 20,
				'setting'     => 'gfont_2'
			) )
	);


	$wp_customize->add_setting( 'primary_font_stack', array(
		'sanitize_callback' => 'helium_meta',
		'default' => '-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol"',
	) );
	$wp_customize->add_setting( 'primary_font_size', array(
		'sanitize_callback' => 'helium_float',
		'default' => 16,
	) );
	$wp_customize->add_setting( 'primary_font_lh', array(
		'sanitize_callback' => 'helium_float',
		'default' => 1.7,
	) );
	$wp_customize->add_setting( 'primary_font_weight', array(
		'sanitize_callback' => 'esc_attr',
		'default' => 'normal',
	) );


	$wp_customize->add_control(
		new Helium_Customize_Control_Typography(
			$wp_customize,
			'primary_font',
			array(
				'label'       => __( 'Primary font', 'page-speed' ),
				'description' => __( 'These font settings are used for the body of the page.', 'page-speed' ),
				'section'     => 'fonts',
				'priority'    => 10,
				'setting'     => 'primary_font',
				'settings'    => array(
					'stack'  => 'primary_font_stack',
					'size'   => 'primary_font_size',
					'lh'     => 'primary_font_lh',
					'weight' => 'primary_font_weight',
				),
			) )
	);


	$wp_customize->add_setting( 'secondary_font_stack', array(
		'sanitize_callback' => 'helium_meta',
		'default' => '-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol"',
	) );
	$wp_customize->add_setting( 'secondary_font_size', array(
		'sanitize_callback' => 'helium_float',
		'default' => '',
	) );
	$wp_customize->add_setting( 'secondary_font_lh', array(
		'sanitize_callback' => 'helium_float',
		'default' => '',
	) );
	$wp_customize->add_setting( 'secondary_font_weight', array(
		'sanitize_callback' => 'esc_attr',
		'default' => 'bold',
	) );


	$wp_customize->add_control(
		new Helium_Customize_Control_Typography(
			$wp_customize,
			'secondary_font',
			array(
				'label'       => __( 'Secondary Font', 'page-speed' ),
				'description' => __( 'This font stack is used for headings.', 'page-speed' ),
				'section'     => 'fonts',
				'priority'    => 10,
				'settings'    => array(
					'stack'  => 'secondary_font_stack',
					'size'   => 'secondary_font_size',
					'lh'     => 'secondary_font_lh',
					'weight' => 'secondary_font_weight',
				),
				'type'        => 'he_typography'
			) )
	);



	$wp_customize->add_setting( 'custom_font_stack', array(
		'sanitize_callback' => 'esc_attr',
		'default' => '',
	) );

	$wp_customize->add_control( 'custom_font_stack', array(
		'label'   => 'Custom Font Stack',
		'section' => 'fonts',
		'type'    => 'text',

	) );


}
