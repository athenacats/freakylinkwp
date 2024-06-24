<?php

function freakylink_theme_support()
{
    add_theme_support('title-tag'); //dynamically add title tag

}
add_action('after_setup_theme', 'freakylink_theme_support');


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

function display_user_details()
{
    if (is_user_logged_in()) {
        $current_user = wp_get_current_user();
        $user_display_name = !empty($current_user->user_firstname) ? $current_user->user_firstname : $current_user->display_name;
        return esc_html($user_display_name);
    } else {
        return '';
    }
}

function get_cart_item_count() {
    $cart_item_count = WC()->cart->get_cart_contents_count();    
    return esc_html($cart_item_count);
}