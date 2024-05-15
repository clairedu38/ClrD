<div class="banniere-recommandations">
    <p>“ “ “ “ “ “ “ “ “ “ “ “ “ “ “ “ “ “ “ “ “ “ “ “ “ “ “ “</p>
</div>

<section class="recommandations">
<div>
    <h2>Ils me recommandent</h2>
</div>

<?php
// Récupération des recommandations via WP_Query
$args = array(
    'post_type' => 'recommandation',
    'posts_per_page' => -1,
    'post_status' => 'publish',
    'orderby' => 'rand',

);
$query = new WP_Query($args);
?>
<div class="swiper mySwiper">
    <div class="swiper-wrapper">
        <?php if ($query->have_posts()) : ?>
            <?php while ($query->have_posts()) : $query->the_post(); ?>
                <div class="swiper-slide">
                <p><?php the_field('citation'); ?></p>
                    <p class="auteur-citation"><?php the_field('auteur_citation'); ?></p>
                </div>
            <?php endwhile; wp_reset_postdata(); ?>
        <?php else : ?>
            <p><?php esc_html_e('No recommendations found.'); ?></p>
        <?php endif; ?>
    </div>
    <div class="swiper-pagination"></div>
</div>



</section>
