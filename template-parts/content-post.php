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

$above_title_default   = array(
	array( 'key' => 'Cat', 'value' => __( 'Filed under', 'page-speed' ) . '&nbsp;' )
);
$below_title_default   = array(
	array( 'key' => 'Text', 'value' => __( 'Published by', 'page-speed' ) . '&nbsp;' ),
	array( 'key' => 'AuthorLink', 'value' => false ),
	array( 'key' => 'Text', 'value' => __( 'on', 'page-speed' ) . '&nbsp;' ),
	array( 'key' => 'Published', 'value' => false ),
	array( 'key' => 'Line', 'value' => false ),
);
$after_content_default = array(
	array( 'key'=>'Tags' ,'value'=> __( 'Tagged with', 'page-speed' ) . '&nbsp;' ),
);
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
		<?php if ( get_theme_mod( 'single_post_meta_above_title', $above_title_default ) ): ?>
            <div class="entry-meta meta above-title">
				<?php helium_generate_post_meta( get_theme_mod( 'single_post_meta_above_title', $above_title_default ) ) ?>
            </div>
		<?php endif ?>
		<?php
		the_title( '<h1 class="entry-title">', '</h1>' );
		?>
		<?php if ( get_theme_mod( 'single_post_meta_below_title', $below_title_default ) ): ?>
            <div class="entry-meta meta below-title">
				<?php helium_generate_post_meta( get_theme_mod( 'single_post_meta_below_title', $below_title_default ) ) ?>
            </div>
		<?php endif ?>
    </header>
    <!-- .entry-header -->


    <div class="entry-content">
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

	<?php if ( get_theme_mod( 'single_post_meta_after_body', $after_content_default ) ): ?>
        <footer class="entry-footer">
            <div class="inner footer meta">
				<?php helium_generate_post_meta( get_theme_mod( 'single_post_meta_after_body', $after_content_default ) ) ?>
            </div>
        </footer>
	<?php endif; ?>
</article><!-- #post-## -->
