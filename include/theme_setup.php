<?php

// Theme Setup
add_action( 'after_setup_theme', 'barbasap_setup' );
function barbasap_setup() {
    /*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

    /*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support( 'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}

// Register Menus
register_nav_menus(
	array(
		'header-navigation' => esc_html__( 'Header Navigation', 'barbasap' ),
		'footer-navigation' => esc_html__( 'Footer Navigation', 'barbasap' ),
	)
);

// Custom Image Sizes
// add_filter('intermediate_image_sizes_advanced', 'add_image_insert_override' );
// function add_image_insert_override($sizes){
//     unset( $sizes['thumbnail']);
//     unset( $sizes['medium']);
//     unset( $sizes['medium_large']);
//     unset( $sizes['large']);
// 	unset( $sizes['1536x1536']);
// 	unset( $sizes['2048x2048']);
//     return $sizes;
// }
