<?php
/**
 * Created by Satish Gandham.
 * User: satish
 * Date: 09/02/17
 * Time: 9:44 PM
 */

add_action( 'customize_register', 'pagespeed_customize_footer', 600 );
function pagespeed_customize_footer( $wp_customize ) {

	$wp_customize->add_section( 'footer', array(
		'title'    => __( 'Footer', 'page-speed' ),
		'priority' => 80,
		'panel'=>'theme_options'
	) );


	// Show excerpts or full post
	$wp_customize->add_setting( 'copyright_text', array(
		'sanitize_callback' => 'helium_meta',
		'default'           => __('Copyright', 'page-speed' ).' &copy; ' . date_i18n(__('Y','page-speed')) . ' ' . '<a href="' . esc_url( home_url() ) . '"
						                          rel="home">' . get_bloginfo( "name" ) . '</a>',

	) );

	$wp_customize->add_control( 'copyright_text', array(
		'label'   => __( 'Copyright text', 'page-speed' ),
		'section' => 'footer',
		'type'    => 'textarea',

	) );



	$wp_customize->add_setting( 'example-3', array( 'sanitize_callback' => 'sanitize_text_field', ) );

	$wp_customize->add_control( new Helium_Help_Text( $wp_customize, 'example-3', array(
		'section'  => 'footer',
		'priority' => 215,
		'label'    => __( ' ', 'page-speed' ),
		'content'  => sprintf( '<p class="upsell-feature">%s</p><a href="https://swiftthemes.com/upgrade-pagespeed-pro/?utm_source=ps_theme_admin&utm_medium=footer_upgrade&utm_campaign=basic" target="_blank"
                                  class="button button-primary"><span class="dashicons dashicons-awards"
                                                                      style="margin-top: 3px"></span> %s</a></p>',
			__( 'Want to customize footer columns and their widths?', 'page-speed' ),
			__( 'Go Pro', 'page-speed' )
		),
	) ) );

}
