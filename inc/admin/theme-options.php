<?php


function helium_theme_options_display() {
	require_once HELIUM_ADMIN . '/display-theme-options.php';
	GLOBAL $theme_options;
	?>
    <!-- Create a header in the default WordPress 'wrap' container -->
    <style>


    </style>
    <div class="wrap">

        <h2>PageSpeed Theme Options</h2>
		<?php settings_errors(); ?>

        <div class="tabs-container" id="tabs">
            <ul>
                <li><a href="#tabs-1">Settings</a></li>
                <li><a href="#tabs-2">Tools</a></li>
                <li><a href="#tabs-3">Activation</a></li>


            </ul>

            <div id="tabs-1">
                <form id="helium_theme_options">
                    <input type="hidden"
                           name="helium_ajax_nonce" id="helium_ajax_nonce"
                           value="<?php echo wp_create_nonce( 'helium_ajax_nonce' ) ?>"/>
					<?php
					display_theme_options( $theme_options );
					?>
                    <div id="helium-options-footer" class="cf">
                        <button class="button button-primary button-hero alignright" id="save_theme_options">Save settings</button>
                            <span id="options-changed" class="options-status">You have unsaved changes</span>
                            <span id="options-saved" class="options-status">Settings saved</span>
                            <span id="options-save-error" class="options-status">Error saving settings</span>
                    </div>
                </form>
            </div>
            <div id="tabs-2">
				<?php pagespeed_help() ?>
            </div>
            <div id="tabs-3">
                <h2>Coming soon..</h2>
                <p>You are free to use this version as long as you please.</p>
            </div>
        </div>

    </div><!-- /.wrap -->
	<?php
} // end sandbox_theme_display