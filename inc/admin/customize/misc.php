<?php
add_action( 'customize_register', 'pagespeed_misc_options', 600 );
function pagespeed_misc_options( $wp_customize ) {
	// Add all the required sections
	$wp_customize->add_section( 'misc', array(
		'title'    => __( 'Miscellaneous', 'page-speed' ),
		'panel'    => 'theme_options',
		'priority' => 120,
	) );

	// Show excerpts or full post
	$wp_customize->add_setting( 'read_more_text', array(
		'sanitize_callback' => 'sanitize_text_field',
		'default'           => __( 'Read more', 'page-speed' ),

	) );

	$wp_customize->add_control( 'read_more_text', array(
		'label'       => __( 'Read more button', 'page-speed' ),
		'description' => __( 'Change the text on read more button when using excerpts.', 'page-speed' ),
		'section'     => 'misc',
		'type'        => 'text',

	) );
}