<?php
add_filter( 'rwmb_meta_boxes', function( $meta_boxes ) {

    $meta_boxes[] = [

		// BLOCK
        'title'     => 'Testimonies (CPT Version)',
        'id'        => 'testimonies-cpt',
        'type'      => 'block',
        'icon'      => 'admin-users',
        'category'  => 'custom',
        'context'   => 'center',

        // BLOCK PROPS
		'supports'  => [
			'anchor'            => false,
            'customClassName'   => false,
        ],

		// BLOCK DEPENDS
        'render_template' => dirname(__FILE__) . '/template.php',

        // BLOCK FIELDS
        'fields' => [
            create_switch_field( 'Advanced Settings', 'advanced' ),
            [
                'id'            =>  'settings',
                'type'          =>  'group',
                'visible'       =>  [ 'advanced', true ],

                'fields'        =>  [
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