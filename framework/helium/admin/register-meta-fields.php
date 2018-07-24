<?php
/**
 * Created by PhpStorm.
 * User: satish
 * Date: 23/07/18
 * Time: 1:36 PM
 */

add_filter( 'butterbean_dir_path', 'butterbean_dir_path' );
function butterbean_dir_path(){
	return HELIUM_THEME_DIR.'framework/butterbean/';
}

add_filter( 'butterbean_dir_uri', 'butterbean_dir_uri' );
function butterbean_dir_uri(){
	return HELIUM_THEME_URI.'framework/butterbean/';
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
			'post_type' => 'post',
			'context'   => 'normal',
			'priority'  => 'high'
		)
	);


}

function helium_butter_bean_register_sections( $butterbean, $post_type ) {
	$manager = $butterbean->get_manager( 'pagespeed' );
	$manager->register_section(
		'main',
		array(
			'label' => esc_html__( 'Main', 'page-speed' ),
			'icon'  => 'dashicons-layout'
		)
	);




}
function helium_butter_bean_register_settings( $butterbean, $post_type ) {
	$manager = $butterbean->get_manager( 'pagespeed' );

	$manager->register_setting(
		'layout', // Same as control name.
		array(
			'sanitize_callback' => 'wp_filter_nohtml_kses'
		)
	);

}
function helium_butter_bean_register_controls( $butterbean, $post_type ) {
	$manager = $butterbean->get_manager( 'pagespeed' );
	$manager->register_control(
		'layout',
		array(
			'type'        => 'radio-image',
			'section'     => 'main',
			'label'       => 'Example Radio Image',
			'description' => 'Example description.',
			'choices'  => array(
				'l-sb'     => array(
					'url'   => HELIUM_ADMIN_IMAGES_URI . 'layout-l-sb.png',
					'label' => __( 'Content / Sidebar', 'page-speed' )
				),
				'centered' => array(
					'url'   => HELIUM_ADMIN_IMAGES_URI . 'layout-centered.png',
					'label' => __( 'Sidebar / Content / Sidebar', 'page-speed' ),
				),
				'r-sb'     => array(
					'url'   => HELIUM_ADMIN_IMAGES_URI . 'layout-r-sb.png',
					'label' => __( 'Sidebar / Content', 'page-speed' ),
				),
				'rr-sb'    => array(
					'url'   => HELIUM_ADMIN_IMAGES_URI . 'layout-rr-sb.png',
					'label' => __( 'Sidebar / Content', 'page-speed' ),
				),
				'll-sb'    => array(
					'url'   => HELIUM_ADMIN_IMAGES_URI . 'layout-ll-sb.png',
					'label' => __( 'Sidebar / Content', 'page-speed' ),
				),
				'single'    => array(
					'url'   => HELIUM_ADMIN_IMAGES_URI . 'layout-single.png',
					'label' => __( 'Sidebar / Content', 'page-speed' ),
				)
			)
		)
	);

}