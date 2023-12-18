<?php

add_filter( 'rwmb_meta_boxes', function( $meta_boxes ) {


    $block_name = 'Properties Listing';
    $block_slug = 'properties-listing';

    $fields = [
        [
            'id'            =>  'headings',
            'type'          =>  'group',
            'clone'         =>  false,
            'sort_clone'    =>  false,

            'fields'        =>  [
                [
                    'name'  =>  'Heading',
                    'id'    =>  'heading',
                    'type'  =>  'textarea',
                ],
                create_switch_field( 'Advanced Settings', 'advanced' ),
                [
                    'id'        =>  'heading-settings',
                    'type'      =>  'group',
                    'visible'   =>  [ 'advanced', true ],
    
                    'fields'    =>  [
                        [
                            'name'      =>  'Tag',
                            'id'        =>  'heading-tag',
                            'type'      =>  'button_group',
                            'desc'      =>  'Specify HTML tag for SEO purposes.',
                            'options'   =>  [
                                'h1'    =>  'h1',
                                'h2'    =>  'h2',
                                'h3'    =>  'h3',
                                'h4'    =>  'h4',
                                'h5'    =>  'h5',
                                'h6'    =>  'h6',
                            ],
                            'std'       =>  'h2',
                        ],
                        [
                            'name'  =>  'CSS CLASS(ES)',
                            'id'    =>  'classes',
                            'type'  =>  'text',
                            'rows'  =>  '10',
                            'desc'  =>  'Separate multiple classes with spaces.'
                        ],
                        [
                            'name'  =>  'ATTRIBUTE(S)',
                            'id'    =>  'attributes',
                            'type'  =>  'text',
                            'rows'  =>  '10',
                            'desc'  =>  'Separate multiple attributes with spaces or line break.'
                        ],
                    ],
                ],
            ],
        ],
        [
            'name'            => 'Operation',
            'id'              => 'operation',
            'type'            => 'select',
            'multiple'        => false,
            'placeholder'     => 'Select an item',
            'select_all_none' => true,
            'options'         => [
                'sale'      => 'For sale',
                'long-term' => 'Long Term Rent',
                'shot-term' => 'Short Term Rent',
            ],
        ],
        
        [
            'name' => 'Posts Per Page',
            'id'   => 'posts-per-page',
            'type' => 'number',
            'min'  => 1,
            'step' => 1,
        ],
        [
            'name'        => 'Grid Layout',
            'id'          => 'grid-layout',
            'type'        => 'text',
        ],
        [
            'name'        => 'Listing Layout',
            'id'          => 'listing-layout',
            'type'        => 'text',
        ],
        [
            'id'        => 'hide-pagination',
            'name'      => 'Hide Pagination',
            'type'      => 'switch',
            'style'     => 'rounded',
            'on_label'  => 'Yes',
            'off_label' => 'No',
        ],
        [
            'id'        => 'hide-sort',
            'name'      => 'Hide Sort',
            'type'      => 'switch',
            'style'     => 'rounded',
            'on_label'  => 'Yes',
            'off_label' => 'No',
        ],
        [
            'name'            => 'Sortby',
            'id'              => 'sortby',
            'type'            => 'select',
            'multiple'        => false,
            'placeholder'     => 'Select an item',
            'select_all_none' => true,
            'options'         => [
                'recently-added'      => 'Recently Added',
                'lowest-price'        => 'Lowest Price',
                'highest-price'       => 'Highest Price',
                'rent-lowest-price'   => 'Rent Lowest Price',
                'rent-highest-price'  => 'Rent Highest Price',
                'min-bedrooms-first'  => 'Min Beds First',
                'max-bedrooms-first'  => 'Max Beds First',
                'min-bathrooms-first' => 'Min Bathrooms First',
                'max-bathrooms-first' => 'Max Bathrooms First',
                'own'                 => 'Agency Properties First',
            ],
        ],
        [
            'name'        => 'Min Price',
            'id'          => 'min-price',
            'type'        => 'number',
            'min'         => 1,
            'step'        => 1,
        ],
        [
            'name'        => 'Max Price',
            'id'          => 'max-price',
            'type'        => 'number',
            'min'         => 1,
            'step'        => 1,
        ],
        [
            'name'        => 'Min Bedrooms',
            'id'          => 'min-bedrooms',
            'type'        => 'number',
            'min'         => 1,
            'step'        => 1,
        ],
        [
            'name'        => 'Max Bedrooms',
            'id'          => 'max-bedrooms',
            'type'        => 'number',
            'min'         => 1,
            'step'        => 1,
        ],
        [
            'name'        => 'Min Bathrooms',
            'id'          => 'min-bathrooms',
            'type'        => 'number',
            'min'         => 1,
            'step'        => 1,
        ],
        [
            'name'        => 'Max Bathrooms',
            'id'          => 'max-bathrooms',
            'type'        => 'number',
            'min'         => 1,
            'step'        => 1,
        ],
        [
            'name'        => 'Min Plot',
            'id'          => 'min-plot',
            'type'        => 'number',
            'min'         => 1,
            'step'        => 1,
        ],
        [
            'name'        => 'Min Terrace',
            'id'          => 'min-terrace',
            'type'        => 'number',
            'min'         => 1,
            'step'        => 1,
        ],
        [
            'name'        => 'Min Built',
            'id'          => 'min-built',
            'type'        => 'number',
            'min'         => 1,
            'step'        => 1,
        ],
		[
            'name'       => 'Categories',
            'id'         => 'categories',
            'type'       => 'taxonomy_advanced',
            'taxonomy'   => 'property-categories',
            'field_type' => 'select_advanced',
            'multiple'   => true,
        ],
		[
            'name'       => 'Climate Controls',
            'id'         => 'climate-controls',
            'type'       => 'taxonomy_advanced',
            'taxonomy'   => 'property-climate-controls',
            'field_type' => 'select_advanced',
            'multiple'   => true,
        ],
		[
            'name'       => 'Conditions',
            'id'         => 'conditions',
            'type'       => 'taxonomy_advanced',
            'taxonomy'   => 'property-conditions',
            'field_type' => 'select_advanced',
            'multiple'   => true,
        ],
		[
            'name'       => 'Features',
            'id'         => 'features',
            'type'       => 'taxonomy_advanced',
            'taxonomy'   => 'property-features',
            'field_type' => 'select_advanced',
            'multiple'   => true,
        ],
		[
            'name'       => 'Furnitures',
            'id'         => 'furnitures',
            'type'       => 'taxonomy_advanced',
            'taxonomy'   => 'property-furnitures',
            'field_type' => 'select_advanced',
            'multiple'   => true,
        ],
		[
            'name'       => 'Gardens',
            'id'         => 'gardens',
            'type'       => 'taxonomy_advanced',
            'taxonomy'   => 'property-gardens',
            'field_type' => 'select_advanced',
            'multiple'   => true,
        ],
		[
            'name'       => 'Kitchens',
            'id'         => 'kitchens',
            'type'       => 'taxonomy_advanced',
            'taxonomy'   => 'property-kitchens',
            'field_type' => 'select_advanced',
            'multiple'   => true,
        ],
		[
            'name'       => 'Landing Pages',
            'id'         => 'landing-pages',
            'type'       => 'taxonomy_advanced',
            'taxonomy'   => 'property-landing-pages',
            'field_type' => 'select_advanced',
            'multiple'   => true,
        ],
		[
            'name'       => 'Locations',
            'id'         => 'locations',
            'type'       => 'taxonomy_advanced',
            'taxonomy'   => 'property-locations',
            'field_type' => 'select_advanced',
            'multiple'   => true,
        ],
		[
            'name'       => 'Orientations',
            'id'         => 'orientations',
            'type'       => 'taxonomy_advanced',
            'taxonomy'   => 'property-orientations',
            'field_type' => 'select_advanced',
            'multiple'   => true,
        ],
		[
            'name'       => 'Parkings',
            'id'         => 'Parkings',
            'type'       => 'taxonomy_advanced',
            'taxonomy'   => 'property-parkings',
            'field_type' => 'select_advanced',
            'multiple'   => true,
        ],
		[
            'name'       => 'Pools',
            'id'         => 'pools',
            'type'       => 'taxonomy_advanced',
            'taxonomy'   => 'property-pools',
            'field_type' => 'select_advanced',
            'multiple'   => true,
        ],
		[
            'name'       => 'Securities',
            'id'         => 'securities',
            'type'       => 'taxonomy_advanced',
            'taxonomy'   => 'property-securities',
            'field_type' => 'select_advanced',
            'multiple'   => true,
        ],
		[
            'name'       => 'Settings',
            'id'         => 'settings',
            'type'       => 'taxonomy_advanced',
            'taxonomy'   => 'property-settings',
            'field_type' => 'select_advanced',
            'multiple'   => true,
        ],
		[
            'name'       => 'Types',
            'id'         => 'types',
            'type'       => 'taxonomy_advanced',
            'taxonomy'   => 'property-types',
            'field_type' => 'select_advanced',
            'multiple'   => true,
        ],
		[
            'name'       => 'Views',
            'id'         => 'views',
            'type'       => 'taxonomy_advanced',
            'taxonomy'   => 'property-views',
            'field_type' => 'select_advanced',
            'multiple'   => true,
        ],
		
	];

	$meta_boxes[] = [
		'title'           => $block_name,
		'id'              => $block_slug,
		'description'     => '',
		'type'            => 'block',
		'icon'            => 'admin-home',
		'category'        => 'custom',
		'context'         => 'side',
		'enqueue_style'   => false,
		'supports' => [
			'align' => ['wide', 'full'],
		],
		
        'render_template' => dirname(__FILE__) . '/template.php', 
		
		// Block fields.
		'fields'          => $fields,
	];
	return $meta_boxes;
} );




?>