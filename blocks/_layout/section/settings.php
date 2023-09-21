<?php
add_filter( 'rwmb_meta_boxes', function( $meta_boxes ) {

    $meta_boxes[] = [

		// BLOCK
        'title'     => 'Section',
        'id'        => 'section',
        'type'      => 'block',
        'icon'      => 'layout',
        'category'  => 'custom',
        'context'   => 'side',

        // BLOCK PROPS
		'supports'  => [
			'anchor'            => true,
            'customClassName'   => true,
        ],

		// BLOCK DEPENDS
        'render_template' => dirname(__FILE__) . '/template.php',

        // BLOCK FIELDS
        'fields' => [
            [
                'name'                  =>  'Section Width',
                'id'                    =>  'section-width',
                'type'                  =>  'button_group',
                'inline'                =>  false,
                'options'               =>  [
                    'default'           =>  'Default',
                    'narrower'          =>  'Narrower',
                    'wider'             =>  'Wider',
                    'full'              =>  'Full',
                    'is-containerless'  =>  'Containerless',
                ],
                'std'                   =>  'default',
            ],
            create_switch_field( 'Force Theme Swap?', 'force-theme' ),
            [
                'id'        =>  'theme',
                'type'      =>  'button_group',
                'options'   =>  [
                    'dark'  =>  'Dark',
                    'light' =>  'Light',
                ],
                'std'       =>  'dark',
                'visible'   =>  [ 'force-theme', true ],
            ],
        ],
    ];
    return $meta_boxes;
} );