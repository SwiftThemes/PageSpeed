<?php


function helium_theme_options_display() {
//	require_once HELIUM_ADMIN . '/display-theme-options.php';
	GLOBAL $theme_options;
	?>
    <!-- Create a header in the default WordPress 'wrap' container -->
    <style>


    </style>
    <div class="wrap">

        <h2>PageSpeed <?php _e( 'Theme Helpers', 'page-speed' ) ?></h2>
		<?php settings_errors(); ?>

        <div class="tabs-container" id="tabs">
            <ul>
                <li><a href="#tabs-2"><?php _e( 'Tools', 'page-speed' ) ?></a></li>
            </ul>

            <div id="tabs-2">
				<?php pagespeed_help() ?>
            </div>

        </div>

    </div><!-- /.wrap -->
	<?php
} // end sandbox_theme_display