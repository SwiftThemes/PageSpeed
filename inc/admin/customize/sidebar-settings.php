<?php
/**
 * Created by Satish Gandham.
 * User: satish
 * Date: 09/02/17
 * Time: 9:44 PM
 */

add_action( 'customize_register', 'pagespeed_more_sidebars', 4 );
function pagespeed_more_sidebars( $wp_customize ) {

	$wp_customize->add_section( 'sidebar_settings', array(
		'title'    => __( 'Sidebar Settings', 'page-speed' ),
		'priority' => 29,
	) );


	$wp_customize->add_setting( 'example-control_', array('sanitize_callback' => 'helium_pass',) );

	$wp_customize->add_control( new He_Help_Text( $wp_customize, 'example-control_', array(
		'section'  => 'sidebar_settings',
		'priority' => 5,
		'label'    => __( ' ', 'page-speed' ),
		'content'  => __( 'Note: Reload the page if you make changes to the below 3 settings. Else the new sidebars won\'t appear in widgets panel', 'page-speed' ) . '</p>',
//		'description' => __( 'Optional: Example Description.', 'page-speed' ),
	) ) );


	$wp_customize->add_setting( 'dedicated_sidebars_on_home', array(
		'sanitize_callback' => 'helium_boolean',
		'default'           => false,
	) );

	$wp_customize->add_control( 'dedicated_sidebars_on_home', array(
		'label'       => __( 'Dedicated sidebars for home page', 'page-speed' ),
		'description' => __( 'Create separate sidebars for home page.', 'page-speed' ),
		'section'     => 'sidebar_settings',
		'type'        => 'checkbox',
		'priority'    => 30,
	) );
	$wp_customize->add_setting( 'dedicated_sidebars_on_default_page_template', array(
		'sanitize_callback' => 'helium_boolean',
		'default'           => false,
	) );

	$wp_customize->add_control( 'dedicated_sidebars_on_default_page_template', array(
		'label'       => __( 'Dedicated sidebars for default page template', 'page-speed' ),
		'description' => __( ' Create separate sidebars for home page.', 'page-speed' ),
		'section'     => 'sidebar_settings',
		'type'        => 'checkbox',
		'priority'    => 30,
	) );

	$wp_customize->add_setting( 'enable_sticky_sidebars', array(
		'sanitize_callback' => 'helium_boolean',
		'default'           => false,
	) );

	$wp_customize->add_control( 'enable_sticky_sidebars', array(
		'label'       => __( 'Create sticky sidebars', 'page-speed' ),
		'description' => __( 'Sticky sidebars or floating sidebars are sidebars that stick/float on the screen when the user is scrolling the page.', 'page-speed' ),
		'section'     => 'sidebar_settings',
		'type'        => 'checkbox',
		'priority'    => 30,
	) );

}
