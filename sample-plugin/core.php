<?php
/*
Plugin Name: sample plugin
Plugin URI: http://wordpress.org/plugins/hello-dolly/
Description: پلاگین نمونه
Author: وحید صالحی
Version: 1.0.0
License: GPLv2 or later
Author URI: http://develop-wp.local
*/
defined('ABSPATH') || exit;

define('SP_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('SP_PLUGIN_URL', plugin_dir_url(__FILE__));
const SP_PLUGIN_INC = SP_PLUGIN_DIR . '_inc/';
const SP_PLUGIN_ASSETS = SP_PLUGIN_DIR . 'assets/';

//echo SP_PLUGIN_INC;
//echo SP_PLUGIN_URL;
//var_dump(dirname(__FILE__));

if (is_admin()) {
    include SP_PLUGIN_INC . 'admin/menu.php';
} else {
    include SP_PLUGIN_INC . 'front/form.php';
}