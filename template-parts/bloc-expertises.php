<div class="bloc-expertise">

    <h2><?php the_field('titre_bloc_expertises','106'); ?></h2>

    <div class="liste-expertise">

    <!-- Récupération des expertises via WP_Query -->
    <?php
        $args = array(
            'post_type' => 'service',
            'post_status' => 'publish',
            'orderby' => 'date',
            'order' => 'ASC',
        );

        $query = new WP_Query($args);

        if ($query->have_posts()) {
            while ($query->have_posts()) {
                $query->the_post();
                $iconServices = get_field('icone_du_service');
                $couleurService = get_field('couleur_service');
                ?>
                <div class="service-unique">
                    <img src="<?php echo esc_url($iconServices['url']); ?>" alt="<?php echo esc_attr($iconServices['alt']); ?>">
                    <h3>
                    <?php echo get_the_title() ?></h3>
                    <p><?php the_field('courte_description'); ?>
                    </p>  
                </div>
                <?php
            }
            wp_reset_postdata(); 
        }?>
    </div>

    <div class="bloc-expertise-plus">
    <a class="bouton" href="<?php echo home_url('/expertises'); ?>">
                <i class="fa-solid fa-arrow-right"></i>
                <span><?php the_field('bloc_expertise_bouton','106'); ?></span>
            </a>
    </div>



</div>