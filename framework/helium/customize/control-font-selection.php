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


add_action( 'customize_register', 'helium_font_selection_control_register', 1 );

function helium_font_selection_control_register( $wp_customize ) {

	$wp_customize->register_control_type( 'Helium_Customize_Control_Font_Selection' );


	class Helium_Customize_Control_Font_Selection extends WP_Customize_Control {

		public $type = 'he_font';

		public function to_json() {
			parent::to_json();

			if ( $this->value() ) {
				$this->json['value'] = $this->value();
			}

			$defaults            = array(
				'weights'    => array(),
				'subsets'    => array(),
				'fontObject' => array( 'family' => '' )
			);
			$this->json['value'] = wp_parse_args( $this->value(), $defaults );
		}

		public function content_template() {

			?>



            <label>

                <# if ( data.label ) { #>
                    <span class="customize-control-title">{{{ data.label }}}</span>
                    <# } #>
                        <# if ( data.description ) { #>
                            <span class="description customize-control-description">{{{ data.description }}}</span>
                            <# } #>
                                <div class="font-selection">

                                    <input class="family he_font_selection" type="text"
                                           value="{{data.value.fontObject.family}}"
                                           placeholder="<?php esc_attr_e( 'Search a font','page-speed'); ?>" />

                                    <label class="select"><strong><?php _e('Weights','page-speed')?></strong>
                                        <select type="text" class="weights" multiple>
                                            <# for ( key in data.value.fontObject.variants ) { #>
                                                <option value="{{ data.value.fontObject.variants[key] }}"
                                                <# if ( data.value.weights.indexOf(data.value.fontObject.variants[key]) !== -1 ) { #>
                                                    selected="selected"
                                                    <# } #>
                                                        >{{ data.value.fontObject.variants[key] }}
                                                        </option>
                                                        <# } #>
                                        </select>
                                    </label>

                                    <label class="select"><strong><?php _e('Subsets','page-speed')?></strong>
                                        <select type="text" class="subsets" multiple>
                                            <# for ( key in data.value.fontObject.subsets ) { #>
                                                <option value="{{ data.value.fontObject.subsets[key] }}"
                                                <# if ( data.value.subsets.indexOf(data.value.fontObject.subsets[key]) !== -1 ) { #>
                                                    selected="selected"
                                                    <# } #>
                                                        >{{ data.value.fontObject.subsets[key] }}
                                                        </option>
                                                        <# } #>
                                        </select>
                                    </label>

                                </div>

            </label>
			<?php
		}

		public function render_content() {
			return false;
		}

	}

}


