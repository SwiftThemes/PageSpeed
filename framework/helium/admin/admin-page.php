<?php
/**
 * Created by PhpStorm.
 * User: satish
 * Date: 13/03/17
 * Time: 6:00 PM
 */


add_action( 'admin_menu', 'helium_theme_menu' );

function helium_theme_menu() {
	add_theme_page( __( 'Helium Help', 'ngbr' ), __( 'Helium Help', 'ngbr' ), 'edit_theme_options', 'helium-help', 'ngbr_help' );
}


function ngbr_help() {
	?>
	<div class="wrap">
	<p>Helium caches the SASS files to database for faster response on the customizer.<br />
	If you switched or upgraded your theme, it's advised to clear the SASS cache.</p>
		<button id="clear-sass" class="button button-primary">Clear SASS Cache</button>
<br />
		<span id="clear_cache_results"></span>
	</div>
	<?php
}