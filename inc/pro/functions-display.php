<?php
add_action( 'pagespeed_primary_nav_end', 'pagespeed_nav_social_media', 14 );
add_action( 'pagespeed_header_nav_end', 'pagespeed_nav_social_media', 14 );
add_action( 'pagespeed_primary_nav_end', 'pagespeed_nav_search', 12 );
add_action( 'pagespeed_header_nav_end', 'pagespeed_nav_search', 12 );


if ( ! function_exists( 'pagespeed_nav_search' ) ) {
	function pagespeed_nav_search() {
		if ( ! get_theme_mod( 'show_search_in_header', false ) ) {
			return;
		}
		get_template_part( 'searchform-nav' );
	}

}

function pagespeed_nav_social_media() {
	?>
    <div id="nav-social-media" class="cf nav alignright">
        <ul class="menu">
			<?php foreach (
				get_theme_mod( 'social_media_order_nav', array(
					'facebook',
					'twitter',
					'youtube',
                    'linkedin',
                    'stack-exchange',
                    'instagram',
                    'reddit',
                    'dribbble',
                    'github',
                    'quora',
                    'google-plus',
                    'whatsapp'
				) ) as $link
			) {
				echo '<li><a href="' . get_theme_mod( $link, '#' ) . '" class="' . $link . '"><span class="icon he-' . $link . '"></span></a></li>';
			} ?>

        </ul>
    </div>
	<?php
}