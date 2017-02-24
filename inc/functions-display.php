<?php
/**
 * Created by PhpStorm.
 * User: satish
 * Date: 05/02/17
 * Time: 11:12 PM
 */


add_action( 'ngbr_after_body', 'ngbr_above_header', 8 );
add_action( 'ngbr_after_header', 'ngbr_below_header', 12 );

if ( ! function_exists( 'ngbr_above_header' ) ) {
	function ngbr_above_header() {
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
					<div class="hybrid inner">
						<?php wp_nav_menu( $args ); ?>
					</div>
				</div>
			</div>
			<?php
		endif;
	}
}

if ( ! function_exists( 'ngbr_below_header' ) ) {
	function ngbr_below_header() {
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


		if ( has_nav_menu( 'secondary' ) ) :
			?>
			<div id="primary-nav-container" class="nav-container cf">
				<div id="primary" class="">
					<div class="hybrid inner">
						<?php wp_nav_menu( $args ); ?>
					</div>
				</div>
			</div>
			<?php
		endif;
	}
}
