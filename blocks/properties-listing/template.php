
<?php

$fields = $attributes['data'];
$name = ucfirst( $attributes['name'] );

$taxs = [
    'categories',
    'climate-controls',
    'conditions',
    'features',
    'furnitures',
    'gardens',
    'kitchens',
    'landing-pages',
    'locations',
    'orientations',
    'parkings',
    'pools',
    'securities',
    'settings',
    'tags',
    'types',
    'views',
];

$tax_slugs = [];

foreach($taxs as $tax){
    if( isset($fields[$tax]) ){
        $taxonomy = 'property-' . $tax;
        $terms_ids = explode(',', $fields[$tax]);
        foreach($terms_ids as $id){

            $term_object = get_term_by( 'ID', $id , $taxonomy );

            if($term_object){
                if($taxonomy == 'property-landing-pages')
                    $tax_slugs['property-landing-page'][] = $term_object->slug; 

                $tax_slugs[$taxonomy][] = $term_object->slug; 
            }
            
        }
        
        unset($fields[$tax]);
    }
}

$shortcode_atts =  [];
foreach($fields as $key => $value):
    if (is_array($value)) continue;
    $shortcode_atts[] = $key . '="' . $value . '" ' ;
endforeach;

foreach($tax_slugs as $key => $value): 
    $shortcode_atts[] = $key . '="' . implode(',',$value) . '" ' ;
endforeach;

?>

<?php if($is_preview): ?>

    <h2><?= $name; ?></h2>
    <small><?php esc_html_e('Click here to edit this block in the right sidebar.', 'koble') ?></small>

<?php else: ?>

    <?php 
    $headings = $fields['headings'] ?? '';
    $heading_ = $headings['heading'] ?? '';
    $heading_tag = $headings['heading-settings']['heading-tag'] ?? '';
    $classes = trim(preg_replace('/\s+/', ' ', $headings['heading-settings']['classes'] ?? ''));
    $attributes = trim(preg_replace('/\s+/', ' ', $headings['heading-settings']['attributes'] ?? ''));
    ?>

    <?php if ( $heading_ && $heading_tag ) : ?>

        <<?= $heading_tag ?>
            <?= $classes ? "class='$classes'" : '' ?>
            <?= $attributes ?>
        >
            <?= $heading_ ?>
        </<?= $heading_tag ?>>
        
    <?php endif ?>
    
    <?= do_shortcode('[koble_listing ' . implode(' ' , $shortcode_atts) . ']') ?>
    
<?php endif; ?>
