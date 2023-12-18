<?php
$scroll = mb_get_block_field( 'scroll' ) ?: false;
$scroll_label = $scroll['label'] ?? '';
$scroll_url = $scroll['url'] ?? '';
$icon_type = $scroll['settings']['icon-type'] ?? 'custom';
$icon_custom = $scroll['settings']['custom-icon'] ?? '';
$icon_class = $scroll['settings']['icon-class'] ?? '';
$is_external = $scroll['settings']['is-external'] ?? false;
$classes = $scroll['settings']['classes'] ?? '';
$attributes = $scroll['link-settings']['attributes'] ?? '';
?>

<?php if ( $scroll_label ) : ?>

    <?php if( $scroll_url ): ?>
        <a  
            class="scroll-reactive <?= $classes ?? '' ?>"
            <?= $scroll_url ? "href='$scroll_url'" : '' ?>
            <?= $is_external ? 'target="_blank"' : '' ?>
        >
    <?php else: ?>
        <button class="scroll-reactive <?= $classes ?? '' ?>" type="button" <?= $attributes ?> >
    <?php endif; ?>

        <div class="scroll-reactive__center">
            <span class="scroll-reactive__icon">
                <?php if( $icon_type === 'class' ): ?>
                    <i class="icon <?= $icon_class ?>"></i>
                <?php elseif( $icon_type === 'custom' ): ?>
                    <i class="icon icon-arrow-up"></i>
                <?php endif; ?>
            </span>
        </div>
        <span class="scroll-reactive__text">
            <svg class="inline-svg inline-svg--fill" xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 200 200">
                <defs>
                    <path id="scroll-reactive__text__path" d=" M 100, 100 m -60, 0 a 60,60 0 0,1 120,0 a 60,60 0 0,1 -120,0 "></path>
                </defs>
                <text dy="0" font-size="16">
                    <textPath startOffset="0" xlink:href="#scroll-reactive__text__path" side="left" method="stretch" class="scroll-progress__text__path">
                        <?= __( $scroll_label, 'primrose' ) ?>
                        &bull;
                    </textPath>
                </text>
            </svg>
        </span>
    <?php if( $scroll_url ): ?>
        </a>
    <?php else: ?>
        </button>
    <?php endif; ?>

<?php endif ?>