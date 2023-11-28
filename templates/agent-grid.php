<?php
    $image_url = wp_get_attachment_image_url(get_post_thumbnail_id(), 'large');
?>
<div class="team__item col-md-6 col-xl-4">
    <!-- AGENT PFP -->
    <img    class="w-100 ratio-3x4 object-fit-cover"
            src="<?= $image_url ?>"
            alt="<?php the_title(); ?>"
    >
</div>