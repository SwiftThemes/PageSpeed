<?php
/**
 * Created by PhpStorm.
 * User: satish
 * Date: 11/02/18
 * Time: 4:19 PM
 */

require_once 'functions-styles.php';
require_once 'admin-render-theme-options.php';
require_once( 'helium-tools.php' );

if ( is_admin() ) {
	require_once 'disable-updates.php';
	require_once 'admin-ajax-functions.php';

	require 'theme-update-checker.php';

	$theme_slug           = get_option( 'stylesheet' );
	$MyThemeUpdateChecker = new ThemeUpdateChecker(
		$theme_slug, //Theme slug. Usually the same as the name of its directory.
		'https://updates.swiftthemes.com/?action=get_metadata&slug=' . $theme_slug //Metadata URL.
	);


}


define( 'HELIUM_PRO', true );
define( 'HELIUM_ACTIVATION_URL', 'https://members.swiftthemes.com/softsale/api' );
