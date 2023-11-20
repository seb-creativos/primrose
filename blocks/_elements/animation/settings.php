<?php
add_filter( 'rwmb_meta_boxes', function( $meta_boxes ) {

    $meta_boxes[] = [

		// BLOCK
        'title'     =>  'Scroll-Reactive Animation',
        'id'        =>  'scroll-svg',
        'type'      =>  'block',
        'icon'      =>  'editor-expand',
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
            create_switch_field( 'Advanced Settings', 'advanced' ),
            [
                'id'        =>  'settings',
                'type'      =>  'group',
                'visible'   =>  [ 'advanced', true ],

                'fields'    =>  [
                    [
                        'name'  =>  'CSS CLASS(ES)',
                        'id'    =>  'classes',
                        'type'  =>  'textarea',
                        'rows'  =>  '10',
                        'desc'  =>  'Separate multiple classes with spaces.'
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
        ],
    ];
    return $meta_boxes;
} );