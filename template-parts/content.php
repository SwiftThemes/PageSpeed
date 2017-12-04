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

<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?>>

    <header class="entry-header">
		<?php if ( get_theme_mod( 'home_meta_above_title' ) ): ?>
            <div class="entry-meta meta above-title">
				<?php echo do_shortcode( get_theme_mod( 'home_meta_above_title' ) ) ?>
            </div>
		<?php endif ?>
		<?php
		the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		?>
		<?php if ( get_theme_mod( 'home_meta_below_title' ) ): ?>
            <div class="entry-meta meta below-title">
				<?php echo do_shortcode( get_theme_mod( 'home_meta_below_title' ) ) ?>
            </div>
		<?php endif ?>
    </header><!-- .entry-header -->

	<?php if ( '' !== get_the_post_thumbnail() && get_theme_mod( 'home_show_thumbnails', true ) ) : ?>
        <div class="post-thumbnail">
            <a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail( helium_get_thumb_size( 'home_thumb' ), array( 'class' => get_theme_mod( 'home_thumb_position', 'alternate' ) ) ) ?>
            </a>
        </div><!-- .post-thumbnail -->
	<?php endif; ?>

    <div class="entry-content">
		<?php
		/* translators: %s: Name of current post */
		if ( get_theme_mod( 'home_show_excerpts', true ) ) {
			the_excerpt();

		} else {
			the_content();
		}
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

    <div class="clear"></div>
	<?php if ( get_theme_mod( 'home_meta_after_body','[cat]Filed under [/cat]' ) ) {
		if ( '<hr class="separator">' == trim( get_theme_mod( 'home_meta_after_body' ) ) ) {
			echo '<hr class="separator">';
		} else {
			?>

            <footer class="entry-footer">
                <div class="inner footer meta">
					<?php echo do_shortcode( get_theme_mod( 'home_meta_after_body', '[cat]Filed under [/cat]' ) ) ?>
                </div>
            </footer>
		<?php }
	} ?>
</article><!-- #post-## -->
