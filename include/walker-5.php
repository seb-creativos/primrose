<?php

/**
 * Bootstrap 5 WordPress navbar walker menu 1.3.4
 * Includes 2 custom patches for submenus on BootStrap 5.1 
 * Includes Custom Chevron
 *
 * @package picostrap5
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

class WP_Bootstrap_5_Navwalker extends Walker_Nav_menu
{
    private $current_item;
    private $dropdown_menu_alignment_values = [
        'dropdown-menu-start',
        'dropdown-menu-end',
        'dropdown-menu-sm-start',
        'dropdown-menu-sm-end',
        'dropdown-menu-md-start',
        'dropdown-menu-md-end',
        'dropdown-menu-lg-start',
        'dropdown-menu-lg-end',
        'dropdown-menu-xl-start',
        'dropdown-menu-xl-end',
        'dropdown-menu-xxl-start',
        'dropdown-menu-xxl-end'
    ];

    function start_lvl(&$output, $depth = 0, $args = null)
    {
        $dropdown_menu_class[] = '';
        foreach ($this->current_item->classes as $class) {
            if (in_array($class, $this->dropdown_menu_alignment_values)) {
                $dropdown_menu_class[] = $class;
            }
        }

        $indent = str_repeat("\t", $depth);
        $submenu = ($depth > 0) ? ' sub-menu' : '';

        $output .= "\n" . $indent . '<ul class="dropdown-menu gap-16' . $submenu . ' ' . esc_attr(implode(' ', $dropdown_menu_class)) . ' depth_' . $depth . "\">\n";
    }

    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
    {
        $this->current_item = $item;

        $indent = ($depth) ? str_repeat("\t", $depth) : '';

        $li_attributes = '';
        $class_names = $value = '';

        $classes = empty($item->classes) ? array() : (array) $item->classes;

        $classes[] = 'nav-item';
        $classes[] = 'nav-item-' . $item->ID;
        if ($depth && $args->walker->has_children) {
            $classes[] = 'dropend dropdown-menu-end'; //  patch #1
        }

        $class_names =  join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
        $class_names = ' class="' . esc_attr($class_names) . '"';

        $id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args);
        $id = strlen($id) ? ' id="' . esc_attr($id) . '"' : '';

        $output .= $indent . '<li ' . $id . $value . $class_names . $li_attributes . '>';

        $attributes  = ' alt="' . esc_attr($item->title) . '"';
        $attributes .= !empty($item->attr_title) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
        $attributes .= !empty($item->target) ? ' target="' . esc_attr($item->target) . '"' : '';
        $attributes .= !empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
        $attributes .= !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';

        $active_class = ($item->current || $item->current_item_ancestor || in_array("current_page_parent", $item->classes, true) || in_array("current-post-ancestor", $item->classes, true)) ? 'active' : '';
        $nav_link_class = ( $depth > 0 ) ? 'dropdown-item ' : 'nav-link ';
        $attributes .= ' class="clonelink ' . $nav_link_class . $active_class . '"';

        // Custom Chevron
        $custom_chevron = '
            <button 
            class="dropdown-toggle plus-icon"
            type="button"
            data-bs-toggle="dropdown"
            aria-expanded="false"
            data-bs-auto-close="outside"
            aria-haspopup="true"
            title="Show Submenu"
            data-cursor-stick
            >
                <span class="plus-icon__line plus-icon__line--y"></span>
                <span class="plus-icon__line plus-icon__line--x"></span>
            </button>
        ';

        $item_output  = $args->before;
        $item_output .= '<a' . $attributes . '>';
        $item_output .= '<label class="clonelink__label">' . $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after . '</label>';
        $item_output .= '</a>';
        $item_output .= ($args->walker->has_children) ? $custom_chevron : '';
        $item_output .= $args->after;

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }
}
