<?php
/**
 * Created by Satish Gandham.
 * User: satish
 * Date: 09/02/17
 * Time: 9:44 PM
 */

add_action( 'customize_register', 'pagespeed_customize_header_pro', 1 );
function pagespeed_customize_header_pro( $wp_customize ) {

	$wp_customize->add_setting(
		'show_contact_info_ah',
		array(
			'sanitize_callback' => 'helium_boolean',
			'default'           => false,
		)
	);

	$wp_customize->add_control(
		'show_contact_info_ah',
		array(
			'label'       => __( 'Show contact info above header', 'page-speed' ),
			'description' => __( 'Enable this option to show contact info above the header.', 'page-speed' ),
			'section'     => 'header',
			'type'        => 'checkbox',
		)
	);

	$wp_customize->add_setting(
		'show_social_media_ah',
		array(
			'sanitize_callback' => 'helium_boolean',
			'default'           => false,
		)
	);

	$wp_customize->add_control(
		'show_social_media_ah',
		array(
			'label'       => __( 'Show social media icons above header', 'page-speed' ),
			'description' => __( 'Enable this option to show socail media icons above the header.', 'page-speed' ) . '<hr />',
			'section'     => 'header',
			'type'        => 'checkbox',
		)
	);

	$wp_customize->add_setting(
		'show_search_in_header',
		array(
			'sanitize_callback' => 'helium_boolean',
			'default'           => false,
		)
	);

	$wp_customize->add_control(
		'show_search_in_header',
		array(
			'label'    => __( 'Show search in primary navigation', 'page-speed' ),
			'section'  => 'header',
			'type'     => 'checkbox',
			'priority' => 40,

		)
	);

	$wp_customize->add_setting(
		'show_social_media_link_in_header',
		array(
			'sanitize_callback' => 'helium_boolean',
			'default'           => false,
		)
	);

	$wp_customize->add_control(
		'show_social_media_link_in_header',
		array(
			'label'       => __( 'Show social media profile links in header', 'page-speed' ),
			//@todo add link to the panel.
			'description' => __( 'You can add your links from the social media section.', 'page-speed' ),
			'section'     => 'header',
			'type'        => 'checkbox',
			'priority'    => 40,
		)
	);

}
