<?php
/**
 * Created by PhpStorm.
 * User: satish
 * Date: 17/10/17
 * Time: 8:04 PM
 */

function he_get_font_stacks() {
	$font_stack = array();

	if ( get_theme_mod( 'gfont_1' ) ) {
		$temp         = get_theme_mod( 'gfont_1' );
		$font_stack[] = $temp['stack'];
	}
	if ( get_theme_mod( 'gfont_2' ) ) {
		$temp         = get_theme_mod( 'gfont_2' );
		$font_stack[] = $temp['stack'];
	}
	$web_safe_stacks = array(
		'Helvetica Neue,Helvetica,Arial,sans-serif',
		'Baskerville, \'Times New Roman\', Times, serif',
		'Garamond, \'Hoefler Text\', \'Times New Roman\', Times, serif',
		'Geneva, \'Lucida Sans\', \'Lucida Grande\', \'Lucida Sans Unicode\', Verdana, sans-serif',
		'GillSans, Calibri, Trebuchet, sans-serif',
		'Georgia, Times, \'Times New Roman\', serif',
		'Palatino, \'Palatino Linotype\', \'Hoefler Text\', Times, \'Times New Roman\', serif',
		'Tahoma, Verdana, Geneva',
		'Trebuchet, Tahoma, Arial, sans-serif',
		'Verdana, Geneva, sans-serif',
		'Tahoma, Arial, Helvetica, sans-serif',
		'\'Times New Roman\', Times, serif',
		'\'Courier New\', Courier, monospace'
	);

	array_push( $web_safe_stacks, get_theme_mod( 'custom_font_stack' ) );

	$web_safe_stacks = array_merge( $font_stack, $web_safe_stacks );

	return array_combine( $web_safe_stacks, $web_safe_stacks );
}