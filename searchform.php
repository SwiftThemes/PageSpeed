<?php
/**
 * Template for displaying search forms in sidebars
 *
 * @package PageSpeed
 * @since PageSpeed 1.0
 */
?>

<div class="he-search-wrapper">
	<form role="search" method="get" class="cf widget-search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<label>
				<span class="screen-reader-text">
		<?php echo _x( 'Search for:', 'label', 'page-speed' ); ?></span>
		</label>

		<button type="submit" class="search-submit he-btn"><span
				class=""><?php echo _x( 'Search', 'submit button', 'page-speed' ); ?></span></button>
		<div class="input">
		<input type="search" class="search-field"
			   placeholder="<?php echo esc_attr_x( 'Search&hellip;', 'placeholder', 'page-speed' ); ?>"
			   value="<?php echo get_search_query(); ?>" name="s"/>
		</div>
	</form>
</div>
<div class="clear"></div>
