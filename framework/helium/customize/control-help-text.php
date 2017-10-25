<?php
/**
 * Created by PhpStorm.
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
				echo '<span class="customize-control-title">' . $this->label . '</span>';
			}
			if ( isset( $this->content ) ) {
				echo $this->content;
			}
			if ( isset( $this->description ) ) {
				echo '<span class="description customize-control-description">' . $this->description . '</span>';
			}
		}
	}
}