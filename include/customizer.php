<?php

add_action( 'customize_register', 'barbasap_customize_register' );
function barbasap_customize_register( $wp_customize ) {

    // Theme Settings
    $wp_customize->add_section( 'theme_settings', array(
        'title'    => __( 'Theme Settings', 'barbasap' ),
        'priority' => 30,
    ) );

    // Loader
    $wp_customize->add_setting( 'enable_loader', array(
        'default' => true,
    ) );
    $wp_customize->add_control( 'enable_loader', array(
        'label'    => __( 'Enable Loader', 'barbasap' ),
        'section'  => 'theme_settings',
        'type'     => 'checkbox',
    ) );

    // Scroll Progress
    $wp_customize->add_setting( 'enable_scroll-progress-indicator', array(
        'default' => true,
    ) );
    $wp_customize->add_control( 'enable_scroll-progress-indicator', array(
        'label'    => __( 'Enable Scroll Progress Indicator', 'barbasap' ),
        'section'  => 'theme_settings',
        'type'     => 'checkbox',
    ) );

    // Decoration Grid
    $wp_customize->add_setting( 'enable_decoration-grid', array(
        'default' => true,
    ) );
    $wp_customize->add_control( 'enable_decoration-grid', array(
        'label'    => __( 'Enable Decoration Grid', 'barbasap' ),
        'section'  => 'theme_settings',
        'type'     => 'checkbox',
    ) );

    // Decoration Noise
    $wp_customize->add_setting( 'enable_decoration-noise', array(
        'default' => true,
    ) );
    $wp_customize->add_control( 'enable_decoration-noise', array(
        'label'    => __( 'Enable Decoration Noise', 'barbasap' ),
        'section'  => 'theme_settings',
        'type'     => 'checkbox',
    ) );
    
    // Map Settings
    $wp_customize->add_setting( 'map_api_key', [
        'type' => 'option',
    ] );
    $wp_customize->add_control( 'map_api_key', [
        'type'      => 'text',
        'section'   => 'theme_settings',
        'label'     => __( 'Google Maps API Key', 'barbasap' ),
    ] );
}
