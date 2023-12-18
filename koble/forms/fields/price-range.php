<?php
$options = get_option('koble-searchform');
update_option( 'koble-searchform', $options );

$min_price = isset($options['min-price']) ? $options['min-price'] : false;
$max_price = isset($options['max-price']) ? $options['max-price'] : false;
$min_price_value = isset($_REQUEST['min-price']) ? $_REQUEST['min-price'] : false;
$max_price_value = isset($_REQUEST['max-price']) ? $_REQUEST['max-price'] : false;

?>
<div class="checkbox-popup pos-relative" data-id-field="field-<?= $data['source'] ?>">
    <input type="hidden" class="form-control" name="min-price" id="minPrice-field" value="<?= $min_price_value ?? '' ?>">
    <input type="hidden" class="form-control" name="max-price" id="maxPrice-field" value="<?= $max_price_value ?? '' ?>">
    <input type="text" class="form-control br-0 MinMaxPriceText" placeholder="<?= __('Price Range', 'koble') ?>" >
    <a class="cbpopup-btn" role="button" data-bs-toggle="modal" data-bs-target="#<?= $data['source'] ?>-modal"></a>

    <div class="modal fade cbpopup-modal" data-id-field="field-<?= $data['source'] ?>" tabindex="-1" role="dialog" data-field="<?= $data['source'] ?>" aria-hidden="true" id="<?= $data['source'] ?>-modal">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content br-10">
                <div class="modal-header p-20 border-0">
                    <h4 class="text-primary">
                        <?= __('Price range'); ?>
                    </h4>
                </div>
                <div class="modal-body p-20">
                    <div class="row">
                        <div class="col">
                            <select class="form-control min-price" name="min-price" id="min-price">
                                <option value="" <?= (!$min_price_value) ? 'selected' : '' ?> ><?php _e('No min price', 'koble') ?></option>
                                <?php foreach($min_price as $price): ?>
                                    <option value="<?= $price[0] ?>" data-price-format="<?= $price[1] ?>" <?= ($min_price_value == $price[0] ) ? 'selected' : '' ?> >+<?= $price[1] ?>€</option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-auto align-self-center">
                            <span class="text-primary fw-500">-</span>
                        </div>
                        <div class="col">
                            <select class="form-control max-price" name="max-price" id="max-price">
                                <option value="" <?= (!$max_price_value) ? 'selected' : '' ?> ><?php _e('No max price', 'koble') ?></option>
                                <?php foreach($max_price as $price): ?>
                                    <option value="<?= $price[0] ?>" data-price-format="<?= $price[1] ?>" <?= ($max_price_value == $price[0] ) ? 'selected' : '' ?> >-<?= $price[1] ?>€</option>
                                <?php endforeach; ?>
                            </select>
                        </div>
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