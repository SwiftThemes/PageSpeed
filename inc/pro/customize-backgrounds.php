<?php


add_action( 'customize_register', 'pagespeed_customize_backgrounds' );
function pagespeed_customize_backgrounds( $wp_customize ) {


	// Add all the required sections
	$wp_customize->add_section( 'backgrounds', array(
		'title'    => __( 'Colors & Gradients', 'page-speed' ),
		'priority' => 32,
	) );


	$wp_customize->add_setting( 'body_colors', array(
		'sanitize_callback' => 'helium_pass',
		'default'           => array(
			'enable'         => false,
			'text_color'     => '#dark-3',
			'link_color'     => '$primary',
			'bg_start'       => '#fff',
			'is_gradient'    => 0,
			'bg_end'         => '#fff',
			'gradient_angle' => '90',

		)
	) );


	$wp_customize->add_control(
		new Helium_Customize_Gradient(
			$wp_customize,
			'body_colors',
			array(
				'label'    => esc_html__( 'Body', 'page-speed' ),
				'section'  => 'backgrounds',
				'priority' => 10,
				'type'     => 'he_colors',
				'setting'  => 'body_colors'
			)
		)
	);


	$wp_customize->add_setting( 'header_colors', array(
		'sanitize_callback' => 'helium_pass',
		'default'           => array(
			'enable'         => false,
			'text_color'     => '#dark-3',
			'link_color'     => '$primary',
			'bg_start'       => '#fff',
			'is_gradient'    => 0,
			'bg_end'         => '#fff',
			'gradient_angle' => '90',

		)
	) );


	$wp_customize->add_control(
		new Helium_Customize_Gradient(
			$wp_customize,
			'header_colors',
			array(
				'label'    => esc_html__( 'Header', 'page-speed' ),
				'section'  => 'backgrounds',
				'priority' => 10,
				'type'     => 'he_colors',
			)
		)
	);


	$wp_customize->add_setting( 'primary_nav_colors', array(
		'sanitize_callback' => 'helium_pass',
		'default'           => array(
			'enable'         => false,
			'text_color'     => '#dark-3',
			'link_color'     => '$primary',
			'bg_start'       => '#fff',
			'is_gradient'    => 0,
			'bg_end'         => '#fff',
			'gradient_angle' => '90',

		)
	) );


	$wp_customize->add_control(
		new Helium_Customize_Gradient(
			$wp_customize,
			'primary_nav_colors',
			array(
				'label'    => esc_html__( 'Primary Navigation', 'page-speed' ),
				'section'  => 'backgrounds',
				'priority' => 10,
				'type'     => 'he_colors',
			)
		)
	);


	$wp_customize->add_setting( 'secondary_nav_colors', array(
		'sanitize_callback' => 'helium_pass',
		'default'           => array(
			'enable'         => false,
			'text_color'     => '#dark-3',
			'link_color'     => '$primary',
			'bg_start'       => '#fff',
			'is_gradient'    => 0,
			'bg_end'         => '#fff',
			'gradient_angle' => '90',

		)
	) );


	$wp_customize->add_control(
		new Helium_Customize_Gradient(
			$wp_customize,
			'secondary_nav_colors',
			array(
				'label'    => esc_html__( 'Secondary Navigation', 'page-speed' ),
				'section'  => 'backgrounds',
				'priority' => 10,
				'type'     => 'he_colors',
			)
		)
	);


	$wp_customize->add_setting( 'content_colors', array(
		'sanitize_callback' => 'helium_pass',
		'default'           => array(
			'enable'         => false,
			'text_color'     => '#dark-3',
			'link_color'     => '$primary',
			'bg_start'       => '#fff',
			'is_gradient'    => 0,
			'bg_end'         => '#fff',
			'gradient_angle' => '90',

		)
	) );


	$wp_customize->add_control(
		new Helium_Customize_Gradient(
			$wp_customize,
			'content_colors',
			array(
				'label'    => esc_html__( 'Content', 'page-speed' ),
				'section'  => 'backgrounds',
				'priority' => 10,
				'type'     => 'he_colors',
			)
		)
	);


	$wp_customize->add_setting( 'sb1_colors', array(
		'sanitize_callback' => 'helium_pass',
		'default'           => array(
			'enable'         => false,
			'text_color'     => '#dark-3',
			'link_color'     => '$primary',
			'bg_start'       => '#fff',
			'is_gradient'    => 0,
			'bg_end'         => '#fff',
			'gradient_angle' => '90',

		)
	) );


	$wp_customize->add_control(
		new Helium_Customize_Gradient(
			$wp_customize,
			'sb1_colors',
			array(
				'label'    => esc_html__( 'Sidebar #1', 'page-speed' ),
				'section'  => 'backgrounds',
				'priority' => 10,
				'type'     => 'he_colors',
			)
		)
	);


	$wp_customize->add_setting( 'sb2_colors', array(
		'sanitize_callback' => 'helium_pass',
		'default'           => array(
			'enable'         => false,
			'text_color'     => '#dark-3',
			'link_color'     => '$primary',
			'bg_start'       => '#fff',
			'is_gradient'    => 0,
			'bg_end'         => '#fff',
			'gradient_angle' => '90',

		)
	) );


	$wp_customize->add_control(
		new Helium_Customize_Gradient(
			$wp_customize,
			'sb2_colors',
			array(
				'label'    => esc_html__( 'Sidebar #2', 'page-speed' ),
				'section'  => 'backgrounds',
				'priority' => 10,
				'type'     => 'he_colors',
			)
		)
	);


	$wp_customize->add_setting( 'footer_colors', array(
		'sanitize_callback' => 'helium_pass',
		'default'           => array(
			'enable'         => false,
			'text_color'     => '#dark-3',
			'link_color'     => '$primary',
			'bg_start'       => '#fff',
			'is_gradient'    => 0,
			'bg_end'         => '#fff',
			'gradient_angle' => '90',

		)
	) );


	$wp_customize->add_control(
		new Helium_Customize_Gradient(
			$wp_customize,
			'footer_colors',
			array(
				'label'    => esc_html__( 'Footer', 'page-speed' ),
				'section'  => 'backgrounds',
				'priority' => 10,
				'type'     => 'he_colors',
			)
		)
	);


	$wp_customize->add_setting( 'copyright_colors', array(
		'sanitize_callback' => 'helium_pass',
		'default'           => array(
			'enable'         => false,
			'text_color'     => '#dark-3',
			'link_color'     => '$primary',
			'bg_start'       => '#fff',
			'is_gradient'    => 0,
			'bg_end'         => '#fff',
			'gradient_angle' => '90',

		)
	) );


	$wp_customize->add_control(
		new Helium_Customize_Gradient(
			$wp_customize,
			'copyright_colors',
			array(
				'label'    => esc_html__( 'Copyright', 'page-speed' ),
				'section'  => 'backgrounds',
				'priority' => 10,
				'type'     => 'he_colors',
				'setting'  => 'copyright_colors'
			)
		)
	);


}