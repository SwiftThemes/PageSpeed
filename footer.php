<?php do_action( 'pagespeed_before_footer' ); ?>

<?php if ( is_active_sidebar( "footer-1" ) || is_active_sidebar( "footer-2" ) || is_active_sidebar( "footer-3" ) || is_active_sidebar( "footer-4" ) || is_active_sidebar( "footer-5" ) ): ?>
	<footer id="site-footer-container" class="cf">
		<div id="site-footer" class="sb">
			<?php
			for ( $i = 1; $i <= 4; $i ++ ):
				?>
			<div class="fc-<?php echo $i ?> fc">
				<div class="inner">
				<?php if ( function_exists( 'dynamic_sidebar' ) && dynamic_sidebar( "footer-$i" ) ) ?>
				</div>
				</div>
				<!--End of footer-1 -->
				<?php
			endfor;
			?>
		</div>
	</footer>
<?php endif; ?>

</div><!-- #wrapper -->
<div id="copyright-container">
	<div class="inner hybrid">
		<?php
		wp_nav_menu( array(
				'container'      => '',
				'menu_class'     => '',
				'menu_id'        => 'footer-links',
				'fallback_cb'    => '',
				'theme_location' => 'footer_links'
			)
		);
		?>
		<?php echo get_theme_mod( 'copyright_text', 'Copyright &copy; ' . date( "Y" ) . ' ' . '<a href="' . esc_url( home_url() ) . '"
						                          rel="home">' . get_bloginfo( "name" ) . '</a>' ) ?>
	</div>
</div>
<?php
wp_footer();
?>
</body>
<div id="side-pane">
	<div id="side-pane-inner"></div>
</div>
</html>
