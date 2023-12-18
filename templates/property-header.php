<?php
$listing = get_post_field('post_name', get_option('koble-searchform')['listing-page']);
$property = $args['property'];
?>
<section class="property-header">
    <div class="container-wide pt-50 pb-20">
        <div class="row">
            <div class="property-header__back has-icon text-primary col-md fs-20">
                <i class="icon icon-arrow-sm-left"></i>
                <a href="<?= sprintf('/%s/?', $listing); ?>" class="btn btn-link">
                    <?= $property->get_title() ?>
                </a>
            </div><!-- !.__back -->
            <div class="property-header__share d-none d-md-flex gap-md-40 col-md-auto">
                <a href="<?= $property->generate_pdf_link() ?>" target="_blank" class="btn btn-link has-icon ms-16 fs-16 px-0 py-0">
                    <i class="icon icon-file-pdf-outline-64 fs-20 text-primary me-8"></i>
                    <?= __('Print', 'koble'); ?>
                </a>
                <a href="#shareModal" data-bs-toggle="modal" role="button" class="btn btn-link has-icon ms-16 fs-16 px-0 py-0">
                    <i class="icon icon-data-upload-outline-64 fs-20 text-primary me-8"></i>
                    <?= __('Share', 'koble'); ?>
                </a>
                <a href="#" class="btn btn-link has-icon ms-16 fs-16 px-0 py-0">
                    <?php #echo do_shortcode('[koble_favorites]') ?>
                    <?= __('Save', 'koble'); ?>
                </a>
            </div><!-- !.__share -->
        </div>
    </div>
</section><!-- !.property-header -->