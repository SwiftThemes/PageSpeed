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
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="profile" href="http://gmpg.org/xfn/11">

		<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
            <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<?php endif; ?>
		<?php wp_head(); ?>
    </head>
<body <?php body_class(); ?>>
<?php do_action( 'pagespeed_after_body' ); ?>

<div id="wrapper" class="cf">
    <div id="content-wrapper">
    <div id="content" class="cf hybrid">
<?php do_action( 'pagespeed_content_start' ); ?>
    <div id="left">
        <main id="main" role="main">
            <div class="inner">
<?php do_action( 'pagespeed_main_start' ); ?>
