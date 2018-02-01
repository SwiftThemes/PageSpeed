<?php
/**
 * Created by PhpStorm.
 * User: satish
 * Date: 31/01/18
 * Time: 2:41 PM
 */


function helium_theme_options_display() {
	GLOBAL $theme_options;
	?>
	<!-- Create a header in the default WordPress 'wrap' container -->
	<style>


	</style>
	<div class="wrap">

		<h1>PageSpeed <?php _e( 'Theme Helpers', 'page-speed' ) ?></h1>
		<?php settings_errors(); ?>

		<div class="tabs-container" id="tabs">
			<ul>
				<li><a href="#tabs-1"><?php _e( 'About', 'page-speed' ) ?></a></li>
				<li><a href="#tabs-2"><?php _e( 'Tools', 'page-speed' ) ?></a></li>
			</ul>

			<div id="tabs-1">
				<?php pagespeed_about() ?>
			</div>
			<div id="tabs-2">
				<?php pagespeed_help() ?>
			</div>

		</div>

	</div><!-- /.wrap -->
	<?php
}
