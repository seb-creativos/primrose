<?php
$has_annotation = mb_get_block_field( 'has-annotation' );
$annotation = mb_get_block_field( 'annotation' );

$images = mb_get_block_field( 'gallery', ['size' => 'full'] );
$images_orientation = mb_get_block_field( 'images-orientation' );
?>

<?php if ( $is_preview ) : ?>

<div class="mb-block-preview__grid">
    <?php foreach( $images as $image ) : ?>
    <img src="<?= $image['url'] ?>"/>
    <?php endforeach ?>
</div>

<?php else : ?>

<div class="hz-scroll hz-scroll--<?= $images_orientation ?: 'portrait' ?>">

    <?php if ( $has_annotation && $annotation ) : ?>
    <h2 class="hz-scroll__annotation text-end sans-serif fs-16 mb-0 me-40">
        <?= $annotation ?>
    </h2>
    <?php endif ?>

    <?php foreach( $images as $image ) : ?>
    <div class="hz-scroll__item">
        <img
            class="object-cover"
            src="<?= $image['url'] ?>"
            height="<?= $image['height'] ?>"
            width="<?= $image['width'] ?>"
            <?= $image['alt'] ?: '' ?>
        />
    </div>
    <?php endforeach ?>
    
</div>

<?php endif ?>