<?php
/**
 * Created by PhpStorm.
 * User: satish
 * Date: 23/07/18
 * Time: 1:36 PM
 */

add_filter( 'butterbean_dir_path', 'butterbean_dir_path' );
function butterbean_dir_path() {
	return HELIUM_THEME_DIR . 'framework/butterbean/';
}

add_filter( 'butterbean_dir_uri', 'butterbean_dir_uri' );
function butterbean_dir_uri() {
	return HELIUM_THEME_URI . 'framework/butterbean/';
}

add_action( 'butterbean_register', 'helium_butter_bean_register_mangers', 10, 2 );
add_action( 'butterbean_register', 'helium_butter_bean_register_sections', 10, 2 );
add_action( 'butterbean_register', 'helium_butter_bean_register_settings', 10, 2 );
add_action( 'butterbean_register', 'helium_butter_bean_register_controls', 10, 2 );

function helium_butter_bean_register_mangers( $butterbean, $post_type ) {

	// Register managers, sections, controls, and settings here.
	$butterbean->register_manager(
		'pagespeed',
		array(
			'label'     => esc_html__( 'PageSpeed Settings', 'page-speed' ),
			'post_type' => array('post','page'),
			'context'   => 'normal',
			'priority'  => 'high'
		)
	);


}

function helium_butter_bean_register_sections( $butterbean, $post_type ) {
	$manager = $butterbean->get_manager( 'pagespeed' );
	$manager->register_section(
		'header',
		array(
			'label' => esc_html__( 'Header', 'page-speed' ),
			'icon'  => 'dashicons-welcome-widgets-menus'
		)
	);
	$manager->register_section(
		'css',
		array(
			'label' => esc_html__( 'Custom CSS', 'page-speed' ),
			'icon'  => 'dashicons-editor-code'
		)
	);

	$manager->register_section(
		'single_post',
		array(
			'label' => esc_html__( 'Single Post', 'page-speed' ),
			'icon'  => 'dashicons-editor-code'
		)
	);

	$manager->register_section(
		'misc',
		array(
			'label' => esc_html__( 'Misc', 'page-speed' ),
			'icon'  => 'dashicons-forms'
		)
	);
}

function helium_butter_bean_register_settings( $butterbean, $post_type ) {
	$manager = $butterbean->get_manager( 'pagespeed' );


	$manager->register_setting(
		'header_bg', // Same as control name.
		array(
			'sanitize_callback' => 'wp_filter_nohtml_kses'
		)
	);



	$manager->register_setting(
		'css_all', // Same as control name.
		array(
			'sanitize_callback' => 'wp_filter_nohtml_kses'
		)
	);
	$manager->register_setting(
		'css_desktops', // Same as control name.
		array(
			'sanitize_callback' => 'wp_filter_nohtml_kses'
		)
	);
	$manager->register_setting(
		'css_mobiles', // Same as control name.
		array(
			'sanitize_callback' => 'wp_filter_nohtml_kses'
		)
	);
	$manager->register_setting(
		'css_tablets', // Same as control name.
		array(
			'sanitize_callback' => 'wp_filter_nohtml_kses'
		)
	);


	$manager->register_setting(
		'single_post_layout', // Same as control name.
		array(
			'sanitize_callback' => 'sanitize_text_field'
		)
	);
	$manager->register_setting(
		'hide_breadcrumbs',
		array( 'sanitize_callback' => 'butterbean_validate_boolean' )
	);

	$manager->register_setting(
		'hide_page_title',
		array( 'sanitize_callback' => 'butterbean_validate_boolean' )
	);
	$manager->register_setting(
		'hide_footer_widgets',
		array( 'sanitize_callback' => 'butterbean_validate_boolean' )
	);


}

function helium_butter_bean_register_controls( $butterbean, $post_type ) {
	$manager = $butterbean->get_manager( 'pagespeed' );
	$manager->register_control(
		'header_bg',
		array(
			'type'        => 'text',
			'section'     => 'header',
			'attr'        => array( 'class' => '' ),
			'label'       => 'Header background',
			'description' => 'A valid CSS color in any format. Sorry, no color picker here since WordPress doesn\'t natively support rgba colors.'
		)
	);

	$manager->register_control(
		'css_all',
		array(
			'type'        => 'textarea',
			'section'     => 'css',
			'attr'        => array( 'class' => 'widefat code' ),
			'label'       => 'All devices',
			'description' => 'Rules added here will be applied to all screen sizes.',
		)
	);
	$manager->register_control(
		'css_desktops',
		array(
			'type'        => 'textarea',
			'section'     => 'css',
			'attr'        => array( 'class' => 'widefat code' ),
			'label'       => 'Desktops',
			'description' => 'Rules added here will be applied only to desktops.',
		)
	);
	$manager->register_control(
		'css_mobiles',
		array(
			'type'        => 'textarea',
			'section'     => 'css',
			'attr'        => array( 'class' => 'widefat code' ),
			'label'       => 'Small screen mobile devices',
			'description' => 'Rules added here will be applied only to mobiles. Screen size less than 768px'
		)
	);
	$manager->register_control(
		'css_tablets',
		array(
			'type'        => 'textarea',
			'section'     => 'css',
			'attr'        => array( 'class' => 'widefat code' ),
			'label'       => 'Tablets',
			'description' => 'Rules added here will be applied only to tablets. Screen size less than 768px'
		)
	);

	$manager->register_control(
		'single_post_layout',
		array(
			'type'        => 'select-group',
			'section'     => 'single_post',
			'label'       => 'Select the single post layout',
			'choices' => array(
				'' => '',
				'single_column' => __( 'Single Column','page-speed' ),
			 ),
		)
	);

	$manager->register_control(
		'hide_breadcrumbs',
		array(
			'type'        => 'checkbox',
			'section'     => 'misc',
			'label'       => 'Hide breadcrumbs',
		)
	);

	$manager->register_control(
		'hide_page_title',
		array(
			'type'        => 'checkbox',
			'section'     => 'misc',
			'label'       => 'Hide post/page title',
		)
	);

	$manager->register_control(
		'hide_footer_widgets',
		array(
			'type'        => 'checkbox',
			'section'     => 'misc',
			'label'       => 'Hide footer widgets',
		)
	);

}