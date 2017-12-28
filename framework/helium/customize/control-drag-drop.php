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


add_action( 'customize_register', 'helium_drag_drop_control_register', 1 );

function helium_drag_drop_control_register( $wp_customize ) {

	$wp_customize->register_control_type( 'Helium_Customize_Control_Drag_Drop' );


	class Helium_Customize_Control_Drag_Drop extends WP_Customize_Control {

		public $type = 'he_drag_drop';
		public $booom;


		public function to_json() {
			parent::to_json();
			$this->json['test'] = $this->booom;
		}

		/**
		 * Enqueue scripts/styles.
		 *
		 * @since  3.0.0
		 * @access public
		 * @return void
		 */
		public function enqueue() {
			wp_enqueue_script( 'jquery-ui-draggable' );
			wp_enqueue_script( 'jquery-ui-droppable' );
		}

		public function content_template() {

			?>
            <# if ( data.label ) { #>
                <span class="customize-control-title">{{{ data.label }}}</span>
                <# } #>
                    <div class="drag-drop cf">

                        <div class="draggables cf">

                            <div class="draggable cf has-input clone">
                                <label>Text</label>
                                <input class="text" type="text" data-type="text" placeholder="Any text"/>
                            </div>

                            <div class="draggable cf has-input ">
                                <label>Cat</label>
                                <input class="cat" type="text" data-type="categories" placeholder="Filed under"
                                       onclick="this.select()"/>
                            </div>
                            <div class="draggable cf has-input ">
                                <label>Tags</label>
                                <input class="tag" type="text" data-type="tags" placeholder="Tagged with"
                                       onclick="this.select()"/>
                            </div>
                            <div class="draggable cf">
                                <label>Author Posts</label>
                                <input class="tag" type="hidden" data-type="author_posts"/>
                            </div>
                            <div class="draggable cf">
                                <label>Author HomePage</label>
                                <input class="tag" type="hidden" data-type="author_link"/>
                            </div>
                            <div class="draggable cf">
                                <label>Published</label>
                                <input class="tag" type="hidden" data-type="published"/>
                            </div>
                            <div class="draggable cf">
                                <label>Updated</label>
                                <input class="tag" type="hidden" data-type="updated"/>
                            </div>
                        </div>
                        <div class="clear"></div>
                        <span class="dashicons dashicons-arrow-down-alt">Drag them below</span>
                        <div class="sortable connected">
                        </div>

                    </div>


			<?php
		}

		public function render_content() {
			return false;
		}

	}

}


