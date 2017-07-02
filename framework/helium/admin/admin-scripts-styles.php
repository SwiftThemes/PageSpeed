<?php
/**
 * Created by PhpStorm.
 * User: satish
 * Date: 13/03/17
 * Time: 6:20 PM
 */

add_action( 'admin_enqueue_scripts', 'helium_admin_scripts' );

function helium_admin_scripts($hook) {
//	var_dump($hook);
//	if ( 'appearance_page_helium-help' != $hook ) {
//		return;
//	}

	wp_enqueue_script( 'helium-admin-scripts', HELIUM_ADMIN_ASSETS_URI . 'js/scripts.js' );
}