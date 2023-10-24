<?php

// Version Control, specify in style.css
if ( ! defined( '_VER' ) ) {
	define( '_VER', wp_get_theme()->get( 'Version' ) );
}

// Enqueue Dist
add_action('wp_enqueue_scripts', 'enqueue_frontend_dist');
function enqueue_frontend_dist() {
	
	wp_enqueue_style( 'frontend', get_theme_file_uri( 'dist/css/frontend.css' ), false, _VER, 'all' );
	wp_enqueue_script( 'frontend', get_theme_file_uri( 'dist/js/frontend.js' ), null, _VER, true );

	// Allows to pass server-side PHP variables to client-side JavaScript
    wp_localize_script( 'frontend', 'global_params', array(
        'map_api_key' => get_option( 'map_api_key', 'AIzaSyBY4Y942umBAtFyrAyHtp69JehsJRPyPSQ' )
    ));
}

// Include
foreach ( glob( get_template_directory() . '/include/*.php' ) as $file ) {
    require_once $file;
}