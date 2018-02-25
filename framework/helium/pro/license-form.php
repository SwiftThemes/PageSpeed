<?php
function helium_render_license_form() {
	$license = get_site_option( "helium_license", array() );
	$license_key = isset( $license['license_key'] ) ? $license['license_key'] : '';
	?>
    <form id="license_activation">
        <input type="hidden"
               name="helium_ajax_nonce" id="helium_ajax_nonce"
               value="<?php echo wp_create_nonce( 'helium_ajax_nonce' ) ?>"/>
        <label>
            Your license key
            <input type="text" style="width:300px" name="key"
                   value="<?php echo sanitize_text_field( $license_key ) ?>"/>
            <input type="button" id="validate_license" value="Check">
            <input type="button" id="activate_license" value="Activate">
        </label>
    </form>
<?php } ?>
