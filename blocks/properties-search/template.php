<?php 
$search = mb_get_block_field( 'search' ) ?: false;
$layout = $search['layout'] ?? 'horizontal';
$page = $search['page'] ?? 'properties';

$settings = $search['settings'] ?: false;
$classes = $settings['classes'] ?? '';
$attributes = $settings['attributes'] ?? '';
?>

<?php if($is_preview): ?>

    <input type="text" disabled>
    <input type="text" disabled>
    <input value="Find it" type="submit" disabled>

<?php else: ?>
    <?php if ( $layout && $page ) : ?>

    <div <?= $classes ? 'class="'.$classes.'"' : '' ?> <?= $attributes ?> >
        <?= do_shortcode( '[koble_search layout="'.$layout.'" page="'.$page.'"]' ) ?>
    </div>
        
    <?php endif ?>
<?php endif ?>