<?php
add_filter( 'rwmb_meta_boxes', function( $meta_boxes ) {

    $meta_boxes[] = [

		// BLOCK
        'title'     =>  'Custom Link',
        'id'        =>  'link',
        'type'      =>  'block',
        'icon'      =>  'admin-links',
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
                'id'            =>  'links',
                'type'          =>  'group',
                'clone'         =>  true,
                'sort_clone'    =>  true,

                'fields'        =>  [
                    [
                        'name'      => 'Link Label',
                        'id'        => 'link-label',
                        'type'      => 'text',
                    ],
                    [
                        'name'      => 'Link URL',
                        'id'        => 'link-url',
                        'type'      => 'text',
                    ],
                    [
                        'name'      =>  'Type',
                        'id'        =>  'link-type',
                        'type'      =>  'button_group',
                        'options'   =>  [
                            'btn-primary'   =>  'Primary',
                            'btn-secondary' =>  'Secondary',
                            'btn-dark'      =>  'Dark',
                            'btn-light'     =>  'Light',
                            'raw'           =>  'Raw'
                        ],
                        'std'               =>  'raw',
                    ],
                    create_switch_field( 'Advanved Settings', 'advanced' ),
                    [
                        'id'        =>  'link-settings',
                        'type'      =>  'group',
                        'visible'   =>  [ 'advanced', true ],
        
                        'fields'    =>  [
                            create_switch_field( 'Is External?', 'is-external' ),
                            [
                                'name'  =>  'CSS CLASS(ES)',
                                'id'    =>  'classes',
                                'type'  =>  'textarea',
                                'desc'  =>  'Separate multiple classes with spaces.'
                            ],
                            [
                                'name'  =>  'ATTRIBUTE(S)',
                                'id'    =>  'attributes',
                                'type'  =>  'textarea',
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