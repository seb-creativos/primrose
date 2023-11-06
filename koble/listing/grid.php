
<?php 
    $property = new koble_Property();
?>
<div class="col-md-4 listing-property mb-4">
    <a class="p-0 bg-light d-block h-100" href="<?php echo get_permalink() ?>" >
        <div style="background-image:url(<?php echo $property->get_image(); ?>);height:300px;background-size:cover;background-position:cover" >

        </div>
        <div class="row p-3">
            <div class="col-md-12">
                <h3><?php echo $property->get_title(); ?></h3>
            </div>
            <div class="col-md-6">
                <p><?php echo $property->get_field('property-reference'); ?></p>
            </div>
            <div class="col-md-6">
                <p><?php echo $property->get_price(); ?></p>
            </div>
            <div class="row">
                <?php if($property->get_short_rental_price()): ?>
                    <div class="col-md-6">
                        <?php echo $property->get_short_rental_price() ?>
                    </div>
                <?php endif; ?>
                
                <?php if($property->get_long_rental_price()): ?>
                    <div class="col-md-6">
                        <?php echo $property->get_long_rental_price() ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </a>
</div>