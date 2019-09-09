<aside id="sb2" class="sb-container">
	<div class="inner">
		<?php
		if ( is_active_sidebar( 'right-page' ) ) :
			?>
			<div id="" class="sb">
				<?php dynamic_sidebar( 'right-page' ); ?>
			</div>
			<?php
		endif;
		?>
		<?php
		if ( is_active_sidebar( 'right-sticky-page' ) ) :
			?>
			<div id="sticky-sb2" class="sb">
				<?php dynamic_sidebar( 'right-sticky-page' ); ?>
			</div>
			<?php
		endif;
		?>
	</div>
</aside>
