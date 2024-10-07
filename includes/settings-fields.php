<?php

function glossary_register_settings()
{
    register_setting('glossary_settings_group', 'glossary_api_key');
    register_setting('glossary_settings_group', 'glossary_sheet_id');
    register_setting('glossary_settings_group', 'glossary_sheet_name');
    register_setting('glossary_settings_group', 'glossary_sheet_range');
    register_setting('glossary_settings_group', 'glossary_custom_css');  // New custom CSS field
    register_setting('glossary_settings_group', 'glossary_heading');
    register_setting('glossary_settings_group', 'glossary_paragraph');
    register_setting('glossary_settings_group', 'glossary_heading_color');
    register_setting('glossary_settings_group', 'glossary_text_color');
    register_setting('glossary_settings_group', 'glossary_button_color');
    register_setting('glossary_settings_group', 'glossary_header_image');

    add_settings_section(
        'glossary_settings_section',  // Section ID
        'Glossary Settings',      // Section title
        null,                         // Callback (optional)
        'glossary-settings'           // Page slug
    );

    // Add the API Key field
    add_settings_field(
        'glossary_api_key',           // Field ID
        'API Key',                    // Field title
        'glossary_api_key_callback',  // Callback to display field
        'glossary-settings',          // Page slug
        'glossary_settings_section'   // Section ID
    );

    // Add the Sheet ID field
    add_settings_field(
        'glossary_sheet_id',
        'Sheet ID',
        'glossary_sheet_id_callback',
        'glossary-settings',
        'glossary_settings_section'
    );

    // Add the Sheet Name field
    add_settings_field(
        'glossary_sheet_name',
        'Sheet Name',
        'glossary_sheet_name_callback',
        'glossary-settings',
        'glossary_settings_section'
    );

    // Add the Sheet Range field
    add_settings_field(
        'glossary_sheet_range',
        'Sheet Range (e.g., A2:D1500)',
        'glossary_sheet_range_callback',
        'glossary-settings',
        'glossary_settings_section'
    );

    // Custom CSS textarea field
    add_settings_field(
        'glossary_custom_css',            // ID
        'Custom CSS',                     // Title
        'glossary_custom_css_callback',   // Callback
        'glossary-settings',              // Page
        'glossary_settings_section'       // Section
    );

    add_settings_field(
        'glossary_heading',
        'Glossary Heading',
        'glossary_heading_callback',
        'glossary-settings',
        'glossary_settings_section'
    );

    add_settings_field(
        'glossary_paragraph',
        'Glossary Paragraph',
        'glossary_paragraph_callback',
        'glossary-settings',
        'glossary_settings_section'
    );

    add_settings_field('glossary_heading_color', 'Heading Color', 'glossary_heading_color_callback', 'glossary-settings', 'glossary_settings_section');
    add_settings_field('glossary_text_color', 'Text Color', 'glossary_text_color_callback', 'glossary-settings', 'glossary_settings_section');
    add_settings_field('glossary_button_color', 'Button Color', 'glossary_button_color_callback', 'glossary-settings', 'glossary_settings_section');
    add_settings_field('glossary_header_image', 'Header Background Image URL', 'glossary_header_image_callback', 'glossary-settings', 'glossary_settings_section');

}
add_action('admin_init', 'glossary_register_settings');


// Callback to display API Key input field
function glossary_api_key_callback()
{
    $api_key = get_option('glossary_api_key');
    echo '<input type="text" name="glossary_api_key" value="' . esc_attr($api_key) . '" size="50">';
}

// Callback to display Sheet ID input field
function glossary_sheet_id_callback()
{
    $sheet_id = get_option('glossary_sheet_id');
    echo '<input type="text" name="glossary_sheet_id" value="' . esc_attr($sheet_id) . '" size="50">';
}

// Callback to display Sheet Name input field
function glossary_sheet_name_callback()
{
    $sheet_name = get_option('glossary_sheet_name');
    echo '<input type="text" name="glossary_sheet_name" value="' . esc_attr($sheet_name) . '" size="50">';
}

// Callback to display Sheet Range input field
function glossary_sheet_range_callback()
{
    $sheet_range = get_option('glossary_sheet_range');
    echo '<input type="text" name="glossary_sheet_range" value="' . esc_attr($sheet_range) . '" size="50">';
}

// Callback to display Custom CSS textarea
function glossary_custom_css_callback()
{
    $custom_css = get_option('glossary_custom_css');
    echo '<textarea name="glossary_custom_css" rows="10" cols="50">' . esc_textarea($custom_css) . '</textarea>';
}

// Callback function for the heading input field
function glossary_heading_callback()
{
    $heading = get_option('glossary_heading', 'Dermatology Glossary of Terms');
    echo '<input type="text" name="glossary_heading" value="' . esc_attr($heading) . '" size="50" />';
}

// Callback function for the paragraph input field
function glossary_paragraph_callback()
{
    $paragraph = get_option('glossary_paragraph', 'Common Dermatology Terms and Phrases<br />Enter a keyword or select a letter to browse the glossary.');
    echo '<textarea name="glossary_paragraph" rows="5" cols="50">' . esc_textarea($paragraph) . '</textarea>';
}

// Callback function for the heading color input field
function glossary_heading_color_callback()
{
    $heading_color = get_option('glossary_heading_color', '#000000');  // Default is black
    echo '<input type="text" class="glossary-color-picker" name="glossary_heading_color" value="' . esc_attr($heading_color) . '" size="10">';
}

// Callback function for the text color input field
function glossary_text_color_callback()
{
    $text_color = get_option('glossary_text_color', '#000000');  // Default is black
    echo '<input type="text" class="glossary-color-picker" name="glossary_text_color" value="' . esc_attr($text_color) . '" size="10">';
}

// Callback function for the button color input field
function glossary_button_color_callback()
{
    $button_color = get_option('glossary_button_color', '#0000FF');  // Default is blue
    echo '<input type="text" class="glossary-color-picker" name="glossary_button_color" value="' . esc_attr($button_color) . '" size="10">';
}

// Callback function for the header background image URL input field
function glossary_header_image_callback()
{
    $header_image = get_option('glossary_header_image', '');
    echo '<input type="text" name="glossary_header_image" value="' . esc_attr($header_image) . '" size="50">';
}


// Display content for Glossary Settings page
function glossary_settings_page()
{
    ?>
    <div class="wrap">
        <h1>Ekwa Glossary Block Settings</h1>
        <form method="post" action="options.php">
            <?php
            // Output settings fields and sections
            settings_fields('glossary_settings_group');
            do_settings_sections('glossary-settings');

            // Output save button
            submit_button();
            ?>
        </form>
    </div>
    <?php
}