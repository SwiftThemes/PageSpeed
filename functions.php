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
 * Date: 23/01/17
 * Time: 5:53 PM
 */

define( 'HELIUM_THEME_URI', trailingslashit( get_template_directory_uri() ) );

define( 'HELIUM_THEME_FRAMEWORK', trailingslashit( get_template_directory() ) . 'framework/' );

define( 'HYBRID_DIR', trailingslashit( HELIUM_THEME_FRAMEWORK ) . 'hybrid/' );
define( 'HYBRID_URI', trailingslashit( HELIUM_THEME_URI . 'framework/hybrid' ) );

define( 'HELIUM_DIR', trailingslashit( HELIUM_THEME_FRAMEWORK . 'helium' ) );
define( 'HELIUM_ADMIN', trailingslashit( HELIUM_DIR ) . 'admin/' );
define( 'HELIUM_URI', trailingslashit( HELIUM_THEME_URI . 'framework/helium' ) );

// Launch the Hybrid Core framework.
require_once( trailingslashit( HYBRID_DIR ) . 'hybrid.php' );
new Hybrid();

// Launch the Helium framework.
require_once( trailingslashit( HELIUM_DIR ) . 'helium.php' );
$he = new Helium();
global $he;
// Launch PageSpeed
require_once( trailingslashit( get_template_directory() ) . 'inc/page-speed-class.php' );
new PageSpeed();


add_action( 'wp_head', 'pagespeed_put_css_in_head', 9 );

function pagespeed_put_css_in_head() {
	if ( ! is_customize_preview() ) {
		return;
	}
	$style_generator = new Helium_Styles( HELIUM_THEME_ASSETS . 'css/src/' );
	echo '<style>' . $style_generator->generate_css( 'af' ) . '</style>';
	echo '<style>' . $style_generator->generate_css( 'bf' ) . '</style>';
}


/**
 * Replace the_excerpt "more" text with a link
 * @todo Move to a better place.
 */

function ld_new_excerpt_more( $more ) {
	global $post;

	return '<p class="more-link">
<a class=" he-btn" href="' . get_permalink( $post->ID ) . '">Read more <span class="icon">&rarr;</span></a>
</p>';
}

add_filter( 'excerpt_more', 'ld_new_excerpt_more' );