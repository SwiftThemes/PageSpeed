<?php do_action( 'pagespeed_main_end' ); ?>
</div><!-- main inner-->
</main>
<?php get_sidebar( 'c1-home' ); ?>
</div><!--#left -->

<?php
/**
 * We only need the sidebar #2 in centered layout
 */
if ( in_array( get_theme_mod( 'theme_layout', 'centered' ), array( 'rr-sb', 'll-sb', 'centered' ) ) ){
	get_sidebar( 'c2-home' );
}
?>
