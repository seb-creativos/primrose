<?php
wp_enqueue_style('koble-slick');
wp_enqueue_style('koble-slick-theme');
wp_enqueue_style('koble-photoswipe');
wp_enqueue_style('koble-photoswipe-ds');
wp_enqueue_script('koble-photoswipe');
wp_enqueue_script('koble-photoswipe-ui');
wp_enqueue_script('koble-slick');

$property = new koble_Property();
$images = $property->get_images();
$video = $property->get_field('property-video')[0] ?? false;
$tour = $property->get_field('property-virtual_tour')[0] ?? false;
$brochure = wp_get_attachment_url($property->get_field('property-brochure')) ?? false;
$plans = wp_get_attachment_url($property->get_field('property-plans')) ?? false;
?>

<div class="property-gallery__wrapper">
    <div class="property-gallery__item main">
        <?php #do_shortcode('[koble_favorites]') ?>

        <?php if( isset($images[0]) ): ?>
            <img src="<?= $images[0] ?>" class="glightbox" alt="Property Image">
        <?php endif; ?>

        <div class="property-gallery__btns row row-cols-4 g-16 m-0 px-8">
            <?php if($video): ?>
                <div class="col my-16">
                    <a href="#" data-src="<?= $video ?>" class="glightbox-video barbaless btn btn-primary has-icon bg w-100 justify-content-center px-8" data-gallery="property-video">
                        <i class="icon icon-media-player d-none d-xl-block font-size-16 me-8"></i>
                        <span>
                            <?= __('View video', 'koble') ?>
                        </span>
                    </a>
                </div>
            <?php endif; ?>

            <?php if($tour): ?>
                <div class="col my-16">
                    <a href="<?= $tour ?>" target="_blank" class="btn btn-light text-primary has-icon bg w-100 justify-content-center px-8">
                        <i class="icon icon-virtual-reality-outline-64 d-none d-xl-block font-size-16 me-8"></i>
                        <span>
                            <?= __('Virtual Tour', 'koble') ?>
                        </span>
                    </a>
                </div>
            <?php endif; ?>

            <?php if($brochure): ?>
                <div class="col my-16">
                    <a href="<?= $brochure ?>" download class="btn btn-light text-primary has-icon bg w-100 justify-content-center px-8">
                        <i class="icon icon-restaurant-menu d-none d-xl-block font-size-16 me-8"></i>
                        <span>
                            <?= __('Brochure', 'koble') ?>
                        </span>
                    </a>
                </div>
            <?php endif; ?>

            <?php if($plans): ?>
                <div class="col my-16">
                    <a href="<?= $plans ?>" download class="btn btn-light text-primary has-icon bg w-100 justify-content-center px-8">
                        <i class="icon icon-map-1 d-none d-xl-block font-size-16 me-8"></i>
                        <span>
                            <?= __('Floor  Plans', 'koble') ?>
                        </span>
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <div class="property-gallery__item thumb1">
        <?php if( isset($images[1]) ): ?>
            <img src="<?= $images[1] ?>" class="glightbox" alt="Property Image">
        <?php endif; ?>
    </div>

    <div class="property-gallery__item thumb2">
        <?php if( isset($images[2]) ): ?>
            <img src="<?= $images[2] ?>" class="glightbox" alt="Property Image">
        <?php endif; ?>
    </div>

    <?php if($property->get_total_images() > 3): ?>
        <!-- rest of the images -->
        <?php foreach( array_slice($images, 3) as $image ): ?>
            <div data-src="<?= $image ?>" class="d-none glightbox"></div>
        <?php endforeach; ?>
    <?php endif; ?>
    
</div><!-- !.__wrapper -->
