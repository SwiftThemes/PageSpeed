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
 * This class allows you to show all thumbnail related settings in a single line.
 *
 * @package    Helium
 * @subpackage Customize
 * @author     Satish Gandham <hello@SatishGandham.Com>
 * @copyright  Copyright (c) 2017 - 2018, Satish Gandham
 */


add_action( 'customize_register', 'image_size_control_register', 1 );

function image_size_control_register( $wp_customize ) {

	// Register the control type.
	// $wp_customize->register_control_type( 'Helium_Customize_Control_Image_Size' );

	class Helium_Customize_Control_Image_Size extends WP_Customize_Control {

		//@todo use named array for settings

		public function render_content() {
			$output = '<label>' . $this->label . '</label><div class="clear"></div><br>';

			if ( isset( $this->settings[0] ) ) {
				$value = intval($this->settings[0]->value());
			} else {
				$value = '';
			}
			$output .= '<div class="thumb-dimensions"><input type="number" value="' . $value . '" ' . $this->get_link( 0 ) . ' /><span class="x">x</span>';

			if ( isset( $this->settings[1] ) ) {
				$value = intval($this->settings[1]->value());
			} else {
				$value = '';
			}
			$output .= '<input type="number" value="' . $value . '" ' . $this->get_link( 1 ) . ' /></div>';

			if ( isset( $this->settings[2] ) ) {
				$value = esc_attr($this->settings[2]->value());
			} else {
				$value = '';
			}
			$output .= '<div class="thumb-align">
<select type="text" value="' . $value . '" ' . $this->get_link( 2 ) . ' >
			<option value="alignleft" ' . selected( $value, 'alignleft', false ) . '>' . __( 'Align left', 'page-speed') . '</option>
			<option value="aligncenter" ' . selected( $value, 'aligncneter', false ) . '>' . __( 'Centered', 'page-speed') . '</option>
			<option value="alignright" ' . selected( $value, 'alignright', false ) . '>' . __( 'Align right', 'page-speed') . '</option>
			<option value="alternate" ' . selected( $value, 'alternate', false ) . '>' . __( 'Alternate', 'page-speed') . '</option>
			</select></div>';


			echo $output;

		}

	}

}


