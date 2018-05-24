<?php
/**
 * Created by PhpStorm.
 * User: satish
 * Date: 22/03/18
 * Time: 10:49 PM
 */

function pagespeed_is_slider_enabled() {
	return get_theme_mod( 'show_slider_on_homepage', false );
}

add_action( 'customize_register', 'pagespeed_customize_home', 600 );
function pagespeed_customize_home( $wp_customize ) {


	$wp_customize->add_section( 'home_slider', array(
		'title'       => __( 'Home Page Slider', 'page-speed' ),
		'description' => __( 'Configure the slider on home page.', 'page-speed' ),
		'panel'       => 'theme_options',
		'priority'    => 58,
	) );

	if ( defined( 'NNS_URI' ) ) {


		$wp_customize->add_setting( 'show_slider_on_homepage', array(
			'sanitize_callback' => 'helium_boolean',
			'default'           => false,
			'transport'         => 'postMessage',

		) );

		$wp_customize->add_control( 'show_slider_on_homepage', array(
			'label'    => __( 'Show slider on home page', 'page-speed' ),
			'section'  => 'home_slider',
			'type'     => 'checkbox',
			'priority' => 10,
		) );


		$wp_customize->add_setting( 'home_slider_categories', array(
			'sanitize_callback' => 'helium_pass',
			'default'           => array( 0 ),
			'transport'         => 'postMessage',

		) );


		$wp_customize->add_control(
			new Helium_Category_Dropdown_Control(
				$wp_customize,
				'home_slider_categories',
				array(
					'label'    => esc_html__( 'Slider Categories', 'page-speed' ),
					'section'  => 'home_slider',
					'priority' => 10,
//					'active_callback' => 'pagespeed_is_slider_enabled',
				)
			)
		);


		$wp_customize->add_setting( 'home_slider_posts_per_page', array(
			'sanitize_callback' => 'absint',
			'default'           => 4,
			'transport'         => 'postMessage',

		) );


		$wp_customize->add_control( 'home_slider_posts_per_page', array(
			'label'       => __( 'Number of posts to show in slider', 'page-speed' ),
			'section'     => 'home_slider',
			'type'        => 'number',
			'priority'    => 10,
//			'active_callback' => 'pagespeed_is_slider_enabled',
			'input_attrs' => array( 'min' => 1, 'max' => 20 )
		) );


		$wp_customize->add_setting( 'home_slider_height', array(
			'sanitize_callback' => 'absint',
			'default'           => (int) helium_get_site_width() / 2,
			'transport'         => 'postMessage',

		) );


		$wp_customize->add_control( 'home_slider_height', array(
			'label'       => __( 'Slider height', 'page-speed' ),
			'description' => __( 'Slider height in pixels without the units.', 'page-speed' ) . ' ' . __( 'Default', 'page-speed' ) . ': site_width/2',
			'section'     => 'home_slider',
			'type'        => 'number',
			'priority'    => 10,
//			'active_callback' => 'pagespeed_is_slider_enabled',
			'input_attrs' => array( 'min' => 300, 'max' => 1000 )
		) );


	} else {
		$wp_customize->add_setting( 'home-slider-help', array( 'sanitize_callback' => 'sanitize_text_field', ) );

		$wp_customize->add_control( new Helium_Help_Text( $wp_customize, 'home-slider-help', array(
			'section'  => 'home_slider',
			'priority' => 15,
			'label'    => __( ' ', 'page-speed' ),
			'type'     => 'info',
			'content'  => sprintf( __( 'Install the "No Nonsense Slider" from the %srecommended plugins%s to use the slider options here.', 'page-speed' ),
				'<a href="' . admin_url( 'themes.php?page=tgmpa-install-plugins' ) . '" target="_blank">', '</a>' ),
		) ) );
	}
}
