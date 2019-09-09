<aside id="sb1" class="cf sb-container">
	<div class="inner cf">

		<?php
		if ( is_active_sidebar( 'left-home' ) ) :
			?>
			<div id="normal-sb" class="sb">
				<?php dynamic_sidebar( 'left-home' ); ?>
			</div>
			<?php
		endif;
		?>
		<?php
		if ( is_active_sidebar( 'left-sticky-home' ) ) :
			?>
			<div id="sticky-sb1" class="sb">
				<?php dynamic_sidebar( 'left-sticky-home' ); ?>
			</div>
			<?php
		endif;
		?>

		<div class="clear"></div>

	</div>
</aside>
