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
 * Created by Satish Gandham.
 * User: satish
 * Date: 25/10/17
 * Time: 10:04 PM
 */

add_action( 'customize_register', 'helium_help_text_control_register', 1 );

function helium_help_text_control_register() {
	class He_Help_Text extends WP_Customize_Control {

		// Whitelist content parameter
		public $content = '';

		/**
		 * Render the control's content.
		 *
		 * Allows the content to be overriden without having to rewrite the wrapper.
		 *
		 * @since   1.0.0
		 * @return  void
		 */
		public function render_content() {
			if ( isset( $this->label ) ) {
				echo '<span class="customize-control-title">' . esc_html($this->label) . '</span>';
			}
			if ( isset( $this->content ) ) {
				echo wp_kses($this->content);
			}
			if ( isset( $this->description ) ) {
				echo '<span class="description customize-control-description">' . wp_kses($this->description) . '</span>';
			}
		}
	}
}