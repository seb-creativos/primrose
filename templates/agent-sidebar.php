<?php
$image_url = wp_get_attachment_image_url(get_post_thumbnail_id(), 'large');
$name = get_the_title();
$role = rwmb_meta('agent-role');
$phones = rwmb_meta('agent-phone');
$emails = rwmb_meta('agent-email');
?>
<div class="agent__sidebar sticky__track col-md-4">
    <div class="agent__info sticky__item">
        <img
            class="w-100 ratio-3x4 object-fit-cover"
            src="<?= $image_url ?>"
            alt="<?= $name ?>"
        >
        <div class="d-flex flex-column gap-4 text-center mt-20">
            <span id="agent-name" class="text-primary fs-20"><?= $name ?></span>
            <span class="fs-14"><?= __($role, 'primrose') ?></span>
            <?php foreach( $phones as $phone ): ?>
                <a class="text-primary" href="tel:<?= str_replace(' ', '', $phone); ?>"><?= $phone ?></a>
            <?php endforeach; ?>
            <?php foreach( $emails as $i => $email ): ?>
                <a  <?= $i==0?'id="agent-email"':'' ?> 
                    class="text-primary"
                    data-email="<?= $email ?>"
                    href="mailto:<?= $email ?>"
                ><?= $email ?></a>
            <?php endforeach; ?>
        </div>
    </div>
</div>