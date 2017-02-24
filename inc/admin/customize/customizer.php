<?php
/**
 * Created by PhpStorm.
 * User: satish
 * Date: 09/02/17
 * Time: 9:44 PM
 */

add_action( 'customize_register', 'nybr_customize', 888 );
function nybr_customize( $wp_customize ) {

	// Logo position
	$wp_customize->add_setting( 'logo_position', array(
		'default' => 'left',
	) );
	$wp_customize->add_control(
		new Hybrid_Customize_Control_Radio_Image(
			$wp_customize,
			'logo_position',
			array(
				'label'    => esc_html__( 'Logo position', 'nybr' ),
				'section'  => 'title_tagline',
				'priority' => 30,
				'choices'  => array(
					'left'   => array( 'url' => ADMIN_IMAGES_URI . '/logo-left.png', 'label' => __( 'Left', 'nybr' ) ),
					'center' => array(
						'url'   => ADMIN_IMAGES_URI . '/logo-center.png',
						'label' => __( 'Center', 'nybr' ),
					),
					'right'  => array(
						'url'   => ADMIN_IMAGES_URI . '/logo-right.png',
						'label' => __( 'Right', 'nybr' ),
					),
				)
			)
		)
	);

	// Mobile logo
	$wp_customize->add_setting( 'mobile_logo', array(
		'default' => '',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control(
		$wp_customize,
		'mobile_logo',
		array(
			'label'    => __( 'Logo for mobiles', 'nybr' ),
			'section'  => 'title_tagline',
			'settings' => 'mobile_logo',
			'priority' => 32,
		)
	) );


	// Layout
	$wp_customize->add_section( 'layout_settings', array(
		'title'       => 'Layout',
		'priority'    => 20,
		'description' => '',
	) );
	$wp_customize->add_setting( 'theme_layout', array(
		'default' => 'centered',
	) );
	$wp_customize->add_control(
		new Hybrid_Customize_Control_Radio_Image(
			$wp_customize,
			'theme_layout',
			array(
				'label'    => esc_html__( 'Site Layout', 'nybr' ),
				'section'  => 'layout_settings',
				'priority' => 10,
				'choices'  => array(
					'l-sb'     => array(
						'url'   => ADMIN_IMAGES_URI . '/layout-l-sb.png',
						'label' => __( 'Content / Sidebar', 'nybr' )
					),
					'centered' => array(
						'url'   => ADMIN_IMAGES_URI . '/layout-centered.png',
						'label' => __( 'Sidebar / Content / Sidebar', 'nybr' ),
					),
					'r-sb'     => array(
						'url'   => ADMIN_IMAGES_URI . '/layout-r-sb.png',
						'label' => __( 'Sidebar / Content', 'nybr' ),
					),
				)
			)
		)
	);

	$wp_customize->add_setting( 'site_width', array(
		'default' => '1160px',
	) );
	$wp_customize->add_setting( 'main_width', array(
		'default' => '70%',
	) );
	$wp_customize->add_setting( 'left_sidebar_width', array(
		'default' => '70%',
	) );


	$wp_customize->add_control( 'site_width', array(
		'label'       => __( 'Main container width', 'nybr' ),
		'description' => __( 'Along with units.' ) . ' ' . __( 'Default', 'nybr' ) . ': 1600 px',
		'section'     => 'layout_settings',
		'type'        => 'text',
		'priority'    => 20,

	) );

	$wp_customize->add_control( 'main_width', array(
		'label'       => __( 'Content width', 'nybr' ),
		'description' => __( 'In percentage without the % sign.', 'nybr' ) . ' ' . __( 'Default', 'nybr' ) . ': 70',
		'section'     => 'layout_settings',
		'type'        => 'number',
		'priority'    => 20,

	) );
	$wp_customize->add_control( 'left_sidebar_width', array(
		'label'       => __( 'Left sidebar width', 'nybr' ),
		'description' => __( 'If you are using centered layout. Left sidebar width in percentage without the % sign.', 'nybr' ) . ' ' . __( 'Default', 'nybr' ) . ': 18.75',
		'section'     => 'layout_settings',
		'type'        => 'number',
		'priority'    => 20,

	) );


	// Home Page

}
