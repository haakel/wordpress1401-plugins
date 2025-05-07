<?php
//S18_E08
function wa_register_dashboard_widgets() {
    wp_add_dashboard_widget(
        'wa_widget', // widget_id
        'اطلاعات عمومی', // widget_name
        'wa_get_some_data', // callback
        '', // control_callback
        '', // callback_args
        '', // context
        ''  // priority
    );
    
}

function wa_get_some_data() {
    $user_count = count_users();
    $user_count_total = $user_count['total_users'];
    ?>
<div>
    تعداد کاربران : <?php echo $user_count_total; ?>
</div>
<div>
    تعداد پست ها : <?php echo wp_count_posts()->publish; ?>
</div>
<?php
}

add_action( 'wp_dashboard_setup', 'wa_register_dashboard_widgets' );

?>