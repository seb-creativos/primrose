<?php
add_filter( 'rwmb_meta_boxes', function( $meta_boxes ) {

    $meta_boxes[] = [

		// BLOCK
        'title'     => 'Seb Video',
        'id'        => 'video',
        'type'      => 'block',
        'icon'      => 'video-alt',
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
        'fields'    => [
            [
                'name'              => 'Video',
                'id'                => 'video',
                'type'              => 'video',
                'max_file_uploads'  => 1,
                'max_status'        => false,
            ],
            create_switch_field( 'Advanved Settings', 'advanced' ),
            [
                'id'        =>  'video-settings',
                'type'      =>  'group',
                'visible'   =>  [ 'advanced', true ],

                'fields'    =>  [
                    create_switch_field( 'Muted', 'muted' ),
                    create_switch_field( 'Autoplay', 'autoplay' ),
                    create_switch_field( 'Playsline', 'playsinline' ),
                    create_switch_field( 'Loop', 'loop' ),
                    create_switch_field( 'Controls', 'controls' ),
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