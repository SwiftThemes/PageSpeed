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

get_header();


?>
<div id="archive-info" class="cf">
	<div class="archive-title">
		<?php
		echo sprintf(
			get_theme_mod( 'archives_title', __( 'Archives for', 'page-speed' ) . ' %s' ),
			'<h1>' . get_the_archive_title() . '</h1>'
		)
		?>
	</div>
	<?php echo category_description(); ?>
	<div class="separator"></div>

</div>
<?php
if ( have_posts() ) :
	?>
<div id="articles">
	<div class="gutter-sizer"></div>

	<?php
	// Start the loop.
	while ( have_posts() ) :
		the_post();

		/*
		 * Include the Post-Format-specific template for the content.
		 * If you want to override this in a child theme, then include a file
		 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
		 */
		get_template_part( 'template-parts/content-archives' );

		// End the loop.
	endwhile;
	echo '</div><!--#articles-->';

	// Previous/next page navigation.
	the_posts_pagination(
		array(
			'prev_text'          => __( 'Previous page', 'page-speed' ),
			'mid_size'           => 2,
			'next_text'          => __( 'Next page', 'page-speed' ),
			'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'page-speed' ) . ' </span>',
		)
	);
	echo '<div class="clear"></div>';

	// If no content, include the "No posts found" template.
	else :
		get_template_part( 'template-parts/content', 'none' );

	endif;
	if ( 'single' != get_theme_mod( 'theme_layout', 'r-sb' ) ) {
		get_sidebar();
	}
	?>

</div></div><!-- #content-wrapper,#content -->
<?php get_footer(); ?>
