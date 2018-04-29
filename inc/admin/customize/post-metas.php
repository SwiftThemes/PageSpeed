<?php


add_action( 'customize_register', 'pagespeed_customize_post_meta', 600 );
function pagespeed_customize_post_meta( $wp_customize ) {
	$wp_customize->add_panel( 'post_meta', array(
		'title'       => __( 'Meta Information', 'page-speed' ),
		'description' => __( 'Meta information that is displayed around the post title and at the end of post can be set here.', 'page-speed' ),
		// Include html tags such as <p>
		'priority'    => 45,
		// Mixed with top-level-section hierarchy.
	) );


	$description = __( 'Here you can customize the meta information above and below the post title, and after post content. Here is the list of shortcodes you can use.', 'page-speed' ) . '
		<pre>
[author],
[cat]Filed under&amp;nbsp;[/cat],
[tag]Tagged with&amp;nbsp;[/tag],
[date_published],
[date_updated],
&lt;hr class="separator"&gt;
</pre>';


	$wp_customize->add_section( 'home_page_meta', array(
		'title'       => __( 'Latest Posts', 'page-speed' ),
		'panel'       => 'post_meta',
		'description' => $description,
		'priority'    => 30,
	) );

	$wp_customize->add_section( 'archives_meta', array(
		'title'       => __( 'Archives, Categories, Tags', 'page-speed' ),
		'panel'       => 'post_meta',
		'description' => $description,
		'priority'    => 30,
	) );

	$wp_customize->add_section( 'single_post_meta', array(
		'title'       => __( 'Single post', 'page-speed' ),
		'panel'       => 'post_meta',
		'description' => $description,
		'priority'    => 30,
	) );
	$wp_customize->add_section( 'single_page_meta', array(
		'title'       => __( 'Single page', 'page-speed' ),
		'panel'       => 'post_meta',
		'description' => $description,
		'priority'    => 30,
	) );


	/**
	 * Home
	 */
	$default = array(
		array( 'key' => 'Tag', 'value' => __( 'Tagged with', 'page-speed' ) . '&nbsp;' ),
	);
	$wp_customize->add_setting( 'home_meta_above_title', array(
		'sanitize_callback' => 'helium_sanitize_post_meta',
		'default'           => array(),

	) );
	$wp_customize->add_setting( 'home_meta_below_title', array(
		'sanitize_callback' => 'helium_sanitize_post_meta',
		'default'           => array(),
	) );
	$wp_customize->add_setting( 'home_meta_after_body', array(
		'sanitize_callback' => 'helium_sanitize_post_meta',
		'default'           => $default,
	) );


	$wp_customize->add_control(
		new Helium_Customize_Control_Drag_Drop(
			$wp_customize,
			'home_meta_above_title',
			array(
				'label'    => esc_html__( 'Meta above the post title', 'page-speed' ),
				'section'  => 'home_page_design',
				'priority' => 12,
				'type'     => 'he_drag_drop',
			)
		)
	);
	$wp_customize->add_control(
		new Helium_Customize_Control_Drag_Drop(
			$wp_customize,
			'home_meta_below_title',
			array(
				'label'    => esc_html__( 'Meta below the post title', 'page-speed' ),
				'section'  => 'home_page_design',
				'priority' => 12,
				'type'     => 'he_drag_drop',
				'booom'    => 'test variable'
			)
		)
	);
	$wp_customize->add_control(
		new Helium_Customize_Control_Drag_Drop(
			$wp_customize,
			'home_meta_after_body',
			array(
				'label'    => esc_html__( 'Meta after the post content', 'page-speed' ),
				'section'  => 'home_page_design',
				'priority' => 12,
				'type'     => 'he_drag_drop',
			)
		)
	);

	/**
	 * Archives
	 */

	$default = array(
		array( 'key' => 'Tags', 'value' => __( 'Tagged with', 'page-speed' ) . '&nbsp;' ),
	);
	$wp_customize->add_setting( 'archives_meta_above_title', array(
		'sanitize_callback' => 'helium_sanitize_post_meta',
		'default'           => array(),

	) );
	$wp_customize->add_setting( 'archives_meta_below_title', array(
		'sanitize_callback' => 'helium_sanitize_post_meta',
		'default'           => array(),
	) );
	$wp_customize->add_setting( 'archives_meta_after_body', array(
		'sanitize_callback' => 'helium_sanitize_post_meta',
		'default'           => $default,
	) );


	$wp_customize->add_control(
		new Helium_Customize_Control_Drag_Drop(
			$wp_customize,
			'archives_meta_above_title',
			array(
				'label'    => esc_html__( 'Meta above the post title', 'page-speed' ),
				'section'  => 'archives_design',
				'priority' => 12,
				'type'     => 'he_drag_drop',
			)
		)
	);
	$wp_customize->add_control(
		new Helium_Customize_Control_Drag_Drop(
			$wp_customize,
			'archives_meta_below_title',
			array(
				'label'    => esc_html__( 'Meta below the post title', 'page-speed' ),
				'section'  => 'archives_design',
				'priority' => 12,
				'type'     => 'he_drag_drop',
			)
		)
	);
	$wp_customize->add_control(
		new Helium_Customize_Control_Drag_Drop(
			$wp_customize,
			'archives_meta_after_body',
			array(
				'label'    => esc_html__( 'Meta after the post content', 'page-speed' ),
				'section'  => 'archives_design',
				'priority' => 12,
				'type'     => 'he_drag_drop',
			)
		)
	);


	/**
	 * Single post
	 */


	$wp_customize->add_setting( 'hide_breadcrumbs_on_post', array(
		'sanitize_callback' => 'helium_boolean',
		'default'           => false,
	) );

	$wp_customize->add_control( 'hide_breadcrumbs_on_post', array(
		'label'   => __( 'Hide breadcrumbs on single post. Breadcrumbs add SEO value to the page, disable them only if you know what you are doing.', 'page-speed' ),
		'section' => 'single_post_design',
		'type'    => 'checkbox',
	) );
	
	$above_title_default   = array(
		array( 'key' => 'Cat', 'value' => __( 'Filed under', 'page-speed' ) . '&nbsp;' )
	);
	$below_title_default   = array(
		array( 'key' => 'Text', 'value' => __( 'Published by', 'page-speed' ) . '&nbsp;' ),
		array( 'key' => 'AuthorLink', 'value' => false ),
		array( 'key' => 'Text', 'value' => __( 'on', 'page-speed' ) . '&nbsp;' ),
		array( 'key' => 'Published', 'value' => false ),
		array( 'key' => 'Line', 'value' => false ),
	);
	$after_content_default = array(
		array( 'key'=>'Tags' ,'value'=> __( 'Tagged with', 'page-speed' ) . '&nbsp;' ),
	);


	$wp_customize->add_setting( 'single_post_meta_above_title', array(
		'sanitize_callback' => 'helium_sanitize_post_meta',
		'default'           => $above_title_default,
	) );
	$wp_customize->add_setting( 'single_post_meta_below_title', array(
		'sanitize_callback' => 'helium_sanitize_post_meta',
		'default'           => $below_title_default,
	) );
	$wp_customize->add_setting( 'single_post_meta_after_body', array(
		'sanitize_callback' => 'helium_sanitize_post_meta',
		'default'           => $after_content_default,
	) );

	$wp_customize->add_control(
		new Helium_Customize_Control_Drag_Drop(
			$wp_customize,
			'single_post_meta_above_title',
			array(
				'label'    => esc_html__( 'Meta above the post title', 'page-speed' ),
				'section'  => 'single_post_design',
				'priority' => 12,
				'type'     => 'he_drag_drop',
			)
		)
	);
	$wp_customize->add_control(
		new Helium_Customize_Control_Drag_Drop(
			$wp_customize,
			'single_post_meta_below_title',
			array(
				'label'    => esc_html__( 'Meta below the post title', 'page-speed' ),
				'section'  => 'single_post_design',
				'priority' => 12,
				'type'     => 'he_drag_drop',
			)
		)
	);
	$wp_customize->add_control(
		new Helium_Customize_Control_Drag_Drop(
			$wp_customize,
			'single_post_meta_after_body',
			array(
				'label'    => esc_html__( 'Meta after the post content', 'page-speed' ),
				'section'  => 'single_post_design',
				'priority' => 12,
				'type'     => 'he_drag_drop',
			)
		)
	);

	/**
	 * Single page
	 */


	$wp_customize->add_setting( 'hide_breadcrumbs_on_page', array(
		'sanitize_callback' => 'helium_boolean',
		'default'           => false,
	) );

	$wp_customize->add_control( 'hide_breadcrumbs_on_page', array(
		'label'   => __( 'Hide breadcrumbs on single page. Breadcrumbs add SEO value to the page, disable them only if you know what you are doing. Note: There is an option to hide breadcrumbs individually on a per page basis from the page edit screen.', 'page-speed' ),
		'section' => 'single_page_design',
		'type'    => 'checkbox',
	) );


	$above_title_default   = array(
		array()
	);
	$below_title_default   = array(
		array( 'key' => 'Text', 'value' => __( 'Written by', 'page-speed' ) . '&nbsp;' ),
		array( 'key' => 'AuthorLink', 'value' => false ),
		array( 'key' => 'Line', 'value' => false ),
	);
	$after_content_default = array(
		array( 'key' => 'Text', 'value' => __( 'Published on', 'page-speed' ) . '&nbsp;' ),
		array( 'key' => 'Published', 'value' => false ),
	);


	$wp_customize->add_setting( 'single_page_meta_above_title', array(
		'sanitize_callback' => 'helium_sanitize_post_meta',
		'default'           => $above_title_default,
	) );
	$wp_customize->add_setting( 'single_page_meta_below_title', array(
		'sanitize_callback' => 'helium_sanitize_post_meta',
		'default'           => $below_title_default,
	) );
	$wp_customize->add_setting( 'single_page_meta_after_body', array(
		'sanitize_callback' => 'helium_sanitize_post_meta',
		'default'           => $after_content_default,
	) );
	$wp_customize->add_control(
		new Helium_Customize_Control_Drag_Drop(
			$wp_customize,
			'single_page_meta_above_title',
			array(
				'label'    => esc_html__( 'Meta above the post title', 'page-speed' ),
				'section'  => 'single_page_design',
				'priority' => 12,
				'type'     => 'he_drag_drop',
			)
		)
	);
	$wp_customize->add_control(
		new Helium_Customize_Control_Drag_Drop(
			$wp_customize,
			'single_page_meta_below_title',
			array(
				'label'    => esc_html__( 'Meta below the post title', 'page-speed' ),
				'section'  => 'single_page_design',
				'priority' => 12,
				'type'     => 'he_drag_drop',
			)
		)
	);
	$wp_customize->add_control(
		new Helium_Customize_Control_Drag_Drop(
			$wp_customize,
			'single_page_meta_after_body',
			array(
				'label'    => esc_html__( 'Meta after the post content', 'page-speed' ),
				'section'  => 'single_page_design',
				'priority' => 12,
				'type'     => 'he_drag_drop',
			)
		)
	);


}