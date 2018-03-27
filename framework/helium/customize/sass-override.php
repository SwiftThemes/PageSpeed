<?php
/*
    Copyright 2009-2018  Satish Gandham  (email : hello@satishgandham.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License version 2,
    as published by the Free Software Foundation.

    You may NOT assume that you can use any other version of the GPL.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    The license for this software can likely be found here:
    http://www.gnu.org/licenses/gpl-2.0.html
 */
/**
 * Created by Satish Gandham.
 * User: satish
 * Date: 29/03/17
 * Time: 12:02 AM
 */

add_action( 'customize_register', 'helium_override_sass', 600 );
function helium_override_sass( $wp_customize ) {
	$wp_customize->add_section( 'scss', array(
		'title'    => __( 'Override SCSS variables', 'page-speed' ),
		'priority' => 180,
		'panel'    => 'theme_options'
	) );


	$wp_customize->add_setting( 'enable_scss_override', array(
		'sanitize_callback' => 'helium_boolean',
		'default'           => false,
	) );

	$wp_customize->add_control( 'enable_scss_override', array(
		'label'       => __( 'Enable SCSS override', 'page-speed' ),
		'description' => __( 'Disable this option if you see any styles compilation errors.', 'page-speed' ),
		'section'     => 'scss',
		'type'        => 'checkbox',
	) );


	$wp_customize->add_setting( 'scss_override', array(
		'sanitize_callback' => 'sanitize_textarea_field',
		'default'           => __( "//Here you can override any SCSS variables defined in the theme\n\n", 'page-speed' ) . " \n\n",

	) );

	$wp_customize->add_control( 'scss_override', array(
		'label'   => __( 'Override the SCSS variables', 'page-speed' ),
		'section' => 'scss',
		'type'    => 'textarea',

	) );
}
