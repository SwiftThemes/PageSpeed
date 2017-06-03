<?php

function pagespeed_sidebar_defaults( $args ) {
	$args['before_title'] = '<div class="widget-title heading">';
	$args['after_title']  = '</div>';

	return $args;
}

apply_filters( 'hybrid_sidebar_defaults', 'pagespeed_sidebar_defaults', 1 );

/**
 * Registers sidebars.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function pagespeed_register_sidebars() {
	if ( get_theme_mod( 'theme_layout', '' ) === 'centered' ) {

		hybrid_register_sidebar(
			array(
				'id'           => 'left-home',
				'name'         => esc_html_x( 'Left Sidebar #LatestPosts', 'sidebar', 'page-speed' ),
				'description'  => esc_html__( 'Appears on the left of main content, above the sticky widgets.', 'page-speed' ),
				'before_title' => '<div class="widget-title heading">',
				'after_title'  => '</div>',
			)
		);

		hybrid_register_sidebar(
			array(
				'id'           => 'left-sticky-home',
				'name'         => esc_html_x( 'Left Sidebar Sticky #LatestPosts', 'sidebar', 'page-speed' ),
				'description'  => esc_html__( 'Appears on the left of main content. Widgets added to this sidebar stick to the top of the page when you scroll', 'page-speed' ),
				'before_title' => '<div class="widget-title heading">',
				'after_title'  => '</div>',
			)
		);

		hybrid_register_sidebar(
			array(
				'id'           => 'right-home',
				'name'         => esc_html_x( 'Right Sidebar #LatestPosts', 'sidebar', 'page-speed' ),
				'description'  => esc_html__( 'Appears on the right of main content, below the sticky widgets.', 'page-speed' ),
				'before_title' => '<div class="widget-title heading">',
				'after_title'  => '</div>',
			)
		);

		hybrid_register_sidebar(
			array(
				'id'           => 'right-sticky-home',
				'name'         => esc_html_x( 'Right Sidebar Sticky #LatestPosts', 'sidebar', 'page-speed' ),
				'description'  => esc_html__( 'Appears on the right of main content. Widgets added to this sidebar stick to the top of the page when you scroll', 'page-speed' ),
				'before_title' => '<div class="widget-title heading">',
				'after_title'  => '</div>',
			)
		);
		hybrid_register_sidebar(
			array(
				'id'           => 'left-single',
				'name'         => esc_html_x( 'Left Sidebar  #Single', 'sidebar', 'page-speed' ),
				'description'  => esc_html__( 'Appears on the left of main content, below the sticky widgets.', 'page-speed' ),
				'before_title' => '<div class="widget-title heading">',
				'after_title'  => '</div>',
			)
		);

		hybrid_register_sidebar(
			array(
				'id'           => 'left-sticky-single',
				'name'         => esc_html_x( 'Left Sidebar Sticky  #Single', 'sidebar', 'page-speed' ),
				'description'  => esc_html__( 'Appears on the left of main content. Widgets added to this sidebar stick to the top of the page when you scroll', 'page-speed' ),
				'before_title' => '<div class="widget-title heading">',
				'after_title'  => '</div>',
			)
		);

		hybrid_register_sidebar(
			array(
				'id'           => 'right-single',
				'name'         => esc_html_x( 'Right Sidebar  #Single', 'sidebar', 'page-speed' ),
				'description'  => esc_html__( 'Appears on the right of main content, below the sticky widgets.', 'page-speed' ),
				'before_title' => '<div class="widget-title heading">',
				'after_title'  => '</div>',
			)
		);

		hybrid_register_sidebar(
			array(
				'id'           => 'right-sticky-single',
				'name'         => esc_html_x( 'Right Sidebar Sticky  #Single', 'sidebar', 'page-speed' ),
				'description'  => esc_html__( 'Appears on the right of main content. Widgets added to this sidebar stick to the top of the page when you scroll', 'page-speed' ),
				'before_title' => '<div class="widget-title heading">',
				'after_title'  => '</div>',
			)
		);

	} else {

		hybrid_register_sidebar(
			array(
				'id'           => 'left-home',
				'name'         => esc_html_x( 'Sidebar #LatestPosts', 'sidebar', 'page-speed' ),
				'description'  => esc_html__( 'Above the sticky sidebar.', 'page-speed' ),
				'before_title' => '<div class="widget-title heading">',
				'after_title'  => '</div>',
			)
		);

		hybrid_register_sidebar(
			array(
				'id'           => 'left-sticky-home',
				'name'         => esc_html_x( 'Sidebar sticky #LatestPosts', 'sidebar', 'page-speed' ),
				'description'  => esc_html__( 'Widgets added here stick to the page', 'page-speed' ),
				'before_title' => '<div class="widget-title heading">',
				'after_title'  => '</div>',
			)
		);
		hybrid_register_sidebar(
			array(
				'id'           => 'ns-1-home',
				'name'         => esc_html_x( 'Narrow sidebar left #LatestPosts', 'sidebar', 'page-speed' ),
				'description'  => esc_html__( 'Widgets added here appear below the sticky sidebar. Ideal for 120/160px wide ads, categories and archives', 'page-speed' ),
				'before_title' => '<div class="widget-title heading">',
				'after_title'  => '</div>',
			)
		);

		hybrid_register_sidebar(
			array(
				'id'           => 'ns-2-home',
				'name'         => esc_html_x( 'Narrow sidebar right #LatestPosts', 'sidebar', 'page-speed' ),
				'description'  => esc_html__( 'Widgets added here appear below the sticky sidebar. Ideal for 120/160px wide ads, categories and archives', 'page-speed' ),
				'before_title' => '<div class="widget-title heading">',
				'after_title'  => '</div>',
			)
		);
		hybrid_register_sidebar(
			array(
				'id'           => 'left-bottom-home',
				'name'         => esc_html_x( 'Below Narrow Sidebars #LatestPosts', 'sidebar', 'page-speed' ),
				'description'  => esc_html__( 'Widgets added here appear below the narrow sidebars', 'page-speed' ),
				'before_title' => '<div class="widget-title heading">',
				'after_title'  => '</div>',
			)
		);
		hybrid_register_sidebar(
			array(
				'id'           => 'left-single',
				'name'         => esc_html_x( 'Sidebar  #Single', 'sidebar', 'page-speed' ),
				'description'  => esc_html__( 'Above the sticky sidebar.', 'page-speed' ),
				'before_title' => '<div class="widget-title heading">',
				'after_title'  => '</div>',
			)
		);

		hybrid_register_sidebar(
			array(
				'id'           => 'left-sticky-single',
				'name'         => esc_html_x( 'Sidebar sticky  #Single', 'sidebar', 'page-speed' ),
				'description'  => esc_html__( 'Widgets added here stick to the page', 'page-speed' ),
				'before_title' => '<div class="widget-title heading">',
				'after_title'  => '</div>',
			)
		);
		hybrid_register_sidebar(
			array(
				'id'           => 'ns-1-single',
				'name'         => esc_html_x( 'Narrow sidebar left  #Single', 'sidebar', 'page-speed' ),
				'description'  => esc_html__( 'Widgets added here appear below the sticky sidebar. Ideal for 120/160px wide ads, categories and archives', 'page-speed' ),
				'before_title' => '<div class="widget-title heading">',
				'after_title'  => '</div>',
			)
		);

		hybrid_register_sidebar(
			array(
				'id'           => 'ns-2-single',
				'name'         => esc_html_x( 'Narrow sidebar right  #Single', 'sidebar', 'page-speed' ),
				'description'  => esc_html__( 'Widgets added here appear below the sticky sidebar. Ideal for 120/160px wide ads, categories and archives', 'page-speed' ),
				'before_title' => '<div class="widget-title heading">',
				'after_title'  => '</div>',
			)
		);
		hybrid_register_sidebar(
			array(
				'id'           => 'left-bottom-single',
				'name'         => esc_html_x( 'Below Narrow Sidebars  #Single', 'sidebar', 'page-speed' ),
				'description'  => esc_html__( 'Add sidebar description.', 'page-speed' ),
				'before_title' => '<div class="widget-title heading">',
				'after_title'  => '</div>',
			)
		);
	}

	register_sidebars( 4, array(
		'id'            => 'footer',
		'name'          => __( 'Footer %d', 'page-speed' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'description'  => esc_html__( 'Widgets added here appear below the narrow sidebars', 'page-speed' ),
		'before_title'  => '<div class="widget-title heading">',
		'after_title'   => '</div>',
	) );
}

add_action( 'widgets_init', 'pagespeed_register_sidebars' );
