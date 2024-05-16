<?php
// Template Name: Accueil
?>
<?php 
get_header();
$photoClaire = get_field('photo_claire');

?>

<div class="banniere-accueil">
    <div class="banniere-accueil-image">
        <img src="<?php echo get_template_directory_uri()?>/assets/images/banniere-accueil.jpg" alt="">
    </div>
    <div class="banniere-accueil-textes">
        <h3>CLaiRe Duwig</h3>
        <h1>Graphiste et Webdesigner depuis 10 ans</h1>
    </div>
</div>

<div class="presentation-accueil">
    <div class="presentation-accueil-image">
        <img src="<?php echo esc_url($photoClaire['url']); ?>" alt="<?php echo esc_attr($photoClaire['alt']); ?>">
    </div>
    <div class="presentation-accueil-texte">
        <h2> Bienvenue !</h2>
        <p>Je suis Claire Duwig, graphiste web et print depuis 8 ans. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
        </p>
        <div>
            <a href="#">Envie d’en découvrir plus ? </a>
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
                    <div class="accueil-portfolio-projets-image">
                    <img src="<?php echo esc_url($vignette['url']); ?>" alt="<?php echo esc_attr($vignette['alt']); ?>">
                    </div>
                    <div>
                        <h4><?php echo get_the_title() ?></h4>
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
        <a href="#">Découvrir l'ensemble de mon portfolio </a>
    </div>

</div>

<div>
<?php get_template_part('template-parts/bloc-expertises'); ?>
</div>

<div>
<?php get_template_part('template-parts/bloc-recommandations'); ?>
</div>

<?php 
get_footer(); 
?>