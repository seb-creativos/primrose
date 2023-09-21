<?php 
$classes = $attributes['className'] ?? [];
$attributes = mb_get_block_field('column-settings')['attributes'] ?? '';
?>

<div <?= $classes ? "class='$classes'" : '' ?> <?= $attributes ?>>
    <InnerBlocks />
</div>