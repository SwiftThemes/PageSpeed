<?php
/*
 Template Name: Woo Left Sidebar
 */


get_header();

// Start the loop.
while ( have_posts() ) : the_post();

	/*
	 * Include the Post-Format-specific template for the content.
	 * If you want to override this in a child theme, then include a file
	 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
	 */
	get_template_part( 'template-parts/content-woo', get_post_format() );
	// End the loop.
endwhile;


// If comments are open or we have at least one comment, load up the comment template.


get_sidebar( 'woo' );
?>

</div></div><!-- #content -->
<?php get_footer(); ?>
