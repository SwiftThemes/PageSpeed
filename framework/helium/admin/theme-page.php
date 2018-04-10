<?php
/**
 * Created by PhpStorm.
 * User: satish
 * Date: 31/01/18
 * Time: 2:41 PM
 */


function helium_theme_options_display() {
	include_once HELIUM_THEME_INC . 'pro/admin-theme-options.php';
	?>
    <!-- Create a header in the default WordPress 'wrap' container -->
    <div class="wrap">

        <h1>PageSpeed <?php _e( 'Theme Helpers', 'page-speed' ) ?></h1>
		<?php settings_errors(); ?>

        <div class="tabs-container" id="tabs">
            <ul>
                <li><a href="#tabs-1"><?php _e( 'Getting Started', 'page-speed' ) ?></a></li>
				<?php if ( defined( 'HELIUM_PRO' ) ) { ?>
                    <li><a href="#tabs-2"><?php _e( 'Theme Options', 'page-speed' ) ?></a></li>
                    <li><a href="#tabs-3"><?php _e( 'Tools', 'page-speed' ) ?></a></li>
                    <li><a href="#tabs-4"><?php _e( 'Activation', 'page-speed' ) ?></a></li>
				<?php } ?>
            </ul>

            <div id="tabs-1">
				<?php pagespeed_about() ?>
            </div>
			<?php if ( defined( 'HELIUM_PRO' ) ) { ?>
                <div id="tabs-2">
                    <form id="helium_theme_options">
                        <input type="hidden"
                               name="helium_ajax_nonce" id="helium_ajax_nonce"
                               value="<?php echo wp_create_nonce( 'helium_ajax_nonce' ) ?>"/>

						<?php helium_display_theme_options( $page_speed_theme_options ) ?>
                        <div id="helium-options-footer" class="cf">
                            <button class="button button-primary button-hero alignright" id="save_theme_options">
								<?php _e( 'Save
                            settings', 'page-speed' ) ?></a>
                            </button>
                            <span id="options-changed"
                                  class="options-status"><?php _e( 'You have unsaved changes', 'page-speed' ) ?></span>
                            <span id="options-saved"
                                  class="options-status"><?php _e( 'Settings saved', 'page-speed' ) ?></span>
                            <span id="options-save-error"
                                  class="options-status"><?php _e( 'Error saving settings', 'page-speed' ) ?></span>
                        </div>
                    </form>

                </div>
                <div id="tabs-3">
					<?php helium_tools() ?>
                </div>
                <div id="tabs-4">
					<?php helium_render_license_form() ?>
                </div>
			<?php } ?>


        </div>

    </div><!-- /.wrap -->
	<?php
}
