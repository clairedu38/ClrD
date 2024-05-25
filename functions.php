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
    wp_enqueue_script( 'simple-parallax', 'https://cdn.jsdelivr.net/npm/simple-parallax-js@5.3.0/dist/simpleParallax.min.js', array(), '5.3.0', true);
    wp_enqueue_script( 'header-script', get_stylesheet_directory_uri() . '/js/header.js', array(), null, true );
    wp_enqueue_script( 'reco-script', get_stylesheet_directory_uri() . '/js/recommandations.js', array(), null, true );
    wp_enqueue_script( 'font-awesome', 'https://kit.fontawesome.com/06b62cd2a4.js', array(), null, true );
    wp_enqueue_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array(), null, true);
    if ( is_page_template('portfolio.php') ) {
        wp_enqueue_script( 'portfolio-script', get_stylesheet_directory_uri() . '/js/portfolio.js', array(), null, true );
        wp_localize_script('portfolio-script', 'ajax_object', array(
            'ajax_url' => admin_url('admin-ajax.php'),
            'nonce'    => wp_create_nonce('filter_photos_nonce')
        ));
    } 
}

add_action( 'wp_enqueue_scripts', 'theme_enqueue_scripts' );


// Requete pour affichage des images dans le catalogue
function filter_posts() {

    // ajax securité
    if ( ! isset( $_POST['ajax_nonce'] ) || ! wp_verify_nonce( $_POST['ajax_nonce'], 'filter_photos_nonce' ) ) {
        die( 'Security check failed' );
    }
   
    $filterExpertise = $_POST['expertises'];

    $args = array(
        'post_type' => 'projet',
        'post_status' => 'publish',
        'orderby' => 'rand',
    );

    if (!empty($filterExpertise)) {
        $args['tax_query'][] = array(
            'relation' => 'OR',
            array(
                'taxonomy' => 'expertise',
                'field'    => 'slug',
                'terms'    => $filterExpertise,
            ),
        );
    }


        // création d' une nouvelle instance de WP_Query
    $query = new WP_Query($args);

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            ?>
            <?php get_template_part('template-parts/projets-vignette'); ?>
            <?php
        }
        wp_reset_postdata(); // réinitialisation de la requête
    }

    wp_die();
   
}

add_action('wp_ajax_filter_posts', 'filter_posts');
add_action('wp_ajax_nopriv_filter_posts', 'filter_posts');