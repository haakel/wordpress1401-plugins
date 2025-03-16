<?php
/*
Plugin Name: Hooks - filter
Plugin URI: http://develop-wp.local
Description: فیلتر ها
Author: وحید صالحی
Version: 1.0.0
Author URI: http://develop-wp.local
*/

//S17 - E04

// function add_translate(string $value = null): string {
//     return $value == null ? 'Hi Vahid' : $value;
// }

// function apply_translate() {
//     echo add_translate('سلام وحید');
//     // echo add_translate();
// }

// apply_translate();


// function say_hello(): string {
//     return 'Hello';
// }

// function translate_to_persian(string $text): string {
//     return 'سلام';
// }

// function translate_to_french(string $text): string {
//     return 'bonjour';
// }


// add_filter('translate', 'translate_to_persian');
// add_filter('translate', 'translate_to_french',8);



// echo apply_filters('translate', 'say_hello');

function change_wp_admin_footer_text(): string {
    return 'به وب سایت من خوش آمدید.';
}

add_filter('admin_footer_text', 'change_wp_admin_footer_text');

// function false(): bool {
//     return false;
// }

add_filter('show_admin_bar', '__return_false');

/**
 * _return_false - Returns the Boolean value of false.
 * _return_true - Returns the Boolean value of true.
 * _return_empty_array - Returns an empty PHP array.
 * _return_zero - Returns the integer 0.
 * _return_null - Returns NULL.
 * _return_empty_string - Returns ''.
 */