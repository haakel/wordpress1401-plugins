<?php
//S18_E05
add_action('add_meta_boxes', 'md_register_video_url_meta_box'); 
add_action("save_post", "md_video_url_meta_box");

function md_register_video_url_meta_box() {
    add_meta_box(
        'md_video_url_meta_box',
        'لينك ويديو',
        'video_url_meta_box_html',
        'post',
        'normal',
        'default'
    );
}

function video_url_meta_box_html($post) {
?>
<!-- //echo ''; -->
<label for="video_url">لينك ويديو</label>
<input type="text" value='<?php echo get_post_meta($post->ID, "_md_video_url", true) ?>' id="video_url" name="video_url"
    placeholder="لينك ويديو خود را وارد نماييد">
<?php
}

function md_video_url_meta_box($post_id) {
    // if (!get_post_meta($post_id, '_md_video_url', true)) {
    //     add_post_meta($post_id, '_md_video_url', $_POST['video_url']);
    // } else {
    //     update_post_meta($post_id, '_md_video_url', $_POST['video_url']);
    // }

    if(isset($_POST['video_url']) && isset($_POST['price'])){
    update_post_meta($post_id, '_md_video_url', $_POST['video_url']);
    update_post_meta($post_id, '_md_price', $_POST['price']);
    }
}

//S18_E06
add_action('add_meta_boxes', 'md_register_price_meta_box'); 
add_action("save_post", "price_meta_box_html");

function md_register_price_meta_box() {
    add_meta_box(
        'md_price_meta_box',
        'قیمت',
        'price_meta_box_html',
        'post',
        'normal',
        'default'
    );
}

function price_meta_box_html($post) {
    ?>
<!-- //echo ''; -->
<label for="price">قیمت</label>
<input type="text" value='<?php echo get_post_meta($post->ID, "_md_price", true) ?>' id="price" name="price"
    placeholder="قیمت را وارد نماييد">
<?php
}