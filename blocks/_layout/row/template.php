<?php
$classes = $attributes['className'] ?? [];
$attributes = mb_get_block_field('row-settings')['attributes'] ?? '';
?>

<div class="row<?= $classes ? " $classes" : '' ?>" <?= $attributes ?>>
    <InnerBlocks />
</div>