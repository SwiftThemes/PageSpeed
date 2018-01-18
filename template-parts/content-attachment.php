<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php


		the_title( '<h1 class="entry-title">', '</h1>' );

		?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<a href="<?php echo esc_url(wp_get_attachment_url($post->ID)); ?>">
            <?php echo wp_get_attachment_image($post->ID, array(1200, 0), false, array('class' => 'gallery-full aligncenter')); ?>
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

</article><!-- #post-## -->
