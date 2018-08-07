<?php
/**
 * Created by Satish Gandham.
 * User: satish
 * Date: 05/02/17
 * Time: 11:12 PM
 */


add_action( 'pagespeed_before_header', 'pagespeed_above_header', 8 );
add_action( 'pagespeed_after_header', 'pagespeed_below_header', 12 );
add_action( 'pagespeed_header_end', 'pagespeed_header_navigation', 12 );
add_action( 'pagespeed_after_header', 'pagespeed_mobile_search', 14 );
add_action( 'pagespeed_primary_nav_start', 'pagespeed_sticky_logo', 12 );
add_action( 'pagespeed_main_start', 'pagespeed_breadcrumbs', 12 );


if ( ! function_exists( 'pagespeed_above_header' ) ) {
	function pagespeed_above_header() {
		global $helium;

		$theme_location = 'secondary';

		if ( get_theme_mod( 'different_navigation_for_tablets', false ) && $helium->is_tablet() ) {
			$theme_location = 'secondary_tablet';
		}

		if ( get_theme_mod( 'different_navigation_for_mobiles', false ) && $helium->is_mobile() ) {
			$theme_location = 'secondary_mobile';
		}


		$after = '';
		if ( $helium->is_mobile() ) {
			$after = '<span class="status" onclick = "void(0)"></span>';
		}
		$args = array(
			'theme_location'  => $theme_location,
			'container'       => 'nav',
			'container_class' => 'nav',
			'container_id'    => 'secondary-nav',
			'menu_class'      => 'menu',
			'menu_id'         => '',
			'echo'            => true,
			'before'          => '',
			'after'           => $after,
			'link_before'     => '',
			'link_after'      => '',
			'items_wrap'      => '<ul id="%1$s" class="%2$s cf">%3$s</ul>',
			'item_spacing'    => 'preserve',
			'depth'           => 0,
			'walker'          => '',

		);


		if ( has_nav_menu( $theme_location ) ) :
			?>
            <div id="secondary-nav-container" class="nav-container cf">
                <div id="secondary" class="">
                    <div class="hybrid"> <!-- adding inner -->
                        <div class="inner">
							<?php wp_nav_menu( $args ); ?>
                        </div>
                    </div>
                </div>
            </div>
			<?php
		endif;
	}
}

