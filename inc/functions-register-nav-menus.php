<?php
/**
 * Created by Satish Gandham.
 * User: satish
 * Date: 05/02/17
 * Time: 11:15 PM
 */

add_action( 'after_setup_theme', 'pagespeed_register_menus' );


function pagespeed_register_menus() {

	//Not getting the modified theme_mod from the customizer without saving.
	register_nav_menus( array(
		'secondary' => __( 'Navigation above header', 'page-speed' ),
	) );

	if ( get_theme_mod( 'enable_sleek_header', true ) ) {
		register_nav_menus( array(
			'primary' => __( 'Navigation menu in header', 'page-speed' ),
		) );
	} else {
		register_nav_menus( array(
			'primary' => __( 'Navigation below header', 'page-speed' ),
		) );
	}
	register_nav_menus( array(
		'footer_links' => __( 'Footer links', 'page-speed' ),
	) );


	if ( get_theme_mod( 'different_navigation_for_tablets', false ) ) {
		register_nav_menus( array(
			'secondary_tablet' => __( 'Navigation above header #Tablets', 'page-speed' ),
		) );

		if ( get_theme_mod( 'enable_sleek_header', true ) ) {
			register_nav_menus( array(
				'primary_tablet' => __( 'Navigation menu in header #Tablets', 'page-speed' ),
			) );
		} else {
			register_nav_menus( array(
				'primary_tablet' => __( 'Navigation below header #Tablets', 'page-speed' ),
			) );
		}

	}
	if ( get_theme_mod( 'different_navigation_for_mobiles', false ) ) {
		register_nav_menus( array(
			'secondary_mobile' => __( 'Navigation above header #Mobiles', 'page-speed' ),
		) );

		if ( get_theme_mod( 'enable_sleek_header', true ) ) {
			register_nav_menus( array(
				'primary_mobile' => __( 'Navigation menu in header #Mobiles', 'page-speed' ),
			) );
		} else {
			register_nav_menus( array(
				'primary_mobile' => __( 'Navigation below header #Mobiles', 'page-speed' ),
			) );
		}
	}

}