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


add_action( 'customize_register', 'helium_he_select_control_register', 1 );

function helium_he_select_control_register( $wp_customize ) {

	$wp_customize->register_control_type( 'Helium_Customize_Control_Select' );


	class Helium_Customize_Control_Select extends WP_Customize_Control {
		public $type = 'he_select';

		public function to_json() {
			parent::to_json();
			$this->json['choices'] = $this->choices;
			$this->json['link'] = $this->get_link();

			if ( $this->value() ) {
				$this->json['value'] = $this->value();
			}
		}

		public function content_template() {

			?>
			<label ><strong class="customize-control-title">{{data.label}}</strong>
				<select type="text" class="stack" {{{ data.link }}}>
					<option value=" ">Select font</option>
					<# for ( key in data.choices) { #>
						<option value="{{ data.choices[key] }}"

						<# if ( data.value == data.choices[key] ) { #>
							selected="selected"
							<# } #>
								>{{ data.choices[key] }}
								</option>
								<# } #>
				</select>
			</label>
            <# if ( data.description ) { #>
                <span class="description customize-control-description">{{{ data.description }}}</span>
                <# } #>
		<?php
		}

		public function render_content() {
			return false;
		}
	}
}


