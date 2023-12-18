<?php
add_filter( 'rwmb_meta_boxes', function( $meta_boxes ) {

    $meta_boxes[] = [

		// BLOCK
        'title'     => 'Column',
        'id'        => 'column',
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
                'id'            =>  'column-settings',
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