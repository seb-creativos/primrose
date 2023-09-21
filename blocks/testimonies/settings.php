<?php
add_filter( 'rwmb_meta_boxes', function( $meta_boxes ) {

    $meta_boxes[] = [

		// BLOCK
        'title'     => 'Testimonies',
        'id'        => 'testimonies',
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
        'fields'    =>  [
            [
                'id'            =>  'testimonies',
                'type'          =>  'group',
                'clone'         =>  true,
                'sort_clone'    =>  true,

                'fields'        =>  [
                    [
                        'name'  =>  'Review',
                        'id'    =>  'review',
                        'type'  =>  'textarea',
                    ],
                    [
                        'name'  =>  'Author',
                        'id'    =>  'author',
                        'type'  =>  'text',
                    ],
                    [
                        'name'  =>  'Author Tagline',
                        'id'    =>  'author-tagline',
                        'type'  =>  'text',
                    ]
                ],
            ],
        ]
    ];
    return $meta_boxes;
} );