<?php
/*
Plugin Name: sample plugin V2
Plugin URI: http://wordpress.org/plugins/hello-dolly/
Description: پلاگین نمونه
Author: HAMID AKBARI
Version: 2.0.0
License: GPLv2 or later
Author URI: http://develop-wp.local
*/
//S18 - E01
defined('ABSPATH') || exit;

define('HA_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('HA_PLUGIN_URL', plugin_dir_url(__FILE__));
const HA_PLUGIN_INC = HA_PLUGIN_DIR . '_inc/';
const HA_PLUGIN_ASSETS = HA_PLUGIN_DIR . 'assets/';

//echo HA_PLUGIN_INC;
//echo HA_PLUGIN_URL;
//var_dump(dirname(__FILE__));

if (is_admin()) {
    include HA_PLUGIN_INC . 'admin/menu.php';
} else {
    include HA_PLUGIN_INC . 'front/form.php';
}