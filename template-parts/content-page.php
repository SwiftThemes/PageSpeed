<?php

global $helium;


$above_title_default   = array(
	array()
);
$below_title_default   = array(
	array( 'key' => 'Text', 'value' => __( 'Written by', 'page-speed' ) . '&nbsp;' ),
	array( 'key' => 'AuthorLink', 'value' => false ),
	array( 'key' => 'Line', 'value' => false ),
);
$after_content_default = array(
	array( 'key' => 'Text', 'value' => __( 'Published on', 'page-speed' ) . '&nbsp;' ),
	array( 'key' => 'Published', 'value' => false ),
);

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if ( ! $helium->get_meta( 'hide_title' ) ): ?>
        <header class="entry-header">
			<?php if ( get_theme_mod( 'single_page_meta_above_title', $above_title_default ) ): ?>
                <div class="entry-meta meta above-title">
					<?php helium_generate_post_meta( get_theme_mod( 'single_page_meta_above_title', $above_title_default ) ) ?>
                </div>
			<?php endif ?>
			<?php
			the_title( '<h1 class="entry-title">', '</h1>' );
			?>
			<?php if ( get_theme_mod( 'single_page_meta_below_title', $below_title_default ) ): ?>
                <div class="entry-meta meta below-title">
					<?php helium_generate_post_meta( get_theme_mod( 'single_page_meta_above_title', $below_title_default ) ) ?>
                </div>
			<?php endif ?>
        </header><!-- .entry-header -->
	<?php endif; ?>
	<?php if ( '' !== get_the_post_thumbnail() && ! is_single() ) : ?>
        <div class="post-thumbnail">
            <a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail( 'pagespeed-featured-image' ); ?>
            </a>
        </div><!-- .post-thumbnail -->
	<?php endif; ?>

    <div class="entry-content">
		<?php
		the_content( sprintf(
		/* translators: %s: Name of current post */
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

	<?php if ( get_theme_mod( 'single_page_meta_after_body', $after_content_default ) ):?>
        <footer class="entry-footer">
            <div class="inner footer meta">
				<?php helium_generate_post_meta( get_theme_mod( 'single_page_meta_after_body', $after_content_default ) ) ?>
            </div>
        </footer>
	<?php endif; ?>
</article><!-- #post-## -->
