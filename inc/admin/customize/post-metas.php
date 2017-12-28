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


//	$wp_customize->add_setting( 'home_meta_above_title', array(
//		'sanitize_callback' => 'helium_meta',
//		'default'           => '',
//
//	) );
//	$wp_customize->add_setting( 'home_meta_below_title', array(
//		'sanitize_callback' => 'helium_meta',
//		'default'           => '',
//	) );
//	$wp_customize->add_setting( 'home_meta_after_body', array(
////		'sanitize_callback' => 'helium_meta',
////		'default'           => '[cat]Filed under&nbsp;[/cat]',
////	) );
//
//	$wp_customize->add_control( 'home_meta_above_title', array(
//		'label'   => __( 'Meta above the post title', 'page-speed' ),
//		'section' => 'home_page_meta',
//		'type'    => 'textarea',
//	) );
//
//	$wp_customize->add_control( 'home_meta_below_title', array(
//		'label'   => __( 'Meta below the post title', 'page-speed' ),
//		'section' => 'home_page_meta',
//		'type'    => 'textarea',
//	) );
//	$wp_customize->add_control( 'home_meta_after_body', array(
//		'label'       => __( 'Meta after the post content', 'page-speed' ),
//		'description' => __( 'If just want a separator, add <br><code>&lt;hr class="separator"&gt;</code> <br>without any spaces', 'page-speed' ),
//		'section'     => 'home_page_meta',
//		'type'        => 'textarea',
//	) );


	/**
	 * Archives
	 */


	$wp_customize->add_setting( 'archives_meta_above_title', array(
		'sanitize_callback' => 'helium_meta',
		'default'           => '',

	) );
	$wp_customize->add_setting( 'archives_meta_below_title', array(
		'sanitize_callback' => 'helium_meta',
		'default'           => '',
	) );
	$wp_customize->add_setting( 'archives_meta_after_body', array(
		'sanitize_callback' => 'helium_meta',
		'default'           => '[cat]Filed under&nbsp;[/cat]',
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


	/**
	 * Single post
	 */
	$wp_customize->add_setting( 'single_post_meta_above_title', array(
		'sanitize_callback' => 'helium_meta',
		'default'           => '[cat]' . __( 'Filed under', 'page-speed' ) . '&nbsp;[/cat]',
	) );
	$wp_customize->add_setting( 'single_post_meta_below_title', array(
		'sanitize_callback' => 'helium_meta',
		'default'           => __( 'Published by', 'page-speed' ) . '&nbsp;[author] on [date_published]<hr class="separator">',
	) );
	$wp_customize->add_setting( 'single_post_meta_after_body', array(
		'sanitize_callback' => 'helium_meta',
		'default'           => '[tag]Tagged with&nbsp;[/tag]',
	) );

	$wp_customize->add_control( 'single_post_meta_above_title', array(
		'label'   => __( 'Meta above the post title', 'page-speed' ),
		'section' => 'single_post_meta',
		'type'    => 'textarea',
	) );

	$wp_customize->add_control( 'single_post_meta_below_title', array(
		'label'   => __( 'Meta below the post title', 'page-speed' ),
		'section' => 'single_post_meta',
		'type'    => 'textarea',
	) );
	$wp_customize->add_control( 'single_post_meta_after_body', array(
		'label'       => __( 'Meta after the post content', 'page-speed' ),
		'description' => __( 'If just want a separator, add <br><code>&lt;hr class="separator"&gt;</code> <br>without any spaces', 'page-speed' ),
		'section'     => 'single_post_meta',
		'type'        => 'textarea',
	) );

	/**
	 * Single page
	 */
	$wp_customize->add_setting( 'single_page_meta_above_title', array(
		'sanitize_callback' => 'helium_meta',
		'default'           => '',
	) );
	$wp_customize->add_setting( 'single_page_meta_below_title', array(
		'sanitize_callback' => 'helium_meta',
		'default'           => __( 'Published by', 'page-speed' ) . '&nbsp;[author] on [date_published]<hr class="separator">',
	) );
	$wp_customize->add_setting( 'single_page_meta_after_body', array(
		'sanitize_callback' => 'helium_meta',
		'default'           => '',
	) );

	$wp_customize->add_control( 'single_page_meta_above_title', array(
		'label'   => __( 'Meta above the page title', 'page-speed' ),
		'section' => 'single_page_meta',
		'type'    => 'textarea',
	) );

	$wp_customize->add_control( 'single_page_meta_below_title', array(
		'label'   => __( 'Meta below the page title', 'page-speed' ),
		'section' => 'single_page_meta',
		'type'    => 'textarea',
	) );

	$wp_customize->add_control( 'single_page_meta_after_body', array(
		'label'       => __( 'Meta after the page content', 'page-speed' ),
		'description' => __( 'If just want a separator, add <br><code>&lt;hr class="separator"&gt;</code> <br>without any spaces', 'page-speed' ),
		'section'     => 'single_page_meta',
		'type'        => 'textarea',
	) );




	//@todo delete when done

	$wp_customize->add_setting( 'single_page_meta_after_body_', array(
//		'sanitize_callback' => '',
		'default'           => '',
	) );
	$wp_customize->add_setting( 'single_page_meta_after_body__', array(
//		'sanitize_callback' => '',
		'default'           => '',
	) );
	$wp_customize->add_setting( 'single_page_meta_after_body___', array(
//		'sanitize_callback' => '',
		'default'           => '',
	) );





	$wp_customize->add_setting( 'home_meta_above_title', array(
		'sanitize_callback' => 'helium_pass',
		'default'           => '',

	) );
	$wp_customize->add_setting( 'home_meta_below_title', array(
		'sanitize_callback' => 'helium_pass',
		'default'           => '',
	) );
	$wp_customize->add_setting( 'home_meta_after_body', array(
		'sanitize_callback' => 'helium_pass',
		'default'           => '[cat]Filed under&nbsp;[/cat]',
	) );



	$wp_customize->add_control(
		new Helium_Customize_Control_Drag_Drop(
			$wp_customize,
			'home_meta_above_title',
			array(
				'label'    => esc_html__( 'Meta above the post title', 'page-speed' ),
				'section'  => 'home_page_design',
				'priority' => 2,
				'type'     => 'he_drag_drop',
				'booom'=>'test variable'
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
				'priority' => 2,
				'type'     => 'he_drag_drop',
				'booom'=>'test variable'
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
				'priority' => 2,
				'type'     => 'he_drag_drop',
				'booom'=>'test variable'
			)
		)
	);

}