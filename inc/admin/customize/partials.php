<?php
function pagespeed_customize_register( WP_Customize_Manager $wp_customize ) {
	$wp_customize->selective_refresh->add_partial( 'body_classes', array(
		'settings'            => array( 'container_type', 'theme_layout', 'separate_containers' ),
		'selector'            => '#boom',
		'type'                => 'body_classes',
		'container_inclusive' => false,
		'render_callback'     => function () {
			return join( ' ', get_body_class() );
		},
		'fallback_refresh'    => false
	) );

	//Unlider
	/* @todo When unslider is present, get the unslider and trigger the slider
	 * again in javascript. This will be used full for slider settings as well.
	 * Listen to the event
	 *
	 */
	$wp_customize->selective_refresh->add_partial( 'home_slider', array(
		'settings'            => array(
			'container_type',
			'show_slider_on_homepage',
			'home_slider_categories',
			'home_slider_posts_per_page',
			'home_slider_height'
		),
		'type'                => 'home_slider',
		'selector'            => '.srs_-slider',
		'container_inclusive' => true,
		'render_callback'     => function () {
			pagespeed_srs__home_slider();
		},
		'fallback_refresh'    => false
	) );

	$wp_customize->selective_refresh->add_partial( 'masonry', array(
		'settings'            => array(
			'separate_containers',
			'use_masonry',
			'masonry_column_count',
			'site_width',
			'main_width'
		),
		'type'                => 'masonry',
		'selector'            => '#boom',
		'container_inclusive' => false,
		'render_callback'     => function () {
			return '_';
		},
		'fallback_refresh'    => false
	) );

}

add_action( 'customize_register', 'pagespeed_customize_register' );


