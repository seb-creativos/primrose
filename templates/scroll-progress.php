<div class="container-wide">
    <button class="scroll-progress back-to-top" type="button">
        <div class="scroll-progress__bar">
            <span class="scroll-progress__icon">
                <i class="icon icon-arrow-up"></i>
            </span>
        </div>
        <span class="scroll-progress__text">
            <svg class="inline-svg inline-svg--fill" xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 200 200">
                <defs>
                    <path id="scroll-progress__text__path" d=" M 100, 100 m -60, 0 a 60,60 0 0,1 120,0 a 60,60 0 0,1 -120,0 "></path>
                </defs>
                <text dy="0" font-size="13.3">
                    <textPath startOffset="0" xlink:href="#scroll-progress__text__path" side="left" method="stretch" class="scroll-progress__text__path">
                        <?php _e( 'Back to Top', 'primrose' ) ?>
                        &bull;
                    </textPath>
                    <textPath startOffset="50%" xlink:href="#scroll-progress__text__path" side="left" method="stretch" class="scroll-progress__text__path">
                        <?php _e( 'Back to Top', 'primrose' ) ?>
                        &bull;
                    </textPath>
                </text>
            </svg>
        </span>
    </button>
</div>