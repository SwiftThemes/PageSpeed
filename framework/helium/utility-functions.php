<?php
/**
 * Created by Satish Gandham.
 * User: satish
 * Date: 21/02/17
 * Time: 6:10 PM
 */

function helium_get_thumb_size( $namespace ) {
	global $helium;

	if ( $helium->is_mobile() ) {
		$suffix = '_mobile';
	} else {
		$suffix = '';
	}

	return array(
		intval( get_theme_mod( $namespace . '_width' . $suffix, 160 ) ),
		intval( get_theme_mod( $namespace . '_height' . $suffix, 100 ) )
	);
}


function helium_show_thumbnail( $namespace ) {
	global $helium;

	if ( $helium->is_mobile() ) {
		$suffix = '_mobile';
	} else {
		$suffix = '';
	}
    ?>
	<?php if ( '' !== get_the_post_thumbnail() && get_theme_mod( $namespace . '_show' . $suffix, true ) ) : ?>
        <div class="post-thumbnail">
            <a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail( helium_get_thumb_size( $namespace ), array( 'class' => sanitize_html_class( get_theme_mod( $namespace . '_position' . $suffix, 'alternate' ) ) ) ) ?>
            </a>
        </div><!-- .post-thumbnail -->
	<?php endif; ?>
	<?php
}

function helium_random_string( $length = 5 ) {
	return substr( str_shuffle( str_repeat( $x = 'abcdefghijklmnopqrstuvwxyz', ceil( $length / strlen( $x ) ) ) ), 1, $length );
}

function helium_get_site_width() {
	$site_width = get_theme_mod( 'site_width', '1260px' );
	if ( strripos( $site_width, 'px' ) === false ) {
		return 1600;
	} else {
		return (int) $site_width;
	}
}