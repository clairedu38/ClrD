<?php
// Template Name: Expertises
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

<div class="contact-expertise">
    <div class="contact">
        <h3 class="btn-titre"><?php the_field('page_a_propos_bouton_titre','106'); ?></h3>
        <div> 
            <a class="bouton" href="<?php echo home_url('/contact'); ?>">
                <i class="fa-solid fa-arrow-right"></i>
                <span><?php the_field('page_a_propos_bouton','106'); ?></span>
            </a>
        </div>
    </div> 
    <div class="contact-expertise-plus">
        <h3 class="btn-titre"><?php the_field('page_a_propos_bouton','106'); ?></h3>
        <div> 
            <a class="bouton" href="<?php echo home_url('/portfolio'); ?>">
                <i class="fa-solid fa-arrow-right"></i>
                <span><?php the_field('page_expertise_bouton_1','106'); ?></span>
            </a>
            <a class="bouton" href="<?php echo home_url('/a-propos'); ?>">
                <i class="fa-solid fa-arrow-right"></i>
                <span><?php the_field('page_expertise_bouton_2','106'); ?></span>
            </a>
                
        </div>
    </div>
</div>

<?php get_footer(); 