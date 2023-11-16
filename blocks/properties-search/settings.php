<?php
add_filter( 'rwmb_meta_boxes', function( $meta_boxes ) {

    // ARRAY OF PAGES FOR LANDING FIELD
    $pageOptions = [];
    $pages = get_pages(array('sort_order' => 'DESC'));
    foreach ($pages as $page) {
        $pageOptions[] = [
            'value'  => $page->post_name,
            'label'  => $page->post_title,
            'parent' => $page->post_parent ? get_page( $page->post_parent )->post_name : false,
        ];
    }

    $meta_boxes[] = [

		// BLOCK
        'title'     =>  'Properties Search Form',
        'id'        =>  'koble-search',
        'type'      =>  'block',
        'icon'      =>  'admin-multisite',
		'category'  => 'custom',
        'context'   =>  'center',

        // BLOCK PROPS
		'supports'  =>  [
			'anchor'            =>  false,
            'customClassName'   =>  false,
			'multiple'          =>  true,
			'reusable'          =>  true,
            'lock'              =>  false,
        ],

		// BLOCK DEPENDS
        'render_template'   =>  dirname(__FILE__) . '/template.php',

        // BLOCK FIELDS
        'fields'    =>  [
            [
                'id'            =>  'search',
                'type'          =>  'group',
                'clone'         =>  false,
                'sort_clone'    =>  false,

                'fields'        =>  [
                    [
                        'name'      =>  'Layout',
                        'id'        =>  'layout',
                        'type'      =>  'select',
                        'options'   =>  [
                            'horizontal' => 'Horizontal',
                        ],
                        'std'       =>  'horizontal',
                    ],
                    [
                        'name'      =>  'Page',
                        'id'        =>  'page',
                        'type'      =>  'select',
                        'options'   =>  $pageOptions,
                        'std'       =>  'properties',
                    ],
                    create_switch_field( 'Advanced Settings', 'advanced' ),
                    [
                        'id'            =>  'settings',
                        'type'          =>  'group',
                        'visible'       =>  [ 'advanced', true ],
        
                        'fields'        =>  [
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
            ],
        ]
    ];
    return $meta_boxes;
} );