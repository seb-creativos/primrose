<?php
add_filter( 'rwmb_meta_boxes', function( $meta_boxes ) {

    $meta_boxes[] = [

		// BLOCK
        'title'     =>  'Properties Search Form',
        'id'        =>  'koble-search',
        'type'      =>  'block',
        'icon'      =>  'admin-multisite',
        'category'  =>  'custom-components',
        'context'   =>  'center',

        // BLOCK PROPS
		'supports'  =>  [
			'anchor'            =>  false,
            'customClassName'   =>  false,
			'multiple'          =>  true,
			'reusable'          =>  true,
            'lock'              =>  false,
        ],

		// BLOCK DEPENDS
        'render_template'   =>  dirname(__FILE__) . '/template.php',

        // BLOCK FIELDS
        'fields'    =>  [
            [
                'id'            =>  'headings',
                'type'          =>  'group',
                'clone'         =>  true,
                'sort_clone'    =>  true,

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
                        ],
                    ],
                ],
            ],
        ]
    ];
    return $meta_boxes;
} );