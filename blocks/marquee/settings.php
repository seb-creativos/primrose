<?php
add_filter( 'rwmb_meta_boxes', function( $meta_boxes ) {

    $meta_boxes[] = [

		// BLOCK
        'title'     => 'Marquee',
        'id'        => 'marquee',
        'type'      => 'block',
        'icon'      => 'layout',
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
        'fields'        =>  [
            [
                'name'  =>  'Heading',
                'id'    =>  'heading',
                'type'  =>  'textarea',
            ],
            create_switch_field( 'Has Link?', 'has-link' ),
            [
                'name'      =>  'Link URL',
                'id'        =>  'link-url',
                'type'      =>  'text',
                'visible'   =>  [ 'has-link', true ],
            ],
            create_switch_field( 'Advanved Settings', 'advanced' ),
            [
                'id'        =>  'block-settings',
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
                        'desc'  =>  'Separate multiple classes with spaces.'
                    ],
                ],
            ],
        ]
    ];
    return $meta_boxes;
} );