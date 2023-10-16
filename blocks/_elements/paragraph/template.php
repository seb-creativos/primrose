<?php $paragraphs = mb_get_block_field( 'paragraphs' ) ?: [] ?>

<?php foreach( $paragraphs as $paragraph ) : ?>

    <?php 
    $paragraph_ = $paragraph['paragraph'] ?? '';
    $classes = trim(preg_replace('/\s+/', ' ', $paragraph['paragraph-settings']['classes'] ?? ''));
    $attributes = trim(preg_replace('/\s+/', ' ', $paragraph['paragraph-settings']['attributes'] ?? ''));
    ?>

    <?php if ( $paragraph_ ) : ?>
        <p 
            <?= $classes ? "class='$classes'" : '' ?>
            <?= $attributes ?>
        >
            <?= $paragraph_ ?>
        </p>
    <?php endif ?>

<?php endforeach ?>