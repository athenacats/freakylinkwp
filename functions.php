<?php

function freakylink_theme_support()
{
    add_theme_support('title-tag'); //dynamically add title tag
    add_theme_support('custom-logo');
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'freakylink_theme_support');


function freakylink_register_styles()
{
    $version = wp_get_theme()->get('Version');
    wp_enqueue_style('freakylink_bootstrap', "https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css", array(), '1.0', 'all');
    wp_enqueue_style('freakylink_fontawesome', "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css", array(), '1.0', "all");
    wp_enqueue_style('freakylink_style', get_template_directory_uri() . "/style.css", array('freakylink_bootstrap'), $version, 'all');
}

add_action('wp_enqueue_scripts', 'freakylink_register_styles');


function freakylink_register_scripts()
{
    wp_enqueue_script('freakylink_jquery', "https://code.jquery.com/jquery-3.7.1.slim.min.js", array(), '3.7.1', true);
    wp_enqueue_script('freakylink_popper', "https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js", array(), '2.11.8', true);
    wp_enqueue_script('freakylink_bootstrapjs', "https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js", array(), '5.3.3', true);

    //wp_enqueue_script('freakylink_main', get_template_directory_uri() . "/assets/js/scripts.js", array(), '1.0', true);
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

function get_cart_item_count()
{
    $cart_item_count = WC()->cart->get_cart_contents_count();
    return esc_html($cart_item_count);
}

function freakylink_menus()
{
    $locations = array(
        'primary' => 'Primary Menu',
        'footer' => 'Footer Menu'
    );
    register_nav_menus($locations);
}
add_action('init', 'freakylink_menus');

//walker class for naivigation
class Custom_Walker_Nav_Menu extends Walker_Nav_Menu
{
    // Start the list before the elements are added.
    function start_lvl(&$output, $depth = 0, $args = null)
    {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"dropdown-menu\">\n";
    }

    // Start the element output.
    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
    {
        $indent = ($depth) ? str_repeat("\t", $depth) : '';

        // Add 'nav-item' class to <li>
        $classes = 'nav-item';
        $class_names = ' class="' . esc_attr($classes) . '"';

        // Start the <li> element
        $output .= $indent . '<li' . $class_names . '>';

        // Set up the attributes for the <a> link
        $atts = array();
        $atts['href'] = !empty($item->url) ? $item->url : '';
        $atts['class'] = 'nav-link';  // Add 'nav-link' class to <a>

        $icon = '';
        if (strpos(strtolower($item->title), 'contact') !== false) {
            $icon = '<i class="fas fa-envelope fa-fw mr-2"></i>'; // Envelope icon for contact
        } elseif (strpos(strtolower($item->title), 'blog') !== false) {
            $icon = '<i class="fas fa-blog fa-fw mr-2"></i>'; // Blog icon for blog pages
        } else if (strpos(strtolower($item->title), 'home') !== false) {
            $icon = '<i class="fas fa-home fa-fw mr-2"></i>';
        } else if (strpos(strtolower($item->title), 'checkout') !== false) {
            $icon = '<i class="fa-solid fa-cart-shopping fa-fw mr-2"></i>';
        } else if (strpos(strtolower($item->title), 'cart') !== false) {
            $icon = '<i class="fa-solid fa-cart-shopping fa-fw mr-2"></i>';
        } elseif (
            strpos(strtolower($item->title), 'account') !== false ||
            strpos(strtolower($item->title), 'login') !== false ||
            strpos(strtolower($item->title), 'sign up') !== false
        ) {
            $icon = '<i class="fa-solid fa-ghost fa-fw mr-2"></i>';
        } else {
            $icon = '<i class="fas fa-file-alt fa-fw mr-2"></i>'; // Default icon
        }

        // Build the <a> tag with the attributes
        $attributes = '';
        foreach ($atts as $attr => $value) {
            if (!empty($value)) {
                $attributes .= ' ' . $attr . '="' . esc_attr($value) . '"';
            }
        }

        // The HTML for the link text, wrapped in <a>
        $item_output = '<a' . $attributes . '>';
        $item_output .= $icon; // Add the icon before the link text
        $item_output .= apply_filters('the_title', $item->title, $item->ID);  // Add link text
        $item_output .= '</a>';

        // Append the <a> tag to the <li>
        $output .= $item_output;
    }

    // End the element output.
    function end_el(&$output, $item, $depth = 0, $args = null)
    {
        $output .= "</li>\n";
    }
}

function freakylink_widget_areas()
{
    register_sidebar(
        array(
            'before_title' => '<h2>',
            'after_title' => '</h2>',
            'before_widget' => '<div class="widget-area">',
            'after_widget' => '</div>',

            'name' => 'Header',
            'id' => 'header',
            'description' => 'Add widgets to this header',
        )
    );
    register_sidebar(
        array(
            'before_title' => '<h2>',
            'after_title' => '</h2>',
            'before_widget' => '<div class="widget-area">',
            'after_widget' => '</div>',

            'name' => 'Footer',
            'id' => 'footer',
            'description' => 'Add widgets to this footer',
        )
    );
}

add_action('widgets_init', 'freakylink_widget_areas');
