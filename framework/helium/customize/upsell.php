<?php

add_action( 'customize_register', 'helium_customizer_upsell', 600 );
function helium_customizer_upsell( $wp_customize ) {
	$wp_customize->add_section( 'upsell', array(
		'title'    => __( 'Go Pro', 'page-speed' ),
		'priority' => 180,
		'panel'    => 'theme_options',
		'button'   => esc_html__( 'Unlock', 'page-speed' ),
	) );
	$wp_customize->add_setting( 'example-control', array( 'sanitize_callback' => 'sanitize_text_field', ) );

	$wp_customize->add_control( new Helium_Help_Text( $wp_customize, 'example-control', array(
		'section'  => 'upsell',
		'priority' => 5,
		'label'    => __( ' ', 'page-speed' ),
		'content'  => sprintf( '
  <div class="upsell"> <h2>Page Speed %s</h2><div class="upsell-intro">
       %s</div>',
				__( 'Premium', 'page-speed' ),
				__( ' While the free version you are using now is limited in no way, upgrading to the premium version gets you priority
        support and the following additional features.', 'page-speed' )

		              ) . sprintf( '
<ul class="features">
            <li>%s</li>
            <li>%s</li>
            <li>%s</li>
            <li>%s</li>
            <li>%s</li>
            <li>%s</li>
            </ul>
            <a href="https://swiftthemes.com/upgrade-pagespeed-pro/?utm_source=ps_theme_admin&utm_medium=upsell_section&utm_campaign=basic" target="_blank"
                                  class="lg-btn" ><span class="dashicons dashicons-awards"></span> %s</a></div>',
				__( 'Support for non render blocking CSS for a higher Google PageSpeed score.', 'page-speed' ),
				__( 'Color options and gradients.', 'page-speed' ),
				__( 'Customizable footer columns.', 'page-speed' ),
				__( 'Prebuilt layouts for use with page builders.', 'page-speed' ),
				__( 'More color schemes.', 'page-speed' ),
				__( 'Search form in navigation.', 'page-speed' ),
				__( 'Get PageSpeed Pro', 'page-speed' )

		              )
	) ) );

}


