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
if ( defined( 'DEV_ENV' ) && DEV_ENV ) {
	add_action( 'admin_head', 'helium_write_stylesheet', 20 );
}
add_action( 'after_switch_theme', 'helium_write_stylesheet_on_theme_switch' );


function helium_write_stylesheet_on_theme_switch() {
	helium_write_stylesheet();
}

function helium_write_stylesheet() {
//	helium_set_fs_status();
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
	private $af_files = array();    // List above fold css files
	private $bf_files = array();  // Below fold css files
	private $scss_variable_files = array( 'variables', 'colors', 'mixins' );
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
		WP_Filesystem();

		$this->prefix = wp_get_theme()->stylesheet . '_';
		$this->main   = trailingslashit( $src ) . $main;
		$this->source = trailingslashit( $src );
		$this->set_file_list();
	}

	private function set_file_list() {
		$files = get_transient( $this->prefix . 'sass_file_list' );

		if ( $files && is_array( $files ) && $files['below_fold'] ) {
			$this->af_files = $files['above_fold'];
			$this->bf_files = $files['below_fold'];
		} else {
			global $wp_filesystem;
			$files = $wp_filesystem->get_contents_array( $this->main );
			// Save the read files to transient.
			foreach ( $files as $file ) {
				if ( preg_match( '/".+"/', $file, $matches ) ) {
					$file_name = $file = str_replace( '"', '', $matches[0] );
					$file      = THEME_DIR . 'assets/css/src/' . $file_name . '.scss';
					if ( in_array( $file_name, $this->scss_variable_files ) ) {
						if ( $wp_filesystem->is_file( CHILD_THEME_DIR . 'assets/css/src/' . $file_name . '.scss' ) ) {
							$file = CHILD_THEME_DIR . 'assets/css/src/' . $file_name . '.scss';
						}
					}

					if ( 0 && $this->is_above_fold( $file_name ) ) {
						array_push( $this->af_files, $file );
					} elseif ( 'main' !== $file ) {
						array_push( $this->bf_files, $file );
					}

					if ( in_array( $file_name, $this->scss_variable_files ) ) {
						array_push( $this->af_files, $file );

						// Check if there is a file to override the variables.
						// If yes, add them after our regular variable files.
						$override_file = CHILD_THEME_DIR . 'assets/css/src/override-' . $file_name . '.scss';

						if ( $wp_filesystem->is_file( $override_file ) ) {
							array_push( $this->af_files, $override_file );
							array_push( $this->bf_files, $override_file );
						}
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

	private function get_header_height() {
		$logo_id = get_theme_mod( 'custom_logo', false );
		if ( $logo_id ) {
			$image     = wp_get_attachment_image_src( $logo_id, 'full' );
			$image_url = $image[0];
			$size      = getimagesize( $image_url );
			if ( $size[1] ) {
				return $size[1] . 'px';
			} else {
				return '64px';
			}
		} else {
			return '64px';
		}
	}

	public function generate_css( $af_bf ) {
		global $wp_filesystem;

		$transient = $this->prefix . 'sass_combined_' . $af_bf;
		$content   = get_transient( $transient );

		if ( ! $content || ( defined( 'DEV_ENV' ) && DEV_ENV ) ) {
			$content = '';

			if ( $af_bf === 'af' ) {
				foreach ( $this->af_files as $file_name ) {
					$content .= $wp_filesystem->get_contents( $file_name );
				}
			} else {
				foreach ( $this->bf_files as $file_name ) {
					$content .= $wp_filesystem->get_contents( $file_name );
				}
			}
			delete_transient( $transient );
			set_transient( $transient, $content, 1800 );
		}



		$color_scheme = get_theme_mod('color_scheme','default');
		GLOBAL $page_speed_color_schemes;
		$color_scheme = $page_speed_color_schemes[$color_scheme];


		$override = '';
		$override .= "/** Overridden by settings from customizer */\n\n";
		$override .= '$site_width:' . get_theme_mod( 'site_width', '1160px' ) . ";\n";
		$override .= '$main_width:' . get_theme_mod( 'main_width', '56' ) . ";\n";
		$override .= '$left_sidebar_width:' . get_theme_mod( 'left_sidebar_width', '18.75' ) . ";\n";

		if ( get_theme_mod( 'enable_sleek_header', false ) ) {
			$override .= '$is_sleek_header:1' . ";\n";
			$override .= '$header_height:' . $this->get_header_height() . ";\n";
		}

//		$override .= "\n" . get_theme_mod( 'scss_override', '/* No __SCSS__ Override */' ) . "\n";


		$override .= '$body-font-stack:' . get_theme_mod( 'primary_font_stack', '-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol"' ) . ";\n";
		$override .= '$base-font-size:' . get_theme_mod( 'primary_font_size', 16 ) . "px;\n";
		$override .= '$base-line-height:' . get_theme_mod( 'primary_font_lh', 1.7 ) . "em;\n";
		$override .= '$body-font-weight:' . get_theme_mod( 'primary_font_weight', 'normal' ) . ";\n";


		$override .= '$headings-font-stack:' . get_theme_mod( 'secondary_font_stack', '-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol"' ) . ";\n";
		$override .= '$headings-font-weight:' . get_theme_mod( 'secondary_font_weight', 'bold' ) . ";\n";

		$override .= '$container_type:' . get_theme_mod( 'container_type', 'regular' ) . ';';

		if(!get_theme_mod('enable_card_style_widgets_sb',true)){
			$override .= '$sb_widget_cards:0;';
		}

		$content = str_replace( '/**variables**/', $override, $content );
		$content = str_replace( '/**colors_from_color_scheme**/', helium_get_hue_and_primary_color($color_scheme), $content );





		if(get_theme_mod('override_color_scheme',false)){
			$colors_override = '';
			$colors_override .= "/** Overridden by settings from customizer */\n\n";
			$colors_override .= '$primary:' . get_theme_mod( 'primary_color', '#007AFF' ) . ';';
			$colors_override .= '$hue:' . get_theme_mod( 'shades_from', '211' ) . ';';
			$colors_override .= '$saturation:' . get_theme_mod( 'shade_saturation', 8 ) . ';';
			if ( get_theme_mod( 'invert_colors', false ) ) {
				$colors_override .= '$invert:' . 1 . ';';
			}
			$content = str_replace( '/**colors**/', $colors_override, $content );
		}






		$content = str_replace( '/**color_scheme**/', helium_generate_scss($color_scheme), $content );


		$content = str_replace( '/**SCSS_override**/', get_theme_mod( 'scss_override', '/* No __SCSS__ Override */' ), $content );

		if ( defined( 'DEV_ENV' ) && DEV_ENV ) {
			helium_write_to_uploads( $content, 'combined.scss' );
		}

		require_once( THEME_INC . 'libs/scss.inc.php' );
		$scss = new scssc();
		$scss->setImportPaths( $this->source );

		return $scss->compile( $content );
	}

	public function write_css() {

		$theme_name = wp_get_theme()->stylesheet;
		$content    = $this->minify_css( $this->generate_css( 'af' ) );

		update_option( $theme_name . '_above_fold_css', $content );

		try {
			global $wp_filesystem;
			$content    = $this->generate_css( 'bf' );
			$upload_dir = wp_upload_dir();
			$file       = trailingslashit( $upload_dir['basedir'] ) . $theme_name = wp_get_theme()->stylesheet . '.css';
			$wp_filesystem->put_contents( $file, $content );
		} catch ( Exception $e ) {
			echo 'Message: ' . $e->getMessage();
		}

	}


	private function minify_css( $buffer ) {
//		if (WP_DEBUG)
//			return $buffer;

		$buffer = preg_replace( '!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $buffer );

		// Remove space after colons
		$buffer = str_replace( ': ', ':', $buffer );

		// Remove whitespace
		$buffer = str_replace( array( "\r\n", "\r", "\n", "\t", '  ', '    ', '    ' ), '', $buffer );

		return $buffer;
	}
}