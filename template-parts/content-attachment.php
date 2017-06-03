<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		if ( get_theme_mod( 'single_post_meta_above_title', '[cat]' . __( 'Filed under', 'page-speed' ) . '&nbsp;[/cat]' ) ): ?>
			<div class="entry-meta meta above-title">
				<?php echo do_shortcode( get_theme_mod( 'single_post_meta_above_title' ) ) ?>
			</div>
			<?php
		endif;

		the_title( '<h1 class="entry-title">', '</h1>' );

		?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<a href="<?php echo wp_get_attachment_url($post->ID); ?>"><?php echo wp_get_attachment_image($post->ID, array(1200, 0), false, array('class' => 'gallery-full aligncenter')); ?>
		</a>
		<?php

		the_content();

		wp_link_pages( array(
			'before'      => '<div class="page-links">' . __( 'Pages:', 'page-speed' ),
			'after'       => '</div>',
			'link_before' => '<span class="page-number">',
			'link_after'  => '</span>',
		) );

		?>

	</div><!-- .entry-content -->
	<div class="clear"></div>

	<?php if ( get_theme_mod( 'single_post_meta_after_body' ) ): ?>
		<footer class="entry-footer">
			<div class="inner footer meta">
				<?php echo do_shortcode( get_theme_mod( 'single_post_meta_after_body', '[tag]Tagged with&nbsp;[/tag]' ) ) ?>
			</div>
		</footer>
	<?php endif; ?>

</article><!-- #post-## -->
