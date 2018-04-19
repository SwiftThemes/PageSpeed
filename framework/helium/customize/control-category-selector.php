<?php
/**
 * Created by PhpStorm.
 * User: satish
 * Date: 23/03/18
 * Time: 10:38 AM
 */
/**
 * A class to create a dropdown for all categories in your wordpress site
 */


add_action( 'customize_register', 'helium_category_dropdown_control', 1 );

function helium_category_dropdown_control( $wp_customize ) {

	$wp_customize->register_control_type( 'Helium_Category_Dropdown_Control' );

	class Helium_Category_Dropdown_Control extends WP_Customize_Control {
		public $type = 'he_category_selector';

		private $cats = false;


		public function to_json() {
			parent::to_json();
			$this->json['cats'] = $this->cats;
			$this->json['link'] = $this->get_link();
			if ( $this->value() ) {
				$this->json['value'] = $this->value();
			}
		}

		public function __construct( $manager, $id, $args = array(), $options = array() ) {
			$this->cats = get_categories( $options );
			parent::__construct( $manager, $id, $args );
		}


		public function content_template() {

			?>
            <label class="customize-control-title">{{{ data.label }}}
                <select multiple {{{ data.link }}}>
                    <option><?php _e( 'Recent posts', 'page-speed' ) ?></option>
                    <# for ( key in data.cats ) { #>
                        <option

                                value={{data.cats[key]['term_id']}}
                        <# if ( data.value.indexOf(data.cats[key]['term_id']) !== -1 ) { #>
                            selected="selected"
                            <# } #>

                                >{{data.cats[key]['cat_name']}}</option>
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
			echo '<h1>Hi</h1>';
			if ( ! empty( $this->cats ) ) {
				?>
                <label>
                    <span class="customize-category-select-control"><?php echo esc_html( $this->label ); ?></span>
                    <select <?php $this->link(); ?>>
						<?php
						foreach ( $this->cats as $cat ) {
							printf( '<option value="%s" %s>%s</option>', $cat->term_id, selected( $this->value(), $cat->term_id, false ), $cat->name );
						}
						?>
                    </select>
                </label>
				<?php
			}
		}
	}
}

?>