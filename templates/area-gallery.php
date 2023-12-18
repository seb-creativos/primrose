<?php
$images = rwmb_meta( 'area-images', [ 'size' => 'full' ] );
?>

<div class="swiper">
    <div class="swiper-wrapper">
    <?php foreach ( $images as $image ) : ?>
        <!-- <img class="swiper-slide" src="<?= $image['url']; ?>"> -->
    <?php endforeach ?>
    </div>
    <div class="swiper-pagination"></div>
</div>