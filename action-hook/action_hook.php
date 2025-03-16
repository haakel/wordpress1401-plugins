<?php
/*
Plugin Name: Hooks - action
Plugin URI: http://develop-wp.local
Description: فیلتر ها
Author: وحید صالحی
Version: 1.0.0
Author URI: http://develop-wp.local
*/

//S17 - E03
function do_something() {
echo 'Hi hamid';
}

function do_something1() {
echo 'How Are You Today ?';
}

//do_something();
//do_something1();

function do_all() {
do_something();
do_something1();
}

//do_all();

add_action('do_all', 'do_something1');
add_action('do_all', 'do_something', 9);
do_action('do_all');

function add_to_admin_footer() {
echo 'به وب سایت من خوش آمدید';
}

add_action('admin_footer', 'add_to_admin_footer');