<?php

function freakylink_theme_support()
{
    add_theme_support('title-tag'); //dynamically add title tag
    add_theme_support('custom-logo');
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
        $submenu = ($depth > 0) ? ' sub-menu' : '';
        $output .= "\n$indent<ul class=\"dropdown-menu$submenu depth_$depth\">\n";
    }

    // Start the element output.
    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
    {
        $indent = ($depth) ? str_repeat("\t", $depth) : '';
        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $classes[] = ($item->current || $item->current_item_ancestor) ? 'active' : '';
        $classes[] = 'nav-item';
        $classes[] = ($depth && $args->walker->has_children) ? 'dropdown-submenu' : '';

        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args, $depth));
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

        $id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args, $depth);
        $id = $id ? ' id="' . esc_attr($id) . '"' : '';

        $output .= $indent . '<li' . $id . $class_names . '>';

        $atts = array();
        $atts['title'] = !empty($item->attr_title) ? $item->attr_title : '';
        $atts['target'] = !empty($item->target) ? $item->target : '';
        $atts['rel'] = !empty($item->xfn) ? $item->xfn : '';
        $atts['href'] = !empty($item->url) ? $item->url : '';

        $atts['class'] = 'nav-link';
        if ($depth === 0 && $args->walker->has_children) {
            $atts['class'] .= ' dropdown-toggle';
            $atts['data-toggle'] = 'dropdown';
            $atts['aria-haspopup'] = 'true';
            $atts['aria-expanded'] = 'false';
        }

        $attributes = '';
        foreach ($atts as $attr => $value) {
            if (!empty($value)) {
                $attributes .= ' ' . $attr . '="' . esc_attr($value) . '"';
            }
        }

        $item_output = $args->before;
        $item_output .= '<a' . $attributes . '>';
        $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }

    // End the element output.
    function end_el(&$output, $item, $depth = 0, $args = null)
    {
        $output .= "</li>\n";
    }
}
