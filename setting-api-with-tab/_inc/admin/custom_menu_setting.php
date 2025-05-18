<!-- General:"general"
Writing, "writing"
Reading, "reading"
Discussion, "discussion"
Media, "media"
Privacy, "privacy"
Permalinks, "permalink" -->

<?php
//S18_E10
// تابع برای ثبت صفحه تنظیمات در پنل مدیریت
function sa_register_my_custom_setting_section() {
    add_options_page(
        'تنظیمات پلاگین درگاه پرداخت', // page_title
        'تنظیمات پلاگین درگاه پرداخت', // menu_title
        'manage_options',              // capability
        'payment_gate_setting',        // menu_slug
        'sa_render_setting'            // function
    );
}

// تابع برای نمایش صفحه تنظیمات
function sa_render_setting() {
    ?>
<div class="wrap">
    <h1>تنظیمات درگاه پرداخت</h1>

    <?php
if (isset($_GET['settings-updated'])) {
    add_settings_error('wporg_messages', 'wporg_message', "ثبت شد", 'updated');
    settings_errors();
}
if (isset($_GET['tab'])) {
    $active_tab = $_GET['tab'];
} else {
    $active_tab = '1';
}
?>

    <form method="post" action="options.php">
        <h2 class="nav-tab-wrapper">
            <a href="?page=payment_gate_setting&tab=1"
                class="nav-tab <?php echo $active_tab == '1' ? 'nav-tab-active' : ''; ?>"> تَب شماره یک</a>
            <a href="?page=payment_gate_setting&tab=2"
                class="nav-tab <?php echo $active_tab == '2' ? 'nav-tab-active' : ''; ?>">تَب شماره دو</a>
        </h2>
        <?php
if ($active_tab == '1') { ?>
        <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
        <?php
    settings_fields('my_settings');
    do_settings_sections('my_setting');
    submit_button();
} elseif ($active_tab == '2') { ?>
        <h1>سایر تنظیمات پلاگین</h1>
        <?php }
?>
    </form>
</div>
<?php
}

// تابع برای ایجاد تنظیمات و فیلد‌ها
function sa_my_custom_setting_init() {
    // ثبت گزینه تنظیمات
    $args = [
        'type' => 'string',
        'sanitize_callback' => 'sanitize_text_field',
        'default' => NULL,
    ];
    register_setting('my_settings', 'sa_option_secret_key', $args);
    register_setting('my_settings', 'sa_option_api_key', $args);

    // اضافه کردن بخش تنظیمات
    add_settings_section(
        'sa_settings_section',
        'تنظیمات API گوگل',
        'sa_setting_api_title',
        'my_setting'
    );

    // اضافه کردن فیلد secret key
    add_settings_field(
        'sa_settings_field_secret_key', // Field ID
        'Secret Key',                   // Field label
        'sa_render_field_secret_key',  // Callback برای رندر HTML فیلد
        'my_setting',                   // Slug برگه
        'sa_settings_section'          // Section ID
    );

    // اضافه کردن فیلد API Key
    add_settings_field(
        'sa_settings_field_api_key',   // Field ID
        'API Key',                      // Field label
        'sa_render_field_api_key',     // Callback برای رندر HTML فیلد
        'my_setting',                   // Slug برگه
        'sa_settings_section'          // Section ID
    );
}

// تابع برای نمایش عنوان بخش تنظیمات
function sa_setting_api_title() {
    echo '<h2>تنظیمات API گوگل</h2>';
}

// تابع برای رندر فیلد secret key
function sa_render_field_secret_key() {
    $value = get_option('sa_option_secret_key');
    ?>
<input type="text" name="sa_option_secret_key" value="<?php echo esc_attr($value); ?>" class="regular-text">
<p class="description">لطفاً secret key خود را وارد کنید.</p>
<?php
}

// تابع برای رندر فیلد API Key
function sa_render_field_api_key() {
    $value = get_option('sa_option_api_key');
    ?>
<input type="text" name="sa_option_api_key" value="<?php echo esc_attr($value); ?>" class="regular-text">
<p class="description">لطفاً API Key خود را وارد کنید.</p>
<?php
}

// اضافه کردن اکشن‌ها
add_action('admin_init', 'sa_my_custom_setting_init');
add_action('admin_menu', 'sa_register_my_custom_setting_section');