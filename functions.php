<?php

function freakylink_register_styles()
{
    $version = wp_get_theme()->get('Version');
    wp_enqueue_style('freakylink_bootstrap', "https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css", array(), '1.0', 'all');
    wp_enqueue_style('freakylink_style', get_template_directory_uri() . "/style.css", array('freakylink_bootstrap'), $version, 'all');
}

add_action('wp_enqueue_scripts', 'freakylink_register_styles');
