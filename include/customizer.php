<?php

add_action( 'customize_register', 'barbasap_customize_register' );
function barbasap_customize_register( $wp_customize ) {
    
    // Map Settings
    $wp_customize->add_section( 'barbasap_map_settings', [
        'title'       => __( 'Map Settings', 'barbasap' ),
    ] );
    $wp_customize->add_setting( 'map_api_key', [
        'type' => 'option',
    ] );
    $wp_customize->add_control( 'map_api_key', [
        'type'        => 'text',
        'section'     => 'barbasap_map_settings',
        'label'       => __( 'Google Maps API Key', 'barbasap' ),
    ] );
}
