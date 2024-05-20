<?php get_header();
?>
<?php
// Récupération l'id de la publication actuelle
$post_id = get_the_ID();

// Récupération des éléments liés au projet
$logo_projet = get_field('logo_projet');
$image_vignette = get_field('image_vignette');
$image_fullscreen = get_field('image_plein_ecran');
$titre = get_the_title();
$couleur_projet = get_field('couleur_du_projet');
$lien_existant = get_field('lien_existant');

// Récupération de la catégorie + vérification de la présence d'un terme dans cette catégorie
$expertises = wp_get_post_terms($post_id, 'expertise');
?>

    <section class="project">
        <div class="project-presentation">
            <div>
                <h4>
                    <?php foreach ($expertises as $expertise) {
                        echo '/  ' . esc_html($expertise->name) . '  ' ;
                    } ?>
                </h4>
                <h1 style="color: <?php echo esc_attr($couleur_projet); ?>"><?php echo esc_html($titre); ?></h1>
                
                <p><?php the_field('description_du_projet'); ?></p>
            </div>
            <div class="logo_project">
                <img src="<?php echo esc_url($logo_projet['url']); ?>" alt="<?php echo esc_attr($logo_projet['alt']); ?>">
            </div>
        </div>

        <div class="project-missions">

            <div class="project-missions-text">
                <h2 style="color: <?php echo esc_attr($couleur_projet); ?>">Ce qui a été réalisé</h2>
                <p><?php the_field('ce_qui_a_ete_realise'); ?></p>

            <!-- Si un lien existe, alors on affiche le lien -->
                <?php if ($lien_existant): ?>
                <div> 
                    <a class="lien-site-projet" target="_blank" href="<?php the_field('lien_du_site'); ?>">Lien vers le site</a>
                </div>
                <?php endif; ?>
            </div>

            <div class="image_vignette">
                <img src="<?php echo esc_url($image_vignette['url']); ?>" alt="<?php echo esc_attr($image_vignette['alt']); ?>">
            </div>
            
        </div>
    
        <div class="photo-fullscreen">
            <img src="<?php echo esc_url($image_fullscreen['url']); ?>" alt="<?php echo esc_attr($image_fullscreen['alt']); ?>">
        </div>  

    </section>

    <div class="contact-projet">
        <h3>Ce projet vous parle ?</h3>
        <div> 
                <a href="#">N'hésitez pas à me contacter</a>
        </div>
    </div> 
        
    <section>
        <div class="projet-autres">
            <h3>Envie d'en voir plus ?</h3>

            <div class="catalogue-projet">
            <?php
       
        // Récupération des images de la même catégories
            $args = array(
                'post_type' => 'projet',
                'post_status' => 'publish',
                'posts_per_page' => 2,
                'orderby' => 'rand',
                'post__not_in' => array( $post_id ), // ne pas prendre la publication en cours en compte
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
        </div>
    </section>


<?php get_footer(); 