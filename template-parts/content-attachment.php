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
		<?php

		the_content();

		wp_link_pages( array(
			'before'      => '<div class="page-links">' . __( 'Pages:', 'pagespeed' ),
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
