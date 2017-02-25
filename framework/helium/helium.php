<?php
/**
 * Helium – A WordPress theme framework that loads the Hybrid Core framework and the Helium specific code.
 *
 * @package     Helium
 * @Version     1.0.0
 * @author      Satish Gandham <hello@satishgandham.com>
 * @copyright   Copyright (c) 2008 - 2017, Satish Gandham
 * @link        https://swiftthemes.com/helium
 * @license
 */

if ( ! class_exists( 'Helium' ) ) {

	/**
	 * The Helium class launches the helium and hybrid frameworks.
	 */
	class Helium {

		/**
		 * Constructor method for the Helum class.  This method adds other methods of the
		 * class to specific hooks within WordPress.  It controls the load order of the
		 * required files for running the framework.
		 *
		 * @since  1.0.0
		 * @access public
		 * @return void
		 */

		public function __construct() {

			add_action( 'after_setup_theme', array( $this, 'constants' ), - 90 );
			add_action( 'after_setup_theme', array( $this, 'core' ), - 90 );

			add_action( 'after_setup_theme', array( $this, 'add_theme_support' ), 11 );
			add_action( 'after_setup_theme', array( $this, 'admin' ), 95 );

		}

		/**
		 * Defines the constant paths for use within the core framework, parent theme, and
		 * child theme.
		 *
		 * @since  1.0.0
		 * @access public
		 * @return void
		 */
		public function constants() {
			define( 'HELIUM_VERSION', '1.0.0' );
			define( 'THEME_DIR', trailingslashit( get_template_directory() ) );
			define( 'THEME_CORE', trailingslashit( THEME_DIR . 'core' ) );
			define( 'THEME_INC', trailingslashit( THEME_DIR . 'inc' ) );
			define( 'CUSTOMIZE', trailingslashit( THEME_INC . 'customize' ) );

			// Admin paths
			define( 'ADMIN_IMAGES_URI', trailingslashit( THEME_URI . '/assets/images/customize' ) );

			define( 'THEME_ASSETS', trailingslashit( THEME_DIR . 'assets' ) );
			define( 'THEME_ASSETS_URI', trailingslashit( THEME_URI . 'assets' ) );
			define( 'THEME_CSS_URI', trailingslashit( THEME_ASSETS_URI . 'css' ) );
			define( 'THEME_JS_URI', trailingslashit( THEME_ASSETS_URI . 'js' ) );
			define( 'CHILD_THEME_URI', trailingslashit( get_stylesheet_directory_uri() ) );
		}

		/**
		 * Load the helium framework core
		 */
		public function core() {
			require_once( HELIUM_DIR . 'shortcodes.php' );
			require_once( HELIUM_DIR . 'customizer.php' );
			require_once( HELIUM_DIR . 'change-wp-defaults.php' );
			require_once( HELIUM_DIR . 'dynamic-thumbnails.php' );
			require_once( HELIUM_DIR . 'utility-functions.php' );

			require_once( HELIUM_DIR . 'customize/control-image-dimensions.php' );
			require_once( HELIUM_DIR . 'customize/remove-default-panels.php' );

			require_once( HELIUM_ADMIN . 'write-stylesheet.php' );
		}


		/**
		 * Registers support for WordPress and Hybrid core features
		 *
		 * @todo Should see if we should let themes decide which features to support
		 *
		 * @since 1.0.0
		 * @access public
		 * @return void
		 */
		public function add_theme_support() {

			add_theme_support( 'hybrid-core-template-hierarchy' );
			//add_theme_support( 'theme-layouts', array( 'default' => '2c-l' ) );

			add_theme_support( 'post-thumbnails' );
//			add_theme_support( 'custom-background' );
//			add_theme_support( 'custom-header' );
			add_theme_support( 'custom-logo' );
			add_theme_support( 'automatic-feed-links' );
			add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );
			add_theme_support( 'title-tag' ); //not sure
			add_theme_support( 'customize-selective-refresh-widgets' );
		}

		/**
		 * Load admin files for the framework.
		 *
		 * @since  0.7.0
		 * @access public
		 * @return void
		 */
		public function admin() {

			if ( is_admin() ) {
				require_once( HELIUM_ADMIN . 'admin.php' );
			}
		}
	}

}