<?php
/**
 * Created by PhpStorm.
 * User: satish
 * Date: 22/03/18
 * Time: 10:49 PM
 */


add_action( 'customize_register', 'pagespeed_customize_home', 600 );
function pagespeed_customize_home( $wp_customize ) {
	if ( NNS_URI ) {


		$wp_customize->add_setting( 'show_slider_on_homepage', array(
			'sanitize_callback' => 'helium_boolean',
			'default'           => false,
		) );

		$wp_customize->add_control( 'show_slider_on_homepage', array(
			'label'    => __( 'Show slider on home page', 'page-speed' ),
//			'description' => __( 'Create separate sidebars for home page.', 'page-speed' ),
			'section'  => 'home_page_design',
			'type'     => 'checkbox',
			'priority' => 10,
		) );


		$wp_customize->add_setting( 'home_slider_categories', array(
			'sanitize_callback' => 'helium_pass',
			'default'           => array( 0 ),
		) );


		$wp_customize->add_control(
			new Helium_Category_Dropdown_Control(
				$wp_customize,
				'home_slider_categories',
				array(
					'label'           => esc_html__( 'Slider Categories', 'page-speed' ),
					'section'         => 'home_page_design',
					'priority'        => 10,
					'active_callback' => function () {
						return get_theme_mod( 'show_slider_on_homepage', false );
					},
				)
			)
		);


		$wp_customize->add_setting( 'home_slider_posts_per_page', array(
			'sanitize_callback' => 'absint',
			'default'           => 4
		) );


		$wp_customize->add_control( 'home_slider_posts_per_page', array(
			'label'           => __( 'Number of posts to show in slider', 'page-speed' ),
//			'description'     => __( 'Slider height in pixels without the units.', 'page-speed' ) . ' ' . __( 'Default', 'page-speed' ) . ': site_width/2',
			'section'         => 'home_page_design',
			'type'            => 'number',
			'priority'        => 10,
			'active_callback' => function () {
				return get_theme_mod( 'show_slider_on_homepage', false );
			},
			'input_attrs'     => array( 'min' => 1, 'max' => 20 )
		) );



		$wp_customize->add_setting( 'home_slider_height', array(
			'sanitize_callback' => 'absint',
			'default'           => (int) helium_get_site_width() / 2
		) );


		$wp_customize->add_control( 'home_slider_height', array(
			'label'           => __( 'Slider height', 'page-speed' ),
			'description'     => __( 'Slider height in pixels without the units.', 'page-speed' ) . ' ' . __( 'Default', 'page-speed' ) . ': site_width/2',
			'section'         => 'home_page_design',
			'type'            => 'number',
			'priority'        => 10,
			'active_callback' => function () {
				return get_theme_mod( 'show_slider_on_homepage', false );
			},
			'input_attrs'     => array( 'min' => 300, 'max' => 1000 )
		) );


	}
}
