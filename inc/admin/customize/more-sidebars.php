<?php
/**
 * Created by PhpStorm.
 * User: satish
 * Date: 01/01/18
 * Time: 6:07 PM
 */

add_action( 'customize_register', 'pagespeed_customize_sidebars', 19000 );
function pagespeed_customize_sidebars( $wp_customize ) {
	$wp_customize->add_section( 'sidebars', array(
		'title'       => __( 'More sidebars', 'page-speed' ),
		'panel'       => 'Widgets',
		'description' => '',
		'priority'    => 9600,
	) );



}