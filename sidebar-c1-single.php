<aside id="sb1" class="cf">
	<div class="inner cf">

		<?php
		if ( is_active_sidebar( 'left' ) ) :
			?>
			<div id="normal-sb" class="sb">
				<?php dynamic_sidebar( 'left' ); ?>
			</div>
			<?php
		endif;
		?>
		<?php
		if ( is_active_sidebar( 'left-sticky' ) ) :
			?>
			<div id="sticky-sb1" class="sb">
				<?php dynamic_sidebar( 'left-sticky' ); ?>
			</div>
			<?php
		endif;
		?>
		<?php
		if ( get_theme_mod( 'theme_layout', '' ) !== 'centered' ):
			if ( is_active_sidebar( 'ns-1' ) ) :
				?>
				<div id="ns1">
					<div class="inner alpha cf sb">
						<?php dynamic_sidebar( 'ns-1' ); ?>
					</div>
				</div>
				<?php
			endif;
			if ( is_active_sidebar( 'ns-2' ) ) :
				?>
				<div id="ns2">
					<div class="inner omega cf sb">
						<?php dynamic_sidebar( 'ns-2' ); ?>
					</div>
				</div>
				<?php
			endif;
		endif;
		?>
		<div class="clear"></div>

		<?php
		if ( is_active_sidebar( 'left-bottom' ) ) :
			?>
			<div id="normal-sb" class="sb">
				<?php dynamic_sidebar( 'left-bottom' ); ?>
			</div>
			<?php
		endif;
		?>
	</div>
</aside>