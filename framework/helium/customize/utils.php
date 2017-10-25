<?php
/**
 * Created by PhpStorm.
 * User: satish
 * Date: 17/10/17
 * Time: 8:04 PM
 */

function he_get_font_stacks(){
	$font_stack = array();

	if ( get_theme_mod( 'gfont_1' ) ) {
		$temp                = get_theme_mod( 'gfont_1' );
		$font_stack[] = $temp['stack'];
	}
	if ( get_theme_mod( 'gfont_2' ) ) {
		$temp                = get_theme_mod( 'gfont_2' );
		$font_stack[] = $temp['stack'];
	}
	$web_safe_stacks = array(
		'Verdana, Geneva, sans-serif',
		'Tahoma, Arial, Helvetica, sans-serif',
		'Georgia, Utopia, Palatino, \'Palatino Linotype\', serif',
		'\'Times New Roman\', Times, serif',
		'\'Courier New\', Courier, monospace'
	);

	$web_safe_stacks = array_merge( $font_stack, $web_safe_stacks );
	return array_combine($web_safe_stacks,$web_safe_stacks);
}