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
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 */


get_header();

?>
<?php if ( have_posts() ) : ?>
<div id="articles">
    <div class="gutter-sizer"></div>

	<?php
	// Start the loop.
	while ( have_posts() ) : the_post();


		get_template_part( 'template-parts/content' );

		// End the loop.
	endwhile;

	echo '</div>';
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
	<?php

	if ( is_home() && get_theme_mod( 'dedicated_sidebars_on_home', false ) ) {
		get_sidebar( 'home' );
	} else {
		get_sidebar();
	}

	?>

</div></div><!-- #content -->
<?php get_footer(); ?>

