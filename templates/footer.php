<footer id="siteFooter" class="py-24">
    <div class="container-wide">
        <div class="row gy-24 gx-50 align-items-center justify-content-center justify-content-lg-between">

            <div class="col-auto" data-aos="fade-left">
                <?php the_custom_logo() ?>
            </div>

            <div class="col-auto" data-aos="fade-right">
                &copy;
                <?= bloginfo( 'name' ) ?> 
                &ndash;
                <?= __( 'All Rights Reserved', 'barbasap' ) ?>
                &ndash;

                <?php
                printf(
                    esc_html__( 'Web Design by %s', 'logotec' ),
                    '<a href="' . esc_url( 'https://sebcreativos.es/diseno-web/' ) . '" target="_blank">Seb Creativos</a>'
                );
                ?>
            </div>

        </div>
    </div>
</footer>