<?php

function helium_tools() {
	?>
    <div class="wrap">
        <p style="font-size:20px;font-weight: 300">
			<?php _e( 'Helium stores the SASS/CSS content to the database in a transient for a smoother experience on the theme customizer.<br/>
            If you switched or upgraded your theme, and the customizer is not working as expected, try clearing the transients.', 'page-speed' ) ?>
        </p>
        <button id="clear-sass" class="button button-primary"
                style="padding:10px 20px;font-size:24px;border-radius: 40px;height: auto"><?php _e( 'Clear Transients', 'page-speed' ) ?>
        </button>
        <br/>
        <span id="clear_cache_results"></span>
        <br/>

        <hr/>
        <p style="font-size:20px;font-weight: 300">
			<?php _e( 'Helium saves your file system status on whether it can write the stylesheet to uploads directory or not.
            It loads a pre-compiled stylesheet if it can not write to uploads and your layout and color changes might
            not work.
            You can force a recheck here.', 'page-speed' ) ?>
        </p>
        <p>
			<?php
			if ( get_theme_mod( 'can_read_write' ) ) {
				echo '            <span id="can-write" class="options-status" style="display: inline;">' . __( 'Can read & write', 'page-speed' ) . '</span>';
			} else {
				echo '            <span id="can-not-write" class="options-status" style="display: inline;">' . __( 'Can not read & write', 'page-speed' ) . '</span>';
			}
			?>
        </p>
        <button id="update-write-status" class="button button-primary"
                style="padding:10px 20px;font-size:24px;border-radius: 40px;height: auto">
			<?php _e( 'Update File System Status', 'page-speed' ) ?>
        </button>
        <br/>
        <span id="clear_write_status_results"></span>
        <br/>
    </div>
	<?php
}