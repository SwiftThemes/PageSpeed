
<?php do_action( 'pagespeed_main_end' ); ?>

</div><!-- main inner-->
</main>
<?php get_sidebar( 'c1-page' ); ?>
</div><!--#left -->

<?php
/**
 * We only need the sidebar #2 in centered layout
 */
if ( get_theme_mod( 'theme_layout', 'centered' ) === 'centered' ) {
	get_sidebar( 'c2-page' );
}
?>
