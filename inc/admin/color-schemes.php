<?php
$page_speed_color_schemes = array();
GLOBAL $page_speed_color_schemes;

$page_speed_color_schemes['default'] ='';

$page_speed_color_schemes['facebook'] = '
$primary-nav-bg:#3b5998;
$primary-nav-color:#FFF;
$header-bg:$light-1;
$site-title-color:$primary-nav-bg;

@if($is_sleek_header == 1){
$header-bg:$primary-nav-bg;
}
';

$page_speed_color_schemes['pink'] = '
$primary-nav-bg:#c43e74;
$primary-nav-color:#FFF;
$header-bg:$light-1;
$sb-widget-title-bg:lighten(#c43e74,.2);
$sb-widget-ttile-color: $dark-6;
@if($is_sleek_header == 1){
$header-bg:$primary-nav-bg;
}

';


function pagespeed_get_color_scheme_choices() {
	GLOBAL $page_speed_color_schemes;
	$choices = array();
	foreach ( $page_speed_color_schemes as $key => $value ) {
		$choices[ $key ] = array(
			'url'   => ADMIN_IMAGES_URI . '/color-schemes/' . $key . '.png',
			'label' => $key
		);
	}

	return $choices;
}