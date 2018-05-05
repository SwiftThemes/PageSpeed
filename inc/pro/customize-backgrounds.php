<?php


add_action( 'customize_register', 'pagespeed_customize_backgrounds' ,1);
function pagespeed_customize_backgrounds( $wp_customize ) {


	// Add all the required sections
	$wp_customize->add_section( 'backgrounds', array(
		'title'    => __( 'Colors & Gradients', 'page-speed' ),
		'priority' => 32,
		'panel'    => 'theme_options'
	) );


	$wp_customize->add_setting( 'backgrounds-deprecated', array( 'sanitize_callback' => 'sanitize_text_field', ) );

	$wp_customize->add_control( new Helium_Help_Text( $wp_customize, 'backgrounds-deprecated', array(
		'section'  => 'backgrounds',
		'priority' => 1,
		'label'    => __( ' ', 'page-speed' ),
		'content'  => __( 'We are planning to revamp this section in future updates. If you are not already using these options, skip them for now. If you are using them, please keep an eye on changelog and the blog for updates. If you have any questions, please contact support, be assured, we got your back.', 'page-speed' ),
	) ) );


	$wp_customize->add_setting( 'enable_transparent_backgrounds', array(
		'sanitize_callback' => 'helium_boolean',
		'default'           => false,
		'transport'         => 'postMessage',

	) );

	$wp_customize->add_control( 'enable_transparent_backgrounds', array(
		'label'       => __( 'Make backgrounds transparent', 'page-speed' ),
		'description' => __( 'So that the backgrounds are not hidden by layers above it.', 'page-speed' ),
		'section'     => 'backgrounds',
		'type'        => 'checkbox',
		'priority'    => 1,

	) );


	$wp_customize->add_setting( 'body_colors', array(
		'sanitize_callback' => 'helium_pass',
		'transport'         => 'postMessage',
		'default'           => array(
			'enable'         => false,
			'text_color'     => '$dark-3',
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
		'transport'         => 'postMessage',
		'default'           => array(
			'enable'         => false,
			'text_color'     => '$dark-3',
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
		'transport'         => 'postMessage',
		'default'           => array(
			'enable'         => false,
			'text_color'     => '$dark-3',
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
		'transport'         => 'postMessage',
		'default'           => array(
			'enable'         => false,
			'text_color'     => '$dark-3',
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
		'transport'         => 'postMessage',
		'default'           => array(
			'enable'         => false,
			'text_color'     => '$dark-3',
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
		'transport'         => 'postMessage',
		'default'           => array(
			'enable'         => false,
			'text_color'     => '$dark-3',
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
		'transport'         => 'postMessage',
		'default'           => array(
			'enable'         => false,
			'text_color'     => '$dark-3',
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
		'transport'         => 'postMessage',
		'default'           => array(
			'enable'         => false,
			'text_color'     => '$dark-3',
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
		'transport'         => 'postMessage',
		'default'           => array(
			'enable'         => false,
			'text_color'     => '$dark-3',
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




//
//	//@todo move to its own file
//	$wp_customize->selective_refresh->add_partial( 'refresh_styles', array(
//		'selector'            => '#page-speed-inline-styles',
//		'settings'            => PAGE_SPEED_GRADIENT_BGS,
//		'container_inclusive' => false,
//		'render_callback'     => 'pagespeed_put_css_in_head',
//		'fallback_refresh'    => false,
//	) );

}