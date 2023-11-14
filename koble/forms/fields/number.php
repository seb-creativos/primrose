
<?php

$value = $_REQUEST[$data['source']] ?? '';

?>
<input  class="form-control"
        name="<?= $data['source'] ?>"
        type="number"
        placeholder="<?= $data['label'] ?>"
        value="<?= $value ?>"
>