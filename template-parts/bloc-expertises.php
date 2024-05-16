<div class="bloc-expertise">

    <h2> Mes expertises</h2>

    <div class="liste-expertise">
    <?php
        $args = array(
            'post_type' => 'service',
            'post_status' => 'publish',
            'orderby' => 'date',
            'order' => 'ASC',
        );

            // création d' une nouvelle instance de WP_Query
        $query = new WP_Query($args);

        if ($query->have_posts()) {
            while ($query->have_posts()) {
                $query->the_post();
                $iconServices = get_field('icone_du_service');
                $couleurService = get_field('couleur_service');
                ?>
                <div class="service-unique">
                    <img src="<?php echo esc_url($iconServices['url']); ?>" alt="">
                    <h4>
                    <?php echo get_the_title() ?></h4>
                    <p><?php the_field('courte_description'); ?>
                    </p>  
                </div>
                <?php
            }
            wp_reset_postdata(); // réinitialisation de la requête
        }?>
    </div>

    <div>
        <a href="#">En savoir plus</a>
    </div>



</div>