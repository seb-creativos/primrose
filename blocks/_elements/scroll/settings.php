<?php
add_filter( 'rwmb_meta_boxes', function( $meta_boxes ) {

    $meta_boxes[] = [

		// BLOCK
        'title'     =>  'Scroll-Reactive Element',
        'id'        =>  'scroll',
        'type'      =>  'block',
        'icon'      =>  'image-rotate-right',
        'category'  =>  'custom-components',
        'context'   =>  'center',

        // BLOCK PROPS
		'supports'  =>  [
			'anchor'            =>  false,
            'customClassName'   =>  false,
        ],

		// BLOCK DEPENDS
        'render_template'   =>  dirname(__FILE__) . '/template.php',

        // BLOCK FIELDS
        'fields'    =>  [
            [
                'id'            =>  'scroll',
                'type'          =>  'group',
                'clone'         =>  false,
                'sort_clone'    =>  false,

                'fields' => [
                    [
                        'name'      => 'Label',
                        'id'        => 'label',
                        'type'      => 'text',
                    ],
                    [
                        'name'      => 'URL',
                        'id'        => 'url',
                        'type'      => 'text',
                    ],
                    create_switch_field( 'Advanced Settings', 'advanced' ),
                    [
                        'id'        =>  'settings',
                        'type'      =>  'group',
                        'visible'   =>  [ 'advanced', true ],
        
                        'fields'    =>  [
                            [
                                'name'      =>  'Icon Type',
                                'id'        =>  'icon-type',
                                'type'      =>  'button_group',
                                'options'   =>  [
                                    'custom'    =>  'Custom Icon',
                                    'class'     =>  'CSS Class',
                                ],
                                'std'       =>  'class',
                            ],
                            [
                                'name'              =>  'Custom Icon (SVG)',
                                'id'                =>  'custom-icon',
                                'type'              => 'file_advanced',
                                'max_file_uploads'  => 1,
                                'max_status'        => false,
                                'mime_type'         => 'image/svg+xml',
                                'visible'           =>  ['icon-type', 'custom'],
                            ],
                            [
                                'name'      =>  'Icon Class',
                                'id'        =>  'icon-class',
                                'type'      =>  'text',
                                'visible'   =>  ['icon-type', 'class'],
                            ],
                            create_switch_field( 'Is External?', 'is-external' ),
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