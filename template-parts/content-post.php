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
		<?php if ( get_theme_mod( 'single_post_meta_above_title' ) ): ?>
			<div class="entry-meta meta above-title">
				<?php echo do_shortcode( get_theme_mod( 'single_post_meta_above_title' ) ) ?>
			</div>
		<?php endif ?>
		<?php
		the_title( '<h1 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		?>
		<?php if ( get_theme_mod( 'single_post_meta_below_title' ) ): ?>
			<div class="entry-meta meta below-title">
				<?php echo do_shortcode( get_theme_mod( 'single_post_meta_below_title' ) ) ?>
			</div>
		<?php endif ?>
	</header><!-- .entry-header -->


	<div class="entry-content">
		<?php
		/* translators: %s: Name of current post */
		the_content( sprintf(
			__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'nybr' ),
			get_the_title()
		) );

		wp_link_pages( array(
			'before'      => '<div class="page-links">' . __( 'Pages:', 'nybr' ),
			'after'       => '</div>',
			'link_before' => '<span class="page-number">',
			'link_after'  => '</span>',
		) );
		?>
	</div><!-- .entry-content -->

	<?php if ( get_theme_mod( 'single_post_meta_after_body' ) ): ?>
		<footer class="entry-footer">
			<div class="inner footer meta">
				<?php echo do_shortcode( get_theme_mod( 'single_post_meta_after_body' ) ) ?>
			</div>
		</footer>
	<?php endif; ?>
</article><!-- #post-## -->
