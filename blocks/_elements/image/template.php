<?php
// Retrieve selected image size and fetch the image data
$selected_size = mb_get_block_field('image-settings')['size'] ?? 'full';
$image = mb_get_block_field('image', ['size' => $selected_size]);

// Extract relevant image attributes
$image_url = $image['url'] ?? '';
$image_alt = $image['alt'] ?? '';
$image_width = $image['width'] ?? '';
$image_height = $image['height'] ?? '';

$image_settings = mb_get_block_field('image-settings');

$is_lightbox = $image_settings['is-lightbox'] ?? '';
$gallery_name = $image_settings['gallery-name'] ?? '';
$image_full_url = mb_get_block_field('image', ['size' => 'full'])['url'] ?? '';

$classes = $image_settings['classes'] ?? '';
$attributes = $image_settings['attributes'] ?? '';
?>

<?php if ( $image ) : ?>
    <?php if ( $is_lightbox && !$is_preview ) : ?>
    <a 
        href="<?= $image_full_url ?>"
        class="glightbox"
        <?= $gallery_name ? "data-gallery='$gallery_name'" : '' ?>
        <?= $image_alt ? "alt='$image_alt'" : '' ?>
    >
    <?php endif ?>
        <img 
            <?= $classes ? "class='$classes'" : '' ?>
            <?= $attributes ?>
            <?= $image_alt ? "alt='$image_alt'" : '' ?>
            src="<?= $image_url ?>"
            width="<?= $image_width ?>"
            height="<?= $image_height ?>"
        />
    <?php if ( $is_lightbox && !$is_preview ) : ?>
    </a>
    <?php endif ?>
<?php endif ?>