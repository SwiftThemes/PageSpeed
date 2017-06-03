<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">
		<?php if ( get_theme_mod( 'single_page_meta_above_title' ) ): ?>
			<div class="entry-meta meta above-title">
				<?php echo do_shortcode( get_theme_mod( 'single_page_meta_above_title' ) ) ?>
			</div>
		<?php endif ?>
		<?php
		the_title( '<h1 class="entry-title">','</h1>' );
		?>
		<?php if ( get_theme_mod( 'single_page_meta_below_title' ) ): ?>
			<div class="entry-meta meta below-title">
				<?php echo do_shortcode( get_theme_mod( 'single_page_meta_below_title' ) ) ?>
			</div>
		<?php endif ?>
	</header><!-- .entry-header -->

	<?php if ( '' !== get_the_post_thumbnail() && ! is_single() ) : ?>
		<div class="post-thumbnail">
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail( 'pagespeed-featured-image' ); ?>
			</a>
		</div><!-- .post-thumbnail -->
	<?php endif; ?>

	<div class="entry-content">
		<?php if ( '' !== get_the_post_thumbnail() && get_theme_mod( 'home_show_thumbnails' ) ) : ?>
			<div class="post-thumbnail">
				<a href="<?php the_permalink(); ?>">
					<?php the_post_thumbnail( helium_get_thumb_size( 'home_thumb' ), array( 'class' => get_theme_mod( 'home_thumb_position' ) ) ) ?>
				</a>
			</div><!-- .post-thumbnail -->
		<?php endif; ?>
		<?php
		/* translators: %s: Name of current post */
		the_content( sprintf(
			__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'page-speed' ),
			get_the_title()
		) );
		?>
		<div class="clear"></div>
		<?php
		wp_link_pages( array(
			'before'      => '<div class="page-links">' . __( 'Pages:', 'page-speed' ),
			'after'       => '</div>',
			'link_before' => '<span class="page-number">',
			'link_after'  => '</span>',
		) );
		?>
	</div><!-- .entry-content -->

	<?php if ( get_theme_mod( 'single_page_meta_after_body' ) ): ?>
		<footer class="entry-footer">
			<div class="inner footer meta">
				<?php echo do_shortcode( get_theme_mod( 'single_page_meta_after_body' ) ) ?>
			</div>
		</footer>
	<?php endif; ?>
</article><!-- #post-## -->
