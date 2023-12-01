
<?php

$value = $_REQUEST[$data['source']] ?? '';
if($data['label'] == 'Ref#') $data['label'] = 'Reference #'

?>
<input  class="form-control"
        name="<?= $data['source'] ?>"
        type="text"
        placeholder="<?= $data['label'] ?>"
        value="<?= $value ?>"
>