<?php
add_filter( 'eaa_ad_locations', 'ngbr_add_eaa_ad_locations' );

function ngbr_add_eaa_ad_locations( $ad_locations ) {
	$ad_locations['ps_above_header'] = array( 'label' => esc_html__( 'Above header', 'ngbr' ) );
	$ad_locations['ps_header']       = array( 'label' => esc_html__( 'In header', 'ngbr' ) );
	$ad_locations['ps_below_header'] = array( 'label' => esc_html__( 'Below header', 'ngbr' ) );
	$ad_locations['ps_before_main']  = array( 'label' => esc_html__( 'Before main div', 'ngbr' ) );
	$ad_locations['ps_after_main']   = array( 'label' => esc_html__( 'After main div', 'ngbr' ) );
	$ad_locations['ps_above_footer'] = array( 'label' => esc_html__( 'Above footer', 'ngbr' ) );

	return $ad_locations;
}


if ( function_exists( 'eaa_show_ad' ) ) {
	add_action( 'ngbr_after_body', 'ngbr_above_header_ad', 8 );
	add_action( 'ngbr_header_start', 'ngbr_header_ad', 14 );
	add_action( 'ngbr_after_header', 'ngbr_below_header_ad', 14 );
	add_action( 'ngbr_main_start', 'ngbr_before_main_ad', 8 );
	add_action( 'ngbr_main_end', 'ngbr_after_main_ad', 8 );
	add_action( 'ngbr_before_footer', 'ngbr_above_footer_ad', 8 );
}


if ( ! function_exists( 'ngbr_above_header_ad' ) ) {
	function ngbr_above_header_ad() {
		$ad = eaa_show_ad( 'ps_above_header' );
		if ( ! $ad ) {
			return;
		}
		?>
		<div class="hybrid">
			<div class="inner">
				<?php
				echo $ad;
				?>
			</div>
		</div>
		<?php
	}
}


if ( ! function_exists( 'ngbr_header_ad' ) ) {
	function ngbr_header_ad() {
		$ad = eaa_show_ad( 'ps_header', array( 'class' => 'ps-header-ad' ) );
		if ( ! $ad ) {
			return;
		}
		echo $ad;
	}
}


if ( ! function_exists( 'ngbr_below_header_ad' ) ) {
	function ngbr_below_header_ad() {
		$ad = eaa_show_ad( 'ps_below_header' );
		if ( ! $ad ) {
			return;
		}
		?>
		<div id="below-header-ad-container">
			<div class="hybrid" id="below-header-ad">
				<div class="inner">
					<?php
					echo $ad;
					?>
				</div>
			</div>
		</div>
		<?php
	}
}

if ( ! function_exists( 'ngbr_before_main_ad' ) ) {

	function ngbr_before_main_ad() {
		$ad = eaa_show_ad( 'ps_before_main' );
		if ( ! $ad ) {
			return;
		}
		echo $ad;
	}

}

if ( ! function_exists( 'ngbr_after_main_ad' ) ) {

	function ngbr_after_main_ad() {
		$ad = eaa_show_ad( 'ps_after_main' );
		if ( ! $ad ) {
			return;
		}
		echo $ad;
	}

}


if ( ! function_exists( 'ngbr_above_footer_ad' ) ) {
	function ngbr_above_footer_ad() {
		$ad = eaa_show_ad( 'ps_above_footer' );
		if ( ! $ad ) {
			return;
		}
		?>
		<div id="above-footer-ad-container">
			<div class="hybrid" id="above-footer-ad">
				<div class="inner">
					<?php
					echo $ad;
					?>
				</div>
			</div>
		</div>
		<?php
	}
}