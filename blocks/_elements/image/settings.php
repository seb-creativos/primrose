<?php
add_filter( 'rwmb_meta_boxes', function( $meta_boxes ) {

    $meta_boxes[] = [

		// BLOCK
        'title'     => 'Custom Image',
        'id'        => 'image',
        'type'      => 'block',
        'icon'      => 'format-image',
        'category'  => 'custom-components',
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
            [
                'name'          => 'Image',
                'id'            => 'image',
                'type'          => 'single_image',
                'image_size'    => 'thumbnail',
            ],
            create_switch_field( 'Advanved Settings', 'advanced' ),
            [
                'id'            =>  'image-settings',
                'type'          =>  'group',
                'visible'       =>  [ 'advanced', true ],

                'fields'        =>  [
                    [
                        'name'          =>  'Size',
                        'id'            =>  'size',
                        'type'          =>  'button_group',
                        'options'       =>  [
                            'thumbnail' => 'Thumbnail',
                            'medium'    => 'Medium',
                            'large'     => 'Large',
                            'full'      => 'Full',
                        ],
                        'std'           =>  'full',
                    ],
                    create_switch_field( 'Open as Lightbox?', 'is-lightbox' ),
                    [
                        'name'      =>  'Gallery Name',
                        'id'        =>  'gallery-name',
                        'type'      =>  'text',
                        'visible'   =>  [ 'is-lightbox', true ],
                    ],
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
        
    ];
    return $meta_boxes;
} );