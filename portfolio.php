<?php
// Template Name: Portfolio
?>
<?php
get_header();?>

<section>

    <div>
        <h1 class="titre-principal">Découvrez tous mes projets en web et design</h1>
    </div>

    <div class="filtre-expertise">
        <?php $expertises = get_terms('expertise'); // récupération des catégories via ACF ?>
        <div class="option all-option">
            <p>  Tout  </p>
        </div>
        <?php 
        foreach ($expertises as $expertise) { ?>
            <div class="option">
            <p>  <?php echo $expertise->name; ?>  </p>
        </div>
        <?php 
        } ?>
    </div>

    <div class="catalogue-projet portfolio">
        <?php
        $args = array(
            'post_type' => 'projet',
            'post_status' => 'publish',
            'orderby' => 'rand',
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
        }?>
    </div>

</section>

<?php get_footer(); 