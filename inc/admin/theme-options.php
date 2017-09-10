<?php


function helium_theme_options_display() {
	require_once HELIUM_ADMIN . '/display-theme-options.php';
	GLOBAL $theme_options;
	?>
    <!-- Create a header in the default WordPress 'wrap' container -->
    <style>


    </style>
    <div class="wrap">

        <div id="icon-themes" class="icon32"></div>
        <h2>PageSpeed Theme Options</h2>
		<?php settings_errors(); ?>

        <div class="tabs-container" id="tabs">
            <ul>
                <li><a href="#tabs-1">Sidebars</a></li>
                <li><a href="#tabs-2">Tools</a></li>
                <li><a href="#tabs-3">Activation</a></li>

                <li class="alignright ">
                    <button class="button button-primary" id="save_theme_options">Save settings</button>
                </li>
                <li class="alignright">
                    <span id="options-changed">You have unsaved changes</span>
                    <span id="options-saved">Settings saved</span>
                    <span id="options-save-error">Error saving settings</span>
                </li>
            </ul>
            <form id="helium_theme_options">
                <input type="hidden"
                       name="helium_ajax_nonce" id="helium_ajax_nonce"
                       value="<?php echo wp_create_nonce( 'helium_ajax_nonce' ) ?>"/>
                <div id="tabs-1">
					<?php
					display_theme_options( $theme_options );
					?>
                </div>
                <div id="tabs-2">
					<?php pagespeed_help() ?>
                </div>
                <div id="tabs-3">
                    <h2>Coming soon..</h2>
                    <p>You are free to use the theme till then</p>
                </div>
            </form>
        </div>

    </div><!-- /.wrap -->
	<?php
} // end sandbox_theme_display