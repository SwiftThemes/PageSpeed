<?php
/**
 * Created by PhpStorm.
 * User: satish
 * Date: 09/02/17
 * Time: 9:44 PM
 */

add_action( 'customize_register', 'nybr_customize_post', 700 );
function nybr_customize_post( $wp_customize ) {


	$wp_customize->add_panel( 'single_post', array(
		'title'       => __( 'Single post/page', 'nybr' ),
		'description' => '', // Include html tags such as <p>
		'priority'    => 50, // Mixed with top-level-section hierarchy.
	) );

	$wp_customize->add_section( 'single_post_design', array(
		'title'    => __( 'Design', 'nybr' ),
		'panel'    => 'single_post',
		'priority' => 30,
	) );

	$wp_customize->add_section( 'single_post_meta', array(
		'title'       => __( 'Meta options', 'nybr' ),
		'panel'       => 'single_post',
		'description' => __( 'Here you can customize the meta information above and below the post title, and after post content. Here is the list of short codes you can use.', 'nybr' ) . '
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


	// Show thumbnail
	$wp_customize->add_setting( 'single_post_show_thumbnails', array(
		'default' => 1,
	) );

	$wp_customize->add_control( 'single_post_show_thumbnails', array(
		'label'   => __( 'Show thumbnail on single post', 'nybr' ),
		'section' => 'single_post_design',
		'type'    => 'checkbox',

	) );

	// Thumbnail size
	$wp_customize->add_setting( 'single_post_thumb_width', array(
		'default' => '120',
	) );
	$wp_customize->add_setting( 'single_post_thumb_height', array(
		'default' => '120',
	) );

	$wp_customize->add_setting( 'single_post_thumb_position', array(
		'default' => 'right',
	) );

	$wp_customize->add_control(
		new Helium_Customize_Control_Image_Size(
			$wp_customize,
			'single_post_thumb',
			array(
				'label'    => esc_html__( 'Single post thumbnail size', 'nybr' ),
				'section'  => 'single_post_design',
				'priority' => 10,
				'type'     => 'text',
				'settings' => array(
					'single_post_thumb_width',
					'single_post_thumb_height',
					'single_post_thumb_position',
				),
			)
		)
	);


	$wp_customize->add_setting( 'single_post_meta_above_title', array(
		'default' => '[cat]'.__('Filed under','nybr').'&nbsp;[/cat]',
	) );
	$wp_customize->add_setting( 'single_post_meta_below_title', array(
		'default' => __('Published by','nybr').'&nbsp;[author] on [date_published]<hr class="separator">',
	) );
	$wp_customize->add_setting( 'single_post_meta_after_body', array(
		'default' => '[tag]Tagged with&nbsp;[/tag]',
	) );

	$wp_customize->add_control( 'single_post_meta_above_title', array(
		'label'   => __( 'Meta above the post title', 'nybr' ),
		'section' => 'single_post_meta',
		'type'    => 'textarea',
	) );

	$wp_customize->add_control( 'single_post_meta_below_title', array(
		'label'   => __( 'Meta below the post title', 'nybr' ),
		'section' => 'single_post_meta',
		'type'    => 'textarea',
	) );
	$wp_customize->add_control( 'single_post_meta_after_body', array(
		'label'       => __( 'Meta after the post content', 'nybr' ),
		'description' => __( 'If just want a separator, add <br><code>&lt;hr class="separator"&gt;</code> <br>without any spaces', 'nybr' ),
		'section'     => 'single_post_meta',
		'type'        => 'textarea',
	) );

}
