<?php 
$heading = mb_get_block_field('heading') ?? [];
$block_settings = mb_get_block_field('block-settings') ?? [];
$heading_tag = $block_settings['heading-tag'] ?? '';

$has_link = mb_get_block_field('has-link') ?? [];
$link_url = mb_get_block_field('link-url') ?? [];

$classes = $block_settings['classes'] ?? '';
$classes = $classes ? " $classes" : '';
?>

<?php if ( $heading && $heading_tag ) : ?>

    <div class="marquee__track">
        <<?= $heading_tag ?> class="marquee__text d-inline-block mb-0<?= $classes ?>">
        
            <?php if ( $has_link && $link_url ) : ?>
                <a href="<?= $link_url ?>" class="marquee__link undecorated">
                    <?= $heading ?>
                </a>
            <?php else : ?>
                <?= $heading ?>
            <?php endif ?>

        </<?= $heading_tag ?>>
    </div>

<?php endif ?>
