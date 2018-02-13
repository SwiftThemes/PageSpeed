<?php

/**
 * Gradient Control Class
 *
 * @package
 * @subpackage Customize
 */

add_action( 'customize_register', 'helium_gradient_control_register', 10 );

function helium_gradient_control_register( $wp_customize ) {
	$wp_customize->register_control_type( 'Helium_Customize_Gradient' );

	class Helium_Customize_Gradient extends WP_Customize_Control {


		public $type = 'he_colors';

		public function to_json() {
			parent::to_json();
			$this->json['value'] = $this->value();

		}

		// Enqueue scripts/styles for the color picker.
		public function enqueue() {
			wp_enqueue_style( 'wp-color-picker' );
			wp_enqueue_script( 'wp-color-picker' );
		}

		// Render the gradient control
		public function content_template() {
			?>


            <div class="gradient cf">
                <div class="title">
                    <# if ( data.label ) { #>
                        <strong class="">{{{ data.label }}}</strong>
                        <# } #>

                            <label class="alignright"><input type="checkbox" class="enable-colors"
                                <# if (data.value.enable){ #>checked
                                    <#}#>
                                        class="enable_colors"><?php _e( 'Enable', 'page-speed' ) ?></label>
                </div>


                <div class="clear"></div>
                <div style="margin-bottom: 14px">
                    <div class="single_color">
                        <strong>Text color</strong>
                        <input type="text" class="gradient-color-picker" data-name="text_color"
                               value="{{data.value.text_color}}">
                    </div>
                    <div class="single_color"><strong>Link color</strong>
                        <input type="text" class="gradient-color-picker" data-name="link_color"
                               value="{{data.value.link_color}}">
                    </div>
                </div>
                <div class="clear"></div>

                <div style="margin-bottom: 4px">
                    <strong>Background</strong>&nbsp;&nbsp;&nbsp;<label class=""><input type="checkbox"
                        <# if (data.value.is_gradient){ #>checked
                            <#}#>
                                class="is_gradient"><?php _e( 'Use gradient', 'page-speed' ) ?></label>
                </div>
                <div class="clear"></div>
                <label class="start alignleft">
                    Start
                    <input type="text" class="gradient-color-picker" data-name="bg_start"
                           value="{{data.value.bg_start}}">
                </label>

                <div class="if_gradient">
                    <label class="end alignleft">
                        End
                        <input type="text" class="gradient-color-picker" data-name="bg_end"
                               value="{{data.value.bg_end}}">
                    </label>

                    <label>
                        <!-- Range control for gradient angle -->
                        <input type="number" class="angle" style="width: auto;overflow: hidden" placeholder="Angle"
                               value="{{data.value.gradient_angle}}" min="0" max="180" step="5"/>
                    </label>
                </div>


            </div>


			<?php
		}
	}
}