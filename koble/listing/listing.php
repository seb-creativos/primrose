<?php
$koble_search = new koble_Search($data);
$fields = new koble_Fields();
$query = $koble_search->get_query();
?>

<?php if(!$data['hide-sort']): ?>
    <div class="row justify-content-end">
        <div class="col-auto">
            <?php $fields->get_field('sortby'); ?>
        </div>
    </div>
<?php endif; ?>

<div class="listing row row-cols-3 gx-md-16 gy-40">
    <?php while($query->have_posts()) : $query->the_post(); ?>
        <?php koble_public::renderTemplate('listing/' . $data['grid-layout'] . '.php'); ?>
    <?php endwhile; wp_reset_query() ?>
</div>

<?php if(!$data['hide-pagination']): ?>
    <?php
        koble_public::renderTemplate('listing/pagination.php', $query); 
    ?>
<?php endif; ?>