<?php
add_filter( 'rwmb_meta_boxes', function( $meta_boxes ) {

    $meta_boxes[] = [

		// BLOCK
        'title'     =>  'Custom Paragraph',
        'id'        =>  'paragraph',
        'type'      =>  'block',
        'icon'      =>  'editor-paragraph',
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
                'id'            =>  'paragraphs',
                'type'          =>  'group',
                'clone'         =>  true,
                'sort_clone'    =>  true,

                'fields'        =>  [
                    [
                        'name'      => 'Paragraph',
                        'id'        => 'paragraph',
                        'type'      => 'textarea',
                        'rows'      => '10',
                    ],
                    create_switch_field( 'Advanved Settings', 'advanced' ),
                    [
                        'id'        =>  'paragraph-settings',
                        'type'      =>  'group',
                        'visible'   =>  [ 'advanced', true ],
        
                        'fields'    =>  [
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
                ]
            ],
        ]
    ];
    return $meta_boxes;
} );