<?php
/**
 * Created by PhpStorm.
 * User: satish
 * Date: 29/03/17
 * Time: 12:02 AM
 */

add_action( 'customize_register', 'helium_override_sass', 600 );
function helium_override_sass( $wp_customize ) {


	$wp_customize->add_section( 'scss', array(
		'title'    => __( 'Override SCSS variables', 'page-speed' ),
		'priority' => 80,
	) );



	// Show excerpts or full post
	$wp_customize->add_setting( 'scss_override', array(
		'sanitize_callback' => 'sanitize_text_field',
		'default' => '//Here you can override any SCSS variables defined in the theme '."\n\n",

	) );

	$wp_customize->add_control( 'scss_override', array(
		'label'   => 'Override the SCSS variables',
		'section' => 'scss',
		'type'    => 'textarea',

	) );



}
