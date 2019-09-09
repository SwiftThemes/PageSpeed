<?php
/**
 * Created by Satish Gandham.
 * User: satish
 * Date: 13/03/17
 * Time: 11:49 AM
 */

add_action( 'pagespeed_header_start', 'pagespeed_site_branding', 12 );
add_action( 'pagespeed_header_start', 'pagespeed_add_menu_icon', 16 );

if ( ! function_exists( 'pagespeed_site_branding' ) ) {
	function pagespeed_site_branding() {
		global $helium;
		if ( get_theme_mod( 'social_media_personal_or_business', 'Person' ) === 'Organization' ) {
			$schema = 'itemscope itemtype="http://schema.org/Organization"';
		} else {
			$schema = '';
		}

		?>
		<header id="site-header" role="banner" class="cf">
			<div id="site-branding" <?php echo $schema; ?>>
				<?php
				// If
				if ( $helium->is_mobile() && get_theme_mod( 'mobile_logo' ) ) :
					echo sprintf(
						'<a href="%1$s" class="custom-logo-link" rel="home" itemprop="url">%2$s</a>',
						esc_url( home_url( '/' ) ),
						wp_get_attachment_image(
							intval( get_theme_mod( 'mobile_logo' ) ),
							'full',
							false,
							array(
								'class'    => 'custom-logo-mobile no-lazy-load',
								'itemprop' => 'logo',
							)
						)
					);

				elseif ( get_theme_mod( 'custom_logo' ) ) :
					echo helium_custom_logo();
				else :
					?>
					<?php if ( is_front_page() && is_home() ) : ?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"
											  rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php else : ?>
					<h3 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"
											  rel="home"><?php bloginfo( 'name' ); ?></a></h3>
					<?php
				endif;

					$description = get_bloginfo( 'description', 'display' );
				if ( $description || is_customize_preview() ) :
					?>
						<p class="site-description"><?php echo $description; ?></p>
					<?php endif; ?>
				<?php endif; ?>
			</div><!-- .site-branding -->

		</header><!-- #site-header -->
		<?php

	}
}


function pagespeed_add_menu_icon() {
	?>
	<div id="menu" class="open-drawer">
		&#9776;
	</div>
	<?php
}


function helium_custom_logo( $blog_id = 0 ) {
	$html          = '';
	$switched_blog = false;

	if ( is_multisite() && ! empty( $blog_id ) && (int) $blog_id !== get_current_blog_id() ) {
		switch_to_blog( $blog_id );
		$switched_blog = true;
	}

	$custom_logo_id = get_theme_mod( 'custom_logo' );
	$home_link      = get_theme_mod( 'logo_link', false ) ? esc_url( get_theme_mod( 'logo_link' ) ) : esc_url( home_url( '/' ) );

	// We have a logo. Logo is go.
	if ( $custom_logo_id ) {
		$custom_logo_attr = array(
			'class'    => 'custom-logo no-lazy-load',
			'itemprop' => 'logo',
		);

		/*
		 * If the logo alt attribute is empty, get the site title and explicitly
		 * pass it to the attributes used by wp_get_attachment_image().
		 */
		$image_alt = get_post_meta( $custom_logo_id, '_wp_attachment_image_alt', true );
		if ( empty( $image_alt ) ) {
			$custom_logo_attr['alt'] = get_bloginfo( 'name', 'display' );
		}

		/*
		 * If the alt attribute is not empty, there's no need to explicitly pass
		 * it because wp_get_attachment_image() already adds the alt attribute.
		 */
		$html = sprintf(
			'<a href="%1$s" class="custom-logo-link" rel="home" title="%2$s" itemprop="url">%3$s</a>',
			$home_link,
			get_bloginfo( 'description', 'display' ),
			wp_get_attachment_image( $custom_logo_id, 'full', false, $custom_logo_attr )
		);
	} // If no logo is set but we're in the Customizer, leave a placeholder (needed for the live preview).
	elseif ( is_customize_preview() ) {
		$html = sprintf(
			'<a href="%1$s" class="custom-logo-link" style="display:none;"><img class="custom-logo"/></a>',
			$home_link
		);
	}

	if ( $switched_blog ) {
		restore_current_blog();
	}

	/**
	 * Filters the custom logo output.
	 *
	 * @since 4.5.0
	 * @since 4.6.0 Added the `$blog_id` parameter.
	 *
	 * @param string $html Custom logo HTML output.
	 * @param int $blog_id ID of the blog to get the custom logo for.
	 */
	return apply_filters( 'get_custom_logo', $html, $blog_id );
}
