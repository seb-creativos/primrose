<?php $links = mb_get_block_field( 'links' ) ?: [] ?>

<?php if (count($links) > 1) : ?>
    <div class="d-grid gap-10">
<?php endif ?>

<?php foreach( $links as $link ) : ?>

    <?php
    $link_label = $link['link-label'] ?? '';
    $link_url = $link['link-url'] ?? '';
    $link_type = $link['link-type'] ?? '';
    $is_external = $link['link-settings']['is-external'] ?? '';
    $classes = $link['link-settings']['classes'] ?? '';
    $classes = trim( (($link_type !== 'raw' && $link_type !== 'with-chev') ? "btn $link_type" : '') . " $classes");
    $attributes = $link['link-settings']['attributes'] ?? '';
    ?>

    <?php if ( $link_label ) : ?>

        <a  
            <?= $link_url ? "href='$link_url'" : '' ?>
            <?= $is_external ? 'target="_blank"' : '' ?>
            <?= $classes ? "class='$classes'" : '' ?>
            <?= $attributes ?>
        >
            <?= $link_label ?>
            <?= $link_type === 'with-chev' ? '<i class="icon icon-arrow-sm-right"></i>' : '' ?>
        </a>

    <?php endif ?>
<?php endforeach ?>

<?php if (count($links) > 1) : ?>
    </div>
<?php endif ?>