<?php
add_filter( 'rwmb_meta_boxes', function( $meta_boxes ) {

    $meta_boxes[] = [

		// BLOCK
        'title'     => 'Wrapper',
        'id'        => 'wrapper',
        'type'      => 'block',
        'icon'      => 'layout',
        'category'  => 'custom-layout',
        'context'   => 'side',

        // BLOCK PROPS
		'supports'  => [
			'anchor'            => false,
            'customClassName'   => true,
        ],

		// BLOCK DEPENDS
        'render_template' => dirname(__FILE__) . '/template.php',

        // BLOCK FIELDS
        'fields'        =>  [
            create_switch_field( 'Advanced Settings', 'advanced' ),
            [
                'id'            =>  'wrapper-settings',
                'type'          =>  'group',
                'visible'       =>  [ 'advanced', true ],

                'fields'        =>  [
                    create_switch_field( 'Is link?', 'is-link' ),
                    [
                        'id'        =>  'link-settings',
                        'type'      =>  'group',
                        'visible'   =>  [ 'is-link', true ],
        
                        'fields'    =>  [
                            [
                                'name'  =>  'Link (href)',
                                'id'    =>  'href',
                                'type'  =>  'text',
                            ],
                            create_switch_field( 'Is External?', 'is-external' ),
                        ],
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
    ];
    return $meta_boxes;
} );