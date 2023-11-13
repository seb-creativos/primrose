<?php 
$search = mb_get_block_field( 'search' ) ?: false;
$layout = $search['layout'] ?? 'horizontal';
$page = $search['page'] ?? 'properties';

$settings = $search['settings'] ?: false;
$classes = $settings['classes'] ?? '';
$attributes = $settings['attributes'] ?? '';
?>

<?php if ( $layout ) : ?>

<div <?= $classes ? 'class="'.$classes.'"' : '' ?> <?= $attributes ?> >
    <?= do_shortcode( '[koble_search layout="'.$layout.'" page="'.$page.'"]' ) ?>
</div>
    
<?php endif ?>