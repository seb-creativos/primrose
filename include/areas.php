<?php
// Areas CPT
function areas_cpt() {
    $slug = 'area';
    $singular = 'Area';
    $plural = 'Areas';

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
        'menu_icon'     => 'dashicons-palmtree',
        'has_archive'   => false,
        'rewrite'       => array( 'slug' => $slug ),
        'show_in_rest' => true,
        'supports'      => array( 'title', 'editor', 'thumbnail' ),
    );

    register_post_type( $slug, $args );
}
add_action( 'init', 'areas_cpt' );

// Metafields
function areas_metafields( $meta_boxes ) {
    $prefix = 'area-';

    $meta_boxes[] = array(
        'id' => $prefix . 'data',
        'title' => __( 'Area Data', 'primrose' ),
        'post_types' => ['area'],
        'context' => 'advanced',
        'priority' => 'high',
        'autosave' => 'false',
        'fields' => [
            [
                'id'            => $prefix . 'landing',
                'type'          => 'text',
                'name'          => __( 'Landing | Search page', 'primrose' ),
                'placeholder'   => __( '/properties/?property-locations=' ),
                'desc'          => __( 'The landing or search you want to link at the end', 'primrose' ),
            ],
            [
                'id'    => $prefix . 'images',
                'type'  => 'image_advanced',
                'name'  => __( 'Area Images', 'koble' ),
            ],
        ],
    );
    return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'areas_metafields' );