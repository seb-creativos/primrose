<?php $logo_url = wp_get_attachment_image_src(get_theme_mod('custom_logo'), 'full')[0] ?>

<div id="siteLoader">
    <img 
        class="site-loader__image-bg"
        src="<?= $logo_url ?>"
        width="246"
    />
    <img 
        class="site-loader__image-filler"
        src="<?= $logo_url ?>"
        width="246"
    />
</div>