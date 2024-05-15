<?php
// Template Name: Accueil
?>
<?php 
get_header(); 
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

<div>
<?php get_template_part('template-parts/bloc-expertises'); ?>
</div>

<div>
<?php get_template_part('template-parts/bloc-recommandations'); ?>
</div>

<?php 
get_footer(); 
?>