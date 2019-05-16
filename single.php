<?php

get_header();
?>
<?php if ( have_posts() ) : ?>
	<?php if ( is_home() && ! is_front_page() ) : ?>
        <header>
            <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
        </header>
	<?php endif; ?>

	<?php
	// Start the loop.
	while ( have_posts() ) : the_post();

		/*
		 * Include the Post-Format-specific template for the content.
		 * If you want to override this in a child theme, then include a file
		 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
		 */
		get_template_part( 'template-parts/content-post', get_post_format() );

		// End the loop.
	endwhile;

	// Previous/next page navigation.
	the_post_navigation( array(
		'prev_text' => '<span class="screen-reader-text">' . __( 'Previous Post', 'page-speed' ) . '</span><span aria-hidden="true" class="nav-subtitle">&laquo; ' . __( 'Previous', 'page-speed' ) . '</span> <span class="nav-title">%title</span>',
		'next_text' => '<span class="screen-reader-text">' . __( 'Next Post', 'page-speed' ) . '</span></span> <span class="nav-title">%title</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Next', 'page-speed' ) . ' &raquo;',
	) );
	?>
    <div class="clear"></div>
	<?php
// If comments are open or we have at least one comment, load up the comment template.
	if ( comments_open() || get_comments_number() ) :
		comments_template();
	endif;
// If no content, include the "No posts found" template.
else :
	get_template_part( 'template-parts/content', 'none' );
endif;
?>
<?php
if ( (has_post_thumbnail() && '1c' === get_theme_mod( 'single_post_layout' )) || get_post_meta( get_the_ID(), 'full_width', true) ) {
	get_sidebar( 'single-column' );
} else {
	get_sidebar();
}
?>

</div></div><!-- #content-wrapper,#content -->
<?php get_footer(); ?>

