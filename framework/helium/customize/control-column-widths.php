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
 * @copyright  Copyright (c) 2017 - 2018, Satish Gandham
 */


add_action( 'customize_register', 'helium_he_column_widths', 1 );

function helium_he_column_widths( $wp_customize ) {

	$wp_customize->register_control_type( 'Helium_Customize_Column_Widths' );


	class Helium_Customize_Column_Widths extends WP_Customize_Control {
		public $type = 'he_columns';

		public function to_json() {
			parent::to_json();
			$this->json['value'] = 'Holaaaa';
		}

		public function content_template() {

			?>
			<h1>Hi</h1>
			<div class="column-slider"></div>
			<?php
		}

		public function render_content() {
			return false;
		}
	}
}


