<header id="siteHeader">
    <div class="container-fluid">

        <!-- Site Navbar -->
        <nav id="siteNavbar" class="px-30 py-20 d-flex align-items-center justify-content-between">

            <!-- Logo -->
            <?php the_custom_logo() ?>

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
                <?= do_shortcode( '[language-switcher]' ) ?>
            </div>
        </nav>

    </div>
</header>