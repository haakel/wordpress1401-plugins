<?php
/*
Plugin Name: کلمات به لینک
Plugin URI: http://wordpress.org/plugins/hello-dolly/
Description: پلاگین نمونه
Author: حمید اکبری
Version: 1.0.0
License: GPLv2 or later
Author URI: http://develop-wp.local
*/
//S17- EO7
defined( 'ABSPATH' ) || exit;

function convert_word_to_link($content){
    // $words = ['وردپرس', 'CMS'];
    $words = ['wordpress' => 'وردپرس', 'CMS' => 'CMS'];
    $cat = 'category';

    /*foreach ($words as $word){
        $replace = '<a href="http://localhost/amozesh/' . $cat . '/' . $word . '">' . $word . '</a>';
        $content = str_replace($word, $replace, $content);
    }*/
    foreach ($words as $key => $value){
        // $replace = '<a href="http://localhost/amozesh/' . $cat . '/' . $key . '">' . $value . '</a>';
        $replace = '<a href="' . site_url() . '/' . $cat . '/' . $key . '">' . $value . '</a>';

        $content = str_replace($value, $replace, $content);
    }
    return $content;
}

add_filter('the_content', 'convert_word_to_link');