<?php

/**
 * Loads all theme functionality and required files
 */
class PageSpeed {
	/**
	 * Constructor method for the PageSpeed class.  This method adds other methods of the
	 * class to specific hooks within WordPress.  It controls the load order of the
	 * required files for running the theme.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function __construct() {

		// Set up an empty object to work with.

		// Set up the load order.
		add_action( 'after_setup_theme', array( $this, 'constants' ), - 85 );
		add_action( 'after_setup_theme', array( $this, 'admin' ), - 80 );
		add_action( 'after_setup_theme', array( $this, 'core' ), - 70 );

	}

	/**
	 *
	 */
	public function constants() {
		define( 'THEME_ADMIN', trailingslashit( THEME_INC . 'admin' ) );
		define( 'THEME_CUSTOMIZE', trailingslashit( THEME_ADMIN . 'customize' ) );
	}

	/**
	 * Load the theme core
	 */
	public function core() {
		require_once( THEME_INC . 'functions-styles.php' );
		require_once( THEME_INC . 'functions-scripts.php' );
		require_once( THEME_INC . 'functions-register-sidebars.php' );

		require_once( THEME_INC . 'functions-register-nav-menus.php' );
		require_once( THEME_INC . 'functions-hooking-to-wp-hooks.php' );
		require_once( THEME_INC . 'functions-display.php' );
		require_once( THEME_INC . 'functions-header.php' );
		require_once( THEME_INC . 'functions-eaa-filters.php' );


		require_once( THEME_CUSTOMIZE . 'customizer.php' );
		require_once( THEME_CUSTOMIZE . 'home-page.php' );
		require_once( THEME_CUSTOMIZE . 'archives.php' );
		require_once( THEME_CUSTOMIZE . 'footer.php' );
		require_once( THEME_CUSTOMIZE . 'post.php' );
//		require_once( THEME_CUSTOMIZE . 'custom-content.php' );


		add_theme_support( 'breadcrumb-trail' );

	}


	/**
	 * Load admin files for the theme.
	 *
	 * @since  0.7.0
	 * @access public
	 * @return void
	 */
	public function admin() {

		if ( is_admin() ) {
			require_once( THEME_INC . 'admin/admin.php' );
		}
	}
}