<?php
$ctas = array(
    'phone' => [
        'icon' => 'icon-phone-call-2',
        'link' => 'tel:'.str_replace(' ', '', get_theme_mod('cta-phone')),
    ],
    'email' => [
        'icon' => 'icon-letter-1',
        'link' => 'mailto:'.get_theme_mod('cta-email'),
    ],
    'whatsapp' => [
        'icon' => 'icon-chat_bubble',
        'link' => 'https://api.whatsapp.com/send?phone='.str_replace([' ', '+'], '', get_theme_mod('cta-whatsapp')),
    ],
);
?>

<div class="siteCta p-10">
    <ul class="siteCta__wrapper m-0 p-0">
        <?php foreach( $ctas as $type => $cta ): ?>
        <li class="siteCta__item px-10 py-20 siteCta__item--<?= $type ?>">
            <a href="<?= $cta['link'] ?>" target="_blank">
                <i class="icon <?= $cta['icon'] ?>"></i>
            </a>
        </li>
        <?php endforeach; ?>
    </ul>
</div>