<?php

$taxonomy = get_taxonomy($data['source']);

?>
<div class="dropdown">
    <input type="hidden" class="form-control" name="<?php echo $data['source'] ?>" id="<?php echo $data['source'] ?>-field" placeholder="<?php echo __($data['label'], 'koble') ?>" value="">
    <input type="text" class="form-control" id="<?php echo $data['source'] ?>-text" placeholder="<?php echo __($data['label'], 'koble') ?>" >
    <a class="dropdown-btn" id="<?php echo $data['source'] ?>-dropdown"" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> </a>

    <div class="dropdown-menu" data-items-selected="<?php _e($taxonomy->labels->name . ' selected', 'koble') ?>" data-field="<?php echo $data['source'] ?>" aria-labelledby="#<?php echo $data['source'] ?>-dropdown">
        <div class="dropdown-header">
            <input type="text" class="search-dropdown form-control" autofocus>
        </div>
        <div class="dropdown-body">
            <?php

                foreach ($data['options'] as $option) {
                    $id = $option['id'];
                    $uniqId = uniqid();
                    $selected = (isset($_REQUEST[$data['source']]) && in_array($option['value'], explode(',', $_REQUEST[$data['source']]) ) !== false ) ? 'checked' : '';
                    ?>
                    <div class="option-group">
                        <ul>
                            <li class="parent" >
                                <input type="checkbox" <?php echo $selected ?> data-field="<?php echo $data['source'] ?>" data-label="<?php echo __($option['label'], 'koble') ?>" data-value="<?php echo $option['value'] ?>" id="option-<?php echo $uniqId ?>">
                                <label for="option-<?php echo $uniqId ?>"> <?php _e($option['label'],'koble') ?> </label>
                            </li>
                            <?php foreach ($option['childrens'] as $option) :?>
                                <?php
                                    $uniqId = uniqid(); 
                                    $selected = (isset($_REQUEST[$data['source']]) && in_array($option['value'], explode(',', $_REQUEST[$data['source']]) ) !== false ) ? 'checked' : '';   
                                ?>
                                <li class="child" >
                                    <input type="checkbox" <?php echo $selected ?> data-field="<?php echo $data['source'] ?>" data-label="<?php echo __($option['label'], 'koble') ?>" data-value="<?php echo $option['value'] ?>" id="option-<?php echo $uniqId ?>">
                                    <label for="option-<?php echo $uniqId ?>"> <?php _e($option['label'],'koble') ?> </label>
                                </li>
                                
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <?php
                }
            
            ?>
        </div>
        <div class="dropdown-footer">
            <a class="all btn btn-secondary" > <?php _e('All', 'koble') ?> </a>
            <a class="none btn btn-secondary" >  <?php _e('None', 'koble') ?> </a>
            <a class="btn btn-primary" onclick="jQuery('#my_modal').modal('hide');" > <?php _e('Accept', 'koble') ?> </a>
        </div>
    </div>
</div>


