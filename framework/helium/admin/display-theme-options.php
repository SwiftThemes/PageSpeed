<?php
function display_theme_options( $options ) {

	$mods = get_theme_mods();

	foreach ( $options as $option ) {
		switch ( $option['type'] ) {
			case 'checkbox':
				$value = helium_boolean(get_theme_mod( $option['id'], $option['default'] ));
				echo "
					<div class='checkbox option'>
					<label>
                    <input type='checkbox' name='{$option['id']}' value=1 " . checked( $value, 1, false ) . ">
                    <strong>{$option['name']}</strong>
                    <span class='separator'>//</span>
					<span><em>{$option['desc']}</em></span>
                    
                </label>
                <div class='clear'></div>
                </div>";
				break;
			case 'title':
				echo "<h3>{$option['name']}</h3>";
				break;
			default:
				echo "@todo {$option['type']}";
		}

	}

}