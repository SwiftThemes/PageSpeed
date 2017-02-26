<?php
/**
 * Created by PhpStorm.
 * User: satish
 * Date: 09/02/17
 * Time: 9:42 PM
 */

//add_action( 'customize_register', 'helium_customize', 999 );
function helium_customize( $wp_customize ) {
	$wp_customize->add_section( 'nybr_post_page_settings', array(
		'title'       => 'Post/Page meta',
		'priority'    => 40,
		'description' => 'Here you can customize the areas around post and page content. Here is the list of shortcodes you can use in post meta
		<code>[author]</code>
		<code>[cat]</code>
		<code>[tag]</code>
		<code>[published_date]</code>
		<code>[updated_date]</code>
		',
	) );
	$locations = [
		array(
			'name'    => 'meta_above_title_archives',
			'label'   => __( 'Above the post title on home/archives', 'helium' ),
			'default' => '',
		),
		array(
			'name'    => 'meta_below_title_archives',
			'label'   => __( 'Below the post title on home/archives', 'helium' ),
			'default' => '',
		),
		array(
			'name'    => 'meta_after_body_archives',
			'label'   => __( 'After post content on home/archives', 'helium' ),
			'default' => '<hr>',
		),
		array(
			'name'    => 'meta_above_title_post',
			'label'   => __( 'Above the post title on single post', 'helium' ),
			'default' => '',
		),

		array(
			'name'    => 'meta_below_title_post',
			'label'   => __( 'Below the post title on single post', 'helium' ),
			'default' => '',
		),

		array(
			'name'    => 'meta_after_body_post',
			'label'   => __( 'After post content on single post', 'helium' ),
			'default' => '',
		),

		array(
			'name'    => 'meta_above_title_page',
			'label'   => __( 'Above the post title on page', 'helium' ),
			'default' => '',
		),

		array(
			'name'    => 'meta_below_title_page',
			'label'   => __( 'Below the post title on page', 'helium' ),
			'default' => '',
		),

		array(
			'name'    => 'meta_after_body_page',
			'label'   => __( 'After post content on page', 'helium' ),
			'default' => '',
		),

	];

	foreach ( $locations as $location ) :

		$wp_customize->add_setting( $location['name'], array(
			'default' => $location['default'],
		) );

		$wp_customize->add_control( $location['name'], array(
			'label'   => $location['label'],
			'section' => 'nybr_post_page_settings',
			'type'    => 'textarea',
		) );

	endforeach;

}