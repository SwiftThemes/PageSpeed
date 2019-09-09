<?php
/**
 * Created by PhpStorm.
 * User: satish
 * Date: 01/04/18
 * Time: 12:12 AM
 */

add_action( 'admin_init', 'pagespeed_migrations' );


function pagespeed_migrations() {

	// v0.99 --> v1.00
	//  if ( get_theme_mod('home_show_thumbnails') ) {
	//      set_theme_mod('home_thumb_show', get_theme_mod('home_show_thumbnails'));
	//      remove_theme_mod( 'home_show_thumbnails' );
	//  }
	//  if ( get_theme_mod( 'home_show_thumbnails_mobile' ) ) {
	//      set_theme_mod( 'home_thumb_show_mobile', get_theme_mod( 'home_show_thumbnails_mobile' ) );
	//      remove_theme_mod( 'home_show_thumbnails_mobile' );
	//  }
	//
	//  if ( get_theme_mod('archives_show_thumbnails') ) {
	//      set_theme_mod('archives_thumb_show', get_theme_mod('archives_show_thumbnails'));
	//      remove_theme_mod( 'archives_show_thumbnails' );
	//  }
	//  if ( get_theme_mod('archives_show_thumbnails_mobile') ) {
	//      set_theme_mod('archives_thumb_show_mobile', get_theme_mod('archives_show_thumbnails_mobile'));
	//      remove_theme_mod( 'archives_show_thumbnails_mobile' );
	//  }
	// end v0.99 --> v1.00

	//  //v1.23 --> v1.26
	//  if ( 'not_set' !== get_theme_mod('can_read_write','not_set') && 'not_set' === get_theme_mod('separate_containers','not_set') ) {
	//      set_theme_mod('separate_containers', false);
	//  }
	//
	//  // Disable sleek header for existing users
	//  if ( 'not_set' !== get_theme_mod('can_read_write','not_set') && 'not_set' === get_theme_mod('enable_sleek_header','not_set') ) {
	//      set_theme_mod('enable_sleek_header', false);
	//  }

	//2.01 --> 2.10

	/*
	 * To fix a wrongly chosen naming.
	 * Position was wrongly used instead of alignment.
	 */

	if ( 'not_set' == get_theme_mod( 'home_thumb_alignment', 'not_set' ) && get_theme_mod( 'home_thumb_position', false ) ) {
		set_theme_mod( 'home_thumb_alignment', get_theme_mod( 'home_thumb_position' ) );
	}
	if ( 'not_set' == get_theme_mod( 'home_thumb_alignment_mobile', 'not_set' ) && get_theme_mod( 'home_thumb_position_mobile', false ) ) {
		set_theme_mod( 'home_thumb_alignment_mobile', get_theme_mod( 'home_thumb_position_mobile' ) );
	}
	if ( 'not_set' == get_theme_mod( 'archives_thumb_alignment', 'not_set' ) && get_theme_mod( 'archives_thumb_position', false ) ) {
		set_theme_mod( 'archives_thumb_alignment', get_theme_mod( 'archives_thumb_position' ) );
	}
	if ( 'not_set' == get_theme_mod( 'archives_thumb_alignment_mobile', 'not_set' ) && get_theme_mod( 'archives_thumb_position_mobile', false ) ) {
		set_theme_mod( 'archives_thumb_alignment_mobile', get_theme_mod( 'archives_thumb_position_mobile' ) );
	}

	if ( 'not_set' == get_theme_mod( 'archives_title', 'not_set' ) ) {
		set_theme_mod( 'archives_title', __( 'Archives for', 'page-speed' ) . ' %s' );
	}

}
