<?php
/**
 * Created by Satish Gandham.
 * User: satish
 * Date: 09/02/17
 * Time: 9:44 PM
 */

add_action( 'customize_register', 'pagespeed_customize', 80 );
function pagespeed_customize( $wp_customize ) {

	$wp_customize->add_panel( 'theme_options', array(
		'title'       => __( 'Theme Options', 'page-speed' ),
		'description' => '', // Include html tags such as <p>
		'priority'    => 10, // Mixed with top-level-section hierarchy.
	) );
	// Logo position
	$wp_customize->add_setting( 'logo_position', array(
		'sanitize_callback' => 'helium_sanitize_choice_field',
		'default'           => 'left',
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
						'url'   => HELIUM_ADMIN_IMAGES_URI . '/logo-left.png',
						'label' => __( 'Left', 'page-speed' ),
					),
					'center' => array(
						'url'   => HELIUM_ADMIN_IMAGES_URI . '/logo-center.png',
						'label' => __( 'Center', 'page-speed' ),
					),
					'right'  => array(
						'url'   => HELIUM_ADMIN_IMAGES_URI . '/logo-right.png',
						'label' => __( 'Right', 'page-speed' ),
					),
				)
			)
		)
	);

	// Mobile logo
	$wp_customize->add_setting( 'mobile_logo', array(
		'sanitize_callback' => 'absint',
		'default'           => '',

	) );
	$wp_customize->add_control( new WP_Customize_Cropped_Image_Control(
		$wp_customize,
		'mobile_logo',
		array(
			'label'      => __( 'Logo for mobiles', 'page-speed' ),
			'section'    => 'title_tagline',
			'settings'   => 'mobile_logo',
			'priority'   => 32,
			'height'     => 48,
			'flex_width' => true,
		)
	) );


	// Layout
	$wp_customize->add_section( 'layout_settings', array(
		'title'       => __( 'Layout', 'page-speed' ),
		'priority'    => 20,
		'panel'       => 'theme_options',
		'description' => '',
	) );
	$wp_customize->add_setting( 'theme_layout', array(
		'sanitize_callback' => 'helium_sanitize_choice_field',
		'default'           => 'r-sb',
		'transport'         => 'postMessage',

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
						'url'   => HELIUM_ADMIN_IMAGES_URI . 'layout-l-sb.png',
						'label' => __( 'Content / Sidebar', 'page-speed' )
					),
					'centered' => array(
						'url'   => HELIUM_ADMIN_IMAGES_URI . 'layout-centered.png',
						'label' => __( 'Sidebar / Content / Sidebar', 'page-speed' ),
					),
					'r-sb'     => array(
						'url'   => HELIUM_ADMIN_IMAGES_URI . 'layout-r-sb.png',
						'label' => __( 'Sidebar / Content', 'page-speed' ),
					),
					'rr-sb'    => array(
						'url'   => HELIUM_ADMIN_IMAGES_URI . 'layout-rr-sb.png',
						'label' => __( 'Sidebar / Content', 'page-speed' ),
					),
					'll-sb'    => array(
						'url'   => HELIUM_ADMIN_IMAGES_URI . 'layout-ll-sb.png',
						'label' => __( 'Sidebar / Content', 'page-speed' ),
					),

				)
			)
		)
	);


	$wp_customize->add_setting( 'container_type', array(
		'sanitize_callback' => 'helium_sanitize_choice_field',
		'default'           => 'regular',
		'transport'         => 'postMessage',

	) );

	$wp_customize->add_control(
		new Hybrid_Customize_Control_Radio_Image(
			$wp_customize,
			'container_type',
			array(
				'label'    => esc_html__( 'Layout Container', 'page-speed' ),
				'section'  => 'layout_settings',
				'priority' => 10,
				'choices'  => array(
					'regular' => array(
						'url'   => HELIUM_ADMIN_IMAGES_URI . '/layout-centered.png',
						'label' => __( 'Regular', 'page-speed' )
					),
					'boxed'   => array(
						'url'   => HELIUM_ADMIN_IMAGES_URI . '/container-boxed.png',
						'label' => __( 'Boxed', 'page-speed' ),
					),
					'wide'    => array(
						'url'   => HELIUM_ADMIN_IMAGES_URI . '/container-wide.png',
						'label' => __( 'Wide', 'page-speed' ),
					),
				)
			)
		)
	);


	$wp_customize->add_setting( 'separate_containers', array(
		'sanitize_callback' => 'helium_boolean',
		'default'           => true,
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( 'separate_containers', array(
		'label'    => __( 'Use separate containers for sidebars and main content', 'page-speed' ),
		'section'  => 'layout_settings',
		'type'     => 'checkbox',
		'priority' => 20,
	) );

	$wp_customize->add_setting( 'site_width', array(
		'sanitize_callback' => 'sanitize_text_field',
		'default'           => '1260px',
		'transport'         => 'postMessage',

	) );
	$wp_customize->add_setting( 'main_width', array(
		'sanitize_callback' => 'helium_float',
		'default'           => 72,
		'transport'         => 'postMessage',

	) );
	$wp_customize->add_setting( 'left_sidebar_width', array(
		'sanitize_callback' => 'helium_float',
		'default'           => '18.75',
		'transport'         => 'postMessage',
	) );
	$wp_customize->add_setting( 'enable_card_style_widgets_sb', array(
		'sanitize_callback' => 'helium_boolean',
		'default'           => true,
		'transport'         => 'postMessage',
	) );


	$wp_customize->add_control( 'site_width', array(
		'label'       => __( 'Site container width', 'page-speed' ),
		'description' => __( 'Along with units.', 'page-speed' ) . ' ' . __( 'Default', 'page-speed' ) . ': 1260px',
		'section'     => 'layout_settings',
		'type'        => 'text',
		'priority'    => 60,

	) );

	$wp_customize->add_control( 'main_width', array(
		'label'       => __( 'Main content width', 'page-speed' ),
		'description' => __( 'In percentage without the % sign.', 'page-speed' ) . ' ' . __( 'Default', 'page-speed' ) . ': 70',
		'section'     => 'layout_settings',
		'type'        => 'number',
		'priority'    => 60,
		'input_attrs' => array( 'min' => 40, 'max' => 100 )
	) );
	$wp_customize->add_control( 'left_sidebar_width', array(
		'label'       => __( 'Left sidebar width', 'page-speed' ),
		'description' => __( 'If you are using layout with two sidebars. Left sidebar width in percentage without the % sign.', 'page-speed' ) . ' ' . __( 'Default', 'page-speed' ) . ': 18.75',
		'section'     => 'layout_settings',
		'type'        => 'number',
		'priority'    => 60,
		'input_attrs' => array( 'min' => 0, 'max' => 60 ),
		'active_callback' => function () {
			return in_array(get_theme_mod('theme_layout','r-sb'),array('centered','rr-sb','ll-sb'));
		}

	) );


	$wp_customize->add_control( 'enable_card_style_widgets_sb', array(
		'label'           => __( 'Show sidebar widgets in card style', 'page-speed' ),
		'description'     => __( ' ', 'page-speed' ),
		'section'         => 'layout_settings',
		'type'            => 'checkbox',
		'priority'        => 45,
		'active_callback' => function () {
			return !get_theme_mod( 'separate_containers', true );
		}
	) );

	// Home Page separate_containers


	$wp_customize->add_setting( 'single_post_layout', array(
		'sanitize_callback' => 'helium_sanitize_choice_field',
		'default'           => 'regular',
	) );


	$wp_customize->add_control(
		new Hybrid_Customize_Control_Radio_Image(
			$wp_customize,
			'single_post_layout',
			array(
				'label'    => esc_html__( 'Single Post Layout', 'page-speed' ),
				'section'  => 'layout_settings',
				'priority' => 10,
				'choices'  => array(
					'regular' => array(
						'url'   => HELIUM_ADMIN_IMAGES_URI . '/layout-' . sanitize_text_field( get_theme_mod( 'theme_layout', 'r-sb' ) ) . '.png',
						'label' => __( 'Regular', 'page-speed' )
					),
					'1c'      => array(
						'url'   => HELIUM_ADMIN_IMAGES_URI . '/single-post-1c.png',
						'label' => __( 'Boxed', 'page-speed' ),
					)
				)
			)
		)
	);

	$wp_customize->add_setting( 'woocommerce_layout', array(
		'sanitize_callback' => 'helium_sanitize_choice_field',
		'default'           => 'r-sb',
	) );


	$wp_customize->add_control(
		new Hybrid_Customize_Control_Radio_Image(
			$wp_customize,
			'woocommerce_layout',

			array(
				'label'           => esc_html__( 'WooCommerce Pages Layout', 'page-speed' ),
				'description'     => esc_html__( 'This only applies to products and shop page. For checkout, account, orders etc.. edit the individual page and choose the template of your choice.', 'page-speed' ),
				'section'         => 'layout_settings',
				'priority'        => 10,
				'choices'         => array(
					'l-sb' => array(
						'url'   => HELIUM_ADMIN_IMAGES_URI . 'layout-l-sb.png',
						'label' => __( 'Content / Sidebar', 'page-speed' )
					),
					'r-sb' => array(
						'url'   => HELIUM_ADMIN_IMAGES_URI . 'layout-r-sb.png',
						'label' => __( 'Sidebar / Content', 'page-speed' ),
					),
				),
				'active_callback' => function () {
					return defined( 'WC_VERSION' );
				}
			)

		)
	);


}

