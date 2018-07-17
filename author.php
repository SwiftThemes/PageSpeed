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


<?php
$curauth = get_userdata( intval( $author ) );
?>
<div id="archive-info" class="clearfix" style="margin-top: 20px">
    <div class="archive-title reset">
        <span class="normal"><?php _e( 'About', 'page-speed' ) ?> </span>
		<?php echo $curauth->display_name;; ?>
    </div>
    <div class="alignleft author-avatar"><?php echo get_avatar( $curauth->user_email, 90 ); ?>
    </div>
	<?php
	if ( ! empty( $curauth->user_description ) ):
		echo '<p style="margin-left: 100px">' . $curauth->user_description . '</p>';
	endif;
	?>
	<?php if ( ! empty( $curauth->user_url ) ): ?>
        <strong><?php _e( 'Website:', 'page-speed' ) ?> </strong> <a
                href="<?php echo $curauth->user_url; ?>"><?php echo $curauth->user_url; ?>
        </a><br/>
	<?php endif; ?>
	<?php
	printf( ( ( get_the_author_posts() > 0 ) ? _n( '%1$s has written %2$s article so far, you can find it below.',
		'%1$s has written %2$s articles so far, you can find them below.', get_the_author_posts(), 'page-speed' ) : __( '%1$s has written no articles so far.', 'page-speed' ) ), $curauth->nickname, '<strong>' . get_the_author_posts() . '</strong>' ); ?>
    <br/>
</div>

<div class="clear"></div>

<?php
if ( have_posts() ) :
?>
<div id="articles">
    <div class="gutter-sizer"></div>

	<?php
	// Start the loop.
	while ( have_posts() ) : the_post();

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
	get_sidebar();

	?>

</div></div><!-- #content-wrapper,#content -->
<?php get_footer(); ?>

