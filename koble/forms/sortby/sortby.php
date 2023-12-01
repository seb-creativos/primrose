<form class="property-search-form sortby" method="GET" action="<?= get_permalink() ?>">

    <label class="d-inline-block" for="<?= $data['source'] ?>">
        <?= __('Sorted by:', 'koble') ?>
    </label>

    <select class="form-select d-inline-block w-auto" name="<?= $data['source'] ?>" id="<?= $data['source'] ?>">

    <?php

    if( isset( $data['options'] ) ){

        foreach ( $data['options'] as $key ) {
            
            $selected = "";
            if(isset($_REQUEST[ $data['source'] ])){
                $selected = ( $_REQUEST[ $data['source'] ] == $key[0] ) ? 'selected' : '';
            }

            
            
            echo '<option value="' . $key[0] . '" ' . $selected . ' > ' . __($key[1], 'koble') . ' </option>';
        
        }
    }

    ?>


    </select>


</form>