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

?>
<?php if ( have_posts() ) : ?>

	<?php
	// Start the loop.
	while ( have_posts() ) : the_post();


		get_template_part( 'template-parts/content' );

		// End the loop.
	endwhile;

	// Previous/next page navigation.
	the_posts_pagination( array(
		'prev_text'          => __( 'Previous page', 'nybr' ),
		'mid_size'           => 2,
		'next_text'          => __( 'Next page', 'nybr' ),
		'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'nybr' ) . ' </span>',
	) );
	echo '<div class="clear"></div>';

// If no content, include the "No posts found" template.
else :
	get_template_part( 'template-parts/content', 'none' );
endif;
?>
</div><!-- main inner-->
</main>
<?php get_sidebar( 'home' ); ?>

</div><!-- #content -->
<?php get_footer(); ?>

