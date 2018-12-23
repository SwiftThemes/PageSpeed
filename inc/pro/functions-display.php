<?php
add_action( 'pagespeed_primary_nav_end', 'pagespeed_nav_social_media', 14 );
add_action( 'pagespeed_header_nav_end', 'pagespeed_nav_social_media', 14 );
add_action( 'pagespeed_primary_nav_end', 'pagespeed_nav_search', 12 );
add_action( 'pagespeed_header_nav_end', 'pagespeed_nav_search', 12 );
add_action( 'pagespeed_before_header', 'pagespeed_above_header_contact_info', 7 );


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
	$main_url  = get_theme_mod( 'webiste_url', esc_url( home_url( '/' ) ) );
	?>
    <div id="nav-social-media" class="cf nav alignright">
        <span itemscope itemtype="<?php echo $item_type ?>">
        <link itemprop="url" href="<?php echo $main_url ?>">

	        <?php echo pagespeed_get_social_media() ?>
            </span>
    </div>
	<?php
}


if ( ! function_exists( 'pagespeed_above_header_contact_info' ) ) {
	function pagespeed_above_header_contact_info() {
		if ( get_theme_mod( 'show_contact_info_ah', false ) || get_theme_mod( 'show_social_media_ah', false ) ) {
			?>
            <div id="connect-ah" class="cf">
                <div class="hybrid">
                    <div class="inner">
						<?php
						if ( get_theme_mod( 'show_contact_info_ah', false ) ) {
							echo '<div class="alignleft contact m-block">' . pagespeed_get_contact_info() . '</div>';
						}
						?>
						<?php
						if ( get_theme_mod( 'show_contact_info_ah', false ) ) {
							echo '<div class="alignright sm m-block">' . pagespeed_get_social_media('<ul>') . '</div>';
						}
						?>
                    </div>
                </div>
            </div>
			<?php
		}
	}
}

if ( ! function_exists( 'pagespeed_get_contact_info' ) ) {
	function pagespeed_get_contact_info() {
		$out = '<a href="mailto:'.get_theme_mod( 'contact_email' ).'"><span class="icon he-email"></span>&nbsp;' . get_theme_mod( 'contact_email' ) . '</a>';
		$out .= '<a href="tel:'.get_theme_mod( 'contact_number' ,'#').'"><span class="icon he-telephone"></span>&nbsp;' . get_theme_mod( 'contact_number' ) . '</a>';

		return $out;
	}
}


if ( ! function_exists( 'pagespeed_get_social_media' ) ) {
	function pagespeed_get_social_media( $before = '<ul class="menu">', $after = '</ul>' ) {
		$out = $before;

		foreach (
			get_theme_mod( 'social_media_order_nav', array() ) as $link
		) {
			if ( 'telephone' == $link ) {
				$out .= '<li><a  itemprop="sameAs" href="tel:' . get_theme_mod( $link, '#' ) . '" class="' . $link . '" title="Call ' . get_theme_mod( $link, '#' ) . '"><span class="icon he-' . $link . '"></span></a></li>';
			} else {
				$out .= '<li><a  itemprop="sameAs" href="' . get_theme_mod( $link, '#' ) . '" class="' . $link . '"><span class="icon he-' . $link . '"></span></a></li>';
			}
		}
		$out .= $after;

		return $out;
	}
}

function pagespeed_sc_social_media(){
	$item_type = 'http://schema.org/' . get_theme_mod( 'social_media_personal_or_business', 'Person' );
	$main_url  = get_theme_mod( 'webiste_url', esc_url( home_url( '/' ) ) ); 

$out= '<div id="" class="cf nav inline-list">
        <span itemscope itemtype="<?php echo $item_type ?>">
        <link itemprop="url" href="<?php echo $main_url ?>">'.pagespeed_get_social_media() .'</span>
</div>';
return $out;
}
add_shortcode( 'social_media_icons', 'pagespeed_sc_social_media' );