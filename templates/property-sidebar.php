<?php
$property = $args['property'];
?>
<div class="property-sidebar sticky__track order-1 order-lg-2 col-lg-4">
    <div class="sticky__item bg-white px-24 py-16">
        <div class="row justify-content-end mb-20 g-0">
            <div class="property-sidebar__pdf col-auto">
                <a href="<?= $property->generate_pdf_link() ?>" target="_blank" aria-label="<?= __('Print in PDF', 'koble') ?>" class="btn bg p-8">
                    <i class="icon icon-file-pdf-outline-64 fw-bold font-size-30"></i>
                </a>
            </div>
            <div class="property-sidebar__share col-auto">
                <a href="#shareModal" data-bs-toggle="modal" role="button" aria-label="<?= __('Share Property', 'koble') ?>" class="btn bg p-8">
                    <i class="icon icon-data-upload-outline-64 fw-bold font-size-30"></i>
                </a>    
            </div>
            <div class="property-sidebar__favorite col-auto">
                <a href="#" aria-label="<?= __('Add/Remove to Favorites', 'koble') ?>" class="btn bg p-8">
                    <?php #echo do_shortcode('[koble_favorites]') ?>
                </a>    
            </div>
        </div>
        <div class="row g-20">
            <div class="col-12">
                <a href="#visitModal" data-bs-toggle="modal" role="button" class="btn btn-primary bg w-100 justify-content-center">
                    <?= __('Schedule a viewing', 'koble') ?>
                </a>
            </div>
            <div class="col-12">
                <a href="#infoModal" data-bs-toggle="modal" role="button" class="btn btn-outline-primary bg w-100 justify-content-center">
                    <?= __('Request more info', 'koble') ?>
                </a>
            </div>
            <div class="col-6">
                <a href="tel:+34661193789" class="btn btn-primary bg w-100 justify-content-center">
                    <?= __('Call', 'koble') ?>
                </a>
            </div>
            <div class="col-6">
                <?php
                    $message = sprintf(__('Hello, I\'m interested in receiving more information about %s', 'koble'), $property->get_field('property-reference'));
                ?>
                <a href="https://api.whatsapp.com/send/?phone=34661193789&text=<?= urlencode($message) ?>" target="_blank" class="btn btn-primary bg w-100 justify-content-center">
                    <?= __('Chat', 'koble') ?>
                </a>
            </div>
        </div>
    </div>
</div><!-- !.__cta -->