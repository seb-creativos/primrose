<?php
// Generate the value for the id attribute if the anchor is not empty
$sectionAnchor = !empty($attributes['anchor']) ? 'id="' . $attributes['anchor'] . '"' : '';

// Generate the value for the class attribute if the classes field is not empty
$sectionClasses = !empty($attributes['className']) ? 'class="' . $attributes['className'] . '"' : '';

// Generate the value for the force-theme attribute if the force-theme field is not empty
$sectionTheme = mb_get_block_field('force-theme') ? 'force-theme="' . mb_get_block_field('theme') . '"' : '';

// Determine the container width based on the section-width field value
$sectionWidth = mb_get_block_field('section-width');

switch($sectionWidth) {
    case 'narrower':
        $containerWidth = 'container-narrow';
        break;
    case 'wider':
        $containerWidth = 'container-wide';
        break;
    case 'full':
        $containerWidth = 'container-fluid';
        break;
    case 'default':
    default:
        $containerWidth = 'container';
        break;
}
$is_containerless = ($sectionWidth === 'is-containerless');
?>

<section <?= $sectionAnchor ?> <?= $sectionClasses ?> <?= $sectionTheme ?>>
    <?php if (!$is_containerless): ?>
        <div class="<?= $containerWidth ?>">
    <?php endif ?>
        <InnerBlocks />
    <?php if (!$is_containerless): ?>
        </div>
    <?php endif ?>
</section>