<aside id="sb1" class="sb-container cf">
	<div class="inner cf">

		<?php
		if ( is_active_sidebar( 'left-page' ) ) :
			?>
			<div id="normal-sb" class="sb">
				<?php dynamic_sidebar( 'left-page' ); ?>
			</div>
			<?php
		endif;
		?>
		<?php
		if ( is_active_sidebar( 'left-sticky-page' ) ) :
			?>
			<div id="sticky-sb1" class="sb">
				<?php dynamic_sidebar( 'left-sticky-page' ); ?>
			</div>
			<?php
		endif;
		?>


		<div class="clear"></div>
	</div>
</aside>
