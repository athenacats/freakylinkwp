<?php

function freakylink_register_styles()
{
    $version = wp_get_theme()->get('Version');
    wp_enqueue_style('freakylink_bootstrap', "https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css", array(), '1.0', 'all');
    wp_enqueue_style('freakylink_style', get_template_directory_uri() . "/style.css", array('freakylink_bootstrap'), $version, 'all');
}

add_action('wp_enqueue_scripts', 'freakylink_register_styles');


function freakylink_register_scripts()
{
    wp_enqueue_script('freakylink_jquery', "https://code.jquery.com/jquery-3.7.1.slim.min.js", array(), '3.7.1', true);
    wp_enqueue_script('freakylink_bootstrapjs', "https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js", array(), '5.3.2', true);

    wp_enqueue_script('freakylink_main', get_template_directory_uri() . "/assets/js/scripts.js", array(), '1.0', true);
}

add_action('wp_enqueue_scripts', 'freakylink_register_scripts');
?>