<?php
$video = current(mb_get_block_field('video')) ?? '';
$video_settings = mb_get_block_field('video-settings') ?? '';
$classes = trim(preg_replace('/\s+/', ' ', $video_settings['classes'] ?? ''));;
$attributes = $video_settings['attributes'] ?? '';
?>

<?php if ( $video ) : ?>
    <video 
        <?= $classes ? "class='$classes'" : '' ?>
        <?= $attributes ?>
        width="<?= $video['dimensions']['width'] ?>" 
        height="<?= $video['dimensions']['height'] ?>"
        <?= $video_settings['muted'] ?? '' ? 'muted' : '' ?>
        <?= $video_settings['autoplay'] ?? '' ? 'autoplay' : '' ?>
        <?= $video_settings['playsinline'] ?? '' ? 'playsinline' : '' ?>
        <?= $video_settings['loop'] ?? '' ? 'loop' : '' ?>
        <?= $video_settings['controls'] ?? '' ? 'controls' : '' ?>
    >
        <source src="<?= $video['src'] ?>" type="<?= $video['type'] ?>">
    </video>
<?php endif ?>

