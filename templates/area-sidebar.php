<?php
$args = [
    'post_type' => 'area',
    'posts_per_page' => -1,
    'orderby' => 'menu_order',
    'order' => 'ASC',
];
$query = new WP_Query($args);
$current = get_the_ID();
?>

<div class="area__sidebar sticky__track d-none d-md-block col-md-3">
    <nav class="area__nav sticky__item bg-white">
        <span class="bg-primary text-white fs-20 d-block px-24 py-12 w-100">
            <?= __('Top Areas') ?>
        </span>
        <ul class="px-24 py-12">
        <?php
        if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();
        ?>
        <?php if( get_the_ID() == $current ): ?>
            <li class="text-primary fw-bolder">
                <a class="has-icon" href="<?php the_permalink()?>">
                    <?php the_title(); ?>
                    <i class="icon icon-arrow-sm-right"></i>
                </a>
            </li>
        <?php else: ?>
            <li>
                <a href="<?php the_permalink()?>">
                    <?php the_title(); ?>
                </a>
            </li>
        <?php endif; ?>
        <?php
        endwhile; endif;
        wp_reset_query();
        ?>
        </ul>
    </nav>
</div>