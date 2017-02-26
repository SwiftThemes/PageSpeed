<aside id="sb2">
	<div class="inner">
		<?php
		if ( is_active_sidebar( 'right-single' ) ) :
			?>
			<div id="" class="sb">
				<?php dynamic_sidebar( 'right-single' ); ?>
			</div>
			<?php
		endif;
		?>
		<?php
		if ( is_active_sidebar( 'right-sticky-single' ) ) :
			?>
			<div id="sticky-sb2" class="sb">
				<?php dynamic_sidebar( 'right-sticky-single' ); ?>
			</div>
			<?php
		endif;
		?>
	</div>
</aside>
