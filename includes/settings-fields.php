<?php

function glossary_register_settings()
{
    register_setting('glossary_settings_group', 'glossary_api_key');
    register_setting('glossary_settings_group', 'glossary_sheet_id');
    register_setting('glossary_settings_group', 'glossary_sheet_name');
    register_setting('glossary_settings_group', 'glossary_sheet_range');

    add_settings_section(
        'glossary_settings_section',  // Section ID
        'Glossary API Settings',      // Section title
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