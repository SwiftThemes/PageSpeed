<aside id="sb1" class="cf sb-container">
	<div class="inner cf">

		<?php
		if ( is_active_sidebar( 'left' ) ) :
			?>
			<div id="normal-sb" class="sb">
				<?php dynamic_sidebar( 'left' ); ?>
			</div>
			<?php
		else :
			?>
			<div id="normal-sb" class="sb">
				<?php dynamic_sidebar( 'sidebar-1' ); ?>
			</div>
			<?php
		endif;

		if ( is_active_sidebar( 'left-sticky' ) ) :
			?>
			<div id="sticky-sb1" class="sb">
				<?php dynamic_sidebar( 'left-sticky' ); ?>
			</div>
			<?php
		endif;
		?>
		<div class="clear"></div>
	</div>
</aside>
