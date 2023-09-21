<?php
add_filter( 'rwmb_meta_boxes', function( $meta_boxes ) {

    $meta_boxes[] = [

		// BLOCK
        'title'     => 'Images Carousel',
        'id'        => 'images-carousel',
        'type'      => 'block',
        'icon'      => 'images-alt2',
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
            create_switch_field( 'Has Annotation?', 'has-annotation' ),
            [
                'name'      =>  'Annotation',
                'id'        =>  'annotation',
                'type'      =>  'textarea',
                'visible'   =>  [ 'has-annotation', true ],
            ],
            [
                'name'      =>  'Images Orientation?',
                'id'        =>  'images-orientation',
                'type'      =>  'button_group',
                'options'   =>  [
                    'portrait'  =>  'Portrait',
                    'landscape' =>  'Landscape',
                ],
                'std'           =>  'portrait',
            ],
            [
                'name'             => 'Gallery',
                'id'               => 'gallery',
                'type'             => 'image_advanced',
                'add_to'           => 'beginning',
            ],
        ]
    ];
    return $meta_boxes;
} );