<?php
/**
 * Functions for handling styles in the theme.
 *
 * @package    PageSpeed
 * @subpackage Includes
 * @author     Satish Gandham <hello@satishgandham.com>
 * @copyright  Copyright (c) 2008 - 2017, Satish Gandham
 * @link       https://swiftthemes.com/helium
 * @license
 */

add_action('wp_enqueue_scripts', 'pagespeed_register_scripts', 8);
add_action('wp_enqueue_scripts', 'pagespeed_enqueue_scripts', 9);

function pagespeed_register_scripts(){
    wp_register_script('pagespeed-sticky', HELIUM_THEME_JS_URI . 'vendor/sticky.min.js', array('jquery'));

    wp_register_script('pagespeed-is-visible', HELIUM_THEME_JS_URI . 'vendor/is-visible.min.js', array('jquery'));

    wp_register_script('pagespeed-custom-js', HELIUM_THEME_JS_URI . 'custom/desktop.min.js', array(
        'jquery',
        'jquery-masonry',
    ));

    wp_register_script('pagespeed-lazy-load', HELIUM_THEME_JS_URI . 'custom/lazy-load.min.js', array(
        'jquery',
        'pagespeed-custom-js',
    ));
}

function pagespeed_enqueue_scripts(){
    wp_enqueue_script('jquery');

    if (get_theme_mod('use_masonry', false) || is_customize_preview()) {
        wp_enqueue_script('jquery-masonry');
    }
    if (get_theme_mod('enable_sticky_sidebars', true) || get_theme_mod('is_sticky_nav', true)) {
        wp_enqueue_script('pagespeed-sticky');
    }
    if (get_theme_mod('lazy_load_images', false)) {
        wp_enqueue_script('pagespeed-is-visible');
        wp_enqueue_script('pagespeed-lazy-load');
    }
    wp_enqueue_script('pagespeed-custom-js');
}
