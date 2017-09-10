<aside id="sb2">
	<div class="inner">
		<?php
		if ( is_active_sidebar( 'right-home' ) ) :
			?>
			<div id="" class="sb">
				<?php dynamic_sidebar( 'right-home' ); ?>
			</div>
			<?php
		endif;
		?>
		<?php
		if ( is_active_sidebar( 'right-sticky-home' ) ) :
			?>
			<div id="sticky-sb2" class="sb">
				<?php dynamic_sidebar( 'right-sticky-home' ); ?>
			</div>
			<?php
		endif;
		?>


	</div>
</aside>
