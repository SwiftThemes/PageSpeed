<?php
/**
 * Created by PhpStorm.
 * User: satish
 * Date: 12/05/18
 * Time: 4:35 AM
 */

/**
 * Enqueue script for custom customize control.
 */
function pagespeed_js_active_callbacks_customize_enqueue() {
	wp_enqueue_script( 'custom-customize', get_template_directory_uri() . '/inc/admin/customize/assets/js/js-active-callbacks.js', array( 'jquery', 'customize-controls' ), false, true );
}
add_action( 'customize_controls_enqueue_scripts', 'pagespeed_js_active_callbacks_customize_enqueue' );