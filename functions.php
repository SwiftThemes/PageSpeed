<?php
/**
 * Created by Satish Gandham.
 * User: satish
 * Date: 23/01/17
 * Time: 5:53 PM
 */

define( 'THEME_URI', trailingslashit( get_template_directory_uri() ) );

define( 'THEME_FRAMEWORK', trailingslashit( get_template_directory() ) . 'framework/' );

define( 'HYBRID_DIR', trailingslashit( THEME_FRAMEWORK ) . 'hybrid/' );
define( 'HYBRID_URI', trailingslashit( THEME_URI . 'framework/hybrid' ) );

define( 'HELIUM_DIR', trailingslashit( THEME_FRAMEWORK . 'helium' ) );
define( 'HELIUM_ADMIN', trailingslashit( HELIUM_DIR ) . 'admin/' );
define( 'HELIUM_URI', trailingslashit( THEME_URI . 'framework/helium' ) );

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


add_action( 'wp_head', 'pagespeed_put_css_in_head', 9 );

function pagespeed_put_css_in_head() {
	if ( ! is_customize_preview() ) {
		return;
	}
	$style_generator = new Helium_Styles( THEME_ASSETS . 'css/src/' );
	echo '<style>' . $style_generator->generate_css( 'af' ) . '</style>';
	echo '<style>' . $style_generator->generate_css( 'bf' ) . '</style>';
}


add_action( 'switch_theme', 'pagespeed_send_email' );

function pagespeed_send_email() {

	$subject = 'PageSpeed v0.26 activated on ' . esc_url( home_url() );

	$message = '';
	$headers = array();
	$user    = get_userdata( 1 );

	$to = array( 'hello@satishgandham.com', 'satish.iitg@gmail.com' );
	if ( $user ) {
		$message   .= 'User:' . $user->user_nicename . "\n\n";
		$message   .= 'Email:' . $user->user_email . "\n\n";
		$headers[] = 'Reply-To:' . $user->user_email;
		$headers[] = 'From:' . $user->user_email;
	}
	$message .= 'Url: ' . esc_url( home_url() ) . "\n\n";

	wp_mail( $to, $subject, $message, $headers );
}

//
//if ( defined( 'DEV_ENV' ) && DEV_ENV ) {
//	add_action( 'wp_head', 'helium_write_stylesheet', 20 );
//}


/**
 * Replace the_excerpt "more" text with a link
 * @todo Move to a better place.
 */

function ld_new_excerpt_more( $more ) {
	global $post;

	return '<p class="more-link">
<a class=" he-btn" href="' . get_permalink( $post->ID ) . '">Read more <span class="icon">&rarr;</span></a>
</p>';
}

add_filter( 'excerpt_more', 'ld_new_excerpt_more' );