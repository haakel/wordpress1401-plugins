<?php
/*
Plugin Name: ممنوعیت لینک 
Plugin URI: http://wordpress.org/plugins/hello-dolly/
Description: پلاگین نمونه
Author: حمید اکبری
Version: 1.0.0
License: GPLv2 or later
Author URI: http://develop-wp.local
*/
//S17- EO8
defined( 'ABSPATH' ) || exit;


function no_link_comment_text(string $comment_body): string {
    
    //کد اولیه
    // خودم نوشتم
    //  $pattern = '/<a\s+(?:[^>]*?\s+)?href=(["\'])(.*?)\1/i';
    //  if (preg_match($pattern, $comment_body, $matches)) {
    //     $comment_body = str_replace($matches, "#", $comment_body);
    //     return $comment_body;
    //  } else {
    //   return $comment_body;
    //  }

//     //کد بهبود یافته 
        // ai https://chat.qwen.ai/
//     $pattern = '/<a\b[^>]*href=["\']([^"\']*)["\'][^>]*>(.*?)<\/a>/i';

//    // $comment_body = preg_replace($pattern, '#', $comment_body);

//    //کد بهبود یافته2 
    // ai https://chat.qwen.ai/
//     $comment_body = preg_replace_callback($pattern, function ($matches) {
//         // $matches[1]: مقدار href (لینک)
//         // $matches[2]: متن داخل تگ <a>
//         return $matches[2]; // فقط متن داخل تگ <a> باقی می‌ماند
//     }, $comment_body);
//     return $comment_body;


//3کد بهبود یافته 
 // ai https://chat.qwen.ai/
 $pattern_a_tag = '/<a\b[^>]*href=["\']([^"\']*)["\'][^>]*>(.*?)<\/a>/i';
 $pattern_direct_link = '/https?:\/\/[^\s<>"]+/i';

 $comment_body = preg_replace_callback($pattern_a_tag, function ($matches) {
     return $matches[2]; 
 }, $comment_body);

 $comment_body = preg_replace($pattern_direct_link, '#', $comment_body);

 return $comment_body;
}

add_filter('comment_text', 'no_link_comment_text');