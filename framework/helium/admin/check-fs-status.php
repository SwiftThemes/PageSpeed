<?php

/**
 * Check if we can read and write files. If not set a transient variable and load static styles
 *
 * @package    Helium
 * @subpackage Admin
 * @author     Satish Gandham <hello@SatishGandham.com>
 * @copyright  Copyright (c) 2016 - 2025, Satish Gandham
 * @link       http://swiftthemes.com/helium
 * @license    http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

function helium_set_fs_status()
{
    require_once(ABSPATH . 'wp-admin/includes/file.php');
    WP_Filesystem();
        
    global $wp_filesystem;
    $can_read = $wp_filesystem->is_readable(HELIUM_THEME_ASSETS . 'css/src/main.scss');
    if ($can_read) {
        $upload_dir = wp_upload_dir();
        $file       = trailingslashit($upload_dir['basedir']);
        $can_write  = $wp_filesystem->is_writable($file);
    }

    if ($can_read && $can_write) {
        set_theme_mod('can_read_write', true);

        return true;
    } else {
        set_theme_mod('can_read_write', false);
        return false;
    }
}