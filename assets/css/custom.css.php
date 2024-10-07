<?php

function apply_custom_css()
{
    $custom_css = get_option('glossary_custom_css');

    if (!empty($custom_css)) {
        echo '<style>' . esc_html($custom_css) . '</style>';
    }
}

add_action('wp_head', 'apply_custom_css');