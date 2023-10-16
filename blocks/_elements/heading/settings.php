<?php
add_filter( 'rwmb_meta_boxes', function( $meta_boxes ) {

    $meta_boxes[] = [

		// BLOCK
        'title'     =>  'Custom Heading',
        'id'        =>  'heading',
        'type'      =>  'block',
        'icon'      =>  'heading',
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
                    create_switch_field( 'Advanved Settings', 'advanced' ),
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
                                'type'  =>  'textarea',
                                'rows'  =>  '10',
                                'desc'  =>  'Separate multiple classes with spaces.'
                            ],
                            [
                                'name'  =>  'ATTRIBUTE(S)',
                                'id'    =>  'attributes',
                                'type'  =>  'textarea',
                                'rows'  =>  '10',
                                'desc'  =>  'Separate multiple attributes with spaces or line break.'
                            ],
                        ],
                    ],
                ],
            ],
        ]
    ];
    return $meta_boxes;
} );