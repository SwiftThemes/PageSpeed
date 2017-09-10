<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header();


// Start the loop.
while ( have_posts() ) : the_post();

	/*
	 * Include the Post-Format-specific template for the content.
	 * If you want to override this in a child theme, then include a file
	 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
	 */
	get_template_part( 'template-parts/content-page', get_post_format() );

	if ( comments_open() || get_comments_number() ) :
		comments_template();
	endif;
	// End the loop.
endwhile;


// If comments are open or we have at least one comment, load up the comment template.


if ( get_theme_mod( 'dedicated_sidebars_on_default_page_template', false ) ):
	get_sidebar( 'page' );
else:
	get_sidebar();
endif;
?>

</div><!-- #content -->
<?php get_footer(); ?>

