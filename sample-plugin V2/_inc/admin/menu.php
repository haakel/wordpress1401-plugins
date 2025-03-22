<?php

add_action('admin_menu', 'wl_register_menus');

function wl_register_menus() {
    add_menu_page(
        page_title: 'فیلتر کلمات',
        menu_title: 'فیلتر کلمات',
        capability: 'manage_options',
        menu_slug: 'wl_settings',
        function: 'wl_settings_handler'
    );
}

function wl_settings_handler() {
    echo '<h1>اولین منوی من در پلاگین خودم</h1>';
}