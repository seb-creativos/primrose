<header id="siteHeader">
    <div class="container-wide">

        <!-- Site Navbar -->
        <nav id="siteNavbar" class="py-24 d-flex align-items-center justify-content-between">

            <!-- Logo -->
            <?php the_custom_logo() ?>
        
            <!-- Offcanvas Navigation Trigger -->
            <button 
                class="d-xl-none hamburger-icon"
                type="button"
                data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasNavigation"
                aria-controls="offcanvasNavigation"
                title="<?php printf( esc_html__( 'Open Navigation Menu', 'barbasap' ) ) ?>"
            >
                <span class="hamburger-icon__line"></span>
                <span class="hamburger-icon__line"></span>
            </button>

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
        </nav>

    </div>
</header>