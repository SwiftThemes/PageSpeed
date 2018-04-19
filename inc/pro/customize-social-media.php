<?php
/**
 * Created by Satish Gandham.
 * User: satish
 * Date: 09/02/17
 * Time: 9:44 PM
 */

add_action( 'customize_register', 'pagespeed_customize_social_media', 600 );
function pagespeed_customize_social_media( $wp_customize ) {

	$wp_customize->add_section( 'social_media', array(
		'title'    => __( 'Social Media', 'page-speed' ),
		'priority' => 90,
		'panel'    => 'theme_options'
	) );


	$wp_customize->add_setting( 'social_media_order_nav', array(
		'sanitize_callback' => 'helium_pass',
		'default'           => array(),
	) );


	$wp_customize->add_control(
		new Helium_Customize_Control_Drag_Sort(
			$wp_customize,
			'social_media_order_nav',
			array(
				'label'     => esc_html__( 'Drag and sort the social media profiles you want to appear in the header.', 'page-speed' ),
				'section'   => 'social_media',
				'type'      => 'he_drag_sort',
				'sortables' => array(
					array( 'key' => 'facebook', 'value' => 'Facebook' ),
					array( 'key' => 'twitter', 'value' => 'Twitter' ),
					array( 'key' => 'youtube', 'value' => 'YouTube' ),
					array( 'key' => 'google-plus', 'value' => 'Google Plus' ),
					array( 'key' => 'instagram', 'value' => 'Instagram' ),
					array( 'key' => 'whatsapp', 'value' => 'WhatsApp' ),
					array( 'key' => 'dribbble', 'value' => 'Dribbble' ),
					array( 'key' => 'goodreads', 'value' => 'Good Reads' ),
					array( 'key' => 'linkedin', 'value' => 'LinkedIn' ),
					array( 'key' => 'stack-overflow', 'value' => 'Stack Overflow' ),
					array( 'key' => 'reddit', 'value' => 'Reddit' ),
					array( 'key' => 'github', 'value' => 'Github' ),
					array( 'key' => 'quora', 'value' => 'Quora' ),
					array( 'key' => 'telephone', 'value' => 'Telephone' ),
				)
			)
		)
	);


	$wp_customize->add_setting( 'social_media_personal_or_business', array(
		'sanitize_callback' => 'sanitize_text_field',
		'default'           => 'Person',
	) );

	$wp_customize->add_control(
		'social_media_personal_or_business',
		array(
			'label'   => __( 'Are the social media link below belong to a person or organization?', 'mytheme' ),
			'section' => 'social_media',
			'type'    => 'select',
			'choices' => array(
				'Person'     => 'Person',
				'Organization' => 'Business/Organization',
			),
		)
	);

	$wp_customize->add_setting( 'social_media_monochrome', array(
		'sanitize_callback' => 'helium_boolean',
		'default'           => false,

	) );

	$wp_customize->add_control( 'social_media_monochrome', array(
		'label'       => 'Use monchrome icons',
		'section'     => 'social_media',
		'type'        => 'checkbox',
	) );

	$wp_customize->add_setting( 'webiste_url', array(
		'sanitize_callback' => 'esc_url',
		'default'           => '',

	) );

	$wp_customize->add_control( 'webiste_url', array(
		'label'       => 'Website url',
		'description' => __( 'If your blog is separate from main website, enter your main website url here.', 'page-speed' ),
		'section'     => 'social_media',
		'type'        => 'url',
		'transport'   => 'postMessage'
	) );


	$wp_customize->add_setting( 'facebook', array(
		'sanitize_callback' => 'esc_url',
		'default'           => '',

	) );

	$wp_customize->add_control( 'facebook', array(
		'label'           => 'Facebook',
		'description'     => __( 'Enter full url to your Facebook Page or Group.', 'page-speed' ),
		'section'         => 'social_media',
		'type'            => 'url',
		'active_callback' => function () {
			return ( array_search( 'facebook', get_theme_mod( 'social_media_order_nav', array() ) ) !== false );
		},
	) );


	$wp_customize->add_setting( 'twitter', array(
		'sanitize_callback' => 'esc_url',
		'default'           => '',

	) );

	$wp_customize->add_control( 'twitter', array(
		'label'           => 'Twitter',
		'description'     => __( 'Enter full url to your twitter profile.', 'page-speed' ),
		'section'         => 'social_media',
		'type'            => 'url',
		'active_callback' => function () {
			return ( array_search( 'twitter', get_theme_mod( 'social_media_order_nav', array() ) ) !== false );
		},
	) );


	$wp_customize->add_setting( 'youtube', array(
		'sanitize_callback' => 'esc_url',
		'default'           => '',

	) );

	$wp_customize->add_control( 'youtube', array(
		'label'           => 'YouTube',
		'description'     => __( 'Enter full url to your YouTube chanel.', 'page-speed' ),
		'section'         => 'social_media',
		'type'            => 'url',
		'active_callback' => function () {
			return ( array_search( 'youtube', get_theme_mod( 'social_media_order_nav', array() ) ) !== false );
		},
	) );


	$wp_customize->add_setting( 'instagram', array(
		'sanitize_callback' => 'esc_url',
		'default'           => '',

	) );

	$wp_customize->add_control( 'instagram', array(
		'label'           => 'Instagram',
		'description'     => __( 'Enter full url to your Instagram profile.', 'page-speed' ),
		'section'         => 'social_media',
		'type'            => 'url',
		'active_callback' => function () {
			return ( array_search( 'instagram', get_theme_mod( 'social_media_order_nav', array() ) ) !== false );
		},
	) );


	$wp_customize->add_setting( 'github', array(
		'sanitize_callback' => 'esc_url',
		'default'           => '',

	) );

	$wp_customize->add_control( 'github', array(
		'label'           => 'Github',
		'description'     => __( 'Enter full url to your GitHub profile.', 'page-speed' ),
		'section'         => 'social_media',
		'type'            => 'url',
		'active_callback' => function () {
			return ( array_search( 'github', get_theme_mod( 'social_media_order_nav', array() ) ) !== false );
		},
	) );


	$wp_customize->add_setting( 'quora', array(
		'sanitize_callback' => 'esc_url',
		'default'           => '',

	) );

	$wp_customize->add_control( 'quora', array(
		'label'           => 'Quora',
		'description'     => __( 'Enter full url to your Quora profile.', 'page-speed' ),
		'section'         => 'social_media',
		'type'            => 'url',
		'active_callback' => function () {
			return ( array_search( 'quora', get_theme_mod( 'social_media_order_nav', array() ) ) !== false );
		},
	) );

	$wp_customize->add_setting( 'linkedin', array(
		'sanitize_callback' => 'esc_url',
		'default'           => '',

	) );

	$wp_customize->add_control( 'linkedin', array(
		'label'           => 'Linkedin',
		'description'     => __( 'Enter full url to your Linkedin profile.', 'page-speed' ),
		'section'         => 'social_media',
		'type'            => 'url',
		'active_callback' => function () {
			return ( array_search( 'linkedin', get_theme_mod( 'social_media_order_nav', array() ) ) !== false );
		},
	) );

	$wp_customize->add_setting( 'google-plus', array(
		'sanitize_callback' => 'esc_url',
		'default'           => '',

	) );

	$wp_customize->add_control( 'google-plus', array(
		'label'           => 'Google Plus',
		'description'     => __( 'Enter full url to your Google Plus profile.', 'page-speed' ),
		'section'         => 'social_media',
		'type'            => 'url',
		'active_callback' => function () {
			return ( array_search( 'google-plus', get_theme_mod( 'social_media_order_nav', array() ) ) !== false );
		},
	) );

	$wp_customize->add_setting( 'whatsapp', array(
		'sanitize_callback' => 'esc_url',
		'default'           => '',

	) );

	$wp_customize->add_control( 'whatsapp', array(
		'label'           => 'WhatsApp',
		'description'     => __( 'Enter url to join your WhatsApp group.', 'page-speed' ),
		'section'         => 'social_media',
		'type'            => 'url',
		'active_callback' => function () {
			return ( array_search( 'whatsapp', get_theme_mod( 'social_media_order_nav', array() ) ) !== false );
		},
	) );


	$wp_customize->add_setting( 'dribbble', array(
		'sanitize_callback' => 'esc_url',
		'default'           => '',

	) );

	$wp_customize->add_control( 'dribbble', array(
		'label'           => 'Dribbble',
		'description'     => __( 'Enter full url to your Dribbble profile.', 'page-speed' ),
		'section'         => 'social_media',
		'type'            => 'url',
		'active_callback' => function () {
			return ( array_search( 'dribbble', get_theme_mod( 'social_media_order_nav', array() ) ) !== false );
		},
	) );


	$wp_customize->add_setting( 'goodreads', array(
		'sanitize_callback' => 'esc_url',
		'default'           => '',

	) );

	$wp_customize->add_control( 'goodreads', array(
		'label'           => 'Good Reads',
		'description'     => __( 'Enter full url to your Good Reads profile.', 'page-speed' ),
		'section'         => 'social_media',
		'type'            => 'url',
		'active_callback' => function () {
			return ( array_search( 'goodreads', get_theme_mod( 'social_media_order_nav', array() ) ) !== false );
		},
	) );


	$wp_customize->add_setting( 'stack-overflow', array(
		'sanitize_callback' => 'esc_url',
		'default'           => '',

	) );

	$wp_customize->add_control( 'stack-overflow', array(
		'label'           => 'StackOverflow',
		'description'     => __( 'Enter full url to your StackOverflow profile.', 'page-speed' ),
		'section'         => 'social_media',
		'type'            => 'url',
		'active_callback' => function () {
			return ( array_search( 'stack-overflow', get_theme_mod( 'social_media_order_nav', array() ) ) !== false );
		},
	) );


	$wp_customize->add_setting( 'reddit', array(
		'sanitize_callback' => 'esc_url',
		'default'           => '',

	) );

	$wp_customize->add_control( 'reddit', array(
		'label'           => 'Reddit',
		'description'     => __( 'Enter full url to your Reddit forum/profile.', 'page-speed' ),
		'section'         => 'social_media',
		'type'            => 'url',
		'active_callback' => function () {
			return ( array_search( 'reddit', get_theme_mod( 'social_media_order_nav', array() ) ) !== false );
		},
	) );

	$wp_customize->add_setting( 'telephone', array(
		'sanitize_callback' => 'sanitize_text_field',
		'default'           => '',

	) );

	$wp_customize->add_control( 'telephone', array(
		'label'           => 'telephone',
		'description'     => __( 'Enter your business phone number.', 'page-speed' ),
		'section'         => 'social_media',
		'type'            => 'url',
		'active_callback' => function () {
			return ( array_search( 'telephone', get_theme_mod( 'social_media_order_nav', array() ) ) !== false );
		},
	) );


}
