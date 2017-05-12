<?php
/**
 * Created by PhpStorm.
 * User: satish
 * Date: 09/02/17
 * Time: 9:44 PM
 */

add_action( 'customize_register', 'pagespeed_customize_footer', 600 );
function pagespeed_customize_footer( $wp_customize ) {

	$wp_customize->add_section( 'footer', array(
		'title'    => __( 'Footer', 'page-speed' ),
		'priority' => 80,
	) );


	// Show excerpts or full post
	$wp_customize->add_setting( 'copyright_text', array(
		'sanitize_callback' => 'helium_meta',
		'default'           => 'Copyright &copy; ' . date( "Y" ) . ' ' . '<a href="' . esc_url( home_url() ) . '"
						                          rel="home">' . get_bloginfo( "name" ) . '</a>',

	) );

	$wp_customize->add_control( 'copyright_text', array(
		'label'   => 'Copyright text',
		'section' => 'footer',
		'type'    => 'textarea',

	) );


}
