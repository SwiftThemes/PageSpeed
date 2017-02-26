<?php
/**
 * Compile SCSS and write the stylesheet to uploads directory
 *
 * Hook on to the theme options update action, and generate the stylesheet and put it in uploads directory
 *
 *
 *
 */

$theme_name = wp_get_theme()->stylesheet;

//@todo use customize_save_after hook
add_action( 'update_option_theme_mods_' . $theme_name, 'helium_write_stylesheet', 20 );
add_action( 'admin_head', 'helium_write_stylesheet', 20 );
add_action( 'switch_theme', 'helium_write_stylesheet' );

function helium_write_stylesheet() {

	$style_generator = new Helium_Styles( THEME_ASSETS . 'css/src/' );
	$style_generator->write_css();
}


function helium_write_to_uploads( $content, $destination ) {
	global $wp_filesystem;

	$url = wp_nonce_url( 'customize.php', 'fs-nonce' );
	if ( request_filesystem_credentials( $url, '', false, null, null ) ) {
		$upload_dir = wp_upload_dir();
		$file       = trailingslashit( $upload_dir['basedir'] ) . $destination;
		$wp_filesystem->put_contents( $file, $content, FS_CHMOD_FILE );
	} else {
		//@todo
		//Unable to write to file system, can't ask ftp details.
		//Show the info, use a tansient variable.

		// get the upload directory and make a test.txt file
		return;
	}


}


class Helium_Styles {

	private $main;
	private $source;
	private $af_files = [ ];    // List above fold css files
	private $bf_files = [ ];  // Below fold css files
	private $scss_variable_files = [ 'variables', 'colors' ];
	private $prefix;

	/**
	 * Helium_Styles constructor.
	 *
	 * @param string $src path for the directory containing SCSS files
	 * @param string $main name of the scss file in the above src directory importing the required sass files.
	 *
	 */
	public function __construct( $src, $main = 'main.scss' ) {
		require_once( ABSPATH . 'wp-admin/includes/file.php' );

//      You can pass args liek this to WP_Filesystem
		$args = array(
			'hostname' => 'localhost',
			'username' => 'satish',
			'password' => '',
		);

		WP_Filesystem(  );
		$this->prefix = wp_get_theme()->stylesheet . '_';
		$this->main   = trailingslashit( $src ) . $main;
		$this->source = trailingslashit( $src );
		$this->set_file_list();
	}

	private function set_file_list() {

		$files = get_transient( $this->prefix . 'sass_file_list' );
		if ( $files && $files['below_fold'] && ! WP_DEBUG ) {
			$this->af_files = $files['above_fold'];
			$this->bf_files = $files['below_fold'];
		} else {
			global $wp_filesystem;
			$files = $wp_filesystem->get_contents_array( $this->main );
			// Save the read files to transient.
			foreach ( $files as $file ) {
				if ( preg_match( '/".+"/', $file, $matches ) ) {

					$file = str_replace( '"', '', $matches[0] );
					if ( 0 && $this->is_above_fold( $file ) ) {
						array_push( $this->af_files, $file . '.scss' );
					} elseif ( 'main' !== $file ) {
						array_push( $this->bf_files, $file . '.scss' );
					}
					if ( in_array( $file, $this->scss_variable_files ) ) {
						array_push( $this->af_files, $file . '.scss' );
					}
				}
			}
			delete_transient( $this->prefix . 'sass_file_list' );

			set_transient( $this->prefix . 'sass_file_list', array(
				'above_fold' => $this->af_files,
				'below_fold' => $this->bf_files,
			), 1800 );


		}


	}

	private function is_above_fold( $file ) {
		if ( strpos( $file, 'af-' ) === 0 ) {
			return true;
		} else {
			return false;
		}
	}

	public function generate_css() {
		global $wp_filesystem;

		$content = get_transient( $this->prefix . 'sass_combined' );

		if ( ! $content && ! WP_DEBUG ) {
			$content = '';
			foreach ( $this->bf_files as $file_name ) {
				$content .= $wp_filesystem->get_contents( $this->source . $file_name );
			}
			delete_transient( $this->prefix . 'sass_combined' );
			set_transient( $this->prefix . 'sass_combined', $content, 1800 );
		}


		$override = '';
		$override .= "/** Overridden by settings from customizer */\n\n";
		$override .= '$site_width:' . get_theme_mod( 'site_width', '1160px' ) . ";\n";
		$override .= '$main_width:' . get_theme_mod( 'main_width', '70' ) . ";\n";
		$override .= '$left_sidebar_width:' . get_theme_mod( 'left_sidebar_width', '20' ) . ";\n";

		$content = str_replace( '/**variables**/', $override, $content );


		require_once( THEME_INC . 'libs/scss.inc.php' );
		$scss = new scssc();
		$scss->setImportPaths( $this->source );

		return $scss->compile( $content );
	}

	public function write_css() {
		try {
			global $wp_filesystem;
			$content    = $this->generate_css();
			$upload_dir = wp_upload_dir();
			$file       = trailingslashit( $upload_dir['basedir'] ) . $theme_name = wp_get_theme()->stylesheet . '.css';
			$wp_filesystem->put_contents( $file, $content );
		} catch ( Exception $e ) {
			echo 'Message: ' . $e->getMessage();
		}

	}
}