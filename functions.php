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


add_theme_support( 'woocommerce' );



// Launch the Hybrid Core framework.
require_once( trailingslashit( HYBRID_DIR ) . 'hybrid.php' );
new Hybrid();

// Launch the Helium framework.
require_once( trailingslashit( HELIUM_DIR ) . 'helium.php' );
$helium = new Helium();
global $helium;
// Launch PageSpeed
require_once( trailingslashit( get_template_directory() ) . 'inc/page-speed-class.php' );
require_once( HELIUM_DIR . 'utility-functions.php' );
new PageSpeed();



function butter_bean_load() {

	require_once( trailingslashit( get_template_directory() ) . 'framework/butterbean/butterbean.php' );
}
add_action( 'plugins_loaded', 'butter_bean_load' );


add_theme_support( 'customize-selective-refresh-widgets' );




function pagespeed_layouts_folder() {
	$layout_folders[] = get_template_directory() . '/so-layouts';
	return $layout_folders;

}
add_filter( 'siteorigin_panels_local_layouts_directories', 'pagespeed_layouts_folder' );
