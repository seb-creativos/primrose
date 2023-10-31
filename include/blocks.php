<?php

// Load Blocks
add_action('init', 'load_blocks');

// Function to load block settings
function load_blocks(){
    // Define the blocks directory
    $blocks_dir = get_template_directory() . '/blocks/';
    
    // Call the recursive function to load block settings
    load_block_settings($blocks_dir);
}

// Recursive function to search for and load block settings in the specified directory and its subdirectories
function load_block_settings($dir) {
    // Search for directories in the specified directory
    $blocks = glob($dir . '*', GLOB_ONLYDIR);

    // Loop through each directory
    foreach ($blocks as $block) {
        // Define the path to the block settings file
        $settings = $block . '/settings.php';
        
        // Check if the block settings file exists
        if (file_exists($settings)) {
            // Include the block settings file
            include ($settings);
        }

        // Call the function recursively to search for block settings in subdirectories
        load_block_settings($block . '/');
    }
}

// Better Gutenberg Styles
add_action( 'enqueue_block_editor_assets', 'better_gutenberg');
function better_gutenberg() {
	wp_enqueue_style( 'better_gutenberg', get_theme_file_uri( 'style.css' ), false, _VER, 'all' );
}

// Custom Blocks Category
add_filter( 'block_categories_all', 'custom_block_categories', 10, 2);
function custom_block_categories( $categories, $post ) {
	
	$new_categories = array(
		array(
            'slug'	=> 'custom-layout',
            'title' => 'Layout',
        ),
        array(
            'slug'	=> 'custom-components',
            'title' => 'Components',
        ),
        array(
            'slug'	=> 'custom',
            'title' => 'Custom',
        )
	);
	
	return array_merge( $new_categories, $categories );
}

// Add Patterns to Admin Column
add_menu_page( 'linked_url', 'Patterns', 'read', 'edit.php?post_type=wp_block', '', 'dashicons-layout', 30 );

function get_common_blocks_fields(){

    $fields = [
        [
            'id'        =>  'field-settings',
            'type'      =>  'group',
            'visible'   =>  [ 'advanced', true ],

            'fields'    =>  [
                [
                    'name'  =>  'CSS CLASS(ES)',
                    'id'    =>  'classes',
                    'type'  =>  'textarea',
                    'desc'  =>  'Separate multiple classes with spaces.'
                ],
                [
                    'name'  =>  'HTML ATTRIBUT(ES)',
                    'id'    =>  'attributes',
                    'type'  =>  'textarea',
                    'desc'  =>  'Separate multiple attributes with spaces. ej: data-speed="auto" data-lag="0.9"'
                ],
            ],
        ],
        [
            'name'          =>  'Advanced Settings',
            'id'            =>  'advanced',
            'type'          =>  'switch',
            'on_label'      =>  '<i class="dashicons dashicons-yes"></i>',
        ],
    ];
    
    if ( has_filter( 'common_blocks_fields' ) ) {
        $fields = apply_filters( 'common_blocks_fields', $fields );
    }

    return $fields;
}