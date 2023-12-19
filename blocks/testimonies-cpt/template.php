<?php
$testimonies = get_posts([
    'post_type'      => 'testimonial',
    'posts_per_page' => -1,
    'fields'         => 'ids',
]);
?>

<div class="swiper swiper-testimonies pb-60">
    <div class="swiper-wrapper">
        <!-- Slides -->
        <?php foreach ($testimonies as $t): ?>

            <div class="swiper-slide">
                <p class="fs-14"><?= wpautop( get_post_field('post_content', $t) ) ?></p>
                <p class="fs-14 text-primary mt-30"><?= get_the_title($t) ?></p>
            </div>

        <?php endforeach ?>
    </div>
    <!-- Navigation + Pagination -->
    <div class="swiper-pagination"></div>
</div>