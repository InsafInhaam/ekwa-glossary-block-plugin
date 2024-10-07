<?php
/*
Plugin Name: Glossary of Terms
Description: A glossary plugin for displaying dermatology terms.
Version: 1.0
Author: Insaf Inhaam
*/

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

// Enqueue styles and scripts
function glossary_enqueue_scripts()
{
    wp_enqueue_style('glossary-styles', plugin_dir_url(__FILE__) . 'assets/css/styles.css', array(), '1.0');
    include_once plugin_dir_path(__FILE__) . 'assets/css/custom.css.php';

    include_once plugin_dir_path(__FILE__) . 'assets/js/glossary-plugin.js.php';
}

add_action('wp_enqueue_scripts', 'glossary_enqueue_scripts');

// Function to add custom menu
include_once plugin_dir_path(__FILE__) . 'includes/custom-dashboard-menu.php';

// Register the settings fields
include_once plugin_dir_path(__FILE__) . 'includes/glossary-shortcode.php';

// Create shortcode for glossary output
include_once plugin_dir_path(__FILE__) . 'includes/settings-fields.php';
