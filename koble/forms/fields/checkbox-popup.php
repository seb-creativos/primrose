<?php
$taxonomies = get_object_taxonomies('property');

$taxonomy = ( in_array($data['source'],$taxonomies ) ) ? get_taxonomy($data['source']) : false;

?> 
<div class="checkbox-popup pos-relative" data-id-field="field-<?= $data['source'] ?>" >
    <input type="hidden" class="form-control" name="<?= $data['source'] ?>" id="<?= $data['source'] ?>-field" placeholder="<?= $data['label'] ?>" value="">
    <input type="text" class="form-control br-0" id="<?= $data['source'] ?>-text" placeholder="<?= $data['label'] ?>" >
    <a class="cbpopup-btn" role="button" data-bs-toggle="modal" data-bs-target="#<?= $data['source'] ?>-modal"></a>

    <div class="modal fade cbpopup-modal" data-id-field="field-<?= $data['source'] ?>" tabindex="-1" role="dialog" data-items-selected="<?php _e($taxonomy->labels->name . ' selected', 'koble') ?>" data-field="<?= $data['source'] ?>" aria-hidden="true" id="<?= $data['source'] ?>-modal">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content br-10">
                <div class="modal-header p-20 border-0">
                    <h4 class="text-primary">
                        <?= sprintf(__('Select %s'), strtolower(__($taxonomy ? $taxonomy->labels->name : $data['label'], 'koble')) ) ; ?>
                    </h4>
                </div>
                <div class="modal-body p-20">
                    <div class="row row-cols-2">
                    <?php
                        foreach ($data['options'] as $option) {
                            $selected = (isset($_REQUEST[$data['source']]) && in_array($option['value'], explode(',', $_REQUEST[$data['source']]) ) !== false ) ? 'checked' : '';
                            ?>
                            <div class="option-group col">
                                <ul class="p-0">
                                    <li class="parent" >
                                        <input class="form-check-input" type="checkbox" <?= $selected ?> data-field="<?= $data['source'] ?>" data-label="<?= __($option['label'], 'koble') ?>" data-value="<?= $option['value'] ?>" id="option-<?= $option['value'] ?>">
                                        <label for="option-<?= $option['value'] ?>"> <?php _e($option['label'],'koble') ?> </label>
                                    </li>
                                    <?php if($option['childrens'] !== null) foreach ($option['childrens'] as $option) :
                                        $selected = (isset($_REQUEST[$data['source']]) && in_array($option['value'], explode(',', $_REQUEST[$data['source']]) ) !== false ) ? 'checked' : '';
                                        ?>
                                        <li class="child" >
                                            <input class="form-check-input" type="checkbox" <?= $selected ?> data-field="<?= $data['source'] ?>" data-label="<?= __($option['label'],'koble') ?>" data-value="<?= $option['value'] ?>" id="option-<?= $option['value'] ?>">
                                            <label for="option-<?= $option['value'] ?>"> <?php _e($option['label'],'koble') ?> </label>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                            <?php
                        }
                    ?>
                    </div>
                </div>
                <div class="modal-footer p-20 border-0">
                    <a class="clear btn btn-outline-primary">  <?php _e('Clear', 'koble') ?> </a>
                    <a class="apply btn btn-primary text-white"> <?php _e('Apply', 'koble') ?> </a>
                </div>
            </div>
        </div>
    </div>
</div>


