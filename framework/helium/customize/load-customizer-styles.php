<?php
/**
 * Created by Satish Gandham.
 * User: satish
 * Date: 25/01/17
 * Time: 12:43 AM
 */


/**
 * Enqueue the stylesheet.
 */
function pagespeed_enqueue_customizer_stylesheet() {
    wp_register_style( 'helium-customizer-css', HELIUM_ADMIN_ASSETS_URI . 'css/customizer.css', NULL, NULL, 'all' );
    wp_enqueue_style( 'helium-customizer-css' );

}
add_action( 'customize_controls_print_styles', 'pagespeed_enqueue_customizer_stylesheet' );
