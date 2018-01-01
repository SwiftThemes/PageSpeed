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

//	error_log(get_theme_mod('dedicated_sidebars_on_home'));

	$single_suffix = '';
	$append        = '';
	if (
		get_theme_mod( 'dedicated_sidebars_on_home', false ) ||
		get_theme_mod( 'dedicated_sidebars_on_default_page_template', false )
	) {
		$append = __( 'Appears on rest of the site like posts, archives etc...', 'page-speed' );
	}

	if ( in_array( get_theme_mod( 'theme_layout', 'centered' ), array( 'rr-sb', 'll-sb', 'centered' ) ) ) {


		if ( get_theme_mod( 'dedicated_sidebars_on_home', false ) ) {
//			$single_suffix = ' #Single';
			hybrid_register_sidebar(
				array(
					'id'           => 'left-home',
					'name'         => esc_html_x( 'Left Sidebar #HomePage', 'sidebar', 'page-speed' ),
					'description'  => esc_html__( 'Appears on the left of main content, above the sticky widgets.', 'page-speed' ),
					'before_title' => '<div class="widget-title heading">',
					'after_title'  => '</div>',
				)
			);


			if ( get_theme_mod( 'enable_sticky_sidebars', true ) ) {

				hybrid_register_sidebar(
					array(
						'id'           => 'left-sticky-home',
						'name'         => esc_html_x( 'Left Sidebar Sticky #HomePage', 'sidebar', 'page-speed' ),
						'description'  => esc_html__( 'Appears on the left of main content. Widgets added to this sidebar stick to the top of the page when you scroll', 'page-speed' ),
						'before_title' => '<div class="widget-title heading">',
						'after_title'  => '</div>',
					)
				);
			}
			hybrid_register_sidebar(
				array(
					'id'           => 'right-home',
					'name'         => esc_html_x( 'Right Sidebar #HomePage', 'sidebar', 'page-speed' ),
					'description'  => esc_html__( 'Appears on the right of main content, below the sticky widgets.', 'page-speed' ),
					'before_title' => '<div class="widget-title heading">',
					'after_title'  => '</div>',
				)
			);
			if ( get_theme_mod( 'enable_sticky_sidebars', true ) ) {

				hybrid_register_sidebar(
					array(
						'id'           => 'right-sticky-home',
						'name'         => esc_html_x( 'Right Sidebar Sticky #HomePage', 'sidebar', 'page-speed' ),
						'description'  => esc_html__( 'Appears on the right of main content. Widgets added to this sidebar stick to the top of the page when you scroll', 'page-speed' ),
						'before_title' => '<div class="widget-title heading">',
						'after_title'  => '</div>',
					)
				);
			}
		}


		if ( get_theme_mod( 'dedicated_sidebars_on_default_page_template', false ) ) {
//			$single_suffix = ' #Single';
			hybrid_register_sidebar(
				array(
					'id'           => 'left-page',
					'name'         => esc_html_x( 'Left Sidebar #Page', 'sidebar', 'page-speed' ),
					'description'  => esc_html__( 'Appears on the left of main content, above the sticky widgets on pages using default page template.', 'page-speed' ),
					'before_title' => '<div class="widget-title heading">',
					'after_title'  => '</div>',
				)
			);


			if ( get_theme_mod( 'enable_sticky_sidebars', true ) ) {

				hybrid_register_sidebar(
					array(
						'id'           => 'left-sticky-page',
						'name'         => esc_html_x( 'Sticky Left Sidebar #Page', 'sidebar', 'page-speed' ),
						'description'  => esc_html__( 'Appears on the left of main content on pages using default page template. Widgets added to this sidebar stick to the top of the page when you scroll', 'page-speed' ),
						'before_title' => '<div class="widget-title heading">',
						'after_title'  => '</div>',
					)
				);
			}
			hybrid_register_sidebar(
				array(
					'id'           => 'right-page',
					'name'         => esc_html_x( 'Right Sidebar #Page', 'sidebar', 'page-speed' ),
					'description'  => esc_html__( 'Appears on the right of main content, above the sticky widgets on pages using default page template.', 'page-speed' ),
					'before_title' => '<div class="widget-title heading">',
					'after_title'  => '</div>',
				)
			);
			if ( get_theme_mod( 'enable_sticky_sidebars', true ) ) {

				hybrid_register_sidebar(
					array(
						'id'           => 'right-sticky-page',
						'name'         => esc_html_x( 'Sticky Right Sidebar #Page', 'sidebar', 'page-speed' ),
						'description'  => esc_html__( 'Appears on the right of main content on pages using default page template. Widgets added to this sidebar stick to the top of the page when you scroll', 'page-speed' ),
						'before_title' => '<div class="widget-title heading">',
						'after_title'  => '</div>',
					)
				);
			}
		}


		hybrid_register_sidebar(
			array(
				'id'           => 'left',
				'name'         => esc_html_x( 'Left Sidebar', 'sidebar', 'page-speed' ) . $single_suffix,
				'description'  => esc_html__( 'Appears on the left of main content, below the sticky widgets.', 'page-speed' ) . $append,
				'before_title' => '<div class="widget-title heading">',
				'after_title'  => '</div>',
			)
		);

		if ( get_theme_mod( 'enable_sticky_sidebars', true ) ) {

			hybrid_register_sidebar(
				array(
					'id'           => 'left-sticky',
					'name'         => esc_html_x( 'Left Sidebar Sticky', 'sidebar', 'page-speed' ) . $single_suffix,
					'description'  => esc_html__( 'Appears on the left of main content. Widgets added to this sidebar stick to the top of the page when you scroll', 'page-speed' ) . $append,
					'before_title' => '<div class="widget-title heading">',
					'after_title'  => '</div>',
				)
			);
		}
		hybrid_register_sidebar(
			array(
				'id'           => 'right',
				'name'         => esc_html_x( 'Right Sidebar', 'sidebar', 'page-speed' ) . $single_suffix,
				'description'  => esc_html__( 'Appears on the right of main content, below the sticky widgets.', 'page-speed' ) . $append,
				'before_title' => '<div class="widget-title heading">',
				'after_title'  => '</div>',
			)
		);

		if ( get_theme_mod( 'enable_sticky_sidebars', true ) ) {

			hybrid_register_sidebar(
				array(
					'id'           => 'right-sticky',
					'name'         => esc_html_x( 'Right Sidebar Sticky', 'sidebar', 'page-speed' ) . $single_suffix,
					'description'  => esc_html__( 'Appears on the right of main content. Widgets added to this sidebar stick to the top of the page when you scroll', 'page-speed' ) . $append,
					'before_title' => '<div class="widget-title heading">',
					'after_title'  => '</div>',
				)
			);
		}

	} else {

		if ( get_theme_mod( 'dedicated_sidebars_on_home', false ) ) {
			hybrid_register_sidebar(
				array(
					'id'           => 'left-home',
					'name'         => esc_html_x( 'Sidebar #HomePage', 'sidebar', 'page-speed' ),
					'description'  => esc_html__( 'Above the sticky sidebar.', 'page-speed' ),
					'before_title' => '<div class="widget-title heading">',
					'after_title'  => '</div>',
				)
			);

			if ( get_theme_mod( 'enable_sticky_sidebars', true ) ) {
				hybrid_register_sidebar(
					array(
						'id'           => 'left-sticky-home',
						'name'         => esc_html_x( 'Sticky Sidebar #HomePage', 'sidebar', 'page-speed' ),
						'description'  => esc_html__( 'Widgets added here stick to the page', 'page-speed' ),
						'before_title' => '<div class="widget-title heading">',
						'after_title'  => '</div>',
					)
				);
			}
			hybrid_register_sidebar(
				array(
					'id'           => 'ns-1-home',
					'name'         => esc_html_x( 'Narrow Sidebar Left #HomePage', 'sidebar', 'page-speed' ),
					'description'  => esc_html__( 'Widgets added here appear below the sticky sidebar. Ideal for 120/160px wide ads, categories and archives', 'page-speed' ),
					'before_title' => '<div class="widget-title heading">',
					'after_title'  => '</div>',
				)
			);
			hybrid_register_sidebar(
				array(
					'id'           => 'ns-2-home',
					'name'         => esc_html_x( 'Narrow Sidebar Right #HomePage', 'sidebar', 'page-speed' ),
					'description'  => esc_html__( 'Widgets added here appear below the sticky sidebar. Ideal for 120/160px wide ads, categories and archives', 'page-speed' ),
					'before_title' => '<div class="widget-title heading">',
					'after_title'  => '</div>',
				)
			);
			hybrid_register_sidebar(
				array(
					'id'           => 'left-bottom-home',
					'name'         => esc_html_x( 'Below Narrow Sidebars #HomePage', 'sidebar', 'page-speed' ),
					'description'  => esc_html__( 'Widgets added here appear below the narrow sidebars', 'page-speed' ),
					'before_title' => '<div class="widget-title heading">',
					'after_title'  => '</div>',
				)
			);
		}

		if ( get_theme_mod( 'dedicated_sidebars_on_default_page_template', false ) ) {
			hybrid_register_sidebar(
				array(
					'id'           => 'left-page',
					'name'         => esc_html_x( 'Sidebar #Page', 'sidebar', 'page-speed' ),
					'description'  => esc_html__( 'Above the sticky sidebar.', 'page-speed' ),
					'before_title' => '<div class="widget-title heading">',
					'after_title'  => '</div>',
				)
			);

			if ( get_theme_mod( 'enable_sticky_sidebars', true ) ) {
				hybrid_register_sidebar(
					array(
						'id'           => 'left-sticky-page',
						'name'         => esc_html_x( 'Sticky Sidebar #Page', 'sidebar', 'page-speed' ),
						'description'  => esc_html__( 'Widgets added here stick to the page', 'page-speed' ),
						'before_title' => '<div class="widget-title heading">',
						'after_title'  => '</div>',
					)
				);
			}
			hybrid_register_sidebar(
				array(
					'id'           => 'ns-1-page',
					'name'         => esc_html_x( 'Narrow Sidebar Left #Page', 'sidebar', 'page-speed' ),
					'description'  => esc_html__( 'Widgets added here appear below the sticky sidebar. Ideal for 120/160px wide ads, categories and archives', 'page-speed' ),
					'before_title' => '<div class="widget-title heading">',
					'after_title'  => '</div>',
				)
			);
			hybrid_register_sidebar(
				array(
					'id'           => 'ns-2-page',
					'name'         => esc_html_x( 'Narrow Sidebar Right #Page', 'sidebar', 'page-speed' ),
					'description'  => esc_html__( 'Widgets added here appear below the sticky sidebar. Ideal for 120/160px wide ads, categories and archives', 'page-speed' ),
					'before_title' => '<div class="widget-title heading">',
					'after_title'  => '</div>',
				)
			);
			hybrid_register_sidebar(
				array(
					'id'           => 'left-bottom-page',
					'name'         => esc_html_x( 'Below Narrow Sidebars #Page', 'sidebar', 'page-speed' ),
					'description'  => esc_html__( 'Widgets added here appear below the narrow sidebars', 'page-speed' ),
					'before_title' => '<div class="widget-title heading">',
					'after_title'  => '</div>',
				)
			);
		}


		hybrid_register_sidebar(
			array(
				'id'           => 'left',
				'name'         => esc_html_x( 'Sidebar', 'sidebar', 'page-speed' ),
				'description'  => esc_html__( 'Above the sticky sidebar.', 'page-speed' ) . $append,
				'before_title' => '<div class="widget-title heading">',
				'after_title'  => '</div>',
			)
		);

		if ( get_theme_mod( 'enable_sticky_sidebars', true ) ) {
			hybrid_register_sidebar(
				array(
					'id'           => 'left-sticky',
					'name'         => esc_html_x( 'Sticky Sidebar', 'sidebar', 'page-speed' ),
					'description'  => esc_html__( 'Widgets added here stick to the page', 'page-speed' ) . $append,
					'before_title' => '<div class="widget-title heading">',
					'after_title'  => '</div>',
				)
			);
		}
		hybrid_register_sidebar(
			array(
				'id'           => 'ns-1',
				'name'         => esc_html_x( 'Narrow Sidebar Left', 'sidebar', 'page-speed' ),
				'description'  => esc_html__( 'Widgets added here appear below the sticky sidebar. Ideal for 120/160px wide ads, categories and archives', 'page-speed' ) . $append,
				'before_title' => '<div class="widget-title heading">',
				'after_title'  => '</div>',
			)
		);
		hybrid_register_sidebar(
			array(
				'id'           => 'ns-2',
				'name'         => esc_html_x( 'Narrow Sidebar Right', 'sidebar', 'page-speed' ),
				'description'  => esc_html__( 'Widgets added here appear below the sticky sidebar. Ideal for 120/160px wide ads, categories and archives', 'page-speed' ) . $append,
				'before_title' => '<div class="widget-title heading">',
				'after_title'  => '</div>',
			)
		);
		hybrid_register_sidebar(
			array(
				'id'           => 'left-bottom',
				'name'         => esc_html_x( 'Below Narrow Sidebars', 'sidebar', 'page-speed' ) . $single_suffix,
				'description'  => esc_html__( 'Widgets added here appear below the narrow sidebars', 'page-speed' ) . $append,
				'before_title' => '<div class="widget-title heading">',
				'after_title'  => '</div>',
			)
		);
	}


	hybrid_register_sidebar(
		array(
			'id'           => 'page-template-right',
			'name'         => esc_html_x( 'Right Sidebar Page Template', 'sidebar', 'page-speed' ),
			'description'  => esc_html__( 'Add widgets to right sidebar page template here', 'page-speed' ),
			'before_title' => '<div class="widget-title heading">',
			'after_title'  => '</div>',
		)
	);

	hybrid_register_sidebar(
		array(
			'id'           => 'page-template-left',
			'name'         => esc_html_x( 'Left Sidebar Page Template', 'sidebar', 'page-speed' ),
			'description'  => esc_html__( 'Add widgets to left sidebar page template here', 'page-speed' ),
			'before_title' => '<div class="widget-title heading">',
			'after_title'  => '</div>',
		)
	);

	for ( $i = 1; $i < 4 + 1; $i ++ ) {
		register_sidebars(1, array(
			'id'            => 'footer-'.$i,
			'name'          => __( 'Footer Column ', 'page-speed' ).'#'.$i,
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'description'   => esc_html__( 'Add widgets to footer here.', 'page-speed' ),
			'before_title'  => '<div class="widget-title heading">',
			'after_title'   => '</div>',
		) );
	}
}

add_action( 'widgets_init', 'pagespeed_register_sidebars' );
