<header id="siteHeader">
    <div class="container-fluid">

        <!-- Site Navbar -->
        <nav id="siteNavbar" class="px-30 py-20 d-flex align-items-center justify-content-between">

            <!-- Logo -->
            <div>
                <?php the_custom_logo() ?>
                <?php $additional_logo = get_theme_mod('additional_logo'); ?>
                <?php if( $additional_logo ): ?>
                    <a href="<?= get_home_url() ?>" class="custom-logo-link--additional" rel="home" aria-current="page">
                        <img width="238" height="70" src="<?= esc_url($additional_logo) ?>" class="custom-logo--additional" alt="Primrose Real Estate" decoding="async">
                    </a>
                <?php endif; ?>
            </div>

            <!-- Menu -->
            <div class="d-none d-xl-block">
                <?php
                wp_nav_menu([
                    'theme_location' => 'header-navigation',
                    'container'      => false,
                    'menu_id'        => 'siteMenu',
                    'menu_class'     => 'navbar-nav d-flex gap-30',
                    'walker'         => new WP_Bootstrap_5_Navwalker(),
                ]);
                ?>
            </div>
            
            <!-- Actions -->
            <div>
                <?= do_shortcode( '[favorite_count_btn]' ) ?>
                <?php #TODO ?>
                <?= 'English' ?>
            </div>
        </nav>

    </div>
</header>