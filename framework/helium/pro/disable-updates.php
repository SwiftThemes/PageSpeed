<?php
/**
 * Created by PhpStorm.
 * User: satish
 * Date: 15/02/18
 * Time: 5:18 PM
 */

/**
 * Ensure that a specific theme is never updated. This works by removing the
 * theme from the list of available updates.
 */

add_filter( 'site_transient_update_themes', 'helium_disable_theme_update');


function helium_disable_theme_update( $themes ) {
	unset( $themes->response[ 'page-speed' ] );
	return $themes;
}