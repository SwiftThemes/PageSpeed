<?php
/**
 * Created by PhpStorm.
 * User: satish
 * Date: 21/02/17
 * Time: 6:10 PM
 */

function helium_get_thumb_size($namespace){
	return array(
		get_theme_mod($namespace.'_width',100),
		get_theme_mod($namespace.'_height',100)
	);
}