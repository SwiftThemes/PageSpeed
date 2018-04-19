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


add_action( 'customize_register', 'helium_drag_sort_control_register', 1 );

function helium_drag_sort_control_register( $wp_customize ) {

	$wp_customize->register_control_type( 'Helium_Customize_Control_Drag_Sort' );


	class Helium_Customize_Control_Drag_Sort extends WP_Customize_Control {

		public $type = 'he_drag_sort';
		public $sortables;


		public function to_json() {
			parent::to_json();
			$this->json['value']     = $this->value();
			$this->json['sortables'] = $this->sortables;

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
                    <# for (index in data.sortables){#>
                        <div class="draggable cf">
                            <label>{{data.sortables[index].value}}</label>
                            <input class="tag" type="hidden" data-type="{{data.sortables[index].key}}"/>
                        </div>
                        <#}#>

                </div>
                <div class="clear"></div>
                <span class="dashicons dashicons-arrow-down-alt"><?php _e( 'Drag them below', 'page-speed' ) ?></span>


                <div class="sortable connected">
                    <# for ( index in data.value) { #>
                            <div class="draggable cf can-remove">

                                <label>{{data.value[index]}}</label>
                                <input class="tag" type="hidden"
                                       data-type="{{data.value[index]}}"/>
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


