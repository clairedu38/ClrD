<?php 

// Enregistrement des menus dans WP
register_nav_menus( array(
	'header' => 'Menu Principal',
	'footer' => 'Bas de page',
) );

function theme_enqueue_styles() {
    wp_enqueue_style( 'theme-style', get_stylesheet_uri() );
    wp_enqueue_style('swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css');
    wp_enqueue_style( 'custom-style', get_stylesheet_directory_uri() . '/css/style.css' );
}

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );

function theme_enqueue_scripts() {
    wp_enqueue_script( 'menu-script', get_stylesheet_directory_uri() . '/js/header.js', array(), null, true );
    wp_enqueue_script( 'reco-script', get_stylesheet_directory_uri() . '/js/recommandations.js', array(), null, true );
    wp_enqueue_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array(), null, true);
}

add_action( 'wp_enqueue_scripts', 'theme_enqueue_scripts' );
