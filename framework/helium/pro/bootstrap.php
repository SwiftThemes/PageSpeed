<?php
/**
 * Created by PhpStorm.
 * User: satish
 * Date: 11/02/18
 * Time: 4:19 PM
 */

require_once 'functions-styles.php';
require_once 'admin-display-theme-options.php';

if ( is_admin() ) {
	require_once 'disable-updates.php';
}

define( 'HELIUM_PRO', true );