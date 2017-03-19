<aside id="sb1" class="cf">
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
		<?php
		if ( get_theme_mod( 'theme_layout', '' ) !== 'centered' ):
			if ( is_active_sidebar( 'ns-1-home' ) ) :
				?>
				<div id="ns1">
					<div class="inner alpha cf sb">
						<?php dynamic_sidebar( 'ns-1-home' ); ?>
					</div>
				</div>
				<?php
			endif;
			if ( is_active_sidebar( 'ns-2-home' ) ) :
				?>
				<div id="ns2">
					<div class="inner omega cf sb">
						<?php dynamic_sidebar( 'ns-2-home' ); ?>
					</div>
				</div>
				<?php
			endif;
		endif;
		?>

		<div class="clear"></div>

		<?php
		if ( is_active_sidebar( 'left-bottom-home' ) ) :
			?>
			<div id="normal-sb" class="sb">
				<?php dynamic_sidebar( 'left-bottom-home' ); ?>
			</div>
			<?php
		endif;
		?>
	</div>
</aside>