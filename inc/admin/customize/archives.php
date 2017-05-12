<?php
/**
 * Created by PhpStorm.
 * User: satish
 * Date: 09/02/17
 * Time: 9:44 PM
 */

add_action( 'customize_register', 'pagespeed_customize_archives', 600 );
function pagespeed_customize_archives( $wp_customize ) {


	$wp_customize->add_panel( 'archives', array(
		'title'       => __( 'Archives (Categories,Tags etc&hellip;)', 'page-speed' ),
		'description' => '', // Include html tags such as <p>
		'priority'    => 30, // Mixed with top-level-section hierarchy.
	) );

	$wp_customize->add_section( 'archives_design', array(
		'title'    => __( 'Design', 'page-speed' ),
		'panel'    => 'archives',
		'priority' => 30,
	) );

	$wp_customize->add_section( 'archives_meta', array(
		'title'       => __( 'Meta options', 'page-speed' ),
		'panel'       => 'archives',
		'description' => __( 'Here you can customize the mete information above and below the post title, and after post content. Here is the list of shortcodes you can use.', 'page-speed' ) . '
		<pre>
[author],
[cat]Filed under&amp;nbsp;[/cat],
[tag]Tagged with&amp;nbsp;[/tag],
[date_published],
[date_updated],
&lt;hr class="separator"&gt;
</pre>',
		'priority'    => 30,
	) );


	// Show excerpts or full post
	$wp_customize->add_setting( 'archives_show_excerpts', array(
		'sanitize_callback' => 'helium_boolean',
		'default'           => true,
	) );

	$wp_customize->add_control( 'archives_show_excerpts', array(
		'label'   => 'Show excerpts on archives',
		'section' => 'archives_design',
		'type'    => 'checkbox',

	) );

	// Show thumbnail
	$wp_customize->add_setting( 'archives_show_thumbnails', array(
		'sanitize_callback' => 'helium_boolean',
		'default'           => true,

	) );

	$wp_customize->add_control( 'archives_show_thumbnails', array(
		'label'   => __( 'Show thumbnails on archives', 'page-speed' ),
		'section' => 'archives_design',
		'type'    => 'checkbox',

	) );

	// Thumbnail size
	$wp_customize->add_setting( 'archives_thumb_width', array(
		'sanitize_callback' => 'absint',
		'default' => '120',

	) );
	$wp_customize->add_setting( 'archives_thumb_height', array(
		'sanitize_callback' => 'absint',
		'default' => '120',
	) );

	$wp_customize->add_setting( 'archives_thumb_position', array(
		'sanitize_callback' => 'esc_attr',
		'default' => 'alternate',

	) );

	$wp_customize->add_control(
		new Helium_Customize_Control_Image_Size(
			$wp_customize,
			'archives_thumb',
			array(
				'label'    => esc_html__( 'Archives thumbnail size', 'page-speed' ),
				'section'  => 'archives_design',
				'priority' => 10,
				'type'     => 'text',
				'settings' => array(
					'archives_thumb_width',
					'archives_thumb_height',
					'archives_thumb_position',
				),
			)
		)
	);


	$wp_customize->add_setting( 'archives_meta_above_title', array(
		'sanitize_callback' => 'helium_meta',
		'default' => '',

	) );
	$wp_customize->add_setting( 'archives_meta_below_title', array(
		'sanitize_callback' => 'helium_meta',
		'default' => '',
	) );
	$wp_customize->add_setting( 'archives_meta_after_body', array(
		'sanitize_callback' => 'helium_meta',
		'default' => '[cat]Filed under&nbsp;[/cat]',
	) );

	$wp_customize->add_control( 'archives_meta_above_title', array(
		'label'   => __( 'Meta above the post title', 'page-speed' ),
		'section' => 'archives_meta',
		'type'    => 'textarea',
	) );

	$wp_customize->add_control( 'archives_meta_below_title', array(
		'label'   => __( 'Meta below the post title', 'page-speed' ),
		'section' => 'archives_meta',
		'type'    => 'textarea',
	) );
	$wp_customize->add_control( 'archives_meta_after_body', array(
		'label'       => __( 'Meta after the post content', 'page-speed' ),
		'description' => __( 'If just want a separator, add <br><code>&lt;hr class="separator"&gt;</code> <br>without any spaces', 'page-speed' ),
		'section'     => 'archives_meta',
		'type'        => 'textarea',
	) );

}
