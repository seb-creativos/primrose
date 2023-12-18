<?php
$query = $data;
if ( !$current_page = get_query_var('paged') )
    $current_page = 1;

$max_page = $query->max_num_pages;
$permalinks = get_option('permalink_structure');
$format = '&page=%#%';
$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ): 1;
?>

<div class="pagination d-flex justify-content-center gap-30 mt-60 mb-120">
    <?= paginate_links( array(
        'current'    => max( 1, $paged ),
        'total'      => $max_page,
        'show_all'   => false,
        'mid_size'   => 2,
        'prev_text'  => __('<'),
        'next_text'  => __('>'),
    ) ) ?>
</div>