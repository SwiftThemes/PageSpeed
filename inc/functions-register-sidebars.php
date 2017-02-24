<?php

function nybr_sidebar_defaults( $args ) {

	print_r( $args );
	boooooooo();
	$args['before_title'] = '<div class="widget-title heading">';
	$args['after_title']  = '</div>';

	return $args;
}

apply_filters( 'hybrid_sidebar_defaults', 'nybr_sidebar_defaults', 1 );

/**
 * Registers sidebars.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function nybr_register_sidebars() {
	if ( get_theme_mod( 'theme_layout', '' ) === 'centered' ) {

		hybrid_register_sidebar(
			array(
				'id'           => 'left',
				'name'         => esc_html_x( 'Left Sidebar', 'sidebar', 'nybr' ),
				'description'  => esc_html__( 'Appears on the left of main content, below the sticky widgets.', 'nybr' ),
				'before_title' => '<div class="widget-title heading">',
				'after_title'  => '</div>',
			)
		);
		hybrid_register_sidebar(
			array(
				'id'           => 'left-sticky',
				'name'         => esc_html_x( 'Left Sidebar Sticky', 'sidebar', 'nybr' ),
				'description'  => esc_html__( 'Appears on the left of main content. Widgets added to this sidebar stick to the top of the page when you scroll', 'nybr' ),
				'before_title' => '<div class="widget-title heading">',
				'after_title'  => '</div>',
			)
		);

		hybrid_register_sidebar(
			array(
				'id'           => 'right',
				'name'         => esc_html_x( 'Right Sidebar', 'sidebar', 'nybr' ),
				'description'  => esc_html__( 'Appears on the right of main content, below the sticky widgets.', 'nybr' ),
				'before_title' => '<div class="widget-title heading">',
				'after_title'  => '</div>',
			)
		);

		hybrid_register_sidebar(
			array(
				'id'           => 'right-sticky',
				'name'         => esc_html_x( 'Right Sidebar Sticky', 'sidebar', 'nybr' ),
				'description'  => esc_html__( 'Appears on the right of main content. Widgets added to this sidebar stick to the top of the page when you scroll', 'nybr' ),
				'before_title' => '<div class="widget-title heading">',
				'after_title'  => '</div>',
			)
		);

	} else {

		hybrid_register_sidebar(
			array(
				'id'           => 'left',
				'name'         => esc_html_x( 'Sidebar', 'sidebar', 'nybr' ),
				'description'  => esc_html__( 'Add sidebar description.', 'nybr' ),
				'before_title' => '<div class="widget-title heading">',
				'after_title'  => '</div>',
			)
		);

		hybrid_register_sidebar(
			array(
				'id'           => 'left-sticky',
				'name'         => esc_html_x( 'Sidebar sticky', 'sidebar', 'nybr' ),
				'description'  => esc_html__( 'Add sidebar description.', 'nybr' ),
				'before_title' => '<div class="widget-title heading">',
				'after_title'  => '</div>',
			)
		);
		hybrid_register_sidebar(
			array(
				'id'           => 'ns-1',
				'name'         => esc_html_x( 'Narrow sidebar left', 'sidebar', 'nybr' ),
				'description'  => esc_html__( 'Add sidebar description.', 'nybr' ),
				'before_title' => '<div class="widget-title heading">',
				'after_title'  => '</div>',
			)
		);

		hybrid_register_sidebar(
			array(
				'id'           => 'ns-2',
				'name'         => esc_html_x( 'Narrow sidebar right', 'sidebar', 'nybr' ),
				'description'  => esc_html__( 'Add sidebar description.', 'nybr' ),
				'before_title' => '<div class="widget-title heading">',
				'after_title'  => '</div>',
			)
		);
		hybrid_register_sidebar(
			array(
				'id'           => 'left-bottom',
				'name'         => esc_html_x( 'Sidebar', 'sidebar', 'nybr' ),
				'description'  => esc_html__( 'Add sidebar description.', 'nybr' ),
				'before_title' => '<div class="widget-title heading">',
				'after_title'  => '</div>',
			)
		);
	}

	register_sidebars( 4, array(
		'id'            => 'footer',
		'name'          => __( 'Footer %d' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'description'   => esc_html__( 'Add sidebar description.', 'nybr' ),
		'before_title'  => '<div class="widget-title heading">',
		'after_title'   => '</div>',
	) );
}

add_action( 'widgets_init', 'nybr_register_sidebars' );
