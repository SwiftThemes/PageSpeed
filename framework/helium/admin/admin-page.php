<?php
/**
 * Created by PhpStorm.
 * User: satish
 * Date: 13/03/17
 * Time: 6:00 PM
 */


add_action( 'admin_menu', 'helium_theme_menu' );

function helium_theme_menu() {
	//add_theme_page( __( 'Helium Help', 'page-speed' ), __( 'Helium Help', 'page-speed' ), 'edit_theme_options', 'helium-help', 'pagespeed_help' );


	$helium_theme_options = add_theme_page(
		'PageSpeed Theme Options',            // The title to be displayed in the browser window for this page.
		'Theme Options',            // The text to be displayed for this menu item
		'administrator',            // Which type of users can see this menu item
		'helium_theme_options',    // The unique ID - that is, the slug - for this menu item
		'helium_theme_options_display'     // The name of the function to call when rendering this menu's page
	);


	add_action( "admin_print_styles-$helium_theme_options", 'helium_admin_stylesheet' );
	add_action( "admin_print_footer_scripts-$helium_theme_options", 'helium_admin_scripts' );
}


function pagespeed_help() {
	?>
    <div class="wrap">
        <p style="font-size:20px;font-weight: 300">
            Helium stores the SASS/CSS content to the database in a transient for a smoother experience on the theme customizer.<br/>
            If you switched or upgraded your theme, and the customizer is not working as expected, try clearing the transients.
        </p>
        <button id="clear-sass" class="button button-primary"
                style="padding:10px 20px;font-size:24px;border-radius: 40px;height: auto">Clear Transients
        </button>
        <br/>
        <span id="clear_cache_results"></span>
        <br/>

        <hr/>
        <p style="font-size:20px;font-weight: 300">
            Helium saves your file system status on whether it can write the stylesheet to uploads directory or not.
            It loads a pre-compiled stylesheet if it can not write to uploads and your layout and color changes might
            not work.
            You can force a recheck here.
        </p>
        <p>
			<?php
			if ( get_theme_mod( 'can_read_write' ) ) {
				echo '            <span id="can-write" class="options-status" style="display: inline;">'.__('Can read & write','page-speed').'</span>';
			} else {
				echo '            <span id="can-not-write" class="options-status" style="display: inline;">'.__('Can not read & write','page-speed').'</span>';
			}
			?>
        </p>
        <button id="update-write-status" class="button button-primary"
                style="padding:10px 20px;font-size:24px;border-radius: 40px;height: auto">Update File System Status
        </button>
        <br/>
        <span id="clear_write_status_results"></span>
        <br/>
    </div>
	<?php
}


function helium_admin_scripts( $hook ) {
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'jquery-ui-core' );
	wp_enqueue_script( 'jquery-ui-tabs' );
	wp_enqueue_script( 'admin-scripts', HELIUM_ADMIN_ASSETS_URI . 'js/tabs.js', array(
		'jquery',
//		'cookie-plugin',
		'jquery-ui-core',
		'jquery-ui-tabs',
//		'masonry'
	) );

	wp_enqueue_script( 'helium-admin-scripts', HELIUM_ADMIN_ASSETS_URI . 'js/scripts.js' );
}


function helium_admin_stylesheet() {
	wp_enqueue_style( 'helium-adminstyles', HELIUM_ADMIN_ASSETS_URI . 'css/style.css' );
}