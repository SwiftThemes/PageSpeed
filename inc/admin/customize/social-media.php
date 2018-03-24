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
		'priority' => 40,
		'panel'    => 'theme_options'
	) );


	$wp_customize->add_setting( 'facebook', array(
		'sanitize_callback' => 'esc_url',
		'default'           => '',

	) );

	$wp_customize->add_control( 'facebook', array(
		'label'   => __( 'Enter full url to your Facebook Page or Group.', 'page-speed' ),
		'section' => 'social_media',
		'type'    => 'url',

	) );


	$wp_customize->add_setting( 'twitter', array(
		'sanitize_callback' => 'esc_url',
		'default'           => '',

	) );

	$wp_customize->add_control( 'twitter', array(
		'label'   => __( 'Enter full url to your twitter profile.', 'page-speed' ),
		'section' => 'social_media',
		'type'    => 'url',

	) );


	$wp_customize->add_setting( 'youtube', array(
		'sanitize_callback' => 'esc_url',
		'default'           => '',

	) );

	$wp_customize->add_control( 'youtube', array(
		'label'   => __( 'Enter full url to your YouTube chanel.', 'page-speed' ),
		'section' => 'social_media',
		'type'    => 'url',

	) );


	$wp_customize->add_setting( 'instagaram', array(
		'sanitize_callback' => 'esc_url',
		'default'           => '',

	) );

	$wp_customize->add_control( 'instagaram', array(
		'label'   => __( 'Enter full url to your Instagram profile.', 'page-speed' ),
		'section' => 'social_media',
		'type'    => 'url',

	) );


	$wp_customize->add_setting( 'github', array(
		'sanitize_callback' => 'esc_url',
		'default'           => '',

	) );

	$wp_customize->add_control( 'github', array(
		'label'   => __( 'Enter full url to your GitHub profile.', 'page-speed' ),
		'section' => 'social_media',
		'type'    => 'url',

	) );


	$wp_customize->add_setting( 'quora', array(
		'sanitize_callback' => 'esc_url',
		'default'           => '',

	) );

	$wp_customize->add_control( 'Quora', array(
		'label'   => __( 'Enter full url to your Quora profile.', 'page-speed' ),
		'section' => 'social_media',
		'type'    => 'url',

	) );

	$wp_customize->add_setting( 'linkedin', array(
		'sanitize_callback' => 'esc_url',
		'default'           => '',

	) );

	$wp_customize->add_control( 'Linkedin', array(
		'label'   => __( 'Enter full url to your Linkedin profile.', 'page-speed' ),
		'section' => 'social_media',
		'type'    => 'url',

	) );


}
