<?php
/**
 * Created by Satish Gandham.
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
		'label'   => __( 'Stick the navigation bar', 'page-speed' ),
		'section' => 'header',
		'type'    => 'checkbox',

	) );
	$wp_customize->add_setting( 'enable_sleek_header', array(
		'sanitize_callback' => 'helium_boolean',
		'default'           => false,
	) );

	$wp_customize->add_control( 'enable_sleek_header', array(
		'label'       => __( 'Enable sleek header', 'page-speed' ),
		'description' => __( 'Sleek header puts the logo in the navigation menu. It\'s recommended to have a logo no taller than 48px when using this option. This option requires a reload to reflect changes.', 'page-speed' ),
		'section'     => 'header',
		'type'        => 'checkbox',

	) );

}
