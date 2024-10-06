<?php

function custom_dashboard_menu()
{
    add_menu_page(
        'Ekwa Glossary Settings',        // Page title
        'Ekwa Glossary Settings',        // Menu title
        'manage_options',           // Capability
        'glossary-settings',        // Menu slug
        'glossary_settings_page',   // Function to display the content
        'dashicons-admin-generic',  // Icon for the menu
        20                          // Position in the menu
    );
}

// Hook into the admin menu
add_action('admin_menu', 'custom_dashboard_menu');