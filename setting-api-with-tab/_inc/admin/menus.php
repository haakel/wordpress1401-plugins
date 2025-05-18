<?php
//S18_E09
function sa_register_my_setting() {
    $args = [
        'type' => 'string',
        'sanitize_callback' => 'sanitize_text_field',
        'default' => NULL,
    ];
    register_setting( 'general', 'sa_option', $args );
    
    add_settings_section(
        'sa_settings_section',
        'عنوان',
        'sa_setting_title',
        'general'
    );
    add_settings_field(
    'sa_settings_field',                // Field ID
    'برچسب فیلد',              // Field label
    'sa_render_field', // Callback برای رندر HTML فیلد
    'general',                  // Slug برگه
    'sa_settings_section'       // Section ID
    );

}
function sa_setting_title() {
    echo 'html body';
}

function sa_render_field() {
    $option = get_option('sa_option');
    ?>
<select name="sa_option">
    <option value="option1" <?php selected($option, 'option1'); ?>>گزینه 1</option>
    <option value="option2" <?php selected($option, 'option2'); ?>>گزینه 2</option>
</select>
<?php
}
add_action('admin_init', 'sa_register_my_setting');
?>