<div id="sticky-search">
	<div class="inner">
		<?php pagespeed_sticky_logo(); ?>
		<div class="he-search-wrapper">
			<form role="search" method="get" class="cf mobile-nav-search-form"
			      action="<?php echo esc_url( home_url( '/' ) ); ?>">
				<label>
				<span class="screen-reader-text">
		<?php echo _x( 'Search for:', 'label', 'page-speed' ); ?></span>
				</label>
				<div class="input">
					<input type="search" class="search-field"
					       placeholder="<?php echo esc_attr_x( 'Type and hit enter to search&hellip;', 'placeholder', 'page-speed' ); ?>"
					       value="<?php echo get_search_query(); ?>" name="s"/>
				</div>
			</form>
		</div>
		<?php pagespeed_add_menu_icon() ?>
	</div>
</div>