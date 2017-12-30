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
			$this->json['test']  = $this->booom;
			$this->json['value'] = $this->value();

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
                                <input class="text" type="text" data-type="Text" placeholder="Any text"/>
                            </div>

                            <div class="draggable cf has-input ">
                                <label>Cat</label>
                                <input class="cat" type="text" data-type="Cat" placeholder="Filed under"
                                       onclick="this.select()"/>
                            </div>
                            <div class="draggable cf has-input ">
                                <label>Tags</label>
                                <input class="tag" type="text" data-type="Tags" placeholder="Tagged with"
                                       onclick="this.select()"/>
                            </div>
                            <div class="draggable cf">
                                <label>Author Posts</label>
                                <input class="tag" type="hidden" data-type="author_posts"/>
                            </div>
                            <div class="draggable cf">
                                <label>Author HomePage</label>
                                <input class="tag" type="hidden" data-type="AuthorLink"/>
                            </div>
                            <div class="draggable cf">
                                <label>Published</label>
                                <input class="tag" type="hidden" data-type="Published"/>
                            </div>
                            <div class="draggable cf">
                                <label>Updated</label>
                                <input class="tag" type="hidden" data-type="Updated"/>
                            </div>
                            <div class="draggable cf">
                                <label>Line</label>
                                <input class="tag" type="hidden" data-type="Line"/>
                            </div>
                        </div>
                        <div class="clear"></div>
                        <span class="dashicons dashicons-arrow-down-alt">Drag them below</span>


                        <div class="sortable connected">
                            <# for ( index in data.value) { #>
                                <# var key = data.value[index]['key']; var value = data.value[index]['value']  #>

                                    <# if ( key == 'text') { #>
                                        <div class="draggable cf has-input can-remove">
                                    <# }else {#>
                                        <#if(value) { #>
                                            <div class="draggable cf has-input can-remove">
                                        <# }else {#>
                                            <div class="draggable cf can-remove">
                                         <# } #>
                                    <# } #>
                                    <label>{{key}}</label>
                                        <#if(value) { #>
                                            <input type="text" data-type="{{key}}" value="{{value}}"
                                                   onclick="this.select()"/>
                                        <# }else {#>
                                            <input class="tag" type="hidden" data-type="{{key}}"/>
                                        <# } #>
                                    </div>
                             <#}#>

                        </div>

                    </div>


			<?php
		}

		public function render_content() {
			return false;
		}

	}

}


