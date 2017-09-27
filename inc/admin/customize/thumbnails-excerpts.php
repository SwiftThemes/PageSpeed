<?php


add_action( 'customize_register', 'pagespeed_customize_thumbnails_excerpts', 600 );
function pagespeed_customize_thumbnails_excerpts( $wp_customize ) {
	$wp_customize->add_panel( 'thumbnails_excerpts', array(
		'title'       => __( 'Thumbnails & Excerpts', 'page-speed' ),
		'description' => '', // Include html tags such as <p>
		'priority'    => 30, // Mixed with top-level-section hierarchy.
	) );


	// Add all the required sections
	$wp_customize->add_section( 'home_page_design', array(
		'title'    => __( 'Latest Posts Design', 'page-speed' ),
		'panel'    => 'thumbnails_excerpts',
		'priority' => 30,
	) );

	// Add all the required sections
	$wp_customize->add_section( 'archives_design', array(
		'title'    => __( 'Archives, Categories, Tags', 'page-speed' ),
		'panel'    => 'thumbnails_excerpts',
		'priority' => 30,
	) );

	// Add all the required sections
	$wp_customize->add_section( 'single_post_design', array(
		'title'    => __( 'Single Post', 'page-speed' ),
		'panel'    => 'thumbnails_excerpts',
		'priority' => 30,
	) );

	// Add all the required sections
	$wp_customize->add_section( 'single_page_design', array(
		'title'    => __( 'Single Page', 'page-speed' ),
		'panel'    => 'thumbnails_excerpts',
		'priority' => 30,
	) );

	// Show excerpts or full post
	$wp_customize->add_setting( 'home_show_excerpts', array(
		'sanitize_callback' => 'helium_boolean',
		'default'           => true,

	) );
	// Show thumbnail
	$wp_customize->add_setting( 'home_show_thumbnails', array(
		'sanitize_callback' => 'helium_boolean',
		'default'           => true,

	) );

	// Thumbnail size
	$wp_customize->add_setting( 'home_thumb_width', array(
		'sanitize_callback' => 'absint',
		'default'           => '120',

	) );
	$wp_customize->add_setting( 'home_thumb_height', array(
		'sanitize_callback' => 'absint',
		'default'           => '120',

	) );

	$wp_customize->add_setting( 'home_thumb_position', array(
		'sanitize_callback' => 'esc_attr',
		'default'           => 'alternate',

	) );

	$wp_customize->add_control( 'home_show_excerpts', array(
		'label'   => 'Show excerpts on home page',
		'section' => 'home_page_design',
		'type'    => 'checkbox',

	) );

	$wp_customize->add_control( 'home_show_thumbnails', array(
		'label'   => __( 'Show thumbnails on home page', 'page-speed' ),
		'section' => 'home_page_design',
		'type'    => 'checkbox',

	) );

	//@todo use named array for settings

	$wp_customize->add_control(
		new Helium_Customize_Control_Image_Size(
			$wp_customize,
			'home_thumb',
			array(
				'label'    => esc_html__( 'Home page thumbnail size', 'page-speed' ),
				'section'  => 'home_page_design',
				'priority' => 10,
				'type'     => 'text',
				'settings' => array(
					'home_thumb_width',
					'home_thumb_height',
					'home_thumb_position',
				),
			)
		)
	);


	/**
	 * Archives
	 */


	// Show excerpts or full post
	$wp_customize->add_setting( 'archives_show_excerpts', array(
		'sanitize_callback' => 'helium_boolean',
		'default'           => true,
	) );

	$wp_customize->add_control( 'archives_show_excerpts', array(
		'label'   => 'Show excerpts on archives',
		'section' => 'archives_design',
		'type'    => 'checkbox',

	) );

	// Show thumbnail
	$wp_customize->add_setting( 'archives_show_thumbnails', array(
		'sanitize_callback' => 'helium_boolean',
		'default'           => true,

	) );

	$wp_customize->add_control( 'archives_show_thumbnails', array(
		'label'   => __( 'Show thumbnails on archives', 'page-speed' ),
		'section' => 'archives_design',
		'type'    => 'checkbox',

	) );

	// Thumbnail size
	$wp_customize->add_setting( 'archives_thumb_width', array(
		'sanitize_callback' => 'absint',
		'default'           => '120',

	) );
	$wp_customize->add_setting( 'archives_thumb_height', array(
		'sanitize_callback' => 'absint',
		'default'           => '120',
	) );

	$wp_customize->add_setting( 'archives_thumb_position', array(
		'sanitize_callback' => 'esc_attr',
		'default'           => 'alternate',

	) );

	$wp_customize->add_control(
		new Helium_Customize_Control_Image_Size(
			$wp_customize,
			'archives_thumb',
			array(
				'label'    => esc_html__( 'Archives thumbnail size', 'page-speed' ),
				'section'  => 'archives_design',
				'priority' => 10,
				'type'     => 'text',
				'settings' => array(
					'archives_thumb_width',
					'archives_thumb_height',
					'archives_thumb_position',
				),
			)
		)
	);


	/**
	 * Single post
	 */

	// Show thumbnail
//	$wp_customize->add_setting( 'single_post_show_thumbnails', array(
//		'sanitize_callback' => 'helium_boolean',
//		'default'           => false,
//
//	) );
//
//	$wp_customize->add_control( 'single_post_show_thumbnails', array(
//		'label'   => __( 'Show thumbnail on single post', 'page-speed' ),
//		'section' => 'single_post_design',
//		'type'    => 'checkbox',
//
//	) );
//
//	// Thumbnail size
//	$wp_customize->add_setting( 'single_post_thumb_width', array(
//		'sanitize_callback' => 'absint',
//		'default'           => '120',
//
//	) );
//	$wp_customize->add_setting( 'single_post_thumb_height', array(
//		'sanitize_callback' => 'absint',
//		'default'           => '120',
//
//	) );
//
//	$wp_customize->add_setting( 'single_post_thumb_position', array(
//		'sanitize_callback' => 'esc_attr',
//		'default'           => 'right',
//
//	) );
//
//	$wp_customize->add_control(
//		new Helium_Customize_Control_Image_Size(
//			$wp_customize,
//			'single_post_thumb',
//			array(
//				'label'    => esc_html__( 'Single post thumbnail size', 'page-speed' ),
//				'section'  => 'single_post_design',
//				'priority' => 10,
//				'type'     => 'text',
//				'settings' => array(
//					'single_post_thumb_width',
//					'single_post_thumb_height',
//					'single_post_thumb_position',
//				),
//			)
//		)
//	);

	/**
	 * Single page
	 */

	// Show thumbnail
//	$wp_customize->add_setting( 'single_page_show_thumbnails', array(
//		'sanitize_callback' => 'helium_boolean',
//		'default'           => false,
//
//	) );
//
//	$wp_customize->add_control( 'single_page_show_thumbnails', array(
//		'label'   => __( 'Show thumbnail on single page', 'page-speed' ),
//		'section' => 'single_page_design',
//		'type'    => 'checkbox',
//
//	) );
//
//	// Thumbnail size
//	$wp_customize->add_setting( 'single_page_thumb_width', array(
//		'sanitize_callback' => 'absint',
//		'default'           => '120',
//
//	) );
//	$wp_customize->add_setting( 'single_page_thumb_height', array(
//		'sanitize_callback' => 'absint',
//		'default'           => '120',
//
//	) );
//
//	$wp_customize->add_setting( 'single_page_thumb_position', array(
//		'sanitize_callback' => 'esc_attr',
//		'default'           => 'right',
//
//	) );
//
//	$wp_customize->add_control(
//		new Helium_Customize_Control_Image_Size(
//			$wp_customize,
//			'single_page_thumb',
//			array(
//				'label'    => esc_html__( 'Single page thumbnail size', 'page-speed' ),
//				'section'  => 'single_page_design',
//				'priority' => 10,
//				'type'     => 'text',
//				'settings' => array(
//					'single_page_thumb_width',
//					'single_page_thumb_height',
//					'single_page_thumb_position',
//				),
//			)
//		)
//	);


}