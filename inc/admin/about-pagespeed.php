<?php
/**
 * Created by PhpStorm.
 * User: satish
 * Date: 31/01/18
 * Time: 2:43 PM
 */
function pagespeed_about() {
	?>
    <div class="about">
		<?php echo sprintf( '
  
        <h2>%s :-)</h2>
        %s',
			__( 'A BIG Thank You', 'page-speed' ),
			__( 'First off, a big thank you for choosing Page Speed amongst the thousands of theme options available to
        you.<br>
        We hope you find Page Speed useful and easy to use. If you have any questions, please ask on the <a
                href="https://forums.swiftthemes.com/?utm_source=ps_theme_admin&utm_medium=useful_links&utm_campaign=basic">SUPPORT FORUM</a>
        or shoot an email to <a href="mailto:satish@swiftthemes.com?Subject=Question%20about%20PageSpeed"
                                target="_top"><strong>satish@SwiftThemes.com</strong></a>.
        If you like the theme, please recommend it to your peers and <a
                href="https://wordpress.org/support/theme/page-speed/reviews/#new-post" target="_blank">REVIEW IT</a> on
        WordPress.Org', 'page-speed' )

		)
		?>
		<?php echo sprintf( '

        <h2>%s</h2>
        %s',
			__( 'Useful Links', 'page-speed' ),
			__( 'We tried our best to make Page Speed very simple and easy to use. We hope to make it even better with your
        valuable feedback & suggestions.
        Here are some useful links to help you get started with the theme.', 'page-speed' )

		)
		?>
        <ul style="list-style: circle;list-style-position: inside;margin-left: 40px">
			<?php echo sprintf( '
       <li><a href="https://swiftthemes.com/?utm_source=ps_theme_admin&utm_medium=useful_links&utm_campaign=basic" target="_blank">%s</a></li>
            <li><a href="https://swiftthemes.com/getting-started-pagespeed/?utm_source=ps_theme_admin&utm_medium=useful_links&utm_campaign=basic" target="_blank">%s</a></li>
            <li><a href="https://swiftthemes.com/get-100-page-speed-score-mobile-desktops/?utm_source=ps_theme_admin&utm_medium=useful_links&utm_campaign=basic" target="_blank">%s</a></li>
            <li><a href="https://swiftthemes.com/customize-pagespeed-like-demo/?utm_source=ps_theme_admin&utm_medium=useful_links&utm_campaign=basic" target="_blank">%s</a></li>
            <li><a href="https://demos.swiftthemes.com/?utm_source=ps_theme_admin&utm_medium=useful_links&utm_campaign=basic" target="_blank">%s</a></li>',
				__( 'About PageSpeed', 'page-speed' ),
				__( 'User Guide', 'page-speed' ),
				__( 'Optimization Guide', 'page-speed' ),
				__( 'Customize like the demo', 'page-speed' ),
				__( 'Demo', 'page-speed' )
			) ?>

        </ul>
<!--		--><?php //echo sprintf( '
//  <h2>PageSpeed %s <a href="https://swiftthemes.com/upgrade-pagespeed-pro/?utm_source=ps_theme_admin&utm_medium=admin_page&utm_campaign=basic" target="_blank"
//                                  class="button button-primary"><span class="dashicons dashicons-awards"
//                                                                      style="margin-top: 3px"></span> %s</a></h2>
//       %s',
//			__( 'Premium', 'page-speed' ),
//			__( 'Go Pro', 'page-speed' ),
//			__( ' While the free version you are using is limited in no way, upgrading to the premium version gets you priority
//        support and the following additional features.', 'page-speed' )
//
//		) ?>
<!---->
<!--			--><?php //echo sprintf( '
//<ul style="list-style: circle;list-style-position: inside;margin-left: 40px;font-size: 1.2em;">
//            <li>%s</li>
//            <li>%s</li>
//            <li>%s</li>
//            <li>%s</li>
//            <li>%s</li>
//            <li>%s</li>
//            </ul>',
//				__( 'Support for non render blocking CSS for higher Google PageSpeed score.', 'page-speed' ),
//				__( 'Color options and gradients.', 'page-speed' ),
//				__( 'Customizable footer columns.', 'page-speed' ),
//				__( 'Prebuilt layouts for use with page builders.', 'page-speed' ),
//				__( 'More color schemes.', 'page-speed' ),
//				__( 'Search form in navigation.', 'page-speed' )
//			) ?>

    </div>
	<?php
}