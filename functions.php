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
$helium = new Helium();
global $helium;
// Launch PageSpeed
require_once( trailingslashit( get_template_directory() ) . 'inc/page-speed-class.php' );
new PageSpeed();


add_action( 'pagespeed_before_header', 'pagespeed_show_errors' );

function pagespeed_show_errors() {
	if ( ! is_customize_preview() ) {
		return;
	}
	$prefix = wp_get_theme()->stylesheet . '_';
	$error  = get_transient( $prefix . 'sass_error' );
	if ( $error ) {


		echo '<div style="background: #f79ea8;color:#fff;padding:16px;font-size: 14px;font-family: Sans-serif">
<h3>Oh Snap!!</h3>
We are sorry, Something went wrong while compiling the styles. 
If you recognize the variables in the error below, toggle/change them to see if it fixes the problem.
Else, contact support with the below error message. 
<br />
<code>' . $error . '</code>
<br />
<strong>Note</strong>: Most of the times the error is due to wrong input in SCSS override setting. Disabling it might help</div>';

	}
}

add_action( 'wp_head', 'pagespeed_put_css_in_head', 9 );

function pagespeed_put_css_in_head() {
	if ( ! is_customize_preview() ) {
		return;
	}

	require_once( ABSPATH . 'wp-admin/includes/file.php' );

	$style_generator = new Helium_Styles( HELIUM_THEME_ASSETS . 'css/src/' );

	$misc_css = "
#selective_refresh_loader{width:100%;height:100%;background:rgba(0,0,0,.5);
  position:fixed;
  top:0;
  right:0;
  z-index:9999;
  
  display:none;
 

}
#selective_refresh_loader p{
 
    background: #FFF;  
  
font-family:sans-serif;
  -webkit-background-clip: text;
  font-size:32px;
  line-height:1em;
  font-weight:900;
    color: transparent;

  height: 0;
  padding:64px;
    position: absolute;
    top: 0;
    bottom: 0;
    margin: auto;
    left: 0;
    right: 0;
    text-align: center;
    letter-spacing:-1px;
		animation: blink 3s linear infinite;
	}
@keyframes blink{
0%{opacity: 0;}
20%{opacity: .5;}
50%{opacity: 1;}
80%{opacity: .2;}
100%{opacity: .1;}
}
";
	echo '<style id="page-speed-inline-styles">' . $style_generator->generate_css( 'af' ) . $style_generator->generate_css( 'bf' ) . ' ' . $misc_css . '</style>';
}

add_action( 'wp_footer', 'pagespeed_put_selective_refresh_loader', 9 );

function pagespeed_put_selective_refresh_loader() {
	if ( ! is_customize_preview() ) {
		return;
	}
	echo '<div id="selective_refresh_loader"><p data-shadow="' . __( 'Reloading Stylesheet', 'page-speed' ) . '">' . __( 'Reloading Stylesheet', 'page-speed' ) . '</p></div>';
}

function pagespeed_get_css() {
	require_once( ABSPATH . 'wp-admin/includes/file.php' );
	$style_generator = new Helium_Styles( HELIUM_THEME_ASSETS . 'css/src/' );

	return $style_generator->generate_css( 'af' ) . $style_generator->generate_css( 'bf' );
}


/**
 * Replace the_excerpt "more" text with a link
 * @todo Move to a better place.
 */

function pagespeed_new_excerpt_more( $more ) {
	if ( is_admin() ) {
		return $more;
	}

	return '<p class="more-link">
<a class=" he-btn" href="' . esc_url( get_permalink( get_the_ID() ) ) . '">' . __( 'Read more', 'page-speed' ) . ' <span class="icon">&rarr;</span></a>
</p>';
}

add_filter( 'excerpt_more', 'pagespeed_new_excerpt_more' );


add_theme_support( 'customize-selective-refresh-widgets' );