<aside id="sb1" class="cf">
	<div class="inner cf">

		<?php
		if ( is_active_sidebar( 'left-single' ) ) :
			?>
			<div id="normal-sb" class="sb">
				<?php dynamic_sidebar( 'left-single' ); ?>
			</div>
			<?php
		endif;
		?>
		<?php
		if ( is_active_sidebar( 'left-sticky-single' ) ) :
			?>
			<div id="sticky-sb1" class="sb">
				<?php dynamic_sidebar( 'left-sticky-single' ); ?>
			</div>
			<?php
		endif;
		?>
		<?php
		if ( get_theme_mod( 'theme_layout', '' ) !== 'centered' ):
			if ( is_active_sidebar( 'ns-1-single' ) ) :
				?>
				<div id="ns1">
					<div class="inner alpha cf sb">
						<?php dynamic_sidebar( 'ns-1-single' ); ?>
					</div>
				</div>
				<?php
			endif;
			if ( is_active_sidebar( 'ns-2-single' ) ) :
				?>
				<div id="ns2">
					<div class="inner omega cf sb">
						<?php dynamic_sidebar( 'ns-2-single' ); ?>
					</div>
				</div>
				<?php
			endif;
		endif;
		?>
		<div class="clear"></div>

		<?php
		if ( is_active_sidebar( 'left-bottom-single' ) ) :
			?>
			<div id="normal-sb" class="sb">
				<?php dynamic_sidebar( 'left-bottom-single' ); ?>
			</div>
			<?php
		endif;
		?>
	</div>
</aside>