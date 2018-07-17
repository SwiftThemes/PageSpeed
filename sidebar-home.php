<?php do_action( 'pagespeed_main_end' ); ?>

<?php
if ( 'single' == get_theme_mod( 'theme_layout', 'r-sb' ) ):
	echo '</div><!-- main inner--></main></div><!--#left -->';
else:
?>
</div><!-- main inner-->
</main>
<?php get_sidebar( 'c1-home' ); ?>
</div><!--#left -->

<?php
endif;
/**
 * We only need the sidebar #2 in centered layout
 */
if ( in_array( get_theme_mod( 'theme_layout', 'r-sb' ), array( 'rr-sb', 'll-sb', 'centered' ) ) ){
	get_sidebar( 'c2-home' );
}
?>
