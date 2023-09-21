<?php $headings = mb_get_block_field( 'headings' ) ?: [] ?>

<?php foreach( $headings as $heading ) : ?>

    <?php 
    $heading_ = $heading['heading'] ?? '';
    $heading_tag = $heading['heading-settings']['heading-tag'] ?? '';
    $classes = $heading['heading-settings']['classes'] ?? '';
    $attributes = $heading['heading-settings']['attributes'] ?? '';
    ?>

    <?php if ( $heading_ && $heading_tag ) : ?>

        <!-- <h1> -->
        <<?= $heading_tag ?>
            <?= $classes ? "class='$classes'" : '' ?>
            <?= $attributes ?>
        >
            <?= $heading_ ?>
        </<?= $heading_tag ?>>
        <!-- </h1> -->
        
    <?php endif ?>

<?php endforeach ?>

