<?php


add_action( 'customize_register', 'pagespeed_customize_thumbnails_excerpts', 600 );
function pagespeed_customize_thumbnails_excerpts( $wp_customize ) {
	$wp_customize->add_panel( 'thumbnails_excerpts', array(
		'title'       => __( 'Thumbnails, Excerpts & Meta', 'page-speed' ),
		'description' => '', // Include html tags such as <p>
		'priority'    => 11, // Mixed with top-level-section hierarchy.
	) );


	// Add all the required sections
	$wp_customize->add_section( 'home_page_design', array(
		'title'    => __( 'Latest Posts, HomePage', 'page-speed' ),
		'panel'    => 'theme_options',
		'priority' => 90,
	) );

	// Add all the required sections
	$wp_customize->add_section( 'archives_design', array(
		'title'    => __( 'Archives, Categories, Tags', 'page-speed' ),
		'panel'    => 'theme_options',
		'priority' => 90,
	) );

	// Add all the required sections
	$wp_customize->add_section( 'single_post_design', array(
		'title'    => __( 'Single Post', 'page-speed' ),
		'panel'    => 'theme_options',
		'priority' => 90,
	) );

	// Add all the required sections
	$wp_customize->add_section( 'single_page_design', array(
		'title'    => __( 'Single Page', 'page-speed' ),
		'panel'    => 'theme_options',
		'priority' => 90,
	) );

	// Show excerpts or full post
	$wp_customize->add_setting( 'home_show_excerpts', array(
		'sanitize_callback' => 'helium_boolean',
		'default'           => true,

	) );
	// Show thumbnail
	$wp_customize->add_setting( 'home_thumb_show', array(
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

	$wp_customize->add_setting( 'home_thumb_alignment', array(
		'sanitize_callback' => 'helium_sanitize_thumbnail_alignment',
		'default'           => 'alternate',

	) );

	$wp_customize->add_control( 'home_show_excerpts', array(
		'label'    => __( 'Show excerpts on home page', 'page-speed' ),
		'section'  => 'home_page_design',
		'type'     => 'checkbox',
		'priority' => 6,


	) );


	$wp_customize->add_setting( 'dummy1', array(
		'sanitize_callback' => 'helium_sanitize_thumbnail_alignment',
		'default'           => 'alternate',

	) );
	$wp_customize->add_control( new Helium_Help_Text( $wp_customize, 'dummy1', array(
		'section'         => 'home_page_design',
		'priority'        => 10,
		'label'           => __( ' ', 'page-speed' ),
		'type'            => 'warning',
		'content'         => sprintf(
			__( 'Please <a href="%s" target="_blank">Install Dynamic Thumbnails</a> plugin to generate the correct size thumbnails.', 'page-speed' ),
			admin_url( 'themes.php?page=tgmpa-install-plugins' )
		),
		'active_callback' => function () {
			return ! function_exists( 'sdt_stop_thumbs' ) && ( get_theme_mod( 'home_thumb_show', true ) || get_theme_mod( 'home_thumb_show_mobile', true ) );
		}
	) ) );


	$wp_customize->add_control( 'home_thumb_show', array(
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
					'home_thumb_alignment',
				),
			)
		)
	);
// Show thumbnail
	$wp_customize->add_setting( 'home_thumb_show_mobile', array(
		'sanitize_callback' => 'helium_boolean',
		'default'           => true,

	) );

	// Thumbnail size
	$wp_customize->add_setting( 'home_thumb_width_mobile', array(
		'sanitize_callback' => 'absint',
		'default'           => '120',

	) );
	$wp_customize->add_setting( 'home_thumb_height_mobile', array(
		'sanitize_callback' => 'absint',
		'default'           => '120',

	) );

	$wp_customize->add_setting( 'home_thumb_alignment_mobile', array(
		'sanitize_callback' => 'helium_sanitize_thumbnail_alignment',
		'default'           => 'alternate',

	) );


	$wp_customize->add_control( 'home_thumb_show_mobile', array(
		'label'   => __( 'Show thumbnails on home page #Mobile', 'page-speed' ),
		'section' => 'home_page_design',
		'type'    => 'checkbox',

	) );

	//@todo use named array for settings

	$wp_customize->add_control(
		new Helium_Customize_Control_Image_Size(
			$wp_customize,
			'home_thumb_mobile',
			array(
				'label'    => esc_html__( 'Home page thumbnail size #Mobile', 'page-speed' ),
				'section'  => 'home_page_design',
				'priority' => 10,
				'type'     => 'text',
				'settings' => array(
					'home_thumb_width_mobile',
					'home_thumb_height_mobile',
					'home_thumb_alignment_mobile',
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
		'label'   => __( 'Show excerpts on archives', 'page-speed' ),
		'section' => 'archives_design',
		'type'    => 'checkbox',

	) );


	$wp_customize->add_setting( 'dummy2', array(
		'sanitize_callback' => 'helium_sanitize_thumbnail_alignment',
		'default'           => 'alternate',

	) );
	$wp_customize->add_control( new Helium_Help_Text( $wp_customize, 'dummy2', array(
		'section'         => 'archives_design',
		'priority'        => 10,
		'label'           => __( ' ', 'page-speed' ),
		'type'            => 'warning',
		'content'         => sprintf(
			__( 'Please <a href="%s" target="_blank">Install Dynamic Thumbnails</a> plugin to generate the correct size thumbnails.', 'page-speed' ),
			admin_url( 'themes.php?page=tgmpa-install-plugins' )
		),
		'active_callback' => function () {
			return ! function_exists( 'sdt_stop_thumbs' ) && ( get_theme_mod( 'home_thumb_show', true ) || get_theme_mod( 'home_thumb_show_mobile', true ) );
		}
	) ) );


	// Show thumbnail
	$wp_customize->add_setting( 'archives_thumb_show', array(
		'sanitize_callback' => 'helium_boolean',
		'default'           => true,

	) );

	$wp_customize->add_control( 'archives_thumb_show', array(
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

	$wp_customize->add_setting( 'archives_thumb_alignment', array(
		'sanitize_callback' => 'helium_sanitize_thumbnail_alignment',
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
					'archives_thumb_alignment',
				),
			)
		)
	);

	// Show thumbnail
	$wp_customize->add_setting( 'archives_thumb_show_mobile', array(
		'sanitize_callback' => 'helium_boolean',
		'default'           => true,

	) );

	$wp_customize->add_control( 'archives_thumb_show_mobile', array(
		'label'   => __( 'Show thumbnails on archives #Mobile', 'page-speed' ),
		'section' => 'archives_design',
		'type'    => 'checkbox',

	) );

	// Thumbnail size
	$wp_customize->add_setting( 'archives_thumb_width_mobile', array(
		'sanitize_callback' => 'absint',
		'default'           => '120',

	) );
	$wp_customize->add_setting( 'archives_thumb_height_mobile', array(
		'sanitize_callback' => 'absint',
		'default'           => '120',
	) );

	$wp_customize->add_setting( 'archives_thumb_alignment_mobile', array(
		'sanitize_callback' => 'helium_sanitize_thumbnail_alignment',
		'default'           => 'alternate',

	) );

	$wp_customize->add_control(
		new Helium_Customize_Control_Image_Size(
			$wp_customize,
			'archives_thumb_mobile',
			array(
				'label'    => esc_html__( 'Archives thumbnail size #Mobile', 'page-speed' ),
				'section'  => 'archives_design',
				'priority' => 10,
				'type'     => 'text',
				'settings' => array(
					'archives_thumb_width_mobile',
					'archives_thumb_height_mobile',
					'archives_thumb_alignment_mobile',
				),
			)
		)
	);











// Show thumbnail
	$wp_customize->add_setting( 'post_thumb_show', array(
		'sanitize_callback' => 'helium_boolean',
		'default'           => false,

	) );

	$wp_customize->add_setting( 'post_thumb_position', array(
		'sanitize_callback' => 'helium_pass',
		'default'           => 'below_title',
	) );

	// Thumbnail size
	$wp_customize->add_setting( 'post_thumb_width', array(
		'sanitize_callback' => 'absint',
		'default'           => '120',

	) );
	$wp_customize->add_setting( 'post_thumb_height', array(
		'sanitize_callback' => 'absint',
		'default'           => '120',

	) );

	$wp_customize->add_setting( 'post_thumb_alignment', array(
		'sanitize_callback' => 'helium_sanitize_thumbnail_alignment',
		'default'           => 'alternate',

	) );



	$wp_customize->add_setting( 'dummy5', array(
		'sanitize_callback' => '',
		'default'           => 'alternate',

	) );
	$wp_customize->add_control( new Helium_Help_Text( $wp_customize, 'dummy5', array(
		'section'         => 'single_post_design',
		'priority'        => 10,
		'label'           => __( ' ', 'page-speed' ),
		'type'            => 'warning',
		'content'         => sprintf(
			__( 'Please <a href="%s" target="_blank">Install Dynamic Thumbnails</a> plugin to generate the correct size thumbnails.', 'page-speed' ),
			admin_url( 'themes.php?page=tgmpa-install-plugins' )
		),
		'active_callback' => function () {
			return ! function_exists( 'sdt_stop_thumbs' ) && ( get_theme_mod( 'post_thumb_show', true ) || get_theme_mod( 'post_thumb_show_mobile', true ) );
		}
	) ) );


	$wp_customize->add_control( 'post_thumb_show', array(
		'label'   => __( 'Show thumbnails on single post', 'page-speed' ),
		'section' => 'single_post_design',
		'type'    => 'checkbox',

	) );


	$wp_customize->add_control( 'post_thumb_position', array(
		'label'   => __( 'Thumbnail position', 'page-speed' ),
		'section' => 'single_post_design',
		'type'    => 'select',
		'choices' => array(
			'above_title' => __( 'Above title','page-speed' ),
			'below_title' => __( 'Below title','page-speed' ),
		),
		'active_callback' => function () {
			return get_theme_mod('post_thumb_show');
		}

	) );




	//@todo use named array for settings

	$wp_customize->add_control(
		new Helium_Customize_Control_Image_Size(
			$wp_customize,
			'post_thumb',
			array(
				'label'    => esc_html__( 'Single post thumbnail size', 'page-speed' ),
				'section'  => 'single_post_design',
				'priority' => 10,
				'type'     => 'text',
				'settings' => array(
					'post_thumb_width',
					'post_thumb_height',
					'post_thumb_alignment',
				),

				'active_callback' => function () {
					return get_theme_mod('post_thumb_show');
				}
			)

		)
	);

	// Show thumbnail
	$wp_customize->add_setting( 'post_thumb_show_mobile', array(
		'sanitize_callback' => 'helium_boolean',
		'default'           => false,

	) );


	$wp_customize->add_setting( 'post_thumb_alignment', array(
		'sanitize_callback' => 'helium_sanitize_thumbnail_alignment',
		'default'           => 'alternate',

	) );

	// Thumbnail size
	$wp_customize->add_setting( 'post_thumb_width_mobile', array(
		'sanitize_callback' => 'absint',
		'default'           => '120',

	) );
	$wp_customize->add_setting( 'post_thumb_height_mobile', array(
		'sanitize_callback' => 'absint',
		'default'           => '120',

	) );

	$wp_customize->add_setting( 'post_thumb_alignment_mobile', array(
		'sanitize_callback' => 'helium_sanitize_thumbnail_alignment',
		'default'           => 'alternate',

	) );


	$wp_customize->add_control( 'post_thumb_show_mobile', array(
		'label'   => __( 'Show thumbnails on single post #Mobile', 'page-speed' ),
		'section' => 'single_post_design',
		'type'    => 'checkbox',

	) );



	$wp_customize->add_control( 'post_thumb_position_mobile', array(
		'label'   => __( 'Thumbnail position #mobile', 'page-speed' ),
		'section' => 'single_post_design',
		'type'    => 'select',
		'choices' => array(
			'above_title' => __( 'Above title','page-speed' ),
			'below_title' => __( 'Below title','page-speed' ),
		),
		'active_callback' => function () {
			return get_theme_mod('post_thumb_show_mobile');
		}

	) );



	//@todo use named array for settings

	$wp_customize->add_control(
		new Helium_Customize_Control_Image_Size(
			$wp_customize,
			'post_thumb_mobile',
			array(
				'label'    => esc_html__( 'Single post thumbnail size #Mobile', 'page-speed' ),
				'section'  => 'single_post_design',
				'priority' => 10,
				'type'     => 'text',
				'settings' => array(
					'post_thumb_width_mobile',
					'post_thumb_height_mobile',
					'post_thumb_alignment_mobile',
				),

				'active_callback' => function () {
					return get_theme_mod('post_thumb_show_mobile');
				}
			)
		)
	);

}