<?php
/**
 * Compile SCSS and write the stylesheet to uploads directory
 *
 * Hook on to the theme options update action, and generate the stylesheet and put it in uploads directory
 *
 *
 *
 */


if ( defined( 'HELIUM_DEV_ENV' ) && HELIUM_DEV_ENV ) {
	add_action( 'admin_head', 'helium_write_stylesheet', 20 );
}


$theme_name = wp_get_theme()->stylesheet;
//@todo use customize_save_after hook
add_action( 'update_option_theme_mods_' . $theme_name, 'helium_write_stylesheet', 20 );


function helium_write_stylesheet_on_theme_switch() {
	helium_write_stylesheet();
}

function helium_write_stylesheet() {
	if ( 'NOT_SET' === get_theme_mod( 'can_read_write', 'NOT_SET' ) ) {
		helium_set_fs_status();
	}

	$style_generator = new Helium_Styles( HELIUM_THEME_ASSETS . 'css/src/' );
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
		set_theme_mod( 'can_read_write', false );

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
		include_once ABSPATH . 'wp-includes/class-wp-customize-manager.php';

		require_once( HELIUM_ADMIN . 'scss-helpers.php' );
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
					$file      = HELIUM_THEME_DIR . 'assets/css/src/' . $file_name . '.scss';
					if ( in_array( $file_name, $this->scss_variable_files ) ) {
						if ( $wp_filesystem->is_file( HELIUM_CHILD_THEME_DIR . 'assets/css/src/' . $file_name . '.scss' ) ) {
							$file = HELIUM_CHILD_THEME_DIR . 'assets/css/src/' . $file_name . '.scss';
						}
					}
					// Short this to disable separation.
					if ( $this->is_above_fold( $file_name ) ) {
						array_push( $this->af_files, $file );
					} elseif ( 'main' !== $file ) {
						array_push( $this->bf_files, $file );
					}

					if ( in_array( $file_name, $this->scss_variable_files ) ) {
						array_push( $this->af_files, $file );

						// Check if there is a file to override the variables.
						// If yes, add them after our regular variable files.
						$override_file = HELIUM_CHILD_THEME_DIR . 'assets/css/src/override-' . $file_name . '.scss';

						if ( $wp_filesystem->is_file( $override_file ) ) {
							array_push( $this->af_files, $override_file );
							array_push( $this->bf_files, $override_file );
						}
					}
				}
			}

			if ( 'NOT_SET' !== get_theme_mod( 'can_read_write', 'NOT_SET' ) ) {
				delete_transient( $this->prefix . 'sass_file_list' );
				set_transient( $this->prefix . 'sass_file_list', array(
					'above_fold' => $this->af_files,
					'below_fold' => $this->bf_files,
				), 1800 );
			}
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
		$logo_id = intval( get_theme_mod( 'custom_logo', false ) );
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

		if ( ! $content || ( defined( 'HELIUM_DEV_ENV' ) && HELIUM_DEV_ENV ) ) {
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
			if ( 'NOT_SET' !== get_theme_mod( 'can_read_write', 'NOT_SET' ) ) {
				delete_transient( $transient );
				set_transient( $transient, $content, 1800 );
			}
		}


		$color_scheme = sanitize_text_field( get_theme_mod( 'color_scheme', 'default' ) );
		GLOBAL $page_speed_color_schemes;
		$color_scheme = $page_speed_color_schemes[ $color_scheme ];


		$override = '';
		$override .= "///** Overridden by settings from customizer */\n\n";
		$override .= '$site_width:' . sanitize_text_field( get_theme_mod( 'site_width', '1260px' ) ) . ";\n";
		$override .= '$main_width:' . helium_float( get_theme_mod( 'main_width', '56' ) ) . ";\n";
		$override .= '$left_sidebar_width:' . helium_float( get_theme_mod( 'left_sidebar_width', '18.75' ) ) . ";\n";

		if ( get_theme_mod( 'enable_sleek_header', false ) ) {
			$override .= '$is_sleek_header:1' . ";\n";
			$override .= '$header_height:' . $this->get_header_height() . ";\n";
		}


		if ( get_theme_mod( 'primary_font_stack' ) && get_theme_mod( 'primary_font_stack' ) != '' ) {
			$override .= '$body-font-stack:' . sanitize_text_field( get_theme_mod( 'primary_font_stack', '-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol"' ) ) . ";\n";
			$override .= '$base-font-size:' . intval( get_theme_mod( 'primary_font_size', 16 ) ) . "px;\n";
			$override .= '$base-line-height:' . helium_float( get_theme_mod( 'primary_font_lh', 1.7 ) ) . "em;\n";
			$override .= '$body-font-weight:' . sanitize_text_field( get_theme_mod( 'primary_font_weight', 'normal' ) ) . ";\n";
		}

		if ( get_theme_mod( 'secondary_font_stack' ) && get_theme_mod( 'secondary_font_stack' ) != '' ) {
			$override .= '$headings-font-stack:' . sanitize_text_field( get_theme_mod( 'secondary_font_stack', '-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol"' ) ) . ";\n";
			$override .= '$headings-font-weight:' . sanitize_text_field( get_theme_mod( 'secondary_font_weight', 'bold' ) ) . ";\n";
		}

		$override .= '$container_type:' . sanitize_text_field( get_theme_mod( 'container_type', 'regular' ) ) . ';';

		$override .= '$layout:' . get_theme_mod( 'theme_layout', 'centered' ) . ';';
		$override .= '$logo-position:' . get_theme_mod( 'logo_position', 'left' ) . ';';

		if ( get_theme_mod( 'enable_card_style_widgets_sb', true ) ) {
			$override .= '$sb_widget_cards:1;';
		} else {
			$override .= '$sb_widget_cards:0;';

		}

		$content = str_replace( '/**variables**/', $override, $content );


		$temp = '';
		foreach ( PAGE_SPEED_GRADIENT_BGS as $value ) {

			$defaults = array(
				'enable'         => 0,
				'text_color'     => '$dark-3',
				'link_color'     => '$primary',
				'bg_start'       => '#fff',
				'is_gradient'    => 0,
				'bg_end'         => '#fff',
				'gradient_angle' => '90',
			);
			$val      = wp_parse_args( get_theme_mod( $value ), $defaults );

			$temp .= '$' . $value . '_enable:' . $val['enable'] . ';';
			$temp .= '$' . $value . '_is_gradient:' . $val['is_gradient'] . ';';
			$temp .= '$' . $value . '_gradient_start:' . $val['bg_start'] . ';';
			$temp .= '$' . $value . '_gradient_end:' . $val['bg_end'] . ';';
			$temp .= '$' . $value . '_gradient_angle:' . $val['gradient_angle'] . ';';
			$temp .= '$' . $value . '_text_color:' . $val['text_color'] . ';';
			$temp .= '$' . $value . '_link_color:' . $val['link_color'] . ';';


		};


		$content = str_replace( '/**colors_from_color_scheme**/', helium_get_hue_and_primary_color( $color_scheme ) . $temp, $content );


		if ( get_theme_mod( 'override_color_scheme', false ) ) {
			$colors_override = '';
			$colors_override .= "///** Overridden by settings from customizer */\n\n";
			$colors_override .= '$primary:' . sanitize_text_field( get_theme_mod( 'primary_color', '#007AFF' ) ) . ';';
			$colors_override .= '$hue:' . absint( get_theme_mod( 'shades_from', '211' ) ) . ';';
			$colors_override .= '$saturation:' . absint( get_theme_mod( 'shade_saturation', 8 ) ) . ';';
			if ( get_theme_mod( 'invert_colors', false ) ) {
				$colors_override .= '$invert:' . 1 . ';';
			}
			$content = str_replace( '/**colors**/', $colors_override, $content );
		}


		$content = str_replace( '/**color_scheme**/', helium_generate_scss( $color_scheme ), $content );

		// Overriding the individual colors
		$hand_picked_colors = '';

		$temp = get_theme_mod( 'body_colors' );
		$temp = wp_parse_args( $temp, $defaults );
		if ( $temp['enable'] ) {
			$hand_picked_colors .= '$body-bg:' . $temp['bg_start'] . ';';
			$hand_picked_colors .= '$body-color:' . $temp['text_color'] . ';';
			$hand_picked_colors .= '$link-color:' . $temp['link_color'] . ';';
		}
		$temp = get_theme_mod( 'header_colors' );
		$temp = wp_parse_args( $temp, $defaults );
		if ( $temp['enable'] ) {
			$hand_picked_colors .= '$header-bg:' . $temp['bg_start'] . ';';
			$hand_picked_colors .= '$site-title-color:' . $temp['text_color'] . ';';
			$hand_picked_colors .= '$site-description-color:lighten(' . $temp['text_color'] . ',.2);';
		}

		$temp = get_theme_mod( 'content_colors' );
		$temp = wp_parse_args( $temp, $defaults );
		if ( $temp['enable'] ) {
			$hand_picked_colors .= '$content-bg:' . $temp['bg_start'] . ';';
			$hand_picked_colors .= '$sb-widget-color:' . $temp['text_color'] . ';';
			$hand_picked_colors .= '$sb-widget-link-color:' . $temp['link_color'] . ';';
		}

		$temp = get_theme_mod( 'sb1_colors' );
		$temp = wp_parse_args( $temp, $defaults );
		if ( $temp['enable'] ) {
			$hand_picked_colors .= '$sb1-bg:' . $temp['bg_start'] . ';';
			$hand_picked_colors .= '$sb-widget-color:' . $temp['text_color'] . ';';
			$hand_picked_colors .= '$sb-widget-link-color:' . $temp['link_color'] . ';';
		}
		$temp = get_theme_mod( 'sb2_colors' );
		$temp = wp_parse_args( $temp, $defaults );
		if ( $temp['enable'] ) {
			$hand_picked_colors .= '$sb2-bg:' . $temp['bg_start'] . ';';
		}

		$temp = get_theme_mod( 'primary_nav_colors' );
		$temp = wp_parse_args( $temp, $defaults );
		if ( $temp['enable'] ) {
			$hand_picked_colors .= '$primary-nav-bg:' . $temp['bg_start'] . ';';
			$hand_picked_colors .= '$primary-nav-color:' . $temp['link_color'] . ';';
		}

		$temp = get_theme_mod( 'secondary_nav_colors' );
		$temp = wp_parse_args( $temp, $defaults );
		if ( $temp['enable'] ) {
			$hand_picked_colors .= '$secondary-nav-bg:' . $temp['bg_start'] . ';';
			$hand_picked_colors .= '$secondary-nav-color:' . $temp['link_color'] . ';';
		}

		$temp = get_theme_mod( 'footer_colors' );
		$temp = wp_parse_args( $temp, $defaults );
		if ( $temp['enable'] ) {
			$hand_picked_colors .= '$footer-bg:' . $temp['bg_start'] . ';';
			$hand_picked_colors .= '$footer-color:' . $temp['text_color'] . ';';
			$hand_picked_colors .= '$footer-widget-color:' . $temp['text_color'] . ';';
			$hand_picked_colors .= '$footer-widget-link-color:' . $temp['link_color'] . ';';
		}


		$content = str_replace( '/**handpicked_colors**/', $hand_picked_colors, $content );


		$content = str_replace( '/**SCSS_override**/', sanitize_text_field( get_theme_mod( 'scss_override', '/* No __SCSS__ Override */' ) ), $content );

		if ( 1 || defined( 'HELIUM_DEV_ENV' ) && HELIUM_DEV_ENV ) {
			helium_write_to_uploads( $content, 'combined.scss' );
		}

		require_once( HELIUM_DIR . 'libs/pre-process.php' );
		$scss = new scssc();
		$scss->setImportPaths( $this->source );

		if ( $af_bf == 'af' ) {
			$scss->setFormatter( 'scss_formatter_compressed' );
		}

		return $scss->compile( $content );
	}

	public function write_css() {

		$theme_name = wp_get_theme()->stylesheet;

		try {
			global $wp_filesystem;
			$content = $this->generate_css( 'bf' );
			if ( ! defined( 'HELIUM_PRO' ) ) {
				$content = $this->generate_css( 'af' ) . $content;
			} else {
				set_theme_mod( 'af_css', $this->generate_css( 'af' ) );
			}
			$upload_dir = wp_upload_dir();
			$file       = trailingslashit( $upload_dir['basedir'] ) . wp_get_theme()->stylesheet . '.css';
			$wp_filesystem->put_contents( $file, $content );
		} catch ( Exception $e ) {
			echo __( 'Message:', 'page-speed' ) . ' ' . esc_html( $e->getMessage() );
		}

	}
}