<?php
// Template Name: Accueil
?>
<?php 
get_header(); 
?>
<?php 
$image_vignette = get_field('image_vignette');
$image_fullscreen = get_field('image_plein_ecran');
$titre = get_the_title();
?>

<h1>PHOTOGRAPHE EVENT</h1>



<?php get_footer(); ?>