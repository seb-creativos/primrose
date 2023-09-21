<?php
$map_location = mb_get_block_field( 'map-location' ) ?: [];
$map_link = mb_get_block_field( 'map-link' ) ?: [];
$map_settings = mb_get_block_field( 'map-settings' ) ?: [];

$map_pin = $map_settings['map-pin'] ?? '';
$map_pin_src = wp_get_attachment_image_src($map_pin, 'full');

$map_style = $map_settings['map-style'] ?? '';
$map_style_json = htmlspecialchars($map_style, ENT_QUOTES, 'UTF-8');

$classes = $map_settings['classes'] ?? '';
?>

<div 
    class="map<?= $classes ? " $classes" : '' ?>"

    data-lat="<?= $map_location['latitude'] ?>"
    data-lng="<?= $map_location['longitude'] ?>"
    data-zoom="<?= $map_location['zoom'] ?>"

    <?= $map_link ? "data-gmlink='$map_link'" : '' ?>
    <?= $map_pin ? "data-pin='$map_pin_src[0]'" : '' ?>
    <?= $map_style ? "data-style='$map_style_json'" : '' ?>
>
</div>