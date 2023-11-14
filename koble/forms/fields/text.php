
<?php

$value = $_REQUEST[$data['source']] ?? '';

?>
<input  class="form-control"
        name="<?= $data['source'] ?>"
        type="text"
        placeholder="<?= $data['label'] ?>"
        value="<?= $value ?>"
>