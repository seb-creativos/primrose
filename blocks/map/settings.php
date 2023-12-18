<?php
add_filter( 'rwmb_meta_boxes', function( $meta_boxes ) {

    $meta_boxes[] = [

		// BLOCK
        'title'     => 'Map',
        'id'        => 'map',
        'type'      => 'block',
        'icon'      => 'location',
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
            [
                'name' => 'Address',
                'id'   => 'address',
                'type' => 'text',
            ],
            [
                'name'         => 'Map Link',
                'id'           => 'map-link',
                'type'         => 'text',
                'placeholder'  => 'https://goo.gl/maps/NUUCAoF8cA3toSsB6',
            ],
            [
                'name'          => 'Map Location',
                'id'            => 'map-location',
                'type'          => 'map',
                'address_field' => 'address',
                'std'           => '36.6669397, -4.4776874, 15',
                'api_key'       => get_option('map_api_key', 'AIzaSyBY4Y942umBAtFyrAyHtp69JehsJRPyPSQ'),
            ],
            create_switch_field( 'Advanced Settings', 'advanced' ),
            [
                'id'        =>  'map-settings',
                'type'      =>  'group',
                'visible'   =>  [ 'advanced', true ],

                'fields'    =>  [
                    [
                        'name'          => 'Map Pin',
                        'id'            => 'map-pin',
                        'type'		    => 'single_image',
                        'image_size'	=> 'small',
                    ],
                    [
                        'name'         => 'Map Style (JSON)',
                        'desc'         => 'Go to https://snazzymaps.com/ and find one you like ツ',
                        'id'           => 'map-style',
                        'type'         => 'textarea',
                        'rows'         => 12,
                    ],
                    [
                        'name'  =>  'CSS CLASS(ES)',
                        'id'    =>  'classes',
                        'type'  =>  'textarea',
                        'desc'  =>  'Separate multiple classes with spaces.'
                    ],
                ],
            ],
        ],
    ];
    return $meta_boxes;
} );