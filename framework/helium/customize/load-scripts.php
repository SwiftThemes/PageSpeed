<?php
/**
 * Created by PhpStorm.
 * User: satish
 * Date: 18/09/17
 * Time: 8:49 PM
 */

add_action( 'customize_controls_print_footer_scripts', 'helium_customizer_scripts' );

//Notes
//add_action( 'customize_controls_enqueue_scripts', 'theme_customize_style' );

function helium_customizer_scripts(){
	wp_enqueue_script( 'wp-util' );
	wp_enqueue_script( 'jquery-ui-autocomplete' ,array('jquery'));
	wp_enqueue_script('customizer-scripts', HELIUM_ADMIN_ASSETS_URI . 'js/customizer.js',array('jquery-ui-autocomplete'));

}