<?php
$property = new koble_Property();
$features = $property->get_terms('property-features');
?>

<!-- SINGLE PROPERTY - HEADER -->
<?php get_template_part('templates/property-header', null, ['property' => $property]) ?>

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
                    <div class="location col has-icon">
                        <i class="icon icon-pin-3-1 fs-24 text-primary"></i>
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
                    <div class="row row-cols-2 row-cols-md-auto gy-20 gx-80 mt-30">
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

                <div class="property-content__desc my-60">
                    <h3 class="fs-20 text-primary mb-20"><?= __('About the property', 'koble'); ?></h3>
                    <div class="mb-16">
                        <?= $property->get_description(); ?>
                    </div>
                </div><!-- !._desc -->
                
                <?php if ( !empty($features) ): ?>
                <div class="property-content__features my-60">
                    <h3 class="fs-20 text-primary mb-20"><?= __('Features', 'koble'); ?></h3>
                    <ul class="mb-0">
                        <?php foreach ( $features as $feature ): ?>
                        <li>
                            <span><?= $feature ?></span>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div><!-- !._features -->

                <?php endif; ?>

                <?= $property->get_map() ?>
                
                <div class="property-content__downloads mt-60 p-24 bg-white">
                    <h3 class="fs-20 text-primary mb-24"><?= __('Downloads', 'koble'); ?></h3>
                    <div class="row gx-8">
                        <div class="col-md mb-24 mb-md-0">
                            <a href="<?= $property->generate_pdf_link() ?>" target="_blank" class="btn btn-primary bg w-100 px-8 justify-content-center">
                                <?= __('Print in PDF', 'koble') ?>
                            </a>
                        </div>
                        <div class="col-md mb-24 mb-md-0">
                            <a href="#TODO" class="btn btn-primary bg w-100 px-8 justify-content-center">
                                <?= __("Buyer's Guide", 'koble') ?>
                            </a>
                        </div>
                        <div class="col-md mb-0">
                            <a href="#TODO" class="btn btn-primary bg w-100 px-8 justify-content-center">
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