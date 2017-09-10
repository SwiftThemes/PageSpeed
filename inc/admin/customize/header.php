<?php
/**
 * Created by PhpStorm.
 * User: satish
 * Date: 09/02/17
 * Time: 9:44 PM
 */

add_action( 'customize_register', 'pagespeed_customize_header', 4 );
function pagespeed_customize_header( $wp_customize ) {

	$wp_customize->add_section( 'header', array(
		'title'    => __( 'Header', 'page-speed' ),
		'priority' => 22,
	) );

	$wp_customize->add_setting( 'is_sticky_nav', array(
		'sanitize_callback' => 'helium_boolean',
		'default'           => true,
	) );

	$wp_customize->add_control( 'is_sticky_nav', array(
		'label'   => 'Stick the navigation bar',
		'section' => 'header',
		'type'    => 'checkbox',

	) );

}
