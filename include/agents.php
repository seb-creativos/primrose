<?php
// Agents CPT
function agents_cpt() {
    $slug = 'agent';
    $singular = 'Agent';
    $plural = 'Agents';

    $labels = array(
        'name'               => _x( $plural, 'post type general name' ),
        'singular_name'      => _x( $singular, 'post type singular name' ),
        'add_new'            => _x( 'Add New', $slug ),
        'add_new_item'       => __( sprintf('Add New %s', $singular) ),
        'edit_item'          => __( sprintf('Edit %s', $singular) ),
        'new_item'           => __( sprintf('New %s', $singular) ),
        'all_items'          => __( sprintf('All %s', $plural) ),
        'view_item'          => __( sprintf('View %s', $singular) ),
        'search_items'       => __( sprintf('Search %s', $plural) ),
        'not_found'          => __( sprintf('No %s found', $plural) ),
        'not_found_in_trash' => __( sprintf('No %s found in the Trash', $plural) ),
        'parent_item_colon'  => '',
        'menu_name'          => $plural
    );

    $args = array(
        'labels'        => $labels,
        'public'        => true,
        'menu_position' => 5,
        'menu_icon'     => 'dashicons-businesswoman',
        'has_archive'   => true,
        'rewrite'       => array( 'slug' => $slug ),
        'supports'      => array( 'title', 'editor', 'thumbnail' ),
    );

    register_post_type( $slug, $args );
}
add_action( 'init', 'agents_cpt' );

// Metafields
function agents_metafields( $meta_boxes ) {
    $prefix = 'agent-';

    $meta_boxes[] = array(
        'id' => $prefix . 'data',
        'title' => __( 'Agent Data', 'primrose' ),
        'post_types' => ['agent'],
        'context' => 'advanced',
        'priority' => 'high',
        'autosave' => 'false',
        'fields' => [
            [
                'id'    => $prefix . 'name',
                'type'  => 'text',
                'name'  => __( 'First Name', 'primrose' ),
                'desc'  => __( 'The agent\'s first name', 'primrose' ),
            ],
            [
                'id'    => $prefix . 'role',
                'type'  => 'text',
                'name'  => __( 'Role', 'primrose' ),
                'desc'  => __( 'The agent\'s work role', 'primrose' ),
            ],
            [
                'id'        => $prefix . 'pronouns',
                'name'      => __( 'Pronouns', 'primrose' ),
                'desc'      => __( 'This is used for dynamic titles like "Contact him/her/them"', 'primrose' ),
                'type'      => 'button_group',
                'options'   => [
                    'he'        => 'he/him',
                    'she'       => 'she/her',
                    'they'      => 'they/them',
                ],
                'inline'    => true,
                'multiple'  => false,
                'std'       => 'they',
            ],
            [
                'type' => 'divider',
            ],
            [
                'id'            => $prefix . 'phone',
                'type'          => 'text',
                'name'          => __( 'Phone number', 'primrose' ),
                'placeholder'   => __( 'Please follow this format: +34 000 000 000', 'primrose' ),
                'desc'          => __( 'The agent\'s corporate phone/s', 'primrose' ),
                'clone'         => true,
                'sort_clone'    => true,
            ],
            [
                'type' => 'divider',
            ],
            [
                'id'    => $prefix . 'email',
                'type'  => 'email',
                'name'  => __( 'Email', 'primrose' ),
                'desc'  => __( 'The agent\'s corporate email/s', 'primrose' ),
                'clone'         => true,
                'sort_clone'    => true,
            ],
        ],
    );
    return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'agents_metafields' );