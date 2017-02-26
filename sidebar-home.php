<?php get_sidebar( 'one-home' ); ?>
</div><!--#left -->

<?php
/**
 * We only need the sidebar #2 in centered layout
 */
if ( get_theme_mod( 'theme_layout', '' ) === 'centered' ) {
	get_sidebar( 'two-home' );
}
?>
