<?php

get_header();

get_template_part( 'template-parts/content', 'none' );
if ( 'single' != get_theme_mod( 'theme_layout', 'r-sb' ) ) {
	get_sidebar( 'single' );
}
?>

</div></div><!-- #content-wrapper,#content -->
<?php get_footer(); ?>
