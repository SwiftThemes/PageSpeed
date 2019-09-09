<?php
/**
 * Created by PhpStorm.
 * User: satish
 * Date: 18/03/18
 * Time: 8:40 AM
 */

add_action( 'admin_init', 'helium_auto_clear_transients' );

/**
 * Clear transients when ever the theme version changes
 * and update the version stored in DB. Updating the theme version
 * automatically triggers stylesheet regeneration.
 */

function helium_auto_clear_transients() {
	$theme = wp_get_theme();

	if ( ! get_theme_mods() ) {
		return; //If theme is not activated return
	}

	if ( $theme->get( 'Version' ) !== get_theme_mod( 'stylesheet_version' ) ) {

		$prefix = wp_get_theme()->stylesheet . '_';
		delete_transient( $prefix . 'sass_file_list' );
		delete_transient( $prefix . 'sass_combined_bf' );
		delete_transient( $prefix . 'sass_combined_af' );

		set_theme_mod( 'stylesheet_version', $theme->get( 'Version' ) );
	}

	if ( $theme->parent() && $theme->parent()->get( 'Version' ) !== get_theme_mod( 'theme_version' ) ) {

		$prefix = wp_get_theme()->stylesheet . '_';
		delete_transient( $prefix . 'sass_file_list' );
		delete_transient( $prefix . 'sass_combined_bf' );
		delete_transient( $prefix . 'sass_combined_af' );

		set_theme_mod( 'theme_version', $theme->parent()->get( 'Version' ) );
	}

}
