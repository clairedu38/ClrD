<?php
// Template Name: Expertises
?>
<?php
get_header();?>

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
        <h3>Mon profil vous interresse ?</h3>
        <div> 
            <a class="bouton" href="<?php echo home_url('/contact'); ?>">
                <i class="fa-solid fa-arrow-right"></i>
                <span>N'hésitez pas à me contacter</span>
            </a>
        </div>
    </div> 
    <div class="contact-expertise-plus">
        <h3>Vous voulez en savoir plus ?</h3>
        <div> 
            <a class="bouton" href="<?php echo home_url('/portfolio'); ?>">
                <i class="fa-solid fa-arrow-right"></i>
                <span>Découvrir mon portfolio</span>
            </a>
            <a class="bouton" href="<?php echo home_url('/a-propos'); ?>">
                <i class="fa-solid fa-arrow-right"></i>
                <span>Qui se cache derrière ClrD ?</span>
            </a>
                
        </div>
    </div>
</div>

<?php get_footer(); 