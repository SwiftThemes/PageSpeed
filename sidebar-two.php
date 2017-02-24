<aside id="sb2">
	<div class="inner">
		<?php
		if ( is_active_sidebar( 'right' ) ) :
			?>
			<div id="" class="sb">
				<?php dynamic_sidebar( 'right' ); ?>
			</div>
			<?php
		endif;
		?>
		<?php
		if ( is_active_sidebar( 'right-sticky' ) ) :
			?>
			<div id="sticky-sb2" class="sb">
				<?php dynamic_sidebar( 'right-sticky' ); ?>
			</div>
			<?php
		endif;
		?>


	</div>
</aside>
