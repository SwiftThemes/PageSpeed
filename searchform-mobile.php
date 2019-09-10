<div id="sticky-search">
	<div class="inner">
		<?php pagespeed_sticky_logo(); ?>
		<div id ="mobile-search-form" class="he-search-wrapper <?php echo ( get_theme_mod( 'show_search_in_side_pane', true ) ? '' : 'no-show' ); ?>">
			<form role="search" method="get" class="cf mobile-nav-search-form"
					action="<?php echo esc_url( home_url( '/' ) ); ?>">
				<label>
				<span class="screen-reader-text">
		<?php echo _x( 'Search for:', 'label', 'page-speed' ); ?></span>
				</label>
				<div class="input">
					<input type="search" class="search-field" id="search-field"
							placeholder="<?php echo esc_attr_x( 'Search&hellip;', 'placeholder', 'page-speed' ); ?>"
							value="<?php echo get_search_query(); ?>" name="s"/>
				</div>
			</form>
		</div>
		<?php pagespeed_add_menu_icon(); ?>
	</div>
</div>
