<?php
get_header();?>

<section class="portfolio-taxonomie">

    <div>
        <h1 class="titre-principal">Découvrez tous mes projets</br><strong><?php single_term_title(); ?></strong></h1>
    </div>

    <div class="catalogue-projet portfolio">
    
    <?php
    
    // Obtenir le terme actuel
    $term = get_queried_object();
    $term_slug = $term->slug;

    // Arguments de la requête
    $args = array(
        'post_type' => 'projet',
        'post_status' => 'publish',
        'orderby' => 'rand',
        'tax_query' => array(
            array(
                'taxonomy' => 'expertise',
                'field'    => 'slug',
                'terms'    => $term_slug,
            ),
        ),
    );

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
    } ?>

    </div>

    <div class="contact">
    <h3>Vous souhaitez découvrir plus de projets ?</h3>
    <div> 
        <a class="bouton" href="<?php echo home_url('/portfolio'); ?>">
            <i class="fa-solid fa-arrow-right"></i>
            <span>Voir tous les projets</span>
        </a>
    </div>
</div> 

</section>

<?php get_footer(); 