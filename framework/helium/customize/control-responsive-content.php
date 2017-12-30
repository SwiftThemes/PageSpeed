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


add_action( 'customize_register', 'helium_responsive_content_control_register', 1 );

function helium_responsive_content_control_register( $wp_customize ) {

	class Helium_Customize_Control_Responsive_Content extends WP_Customize_Control {

		public function render_content() {
			$output = '<span class="customize-control-title">' . $this->label . '</span><div class="clear"></div><br><div class="responsive-content">';
			if ( isset( $this->settings[0] ) ) {
				$value = $this->settings[0]->value();
			} else {
				$value = '';
			}
			$id = helium_random_string();
			$output .= '<label><input type="checkbox" ' . checked( $value ) . $this->get_link( 0 ) . ' id="' . $id . '"><span>' . __( 'Enable this content area/ad', 'page-speed') . '</span></label>';


			if ( isset( $this->settings[1] ) ) {
				$value = $this->settings[1]->value();
			} else {
				$value = '';
			}
			$output .= '<div class="textarea desktop"><textarea type="number" ' . $this->get_link( 1 ) . ' >' . $value . '</textarea></div>';

			if ( isset( $this->settings[2] ) ) {
				$value = $this->settings[2]->value();
			} else {
				$value = '';
			}
			$output .= '<div class="textarea mobile"><textarea type="number" ' . $this->get_link( 2 ) . ' >' . $value . '</textarea></div></div>';
			echo $output;
		}

	}

}


