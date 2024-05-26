<?php
// Template Name: A propos
?>
<?php
get_header();?>

<!-- Contenu sur WP -->
<div>
    <?php
    if (have_posts()) :
        while (have_posts()) : the_post();
            the_content();
        endwhile;
    endif;
    ?>
</div>

<div>
<?php get_template_part('template-parts/bloc-expertises'); ?>
</div>

<div class="bloc-inspirations">
    <div>
        <h2><?php the_field('page_a_propos_inspiration_titre','106'); ?></h2>
    </div>

        <!-- Récupération des inspirations via WP_Query -->
    <?php
        $args = array(
            'post_type' => 'inspiration',
            'post_status' => 'publish',
            'orderby' => 'date',
            'order' => 'ASC',
        );

        $query = new WP_Query($args);

        if ($query->have_posts()) {
            while ($query->have_posts()) {
                $query->the_post();
                $imageInspiration = get_field('image_inspiration');
                ?>
                <div class="inspirations">
                    <img src="<?php echo esc_url($imageInspiration['url']); ?>" alt="<?php echo esc_attr($imageInspiration['alt']); ?>">
                    <h3><?php echo get_the_title() ?></h3>
                    <div class="inspirations-description">
                    <?php the_field('description_inspiration'); ?>
                    </div> 
                    <div class="inspirations-description-courte">
                    <p><?php the_field('description_courte_inspiration'); ?></p>
                    </div>  
                </div>
                <?php
            }
            wp_reset_postdata(); // réinitialisation de la requête
        }?>

</div>

<div class="contact">
    <h3 class="btn-titre"><?php the_field('page_a_propos_bouton_titre','106'); ?></h3>
    <div> 
        <a class="bouton" href="<?php echo home_url('/contact'); ?>">
            <i class="fa-solid fa-arrow-right"></i>
            <span><?php the_field('page_a_propos_bouton','106'); ?></span>
        </a>
    </div>
</div> 




<?php get_footer(); 