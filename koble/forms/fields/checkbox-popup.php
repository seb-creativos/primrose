<?php
$taxonomies = get_object_taxonomies('property');

$taxonomy = ( in_array($data['source'],$taxonomies ) ) ? get_taxonomy($data['source']) : false;

$rand = rand(0,99999);

?> 
<div class="checkbox-popup" data-id-field="field-<?= $rand ?>" >
    <input type="hidden" class="form-control" name="<?= $data['source'] ?>" id="<?= $data['source'] ?>-field" placeholder="<?= $data['label'] ?>" value="">
    <input type="text" class="form-control" id="<?= $data['source'] ?>-text" placeholder="<?= $data['label'] ?>" >
    <a class="cbpopup-btn" role="button" data-bs-toggle="modal" data-bs-target="#<?= $data['source'] ?>-modal"></a>

    <div class="modal fade cbpopup-modal" data-id-field="field-<?= $rand ?>" tabindex="-1" role="dialog" data-items-selected="<?php _e($taxonomy->labels->name . ' selected', 'koble') ?>" data-field="<?= $data['source'] ?>" aria-hidden="true" id="<?= $data['source'] ?>-modal">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <?php if($taxonomy): ?>
                    <h4><?= __('Select', 'koble') . ' ' . __($taxonomy->labels->name, 'koble');  ?></h4>
                <?php else: ?>
                    <h4><?= __('Select', 'koble') . ' ' . __($data['label'], 'koble');  ?></h4>
                <?php endif; ?>
            </div>
            <div class="modal-body">
                <?php

                    foreach ($data['options'] as $option) {
                        if($option['child'] == 0):
                            $id = $option['id'];
                            $selected = (isset($_REQUEST[$data['source']]) && in_array($option['value'], explode(',', $_REQUEST[$data['source']]) ) !== false ) ? 'checked' : '';
                            ?>
                            <div class="option-group">
                                <ul>
                                    <li class="parent" >
                                        <input type="checkbox" <?= $selected ?> data-field="<?= $data['source'] ?>" data-label="<?= __($option['label'], 'koble') ?>" data-value="<?= $option['value'] ?>" id="option-<?= $option['value'] ?>">
                                        <label for="option-<?= $option['value'] ?>"> <?php _e($option['label'],'koble') ?> </label>
                                    </li>
                                    <?php foreach ($data['options'] as $option) :
                                        $selected = (isset($_REQUEST[$data['source']]) && in_array($option['value'], explode(',', $_REQUEST[$data['source']]) ) !== false ) ? 'checked' : '';
                                        ?>
                                        <?php if($id == $option['parent']): ?>
                                            <li class="child" >
                                                <input type="checkbox" <?= $selected ?> data-field="<?= $data['source'] ?>" data-label="<?= __($option['label'],'koble') ?>" data-value="<?= $option['value'] ?>" id="option-<?= $option['value'] ?>">
                                                <label for="option-<?= $option['value'] ?>"> <?php _e($option['label'],'koble') ?> </label>
                                            </li>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                            <?php
                        endif;
                    }
                
                ?>
            </div>
            <div class="modal-footer">
                <a class="all btn btn-secondary text-white" > <?php _e('All', 'koble') ?> </a>
                <a class="none btn btn-secondary text-white" >  <?php _e('None', 'koble') ?> </a>
                <a class="btn btn-primary text-white" onclick="$('#my_modal').modal('hide');" > <?php _e('Accept', 'koble') ?> </a>
            </div>
        </div>
    </div>
    </div>
</div>


