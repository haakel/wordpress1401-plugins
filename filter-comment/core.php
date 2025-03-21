<?php
/*
Plugin Name: filtter plugin
Plugin URI: http://wordpress.org/plugins/hello-dolly/
Description: پلاگین نمونه
Author: حمید اکبری
Version: 1.0.0
License: GPLv2 or later
Author URI: http://develop-wp.local
*/
defined( 'ABSPATH' ) || exit;

function filter_comment_text(string $comment_body): string {
    //$word = 'مدیریت';
    $words = ['لطفا', 'مدیریت'];
    //$replace_word = ['management', 'please'];

    foreach ($words as $word) {
        $word_length = mb_strlen($word);
        $comment_body = str_replace($word, str_repeat('*', $word_length), $comment_body);
    }

    return $comment_body;
    //return str_replace($word, $replace_word, $comment_body);
    //return preg_replace("/{$word}/", $replace_word, $comment_body);
}

add_filter('comment_text', 'filter_comment_text');