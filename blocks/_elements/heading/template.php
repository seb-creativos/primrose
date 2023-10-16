<?php $headings = mb_get_block_field( 'headings' ) ?: [] ?>

<?php foreach( $headings as $heading ) : ?>

    <?php 
    $heading_ = $heading['heading'] ?? '';
    $heading_tag = $heading['heading-settings']['heading-tag'] ?? '';
    $classes = trim(preg_replace('/\s+/', ' ', $heading['heading-settings']['classes'] ?? ''));
    $attributes = trim(preg_replace('/\s+/', ' ', $heading['heading-settings']['attributes'] ?? ''));
    ?>

    <?php if ( $heading_ && $heading_tag ) : ?>

        <<?= $heading_tag ?>
            <?= $classes ? "class='$classes'" : '' ?>
            <?= $attributes ?>
        >
            <?= $heading_ ?>
        </<?= $heading_tag ?>>
        
    <?php endif ?>

<?php endforeach ?>

