<?php
GLOBAL $theme_options;
$theme_options = array();

$theme_options[] = array(
	'display_id' => 'sidebars',
	'name'       => 'Sidebars',
	'desc'       => 'Choose how many different sidebars you want.',
	'type'       => 'title'
);

$theme_options[] = array(
	'id'       => 'dedicated_sidebars_on_home',
	'name'     => 'Dedicated sidebars for home page',
	'desc'     => __( 'Create separate sidebars for home page.', 'helium' ),
	'type'     => 'checkbox',
	'default'  => false,
	'sanitize' => 'boolean'
);
$theme_options[] = array(
	'id'       => 'dedicated_sidebars_on_default_page_template',
	'name'     => 'Dedicated sidebars for default page template',
	'desc'     => __( 'Create separate sidebars for home page.', 'helium' ),
	'type'     => 'checkbox',
	'default'  => false,
	'sanitize' => 'boolean'
);

$theme_options[] = array(
	'id'       => 'enable_sticky_sidebars',
	'name'     => 'Create sticky sidebars',
	'desc'     => __( 'Sticky sidebars or floating sidebars are sidebars that stick/float on the screen when the user is scrolling the page.', 'helium' ),
	'type'     => 'checkbox',
	'default'  => true,
	'sanitize' => 'boolean'
);

$theme_options[] = array(
	'display_id' => 'header',
	'name'       => 'Header',
	'desc'       => 'Choose how many different sidebars you want.',
	'type'       => 'title'
);


$theme_options[] = array(
	'id'       => 'enable_sleek_header',
	'name'     => 'Enable sleek header',
	'desc'     => __( 'Includes the navigation menu in the header for a sleek look. Use a logo with height 32 to 64px for the best look.', 'helium' ),
	'type'     => 'checkbox',
	'default'  => false,
	'sanitize' => 'boolean'
);
