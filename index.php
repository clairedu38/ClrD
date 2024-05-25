<?php 
get_header();
$photoClaire = get_field('photo_claire');
$titreBanniere = get_field('titre_banniere');
$photoBanniereAccueil = get_field('banniere_accueil');
?>

<div class="banniere-accueil">
    <div class="banniere-accueil-image">
        <img src="<?php echo esc_url($photoBanniereAccueil['url']); ?>" alt="<?php echo esc_attr($photoBanniereAccueil['alt']); ?>">
    </div>
    <div class="banniere-accueil-textes">
        <h3><?php echo esc_html($titreBanniere); ?></h3>
        <h1><?php the_field('sous-titre_banniere'); ?></h1>
    </div>
</div>

<div class="presentation-accueil">
    <div class="presentation-accueil-image">
        <img src="<?php echo esc_url($photoClaire['url']); ?>" alt="<?php echo esc_attr($photoClaire['alt']); ?>">
    </div>
    <div class="presentation-accueil-texte">
        <h2><?php the_field('titre_bienvenue'); ?></h2>
        <p><?php the_field('texte_bienvenue'); ?></p>
        
        <div>
            <a class="bouton" href="<?php echo home_url('/a-propos'); ?>">
                <i class="fa-solid fa-arrow-right"></i>
                <span><?php the_field('texte_du_lien'); ?></span>
            </a>
        </div>
    </div>
</div>

<div class="accueil-portfolio">
    <div>
        <h2>Mes réalisations</h2>
    </div>
    <div class="accueil-portfolio-projets">
    <?php
        $args = array(
            'post_type' => 'projet',
            'post_status' => 'publish',
            'orderby' => 'rand',
            'posts_per_page' => 3,
            'meta_query' => array(
                array(
                    'key' => 'mise_en_avant_projet',
                    'value' => '1',
                    'compare' => '=='
                )
            )
        );

            // création d' une nouvelle instance de WP_Query
        $query = new WP_Query($args);

        if ($query->have_posts()) {
            while ($query->have_posts()) {
                $query->the_post();
                $vignette = get_field('image_vignette');
                $expertises = get_the_terms(get_the_ID(), 'expertise');
                ?>
                <div>
                    <a class="accueil-portfolio-projets-image" href="<?php the_permalink(); ?>">
                        <img src="<?php echo esc_url($vignette['url']); ?>" alt="<?php echo esc_attr($vignette['alt']); ?>">
                    </a>
                    <div>
                        <h3><?php echo get_the_title() ?></h3>
                        <p class="hover-category"><?php foreach ($expertises as $expertise) {
                        echo '/  ' . esc_html($expertise->name) . '  </br>' ;
                        } ?>
                        </p>
                    </div>
                </div>
                <?php
            }
            wp_reset_postdata(); // réinitialisation de la requête
        }?>
    </div>

    <div class="accueil-portfolio-lien">
        <a class="bouton" href="<?php echo home_url('/portfolio'); ?>">
            <i class="fa-solid fa-arrow-right"></i>
            <span>Découvrir l'ensemble de mon portfolio</span>
        </a>
    </div>

</div>

<div class="accueil-recommandations">
<?php get_template_part('template-parts/bloc-expertises'); ?>
</div>

<div>
<?php get_template_part('template-parts/bloc-recommandations'); ?>
</div>

<?php 
get_footer(); 
?>