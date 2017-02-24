<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package PageSpeed
 * @since 1.0
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet" media="none" onload="this.media='all';">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php do_action( 'ngbr_after_body' ); ?>

<div id="wrapper" class="cf">
	<?php do_action( 'ngbr_before_header' ); ?>

	<div id="site-header-container" class="logo-<?php echo get_theme_mod( 'logo_position', 'left' ) ?>">
		<div class="inner hybrid cf">
			<header id="site-header" role="banner" class="cf">
				<div id="site-branding">

					<?php
					if ( get_theme_mod( 'custom_logo' ) ):
						the_custom_logo();
					else:
						?>
						<?php if ( is_front_page() && is_home() ) : ?>
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"
						                          rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php else : ?>
						<h3 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"
						                          rel="home"><?php bloginfo( 'name' ); ?></a></h3>
					<?php endif;

						$description = get_bloginfo( 'description', 'display' );
						if ( $description || is_customize_preview() ) : ?>
							<p class="site-description"><?php echo $description; ?></p>
						<?php endif; ?>
					<?php endif; ?>
				</div><!-- .site-branding -->
				<button id="menu">Menu</button>
			</header><!-- #site-header -->
		</div>
	</div><!--#site-header-container -->
	<?php do_action( 'ngbr_after_header' ); ?>

	<div id="content" class="cf">
		<div id="left">
			<main id="main" role="main">
				<div class="inner">
