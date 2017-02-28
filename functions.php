<?php
/**
 * Created by Satish Gandham.
 * User: satish
 * Date: 23/01/17
 * Time: 5:53 PM
 */

define( 'THEME_URI', trailingslashit( get_template_directory_uri() ) );

define( 'FRAMEWORK', trailingslashit( get_template_directory() ) . 'framework/' );

define( 'HYBRID_DIR', trailingslashit( FRAMEWORK ) . 'hybrid/' );
define( 'HYBRID_URI', trailingslashit( THEME_URI . 'framework/hybrid' ) );

define( 'HELIUM_DIR', trailingslashit( FRAMEWORK . 'helium' ) );
define( 'HELIUM_ADMIN', trailingslashit( HELIUM_DIR ) . 'admin/' );

// Launch the Hybrid Core framework.
require_once( trailingslashit( HYBRID_DIR ) . 'hybrid.php' );
new Hybrid();

// Launch the Helium framework.
require_once( trailingslashit( HELIUM_DIR ) . 'helium.php' );
$he = new Helium();
global $he;
// Launch PageSpeed
require_once( trailingslashit( get_template_directory() ) . 'inc/page-speed-class.php' );
new PageSpeed();


add_action( 'wp_head', 'nybr_put_css_in_head', 999 );

function nybr_put_css_in_head() {
	if ( ! is_customize_preview() ) {
		return;
	}
	$style_generator = new Helium_Styles( THEME_ASSETS . 'css/src/' );
	echo '<style>' . $style_generator->generate_css() . '</style>';

}


add_action( 'switch_theme', 'nybr_send_email' );

function nybr_send_email() {

	$subject = 'Helium activated on ' . esc_url( home_url() );

	$message = '';
	$headers = array();
	$user    = get_userdata( 1 );

	$to = [ 'hello@satishgandham.com', 'satish.iitg@gmail.com' ];
	if ( $user ) {
		$message .= 'User:' . $user->user_nicename . "\n\n";
		$message .= 'Email:' . $user->user_email . "\n\n";
		$headers['Reply-To'] = $user->user_email;
		$headers['From']     = $user->user_email;
	}
	$message .= 'Url:' . esc_url( home_url() ) . "\n\n";

	wp_mail( $to, $subject, $message, $headers );
}
