
<?php

$value = $_REQUEST[$data['source']] ?? '';
if($data['label'] == 'Ref#') $data['label'] = 'Reference #'

?>
<input  class="form-control br-0"
        name="<?= $data['source'] ?>"
        type="text"
        placeholder="<?= $data['label'] ?>"
        value="<?= $value ?>"
>