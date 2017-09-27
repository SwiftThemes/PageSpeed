<?php
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

	class Helium_Customize_Control_Font_Selection extends WP_Customize_Control {

		public function render_content() {
			$output = '<span class="customize-control-title">' . $this->label . '</span><div class="clear"></div><br><div class="font-selection" style="position: relative">';

			$output .='<input type="text" class="he_font_selection" '. $this->get_link( 'font' ) .' />';
			$output .='<select type="text" class="weights" multiple  '. $this->get_link( 'weights' ) .'></select>';
			//Show this only to non english
			$output .='<select type="text" class="subsets" multiple  '. $this->get_link( 'subsets' ) .'></select>';


			$output .='<select type="text" class="all_weights" style="display:none" multiple  '. $this->get_link( 'all_weights' ) .'></select>';
			$output .='<select type="text" class="all_subsets" style="display:none" multiple  '. $this->get_link( 'all_subsets' ) .'></select>';

			$output .='<input type="text" class="category"  style="display:none" '. $this->get_link( 'category' ) .' />';

			$output .= '</div>';
			echo $output;
		}

	}

}


