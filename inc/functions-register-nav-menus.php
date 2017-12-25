<?php
/**
 * Created by PhpStorm.
 * User: satish
 * Date: 05/02/17
 * Time: 11:15 PM
 */


if ( get_theme_mod( 'enable_sleek_header', false ) ) {
	register_nav_menus( array(
		'header' => __( 'Navigation menu in header', 'page-speed' ),
	) );
} else {
	register_nav_menus( array(
		'primary' => __( 'Navigation below header', 'page-speed' ),
	) );
}


register_nav_menus( array(
	'secondary'    => __( 'Navigation above header', 'page-speed' ),
	'footer_links' => __( 'Footer links', 'page-speed' ),
) );