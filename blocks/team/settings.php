<?php

add_filter( 'rwmb_meta_boxes', function( $meta_boxes ) {


    $block_name = 'Team - All agents';
    $block_slug = 'team';

    $fields = [];

	$meta_boxes[] = [
		'title'           => $block_name,
		'id'              => $block_slug,
		'description'     => '',
		'type'            => 'block',
		'icon'            => 'businesswoman',
		'category'        => 'custom',
		'context'         => 'side',
		'enqueue_style'   => false,
		'supports' => [
			'align' => ['wide', 'full'],
		],
		
        'render_template' => dirname(__FILE__) . '/template.php', 
		
		// Block fields.
		'fields'          => $fields,
	];
	return $meta_boxes;
} );




?>