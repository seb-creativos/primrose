<?php
$args = [
    'post_type' => 'agent',
    'posts_per_page' => -1,
    'orderby' => 'menu_order',
    'order' => 'ASC',
];
$query = new WP_Query($args);
?>

<div class="team__listing row">
    <?php if($query->have_posts()): while($query->have_posts()): $query->the_post(); ?>
        <?php get_template_part( 'templates/agent-grid' )?>
    <?php endwhile; endif; wp_reset_query(); ?>
</div>