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
	if ( ! get_theme_mod( 'show_social_media_link_in_header', false ) ) {
		return;
	}
	$item_type = 'http://schema.org/' . get_theme_mod( 'social_media_personal_or_business', 'Person' );
	$main_url = get_theme_mod('webiste_url',esc_url( home_url( '/' ) ));
    ?>
    <div id="nav-social-media" class="cf nav alignright" >
        <span itemscope itemtype="<?php echo $item_type ?>">
        <link itemprop="url" href="<?php echo $main_url?>">

        <ul class="menu">
			<?php
			foreach (
				get_theme_mod( 'social_media_order_nav', array() ) as $link
			) {
				echo '<li><a  itemprop="sameAs" href="' . get_theme_mod( $link, '#' ) . '" class="' . $link . '"><span class="icon he-' . $link . '"></span></a></li>';
			} ?>

        </ul>
            </span>
    </div>
	<?php
}