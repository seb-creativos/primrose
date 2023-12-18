<?php
$favoritesIds = koble_favorites_Public::get_favorites();
$fields = new koble_Fields();
?>

<?php if(!empty($favoritesIds)): ?>

    <?php
    $query = koble_favorites_Public::get_favorites_query(); 
    ?>




    <div class="row favorites listing g-10 g-md-30 m-0">
        <div class="col-md-12 listing-top_bar p-10 mb-10">
            <div class="row">
                <div class="col-md-6">
                    <span><?= sprintf(__('You have %s favourite properties'), $query->found_posts); ?></span>
                </div>
                <div class="col-md-6">
                    <?php $fields->get_field('sortby'); ?>
                </div>
            </div>
        </div>
        
        <?php while($query->have_posts()) : $query->the_post(); ?>
        
            <?php koble_public::renderTemplate('listing/grid.php'); ?>
        
        <?php endwhile; wp_reset_query()?>
        
    </div>

<?php else: ?>

    <div class="row favorites listing">
        <h5 class="text-center w-100 py-100 text-uppercase font--sans"><?php _e('You have no favourite properties', 'koble') ?></h5>
        <a href="/for-sale" class="btn btn-arrow text-uppercase w-auto mx-auto">Our Properties</a>
    </div>

<?php endif; ?>
