<?php

add_action( 'customize_register', 'primrose_customize_register' );
function primrose_customize_register( $wp_customize ) {

    // Theme Settings
    $wp_customize->add_section( 'theme_settings', array(
        'title'    => __( 'Theme Settings', 'primrose' ),
        'priority' => 30,
    ) );

    // Loader
    $wp_customize->add_setting( 'enable_loader', array(
        'default' => true,
    ) );
    $wp_customize->add_control( 'enable_loader', array(
        'label'    => __( 'Enable Loader', 'primrose' ),
        'section'  => 'theme_settings',
        'type'     => 'checkbox',
    ) );

    // Decoration Filter
    $wp_customize->add_setting( 'enable_decoration-filter', array(
        'default' => true,
    ) );
    $wp_customize->add_control( 'enable_decoration-filter', array(
        'label'    => __( 'Enable Decoration Filter', 'primrose' ),
        'section'  => 'theme_settings',
        'type'     => 'checkbox',
    ) );

    // Decoration Grid
    $wp_customize->add_setting( 'enable_decoration-grid', array(
        'default' => true,
    ) );
    $wp_customize->add_control( 'enable_decoration-grid', array(
        'label'    => __( 'Enable Decoration Grid', 'primrose' ),
        'section'  => 'theme_settings',
        'type'     => 'checkbox',
    ) );

    // Decoration Noise
    $wp_customize->add_setting( 'enable_decoration-noise', array(
        'default' => true,
    ) );
    $wp_customize->add_control( 'enable_decoration-noise', array(
        'label'    => __( 'Enable Decoration Noise', 'primrose' ),
        'section'  => 'theme_settings',
        'type'     => 'checkbox',
    ) );

    // Scroll Progress
    $wp_customize->add_setting( 'enable_scroll-progress-indicator', array(
        'default' => true,
    ) );
    $wp_customize->add_control( 'enable_scroll-progress-indicator', array(
        'label'    => __( 'Enable Scroll Progress Indicator', 'primrose' ),
        'section'  => 'theme_settings',
        'type'     => 'checkbox',
    ) );

    // CTA Settings
    $wp_customize->add_section( 'cta_settings', array(
        'title'    => __( 'CTA Settings', 'primrose' ),
        'priority' => 31,
    ) );
    // Phone Number
    $wp_customize->add_setting( 'cta-phone', array(
        'default' => '',
    ) );
    $wp_customize->add_control( 'cta-phone', array(
        'label'       => __( 'Phone Number', 'primrose' ),
        'section'     => 'cta_settings',
        'type'        => 'text',
        'input_attrs' => array(
            'placeholder'   => __( '+34 123 456 789', 'primrose' ),
        )
    ) );
    // Email
    $wp_customize->add_setting( 'cta-email', array(
        'default' => '',
    ) );
    $wp_customize->add_control( 'cta-email', array(
        'label'       => __( 'Email', 'primrose' ),
        'section'     => 'cta_settings',
        'type'        => 'text',
    ) );
    // Whatsapp Number
    $wp_customize->add_setting( 'cta-whatsapp', array(
        'default' => '',
    ) );
    $wp_customize->add_control( 'cta-whatsapp', array(
        'label'       => __( 'Whatsapp Number', 'primrose' ),
        'section'     => 'cta_settings',
        'type'        => 'text',
        'input_attrs' => array(
            'placeholder'   => __( '+34 123 456 789', 'primrose' ),
        )
    ) );


    // Additional Logo
    $wp_customize->add_setting('additional_logo', array(
        'default'   => '',
        'capability' => 'edit_theme_options',
        'type'      => 'theme_mod',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'additional_logo', array(
        'label'     => __('Additional Logo', 'primrose'),
        'section'   => 'title_tagline', // You can change this section to match the default logo section.
        'settings'  => 'additional_logo',
    )));
    
    // Map Settings
    $wp_customize->add_setting( 'map_api_key', [
        'type' => 'option',
    ] );
    $wp_customize->add_control( 'map_api_key', [
        'type'      => 'text',
        'section'   => 'theme_settings',
        'label'     => __( 'Google Maps API Key', 'primrose' ),
    ] );
}

// Push Classes to Body
add_filter( 'body_class', 'push_body_classes' );
function push_body_classes( $classes ) {
    if( get_theme_mod( 'enable_decoration-grid', true ) ) {
        $classes[] = 'decoration-grid--enabled';
    }
    return $classes;
}