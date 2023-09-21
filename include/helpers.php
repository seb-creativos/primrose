<?php

/**
 * Creates a configuration array for a switch field.
 * 
 * A switch field is a UI element that allows users to toggle between two states (on/off, yes/no, etc.).
 * This function abstracts the creation of such a field's configuration to make it easier and cleaner
 * to create multiple switch fields without repeating common settings.
 *
 * @param string $name The label/name of the switch field that will be displayed in the UI.
 * @param string $id   The unique identifier for the switch field. This ID is used to store and retrieve 
 *                     the value of the field.
 * 
 * @return array      Returns a configuration array for the switch field.
 */
function create_switch_field($name, $id) {
    return [
        'name'      =>  $name,
        'id'        =>  $id,
        'type'      =>  'switch',
        'on_label'  =>  '<i class="dashicons dashicons-yes"></i>',
    ];
}