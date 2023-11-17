<?php 
$settings = mb_get_block_field('wrapper-settings');
$classes = $attributes['className'] ?? [];
$attributes = $settings['attributes'] ?? '';

$is_link = $settings['is-link'] ?? false;
$href = $settings['link-settings']['href'] ?? '';
$is_external = $settings['link-settings']['is-external'] ?? '';
?>

<?php if($is_link && $href): ?>
    <a  
        href="<?= !is_preview() ? $href : '' ?>"
        <?= $is_external ? "target='_blank'" : '' ?>
        <?= $classes ? "class='$classes'" : '' ?>
        <?= $attributes ?>
    >
        <InnerBlocks />
    </a>
<?php else: ?>
    <div <?= $classes ? "class='$classes'" : '' ?> <?= $attributes ?>>
        <InnerBlocks />
    </div>
<?php endif; ?>