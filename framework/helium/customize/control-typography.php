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


add_action( 'customize_register', 'helium_typography_control_register', 1 );

function helium_typography_control_register( $wp_customize ) {

	$wp_customize->register_control_type( 'Helium_Customize_Control_Typography' );


	class Helium_Customize_Control_Typography extends WP_Customize_Control {

		public $type = 'he_typography';

		public function to_json() {
			parent::to_json();

			if ( $this->value() ) {
				$this->json['value'] = $this->value();
			}

			$defaults            = array(
				'size'        => '16px',
				'line_height' => '1.5em',
				'weight'      => 'normal',
			);
			$this->json['value'] = wp_parse_args( $this->value(), $defaults );

			$google_font_stack = array();

			if ( get_theme_mod( 'gfont_1' ) ) {
				$temp                = get_theme_mod( 'gfont_1' );
				$google_font_stack[] = $temp['stack'];
			}
			if ( get_theme_mod( 'gfont_2' ) ) {
				$temp                = get_theme_mod( 'gfont_2' );
				$google_font_stack[] = $temp['stack'];
			}
			$this->json['stacks'] = array(

				'Verdana, Geneva, sans-serif',
				'Tahoma, Arial, Helvetica, sans-serif',
				'Georgia, Utopia, Palatino, \'Palatino Linotype\', serif',
				'\'Times New Roman\', Times, serif',
				'\'Courier New\', Courier, monospace'
			);
			$this->json['stacks'] = array_merge( $google_font_stack, $this->json['stacks'] );

			$this->json['fontSizes'] = [
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
				32
			];

			$this->json['fontWeights'] = [
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
				'bolder'
			];
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
                                <div class="typography">

                                    <label class="select"><strong>Font stack</strong>
                                        <select type="text" class="stack">
                                            <option value=" ">Select font</option>
                                            <# for ( key in data.stacks) { #>
                                                <option value="{{ data.stacks[key] }}"

                                                <# if ( data.value.stack == data.stacks[key] ) { #>
                                                    selected="selected"
                                                    <# } #>
                                                        >{{ data.stacks[key] }}
                                                        </option>
                                                        <# } #>
                                        </select>
                                    </label>

                                    <label class="c3">
                                        Size
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
                                        Line height (em)
                                        <input type="number" class="lineHeight" value="{{data.value.line_height}}">
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

            </label>
			<?php
		}

		public function render_content() {
			return false;
		}

	}

}


