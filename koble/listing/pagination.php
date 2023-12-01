<?php
$query = $data;
if ( !$current_page = get_query_var('paged') )
    $current_page = 1;

$max_page = $query->max_num_pages;
$permalinks = get_option('permalink_structure');
$format = '&page=%#%';
$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ): 1;
?>

<div class="pagination text-center justify-content-center">
    <?= paginate_links( array(
        'current'    => max( 1, $paged ),
        'total'      => $max_page,
        'show_all'   => false,
        'mid_size'   => 3,
        'prev_text'  => __('<'),
        'next_text'  => __('>'),
    ) ) ?>
</div>