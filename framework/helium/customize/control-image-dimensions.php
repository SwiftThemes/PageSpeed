<?php
/**
 * The image size customize control extends the WP_Customize_Control class.
 *
 * This class allows you to show all thumbnail related settings in a single line.
 *
 * @package    Helium
 * @subpackage Customize
 * @author     Satish Gandham <hello@SatishGandham.Com>
 * @copyright  Copyright (c) 2017 - 2017, Satish Gandham
 */


add_action( 'customize_register', 'image_size_control_register', 1 );

function image_size_control_register( $wp_customize ) {

	// Register the control type.
	// $wp_customize->register_control_type( 'Helium_Customize_Control_Image_Size' );

	class Helium_Customize_Control_Image_Size extends WP_Customize_Control {

		//@todo use named array for settings

		public function build_field_html( $key, $setting ) {
			$value = '';
			if ( isset( $this->settings[ $key ] ) ) {
				$value = $this->settings[ $key ]->value();
			}
			$this->html[] = '<div><input type="text" value="' . $value . '" ' . $this->get_link( $key ) . ' /></div>';
		}

		public function render_content() {
			$output = '<label>' . $this->label . '</label><div class="clear"></div><br>';

			if ( isset( $this->settings[0] ) ) {
				$value = $this->settings[0]->value();
			} else {
				$value = '';
			}
			$output .= '<div class="thumb-dimensions"><input type="number" value="' . $value . '" ' . $this->get_link( 0 ) . ' /><span class="x">x</span>';

			if ( isset( $this->settings[1] ) ) {
				$value = $this->settings[1]->value();
			} else {
				$value = '';
			}
			$output .= '<input type="number" value="' . $value . '" ' . $this->get_link( 1 ) . ' /></div>';

			if ( isset( $this->settings[2] ) ) {
				$value = $this->settings[2]->value();
			} else {
				$value = '';
			}
//			$output .= '<div><input type="text" value="' . $value . '" ' . $this->get_link( 2 ) . ' /></div>';
			$output .= '<div class="thumb-align">
<select type="text" value="' . $value . '" ' . $this->get_link( 2 ) . ' >
			<option value="alignleft" ' . selected( $value, 'alignleft', false ) . '>' . __( 'Align left', 'helium' ) . '</option>
			<option value="aligncenter" ' . selected( $value, 'aligncneter', false ) . '>' . __( 'Centered', 'helium' ) . '</option>
			<option value="alignright" ' . selected( $value, 'alignright', false ) . '>' . __( 'Align right', 'helium' ) . '</option>
			<option value="alternate" ' . selected( $value, 'alternate', false ) . '>' . __( 'Alternate', 'helium' ) . '</option>
			</select></div>';


			echo $output;

		}

	}

}


