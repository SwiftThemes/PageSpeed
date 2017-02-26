<?php
/**
 * Created by PhpStorm.
 * User: satish
 * Date: 23/02/17
 * Time: 7:56 PM
 */


add_action( 'customize_register', 'he_remove_panels', 9999 );

function he_remove_panels( $wp_customize ) {
	$wp_customize->remove_panel("colors");
}