<?php
    $post_id = $data['post_id'] ? $data['post_id'] : get_the_ID();
    $is_favorite = koble_favorites_Public::is_favorit($post_id);
    $favorited = ($is_favorite) ? 'favorited' : '';
    $tooltip = ($is_favorite) ?   __('Remove from Favourites')  :   __('Save to Favourites') ;

?>
<div class="add-to-favorites <?= $favorited ?>" data-add-title="<?php _e('Save to Favourites') ?>" data-remove-title="<?php _e('Remove from Favourites') ?>" data-id="<?= $post_id; ?>" data-bs-toggle="tooltip" data-placement="bottom" title="<?= $tooltip ?>">
    <i class="icon icon-hearts-suit"></i>
    <i class="icon icon-hearts-suit-1 favorited"></i>
    <p><?= $tooltip ?></p>
</div>