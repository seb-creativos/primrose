<?php
    $koble_search = new koble_Search($data);
    $fields = new koble_Fields();
    $query = $koble_search->get_query();
?>

<div class="row listing">
    
    <?php if(!$data['hide-sort']): ?>
        <div class="col-md-12 listing-top_bar p-4 mb-5 bg-light">
            <div class="row">
                <div class="col-md-6">
                    <span><?php echo $query->found_posts . ' ' . __('Properties Found') ?></span>
                </div>
                <div class="col-md-6">
                    <?php $fields->get_field('sortby'); ?>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <?php while($query->have_posts()) : $query->the_post(); ?>
        <?php koble_public::renderTemplate('listing/' . $data['grid-layout'] . '.php'); ?>
    <?php endwhile; wp_reset_query()?>

    <?php if(!$data['hide-pagination']): ?>
        <div class="col-md-12 listing-bottom_bar p-4 mt-5 bg-light text-center">
            <?php
                koble_public::renderTemplate('listing/pagination.php', $query); 
            ?>
        </div>
    <?php endif; ?>
</div>

