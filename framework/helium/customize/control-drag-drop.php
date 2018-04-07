<?php
/*
    Copyright 2009-2018  Satish Gandham  (email : hello@satishgandham.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License version 2,
    as published by the Free Software Foundation.

    You may NOT assume that you can use any other version of the GPL.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    The license for this software can likely be found here:
    http://www.gnu.org/licenses/gpl-2.0.html
 */
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
		public $sortables;


		public function to_json() {
			parent::to_json();
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
                    <label><?php _e('Text','page-speed')?></label>
                    <input class="text" type="text" data-type="Text" placeholder="<?php echo esc_attr(__('Any text','page-speed'))?>"/>
                </div>

                <div class="draggable cf has-input ">
                    <label><?php _e('Cat','page-speed')?></label>
                    <input class="cat" type="text" data-type="Cat" placeholder="<?php echo esc_attr(__('Filed under','page-speed'))?>"
                           onclick="this.select()"/>
                </div>
                <div class="draggable cf has-input ">
                    <label><?php _e('Tags','page-speed')?></label>
                    <input class="tag" type="text" data-type="Tags" placeholder=<?php echo esc_attr(__('Tagged with','page-speed'))?>"
                           onclick="this.select()"/>
                </div>
                <div class="draggable cf">
                    <label><?php _e('Author Posts','page-speed')?></label>
                    <input class="tag" type="hidden" data-type="AuthorPosts"/>
                </div>
                <div class="draggable cf">
                    <label><?php _e('Author HomePage','page-speed')?></label>
                    <input class="tag" type="hidden" data-type="AuthorLink"/>
                </div>
                <div class="draggable cf">
                    <label><?php _e('Published','page-speed')?></label>
                    <input class="tag" type="hidden" data-type="Published"/>
                </div>
                <div class="draggable cf">
                    <label><?php _e('Updated','page-speed')?></label>
                    <input class="tag" type="hidden" data-type="Updated"/>
                </div>
                <div class="draggable cf">
                    <label><?php _e('Line','page-speed')?></label>
                    <input class="tag" type="hidden" data-type="Line"/>
                </div>
            </div>
            <div class="clear"></div>
            <span class="dashicons dashicons-arrow-down-alt"><?php _e( 'Drag them below', 'page-speed' ) ?></span>


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
                                                                    <input class="tag" type="hidden"
                                                                           data-type="{{key}}"/>
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


