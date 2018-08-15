<?php
/**
 * Created by PhpStorm.
 * User: satish
 * Date: 07/08/18
 * Time: 7:56 PM
 */
function page_speed_import_files() {
	return array(
		array(
			'import_file_name'           => 'The Leaf',
			'categories'                 => array(  ),
			'import_file_url'            => 'http://demo-sites.swiftthemes.com/the-leaf/demo-content.xml',
			'import_widget_file_url'     => 'http://demo-sites.swiftthemes.com/the-leaf/widgets.wie',
			'import_customizer_file_url' => 'http://demo-sites.swiftthemes.com/the-leaf/customizer.dat',
			'import_preview_image_url'   => 'http://demo-sites.swiftthemes.com/the-leaf/preview.png',
			'import_notice'              => __( 'Please install PageBuilder, widgets bundle and enable testimonials widget from plugins-> SiteOrigin Widgets ', 'page-speed' ),
			'preview_url'                => 'http://demos.swiftthemes.com/the-leaf',
		),
		array(
			'import_file_name'           => 'Default Demo',
			'categories'                 => array(  ),
//			'import_file_url'            => 'http://demo-sites.swiftthemes.com/default/demo-content.xml',
			'import_widget_file_url'     => 'http://demo-sites.swiftthemes.com/default/widgets.wie',
			'import_customizer_file_url' => 'http://demo-sites.swiftthemes.com/default/customizer.dat',
			'import_preview_image_url'   => 'http://demo-sites.swiftthemes.com/default/preview.jpg',
//			'import_notice'              => __( 'After you import this demo, you will have to setup the slider separately.', 'page-speed' ),
			'preview_url'                => 'http://demos.swiftthemes.com/',
		),
	);
}
add_filter( 'pt-ocdi/import_files', 'page_speed_import_files' );