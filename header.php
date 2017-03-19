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
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet" media="none"
	      onload="this.media='all';">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php do_action( 'ngbr_after_body' ); ?>

<div id="wrapper" class="cf">
	<?php do_action( 'ngbr_before_header' ); ?>

	<div id="site-header-container" class="cf logo-<?php echo get_theme_mod( 'logo_position', 'left' ) ?>">
		<div class="inner hybrid cf">
			<?php do_action( 'ngbr_header_start' ); ?>


			<?php do_action( 'ngbr_header_end' ); ?>
		</div>
	</div><!--#site-header-container -->
	<?php do_action( 'ngbr_after_header' ); ?>

	<div id="content" class="cf">
		<div id="left">
			<main id="main" role="main">
				<div class="inner">
					<?php do_action( 'ngbr_main_start' ); ?>
