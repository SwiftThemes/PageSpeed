<?php
/**
 * Created by PhpStorm.
 * User: satish
 * Date: 05/02/17
 * Time: 11:12 PM
 */


add_action( 'pagespeed_after_body', 'pagespeed_above_header', 8 );
add_action( 'pagespeed_after_header', 'pagespeed_below_header', 12 );
add_action( 'pagespeed_header_end', 'pagespeed_header_navigation', 12 );
add_action( 'pagespeed_after_header', 'pagespeed_mobile_search', 14 );
add_action( 'pagespeed_primary_nav_start', 'pagespeed_sticky_logo', 12 );
add_action( 'pagespeed_main_start', 'pagespeed_breadcrumbs', 12 );

if ( ! function_exists( 'pagespeed_above_header' ) ) {
	function pagespeed_above_header() {
		$args = array(
			'menu'            => 'secondary',
			'container'       => 'nav',
			'container_class' => 'nav',
			'container_id'    => 'secondary-nav',
			'menu_class'      => 'menu',
			'menu_id'         => '',
			'echo'            => true,
			'before'          => '',
			'after'           => '',
			'link_before'     => '',
			'link_after'      => '',
			'items_wrap'      => '<ul id="%1$s" class="%2$s cf">%3$s</ul>',
			'item_spacing'    => 'preserve',
			'depth'           => 0,
			'walker'          => '',
			'theme_location'  => 'secondary',
		);


		if ( has_nav_menu( 'secondary' ) ) :
			?>
			<div id="secondary-nav-container" class="nav-container cf">
				<div id="secondary" class="">
					<div class="hybrid ">
						<?php wp_nav_menu( $args ); ?>
					</div>
				</div>
			</div>
			<?php
		endif;
	}
}

if ( ! function_exists( 'pagespeed_below_header' ) ) {
	function pagespeed_below_header() {
		$args = array(
			'menu'            => 'primary',
			'container'       => 'nav',
			'container_class' => 'nav',
			'container_id'    => 'primary-nav',
			'menu_class'      => 'menu',
			'menu_id'         => '',
			'echo'            => true,
			'before'          => '',
			'after'           => '',
			'link_before'     => '',
			'link_after'      => '',
			'items_wrap'      => '<ul id="%1$s" class="%2$s cf">%3$s</ul>',
			'item_spacing'    => 'preserve',
			'depth'           => 0,
			'walker'          => '',
			'theme_location'  => 'primary',
		);


		if ( get_theme_mod( 'is_sticky_nav' ) ) {
			$container_class = ' stick-it';
		} else {
			$container_class = '';
		}
		if ( get_option( 'site_icon' ) ) {
			$container_class .= ' has-sticky-logo';
		}

		if ( has_nav_menu( 'primary' ) ) :
			?>
			<div id="primary-nav-container" class="nav-container cf <?php echo $container_class ?>">
				<div id="primary" class="">
					<div class="hybrid ">
						<?php do_action( 'pagespeed_primary_nav_start' ); ?>
						<?php wp_nav_menu( $args ); ?>
					</div>
				</div>
			</div>
			<?php
		endif;
	}
}
if ( ! function_exists( 'pagespeed_header_navigation' ) ) {
	function pagespeed_header_navigation() {
		$args = array(
			'menu'            => 'primary',
			'container'       => 'nav',
			'container_class' => 'nav',
			'container_id'    => 'header-nav',
			'menu_class'      => 'menu',
			'menu_id'         => '',
			'echo'            => true,
			'before'          => '',
			'after'           => '',
			'link_before'     => '',
			'link_after'      => '',
			'items_wrap'      => '<ul id="%1$s" class="%2$s cf">%3$s</ul>',
			'item_spacing'    => 'preserve',
			'depth'           => 0,
			'walker'          => '',
			'theme_location'  => 'header',
		);


		if ( get_theme_mod( 'is_sticky_nav' ) ) {
			$container_class = ' stick-it';
		} else {
			$container_class = '';
		}
		if ( get_option( 'site_icon' ) ) {
			$container_class .= ' has-sticky-logo';
		}

		if ( has_nav_menu( 'header' ) ) :
			?>
			<div id="header-nav-container" class="cf alignright <?php echo $container_class ?>">
				<div id="primary" class="">
						<?php do_action( 'pagespeed_header_nav_start' ); ?>
						<?php wp_nav_menu( $args ); ?>
				</div>
			</div>
			<?php
		endif;
	}
}

function pagespeed_sticky_logo() {
	if ( ! get_option( 'site_icon' ) ) {
		return;
	}
	//@todo Anchor the icon
	echo sprintf( '<a href="%1$s" class="sticky-show sticky-logo" rel="home" itemprop="url">%2$s</a>',
		esc_url( home_url( '/' ) ),
		wp_get_attachment_image( get_option( 'site_icon' ), array( 32, 32 ), false, array(
			'class'    => 'sticky-icon',
			'itemprop' => 'logo',
		) )
	);
}

function pagespeed_mobile_search() {
	global $he;
	if ( ! $he->is_mobile() ) {
		return;
	}
	get_template_part( 'searchform-nav' );
}


function pagespeed_breadcrumbs() {
	global $he;
	if ( $he->get_meta( 'hide_breadcrumbs' ) ) {
		return;
	}

	$defaults = array(
		'separator'     => '/',
		'before'        => '<div data-icon="h" class="icon"></div>',
		'after'         => false,
		'show_on_front' => false,
		'show_home'     => __( 'Home', 'page-speed' ),
		'show_browse'   => false,
//		"singular_{$post_type}_taxonomy" => false,
		'echo'          => true
	);
	if ( current_theme_supports( 'breadcrumb-trail' ) ) {
		breadcrumb_trail( $defaults );
		echo '<div class="clear"></div>';
	}
}


