<aside id="sb1" class="cf">
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
		<?php
		if ( get_theme_mod( 'theme_layout', '' ) !== 'centered' ):
			if ( is_active_sidebar( 'ns-1-page' ) ) :
				?>
                <div id="ns1">
                    <div class="inner alpha cf sb">
						<?php dynamic_sidebar( 'ns-1-page' ); ?>
                    </div>
                </div>
				<?php
			endif;
			if ( is_active_sidebar( 'ns-2-page' ) ) :
				?>
                <div id="ns2">
                    <div class="inner omega cf sb">
						<?php dynamic_sidebar( 'ns-2-page' ); ?>
                    </div>
                </div>
				<?php
			endif;
		endif;
		?>

        <div class="clear"></div>

		<?php
		if ( is_active_sidebar( 'left-bottom-page' ) ) :
			?>
            <div id="normal-sb" class="sb">
				<?php dynamic_sidebar( 'left-bottom-page' ); ?>
            </div>
			<?php
		endif;
		?>
    </div>
</aside>