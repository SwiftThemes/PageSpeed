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

		public $mobile_detect;

		private $post_meta;

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

			add_action( 'after_setup_theme', array( $this, 'constants' ), - 95 );
			add_action( 'after_setup_theme', array( $this, 'core' ), - 90 );
			add_action( 'after_setup_theme', array( $this, 'add_theme_support' ), 11 );
			add_action( 'after_setup_theme', array( $this, 'admin' ), 95 );
			add_action( 'after_setup_theme', array( $this, 'load_mobile_detect' ), 95 );


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
			define( 'HELIUM_THEME_DIR', trailingslashit( get_template_directory() ) );
			define( 'HELIUM_THEME_CORE', trailingslashit( HELIUM_THEME_DIR . 'core' ) );
			define( 'HELIUM_THEME_INC', trailingslashit( HELIUM_THEME_DIR . 'inc' ) );


			define( 'HELIUM_VENDOR', trailingslashit( HELIUM_DIR . 'vendor' ) );
			define( 'HELIUM_CUSTOMIZE', trailingslashit( HELIUM_DIR . 'customize' ) );
			// Admin paths
			define( 'HELIUM_ADMIN_IMAGES_URI', trailingslashit( HELIUM_THEME_URI . '/assets/images/customize' ) );

			define( 'HELIUM_THEME_ASSETS', trailingslashit( HELIUM_THEME_DIR . 'assets' ) );
			define( 'HELIUM_THEME_ASSETS_URI', trailingslashit( HELIUM_THEME_URI . 'assets' ) );
			define( 'HELIUM_THEME_CSS_URI', trailingslashit( HELIUM_THEME_ASSETS_URI . 'css' ) );
			define( 'HELIUM_THEME_JS_URI', trailingslashit( HELIUM_THEME_ASSETS_URI . 'js' ) );

			define( 'HELIUM_CHILD_THEME_DIR', trailingslashit( get_stylesheet_directory() ) );
			define( 'HELIUM_CHILD_THEME_ADMIN', trailingslashit( HELIUM_CHILD_THEME_DIR . 'admin' ) );
			define( 'HELIUM_CHILD_THEME_INC', trailingslashit( HELIUM_CHILD_THEME_DIR . 'inc' ) );
			define( 'HELIUM_CHILD_THEME_ASSETS', trailingslashit( HELIUM_CHILD_THEME_DIR . 'assets' ) );

			define( 'HELIUM_CHILD_THEME_URI', trailingslashit( get_stylesheet_directory_uri() ) );

			define( 'HELIUM_ADMIN_ASSETS_URI', trailingslashit( HELIUM_THEME_URI . 'framework/helium/admin/assets/' ) );
		}

		/**
		 * Load the helium framework core
		 */
		public function core() {
			require_once( HELIUM_DIR . 'change-wp-defaults.php' );
			require_once( HELIUM_DIR . 'utility-functions.php' );
			require_once( HELIUM_DIR . 'body-css-classes.php' );
			require_once( HELIUM_DIR . 'post-meta.php' );
			require_once( HELIUM_DIR . 'sanitization-functions.php' );

			require_once( HELIUM_CUSTOMIZE . 'control-image-dimensions.php' );
			require_once( HELIUM_CUSTOMIZE . 'control-font-selection.php' );
			require_once( HELIUM_CUSTOMIZE . 'control-typography.php' );
			require_once( HELIUM_CUSTOMIZE . 'control-he-select.php' );
			require_once( HELIUM_CUSTOMIZE . 'control-help-text.php' );
			require_once( HELIUM_CUSTOMIZE . 'control-drag-drop.php' );
			require_once( HELIUM_CUSTOMIZE . 'utils.php' );
			require_once( HELIUM_CUSTOMIZE . 'sass-override.php' );
			require_once( HELIUM_CUSTOMIZE . 'load-scripts.php' );

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

			add_theme_support( 'breadcrumb-trail' );

			add_theme_support( 'post-thumbnails' );
			add_theme_support( 'custom-logo' );
			add_theme_support( 'automatic-feed-links' );
			add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'gallery', 'caption' ) );
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

		public function load_mobile_detect() {
			if ( ! class_exists( 'Mobile_Detect' ) ) {
				require_once( HELIUM_VENDOR . 'Mobile_Detect.php' );
			}
			$this->mobile_detect = new Mobile_Detect();
		}

		public function is_mobile() {
			return $this->mobile_detect->isMobile() && ! $this->mobile_detect->isTablet();
		}

		/**
		 * Returns the post/page meta value of the given key.
		 *
		 * @param string $key key of the meta.
		 *
		 * @return mixed
		 */
		public function get_meta( $key = null ) {

			if ( is_admin() && isset( $_GET['post'] ) && $_GET['post'] ) {
				$post_id = intval( $_GET['post'] );
			} else if ( is_singular() ) {
				global $post;
				$post_id = intval( $post->ID ); //@todo is casting required?
			} else {
				return null;
			}

			$meta = get_post_meta( $post_id, '_helium', true );

			if ( $key ) {
				return isset( $meta[ $key ] ) ? $meta[ $key ] : null;
			} else {
				return $meta;
			}
		}

	}

}