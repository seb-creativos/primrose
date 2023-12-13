<?php 
# =========================================================
#region CUSTOM FIELDS FOR PROPERTIES
# =========================================================

add_filter( 'rwmb_meta_boxes', 'property_add_disponibility' );    
function property_add_disponibility( $meta_boxes ) {

    $prefix = 'property-';
    
    $meta_boxes[] = array(
        $name = 'Property Planning',
        $id = 'koble-metabox-properties',
        $fields = [
            [
                'id'               => $prefix . 'brochure',
                'name'             => 'PDF Brochure',
                'type'             => 'file_advanced',
                'force_delete'     => false,
                'max_file_uploads' => 1,
                'mime_type'        => 'application/pdf',
                'max_status'       => false,
            ],
            [
                'id'               => $prefix . 'plans',
                'name'             => 'PDF Plans',
                'type'             => 'file_advanced',
                'force_delete'     => false,
                'max_file_uploads' => 1,
                'mime_type'        => 'application/pdf',
                'max_status'       => false,
            ],
        ],

        'id' => $id,
        'title' => $name,
        'post_types' => array( 'property' ),
        'context' => 'advanced',
        'priority' => 'high',
        'autosave' => 'false',
        'fields' => $fields,
    );
    
    return $meta_boxes;
}

# =========================================================
#endregion CUSTOM FIELDS FOR PROPERTIES
# =========================================================

# =========================================================
#region CUSTOM FUNCTIONS
# =========================================================

// create your custom property functions here...

# =========================================================
#endregion CUSTOM FUNCTIONS
# =========================================================