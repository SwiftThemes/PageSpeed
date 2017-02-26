<?php
/**
 * Created by PhpStorm.
 * User: satish
 * Date: 25/01/17
 * Time: 12:43 AM
 */


/**
 * Enqueue the stylesheet.
 */
function nybr_enqueue_customizer_stylesheet() {
    wp_register_style( 'my-customizer-css', THEME_URI . 'assets/css/customizer.css', NULL, NULL, 'all' );
    wp_enqueue_style( 'my-customizer-css' );

}
add_action( 'customize_controls_print_styles', 'nybr_enqueue_customizer_stylesheet' );

?>