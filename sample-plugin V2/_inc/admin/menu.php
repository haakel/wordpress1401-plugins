<?php

add_action('admin_menu', 'wl_register_menus');

function wl_register_menus() {
    add_menu_page(
        //page_title: 
        'فیلتر کلمات',
        //menu_title:
         'فیلتر کلمات',
       // capability:
         'manage_options',
       // menu_slug:
         'wl_home',
       // function:
         'wl_home_handler'
    ); 
    add_submenu_page(
       // parent_slug: 
        'wl_home',
      //  page_title:
         'تنظیمات',
      //  menu_title:
         'تنظیمات',
       // capability:
         'manage_options',
       // menu_slug: 
        'wl_setting',
      //  function:
         'wl_setting_handler'
    );
    
    // add_submenu_page(
    //     //parent_slug: 
    //     'wl_home',
    //     //page_title:
    //      'لیست دوره ها',
    //     //menu_title:
    //      'لیست دوره ها',
    //     //capability:
    //      'manage_options',
    //     //menu_slug:
    //      'wl_course_list',
    //     //function:
    //      'wl_course_list_handler'
    // );
    

}

function wl_home_handler() {
    echo '<h1>اولین منوی من در پلاگین خودم</h1>';
}

function wl_setting_handler() {
     if (isset($_POST['btn-submit'])) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (!get_option('_ha_word')) {
                add_option('_ha_word', $_POST['filter_word']);
            } else {
                update_option('_ha_word', $_POST['filter_word']);
                //delete_option('_ha_word');
            }
        }
    }
    include HA_PLUGIN_VIEW."admin/setting.php";
}

// function wl_course_list_handler() {
//     echo '<h1 style="color: blue">لیست دوره ها</h1>';
// }