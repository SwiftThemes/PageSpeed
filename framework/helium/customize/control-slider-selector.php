<?php
/**
 * Created by PhpStorm.
 * User: satish
 * Date: 23/03/18
 * Time: 10:38 AM
 */
/**
 * A class to create a dropdown for all categories in your WordPress site
 */


add_action( 'customize_register', 'helium_slider_dropdown_control', 1 );

function helium_slider_dropdown_control( $wp_customize ) {

	$wp_customize->register_control_type( 'Helium_Slider_Dropdown_Control' );

	class Helium_Slider_Dropdown_Control extends WP_Customize_Control {
		public $type = 'he_slider_selector';

		private $sliders = array();

		public function to_json() {
			parent::to_json();
			$this->json['sliders'] = $this->sliders;
			$this->json['link']    = $this->get_link();
			if ( $this->value() ) {
				$this->json['value'] = $this->value();
			}
		}

		public function __construct( $manager, $id, $args = array(), $options = array() ) {
			parent::__construct( $manager, $id, $args );

			$args = array(
				'post_type' => 'slider',
			//              'posts_per_page'      => 100,
			);
			$my_query = new WP_Query( $args );

			if ( $my_query->have_posts() ) :
				while ( $my_query->have_posts() ) :
					$my_query->the_post();
					$this->sliders[] = array(
						'id'    => get_the_ID(),
						'value' => get_the_title(),
					);
				endwhile;
			endif;
			wp_reset_query();

		}

		public function content_template() {
			?>
			<label class="customize-control-title">{{ data.label }}
				<select {{{data.link }}}>
					<# for ( key in data.sliders ) { #>
						<option value={{data.sliders[key]['id']}}
						<# if ( data.value == data.sliders[key]['id'] ) { #>
							selected="selected"
							<# } #>
						>
								{{data.sliders[key]['value']}}
						</option>
					<# } #>
				</select>
			</label>



			<?php
		}

		/**
		 * Render the content of the category dropdown
		 *
		 * @return HTML
		 */
		public function render_content() {
			return false;
		}
	}
}
