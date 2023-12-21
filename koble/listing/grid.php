
<?php 
    $property = new koble_Property();
?>
<div class="listing-property col">
    <a class="p-0 d-block h-100" href="<?= get_permalink() ?>" >

        <?php #TODO ?>
        <div class="swiper-grid swiper">
            <div class="swiper-wrapper">
                <?php foreach( $property->get_images() as $image ): ?>
                    <div style="background-image:url(<?= $image ?>);height:300px;background-size:cover;background-position:cover" class="swiper-slide"></div>
                <?php endforeach; ?>
            </div>
            <div class="swiper-navigation">
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
        
        <div class="listing-property__data d-flex flex-column gap-8 text-center">
            <p class="m-0"><?= $property->get_term('property-locations'); ?></p>
            <p class="text-primary m-0"><?= $property->get_title(); ?></p>
            <div class="row g-20 justify-content-center">
                <?php if( $property->get_field('property-beds') ): ?>
                    <div class="col-auto">
                        <p class="m-0"><?= sprintf(__('%s Beds', 'koble'), $property->get_field('property-beds')) ?></p>
                    </div>
                <?php endif; ?>
                <?php if( $property->get_field('property-baths') ): ?>
                    <div class="col-auto">
                        <p class="m-0"><?= sprintf(__('%s Baths', 'koble'), $property->get_field('property-baths')) ?></p>
                    </div>
                <?php endif; ?>
                <?php if( $property->get_field('property-built_size') ): ?>
                    <div class="col-auto">
                        <p class="m-0"><?= sprintf(__('%sm<sup>2</sup>', 'koble'), $property->get_field('property-built_size')) ?></p>
                    </div>
                <?php endif; ?>
                <?php if( $property->get_field('property-reference') ): ?>
                    <div class="col-auto">
                        <p class="fw-bold m-0"><?= sprintf(__('Ref. %s', 'koble'), $property->get_field('property-reference')) ?></p>
                    </div>
                <?php endif; ?>
            </div>
            <p class="fs-18 m-0"><?= $property->get_price(); ?></p>
        </div>
    </a>
</div>