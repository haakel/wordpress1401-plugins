<?php
/**
* Plugin Name: setting-api-with-tab
* Plugin URI: http://your-plugin-uri.com
* Description: A brief description of what your plugin does.
* Version: 1.0.0
* Requires at least: 5.2
* Requires PHP: 7.2
* Author: Your Name or Your Company Name
* Author URI: http://develop-wp.local
* License: GPL v2 or later
* License URI: http://www.gnu.org/licenses/gpl-2.0.txt
* Text Domain: your-plugin-text-domain
* Domain Path: /languages
*/

//S18_E05
defined( 'ABSPATH' ) || exit;

define( 'WL_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'WL_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

const WL_PLUGIN_INC = WL_PLUGIN_DIR . '_inc/';
const WL_PLUGIN_VIEW = WL_PLUGIN_DIR . 'view/';
const WL_PLUGIN_ASSETS = WL_PLUGIN_DIR . 'assets/';

if ( is_admin() ) {
    include WL_PLUGIN_INC . 'admin/menus.php';
    include WL_PLUGIN_INC . 'admin/custom_menu_setting.php';
} else {

}