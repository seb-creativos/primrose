<?php 
global $property_query;
$fields = new koble_Fields();
?>

<!--search form-->
<form class="property-search" method="GET" action="<?= $data['action'] ?>">
    <div class="row">

        <div class="col-md">
            <?php #$fields->get_field('property-types', 'checkbox-popup'); ?>
            <?php $fields->get_field('property-types', 'text'); ?>
        </div>            
        <div class="col-6 col-md">
            <?php #$fields->get_field('min-bedrooms', 'select'); ?>
            <?php $fields->get_field('min-bedrooms', 'text'); ?>
        </div>
        <div class="col-6 col-md">
            <?php #$fields->get_field('location', 'checkbox-popup'); ?>
            <?php $fields->get_field('property-locations', 'text'); ?>
        </div>
        <div class="col-6 col-md">
            <?php #$fields->get_field('price', 'price-range'); ?>
            <?php $fields->get_field('price', 'text'); ?>
        </div>
        <div class="col-6 col-md">
            <?php $fields->get_field('reference', 'text'); ?>
        </div>
        
        <div class="col-md">
            <button type="submit" class="btn btn-primary search-btn w-100">
                <?= __('Find it', 'primrose') ?>
            </button>
        </div>

    </div>
</form>

