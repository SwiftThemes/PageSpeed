<?php

/*
 * @todo
 * 1. Hardcoded to display exceprts. Give option to dispplay just post titles or excerpts
 * 2. Have separate meta and thumbanil options.
 */
get_header();

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
//		get_template_part( 'template-parts/content', get_post_format() );
		get_template_part( 'template-parts/content-search' );

		// End the loop.
	endwhile;

	// Previous/next page navigation.
	the_posts_pagination( array(
		'prev_text'          => __( 'Previous page', 'page-speed' ),
		'mid_size'           => 2,
		'next_text'          => __( 'Next page', 'page-speed' ),
		'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'page-speed' ) . ' </span>',
	) );
	echo '<div class="clear"></div>';

// If no content, include the "No posts found" template.
else :
	get_template_part( 'template-parts/content', 'none' );

endif;
?>
<?php get_sidebar(); ?>

</div></div><!-- #content-wrapper,#content -->
<?php get_footer(); ?>

