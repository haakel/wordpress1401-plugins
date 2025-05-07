<?php
//S18_E08
function wa_remove_all_dashboard_metaboxes() {
    // Remove Welcome panel
    remove_action( 'welcome_panel', 'wp_welcome_panel' );

    // Remove the rest of the dashboard widgets
    remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
    remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
    remove_meta_box( 'health_check_status', 'dashboard', 'normal' );
    remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
    remove_meta_box( 'dashboard_activity', 'dashboard', 'normal' );
    remove_meta_box( 'dashboard_site_health', 'dashboard', 'normal' );
}

//پیدا کردن ایدی ویجت ها

// function wa_show_metabox_ids() {
//     global $wp_meta_boxes;
//     echo '<pre>';
//     print_r($wp_meta_boxes['dashboard']);
//     echo '</pre>';
// }
// add_action('wp_dashboard_setup', 'wa_show_metabox_ids');

add_action("welcome_panel", "custom_dashboard_welcome_panel");
function custom_dashboard_welcome_panel() {
    // Custom code to display your own welcome panel content
    ?>
<div style="background: #fff; padding: 20px; border-radius: 5px; box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
    <h2 style="color: #23282d; font-size: 24px; margin-bottom: 15px;">Welcome to Your Custom Dashboard</h2>
    <p style="color: #555; font-size: 16px; line-height: 1.5;">This is a custom welcome panel.</p>
</div>
<?php
}
add_action( 'wp_dashboard_setup', 'wa_remove_all_dashboard_metaboxes' );

?>