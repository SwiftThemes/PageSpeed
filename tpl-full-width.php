<?php
/*
    Copyright 2009-2018  Satish Gandham  (email : hello@satishgandham.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License version 2,
    as published by the Free Software Foundation.

    You may NOT assume that you can use any other version of the GPL.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    The license for this software can likely be found here:
    http://www.gnu.org/licenses/gpl-2.0.html
 */
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

