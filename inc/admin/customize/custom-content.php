<?php
/**
 * Created by PhpStorm.
 * User: satish
 * Date: 26/02/17
 * Time: 10:47 PM
 */
//@todo move to framework
add_action( 'customize_register', 'nybr_customize_custom_content', 600 );
function nybr_customize_custom_content( $wp_customize ) {
	$wp_customize->add_panel( 'custom_content', array(
		'title'       => __( 'Custom content & Ads', 'nybr' ),
		'description' => '', // Include html tags such as <p>
		'priority'    => 60, // Mixed with top-level-section hierarchy.
	) );


	$wp_customize->add_section( 'home_page_content', array(
		'title'    => __( 'Home page', 'nybr' ),
		'panel'    => 'custom_content',
		'priority' => 30,
	) );

	$wp_customize->add_setting( 'home_between_posts_content_enable', array(
		'default' => flase,
	) );
	$wp_customize->add_setting( 'home_between_posts_content_desktop', array(
		'default' => '',
	) );

	$wp_customize->add_setting( 'home_between_posts_content_mobile', array(
		'default' => '',
	) );

	$wp_customize->add_setting( 'home_between_posts_content_start_after', array(
		'default' => 3,
	) );
	$wp_customize->add_setting( 'home_between_posts_content_repeat_for', array(
		'default' => 3,
	) );
	$wp_customize->add_setting( 'home_between_posts_content_repeat_every', array(
		'default' => 2,
	) );

	$wp_customize->add_control(
		new Helium_Customize_Control_Responsive_Content(
			$wp_customize,
			'home_custom_content',
			array(
				'label'    => esc_html__( 'Home page custom content/ad', 'nybr' ),
				'section'  => 'home_page_content',
				'priority' => 10,
				'type'     => 'text',
				'settings' => array(
					'home_between_posts_content_enable',
					'home_between_posts_content_desktop',
					'home_between_posts_content_mobile',
				),
			)
		)
	);

	$wp_customize->add_control( 'home_between_posts_content_start_after', array(
		'label'   => __( 'Start displaying the above custom content after nth post.', 'nybr' ),
		'section' => 'home_page_content',
		'type'    => 'number',
	) );

	$wp_customize->add_control( 'home_between_posts_content_repeat_for', array(
		'label'   => __( 'Repeat the content for n times.', 'nybr' ),
		'section' => 'home_page_content',
		'type'    => 'number',
	) );
	$wp_customize->add_control( 'home_between_posts_content_repeat_every', array(
		'label'   => __( 'Repeat the content after every n posts.', 'nybr' ),
		'section' => 'home_page_content',
		'type'    => 'number',
	) );


	//Single post


	$wp_customize->add_section( 'post_content', array(
		'title'    => __( 'Single post/page', 'nybr' ),
		'panel'    => 'custom_content',
		'priority' => 30,
	) );

	$wp_customize->add_setting( 'post_below_title_enable', array(
		'default' => flase,
	) );
	$wp_customize->add_setting( 'post_below_title_desktop', array(
		'default' => '',
	) );

	$wp_customize->add_setting( 'post_below_title_mobile', array(
		'default' => '',
	) );


	$wp_customize->add_control(
		new Helium_Customize_Control_Responsive_Content(
			$wp_customize,
			'post_below_title',
			array(
				'label'    => esc_html__( 'Below post title custom content/ad', 'nybr' ),
				'section'  => 'post_content',
				'priority' => 10,
				'type'     => 'text',
				'settings' => array(
					'post_below_title_enable',
					'post_below_title_desktop',
					'post_below_title_mobile',
				),
			)
		)
	);

	// After first paragraph
	$wp_customize->add_setting( 'post_after_first_p_enable', array(
		'default' => flase,
	) );
	$wp_customize->add_setting( 'post_after_first_p_desktop', array(
		'default' => '',
	) );

	$wp_customize->add_setting( 'post_after_first_p_mobile', array(
		'default' => '',
	) );


	$wp_customize->add_control(
		new Helium_Customize_Control_Responsive_Content(
			$wp_customize,
			'post_after_first_p',
			array(
				'label'    => esc_html__( 'After first paragraph custom content/ad', 'nybr' ),
				'section'  => 'post_content',
				'priority' => 10,
				'type'     => 'text',
				'settings' => array(
					'post_after_first_p_enable',
					'post_after_first_p_desktop',
					'post_after_first_p_mobile',
				),
			)
		)
	);

	// After first image
	$wp_customize->add_setting( 'post_after_first_img_enable', array(
		'default' => flase,
	) );
	$wp_customize->add_setting( 'post_after_first_img_desktop', array(
		'default' => '',
	) );

	$wp_customize->add_setting( 'post_after_first_img_mobile', array(
		'default' => '',
	) );


	$wp_customize->add_control(
		new Helium_Customize_Control_Responsive_Content(
			$wp_customize,
			'post_after_first',
			array(
				'label'    => esc_html__( 'After first image custom content/ad', 'nybr' ),
				'section'  => 'post_content',
				'priority' => 10,
				'type'     => 'text',
				'settings' => array(
					'post_after_first_img_enable',
					'post_after_first_img_desktop',
					'post_after_first_img_mobile',
				),
			)
		)
	);


	// Between post content
	$wp_customize->add_setting( 'post_between_content_enable', array(
		'default' => flase,
	) );
	$wp_customize->add_setting( 'post_between_content_desktop', array(
		'default' => '',
	) );

	$wp_customize->add_setting( 'post_between_content_mobile', array(
		'default' => '',
	) );


	$wp_customize->add_control(
		new Helium_Customize_Control_Responsive_Content(
			$wp_customize,
			'post_between_content',
			array(
				'label'    => esc_html__( 'Between post custom content/ad', 'nybr' ),
				'section'  => 'post_content',
				'priority' => 10,
				'type'     => 'text',
				'settings' => array(
					'post_between_content_enable',
					'post_between_content_desktop',
					'post_between_content_mobile',
				),
			)
		)
	);

	// After post content
	$wp_customize->add_setting( 'post_after_content_enable', array(
		'default' => flase,
	) );
	$wp_customize->add_setting( 'post_after_content_desktop', array(
		'default' => '',
	) );

	$wp_customize->add_setting( 'post_after_content_mobile', array(
		'default' => '',
	) );


	$wp_customize->add_control(
		new Helium_Customize_Control_Responsive_Content(
			$wp_customize,
			'after_post',
			array(
				'label'    => esc_html__( 'After post custom content/ad', 'nybr' ),
				'section'  => 'post_content',
				'priority' => 10,
				'type'     => 'text',
				'settings' => array(
					'post_after_content_enable',
					'post_after_content_desktop',
					'post_after_content_mobile',
				),
			)
		)
	);

	
}