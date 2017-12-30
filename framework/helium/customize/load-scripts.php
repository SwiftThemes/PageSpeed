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