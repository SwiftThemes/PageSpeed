<?php
/**
 * Template Name: Full Width Page
 *
 * @package PageSpeed
 * @since 1.0
 */


get_header();
global $he;
?>
<?php if ( have_posts() ) : ?>


	<?php
	// Start the loop.
	while ( have_posts() ) : the_post();

		/*
		 * Include the Post-Format-specific template for the content.
		 * If you want to override this in a child theme, then include a file
		 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
		 */
		get_template_part( 'template-parts/content-full-width-page', get_post_format() );

		// End the loop.
	endwhile;

	// Previous/next page navigation.
	the_posts_pagination( array(
		'prev_text'          => __( 'Previous page', 'page-speed' ),
		'next_text'          => __( 'Next page', 'page-speed' ),
		'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'page-speed' ) . ' </span>',
	) );

// If comments are open or we have at least one comment, load up the comment template.
	if ( comments_open() || get_comments_number() ) :
		comments_template();
	endif;
// If no content, include the "No posts found" template.
else :
	get_template_part( 'template-parts/content', 'none' );

endif;
?>
<?php do_action( 'pagespeed_main_end' ); ?>

</div><!-- main inner-->
</main>
</div></div><!-- #content -->
<?php get_footer(); ?>

