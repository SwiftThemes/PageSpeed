<?php
/**
 * Created by PhpStorm.
 * User: satish
 * Date: 09/02/17
 * Time: 9:44 PM
 */

add_action( 'customize_register', 'pagespeed_customize', 888 );
function pagespeed_customize( $wp_customize ) {

	// Logo position
	$wp_customize->add_setting( 'logo_position', array(
		'sanitize_callback' => 'esc_attr',
		'default' => 'left',
	) );
	$wp_customize->add_control(
		new Hybrid_Customize_Control_Radio_Image(
			$wp_customize,
			'logo_position',
			array(
				'label'    => esc_html__( 'Logo position', 'page-speed' ),
				'section'  => 'title_tagline',
				'priority' => 30,
				'choices'  => array(
					'left'   => array(
						'url'   => ADMIN_IMAGES_URI . '/logo-left.png',
						'label' => __( 'Left', 'page-speed' ),
					),
					'center' => array(
						'url'   => ADMIN_IMAGES_URI . '/logo-center.png',
						'label' => __( 'Center', 'page-speed' ),
					),
					'right'  => array(
						'url'   => ADMIN_IMAGES_URI . '/logo-right.png',
						'label' => __( 'Right', 'page-speed' ),
					),
				)
			)
		)
	);

	// Mobile logo
	$wp_customize->add_setting( 'mobile_logo', array(
		'sanitize_callback' => 'absint',
		'default' => '',

	) );
	$wp_customize->add_control( new WP_Customize_Cropped_Image_Control(
		$wp_customize,
		'mobile_logo',
		array(
			'label'      => __( 'Logo for mobiles', 'page-speed' ),
			'section'    => 'title_tagline',
			'settings'   => 'mobile_logo',
			'priority'   => 32,
			'height'     => 32,
			'flex_width' => true,
		)
	) );


	// Layout
	$wp_customize->add_section( 'layout_settings', array(
		'title'       => 'Layout',
		'priority'    => 20,
		'description' => '',
	) );
	$wp_customize->add_setting( 'theme_layout', array(
		'sanitize_callback' => 'esc_attr',
		'default' => 'centered',

	) );
	$wp_customize->add_control(
		new Hybrid_Customize_Control_Radio_Image(
			$wp_customize,
			'theme_layout',
			array(
				'label'    => esc_html__( 'Site Layout', 'page-speed' ),
				'section'  => 'layout_settings',
				'priority' => 10,
				'choices'  => array(
					'l-sb'     => array(
						'url'   => ADMIN_IMAGES_URI . '/layout-l-sb.png',
						'label' => __( 'Content / Sidebar', 'page-speed' )
					),
					'centered' => array(
						'url'   => ADMIN_IMAGES_URI . '/layout-centered.png',
						'label' => __( 'Sidebar / Content / Sidebar', 'page-speed' ),
					),
					'r-sb'     => array(
						'url'   => ADMIN_IMAGES_URI . '/layout-r-sb.png',
						'label' => __( 'Sidebar / Content', 'page-speed' ),
					),
				)
			)
		)
	);

	$wp_customize->add_setting( 'site_width', array(
		'sanitize_callback' => 'esc_attr',
		'default' => '1160px',

	) );
	$wp_customize->add_setting( 'main_width', array(
		'sanitize_callback' => 'helium_float',
		'default' => '56',

	) );
	$wp_customize->add_setting( 'left_sidebar_width', array(
		'sanitize_callback' => 'helium_float',
		'default' => '18.75',
	) );


	$wp_customize->add_control( 'site_width', array(
		'label'       => __( 'Main container width', 'page-speed' ),
		'description' => __( 'Along with units.', 'page-speed' ) . ' ' . __( 'Default', 'page-speed' ) . ': 1600 px',
		'section'     => 'layout_settings',
		'type'        => 'text',
		'priority'    => 20,

	) );

	$wp_customize->add_control( 'main_width', array(
		'label'       => __( 'Content width', 'page-speed' ),
		'description' => __( 'In percentage without the % sign.', 'page-speed' ) . ' ' . __( 'Default', 'page-speed' ) . ': 70',
		'section'     => 'layout_settings',
		'type'        => 'number',
		'priority'    => 20,

	) );
	$wp_customize->add_control( 'left_sidebar_width', array(
		'label'       => __( 'Left sidebar width', 'page-speed' ),
		'description' => __( 'If you are using centered layout. Left sidebar width in percentage without the % sign.', 'page-speed' ) . ' ' . __( 'Default', 'page-speed' ) . ': 18.75',
		'section'     => 'layout_settings',
		'type'        => 'number',
		'priority'    => 20,

	) );


	// Home Page

}
