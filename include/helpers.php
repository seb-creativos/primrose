<?php

/**
 * Creates a configuration array for a switch field.
 * 
 * A switch field is a UI element that allows users to toggle between two states (on/off, yes/no, etc.).
 * This function abstracts the creation of such a field's configuration to make it easier and cleaner to create multiple switch fields without repeating common settings.
 *
 * @param string $name The label/name of the switch field that will be displayed in the UI.
 * @param string $id   The unique identifier for the switch field. This ID is used to store and retrieve the value of the field.
 * 
 * @return array Returns a configuration array for the switch field.
 */
function create_switch_field($name, $id) {
    return [
        'name'      =>  $name,
        'id'        =>  $id,
        'type'      =>  'switch',
        'on_label'  =>  '<i class="dashicons dashicons-yes"></i>',
    ];
}

/**
 * Renders a WordPress pattern (wp_block) by its title or ID.
 * 
 * This function fetches a reusable pattern by either its title or ID and then outputs its content.
 * It makes use of WordPress core functions like `get_post` and `get_page_by_title` for fetching,
 * and `apply_filters` for content rendering.
 *
 * @param mixed $pattern_identifier The title or ID of the reusable pattern. If an integer is provided, it is treated as the ID; otherwise, it is treated as the title.
 * 
 * @return void Outputs the pattern's content if found, or a 'Pattern not found.' message otherwise.
 */
function render_pattern($pattern_identifier) {

    if (is_int($pattern_identifier)) {
        $pattern = get_post($pattern_identifier);
    } 
    else {
        $pattern = get_page_by_title($pattern_identifier, OBJECT, 'wp_block');
    }

    if ($pattern instanceof WP_Post) {
        echo apply_filters('the_content', $pattern->post_content);
    } else {
        echo 'Pattern not found.';
    }
}