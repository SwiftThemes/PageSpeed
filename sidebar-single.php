
<?php do_action( 'pagespeed_main_end' ); ?>

</div><!-- main inner-->
</main>
<?php get_sidebar( 'one-single' ); ?>
</div><!--#left -->

<?php
/**
 * We only need the sidebar #2 in centered layout
 */
if ( get_theme_mod( 'theme_layout', '' ) === 'centered' ) {
	get_sidebar( 'two-single' );
}
?>