if ( ! function_exists( 'pagespeed_below_header' ) ) {


	function pagespeed_below_header() {
		if ( get_theme_mod( 'enable_sleek_header', true ) ) {
			return;
		}

		global $helium;
		$theme_location = 'primary';
		if ( get_theme_mod( 'different_navigation_for_tablets', false ) && $helium->is_tablet() ) {
			$theme_location = 'primary_tablet';
		}

		if ( get_theme_mod( 'different_navigation_for_mobiles', false ) && $helium->is_mobile() ) {
			$theme_location = 'primary_mobile';
		}

		$after = '';
		if ( $helium->is_mobile() ) {
			$after = '<span class="status" onclick = "void(0)"></span>';
		}
		$args = array(
			'theme_location'  => $theme_location,
			'container'       => 'nav',
			'container_class' => 'nav',
			'container_id'    => 'primary-nav',
			'menu_class'      => 'menu',
			'menu_id'         => '',
			'echo'            => true,
			'before'          => '',
			'after'           => $after,
			'link_before'     => '',
			'link_after'      => '',
			'items_wrap'      => '<ul id="%1$s" class="%2$s cf">%3$s</ul>',
			'item_spacing'    => 'preserve',
			'depth'           => 0,
			'walker'          => '',
			'fallback_cb'     => 'page_speed_dummy_menu'
		);


		if ( get_theme_mod( 'is_sticky_nav' ) ) {
			$container_class = ' stick-it';
		} else {
			$container_class = '';
		}
		if ( get_option( 'site_icon' ) ) {
			$container_class .= ' has-sticky-logo';
		}

		?>
        <div id="primary-nav-container" class="nav-container cf <?php echo $container_class ?>">
            <div id="primary" class="">
                <div class="hybrid"> <!-- adding inner -->
                    <div class="inner">

						<?php do_action( 'pagespeed_primary_nav_start' ); ?>
						<?php wp_nav_menu( $args ); ?>
						<?php do_action( 'pagespeed_primary_nav_end' ); ?>

                    </div>
                </div>
            </div>
        </div>
		<?php
	}
}
if ( ! function_exists( 'pagespeed_header_navigation' ) ) {
	function pagespeed_header_navigation() {

		if ( ! get_theme_mod( 'enable_sleek_header', true ) ) {
			return;
		}

		global $helium;
		$theme_location = 'primary';
		if ( get_theme_mod( 'different_navigation_for_tablets', false ) && $helium->is_tablet() ) {

			$theme_location = 'primary_tablet';
		}
		if ( get_theme_mod( 'different_navigation_for_mobiles', false ) && $helium->is_mobile() ) {
			$theme_location = 'primary_mobile';
		}

		$after = '';
		if ( $helium->is_mobile() ) {
			$after = '<span class="status" onclick = "void(0)"></span>';
		}
		$args = array(
			'theme_location'  => $theme_location,
			'container'       => 'nav',
			'container_class' => 'nav',
			'container_id'    => 'header-nav',
			'menu_class'      => 'menu',
			'menu_id'         => '',
			'echo'            => true,
			'before'          => '',
			'after'           => $after,
			'link_before'     => '',
			'link_after'      => '',
			'items_wrap'      => '<ul id="%1$s" class="%2$s cf">%3$s</ul>',
			'item_spacing'    => 'preserve',
			'depth'           => 0,
			'walker'          => '',
			'fallback_cb'     => 'page_speed_dummy_menu'
		);


		if ( get_theme_mod( 'is_sticky_nav' ) ) {
			$container_class = ' stick-it';
		} else {
			$container_class = '';
		}
		if ( get_option( 'site_icon' ) ) {
			$container_class .= ' has-sticky-logo';
		}

		?>
        <div id="header-nav-container" class="cf <?php echo sanitize_html_class( $container_class ) ?>">
            <div id="primary" class="">
				<?php do_action( 'pagespeed_header_nav_start' ); ?>
				<?php wp_nav_menu( $args ); ?>
				<?php do_action( 'pagespeed_header_nav_end' ); ?>
            </div>
        </div>
		<?php
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
	global $helium;
	if ( ! $helium->is_mobile() ) {
		return;
	}
	get_template_part( 'searchform-mobile' );
}

function pagespeed_breadcrumbs() {

	if ( get_post_meta( get_queried_object_id(), 'hide_breadcrumbs', true ) ) {
		return;
	}

	if ( is_page() && get_theme_mod( 'hide_breadcrumbs_on_page', false ) ) {
		return;
	}
	if ( is_singular( 'post' ) && get_theme_mod( 'hide_breadcrumbs_on_post', false ) ) {
		return;
	}
	$defaults = array(
		'separator'     => '/',
		'before'        => '<span class="icon he-home"></span>',
		'after'         => false,
		'show_on_front' => false,
		'show_home'     => __( 'Home', 'page-speed' ),
		'show_browse'   => false,
		'echo'          => true
	);
	if ( current_theme_supports( 'breadcrumb-trail' ) ) {
		breadcrumb_trail( $defaults );
		echo '<div class="clear"></div>';
	}
}


function page_speed_dummy_menu() {
	if ( helium_is_preview_demo() ) {

		$args = array(
			'menu'            => 'main',
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
		);

		wp_nav_menu( $args );

		return;
	}
	if ( current_user_can( 'customize' ) && ! has_nav_menu( 'primary' ) && ! has_nav_menu( 'secondary' ) ) {
		echo '<div style="text-align: center" class="nav"> <a href="' . esc_url( admin_url( 'nav-menus.php' ) ) . '" >' . __( 'Howdy!! Thanks for choosing PageSpeed :-).<br />Set the primary navigation menu at <strong>appearance -> menus</strong> and I will go away!!', 'page-speed' ) . '</a></div>';
	}

	return null;
}

