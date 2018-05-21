<?php
GLOBAL $page_speed_theme_options;
$page_speed_theme_options = array();
//$page_speed_theme_options[] = array(
//	'display_id' => 'sidebars',
//	'name'       => 'Sidebars',
//	'desc'       => 'Choose how many different sidebars you want.',
//	'type'       => 'title'
//);
//$page_speed_theme_options[] = array(
//	'id'       => 'dedicated_sidebars_on_home',
//	'name'     => 'Dedicated sidebars for home page',
//	'desc'     => __( 'Create separate sidebars for home page.', 'page-speed'),
//	'type'     => 'checkbox',
//	'default'  => false,
//	'sanitize' => 'boolean'
//);
//$page_speed_theme_options[] = array(
//	'id'       => 'dedicated_sidebars_on_default_page_template',
//	'name'     => 'Dedicated sidebars for default page template',
//	'desc'     => __( 'Create separate sidebars for home page.', 'page-speed'),
//	'type'     => 'checkbox',
//	'default'  => false,
//	'sanitize' => 'boolean'
//);
//$page_speed_theme_options[] = array(
//	'id'       => 'enable_sticky_sidebars',
//	'name'     => 'Create sticky sidebars',
//	'desc'     => __( 'Sticky sidebars or floating sidebars are sidebars that stick/float on the screen when the user is scrolling the page.', 'page-speed'),
//	'type'     => 'checkbox',
//	'default'  => true,
//	'sanitize' => 'boolean'
//);


$page_speed_theme_options[] = array(
	'id'       => 'enable_non_render_blocking_css',
	'name'     => 'Separate above fold CSS',
	'desc'     => __( 'Enable this option to eliminate render blocking CSS.<br />Please read <a href="https://swiftthemes.com/get-100-page-speed-score-mobile-desktops/"><strong>PageSpeed Optimization Guide</strong></a> for info to take advantage of this option.', 'page-speed'),
	'type'     => 'checkbox',
	'default'  => false,
	'sanitize' => 'boolean'
);

$page_speed_theme_options[] = array(
	'id'       => 'different_navigation_for_mobiles',
	'name'     => 'Different navigation menu for mobiles',
	'desc'     => __( 'Enable this option if you want to have different menus on mobiles', 'page-speed'),
	'type'     => 'checkbox',
	'default'  => false,
	'sanitize' => 'boolean'
);

$page_speed_theme_options[] = array(
	'id'       => 'different_navigation_for_tablets',
	'name'     => 'Different navigation menu for tablets',
	'desc'     => __( 'Enable this option if you want to have different menus on tablets', 'page-speed'),
	'type'     => 'checkbox',
	'default'  => false,
	'sanitize' => 'boolean'
);