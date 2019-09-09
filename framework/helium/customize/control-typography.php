<?php
/*
	Copyright 2009-2018  Satish Gandham  (email : hello@satishgandham.com)

	This program is free software; you can redistribute it and/or modify
	it under the terms of the GNU General Public License version 2,
	as published by the Free Software Foundation.

	You may NOT assume that you can use any other version of the GPL.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	The license for this software can likely be found here:
	http://www.gnu.org/licenses/gpl-2.0.html
 */
/**
 * The image size customize control extends the WP_Customize_Control class.
 *
 * This class allows you to show two textareas. One for mobile, and the other for tablets and desktops.
 *
 *
 * @package    Helium
 * @subpackage Customize
 * @author     Satish Gandham <hello@SatishGandham.Com>
 * @copyright  Copyright (c) 2017 - 2017, Satish Gandham
 */


add_action( 'customize_register', 'helium_typography_control_register', 1 );

function helium_typography_control_register( $wp_customize ) {

	$wp_customize->register_control_type( 'Helium_Customize_Control_Typography' );

	class Helium_Customize_Control_Typography extends WP_Customize_Control {

		public $type = 'he_typography';

		public function to_json() {
			parent::to_json();

			$this->json['value']['stack']  = $this->value( 'stack' );
			$this->json['value']['size']   = $this->value( 'size' );
			$this->json['value']['lh']     = $this->value( 'lh' );
			$this->json['value']['weight'] = $this->value( 'weight' );

			$this->json['stacks'] = helium_get_font_stacks();

			$this->json['fontSizes'] = array(
				8,
				9,
				10,
				11,
				12,
				13,
				14,
				15,
				16,
				17,
				18,
				19,
				20,
				21,
				22,
				23,
				24,
				25,
				26,
				27,
				28,
				29,
				30,
				31,
				32,
			);

			$this->json['fontWeights'] = array(
				100,
				200,
				300,
				400,
				500,
				600,
				700,
				800,
				900,
				'lighter',
				'light',
				'normal',
				'bold',
				'bolder',
			);
		}

		public function content_template() {

			?>
			<div class="typography cf">

				<# if ( data.label ) { #>
					<span class="customize-control-title">{{{ data.label }}}</span>
					<# } #>

						<div class="typography">

							<label class="select"><?php _e( 'Font stack', 'page-speed' ); ?>
								<select type="text" class="stack">
									<option value=" "><?php _e( 'Select Font', 'page-speed' ); ?></option>
									<# for ( key in data.stacks) { #>
										<option value="{{ data.stacks[key] }}"

										<# if ( data.value.stack == data.stacks[key] ) { #> selected="selected" <# } #>
												>{{ data.stacks[key] }}
												</option>
												<# } #>
								</select>
							</label>

							<label class="c3">
								<?php _e( 'Size', 'page-speed' ); ?>
								<select type="text" class="size">
									<# for ( key in data.fontSizes) { #>
										<option value="{{ data.fontSizes[key] }}"


										<# if ( data.value.size == data.fontSizes[key] ) { #>
											selected="selected"
											<# } #>

												>{{ data.fontSizes[key] }} px
												</option>
												<# } #>
								</select>
							</label>

							<label class="c3">
								<?php _e( 'Line Height', 'page-speed' ); ?> (em)
								<input type="number" class="lineHeight" value="{{data.value.lh}}" min="0.80"
									   max="2.00" step=".01">
							</label>

							<label class="c3">
								Weight
								<select type="text" class="weight">
									<# for ( key in data.fontWeights) { #>
										<option value="{{ data.fontWeights[key] }}"

										<# if ( data.value.weight == data.fontWeights[key] ) { #>
											selected="selected"
											<# } #>
												>{{ data.fontWeights[key] }}
												</option>
												<# } #>
								</select>
							</label>
						</div>

						<# if ( data.description ) { #>
							<span class="description customize-control-description">{{{ data.description }}}</span>
							<# } #>

			</div>


			<?php
		}

		public function render_content() {
			return false;
		}

	}

}


