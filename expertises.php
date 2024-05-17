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
                <a href="#">N'hésitez pas à me contacter</a>
        </div>
    </div> 
    <div class="contact-expertise-plus">
        <h3>Vous voulez en savoir plus ?</h3>
        <div> 
                <a href="#">Voir mes projets en web et design</a>
                <a href="#">Qui se cache derriere ClrD ?</a>
        </div>
    </div>
</div>

<?php get_footer(); 