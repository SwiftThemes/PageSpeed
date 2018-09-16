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
				<?php the_post_thumbnail( helium_get_thumb_size( $namespace ), array( 'class' => sanitize_html_class( get_theme_mod( $namespace . '_alignment' . $suffix, 'alternate' ) ) ) ) ?>
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


/**
 * Initialize preview on demo
 *
 * @author Satish Gandham
 * @package helium
 * @version 0.0.1
 * @since 1.25
 */

/**
 * Check if it is demo preview
 *
 * @return bool
 */
function helium_is_preview_demo() {
	$he_theme     = wp_get_theme();
	$theme_name   = 'pagespeed' == $he_theme->get( 'TextDomain' ) ? 'page-speed' : $he_theme->get( 'TextDomain' );
	$active_theme = helium_get_raw_option( 'template' );


	if ( is_child_theme() ) {
		$theme_name      = get_option( 'stylesheet' );
		$template_name   = $he_theme->get( 'Template' );
		$stylesheet_name = helium_get_raw_option( 'stylesheet' );

		return apply_filters( 'helium_is_preview_demo', ( ( $active_theme != strtolower( $theme_name ) ) && ( $template_name == $stylesheet_name ) ) );
	}

	return apply_filters( 'helium_is_preview_demo', $active_theme != strtolower( $theme_name ) );
}


/**
 * All options or a single option val
 *
 * @param string $opt_name Option name.
 *
 * @return bool|mixed
 */
function helium_get_raw_option( $opt_name ) {
	$alloptions = wp_cache_get( 'alloptions', 'options' );
	$alloptions = maybe_unserialize( $alloptions );

	return isset( $alloptions[ $opt_name ] ) ? maybe_unserialize( $alloptions[ $opt_name ] ) : false;
}
