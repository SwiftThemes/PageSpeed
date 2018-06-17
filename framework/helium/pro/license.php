<?php
function helium_render_license_form() {
	$license     = get_site_option( "helium_license", array() );
	$license_key = isset( $license['license_key'] ) ? $license['license_key'] : '';
	?>
    <form id="license_activation" class="license">
        <input type="hidden"
               name="helium_ajax_nonce" id="helium_ajax_nonce"
               value="<?php echo wp_create_nonce( 'helium_ajax_nonce' ) ?>"/>
        <label>
			<?php _e( 'Enter your license key', 'page-speed' ) ?>
            <input type="text" class="license-key" name="key"
                   value="<?php echo sanitize_text_field( $license_key ) ?>"/>
            <!--            <input type="button" id="validate_license" value="Check">-->
            <input type="button" id="activate_license" class="button button-primary" value="Activate">
        </label>
    </form>
    <div id="license-info">
		<?php
		echo helium_license_info();
		?>
    </div>
    <div class="clear"></div>
    <br/>
    <br/>
    <div style="margin-top: 20px">
        <a href="https://forums.swiftthemes.com" class="button button-primary">Support</a>&nbsp;&nbsp;
        <a href="https://members.swiftthemes.com" class="button button-primary">Members area</a>
    </div>
    <br/>
    <!--	--><?php //_e( 'You can use the theme without activation. All features will work without any limitation.<br />Activation is only required for one click updates.', 'page-speed' ) ?>
	<?php
}

function helium_license_info() {
	$license = get_site_option( "helium_license", array() );

	$message = '';
	$class   = 'he-error';
	if ( ! $license ) {
		$message .= __( 'Please enter a valid license key. You can get your license key from <a href="https://members.SwiftThemes.Com/">SwiftThemes Members Area</a>', 'page-speed' );

	} else {
		switch ( $license['license_data']->code ) {
			case 'ok':
				$expires   = strtotime( $license['license_expires'] );
				$now       = time();
				$days_left = ( $expires - $now ) / 86400;
				if ( $days_left < 30 ) {
					$class = 'he-warning';
				}
				if ( $days_left < 7 ) {
					$class = 'he-error';
				} else {
					$class = 'he-success';
				}
				$message .= __( 'Your license key is valid and expires in', 'page-speed' ) . ' ' . human_time_diff( $expires );
				break;
			case 'license_empty':
				$message .= 'Please enter a valid license key. You can get your license key from <a href="https://members.SwiftThemes.Com/">SwiftThemes Members Area</a>';
				break;
			case 'license_not_found':
				$message .= __( 'We couldn\'t find your license key. Please verify that the key you entered matches then one in your SwiftThemes Members Area', 'page-speed' );
				break;
			case 'license_disabled':
				$message .= __( 'Your license key is disabled. Please contact SwiftThemes support.', 'page-speed' );
				break;
			case 'license_expired':
				$message .= __( 'Your license key expired. Please renew your subscription from the members area.', 'page-speed' );
				break;
			case 'activation_server_error':
				$message .= __( 'We are having trouble reaching the activation server. Please try again in few minutes, if the error persists contact SwiftThemes support.', 'page-speed' );
				break;
			case 'invalid_input':
				$message .= __( 'The license key entered is invalid', 'page-speed' );
				break;
			case 'no_spare_activations':
				$message .= __( 'You have reached the number of allowed activations. Upgrade your license or deactivate existing activations from SwiftThemes Members Area.', 'page-speed' );
				break;
			case 'no_activation_found':
				$message .= __( 'Please activate your license by clicking the activate button above.', 'page-speed' );
				break;
			case 'no_reactivation_allowed':
				$message .= __( 'You have reached the allowed number of re-activations. Please contact support.', 'page-speed' );
				break;
			case 'other_error':
				$message .= $license['license_data']->message;
				break;
			default:
				$message .= 'Oh Snap!!, Sorry something went wrong :-(. Probably an invalid license key. Please contact support.';

		}
	}

	return sprintf( '<div class="license-info %s">%s</div>', $class, $message );
}

add_action( 'admin_notices', 'helium_license_nag' );

function helium_license_nag() {
	$license = get_site_option( "helium_license", array() );
	$now     = time();
	if ( isset( $license['license_renew_nag_show_after'] ) && $license['license_renew_nag_show_after'] - $now > 0 ) {
		return;
	}
	if ( ! $license ) {
		$message = __( 'Please activate PageSpeed license to receive updates. You can get your license key from <a href="https://members.SwiftThemes.Com/">SwiftThemes Members Area</a>', 'page-speed' );
		$candy     = __( 'Enter license', 'page-speed' );
		$class   = 'warning';

	} else if ( $license['license_data']->code == 'ok' ) {

		$expires   = strtotime( $license['license_expires'] );
		$now       = time();
		$days_left = ( $expires - $now ) / 86400;
		$candy     = __( 'License expiring', 'page-speed' );

		if ( $days_left < 30 ) {
			$message = sprintf( __( 'Your PageSpeed license is about to expire in %d Days. Please renew your subscription for uninterrupted theme updates.', 'page-speed' ), $days_left );
			$message .= '<br /><a href="https://members.swiftthemes.com/login/" target="_blank" class="he-btn">' . __( 'Renew now', 'page-speed' ) . '</a><br />';
			$message .= '<em>' . __( 'Ignore if your subscription is set to auto renew', 'page-speed' ) . '</a></em><br />';
			$class   = 'warning';
		}
		if ( $days_left < 0 ) {
			$candy = __( 'License expired', 'page-speed' );
		}
    } else {
		$class   = 'warning';
		$candy = __( 'License error', 'page-speed' );

		$message = $license['license_data']->message. '. ';
		$message .= 'Please check members area for more info.<br /><a href="https://members.swiftthemes.com/login/" target="_blank" class="he-btn">' . __( 'Members area', 'page-speed' ) . '</a><br />';

	}
	?>
    <div class="he-nag <?php echo $class ?>">
        <div class="close" id="close-he-license"></div>
        <div class="candy">
			<?php echo $candy ?>
        </div>
        <p><?php echo $message ?></p>
    </div>
	<?php
}

