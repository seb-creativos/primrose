
<?php

$value = $_REQUEST[$data['source']] ?? '';

?>
<input  class="form-control br-0"
        name="<?= $data['source'] ?>"
        type="number"
        placeholder="<?= $data['label'] ?>"
        min="0"
        value="<?= $value ?>"
>