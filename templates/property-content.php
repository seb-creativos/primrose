<?php
$property = new koble_Property();
$features = $property->get_terms('property-features');
$listing = get_post_field('post_name', get_option('koble-searchform')['listing-page']);
$location = $property->get_subterm('property-locations');
$type = $property->get_subterm('property-types');
$location_slug = $property->get_subterm('property-locations', 'slug');
$type_slug = $property->get_subterm('property-types', 'slug');
?>

<!-- SINGLE PROPERTY - HEADER -->
<section class="property-header pt-30">
    <div class="container-wide">
        <div class="row">
            <div class="single-header__breadcrumbs heading-font col-md mb-30 font-size-30 font-size-md-32">
                <i class="icon icon-arrow-sm-left"></i>
                <a class="single-header__breadcrumbs--location btn btn-link underline p-0 pt-0" href="<?= sprintf('/%s/?property-locations=%s', $listing, $location_slug); ?>">
                    <span><?= $location ?></span>
                </a>
                <span>/</span>
                <a class="single-header__breadcrumbs--type btn btn-link underline p-0 pt-0" href="<?= sprintf('/%s/?property-locations=%s&property-types=%s', $listing, $location_slug, $type_slug); ?>">
                    <span><?= $type ?></span>
                </a>
            </div><!-- !.__breadcrumbs -->
            <div class="single-header__share d-none d-md-flex col-md-auto">
                <a href="<?= $property->generate_pdf_link() ?>" target="_blank" class="btn btn-link underline ms-16 font-size-16 px-0 py-0">
                    <i class="icon icon-file-pdf-outline-64 font-size-24 me-8 pos-absolute end-100"></i>
                    <?= __('Print', 'koble'); ?>
                </a>
                <a href="#shareModal" data-bs-toggle="modal" role="button" class="btn btn-link underline ms-16 font-size-16 px-0 py-0">
                    <i class="icon icon-data-upload-outline-64 font-size-24 me-8 pos-absolute end-100"></i>
                    <?= __('Share', 'koble'); ?>
                </a>
                <a href="#" class="btn btn-link underline ms-16 font-size-16 px-0 py-0">
                    <?php #echo do_shortcode('[koble_favorites]') ?>
                    <?= __('Favorite', 'koble'); ?>
                </a>
            </div><!-- !.__share -->
        </div>
    </div>
</section><!-- !.single-header -->

<!-- SINGLE PROPERTY - GALLERY -->
<section class="property-gallery mb-40">
    <div class="container-wide p-8 px-md-0">
        <?php $property->get_gallery(); ?>
    </div>
</section><!-- !.gallery -->

<!-- SINGLE PROPERTY - CONTENT -->
<section class="property-content mb-100">
    <div class="container-wide">
        <div class="row gx-16 gy-40">
            <div class="property-content__data sticky__track order-2 order-lg-1 col-lg-8">

                <div class="property-content__sticky sticky__item row row-cols-auto justify-content-between">
                    <div class="location col">
                        <span class="fw-bolder fs-20"><?= $property->get_term('property-locations') ?></span>
                    </div>
                    <div class="type col">
                        <span class="fw-bolder fs-20"><?= $property->get_term('property-types') ?></span>
                    </div>
                    <div class="price col">
                        <h3 class="fw-bold text-primary m-0"><?= $property->get_price() ?></h3>
                    </div>    
                </div><!-- !._sticky -->

                <div class="property-content__basic">
                    <div class="row row-cols-2 row-cols-md-auto gy-20 gx-80">
                        <?php if( $property->get_field('property-beds') ): ?>
                            <div class="beds col">
                                <span><?= sprintf('%s Beds', $property->get_field('property-beds')); ?></span>
                            </div>
                        <?php endif; ?>
                        <?php if( $property->get_field('property-baths') ): ?>
                            <div class="baths col">
                                <span><?= sprintf('%s Baths', $property->get_field('property-baths')); ?></span>
                            </div>
                        <?php endif; ?>
                        <?php if( $property->get_field('property-built_size') ): ?>
                            <div class="built col">
                                <span><?= sprintf( 'Built %sm<sup>2</sup>', $property->get_field('property-built_size') ); ?></span>
                            </div>
                        <?php endif; ?>
                        <?php if( $property->get_field('property-plot_size') ): ?>
                            <div class="plot col">
                                <span><?= sprintf( 'Plot %sm<sup>2</sup>', $property->get_field('property-plot_size')  );?></span>
                            </div>
                        <?php endif; ?>
                        <?php if( $property->get_field('property-reference') ): ?>
                            <div class="ref col text-primary">
                                <span><?= sprintf( 'Ref. %s', $property->get_field('property-reference')  );?></span>
                            </div>
                        <?php endif; ?>
                    </div>
                </div><!-- !._basic -->

                <div class="property-content__desc">
                    <h3 class="font-size-24 text-uppercase"><?= __('Description', 'koble'); ?></h3>
                    <div 
                        class="js-read-more mb-16" 
                        data-rm-words="70">
                        <?= $property->get_description(); ?>
                    </div>
                </div><!-- !._desc -->

                <hr class="my-50">
                
                <?php if ( !empty($features) ): ?>
                <div class="property-content__features">
                    <h3 class="font-size-24 text-uppercase"><?= __('Features', 'koble'); ?></h3>
                    <ul class="mb-0">
                        <?php foreach ( $features as $feature ): ?>
                        <li>
                            <span><?= $feature ?></span>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div><!-- !._features -->

                <hr class="my-50">
                <?php endif; ?>

                <?= $property->get_map() ?>

                <div class="property-content__mortgage">
                    <h3 class="font-size-24 text-uppercase"><?= __('Mortgage Calculator', 'koble'); ?></h3>
                    <?php #echo do_shortcode( '[mortgage_calculator]' )?>
                </div><!-- !._mortgage -->

                <hr class="my-50">

                <div class="property-content__downloads">
                    <h3 class="font-size-24 text-uppercase"><?= __('Downloads', 'koble'); ?></h3>
                    <div class="row mt-24 gx-8">
                        <div class="col-md mb-24">
                            <a href="<?= $property->generate_pdf_link() ?>" target="_blank" class="btn btn-primary bg w-100 px-8 justify-content-center">
                                <i class="icon icon-file-pdf-glyph-64 font-size-14 me-8"></i>
                                <?= __('Print PDF', 'koble') ?>
                            </a>
                        </div>
                        <div class="col-md mb-24">
                            <a href="#TODO" class="btn btn-primary bg w-100 px-8 justify-content-center">
                                <i class="icon icon-house-2 font-size-14 me-8"></i>
                                <?= __("Buyer's Guide", 'koble') ?>
                            </a>
                        </div>
                        <div class="col-md mb-24">
                            <a href="#TODO" class="btn btn-primary bg w-100 px-8 justify-content-center">
                                <i class="icon icon-cogwheel-1 font-size-14 me-8"></i>
                                <?= __('Aftersale Services', 'koble') ?>
                            </a>
                        </div>
                    </div>
                </div><!-- !._downloads -->
                
            </div><!-- !.__data -->

            <?php get_template_part('templates/property-sidebar', null, ['property' => $property]) ?>
        </div>
    </div>
</section><!-- !.content -->

<!-- MODALS -->
<?= get_template_part( 'templates/property-visit' )?>
<?= get_template_part( 'templates/property-info' )?>
<?= get_template_part( 'templates/property-share' )?>