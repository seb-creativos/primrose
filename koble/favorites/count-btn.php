<?php
$options = get_option( 'koble-favorit' );

if( isset($options['favorite-page']) ):
    $link = get_the_permalink( $options['favorite-page']);
    $favorites = koble_favorites_Public::get_favorites_query();
    $show = ( $favorites->found_posts > 0) ? 'show' : ''; 
    ?>
    
    <a href="<?= $link ?>" class="favorites-count <?= $show ?> ">
        <i class="icon icon-hearts-suit-1 font-size--28"></i>
        <span class="number font-size--12"><?= $favorites->found_posts ?></span>
    </a>

    
    <?php

endif;

?>