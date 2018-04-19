<?php
global $helium;
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( ); ?>>

	<?php if ( ! $helium->get_meta( 'hide_title' ) ): ?>
        <header class="entry-header">


			<?php
			the_title( '<h1 class="entry-title">', '</h1>' );
			?>

        </header><!-- .entry-header -->
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

    </div><!-- .entry-content -->
</article><!-- #post-## -->
