<?php
$href = get_permalink();
$image_url = wp_get_attachment_image_url(get_post_thumbnail_id(), 'large');
$name = get_the_title();
$role = rwmb_meta('agent-role');
$phones = rwmb_meta('agent-phone');
$emails = rwmb_meta('agent-email');
?>
<div class="team__item pos-relative col-md-6 col-xl-4">
    <!-- AGENT PFP -->
    <a class="team__pfp" href="<?= $href ?>">
        <div class="parallax__wrapper w-100 ratio-3x4">
            <img
                class="parallax__element top-n10"
                data-speed="0.95"
                data-lag="0"
                src="<?= $image_url ?>"
                alt="<?= $name ?>"
            >
        </div>
        <p class="text-white text-decoration-underline z-1"><?= __('Read More', 'primrose') ?></p>
    </a>
    <div class="d-flex flex-column gap-4 text-center mt-20">
        <span class="text-primary fs-20"><?= $name ?></span>
        <span class="fs-14"><?= __($role, 'primrose') ?></span>
        <?php foreach( $phones as $phone ): ?>
            <a class="text-primary" href="tel:<?= str_replace(' ', '', $phone); ?>"><?= $phone ?></a>
        <?php endforeach; ?>
        <?php foreach( $emails as $email ): ?>
            <a class="text-primary" href="mailto:<?= $email ?>"><?= $email ?></a>
        <?php endforeach; ?>
    </div>
</div>